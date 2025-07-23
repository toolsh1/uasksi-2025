<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $fillable = ['peminjaman_id', 'jumlah_denda', 'keterangan'];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
   
}
