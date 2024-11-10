<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiTanah extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kondisi_tanah';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'id_kriteria',
        'id_tanah',
        'nilai',
        'bulan'
    ];

    /**
     * Relasi ke model DataKriteria (many-to-one)
     */
    public function kriteria()
    {
        return $this->belongsTo(DataKriteria::class, 'id_kriteria');
    }

    /**
     * Relasi ke model DataTanah (many-to-one)
     */
    public function tanah()
    {
        return $this->belongsTo(DataTanah::class, 'id_tanah');
    }
}
