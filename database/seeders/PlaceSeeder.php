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
        Place::create([
            'name' => 'Campo 01',
            'name' => 'Campo 02',
            'name' => 'Ginásio 01',
            'name' => 'Ginásio 02',
            'name' => 'Quadra Areia 01',
            'name' => 'Quadra Areia 02',
            'name' => 'Sala de Jogos',
        ]);
    }
}
