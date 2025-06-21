class AIParallelProcessor {
    constructor() {
        this.responses = {};
        this.isProcessing = false;
        this.apiUrl = '/api/ai/generate';
        this.csrfToken = this.getCsrfToken();
    }

    getCsrfToken() {
        // Try multiple methods to get CSRF token
        let token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        if (!token) {
            token = document.querySelector('input[name="_token"]')?.value;
        }
        
        if (!token) {
            token = document.querySelector('input[name="csrf_token"]')?.value;
        }
        
        if (!token) {
            console.warn('CSRF token not found. API calls may fail.');
        }
        
        return token;
    }

    async generateParallelResponses(prompt, selectedModels) {
        if (this.isProcessing) {
            console.log('Already processing requests...');
            return;
        }

        this.isProcessing = true;
        this.responses = {};
        
        // Show loading state
        this.showLoadingState(selectedModels);
        
        try {
            // Create array of promises for parallel execution
            const promises = selectedModels.map(model => 
                this.generateSingleResponse(prompt, model)
            );

            // Execute all promises in parallel
            const results = await Promise.allSettled(promises);
            
            // Process results
            results.forEach((result, index) => {
                const model = selectedModels[index];
                if (result.status === 'fulfilled') {
                    this.responses[model] = result.value;
                } else {
                    this.responses[model] = {
                        success: false,
                        error: result.reason.message || 'Request failed'
                    };
                }
            });

            // Display results
            this.displayResults(prompt);
            
        } catch (error) {
            console.error('Error in parallel processing:', error);
            this.showError('An error occurred while processing AI responses');
        } finally {
            this.isProcessing = false;
            this.hideLoadingState();
        }
    }

    async generateSingleResponse(prompt, model) {
        try {
            const response = await fetch(this.apiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    prompt: prompt,
                    model: model
                })
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            return data;
            
        } catch (error) {
            console.error(`Error generating ${model} response:`, error);
            throw error;
        }
    }

    showLoadingState(selectedModels) {
        // Create or update loading container
        let loadingContainer = document.getElementById('ai-loading-container');
        if (!loadingContainer) {
            loadingContainer = document.createElement('div');
            loadingContainer.id = 'ai-loading-container';
            loadingContainer.className = 'ai-loading-container';
            document.body.appendChild(loadingContainer);
        }

        loadingContainer.innerHTML = `
            <div class="ai-loading-overlay">
                <div class="ai-loading-content">
                    <h4>Generating AI Responses...</h4>
                    <div class="ai-loading-models">
                        ${selectedModels.map(model => `
                            <div class="ai-loading-model">
                                <div class="ai-loading-spinner"></div>
                                <span>${this.getModelDisplayName(model)}</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>
        `;
    }

    hideLoadingState() {
        const loadingContainer = document.getElementById('ai-loading-container');
        if (loadingContainer) {
            loadingContainer.remove();
        }
    }

    displayResults(prompt) {
        // Create or update results container
        let resultsContainer = document.getElementById('ai-results-container');
        if (!resultsContainer) {
            resultsContainer = document.createElement('div');
            resultsContainer.id = 'ai-results-container';
            resultsContainer.className = 'ai-results-container';
            document.body.appendChild(resultsContainer);
        }

        const upmanaContent = document.getElementById('outChat')?.innerHTML || '';
        
        resultsContainer.innerHTML = `
            <div class="ai-results-overlay">
                <div class="ai-results-content">
                    <div class="ai-results-header">
                        <h3>AI Comparison Results</h3>
                        <button class="ai-close-btn" onclick="this.closest('.ai-results-overlay').remove()">×</button>
                    </div>
                    
                    <div class="ai-results-body">
                        ${this.generateResultsHTML(prompt, upmanaContent)}
                    </div>
                    
                    <div class="ai-results-footer">
                        <button class="btn btn-primary" onclick="aiProcessor.shareResults()">Share Results</button>
                        <button class="btn btn-secondary" onclick="aiProcessor.downloadResults()">Download</button>
                    </div>
                </div>
            </div>
        `;
    }

    generateResultsHTML(prompt, upmanaContent) {
        let html = '';
        let count = 1;

        // UPMANA Response
        if (upmanaContent) {
            html += `
                <div class="ai-response-item">
                    <div class="ai-response-header">
                        <span class="ai-response-number">(${String.fromCharCode(96 + count++)})</span>
                        <span class="ai-response-name">UPMANA - Knowledge By Comparison</span>
                    </div>
                    <div class="ai-response-prompt">
                        <strong>Prompt:</strong> ${prompt}
                    </div>
                    <div class="ai-response-content">
                        ${upmanaContent}
                    </div>
                </div>
            `;
        }

        // AI Model Responses
        const modelConfigs = {
            chatgpt: { name: 'ChatGPT', logo: 'https://upload.wikimedia.org/wikipedia/commons/0/04/ChatGPT_logo.svg' },
            gemini: { name: 'Gemini', logo: 'https://upload.wikimedia.org/wikipedia/commons/8/8a/Google_Gemini_logo.svg' },
            claude: { name: 'Claude', logo: 'https://claude.ai/images/claude_app_icon.png' },
            grok: { name: 'Grok', logo: 'https://upload.wikimedia.org/wikipedia/commons/8/8a/X_logo.svg' }
        };

        Object.entries(this.responses).forEach(([model, result]) => {
            if (result.success) {
                html += `
                    <div class="ai-response-item">
                        <div class="ai-response-header">
                            <img src="${modelConfigs[model]?.logo || ''}" alt="${modelConfigs[model]?.name || model}" class="ai-response-logo">
                            <span class="ai-response-number">(${String.fromCharCode(96 + count++)})</span>
                            <span class="ai-response-name">${modelConfigs[model]?.name || model}</span>
                        </div>
                        <div class="ai-response-prompt">
                            <strong>Prompt:</strong> ${prompt}
                        </div>
                        <div class="ai-response-content">
                            ${result.response}
                        </div>
                        <div class="ai-response-meta">
                            Generated at: ${result.generated_at}
                        </div>
                    </div>
                `;
            } else {
                html += `
                    <div class="ai-response-item ai-response-error">
                        <div class="ai-response-header">
                            <span class="ai-response-number">(${String.fromCharCode(96 + count++)})</span>
                            <span class="ai-response-name">${modelConfigs[model]?.name || model}</span>
                        </div>
                        <div class="ai-response-error-message">
                            Error: ${result.error}
                        </div>
                    </div>
                `;
            }
        });

        return html;
    }

    getModelDisplayName(model) {
        const names = {
            chatgpt: 'ChatGPT',
            gemini: 'Gemini',
            claude: 'Claude',
            grok: 'Grok'
        };
        return names[model] || model;
    }

    showError(message) {
        const errorDiv = document.createElement('div');
        errorDiv.className = 'ai-error-message';
        errorDiv.innerHTML = `
            <div class="ai-error-content">
                <h4>Error</h4>
                <p>${message}</p>
                <button onclick="this.parentElement.parentElement.remove()">Close</button>
            </div>
        `;
        document.body.appendChild(errorDiv);
        
        // Auto-remove after 5 seconds
        setTimeout(() => {
            if (errorDiv.parentElement) {
                errorDiv.remove();
            }
        }, 5000);
    }

    async shareResults() {
        try {
            const prompt = document.querySelector('input[name="prompt"]')?.value || '';
            const upmanaContent = document.getElementById('outChat')?.innerHTML || '';
            
            const shareData = {
                prompt: prompt,
                uman_response: upmanaContent,
                gpt_response: this.responses.chatgpt?.response || null,
                gemini_response: this.responses.gemini?.response || null,
                claude_response: this.responses.claude?.response || null,
                grok_response: this.responses.grok?.response || null,
            };

            const response = await fetch('/share-response', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(shareData)
            });

            const result = await response.json();
            
            if (result.uuid) {
                const shareUrl = `${window.location.origin}/share/${result.uuid}`;
                navigator.clipboard.writeText(shareUrl);
                alert('Share link copied to clipboard!');
            }
        } catch (error) {
            console.error('Error sharing results:', error);
            this.showError('Failed to share results');
        }
    }

    downloadResults() {
        const prompt = document.querySelector('input[name="prompt"]')?.value || '';
        const upmanaContent = document.getElementById('outChat')?.innerHTML || '';
        
        let content = `AI Comparison Results\n`;
        content += `Prompt: ${prompt}\n\n`;
        content += `Generated at: ${new Date().toLocaleString()}\n\n`;
        
        // Add UPMANA response
        if (upmanaContent) {
            content += `UPMANA Response:\n${upmanaContent.replace(/<[^>]*>/g, '')}\n\n`;
        }
        
        // Add AI model responses
        Object.entries(this.responses).forEach(([model, result]) => {
            if (result.success) {
                content += `${this.getModelDisplayName(model)} Response:\n${result.raw}\n\n`;
            }
        });
        
        const blob = new Blob([content], { type: 'text/plain' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `ai-comparison-${new Date().toISOString().split('T')[0]}.txt`;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
    }
}

// Initialize the AI processor
const aiProcessor = new AIParallelProcessor();

// Function to be called from the form
function generateAIResponses() {
    const prompt = document.querySelector('input[name="prompt"]')?.value;
    const selectedModels = Array.from(document.querySelectorAll('input[name="model[]"]:checked'))
        .map(checkbox => checkbox.value);
    
    if (!prompt) {
        alert('Please enter a prompt');
        return;
    }
    
    if (selectedModels.length === 0) {
        alert('Please select at least one AI model');
        return;
    }
    
    aiProcessor.generateParallelResponses(prompt, selectedModels);
} 