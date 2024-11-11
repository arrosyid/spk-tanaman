<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTanah extends Model
{
    use HasFactory;
    protected $table = 'data_tanah';

    protected $fillable = [
        'kode_tanah',
        'lokasi_tanah',
    ];

    public function kondisiTanah(){
        return $this->hasMany(KondisiTanah::class, 'id_tanah');
    }
}
