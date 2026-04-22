<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Ranking extends Component
{
    public Collection $ranking;

    public function __construct(Collection $ranking){
        $this->ranking = $ranking;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ranking');
    }
}
