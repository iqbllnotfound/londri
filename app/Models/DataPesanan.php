<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataPesanan extends Model
{
    protected $table = 'data_pesanans';
    protected $fillable = ['nama', 'noHp', 'total_berat', 'total_harga', 'status'];
}
