<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'costumer_id',
        'kostum_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'total_biaya',
        'status'
    ];

    public function kostum()
    {
        return $this->belongsTo(Kostum::class);
    }

    public function costumer()
    {
        return $this->belongsTo(Costumer::class);
    }
}
