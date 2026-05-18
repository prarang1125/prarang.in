<?php

namespace App\View\Components\BiletralPortalAside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImportantLinks extends Component
{
    public $data;
    public $side;

    public function __construct($data, $side = 'left')
    {
        $this->data = $data;
        $this->side = $side;
    }

    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside.important-links');
    }
}
