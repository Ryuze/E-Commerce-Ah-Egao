<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
    //
    public $fillable = [
        'user_id',
        'nama_produk',
        'total',
        'bukti',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
