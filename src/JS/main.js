jQuery(document).ready(function ($) {
    const tooltip = $('#tooltip');

    $(document).on('mouseup', function () {
        const selectedText = window.getSelection().toString().trim();

        if (selectedText.length > 0) {
            const range = window.getSelection().getRangeAt(0).getBoundingClientRect();
            tooltip.css({
                top: range.top - tooltip.outerHeight() - 10 + window.scrollY,
                left: range.left + (range.width / 2) - (tooltip.outerWidth() / 2)
            });
            tooltip.show();
        } else {
            tooltip.hide();
        }
    });

    tooltip.on('click', function () {
        const selectedText = window.getSelection().toString().trim();
        if (selectedText.length > 0) {
            const tweetUrl = `https://x.com/intent/post?text=${encodeURIComponent(selectedText)}`;
            window.open(tweetUrl, '_blank');
        }
    });
});
