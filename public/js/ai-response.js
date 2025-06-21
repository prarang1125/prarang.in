// Modern clipboard API
async function copyToClipboard(text) {
    try {
        await navigator.clipboard.writeText(text);
        return true;
    } catch (err) {
        console.error('Failed to copy text: ', err);
        return false;
    }
}

function printResponses() {
    window.print();
}

function showShareModal() {
    document.getElementById('shareModal').classList.add('active');
}

function hideShareModal() {
    document.getElementById('shareModal').classList.remove('active');
}

async function copyShareLink() {
    const shareLink = document.getElementById('shareLink');
    const copyButton = document.querySelector('.copy-button');
    const originalText = copyButton.innerHTML;

    try {
        const success = await copyToClipboard(shareLink.value);
        if (success) {
            copyButton.innerHTML = '<i class="fas fa-check"></i> Copied!';
            setTimeout(() => {
                copyButton.innerHTML = originalText;
            }, 2000);
        } else {
            throw new Error('Copy failed');
        }
    } catch (err) {
        copyButton.innerHTML = '<i class="fas fa-times"></i> Failed!';
        setTimeout(() => {
            copyButton.innerHTML = originalText;
        }, 2000);
    }
}

function showLoading() {
    document.querySelectorAll('.response-container').forEach(container => {
        container.classList.add('loading');
    });
}

function hideLoading() {
    document.querySelectorAll('.response-container').forEach(container => {
        container.classList.remove('loading');
    });
}

function showError(message) {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    document.body.appendChild(errorDiv);
    setTimeout(() => errorDiv.remove(), 5000);
}

// New async function for parallel AI API calls
async function generateParallelAIResponses(prompt, models, content = null) {
    showLoading();
    
    try {
        // Create individual API calls for each model
        const apiCalls = models.map(model => {
            const formData = new FormData();
            formData.append('prompt', prompt);
            formData.append('model[]', model);
            if (content) {
                formData.append('content', content);
            }
            formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);
            
            return fetch('/generate/ai/Response/single', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    return { 
                        model: data.model, 
                        response: data.response, 
                        success: true 
                    };
                } else {
                    return { 
                        model: model, 
                        response: null, 
                        success: false, 
                        error: data.error || 'Failed to generate response' 
                    };
                }
            })
            .catch(error => {
                console.error(`Error fetching ${model} response:`, error);
                return { 
                    model: model, 
                    response: null, 
                    success: false, 
                    error: error.message 
                };
            });
        });
        
        // Execute all API calls in parallel
        const results = await Promise.all(apiCalls);
        
        // Process results and update UI
        results.forEach(result => {
            if (result.success && result.response) {
                updateResponseContainer(result.model, result.response);
            } else {
                showModelError(result.model, result.error || 'Failed to generate response');
            }
        });
        
        hideLoading();
        return results;
        
    } catch (error) {
        console.error('Parallel AI generation error:', error);
        showError('Failed to generate AI responses');
        hideLoading();
        throw error;
    }
}

// Helper function to update response containers
function updateResponseContainer(model, response) {
    const containerId = `${model}-container`;
    const container = document.getElementById(containerId);
    
    if (container) {
        const responseDiv = container.querySelector('.ai-response');
        if (responseDiv) {
            responseDiv.innerHTML = response;
            container.classList.remove('loading');
        }
    }
}

// Helper function to show model-specific errors
function showModelError(model, errorMessage) {
    const containerId = `${model}-container`;
    const container = document.getElementById(containerId);
    
    if (container) {
        const responseDiv = container.querySelector('.ai-response');
        if (responseDiv) {
            responseDiv.innerHTML = `<div class="text-danger">Error: ${errorMessage}</div>`;
            container.classList.remove('loading');
        }
    }
}

// Simple function to enable parallel processing on any form
function enableParallelProcessing(formId) {
    const form = document.getElementById(formId);
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handleParallelAIForm(this);
        });
    }
}

// Function to create response containers dynamically
function createResponseContainers(models) {
    const containerRow = document.querySelector('.container-row') || document.createElement('div');
    containerRow.className = 'container-row';
    
    models.forEach((model, index) => {
        const containerId = `${model}-container`;
        let container = document.getElementById(containerId);
        
        if (!container) {
            container = document.createElement('div');
            container.id = containerId;
            container.className = 'response-container loading';
            
            const logoMap = {
                'chatgpt': 'https://upload.wikimedia.org/wikipedia/commons/0/04/ChatGPT_logo.svg',
                'gemini': 'https://upload.wikimedia.org/wikipedia/commons/8/8a/Google_Gemini_logo.svg',
                'claude': 'https://upload.wikimedia.org/wikipedia/commons/7/78/Anthropic_logo.svg',
                'grok': 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/X_Logo.svg/2048px-X_Logo.svg.png'
            };
            
            const nameMap = {
                'chatgpt': 'ChatGPT',
                'gemini': 'Gemini',
                'claude': 'Claude',
                'grok': 'Grok'
            };
            
            container.innerHTML = `
                <img src="${logoMap[model]}" alt="${nameMap[model]} Logo" class="ai-logo">
                <div class="response-content">
                    <div class="ai-name">(${String.fromCharCode(97 + index)}) ${nameMap[model]}</div>
                    <div class="prompt-box ${model}">
                        <strong>Prompt:</strong> <span class="prompt-text"></span>
                    </div>
                    <div class="p-3 ai-response h-100">
                        <div class="text-center">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2">Generating ${nameMap[model]} response...</p>
                        </div>
                    </div>
                </div>
            `;
            
            containerRow.appendChild(container);
        }
    });
    
    // Add container row to page if it doesn't exist
    if (!document.querySelector('.container-row')) {
        const mainContainer = document.querySelector('.main-container') || document.body;
        mainContainer.appendChild(containerRow);
    }
}

// Enhanced form submission handler for parallel processing
async function handleParallelAIForm(form) {
    const formData = new FormData(form);
    const prompt = formData.get('prompt');
    const models = formData.getAll('model[]');
    const content = formData.get('content');
    
    if (!prompt || models.length === 0) {
        showError('Please provide a prompt and select at least one AI model');
        return;
    }
    
    // Create response containers for selected models
    createResponseContainers(models);
    
    // Update prompt text in all containers
    document.querySelectorAll('.prompt-text').forEach(element => {
        element.textContent = prompt;
    });
    
    try {
        await generateParallelAIResponses(prompt, models, content);
    } catch (error) {
        console.error('Form submission error:', error);
    }
}

function handleShare() {
    const form = document.getElementById('shareForm');
    const formData = new FormData(form);

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        const shareUrl = `${window.location.origin}/share/${data.uuid}`;
        document.getElementById('shareLink').value = shareUrl;
        showShareModal();
    })
    .catch(error => {
        showError('Failed to generate share link');
    });
}

function scrollToResponse(containerId) {
    const container = document.getElementById(containerId);
    if (container) {
        container.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
}

// Initialize visibility on page load
document.addEventListener('DOMContentLoaded', function() {
    updateModelVisibility();
    
    // Add event listeners for parallel processing forms
    const parallelForms = document.querySelectorAll('form[data-parallel="true"]');
    parallelForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handleParallelAIForm(this);
        });
    });
}); 