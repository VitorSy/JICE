<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;
use App\Services\ModalService;

class Modals extends Component
{
    public string $category;
    public Collection $modals;
    
    public function __construct(
        string $category,
    )
    {
        $modalService = new ModalService();
        $this->category = $category;
        $this->modals = $modalService->getModals();
    }


    public function render(): View|Closure|string{
        return view('components.modals');
    }
}
