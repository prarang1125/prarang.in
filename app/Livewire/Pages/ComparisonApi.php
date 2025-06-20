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

    public $aiService;

    public function mount(Request $request)
    {
        $this->model = $request->model ?? [];
    }

    public function loadServices()
    {
        $this->aiService =  new ChatAiServices;
        $response = $this->aiService->generateDeepseekResponse('Tell me about Modi');

        if (is_array($response)) {
            $response = implode('', $response);
        }
        $response = $response ?? 'Deepseek failed';

        // Debug or use it as needed
        dd($response); // You can replace this with emitting to frontend or storing in a public variable

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.pages.comparison-api')
            ->layout('components.layout.main.base');
    }
}
