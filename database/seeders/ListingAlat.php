<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingAlat extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fake = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            \App\Models\ListingAlat::create([
                'nama' => $fake->name,
                'merk' => $fake->sentence(3),
                'kondisi' => $fake->sentence(3),
                'foto' => $fake->imageUrl(640, 480),
                'jumlah' => $fake->numberBetween(1, 10),
            ]);
        }
    }
}
