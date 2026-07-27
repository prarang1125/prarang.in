<?php

namespace App\View\Components\BiletralPortalAside;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmbassyData extends Component
{
    public $data;
    public $side;
    public $main;
    public $embassyLink;

    public function __construct($data, $side = 'left', $main = null)
    {
        $this->data = $data;
        $this->side = $side;
        $this->main = $main;

        if ($main) {
            $this->embassyLink = ($side === 'left') ? ($main->primary_embassy_link ?? '') : ($main->secondary_embassy_link ?? '');
        }
    }

    public function render(): View|Closure|string
    {
        return view('components.biletral-portal-aside.embassy-data', [
            'data' => $this->data,
            'side' => $this->side,
            'embassyLink' => $this->embassyLink,
        ]);
    }
}
