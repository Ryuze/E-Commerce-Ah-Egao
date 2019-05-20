<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public $timestamps = false;
    public $fillable = [
        'nama_produk',
        'harga',
        'foto',
        'tag',
    ];

    //ga yakin pke ini, baca dokumentasi eloquent laravel dulu
}
