<?php

use App\Models\Kelas;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instrukturs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('foto')->nullable();
            $table->string('specialis');
            $table->text('deskripsi')->nullable();
            $table->integer('biaya');
            $table->bigInteger('id_kelas')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrukturs');
    }

    //relasi ke tabel kelas
    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
};
