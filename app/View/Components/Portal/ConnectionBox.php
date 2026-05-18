<?php

namespace App\View\Components\Portal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ConnectionBox extends Component
{
    public $main;
    public $primary;
    public $secondary;
    public $locale;
    /**
     * Create a new component instance.
     */
    public function __construct($main, $primary, $secondary, $locale)
    {
        $this->main = $main;
        $this->primary = $primary;
        $this->secondary = $secondary;
        $this->locale = $locale;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.portal.connection-box');
    }
}
