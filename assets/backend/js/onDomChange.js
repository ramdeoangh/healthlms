(function (window) {
    var delay = 100;
    var stack = [];

    function onDomChange(fn, newDelay) {
        if (newDelay) delay = newDelay;
        stack.push(fn);
    }

    // MutationObserver setup
    var observer = new MutationObserver(function (mutationsList) {
        // debounce to prevent too many calls
        clearTimeout(observer._timer);
        observer._timer = setTimeout(function () {
            stack.forEach(function (fn) {
                fn(mutationsList);
            });
        }, delay);
    });

    // Observe the entire document
    window.addEventListener("DOMContentLoaded", function () {
        observer.observe(document.body, {
            childList: true,
            subtree: true,
            attributes: true,
            characterData: true
        });
    });

    // Fallback if MutationObserver is not supported (rare)
    if (!window.MutationObserver) {
        console.warn("MutationObserver not supported, using fallback polling");
        setInterval(function () {
            stack.forEach(fn => fn());
        }, delay);
    }

    // expose it
    window.onDomChange = onDomChange;
})(window);