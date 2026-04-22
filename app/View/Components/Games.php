<?php

namespace App\View\Components;

use App\Models\Place;
use App\Services\GameService;
use App\Services\ModalService;
use App\Services\PlaceService;
use App\Services\TeamService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Games extends Component
{
    public array $games = [];
    public string $day;
    

    public function __construct(
        GameService $gameService, 
        TeamService $teamService,
        PlaceService $placeService,
        ModalService $modalService,
        string $day = 'Seg',
    )
    {
        $this->day = $day;
        $games = $gameService->getGames($this->day);
        if(!$games->isEmpty()){
            foreach ($games as $game) {
                $this->games[] = [
                    'id' => $game->id,
                    'team_one' => $teamService->getTeam($game->team_one_id)->name,
                    'team_two' => $teamService->getTeam($game->team_two_id)->name,
                    'place' => $placeService->getPlace($game->place_id)->name,
                    'modal' => $modalService->getModal($game->modal_id)->name,
                    'date' => $game->date,
                ];
            }
        }
        
    }


    public function render(): View|Closure|string {
        return view('components.games');
    }
}
