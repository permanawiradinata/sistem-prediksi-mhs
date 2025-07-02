<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use App\Models\MahasiswaModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MahasiswaImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $user_id;

    public function __construct($user_id)
    {
        $this->user_id = $user_id;
    }

    public function model(array $row)
    {
        // Jika semua kolom penting kosong, lewati
        if (empty($row['nama']) || empty($row['ipk'])) {
            return null;
        }

        return new MahasiswaModel([
            'nama'              => $row['nama'],
            'jenis_kelamin'     => $this->convertJenisKelamin($row['jenis_kelamin']),
            'status_bekerja'    => $this->convertStatusBekerja($row['status_bekerja']),
            'umur'              => $row['umur'],
            'status_menikah'    => $this->convertStatusMenikah($row['status_menikah']),
            'ips1'              => $row['ips1'],
            'ips2'              => $row['ips2'],
            'ips3'              => $row['ips3'],
            'ips4'              => $row['ips4'],
            'ipk'               => $row['ipk'],
            'user_id'           => $this->user_id, // Tambahkan ini agar tersimpan sesuai user login
        ]);
    }


    private function convertStatusBekerja($value)
    {
        $value = strtolower(trim($value));
        if (in_array($value, ['bekerja', 'ya', '1', 'yes'])) {
            return 'bekerja';
        } else {
            return 'tidak';
        }
    }

    private function convertJenisKelamin($value)
    {
        $value = strtolower(trim($value));
        return $value === 'laki-laki' ? 'laki-laki' : 'perempuan';
    }

    private function convertStatusMenikah($value)
    {
        $value = strtolower(trim($value));
        return $value === 'menikah' ? 'menikah' : 'belum';
    }
}
