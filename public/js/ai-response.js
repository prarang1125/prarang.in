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
}); 