// Modern clipboard API
async function copyToClipboard(text) {
    try {
        await navigator.clipboard.writeText(text);
        return true;
    } catch (err) {
        console.error("Failed to copy text: ", err);
        return false;
    }
}

function printResponses() {
    window.print();
}

function showShareModal() {
    document.getElementById("shareModal").classList.add("active");
}

function hideShareModal() {
    document.getElementById("shareModal").classList.remove("active");
}

async function copyShareLink() {
    const shareLink = document.getElementById("shareLink");
    const copyButton = document.querySelector(".copy-button");
    const originalText = copyButton.innerHTML;

    try {
        const success = await copyToClipboard(shareLink.value);
        if (success) {
            copyButton.innerHTML = '<i class="fas fa-check"></i> Copied!';
            setTimeout(() => {
                copyButton.innerHTML = originalText;
            }, 2000);
        } else {
            throw new Error("Copy failed");
        }
    } catch (err) {
        copyButton.innerHTML = '<i class="fas fa-times"></i> Failed!';
        setTimeout(() => {
            copyButton.innerHTML = originalText;
        }, 2000);
    }
}

function showLoading() {
    document.querySelectorAll(".response-container").forEach((container) => {
        container.classList.add("loading");
    });
}

function hideLoading() {
    document.querySelectorAll(".response-container").forEach((container) => {
        container.classList.remove("loading");
    });
}

function showError(message) {
    const errorDiv = document.createElement("div");
    errorDiv.className = "error-message";
    errorDiv.textContent = message;
    document.body.appendChild(errorDiv);
    setTimeout(() => errorDiv.remove(), 5000);
}

function enableParallelProcessing(formId) {
    const form = document.getElementById(formId);
    if (form) {
        form.addEventListener("submit", function (e) {
            e.preventDefault();
            handleParallelAIForm(this);
        });
    }
}

// Enhanced form submission handler for parallel processing
async function handleParallelAIForm(form) {
    const formData = new FormData(form);
    const prompt = formData.get("prompt");
    const models = formData.getAll("model[]");
    const content = formData.get("content");

    if (!prompt || models.length === 0) {
        showError("Please provide a prompt and select at least one AI model");
        return;
    }

    // Update prompt text in all containers
    document.querySelectorAll(".prompt-text").forEach((element) => {
        element.textContent = prompt;
    });

    try {
        await generateParallelAIResponses(prompt, models, content);
    } catch (error) {
        console.error("Form submission error:", error);
    }
}

//parallel call API
function setContent() {
    const promptInput = document.getElementById("prompt-input");
    const promptHidden = document.getElementById("prompt-hidden");
    const contentInput = document.getElementById("content-input");
    const contentSource = document.getElementById("content-source");
    if (promptInput && promptHidden) {
        promptHidden.value = promptInput.value || "";
    }
    if (contentInput && contentSource) {
        contentInput.value = contentSource.value || "";
    }
    return true;
}

