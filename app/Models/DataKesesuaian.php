<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKesesuaian extends Model
{
    use HasFactory;

    protected $table = 'data_kesesuaian';

    protected $fillable = [
        'tingkatan',
        'bobot',
    ];
}
