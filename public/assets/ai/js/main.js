document.addEventListener("DOMContentLoaded", () => {
    const promptInput = document.getElementById("promptbyuser");
    const suggestionList = document.getElementById("suggestion-list");
    const topicSelect = document.getElementById("topics");
    const checkboxContainer = document.getElementById("checkbox-container");
    let suggestions = [];
    let filteredSuggestions = [];

    // Fetch suggestions from backend once
    fetch("/get-suggestion-format")
        .then((res) => res.json())
        .then((data) => (suggestions = data || []))
        .catch((err) => console.error("Suggestion Fetch Error:", err));

    // Handle input events
    promptInput.addEventListener("input", () => {
        const text = promptInput.value;
        const currentWord = extractLastWord(text).toLowerCase();

        if (!currentWord) return hideSuggestions();

        const startsWith = suggestions.filter((s) =>
            s.toLowerCase().startsWith(currentWord)
        );
        const contains = suggestions.filter(
            (s) =>
                s.toLowerCase().includes(currentWord) &&
                !s.toLowerCase().startsWith(currentWord)
        );

        filteredSuggestions = [...startsWith, ...contains];

        if (filteredSuggestions.length === 0) return hideSuggestions();

        renderSuggestionList(filteredSuggestions, currentWord);
    });

    // Apply a suggestion to the input field
    function applySuggestion(fullText, word, suggestion) {
        const updatedText = fullText.replace(
            new RegExp(`${word}$`, "i"),
            suggestion
        );
        promptInput.value = updatedText + " ";
        hideSuggestions();
        promptInput.focus();
    }

    // Extract the last word user is typing
    function extractLastWord(text) {
        const parts = text.trim().split(/\s+/);
        return parts.length ? parts[parts.length - 1] : "";
    }

    // Highlight matching text
    function highlight(text, keyword) {
        const regex = new RegExp(`(${keyword})`, "gi");
        return text.replace(regex, `<strong class="highlight">$1</strong>`);
    }

    // Render the suggestion dropdown
    function renderSuggestionList(items, keyword) {
        suggestionList.innerHTML = "";
        const { left, bottom, width } = promptInput.getBoundingClientRect();

        suggestionList.style.left = `${left}px`;
        suggestionList.style.top = `${bottom + window.scrollY}px`;
        suggestionList.style.width = `${width}px`;
        suggestionList.style.display = "block";

        items.forEach((item, idx) => {
            const li = document.createElement("li");
            li.innerHTML = highlight(item, keyword);
            li.className = "suggestion-item";
            li.dataset.index = idx;
            li.tabIndex = 0;
            li.addEventListener("click", () => {
                applySuggestion(promptInput.value, keyword, item);
            });
            suggestionList.appendChild(li);
        });
    }

    function hideSuggestions() {
        suggestionList.style.display = "none";
    }

    // Handle Tab key to select top suggestion
    promptInput.addEventListener("keydown", (e) => {
        if (e.key === "Tab" && filteredSuggestions.length > 0) {
            e.preventDefault();
            const currentWord = extractLastWord(
                promptInput.value
            ).toLowerCase();
            applySuggestion(
                promptInput.value,
                currentWord,
                filteredSuggestions[0]
            );
        }
    });

    // Hide suggestions when input loses focus
    promptInput.addEventListener("blur", () => {
        setTimeout(hideSuggestions, 200); // Delay allows click to register
    });
});

// JavaScript to handle Generate button click
document.getElementById("generate-btn").addEventListener("click", () => {
    const outputSection = document.getElementById("output-section");

    // Scroll to the output section to make it visually prominent
    outputSection.scrollIntoView({ behavior: "smooth" });
});

document.addEventListener("DOMContentLoaded", () => {
    const topicSelect = document.getElementById("topics");
    const checkboxContainer = document.getElementById("checkbox-container");
    const verticalsData = window.verticalsData;

    topicSelect.addEventListener("change", function () {
        const selected = this.value;
        checkboxContainer.innerHTML = "";

        if (!selected || !verticalsData[selected]) {
            checkboxContainer.style.display = "none";
            return;
        }

        checkboxContainer.style.display = "block";

        verticalsData[selected].forEach((item) => {
            const wrapper = document.createElement("div");
            wrapper.className = "form-check";

            const checkbox = document.createElement("input");
            checkbox.type = "checkbox";
            checkbox.className = "form-check-input";
            checkbox.name = "subcategories[]";
            checkbox.id = `checkbox-${item.id}`;
            checkbox.value = item.name;

            const label = document.createElement("label");
            label.className = "form-check-label";
            label.htmlFor = checkbox.id;
            label.textContent = item.name;

            wrapper.appendChild(checkbox);
            wrapper.appendChild(label);
            checkboxContainer.appendChild(wrapper);
        });
    });

    // Prompt click auto-check
    document.querySelectorAll(".prompt-A").forEach((prompt) => {
        prompt.addEventListener("click", function () {
            const subcategory = this.dataset.subcategory;
            const checkboxes = document.querySelectorAll(
                '#checkbox-container input[type="checkbox"]'
            );
            checkboxes.forEach((cb) => {
                if (cb.value === subcategory) {
                    cb.checked = true;
                    cb.scrollIntoView({ behavior: "smooth", block: "center" });
                }
            });
        });
    });

    // Hide checkbox container when clicking outside (but keep selections)
    document.addEventListener("click", function (event) {
        const container = document.querySelector(".search-dropdown");
        const isClickInside = container.contains(event.target);

        if (!isClickInside) {
            checkboxContainer.style.display = "none";
        }
    });

    // Optional: re-show container if user clicks on topic dropdown again
    topicSelect.addEventListener("click", function () {
        if (topicSelect.value && verticalsData[topicSelect.value]) {
            checkboxContainer.style.display = "block";
        }
    });
});
