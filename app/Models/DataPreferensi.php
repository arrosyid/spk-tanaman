<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPreferensi extends Model
{
    use HasFactory;

    protected $table = 'preferensi';

    protected $fillable = [
        'id_tanah',
        'id_tanaman',
        'nilai_preferensi',
        'nama_tanaman',
        'kriteria',
    ];

    public function tanah()
    {
        return $this->hasMany(DataTanah::class, 'id_tanah');
    }

    public function tanaman()
    {
        return $this->hasMany(DataTanaman::class, 'id_tanaman');
    }
}
