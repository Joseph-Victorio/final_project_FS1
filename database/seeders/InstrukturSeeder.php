<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrukturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Instruktur::create([
                'nama' => $faker->name,
                'email' => $faker->email,
                'foto' => $faker->imageUrl(640, 480),
                'specialis' => $faker->sentence(3),
                'deskripsi' => $faker->sentence(10),
                'biaya' => $faker->numberBetween(100000, 1000000),
                'id_kelas' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
