<?php

namespace App\Http\Controllers;

use App\Models\DatasetModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ModelController extends Controller
{
    // public function uploadDataset(Request $request)
    // {
    //     $request->validate([
    //         'dataset' => 'required|file|mimes:xlsx,xls',
    //     ]);

    //     $file = $request->file('dataset');
    //     $path = $file->getRealPath();

    //     $response = Http::attach(
    //         'dataset',
    //         file_get_contents($path),
    //         $file->getClientOriginalName()
    //     )->post('http://127.0.0.1:5000/retrain');

    //     if ($response->successful()) {
    //         return back()->with('success', 'Model berhasil dilatih ulang.');
    //     } else {
    //         return back()->with('error', 'Gagal melatih ulang model.');
    //     }
    // }
    public function uploadDataset(Request $request)
    {
        $request->validate([
            'dataset' => 'required|file|mimes:xlsx,xls',
        ]);

        $file = $request->file('dataset');
        $path = $file->getRealPath();

        $data = \Maatwebsite\Excel\Facades\Excel::toArray([], $file); // Install Laravel Excel jika belum
        $datasetArray = $data[0]; // Ambil sheet pertama

        // Simpan ke database
        DatasetModel::create([
            'user_id' => Auth::id(),
            'data' => json_encode($datasetArray)
        ]);

        // Kirim ke Flask untuk retrain
        $response = Http::attach(
            'dataset',
            file_get_contents($path),
            $file->getClientOriginalName()
        )->post('https://web-production-3198a.up.railway.app/retrain', [
            'user_id' => Auth::id(), // Kirim user_id ke API Flask
        ]);

        if ($response->successful()) {
            return back()->with('success', 'Model berhasil dilatih ulang.');
        } else {
            return back()->with('error', 'Gagal melatih ulang model.');
        }
    }
}
