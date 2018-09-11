var addClass = function(el, className) {
    if (el.classList) {
        el.classList.add(className);
    } else {
        el.className += ' ' + className;
    }
};

var removeClass = function(el, className) {
    if (el.classList) {
        el.classList.remove(className);
    } else {
        el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }
};

var hasClass = function(el, className) {
    if (el.classList) {
        return el.classList.contains(className);
    } else {
        return new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className);
    }
}

document.addEventListener("DOMContentLoaded", function (e) {

    // Init settings
    sgSettings.init();

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
