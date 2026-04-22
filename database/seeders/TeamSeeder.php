<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;


class TeamSeeder extends Seeder
{
    public function run(): void {
        $teams = [];

        // 6º ano (A-D)
        foreach (range('A', 'D') as $letra) {
            $teams[] = [
                'name' => '6' . $letra,
                'level' => 'kid',
            ];
        }

        // 7º ano (A-D)
        foreach (range('A', 'D') as $letra) {
            $teams[] = [
                'name' => '7' . $letra,
                'level' => 'kid',
            ];
        }

        // 8º ano (A-E)
        foreach (range('A', 'E') as $letra) {
            $teams[] = [
                'name' => '8' . $letra,
                'level' => 'teen',
            ];
        }

        // 9º ano (A-D)
        foreach (range('A', 'D') as $letra) {
            $teams[] = [
                'name' => '9' . $letra,
                'level' => 'teen',
            ];
        }

        foreach ($teams as $team) {
            Team::create([
                'name' => $team['name'],
                'level' => $team['level'],
                'gold' => 0,
                'silver' => 0,
                'bronze' => 0,
                'points' => 0,
            ]);
        }
    }
}
