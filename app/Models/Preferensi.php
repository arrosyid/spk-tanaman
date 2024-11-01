<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferensi extends Model
{
    use HasFactory;
    protected $table = 'preferensi';

    protected $fillable = [
        'id_tanaman',
        'id_tanah',
        'nilai_preferensi',
        'tingkat',
    ];

    /**
     * Relasi dengan model DataTanaman.
     * Preferensi belongs to DataTanaman.
     */
    public function tanaman()
    {
        return $this->belongsTo(DataTanaman::class, 'id_tanaman');
    }

    /**
     * Relasi dengan model DataTanah.
     * Preferensi belongs to DataTanah.
     */
    public function tanah()
    {
        return $this->belongsTo(DataTanah::class, 'id_tanah');
    }
}
