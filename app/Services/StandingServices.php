<?php

namespace App\Services;

use App\Models\Game;
use App\Models\Standing;

class StandingServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function updateStandingsAfterGameScoreUpdate(Game $game){
        $standing = Standing::updateOrCreate([
            'modal_id' => $game->modal_id,
            'team_id' => $game->team_one_id,
            
        ]);
    }


    public function whoWins(Game $game): int {
        if($game->team_one_points > $game->team_two_points){
            return $game->team_one_id;
        } else if($game->team_two_points > $game->team_one_points){
            return $game->team_two_id;
        } else {
            return 0; // empate
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    // public function recalculateGoalDifference(): void
    // {
    //     $this->goal_difference = $this->goals_for - $this->goals_against;
    // }


    // public function addWin(): void
    // {
    //     $this->wins++;
    //     $this->played++;
    //     $this->points += 3;

    //     $this->save();
    // }


    // public function addDraw(): void
    // {
    //     $this->draws++;
    //     $this->played++;
    //     $this->points += 1;

    //     $this->save();
    // }


    // public function addLoss(): void
    // {
    //     $this->losses++;
    //     $this->played++;

    //     $this->save();
    // }
}
