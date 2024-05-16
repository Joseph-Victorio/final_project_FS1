<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        $users = \App\Models\User::pluck('id')->toArray();
        $instrukturs = \App\Models\Instruktur::pluck('id')->toArray();
        $kelas = \App\Models\Kelas::pluck('id')->toArray();
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Transaksi::create([
                'id_user' => $faker->randomElement($users),
                'id_instruktur' => $faker->randomElement($instrukturs),
                'id_kelas' => $faker->randomElement($kelas),
                'total_pembayaran' => $faker->numberBetween(100000, 1000000),
                'status' => $faker->randomElement(['Dibayar', 'Belum Dibayar']),
            ]);
        }
    }
}