// Handle form submission
async function handleCompare(event) {
    event.preventDefault();
    if (!setContent()) return false;

    const form = document.getElementById("ai-compare-form");
    const formData = new FormData(form);
    const prompt = formData.get("prompt");
    const content = formData.get("content");
    const models = formData.getAll("model[]");

    if (!prompt || models.length === 0) {
        alert("Please enter a prompt and select at least one model.");
        return false;
    }

    // Show loading
    const responseContainer = document.getElementById("ai-responses");
    if (responseContainer) {
        responseContainer.innerHTML = "<p>Loading responses...</p>";
    }

    // Update UI
    document.getElementById("model-count").textContent = models.length;
    document.getElementById("result-time").textContent = new Date()
        .toUTCString()
        .replace("GMT", "")
        .trim();

    const responses = {
        prompt,
        content,
        models,
        generatedAt: new Date()
            .toLocaleString("en-US", {
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
                day: "2-digit",
                month: "2-digit",
                year: "numeric",
            })
            .replace(",", ""),
        results: {},
    };

    // API keys (INSECURE: for testing only)
    const apiKeys = {
        openai: "YOUR_OPENAI_API_KEY",
        gemini: "YOUR_GEMINI_API_KEY",
        anthropic: "YOUR_ANTHROPIC_API_KEY",
        openrouter: "YOUR_OPENROUTER_API_KEY",
        xai: "YOUR_XAI_API_KEY",
    };

    // Parse Markdown
    function parseResponse(markdown) {
        let html = marked.parse(markdown);
        html = DOMPurify.sanitize(html);
        html = html
            .replace(
                /<table>/g,
                '<table class="table table-striped table-bordered">'
            )
            .replace(/<p>/g, '<p class="mb-1">')
            .replace(/<div>/g, '<div class="mb-1">');
        return html;
    }

    // API calls
    const apiCalls = {
        async chatgpt() {
            try {
                const response = await fetch(
                    "https://api.openai.com/v1/chat/completions",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: `Bearer ${apiKeys.openai}`,
                        },
                        body: JSON.stringify({
                            model: "gpt-4",
                            messages: [{ role: "user", content: prompt }],
                            temperature: 1.0,
                            max_tokens: 2048,
                        }),
                    }
                );
                const data = await response.json();
                return {
                    success: true,
                    response: parseResponse(
                        data.choices[0].message.content || "No response"
                    ),
                };
            } catch (error) {
                return {
                    success: false,
                    response: "ChatGPT failed: " + error.message,
                };
            }
        },
        async gemini() {
            try {
                const response = await fetch(
                    `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=${apiKeys.gemini}`,
                    {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({
                            contents: [
                                { role: "user", parts: [{ text: prompt }] },
                            ],
                            generationConfig: {
                                temperature: 0.7,
                                maxOutputTokens: 2048,
                                responseMimeType: "text/plain",
                            },
                        }),
                    }
                );
                const data = await response.json();
                return {
                    success: true,
                    response: parseResponse(
                        data.candidates[0].content.parts[0].text ||
                        "No response"
                    ),
                };
            } catch (error) {
                return {
                    success: false,
                    response: "Gemini failed: " + error.message,
                };
            }
        },
        async claude() {
            try {
                const response = await fetch(
                    "https://api.anthropic.com/v1/messages",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "anthropic-version": "2023-06-01",
                            "x-api-key": apiKeys.anthropic,
                        },
                        body: JSON.stringify({
                            model: "claude-3-5-haiku-20241022",
                            max_tokens: 2048,
                            temperature: 1.0,
                            messages: [{ role: "user", content: prompt }],
                        }),
                    }
                );
                const data = await response.json();
                return {
                    success: true,
                    response: parseResponse(
                        data.content[0].text || "No response"
                    ),
                };
            } catch (error) {
                return {
                    success: false,
                    response: "Claude failed: " + error.message,
                };
            }
        },
        async deepseek() {
            try {
                const response = await fetch(
                    "https://openrouter.ai/api/v1/chat/completions",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: `Bearer ${apiKeys.openrouter}`,
                        },
                        body: JSON.stringify({
                            model: "deepseek/deepseek-chat-v3-0324:free",
                            messages: [{ role: "user", content: prompt }],
                        }),
                    }
                );
                const data = await response.json();
                return {
                    success: true,
                    response: parseResponse(
                        data.choices[0].message.content || "No response"
                    ),
                };
            } catch (error) {
                return {
                    success: false,
                    response: "DeepSeek failed: " + error.message,
                };
            }
        },
        async meta() {
            try {
                const response = await fetch(
                    "https://openrouter.ai/api/v1/chat/completions",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: `Bearer ${apiKeys.openrouter}`,
                        },
                        body: JSON.stringify({
                            model: "meta-llama/llama-4-maverick:free",
                            messages: [{ role: "user", content: prompt }],
                        }),
                    }
                );
                const data = await response.json();
                return {
                    success: true,
                    response: parseResponse(
                        data.choices[0].message.content || "No response"
                    ),
                };
            } catch (error) {
                return {
                    success: false,
                    response: "Meta failed: " + error.message,
                };
            }
        },
        async grok() {
            try {
                const response = await fetch(
                    "https://api.x.ai/v1/chat/completions",
                    {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: `Bearer ${apiKeys.xai}`,
                        },
                        body: JSON.stringify({
                            model: "grok-3",
                            messages: [{ role: "user", content: prompt }],
                            temperature: 0.7,
                            max_tokens: 2048,
                        }),
                    }
                );
                const data = await response.json();
                return {
                    success: true,
                    response: parseResponse(
                        data.choices[0].message.content || "No response"
                    ),
                };
            } catch (error) {
                return {
                    success: false,
                    response: "Grok failed: " + error.message,
                };
            }
        },
    };

    // Make API calls
    const promises = models.map(
        (model) =>
            apiCalls[model]?.() ||
            Promise.resolve({
                success: false,
                response: `${model} not supported`,
            })
    );
    const results = await Promise.all(promises);

    // Collect responses
    models.forEach((model, index) => {
        responses[`${model}Response`] = results[index].response;
    });

    // Store for sharing
    localStorage.setItem("aiResponses", JSON.stringify(responses));

    // Render responses
    renderResponses(responses);
}

