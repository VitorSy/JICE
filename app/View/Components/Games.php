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
        string $day = 'Seg',
    )
    {
        $this->day = $day;
        $games = $gameService->getGames($this->day);
        if(!$games->isEmpty()){
            foreach ($games as $game) {
                $this->games[] = [
                    'id' => $game->id,
                    'team_one' => $game->TeamOne->name ?? 'Time 1',
                    'team_one_points' => $game->team_one_points,
                    'team_one_logo' => $game->TeamOne->logo ?? null,
                    'team_two' => $game->TeamTwo->name ?? 'Time 2',
                    'team_two_points' => $game->team_two_points,
                    'team_two_logo' => $game->TeamTwo->logo ?? null,
                    'place' => $game->place->name ?? 'Local a definir',
                    'modal' => $game->modal->name,
                    'date' => $game->date->format('H:i'),
                    'was_set' => $game->wasSet(),
                ];
            }
        }
    }


    public function render(): View|Closure|string {
        return view('components.games');
    }
}
