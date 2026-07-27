<?php

namespace App\View\Components\BiletralPortalAside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class YellowPages extends Component
{
    public $data;
    public $side;
    public $main;
    public $ypData = [];

    public function __construct($data, $side = 'left', $main = null)
    {
        $this->data = $data;
        $this->side = $side;
        $this->main = $main;

        if ($main) {
            $ypString = ($side === 'left') ? ($main->primary_yp ?? '') : ($main->secondary_yp ?? '');
            $this->ypData = array_filter(explode('|', $ypString)) ?: [];
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside.yellow-pages');
    }
}
