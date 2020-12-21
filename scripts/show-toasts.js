$(document).ready(function () {
    const toasts = Array.from($(".toast"));
    toasts.forEach(toast => {
        $(toast).toast("show");
    });
});