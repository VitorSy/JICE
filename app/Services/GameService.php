<?php

namespace App\Services;

use App\Models\Game;
use Illuminate\Database\Eloquent\Model;

class GameService
{
    public array $daysMap = [
        'Seg' => 2,
        'Ter' => 3,
        'Qua' => 4,
        'Qui' => 5,
        'Sex' => 6,
    ];

    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function createGame(array $data): Model {
        $game = Game::create([
            'stage_type'  => $data['stage_type'],
            'team_one_id' => $data['team_one_id'],
            'team_two_id' => $data['team_two_id'],
            'place_id'    => $data['place_id'],
            'modal_id'    => $data['modal_id'],
            'date'        => $data['date'],
        ]);

        return $game;
    }


    public function getGames(string $day) {
        return Game::whereRaw('DAYOFWEEK(date) = ?', [$this->daysMap[$day]])->with(['teamOne', 'teamTwo', 'place', 'modal'])->get();
    }


    public function getGame(int $gameId): Game {
        return Game::find($gameId);
    }


    public function updateGameScore(array $data): Game {
        $game = Game::find($data['game_id']);
        $game->team_one_points = $data['team_one_points'];
        $game->team_two_points = $data['team_two_points'];
        $game->save();
        return $game;
    }
}
