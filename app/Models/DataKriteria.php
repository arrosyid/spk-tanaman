<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;

    protected $table = 'data_kriteria';

    protected $fillable = [
        'kode_kriteria',
        'nama_kriteria',
        'type',
        'bobot',
    ];
}
