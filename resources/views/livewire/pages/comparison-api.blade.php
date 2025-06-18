<div wire:init="loadApis" class="min-h-screen">
    {{-- Layout loaded immediately --}}

    {{-- Loader shown during API call --}}
    <div wire:loading wire:target="loadApis" class="py-10 text-center">
        <div class="w-12 h-12 mx-auto border-t-2 border-b-2 border-blue-500 rounded-full animate-spin"></div>
        <p class="mt-4 text-gray-600">Loading AI responses...</p>
    </div>


    <div class="mt-8 space-y-4">
        <p class="text-sm text-gray-500">Generated at: {{ $generatedAt }}</p>

        @if($gptResponse)
        <div>
            <h2 class="font-semibold">GPT Response</h2>
            <pre class="p-2 bg-gray-100">{{ $gptResponse }}</pre>
        </div>
        @endif

        @if($geminiResponse)
        <div>
            <h2 class="font-semibold">Gemini Response</h2>
            <pre class="p-2 bg-gray-100">{{ $geminiResponse }}</pre>
        </div>
        @endif

        @if($claudeResponse)
        <div>
            <h2 class="font-semibold">Claude Response</h2>
            <pre class="p-2 bg-gray-100">{{ $claudeResponse }}</pre>
        </div>
        @endif

        @if($grokResponse)
        <div>
            <h2 class="font-semibold">Grok Response</h2>
            <pre class="p-2 bg-gray-100">{{ $grokResponse }}</pre>
        </div>
        @endif
    </div>

</div>