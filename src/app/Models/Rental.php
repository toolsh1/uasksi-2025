<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'costumer_id', 'kostum_id', 'tanggal_pinjam', 'tanggal_kembali', 'status',
    ];

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }

    public function kostum()
    {
        return $this->belongsTo(Kostum::class);
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }

    public function denda()
    {
        return $this->hasOne(Denda::class);
    }
}
