<?php

namespace App\Livewire\Pages;

use App\Services\ChatAiServices;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ComparisonApi extends Component
{

    protected $aiService;
    public $prompt;
    public $model = [];
    public $content;
    public $gptResponse;
    public $geminiResponse;
    public $claudeResponse;
    public $grokResponse;
    public $generatedAt;

    public $isLoading = false;
    public function mount(ChatAiServices $aiService)
    {
        $request = request();
        $this->prompt = $request->prompt;
        $this->model = $request->model;
        $this->content = $request->content;
        $this->aiService = $aiService;
        $this->dispatch('load-apis');
    }

    public function render()
    {
        return view('livewire.pages.comparison-api')->layout('components.layout.main.base');
    }


    public function loadApis()
    {

        $this->validate([
            'prompt' => 'required|string',
            'model' => 'required|array',
            'model.*' => 'in:chatgpt,gemini,claude,grok',
            'content' => 'nullable|string',
        ]);
    }
}
