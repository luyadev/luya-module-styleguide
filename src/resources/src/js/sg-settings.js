var sgSettings = {

    settings: {
        'sg-settings-no-horizontal-spacing': {
            state: false,
            applyClass: 'sg-js-setting-no-horizontal-spacing'
        },
        'sg-settings-hide-nav': {
            state: false,
            applyClass: 'sg-js-setting-nav-small'
        },
    },

    init: function() {
        var context = this;

        this.loadSettings();
        this.update();

        for (var key in this.settings) {
            var element = document.querySelector('#' + key);

            element.addEventListener( 'change', function() {
                if(this.checked) {
                    context.settings[this.id].state = true;
                    context.setCookie(this.id, true);
                } else {
                    context.settings[this.id].state = false;
                    context.setCookie(this.id, false);
                }

                context.applyClasses();
            });
        }

        // Open settings
        var settingsToggler = document.querySelector('.sg-js-open-settings');
        settingsToggler.addEventListener('click', function() {
            console.log(hasClass(document.querySelector('body'), 'sg-js-settings-open'));
            if (hasClass(document.querySelector('body'), 'sg-js-settings-open')) {
                removeClass(document.querySelector('body'), 'sg-js-settings-open');
            } else {
                addClass(document.querySelector('body'), 'sg-js-settings-open');
            }
        });
    },

    update: function() {
        for (var key in this.settings) {
            var element = document.querySelector('#' + key);
            element.checked = this.settings[key].state;
        }

        this.applyClasses();
    },

    applyClasses: function() {
        for (var key in this.settings) {
            if (this.settings[key].applyClass && this.settings[key].state == true) {
                addClass(document.querySelector('body'), this.settings[key].applyClass);
            } else if (this.settings[key].applyClass) {
                removeClass(document.querySelector('body'), this.settings[key].applyClass);
            }
        }
    },

    loadSettings: function() {
        var context = this;

        for (var key in this.settings) {
            console.log(this.getCookie(key));
            this.settings[key].state = this.getCookie(key);
        }
    },

    setCookie: function(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    },

    getCookie: function(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                var val = c.substring(name.length, c.length);
                val = val === 'true' || val === '1' ? true : val;
                val = val === 'false' || val === '0' ? false : val;
                return val;
            }
        }
        return false;
    }

};
