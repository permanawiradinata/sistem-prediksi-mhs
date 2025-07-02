<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPrediksi extends Model
{
    protected $table = 'hasil_prediksi';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'nama',
        'jenis_kelamin',
        'status_bekerja',
        'status_menikah',
        'umur',
        'ips1',
        'ips2',
        'ips3',
        'ips4',
        'ipk',
        'hasil_prediksi',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'id');
    }
}
