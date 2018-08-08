document.addEventListener("DOMContentLoaded", function (e) {
    // Init highlight for code
    var codeElements = document.querySelectorAll('code.sg-php');
    Array.prototype.forEach.call(codeElements, function (el) {
        hljs.configure({
            languages: ['php']
        });
        hljs.highlightBlock(el);
    });

    // Init code sample toggler
    sgCodesample.init();

    // Init scroll spy
    sgScrollspy.init();

    // Init fixed element
    sgScrollFixed.init();

    // Init smooth scroll
    var scroll = new SmoothScroll('a[href^="#"]');

});
