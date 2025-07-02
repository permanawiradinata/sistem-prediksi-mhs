<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DatasetController extends Controller
{
    public function uploadDataset(Request $request)
    {
        $request->validate([
            'dataset' => 'required|file|mimes:xls,xlsx'
        ]);

        $response = Http::attach(
            'file',
            file_get_contents($request->file('dataset')->getRealPath()),
            $request->file('dataset')->getClientOriginalName()
        )->post('http://127.0.0.1:5000/upload-dataset');

        if ($response->failed()) {
            return response()->json(['error' => 'Gagal upload dataset ke API'], 500);
        }

        return response()->json($response->json());
    }
}
