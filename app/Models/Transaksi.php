<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // relasi ke tabel kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }

    // relasi ke table Instruktur
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'id_instruktur', 'id');
    }

    // relasi ke table User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
