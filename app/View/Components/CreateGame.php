<?php

namespace App\View\Components;

use App\Services\ModalService;
use App\Services\PlaceService;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class CreateGame extends Component
{
    public Collection $modals;
    public Collection $teams;
    public Collection $places;
    /**
     * Create a new component instance.
     */
    public function __construct(
        private readonly PlaceService $placeService,
        private readonly ModalService $modalService,
        Collection $teams
    )
    {
        $this->modals = $this->modalService->getModals();
        $this->places = $this->placeService->getPlaces();
        $this->teams = $teams;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.create-game');
    }
}