// Render responses
function renderResponses(responses) {
    const responseContainer = document.getElementById("ai-responses");
    const modelLinksWrapper = document.getElementById("model-links-wrapper");
    if (!responseContainer || !modelLinksWrapper) return;

    const modelInfo = {
        chatgpt: {
            name: "ChatGPT",
            company: "Microsoft",
            logo: "https://upload.wikimedia.org/wikipedia/commons/0/04/ChatGPT_logo.svg",
            class: "chatgpt",
        },
        gemini: {
            name: "Gemini",
            company: "Google",
            logo: "https://upload.wikimedia.org/wikipedia/commons/8/8a/Google_Gemini_logo.svg",
            class: "gemini",
        },
        claude: {
            name: "Claude",
            company: "Anthropic",
            logo: "https://upload.wikimedia.org/wikipedia/commons/7/78/Anthropic_logo.svg",
            class: "claude",
        },
        deepseek: {
            name: "DeepSeek",
            company: "High-Flyer",
            logo: "https://chat.deepseek.com/favicon.svg",
            class: "deepseek",
        },
        meta: {
            name: "Meta Llama",
            company: "Meta",
            logo: "https://t0.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=https://ai.meta.com/&size=256",
            class: "meta",
        },
        grok: {
            name: "Grok",
            company: "xAI",
            logo: "https://upload.wikimedia.org/wikipedia/commons/thumb/4/4d/X_Logo.svg/2048px-X_Logo.svg.png",
            class: "grok",
        },
    };

    let responseHtml = "";
    let modelLinksHtml = '<div class="model-links-row first-row">';
    let count = 1;

    // Upmana (content)
    if (responses.content) {
        responseHtml += `
            <div class="response-container" id="content-container">
                <div class="response-content">
                    <div class="ai-name">(${String.fromCharCode(
            96 + count++
        )}) UPMANA - Knowledge By Comparison</div>
                    <div class="prompt-box upman"><strong>Prompt:</strong> ${responses.prompt
            }</div>
                    <div class="p-3 ai-response h-100">${responses.content
            }</div>
                </div>
            </div>
        `;
        modelLinksHtml += `<a class="model-link" onclick="scrollToResponse('content-container')">(${String.fromCharCode(
            96 + count - 1
        )})Prarang-Upmana</a>`;
    }

    // AI model responses
    responses.models.forEach((model) => {
        const response = responses[`${model}Response`];
        if (response && modelInfo[model]) {
            responseHtml += `
                <div class="response-container" id="${model}-container">
                    <img src="${modelInfo[model].logo}" alt="${modelInfo[model].name
                } Logo" class="ai-logo">
                    <div class="response-content">
                        <div class="ai-name">(${String.fromCharCode(
                    96 + count++
                )}) ${modelInfo[model].name}</div>
                        <div class="prompt-box ${modelInfo[model].class
                }"><strong>Prompt:</strong> ${responses.prompt}</div>
                        <div class="p-3 ai-response h-100">${response}</div>
                    </div>
                </div>
            `;
            modelLinksHtml += `<a class="model-link" onclick="scrollToResponse('${model}-container')">(${String.fromCharCode(
                96 + count - 1
            )})${modelInfo[model].company}-${modelInfo[model].name}</a>`;
        }
    });

    modelLinksHtml += "</div>";

    // Update DOM
    responseContainer.innerHTML =
        responseHtml ||
        '<div class="error-container">No response available.</div>';
    modelLinksWrapper.innerHTML = modelLinksHtml;

    // Wrap tables
    document.querySelectorAll(".ai-response table").forEach((table) => {
        if (!table.parentElement.classList.contains("table-container")) {
            const container = document.createElement("div");
            container.className = "table-container";
            table.parentNode.insertBefore(container, table);
            container.appendChild(table);
        }
    });
}

function handleShare() {
    const form = document.getElementById("shareForm");
    const formData = new FormData(form);

    fetch(form.action, {
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
    })
        .then(async (response) => {
            const responseText = await response.text(); // read body ONCE

            let data;
            try {
                data = JSON.parse(responseText); // attempt to parse JSON
            } catch (e) {
                console.error("Response not valid JSON:", responseText);
                throw new Error("Invalid server response");
            }

            if (!response.ok) {
                console.error("Server returned error:", data);
                throw new Error(data?.error || "Server error");
            }

            return data; // already parsed
        })
        .then((data) => {
            const shareUrl = `${window.location.origin}/share/${data.uuid}`;
            Livewire.dispatch("loadsharemodal", {
                title: "Share Comparision",
                description: "",
                url: shareUrl,
            });
        })
        .catch((error) => {
            console.error("Share Error:", error);
            showError("Failed to generate share link");
        });
}
