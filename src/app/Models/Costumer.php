<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Costumer extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'email', 'no_hp', 'alamat'];

    public function peminjamans()
    {
        return $this->hasMany(Rental::class);
    }
}
