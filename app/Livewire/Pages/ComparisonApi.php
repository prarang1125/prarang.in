<?php

namespace App\Livewire\Pages;

use App\Services\ChatAiServices;
use Livewire\Component;
use Illuminate\Http\Request;

class ComparisonApi extends Component
{
    public $prompt;
    public $model = [];
    public $loading = true;
    public $deepseekResponse;

    public $aiService;

    public function mount(Request $request)
    {
        $this->model = $request->model ?? [];
    }

    public function loadServices()
    {
        $this->aiService =  new ChatAiServices();
        $response = $this->aiService->generateDeepseekResponse('Compare Rampur Lucknow Delhi Mumbai');

        if (is_array($response)) {
            $response = implode('', $response);
        }
        $this->deepseekResponse = $response ?? 'Deepseek failed';

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.pages.comparison-api')
            ->layout('components.layout.main.base');
    }
}
