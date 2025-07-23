<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = ['rental_id', 'metode', 'total_bayar', 'status'];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
