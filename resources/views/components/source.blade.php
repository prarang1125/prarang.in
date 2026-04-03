@props([
'source' => '',
])

@if(!empty($source))

<!-- Icon -->
<span onmouseenter="PrarangTooltip.show(event, '{{ addslashes($source) }}')" onmouseleave="PrarangTooltip.hide()"
    class="p-1 cursor-help text-black hover:text-blue-600 transition-colors duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="drop-shadow-sm">
        <circle cx="12" cy="12" r="10"></circle>
        <path d="M12 16v-4"></path>
        <path d="M12 8h.01"></path>
    </svg>
</span>


@once
<!-- Global Tooltip (Rendered only once per page) -->
<div id="prarangGlobalTooltip"
    class="fixed hidden z-[9999] max-w-[280px] px-3 py-2 bg-white text-black border border-slate-100 shadow-[0_12px_45px_-12px_rgba(0,0,0,0.15)] rounded-xl text-[12px]  leading-relaxed break-words pointer-events-none transition-all duration-300 opacity-0 scale-95"
    style="transform-origin: center bottom;">
</div>

<script>
    window.PrarangTooltip = {
                timeout: null,
                show(e, text) {
                    clearTimeout(this.timeout);
                    const tooltip = document.getElementById('prarangGlobalTooltip');
                    if (!tooltip) return;
                    
                    tooltip.innerText = text;
                    
                    // Positioning logic
                    tooltip.style.visibility = 'hidden';
                    tooltip.classList.remove('hidden');
                    const rect = e.currentTarget.getBoundingClientRect();
                    const ttRect = tooltip.getBoundingClientRect();
                    tooltip.style.visibility = 'visible';

                    let top = rect.top - ttRect.height - 10;
                    let left = rect.left + rect.width / 2;

                    // Fallback to bottom if no space on top
                    if (top < 20) {
                        top = rect.bottom + 10;
                        tooltip.style.transformOrigin = 'center top';
                    } else {
                        tooltip.style.transformOrigin = 'center bottom';
                    }

                    // Window boundary checks
                    const margin = 15;
                    if (left + ttRect.width / 2 > window.innerWidth - margin) {
                        left = window.innerWidth - ttRect.width / 2 - margin;
                    }
                    if (left - ttRect.width / 2 < margin) {
                        left = ttRect.width / 2 + margin;
                    }

                    tooltip.style.top = top + 'px';
                    tooltip.style.left = left + 'px';
                    
                    // Animate in
                    requestAnimationFrame(() => {
                        tooltip.style.opacity = '1';
                        tooltip.style.transform = 'translateX(-50%) scale(1)';
                    });
                },
                hide() {
                    const tooltip = document.getElementById('prarangGlobalTooltip');
                    if (!tooltip) return;
                    
                    tooltip.style.opacity = '0';
                    tooltip.style.transform = 'translateX(-50%) scale(0.95)';
                    
                    this.timeout = setTimeout(() => {
                        if (tooltip.style.opacity === '0') {
                            tooltip.classList.add('hidden');
                        }
                    }, 300);
                }
            };
</script>
@endonce
@endif