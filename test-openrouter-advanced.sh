#!/bin/bash

# Advanced OpenRouter API Test Script for Ubuntu/Linux
# Usage: ./test-openrouter-advanced.sh [prompt] [model1] [model2] ...

set -e

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Configuration
API_URL="${OPENROUTER_URL:-http://localhost:4000/run}"
TIMEOUT=300  # 5 minutes

# Default values
PROMPT="${1:-Explain quantum computing in simple terms}"
MODELS=("${@:2}")

# If no models provided, use defaults
if [ ${#MODELS[@]} -eq 0 ]; then
    MODELS=(
        "openai/gpt-3.5-turbo"
        "anthropic/claude-3-sonnet"
        "meta-llama/llama-2-70b-chat"
    )
fi

# Function to print colored output
print_header() {
    echo -e "${BLUE}========================================${NC}"
    echo -e "${BLUE}$1${NC}"
    echo -e "${BLUE}========================================${NC}"
}

print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_error() {
    echo -e "${RED}❌ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}ℹ️  $1${NC}"
}

# Function to check if API is running
check_api() {
    print_info "Checking if API is running at $API_URL..."
    if timeout 5 curl -s "$API_URL" > /dev/null 2>&1; then
        print_success "API is reachable"
        return 0
    else
        print_error "Cannot connect to API at $API_URL"
        print_info "Make sure the OpenRouter service is running: cd OpenRouter && node app.js"
        return 1
    fi
}

# Function to create JSON payload
create_payload() {
    local prompt="$1"
    shift
    local models=("$@")
    
    # Build models array
    local models_json="["
    for i in "${!models[@]}"; do
        if [ $i -gt 0 ]; then
            models_json+=","
        fi
        models_json+="\"${models[$i]}\""
    done
    models_json+="]"
    
    # Create payload
    cat <<EOF
{
  "prompt": "$prompt",
  "models": $models_json
}
EOF
}

# Function to send request
send_request() {
    local payload="$1"
    
    print_info "Sending request with ${#MODELS[@]} model(s)..."
    print_info "Prompt: $PROMPT"
    echo ""
    
    # Send request with curl
    local response=$(curl -s -X POST "$API_URL" \
        -H "Content-Type: application/json" \
        --max-time $TIMEOUT \
        -d "$payload")
    
    echo "$response"
}

# Function to parse response
parse_response() {
    local response="$1"
    
    # Check if response contains error
    if echo "$response" | grep -q "error"; then
        print_error "API returned an error:"
        echo "$response" | jq . 2>/dev/null || echo "$response"
        return 1
    fi
    
    # Pretty print response
    echo "$response" | jq . 2>/dev/null || echo "$response"
    
    # Extract summary
    if echo "$response" | jq -e '.total_duration' > /dev/null 2>&1; then
        echo ""
        print_success "Request completed!"
        local duration=$(echo "$response" | jq -r '.total_duration')
        local successful=$(echo "$response" | jq -r '.successful')
        local failed=$(echo "$response" | jq -r '.failed')
        
        echo -e "${GREEN}Duration: $duration${NC}"
        echo -e "${GREEN}Successful: $successful${NC}"
        echo -e "${RED}Failed: $failed${NC}"
    fi
}

# Main execution
main() {
    print_header "OpenRouter API Test Script"
    echo ""
    
    # Check if API is running
    if ! check_api; then
        exit 1
    fi
    
    echo ""
    
    # Create and send payload
    print_header "Creating Request"
    PAYLOAD=$(create_payload "$PROMPT" "${MODELS[@]}")
    
    echo "Payload:"
    echo "$PAYLOAD" | jq . 2>/dev/null || echo "$PAYLOAD"
    echo ""
    
    print_header "Sending Request"
    RESPONSE=$(send_request "$PAYLOAD")
    
    print_header "Response"
    parse_response "$RESPONSE"
    
    echo ""
    print_success "Test completed!"
}

# Run main function
main
