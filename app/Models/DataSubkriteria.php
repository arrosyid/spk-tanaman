<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSubkriteria extends Model
{
    use HasFactory;

    protected $table = 'data_subkriteria';

    protected $fillable = [
        'id_kriteria',
        'id_tanaman',
        'id_kesesuaian',
        'range',
    ];

    /**
     * Relasi dengan model DataKriteria.
     * DataSubkriteria belongs to DataKriteria.
     */
    public function kriteria()
    {
        return $this->belongsTo(DataKriteria::class, 'id_kriteria');
    }

    /**
     * Relasi dengan model DataTanaman.
     * DataSubkriteria belongs to DataTanaman.
     */
    public function tanaman()
    {
        return $this->belongsTo(DataTanaman::class, 'id_tanaman');
    }

    /**
     * Relasi dengan model DataKesesuaian.
     * DataSubkriteria belongs to DataKesesuaian.
     */
    public function kesesuaian()
    {
        return $this->belongsTo(DataKesesuaian::class, 'id_kesesuaian');
    }
}
