<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(){
        $this->call([
            ModalSeeder::class,
            TeamSeeder::class,
            PlaceSeeder::class,
            UserSeeder::class,
            StandingSeeder::class,
            GameSeeder::class,
        ]);
    }
}
