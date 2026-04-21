<?php

namespace App\Services;

class TeamService
{
    /**
     * @return array<int, string>
     */
    public function getTeams(): array
    {
        return [
            'Flamengo',
            'Palmeiras',
            'Corinthians',
            'São Paulo',
            'Santos',
            'Vasco da Gama',
            'Botafogo',
            'Fluminense',
            'Grêmio',
            'Internacional',
            'Atlético Mineiro',
            'Cruzeiro',
            'Bahia',
            'Sport',
            'Fortaleza',
            'Ceará',
            'Athletico Paranaense',
        ];
    }
}
