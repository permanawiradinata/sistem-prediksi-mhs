<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'prediction';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'status_bekerja',
        'umur',
        'status_menikah',
        'ips1',
        'ips2',
        'ips3',
        'ips4',
        'ipk',
        'hasil_prediksi',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
