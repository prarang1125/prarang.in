<?php

namespace App\Livewire\Modules\Partner\Util;

use Livewire\Component;


class ShowDhqRanks extends Component
{

    public $data = [];
    public $title = 'Dhq-Name';
    public $code = 0;
    public $showModal = false;

    public function mount($title = 'Dhq-Name', $code = 0)
    {
        $this->title = $title;
        $this->code = $code;
    }

    public function getDhqData()
    {
        $data = httpGet('v1/partner/get-ranked-data', ['dhq_id' => $this->code, 'table_name' => "e_healths"]);
        $this->data = $data ?? [];
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }




    public function render()
    {
        return view('livewire.modules.partner.util.show-dhq-ranks');
    }
}
