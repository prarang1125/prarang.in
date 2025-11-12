# OpenRouter API Testing on Ubuntu/Linux

This guide shows how to test the OpenRouter API service on Ubuntu/Linux systems.

## Prerequisites

```bash
# Install curl (usually pre-installed)
sudo apt-get update
sudo apt-get install curl

# Install jq for JSON formatting (optional but recommended)
sudo apt-get install jq

# Install Node.js if not already installed
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt-get install -y nodejs
```

## Quick Start

### 1. Start the OpenRouter Service

```bash
# Navigate to OpenRouter directory
cd OpenRouter

# Install dependencies (if not done yet)
npm install

# Start the service
node app.js
```

Expected output:
```
🚀 AI Service running on port 4000
```

### 2. Test in Another Terminal

#### Simple Test (Basic)

```bash
# Basic curl request
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{
    "prompt": "Hello world",
    "models": ["openrouter/auto"]
  }'
```

#### Using Shell Script (Recommended)

```bash
# Make script executable
chmod +x test-openrouter.sh

# Run simple test
./test-openrouter.sh
```

#### Advanced Test with Multiple Models

```bash
# Make script executable
chmod +x test-openrouter-advanced.sh

# Run with default prompt and models
./test-openrouter-advanced.sh

# Run with custom prompt
./test-openrouter-advanced.sh "Write a poem about AI"

# Run with specific models
./test-openrouter-advanced.sh "Hello" "openai/gpt-3.5-turbo" "anthropic/claude-3-sonnet"
```

## Available Models

### Popular Models
- `openai/gpt-3.5-turbo` - Fast and efficient
- `openai/gpt-4` - Most capable
- `anthropic/claude-3-sonnet` - Balanced
- `anthropic/claude-3-opus` - Most powerful
- `meta-llama/llama-2-70b-chat` - Open source
- `google/gemini-2.0-flash-lite-001` - Fast Google model
- `openrouter/auto` - Auto-select best model

### Specialized Models
- `deepseek/deepseek-r1-distill-llama-70b` - Reasoning optimized
- `mistral/mistral-large` - Fast Mistral model
- `google/gemini-pro` - Google's pro model

## Command Examples

### Example 1: Simple Question

```bash
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{
    "prompt": "What is the capital of France?",
    "models": ["openai/gpt-3.5-turbo"]
  }' | jq
```

### Example 2: Multiple Models Comparison

```bash
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{
    "prompt": "Explain machine learning",
    "models": [
      "openai/gpt-3.5-turbo",
      "anthropic/claude-3-sonnet",
      "meta-llama/llama-2-70b-chat"
    ]
  }' | jq
```

### Example 3: Code Generation

```bash
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{
    "prompt": "Write a Python function to calculate factorial",
    "models": [
      "openai/gpt-3.5-turbo",
      "google/gemini-2.0-flash-lite-001"
    ]
  }' | jq
```

### Example 4: Using Environment Variables

```bash
# Set API URL
export OPENROUTER_URL="http://localhost:4000/run"

# Run advanced test
./test-openrouter-advanced.sh "Your prompt here" "model1" "model2"
```

## Using with curl and jq

### Pretty Print JSON Response

```bash
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{"prompt": "Hello", "models": ["openrouter/auto"]}' | jq
```

### Extract Specific Field

```bash
# Get only the responses
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{"prompt": "Hello", "models": ["openrouter/auto"]}' | jq '.responses'
```

### Filter by Status

```bash
# Get only successful responses
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{"prompt": "Hello", "models": ["openrouter/auto"]}' | jq '.responses[] | select(.status == "success")'
```

## Batch Processing

### Process Multiple Prompts

```bash
#!/bin/bash

# File: batch-test.sh
PROMPTS=(
  "What is AI?"
  "Explain machine learning"
  "What is quantum computing?"
)

for prompt in "${PROMPTS[@]}"; do
  echo "Testing: $prompt"
  curl -X POST http://localhost:4000/run \
    -H "Content-Type: application/json" \
    -d "{\"prompt\": \"$prompt\", \"models\": [\"openrouter/auto\"]}" | jq '.responses[0].output'
  echo "---"
  sleep 2  # 2 second delay between requests
done
```

Run it:
```bash
chmod +x batch-test.sh
./batch-test.sh
```

## Troubleshooting

### Connection Refused

```bash
# Check if service is running
curl -v http://localhost:4000

# If not running, start it:
cd OpenRouter
node app.js
```

### API Key Issues

Check that `OPENROUTER_API_KEY` is set in `.env`:

```bash
cd OpenRouter
cat .env | grep OPENROUTER_API_KEY
```

### Timeout Issues

Increase timeout for slower models:

```bash
curl --max-time 600 -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{"prompt": "Complex task", "models": ["openai/gpt-4"]}'
```

### View Full Response with Timing

```bash
curl -w "\n\nTime: %{time_total}s\nHTTP Status: %{http_code}\n" \
  -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{"prompt": "Hello", "models": ["openrouter/auto"]}'
```

## Systemd Service (Optional)

Create `/etc/systemd/system/openrouter.service`:

```ini
[Unit]
Description=OpenRouter API Service
After=network.target

[Service]
Type=simple
User=your_username
WorkingDirectory=/path/to/prarang.in/OpenRouter
ExecStart=/usr/bin/node app.js
Restart=on-failure
RestartSec=10

[Install]
WantedBy=multi-user.target
```

Enable and start:

```bash
sudo systemctl daemon-reload
sudo systemctl enable openrouter
sudo systemctl start openrouter
sudo systemctl status openrouter
```

View logs:

```bash
sudo journalctl -u openrouter -f
```

## Integration with Laravel

From your Laravel application:

```php
// app/Services/OpenRouterService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenRouterService
{
    public static function callApi($prompt, $models = [])
    {
        $response = Http::timeout(300)
            ->post('http://localhost:4000/run', [
                'prompt' => $prompt,
                'models' => $models,
            ]);
        
        return $response->json();
    }
}
```

Usage:

```php
$result = OpenRouterService::callApi(
    'Explain AI',
    ['openai/gpt-3.5-turbo', 'anthropic/claude-3-sonnet']
);
```

## Performance Tips

1. **Use connection pooling** for multiple requests
2. **Increase timeout** for complex tasks (up to 300 seconds)
3. **Use smaller models** for quick responses
4. **Batch requests** when possible
5. **Monitor API logs** for bottlenecks

## Resources

- [OpenRouter Documentation](https://openrouter.ai/docs)
- [Bash Scripting Guide](https://www.gnu.org/software/bash/manual/)
- [curl Manual](https://curl.se/docs/manual.html)
- [jq Manual](https://stedolan.github.io/jq/manual/)

---

**Questions or Issues?** Check the main README.md or contact support.
