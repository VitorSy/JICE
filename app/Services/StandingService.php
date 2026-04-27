<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Standing;

class StandingService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function updateStandings(Game $game){
        if($game->team_one_points > $game->team_two_points){
            Standing::where('modal_id', $game->modal_id)
                            ->where('team_id', $game->team_one_id)
                            ->first()
                            ->addWin()
                            ->updateGoals($game->team_one_points, $game->team_two_points);
            Standing::where('modal_id', $game->modal_id)
                            ->where('team_id', $game->team_two_id)
                            ->first()
                            ->addLoss()
                            ->updateGoals($game->team_two_points, $game->team_one_points);

        } else if($game->team_two_points > $game->team_one_points){
            Standing::where('modal_id', $game->modal_id)
                            ->where('team_id', $game->team_two_id)
                            ->first()
                            ->addWin()
                            ->updateGoals($game->team_two_points, $game->team_one_points);

            Standing::where('modal_id', $game->modal_id)
                            ->where('team_id', $game->team_one_id)
                            ->first()
                            ->addLoss()
                            ->updateGoals($game->team_one_points, $game->team_two_points);
        } else {
            Standing::where('modal_id', $game->modal_id)
                            ->where('team_id', $game->team_one_id)
                            ->first()
                            ->addDraw()
                            ->updateGoals($game->team_one_points, $game->team_two_points);
            Standing::where('modal_id', $game->modal_id)
                            ->where('team_id', $game->team_two_id)
                            ->first()
                            ->addDraw()
                            ->updateGoals($game->team_two_points, $game->team_one_points);
        }
    }
}
