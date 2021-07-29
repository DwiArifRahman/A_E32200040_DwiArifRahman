<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = "detail_transaksi";
    protected $fillable = ['id_produk', 'id_user', 'quantity', 'total', 'bukti', 'status'];

    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
