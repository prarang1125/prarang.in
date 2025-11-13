# Multiple API Keys with Random/Round-Robin Rotation

## Features

✅ **4 API Keys** - Load balance across 4 different OpenRouter accounts
✅ **Random Selection** - Pick a random key for each request
✅ **Round-Robin** - Rotate through keys sequentially
✅ **Load Balancing** - Distribute API calls to avoid rate limits
✅ **Error Recovery** - If one key fails, others can still work

## Configuration

### Update .env

```bash
OPENROUTER_API_KEY_1=sk-or-v1-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
OPENROUTER_API_KEY_2=sk-or-v1-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
OPENROUTER_API_KEY_3=sk-or-v1-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
OPENROUTER_API_KEY_4=sk-or-v1-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
PORT=4000
```

## Usage

### 1. Random Key Selection (Default)

Each request picks a **random API key** from the pool:

```json
{
  "prompt": "Hello world",
  "models": ["openai/gpt-3.5-turbo"],
  "random_key": true
}
```

**Console Output:**
```
🔀 Key rotation mode: RANDOM
🔑 Using API Key #3 (sk-or-v1-49a5b6c66c...)
🔑 Using API Key #1 (sk-or-v1-d29172b48...)
🔑 Using API Key #2 (sk-or-v1-5e1c58deb...)
```

### 2. Round-Robin Rotation

Keys are used **sequentially** (Key 1 → Key 2 → Key 3 → Key 4 → Key 1...):

```json
{
  "prompt": "Hello world",
  "models": ["openai/gpt-3.5-turbo"],
  "random_key": false
}
```

**Console Output:**
```
🔀 Key rotation mode: ROUND-ROBIN
🔑 Using API Key #1 (sk-or-v1-d29172b48...)
🔑 Using API Key #2 (sk-or-v1-5e1c58deb...)
🔑 Using API Key #3 (sk-or-v1-257b4b9ec...)
🔑 Using API Key #4 (sk-or-v1-49a5b6c66...)
```

## Examples

### Example 1: Multiple Models with Random Keys

```bash
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{
    "prompt": "Explain quantum computing",
    "models": [
      "openai/gpt-3.5-turbo",
      "anthropic/claude-3-sonnet",
      "meta-llama/llama-2-70b-chat",
      "google/gemini-2.0-flash-lite-001"
    ],
    "random_key": true
  }' | jq
```

Each model call will use a **different random API key**.

### Example 2: Round-Robin for Load Distribution

```bash
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d '{
    "prompt": "Write code",
    "models": ["openai/gpt-4"],
    "random_key": false
  }' | jq
```

### Example 3: Using PowerShell (Windows)

```powershell
$body = @{
    prompt = "Hello world"
    models = @("openai/gpt-3.5-turbo", "anthropic/claude-3-sonnet")
    random_key = $true
} | ConvertTo-Json

Invoke-WebRequest -Uri "http://localhost:4000/run" `
  -Method POST `
  -Headers @{"Content-Type"="application/json"} `
  -Body $body | ConvertFrom-Json | ConvertTo-Json -Depth 10
```

### Example 4: Using Bash (Linux/Ubuntu)

```bash
curl -X POST http://localhost:4000/run \
  -H "Content-Type: application/json" \
  -d @test-input-random-keys.json | jq '.responses[] | {model: .model, status: .status, duration: .duration}'
```

### Example 5: Batch Requests

```bash
#!/bin/bash

PROMPTS=(
  "What is AI?"
  "Explain ML"
  "What is deep learning?"
  "Quantum computing basics"
)

for prompt in "${PROMPTS[@]}"; do
  echo "Processing: $prompt"

  curl -s -X POST http://localhost:4000/run \
    -H "Content-Type: application/json" \
    -d "{
      \"prompt\": \"$prompt\",
      \"models\": [\"openai/gpt-3.5-turbo\"],
      \"random_key\": true
    }" | jq '.responses[0]'

  echo "---"
  sleep 1
done
```

## Response Format

```json
{
  "prompt": "Your prompt",
  "total_duration": "12.34s",
  "total_models": 4,
  "successful": 3,
  "failed": 1,
  "key_rotation": "random",
  "responses": [
    {
      "model": "openai/gpt-3.5-turbo",
      "output": "Response text...",
      "status": "success",
      "duration": "3.45"
    },
    {
      "model": "anthropic/claude-3-sonnet",
      "output": "Response text...",
      "status": "success",
      "duration": "4.56"
    }
  ]
}
```

## Benefits

### 1. **Rate Limit Avoidance**
- Each API key has its own rate limit
- Distribute calls across 4 keys = 4x capacity
- Example: If each key allows 100 req/min, total = 400 req/min

### 2. **Cost Optimization**
- Balance usage across accounts
- If one key hits limit, others still work
- Better credit management

### 3. **Reliability**
- If one key fails (invalid, revoked), others work
- No single point of failure
- Automatic fallback to other keys

### 4. **Performance**
- Random selection = best distribution
- Round-robin = predictable rotation
- Both reduce wait times

## Key Rotation Logic

### Random Mode
```javascript
// Each request picks a random key
const randomIndex = Math.floor(Math.random() * API_KEYS.length);
const key = API_KEYS[randomIndex];
```

Best for: Variable load, unpredictable traffic

### Round-Robin Mode
```javascript
// Sequential rotation
keyIndex = (keyIndex + 1) % API_KEYS.length;
const key = API_KEYS[keyIndex];
```

Best for: Even distribution, predictable patterns

## Monitoring

### Check Console Output

```bash
node app.js
```

You'll see:
```
🔄 Processing 4 models...
🔀 Key rotation mode: RANDOM
🔑 Using API Key #2 (sk-or-v1-49a5b6c...)
⏳ Calling openai/gpt-3.5-turbo...
✅ openai/gpt-3.5-turbo completed in 3.45s
✨ All models completed in 12.34s
```

## Troubleshooting

### Invalid API Key Error
```
Error: 401 Unauthorized
```
Solution: Verify all 4 keys in .env are valid

### Rate Limit Error
```
Error: 429 Too Many Requests
```
Solution: Decrease request frequency or add more keys

### No Keys Loaded
```
Only 0 keys available
```
Solution: Check .env variables are properly set

## Advanced Configuration

### Custom Key Pool

Edit `app.js`:
```javascript
const API_KEYS = [
    process.env.OPENROUTER_API_KEY_1,
    process.env.OPENROUTER_API_KEY_2,
    process.env.OPENROUTER_API_KEY_3,
    process.env.OPENROUTER_API_KEY_4,
    process.env.OPENROUTER_API_KEY_5, // Add more if needed
];
```

### Custom Rotation Strategy

Create a new function in `app.js`:
```javascript
function getWeightedApiKey() {
    // Return key based on current usage/load
    // Example: Prefer keys with lower usage
}
```

## API Endpoint

**POST** `/run`

**Parameters:**
| Parameter | Type | Required | Default | Description |
|-----------|------|----------|---------|-------------|
| prompt | string | Yes | - | Your prompt/question |
| models | array | Yes | - | Array of model names |
| random_key | boolean | No | true | Random (true) or round-robin (false) |

**Example:**
```json
{
  "prompt": "string",
  "models": ["model1", "model2"],
  "random_key": true
}
```

## Performance Tips

1. **Use random_key: true** for best distribution
2. **Keep 4 keys active** for optimal balance
3. **Monitor rate limits** on each key
4. **Batch requests** when possible
5. **Stagger requests** if hitting limits

---

**Status:** ✅ Production Ready
**Last Updated:** November 13, 2025
