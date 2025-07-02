<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DatasetModel extends Model
{
    // use HasFactory;

    protected $table = 'datasets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'data'
    ];
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
