<?php

namespace App\Http\Controllers;

use App\Models\HasilPrediksi;
use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // function index()
    // {
    //     $total_data_mhs = MahasiswaModel::count();
    //     return view('dashboard', compact('total_data_mhs'));
    // }

    public function index()
    {
        $user = Auth::user(); // Ambil user yang sedang login

        // Ambil data mahasiswa milik user ini saja
        $data_mhs = MahasiswaModel::where('user_id', $user->id)->get();
        $hasil_prediksi = HasilPrediksi::where('user_id', $user->id)->get();
        $dataprediksi = MahasiswaModel::where('user_id', $user->id)
            ->whereNull('hasil_prediksi') // hanya ambil data yang belum diprediksi
            ->orderBy('id', 'desc')
            ->get();

        // Hitung total data mahasiswa milik user ini
        $total_data_mhs = $data_mhs->count();
        $total_hasil_prediksi = $hasil_prediksi->count();
        $total_data_prediksi = $dataprediksi->count();

        return view('dashboard', compact('user', 'data_mhs', 'total_data_mhs', 'total_hasil_prediksi', 'total_data_prediksi'));
    }



    // function index2()
    // {
    //     return view('dashboard2');
    // }
}
