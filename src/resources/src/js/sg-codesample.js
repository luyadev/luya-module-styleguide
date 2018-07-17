var sgCodesample = {

    selector: '.sg-js-codesample',
    activeClass: 'sg-codesample--visible',
    showToggler: '.sg-codesample__toggler--show',
    hideToggler: '.sg-codesample__toggler--hide',

    init: function () {
        var context = this;
        var codesamples = document.querySelectorAll(this.selector);
        Array.prototype.forEach.call(codesamples, function (el) {
            context.listeners(el);
        });
    },

    listeners: function (el) {
        var context = this;
        var showToggler = el.querySelector(this.showToggler);
        var hideToggler = el.querySelector(this.hideToggler);

        showToggler.addEventListener('click', function() {
            context.toggle(el, false);
        });
        hideToggler.addEventListener('click', function() {
            context.toggle(el, true);
        });
    },

    toggle: function (el, hide) {
        var context = this;

        if (hide === true) {
            this.removeClass(el, this.activeClass);
        } else {
            this.addClass(el, this.activeClass);
        }

        setTimeout(function() {
            context.triggerCustomEvent(window, 'scrollspy.recheck')
        }, 250);
    },

    addClass: function(el, className) {
        if (el.classList) {
            el.classList.add(className);
        } else {
            el.className += ' ' + className;
        }
    },

    removeClass: function(el, className) {
        if (el.classList) {
            el.classList.remove(className);
        } else {
            el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
        }
    },

    triggerCustomEvent: function(el, eventname) {
        if (window.CustomEvent) {
            var event = new CustomEvent(eventname, {});
        } else {
            var event = document.createEvent('CustomEvent');
            event.initCustomEvent(eventname, true, true, {});
        }

        el.dispatchEvent(event);
    }

};