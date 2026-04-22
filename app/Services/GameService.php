<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class GameService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function createGame(array $data): Model {
        $game = Game::create([
            'team_one_id' => $data['team_one_id'],
            'team_two_id' => $data['team_two_id'],
            'place_id'    => $data['place_id'],
            'modal_id'    => $data['modal_id'],
            'date'        => $data['date'],
        ]);

        return $game;
    }
}
