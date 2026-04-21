<?php

namespace App\Services;

class TeamService
{
    /**
     * @return array<int, array{team:string,gold:int,silver:int,bronze:int,points:int}>
     */
    public function getMedalRanking(): array
    {
        return [
            ['team' => 'Flamengo', 'gold' => 12, 'silver' => 6, 'bronze' => 4, 'points' => 52],
            ['team' => 'Palmeiras', 'gold' => 11, 'silver' => 7, 'bronze' => 5, 'points' => 50],
            ['team' => 'Corinthians', 'gold' => 10, 'silver' => 5, 'bronze' => 6, 'points' => 46],
            ['team' => 'São Paulo', 'gold' => 9, 'silver' => 6, 'bronze' => 7, 'points' => 45],
            ['team' => 'Santos', 'gold' => 9, 'silver' => 5, 'bronze' => 5, 'points' => 42],
            ['team' => 'Vasco da Gama', 'gold' => 8, 'silver' => 6, 'bronze' => 4, 'points' => 40],
            ['team' => 'Botafogo', 'gold' => 8, 'silver' => 4, 'bronze' => 6, 'points' => 38],
            ['team' => 'Fluminense', 'gold' => 7, 'silver' => 7, 'bronze' => 5, 'points' => 40],
            ['team' => 'Grêmio', 'gold' => 7, 'silver' => 5, 'bronze' => 4, 'points' => 35],
            ['team' => 'Internacional', 'gold' => 6, 'silver' => 6, 'bronze' => 5, 'points' => 35],
            ['team' => 'Atlético Mineiro', 'gold' => 6, 'silver' => 4, 'bronze' => 7, 'points' => 33],
            ['team' => 'Cruzeiro', 'gold' => 5, 'silver' => 7, 'bronze' => 6, 'points' => 35],
            ['team' => 'Bahia', 'gold' => 5, 'silver' => 4, 'bronze' => 5, 'points' => 28],
            ['team' => 'Sport', 'gold' => 4, 'silver' => 5, 'bronze' => 6, 'points' => 28],
            ['team' => 'Fortaleza', 'gold' => 4, 'silver' => 3, 'bronze' => 5, 'points' => 23],
            ['team' => 'Ceará', 'gold' => 3, 'silver' => 4, 'bronze' => 6, 'points' => 23],
            ['team' => 'Athletico Paranaense', 'gold' => 3, 'silver' => 3, 'bronze' => 4, 'points' => 19],
        ];
    }
}
