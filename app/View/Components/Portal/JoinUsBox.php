<?php

namespace App\View\Components\Portal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class JoinUsBox extends Component
{
    /**
     * Create a new component instance.
     */
    public $showWidget;
    public function __construct($showWidget = true)
    {
        $this->showWidget = $showWidget;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.join-us-box');
    }
}
