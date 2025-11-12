#!/bin/bash

# OpenRouter API Test Script for Ubuntu/Linux
# Usage: ./test-openrouter.sh

# API endpoint
API_URL="http://localhost:4000/run"

# Create JSON payload
read -r -d '' JSON_PAYLOAD << EOF
{
  "prompt": "Hello world",
  "models": [
    "openrouter/auto"
  ]
}
EOF

echo "📤 Sending request to OpenRouter API..."
echo "URL: $API_URL"
echo ""
echo "Request payload:"
echo "$JSON_PAYLOAD" | jq . 2>/dev/null || echo "$JSON_PAYLOAD"
echo ""
echo "-------------------------------------------"
echo ""

# Send the request
curl -X POST "$API_URL" \
  -H "Content-Type: application/json" \
  -d "$JSON_PAYLOAD" \
  -w "\n\n✅ HTTP Status: %{http_code}\n"

echo ""
echo "-------------------------------------------"
