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


    public function addStandings(Game $game): void {
        $standingTeamOne = Standing::where('modal_id', $game->modal_id)
            ->where('team_id', $game->team_one_id)
            ->first();

        $standingTeamTwo = Standing::where('modal_id', $game->modal_id)
            ->where('team_id', $game->team_two_id)
            ->first();

        if ($game->team_one_points > $game->team_two_points) {
            $standingTeamOne
                ->addWin()
                ->updateGoals(
                    $game->team_one_points,
                    $game->team_two_points
                );

            $standingTeamTwo
                ->addLoss()
                ->updateGoals(
                    $game->team_two_points,
                    $game->team_one_points
                );

        }
        elseif ($game->team_two_points > $game->team_one_points) {
            $standingTeamOne
                ->addLoss()
                ->updateGoals(
                    $game->team_one_points,
                    $game->team_two_points
                );

            $standingTeamTwo
                ->addWin()
                ->updateGoals(
                    $game->team_two_points,
                    $game->team_one_points
                );

        }
        else {
            $standingTeamOne
                ->addDraw()
                ->updateGoals(
                    $game->team_one_points,
                    $game->team_two_points
                );

            $standingTeamTwo
                ->addDraw()
                ->updateGoals(
                    $game->team_two_points,
                    $game->team_one_points
                );
        }
    }


    public function removeStandings(Game $game){
        $standingTeamOne = Standing::where('modal_id', $game->modal_id)
            ->where('team_id', $game->team_one_id)
            ->first();
        $team_one_points = $game->team_one_points;

        $standingTeamTwo = Standing::where('modal_id', $game->modal_id)
            ->where('team_id', $game->team_two_id)
            ->first();
        $team_two_points = $game->team_two_points;
            
        if($team_one_points > $team_two_points){
            $standingTeamOne
                    ->removeWin()
                    ->updateGoals(
                        -$team_one_points,
                        -$team_two_points
                    );

            $standingTeamTwo
                ->removeLoss()
                ->updateGoals(
                    -$team_two_points,
                    -$team_one_points
                );
        } 
        elseif($team_one_points < $team_two_points){
            $standingTeamOne
                ->removeLoss()
                ->updateGoals(
                    -$team_one_points,
                    -$team_two_points
                );

            $standingTeamTwo
                ->removeWin()
                ->updateGoals(
                    -$team_two_points,
                    -$team_one_points
                );
        } 
        else {
            $standingTeamOne
                ->removeDraw()
                ->updateGoals(
                    -$team_one_points,
                    -$team_two_points
                );

            $standingTeamTwo
                ->removeDraw()
                ->updateGoals(
                    -$team_two_points,
                    -$team_one_points
                );
        }
    }
}
