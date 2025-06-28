<?php

namespace App\Livewire\Utility;

use Livewire\Attributes\On;
use Livewire\Component;

class Share extends Component
{
    public string $title = '';
    public string $description = '';
    public string $url = '';



    // public function mount()
    // {

    //     $this->dispatch('openBootstrapInfoModal');
    // }
    #[On('loadsharemodal')]
    public function load(string $title, string $url, ?string $description = null): void
    {
        $this->title = $title;
        $this->description = strip_tags($description ?? '');
        $this->url = filter_var($url, FILTER_VALIDATE_URL) ?: url()->current();

        $this->dispatch('openBootstrapInfoModal');
    }


    public function copyLink(): void
    {
        $this->dispatch('copied', ['url' => $this->url]);
    }

    public function render()
    {
        return view('livewire.utility.share');
    }
}
