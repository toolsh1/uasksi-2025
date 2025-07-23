<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['peminjaman_id', 'jumlah_bayar', 'tanggal_bayar', 'metode'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
