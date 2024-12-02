<?php

namespace App\View\Components\Post;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $cityId;
    public function __construct($cityId)
    {   
            $this->cityId=$cityId;
            dd($cityId);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.post.navbar')->layout('components.layout.main.base');
    }
}
