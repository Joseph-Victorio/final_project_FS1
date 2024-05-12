<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    // guarded id
    protected $guarded = ['id, id_instruktur'];
    //relasi ke tabel Instruktur
    public function instruktur()
    {
        return $this->belongsTo(Instruktur::class, 'id_instruktur', 'id');
    }
}
