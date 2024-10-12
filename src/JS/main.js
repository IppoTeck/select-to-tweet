const tooltip = document.createElement('div');
tooltip.id = 'tooltip';
tooltip.innerText = 'Tweet';
tooltip.style.display = 'none';
tooltip.style.position = 'absolute';
tooltip.style.backgroundColor = '#333';
tooltip.style.color = '#fff';
tooltip.style.padding = '5px';
tooltip.style.borderRadius = '5px';
tooltip.style.cursor = 'pointer';
tooltip.style.zIndex = '1000';
document.body.appendChild(tooltip);

let selectedText = '';

document.addEventListener('mouseup', function(event) {
    const selection = window.getSelection();
    selectedText = selection.toString().trim();

    if (selectedText.length > 0) {
        const range = selection.getRangeAt(0);
        const rect = range.getBoundingClientRect();
        tooltip.style.top = `${rect.top + window.scrollY - tooltip.offsetHeight}px`;
        tooltip.style.left = `${rect.left + window.scrollX + (rect.width / 2) - (tooltip.offsetWidth / 2)}px`;
        tooltip.style.display = 'block';
    } else {
        tooltip.style.display = 'none';
    }
});


tooltip.addEventListener('mousedown', function(event) {
    event.preventDefault(); 
});

tooltip.addEventListener('click', function() {
    if (selectedText.length > 0) {
        const tweetUrl = `https://x.com/intent/post?text=${encodeURIComponent(selectedText)}`;
        window.open(tweetUrl, '_blank');
    }
});