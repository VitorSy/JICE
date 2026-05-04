<?php

namespace App\Services;

use App\Models\Bracket;
use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class BracketService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private readonly TeamService $teamService,
    )
    {
        //
    }

    public function getKnockoutTeams(int $modal_id, string $category): Collection|null {
        if($category === 'kid'){
            $cupOne = $this->teamService->getTeamsByGroup($modal_id, '6')
                                        ->take(2); 
            $cupTwo = $this->teamService->getTeamsByGroup($modal_id, '7')
                                        ->take(2);
            return $cupOne->merge($cupTwo);
        } else if($category === 'teen'){
            $cupOne = $this->teamService->getTeamsByGroup($modal_id, '8')
                                    ->take(2); 
            $cupTwo = $this->teamService->getTeamsByGroup($modal_id, '9')
                                        ->take(2);
            return $cupOne->merge($cupTwo);
        }
        return null;
    } 


    public function getKnockoutGames(int $modalId, string $category): Collection|null {
        return Bracket::with([
                'game',
                'game.teamOne',
                'game.teamTwo',
                'game.place',
                'game.modal'
            ])
            ->where('modal_id', $modalId)
            ->whereHas('game', function ($query) use ($category) {
                $query->where(
                    'category',
                    $category
                );
            })
            ->orderBy('match_order')
            ->get();
    }


    public function createOrUpdateBracket(int $modal_id, int $game_id, string $stage, int $match_order, ?int $next_bracket_id = null): Bracket {
        return Bracket::updateOrCreate(
            [
                'modal_id' => $modal_id,
                'game_id' => $game_id,
                'stage' => $stage,
                'match_order' => $match_order,
            ],
            [
                'next_bracket_id' => $next_bracket_id,
            ]
        );
    }


    public function updateBracketStandings(Game $game): void {
        $bracket = Bracket::where('game_id', $game->id)->first();

        if($bracket) {
            if($game->team_one_points > $game->team_two_points) {
                $bracket->update([
                    'winner_team_id' => $game->team_one_id
                ]);

            } else if($game->team_two_points > $game->team_one_points) {
                $bracket->update([
                    'winner_team_id' => $game->team_two_id
                ]);
                
            } else {
                $bracket->update([
                    'winner_team_id' => null
                ]);
            }

            if($bracket->match_order === 1){
                Bracket::find($bracket->next_bracket_id)->game->update([
                    'team_one_id' => $bracket->winner_team_id,
                ]);
            } else if($bracket->match_order === 2){
                Bracket::find($bracket->next_bracket_id)->game->update([
                    'team_two_id' => $bracket->winner_team_id,
                ]);
            }
            
        }
    }


}
