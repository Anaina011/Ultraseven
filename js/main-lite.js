const swup = new Swup({
    containers: ['#swup'],
});

function initAll() {
    // No components to reinit here
}
swup.hooks.on('content:replace', () => {
    initAll();
});
