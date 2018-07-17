var sgScrollFixed = {

    selector: '.sg-js-fixed',

    elements: [],

    init: function() {
        var context = this;

        this.getElements();
        this.check();
        this.listeners();

    },
    
    getElements: function() {
        var context = this;
        var elements = document.querySelectorAll(this.selector);
        Array.prototype.forEach.call(elements, function(el) {
            context.elements.push({
                el: el,
                top: context.getElementDistanceFromTop(el),
            });
        });
    },

    check: function() {
        var context = this;

        Array.prototype.forEach.call(this.elements, function(el) {
            var elementDistanceTop = el.top;
            el = el.el;

            var currentScroll = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
            var fixedClass = el.getAttribute('data-fixed-class') || 'sg-fixed';
            var offset = parseInt(el.getAttribute('data-fixed-offset')) || 0;

            if(currentScroll >= (elementDistanceTop - offset)) {
                context.addClass(el, fixedClass);
            } else {
                context.removeClass(el, fixedClass);
            }
        });
    },

    listeners: function() {
        var context = this;

        window.addEventListener('scroll', function () {
            context.check();
        });
        window.addEventListener('resize', _.throttle(function() { context.getElements(); context.check(); }, 250));
    },

    addClass: function (el, className) {
        if (el.classList) {
            el.classList.add(className);
        } else {
            el.className += ' ' + className;
        }
    },

    removeClass: function (el, className) {
        if (el.classList) {
            el.classList.remove(className);
        } else {
            el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
        }
    },

    getElementDistanceFromTop: function (el) {
        var location = 0;
        if (el.offsetParent) {
            do {
                location += el.offsetTop;
                el = el.offsetParent;
            } while (el);
        }
        return location >= 0 ? location : 0;
    },

};