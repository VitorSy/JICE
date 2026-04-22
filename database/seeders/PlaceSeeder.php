<?php

namespace Database\Seeders;

use App\Models\Place;
use Illuminate\Database\Seeder;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $places = [
            "Campo 02",
            "Ginásio 01",
            "Ginásio 02",
            "Quadra Areia 01",
            "Quadra Areia 02",
            "Sala de Jogos",
        ];

        foreach ($places as $place) {
            Place::create([
                'name' => $place,
            ]);
        }
    }
}
