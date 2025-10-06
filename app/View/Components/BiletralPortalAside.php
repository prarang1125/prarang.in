<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BiletralPortalAside extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public $side;
    public function __construct($data, $side = 'left')
    {
        $this->data = $data;
        $this->side = $side;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside', ['data' => $this->data, 'side' => $this->side]);
    }
}
