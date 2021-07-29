<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $fillable = ['id_produk', 'id_user', 'status'];

    function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}