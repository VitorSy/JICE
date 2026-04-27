<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectedCategoryButton extends Component
{
    public string $category;
    public string $text;
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $category,
        string $text,
    )
    {
        $this->category = $category;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.selected-category-button');
    }
}
