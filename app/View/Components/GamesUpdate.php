<?php

namespace App\View\Components;

use App\Models\Game;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GamesUpdate extends Component
{
    public int $gameId;
    public array $game = [];
    /**
     * Create a new component instance.
     */
    public function __construct(
        int $gameId,
    )
    {
        $this->gameId = $gameId;
        $this->game = Game::find($this->gameId)->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string{
        return view('components.games-update');
    }
}
