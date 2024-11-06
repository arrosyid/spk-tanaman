<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTanaman extends Model
{
    use HasFactory;

    protected $table = 'data_tanaman';

    protected $fillable = [
        'nama_tanaman',
    ];

    public function subkriteria()
    {
        return $this->hasmany(DataSubkriteria::class, 'id_tanaman');
    }
}
