<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $fillable = ['id_user', 'total_bayar', 'alamat', 'bukti', 'status', 'atas_nama', 'jasa_pengiriman', 'no_resi'];

    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}