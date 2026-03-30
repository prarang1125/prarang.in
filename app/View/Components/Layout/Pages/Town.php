<?php

namespace App\View\Components\Layout\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Town extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public function __construct($metaData, $data)
    {
        $this->data = $data;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.pages.town', ['data'=>$this->data]);
    }
}
