<?php

namespace App\View\Components\Layout\Portal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CountryBase extends Component
{
    /**
     * Create a new component instance.
     */
    public $portal;

    public function __construct($portal = [])
    {
        $this->portal = $portal;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.portal.country_base');
    }
}
