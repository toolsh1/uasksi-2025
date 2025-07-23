<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kostum extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kostum', 'ukuran', 'harga_sewa', 'stok',
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
