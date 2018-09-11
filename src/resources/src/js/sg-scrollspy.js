var sgScrollspy = {

    itemSelector: '.sg-js-scrollspy-item',
    navItemSelector: '.sg-js-scrollspy-nav-item',
    activeClass: 'sg-nav__link--active',

    items: [],

    init: function () {
        this.getElementPositions();
        this.checkItems();
        this.listeners();
    },

    getElementPositions: function () {
        var context = this;
        var items = document.querySelectorAll(this.itemSelector);

        this.items = [];
        Array.prototype.forEach.call(items, function (el) {
            context.items.push({
                'id': el.id,
                'top': context.getElementDistanceFromTop(el)
            });
        });
    },

    listeners: function () {
        var context = this;

        window.addEventListener('scroll', function () {
            context.checkItems();
        });
        window.addEventListener('resize', _.throttle(function() { context.getElementPositions(); context.checkItems(); }, 250));
        window.addEventListener('scrollspy.recheck', function () { context.getElementPositions(); context.checkItems(); });
    },

    checkItems: function () {
        var context = this;

        var visibleItem = this.items.filter(function (item, i) {
            var currentScroll = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

            if (i+1 === context.items.length) {
                // Last item

                if (item.top <= currentScroll) {
                    return item;
                }

                return false;
            } else if (item.top <= currentScroll && context.items[i + 1].top > currentScroll) {
                return item;
            }

            return false;
        });

        visibleItem = visibleItem[0];

        var activeElement = document.querySelector(this.navItemSelector + '.' + this.activeClass);

        if(typeof visibleItem !== 'undefined') {
            var newActiveElement = document.querySelector(this.navItemSelector + '[href="#' + visibleItem.id + '"]');

            if (activeElement !== null) {
                removeClass(activeElement, this.activeClass);
            }
            addClass(newActiveElement, this.activeClass);
        } else if (activeElement !== null) {
            removeClass(activeElement, this.activeClass);
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
