<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktur extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // relasi ke tabel kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id');
    }
}
