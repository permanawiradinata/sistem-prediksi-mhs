<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\HasilPrediksi;
use App\Models\MahasiswaModel;
use App\Imports\MahasiswaImport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

use App\Imports\PreviewMahasiswaImport;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;



class MahasiswaController extends Controller
{
    function index()
    {
        $user = Auth::user(); // ambil user yang sedang login

        $datamahasiswa = MahasiswaModel::where('user_id', $user->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('data_mahasiswa', compact('user', 'datamahasiswa'));
    }

    function tambah_data_mhs()
    {
        $user = Auth::user(); // ambil user yang sedang login
        return view('tambah_data_mhs', compact('user'));
    }

    // function data_prediksi()
    // {
    //     $user = Auth::user(); // ambil user yang sedang login

    //     $dataprediksi = MahasiswaModel::where('user_id', $user->id)
    //         ->orderBy('id', 'desc')
    //         ->get();

    //     return view('data_prediksi', compact('dataprediksi'));
    // }
    function data_prediksi()
    {
        $user = Auth::user(); // ambil user yang sedang login

        $dataprediksi = MahasiswaModel::where('user_id', $user->id)
            ->whereNull('hasil_prediksi') // hanya ambil data yang belum diprediksi
            ->orderBy('id', 'desc')
            ->get();

        return view('data_prediksi', compact('user', 'dataprediksi'));
    }


    // public function import(Request $request)
    // {
    //     $request->validate([
    //         'file' => 'required|mimes:xlsx,xls,csv'
    //     ]);

    //     try {
    //         Excel::import(new MahasiswaImport, $request->file('file'));
    //         return redirect()->route('data-mahasiswa')->with('success', 'Data berhasil diimpor!');
    //     } catch (Exception $e) {
    //         // Catat error jika ingin
    //         Log::error('Import gagal: ' . $e->getMessage());

    //         return redirect()->route('data-mahasiswa')->with('error', 'Gagal mengimpor data. Pastikan format file sesuai!');
    //     }
    // }

    public function import(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('data-mahasiswa')
                ->with('error', 'Gagal mengimpor data. File harus bertipe: xlsx, xls, atau csv.');
        }

        // Proses impor
        try {
            // Kirim ID user ke dalam class import
            Excel::import(new MahasiswaImport(Auth::id()), $request->file('file'));

            return redirect()->route('data-mahasiswa')->with('success', 'Data berhasil diimpor!');
        } catch (Exception $e) {
            // Catat error jika ingin
            Log::error('Import gagal: ' . $e->getMessage());

            return redirect()->route('data-mahasiswa')->with('error', 'Gagal mengimpor data. Pastikan format file sesuai!');
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:200',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'status_bekerja' => 'required|in:bekerja,tidak',
            'umur' => 'required|string|max:30',
            'status_menikah' => 'required|in:menikah,belum',
            'ips1' => 'required|numeric|min:0|max:4',
            'ips2' => 'required|numeric|min:0|max:4',
            'ips3' => 'required|numeric|min:0|max:4',
            'ips4' => 'required|numeric|min:0|max:4',
            'ipk' => 'required|numeric|min:0|max:4',
        ]);

        $validated['user_id'] = Auth::id(); // atau auth()->id()

        MahasiswaModel::create($validated);

        return redirect()->route('data-mahasiswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function prediksi($id)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id);
        $jenis_kelamin = strtolower($mahasiswa->jenis_kelamin) === 'perempuan' ? 1 : 0;

        try {
            $response = Http::post('http://127.0.0.1:5000/predict', [
                'jenis_kelamin' => $jenis_kelamin,
                'umur' => $mahasiswa->umur,
                'ips_1' => $mahasiswa->ips1,
                'ips_2' => $mahasiswa->ips2,
                'ips_3' => $mahasiswa->ips3,
                'ips_4' => $mahasiswa->ips4,
                'ipk' => $mahasiswa->ipk
            ]);

            if ($response->successful()) {
                $json = $response->json();
                $mahasiswa->hasil_prediksi = $json['prediction'];
                $mahasiswa->save();

                return response()->json([
                    'success' => true,
                    'data' => $mahasiswa,
                    'accuracy' => $json['accuracy'],
                    'report' => $json['report'],
                    'confusion_matrix' => $json['confusion_matrix']
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Prediksi gagal dilakukan.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi error: ' . $e->getMessage()
            ]);
        }
    }


    public function update_data_mhs($id)
    {
        $user = Auth::user(); // ambil user yang sedang login
        $user_id = Auth::id();

        // Ambil data mahasiswa milik user yang sedang login
        $mahasiswa_update = MahasiswaModel::where('id', $id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        return view('update_data', compact('user', 'mahasiswa_update'));
    }

    public function proses_update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:200',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'status_bekerja' => 'required|in:bekerja,tidak',
            'umur' => 'required|string|max:30',
            'status_menikah' => 'required|in:menikah,belum',
            'ips1' => 'required|numeric|min:0|max:4',
            'ips2' => 'required|numeric|min:0|max:4',
            'ips3' => 'required|numeric|min:0|max:4',
            'ips4' => 'required|numeric|min:0|max:4',
            'ipk' => 'required|numeric|min:0|max:4',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih',
            'status_bekerja.required' => 'Status bekerja wajib dipilih',
            'umur.required' => 'Umur wajib diisi',
            'status_menikah.required' => 'Status menikah wajib dipilih',
            'ips1.numeric' => 'Field IPS 1 harus bertipe angka',
            'ips2.numeric' => 'Field IPS 2 harus bertipe angka',
            'ips3.numeric' => 'Field IPS 3 harus bertipe angka',
            'ips4.numeric' => 'Field IPS 4 harus bertipe angka',
            'ipk.numeric'  => 'Field IPK harus bertipe angka',
        ]);

        try {
            $user_id = Auth::id();

            // Ambil data milik user yang sedang login
            $mahasiswa_update = MahasiswaModel::where('id', $id)
                ->where('user_id', $user_id)
                ->firstOrFail();

            $mahasiswa_update->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'status_bekerja' => $request->status_bekerja,
                'umur' => $request->umur,
                'status_menikah' => $request->status_menikah,
                'ips1' => $request->ips1,
                'ips2' => $request->ips2,
                'ips3' => $request->ips3,
                'ips4' => $request->ips4,
                'ipk' => $request->ipk,
            ]);

            return redirect()->route('data-mahasiswa')->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->route('data-mahasiswa')->with('error', 'Gagal melakukan update data!');
        }
    }

    public function hapus($id)
    {
        $user_id = Auth::id();

        // Pastikan data yang dihapus adalah milik user yang sedang login
        $mahasiswa = MahasiswaModel::where('id', $id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        $mahasiswa->delete();

        return redirect()->route('data-mahasiswa')->with('success', 'Data berhasil dihapus.');
    }


    // public function prediksiKelulusan(Request $request)
    // {
    //     $mahasiswa = MahasiswaModel::findOrFail($request->id);

    //     // === MAPPING SESUAI YANG DIKENAL MODEL ===
    //     $status_mahasiswa = strtolower($mahasiswa->status_bekerja) === 'tidak' ? 'MAHASISWA' : 'BEKERJA';
    //     $status_nikah = strtolower($mahasiswa->status_menikah) === 'belum' ? 'BELUMMENIKAH' : 'MENIKAH';

    //     // === Kirim ke Flask ===
    //     $response = Http::post('http://127.0.0.1:5000/predict', [
    //         'status_mahasiswa' => $status_mahasiswa,
    //         'status_nikah'     => $status_nikah,
    //         'umur'             => (int) $mahasiswa->umur,
    //         'ips_1'            => (float) $mahasiswa->ips1,
    //         'ips_2'            => (float) $mahasiswa->ips2,
    //         'ips_3'            => (float) $mahasiswa->ips3,
    //         'ips_4'            => (float) $mahasiswa->ips4,
    //     ]);

    //     if ($response->failed()) {
    //         return response()->json(['error' => 'Gagal memprediksi'], 500);
    //     }

    //     $ipk = ($mahasiswa->ips1 + $mahasiswa->ips2 + $mahasiswa->ips3 + $mahasiswa->ips4) / 4;

    //     return response()->json([
    //         'nama'             => $mahasiswa->nama,
    //         'jenis_kelamin'    => $mahasiswa->jenis_kelamin,
    //         'status_bekerja'   => $mahasiswa->status_bekerja,
    //         'status_menikah'   => $mahasiswa->status_menikah,
    //         'umur'             => $mahasiswa->umur,
    //         'ips1'             => $mahasiswa->ips1,
    //         'ips2'             => $mahasiswa->ips2,
    //         'ips3'             => $mahasiswa->ips3,
    //         'ips4'             => $mahasiswa->ips4,
    //         'ipk'              => $ipk,
    //         'status_kelulusan' => $response['hasil_prediksi']
    //     ]);
    // }

    // FIX
    // public function prediksiKelulusan2(Request $request)
    // {
    //     $mahasiswa = MahasiswaModel::findOrFail($request->id);

    //     // === MAPPING SESUAI LABEL PYTHON ===
    //     $status_bekerja = strtoupper(trim($mahasiswa->status_bekerja)); // 'BEKERJA' atau 'TIDAK'
    //     $status_menikah = strtolower($mahasiswa->status_menikah) === 'belum' ? 'BELUM' : 'MENIKAH';

    //     // === Kirim ke Flask ===
    //     $response = Http::post('http://127.0.0.1:5000/predict', [
    //         'user_id'        => Auth::id(), // tambahkan user_id
    //         'status_bekerja' => $status_bekerja,
    //         'status_menikah' => $status_menikah,
    //         'umur'           => (int) $mahasiswa->umur,
    //         'ips_1'          => (float) $mahasiswa->ips1,
    //         'ips_2'          => (float) $mahasiswa->ips2,
    //         'ips_3'          => (float) $mahasiswa->ips3,
    //         'ips_4'          => (float) $mahasiswa->ips4,
    //     ]);

    //     if ($response->failed()) {
    //         return response()->json(['error' => 'Gagal memprediksi'], 500);
    //     }

    //     $ipk = ($mahasiswa->ips1 + $mahasiswa->ips2 + $mahasiswa->ips3 + $mahasiswa->ips4) / 4;

    //     return response()->json([
    //         'nama'             => $mahasiswa->nama,
    //         'jenis_kelamin'    => $mahasiswa->jenis_kelamin,
    //         'status_bekerja'   => $status_bekerja,
    //         'status_menikah'   => $status_menikah,
    //         'umur'             => $mahasiswa->umur,
    //         'ips1'             => $mahasiswa->ips1,
    //         'ips2'             => $mahasiswa->ips2,
    //         'ips3'             => $mahasiswa->ips3,
    //         'ips4'             => $mahasiswa->ips4,
    //         'ipk'              => $ipk,
    //         'status_kelulusan' => $response['prediction']

    //     ]);
    // }


    public function prediksiKelulusan2(Request $request)
    {
        $mahasiswa = MahasiswaModel::findOrFail($request->id);

        $status_bekerja = strtoupper(trim($mahasiswa->status_bekerja));
        $status_menikah = strtolower($mahasiswa->status_menikah) === 'belum' ? 'BELUM' : 'MENIKAH';

        $response = Http::post('https://web-production-3198a.up.railway.app/predict', [
            'user_id'        => Auth::id(),
            'status_bekerja' => $status_bekerja,
            'status_menikah' => $status_menikah,
            'umur'           => (int) $mahasiswa->umur,
            'ips_1'          => (float) $mahasiswa->ips1,
            'ips_2'          => (float) $mahasiswa->ips2,
            'ips_3'          => (float) $mahasiswa->ips3,
            'ips_4'          => (float) $mahasiswa->ips4,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Gagal memprediksi'], 500);
        }

        $ipk = ($mahasiswa->ips1 + $mahasiswa->ips2 + $mahasiswa->ips3 + $mahasiswa->ips4) / 4;

        $hasilPrediksi = $response['prediction'];
        // === SIMPAN KE DATABASE ===
        HasilPrediksi::create([
            'user_id'        => Auth::id(),
            'nama'           => $mahasiswa->nama,
            'jenis_kelamin'  => $mahasiswa->jenis_kelamin,
            'status_bekerja' => strtolower($status_bekerja), // disesuaikan dengan enum di DB
            'status_menikah' => strtolower($status_menikah), // disesuaikan dengan enum di DB
            'umur'           => $mahasiswa->umur,
            'ips1'           => $mahasiswa->ips1,
            'ips2'           => $mahasiswa->ips2,
            'ips3'           => $mahasiswa->ips3,
            'ips4'           => $mahasiswa->ips4,
            'ipk'            => $ipk,
            'hasil_prediksi' => $response['prediction'],
        ]);

        // === Tambahkan ini untuk menyimpan hasil prediksi ke kolom mahasiswa
        $mahasiswa->hasil_prediksi = $hasilPrediksi;
        $mahasiswa->save();
        // MahasiswaModel::create([
        //     'user_id'        => Auth::id(),
        //     'nama'           => $mahasiswa->nama,
        //     'jenis_kelamin'  => $mahasiswa->jenis_kelamin,
        //     'status_bekerja' => strtolower($status_bekerja), // disesuaikan dengan enum di DB
        //     'status_menikah' => strtolower($status_menikah), // disesuaikan dengan enum di DB
        //     'umur'           => $mahasiswa->umur,
        //     'ips1'           => $mahasiswa->ips1,
        //     'ips2'           => $mahasiswa->ips2,
        //     'ips3'           => $mahasiswa->ips3,
        //     'ips4'           => $mahasiswa->ips4,
        //     'ipk'            => $ipk,
        //     'hasil_prediksi' => $response['prediction'],
        // ]);

        return response()->json([
            'nama'             => $mahasiswa->nama,
            'jenis_kelamin'    => $mahasiswa->jenis_kelamin,
            'status_bekerja'   => $status_bekerja,
            'status_menikah'   => $status_menikah,
            'umur'             => $mahasiswa->umur,
            'ips1'             => $mahasiswa->ips1,
            'ips2'             => $mahasiswa->ips2,
            'ips3'             => $mahasiswa->ips3,
            'ips4'             => $mahasiswa->ips4,
            'ipk'              => $ipk,
            'status_kelulusan' => $response['prediction']
        ]);
    }


    // public function prediksiKelulusan2(Request $request)
    // {
    //     $mahasiswa = MahasiswaModel::findOrFail($request->id);

    //     $status_bekerja = strtoupper(trim($mahasiswa->status_bekerja));
    //     $status_menikah = strtolower($mahasiswa->status_menikah) === 'belum' ? 'BELUM' : 'MENIKAH';

    //     $response = Http::post('http://127.0.0.1:5000/predict', [
    //         'status_bekerja' => $status_bekerja,
    //         'status_menikah' => $status_menikah,
    //         'umur'           => (int) $mahasiswa->umur,
    //         'ips_1'          => (float) $mahasiswa->ips1,
    //         'ips_2'          => (float) $mahasiswa->ips2,
    //         'ips_3'          => (float) $mahasiswa->ips3,
    //         'ips_4'          => (float) $mahasiswa->ips4,
    //         'user_id'        => Auth::id() // tambahkan ini jika perlu untuk Flask
    //     ]);

    //     if ($response->failed()) {
    //         return response()->json(['error' => 'Gagal memprediksi'], 500);
    //     }

    //     $ipk = ($mahasiswa->ips1 + $mahasiswa->ips2 + $mahasiswa->ips3 + $mahasiswa->ips4) / 4;
    //     $hasil = $response['prediction'];

    //     // Simpan ke database
    //     HasilPrediksi::create([
    //         'user_id'        => Auth::id(),
    //         'mahasiswa_id'   => $mahasiswa->id,
    //         'status_bekerja' => $status_bekerja,
    //         'status_menikah' => $status_menikah,
    //         'umur'           => $mahasiswa->umur,
    //         'ips1'           => $mahasiswa->ips1,
    //         'ips2'           => $mahasiswa->ips2,
    //         'ips3'           => $mahasiswa->ips3,
    //         'ips4'           => $mahasiswa->ips4,
    //         'ipk'            => $ipk,
    //         'hasil_prediksi' => $hasil,
    //     ]);

    //     return response()->json([
    //         'nama'             => $mahasiswa->nama,
    //         'jenis_kelamin'    => $mahasiswa->jenis_kelamin,
    //         'status_bekerja'   => $status_bekerja,
    //         'status_menikah'   => $status_menikah,
    //         'umur'             => $mahasiswa->umur,
    //         'ips1'             => $mahasiswa->ips1,
    //         'ips2'             => $mahasiswa->ips2,
    //         'ips3'             => $mahasiswa->ips3,
    //         'ips4'             => $mahasiswa->ips4,
    //         'ipk'              => $ipk,
    //         'status_kelulusan' => $hasil
    //     ]);
    // }

    public function riwayatPrediksi()
    {
        $user = Auth::user(); // ambil user yang sedang login
        $userId = Auth::id();
        $data = HasilPrediksi::where('user_id', $userId)->latest()->get();

        return view('hasil_prediksi', compact('user', 'data'));
    }




    // public function prediksi2(Request $request)
    // {
    //     $mhs = MahasiswaModel::find($request->id);

    //     if (!$mhs) {
    //         return response()->json(['message' => 'Data mahasiswa tidak ditemukan'], 404);
    //     }

    //     // Siapkan data yang dikirim ke Flask
    //     $response = Http::post('http://127.0.0.1:5000/predict', [
    //         'status_bekerja'   => $mhs->status_bekerja,
    //         'status_menikah'   => $mhs->status_menikah,
    //         'umur'             => $mhs->umur,
    //         'ips_1'            => $mhs->ips1,
    //         'ips_2'            => $mhs->ips2,
    //         'ips_3'            => $mhs->ips3,
    //         'ips_4'            => $mhs->ips4,
    //         'ipk'              => $mhs->ipk,
    //         'nama'             => $mhs->nama,
    //         'jenis_kelamin'    => $mhs->jenis_kelamin,
    //     ]);

    //     if ($response->successful()) {
    //         // Ambil hasil dari Flask dan langsung kirim ke view
    //         return response()->json($response->json());
    //     } else {
    //         return response()->json(['message' => 'Gagal melakukan prediksi.'], 400);
    //     }
    // }


    public function prosesImport()
    {
        $filePath = Session::get('import_file_path');

        if (!$filePath || !Storage::exists($filePath)) {
            return redirect()->route('data-mahasiswa')->with('error', 'File tidak ditemukan atau sudah kadaluarsa.');
        }

        try {
            Excel::import(new MahasiswaImport(Auth::id()), Storage::path($filePath));

            // Hapus file sementara
            Storage::delete($filePath);
            Session::forget('import_file_path');

            return redirect()->route('data-mahasiswa')->with('success', 'Data berhasil diimpor!');
        } catch (\Exception $e) {
            return redirect()->route('data-mahasiswa')->with('error', 'Gagal impor data: ' . $e->getMessage());
        }
    }

    public function previewImport(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv',
        ]);

        $path = $request->file('file')->store('temp');

        // Simpan path di session untuk dipakai saat import final
        Session::put('import_file_path', $path);

        $rows = Excel::toArray(new PreviewMahasiswaImport, $request->file('file'));

        // Ambil sheet pertama
        $preview_data = $rows[0];

        return view('preview_import', compact('preview_data'));
    }


    public function prediksiKelulusanMassal()
    {
        $userId = Auth::id();

        $mahasiswas = MahasiswaModel::where('user_id', $userId)
            ->whereNull('hasil_prediksi')
            ->get();

        if ($mahasiswas->isEmpty()) {
            return response()->json(['message' => 'Tidak ada data yang perlu diprediksi'], 200);
        }

        $records = $mahasiswas->map(function ($mhs) {
            return [
                'id'              => $mhs->id,
                'nama'            => $mhs->nama,
                'STATUS BEKERJA'  => strtoupper(trim($mhs->status_bekerja)),
                'UMUR'            => (float) $mhs->umur,
                'STATUS MENIKAH'  => strtoupper(trim($mhs->status_menikah == 'belum' ? 'BELUM' : 'MENIKAH')),
                'IPS 1'           => (float) $mhs->ips1,
                'IPS 2'           => (float) $mhs->ips2,
                'IPS 3'           => (float) $mhs->ips3,
                'IPS 4'           => (float) $mhs->ips4,
            ];
        })->toArray();

        $response = Http::post('https://web-production-3198a.up.railway.app/predict-batch', [
            'user_id' => $userId,
            'records' => $records,
        ]);

        if ($response->failed()) {
            return Redirect::route('data-prediksi-mhs')
                ->with('error', 'Gagal melakukan prediksi.');
        }

        $predictions = $response['predictions'];

        // Simpan hasil ke DB
        foreach ($mahasiswas as $index => $mhs) {
            $ipk = ($mhs->ips1 + $mhs->ips2 + $mhs->ips3 + $mhs->ips4) / 4;

            HasilPrediksi::create([
                'user_id'        => $userId,
                'nama'           => $mhs->nama,
                'jenis_kelamin'  => $mhs->jenis_kelamin,
                'status_bekerja' => strtolower($mhs->status_bekerja),
                'status_menikah' => strtolower($mhs->status_menikah),
                'umur'           => $mhs->umur,
                'ips1'           => $mhs->ips1,
                'ips2'           => $mhs->ips2,
                'ips3'           => $mhs->ips3,
                'ips4'           => $mhs->ips4,
                'ipk'            => $ipk,
                'hasil_prediksi' => $predictions[$index],
            ]);

            $mhs->hasil_prediksi = $predictions[$index];
            $mhs->save();
        }

        return Redirect::route('hasil-prediksi')
            ->with('success', 'Prediksi berhasil dilakukan.');
    }
}
