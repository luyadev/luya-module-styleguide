const imagemin = require("gulp-imagemin");
const browserlist = [
    "> 0.5%",
    "last 2 versions",
    "IE 10"
];

module.exports = {
    css: {
        scss: {
            config: {
                outputStyle: "compressed" // nested, compact, expanded and compressed are available options
            }
        },

        sourcemaps: {
            enabled: "local"
        },

        autoprefixer: {
            enabled: true,
            config: {
                browsers: browserlist
            }
        },

        cleanCss: {
            enabled: true,
            config: {
                compatibility: "ie8"
            }
        }
    },

    js: {
        sourcemaps: {
            enabled: "local"
        },
        browserify: {
            enabled: false
        },
        uglify: {
            enabled: false
        },
        babeljs: {
            enabled: true,
            config: {
                minified: true,
                comments: false
            }
        }
    },

    clean: {
        enabled: "prod",
        paths: ["dist/**/*.map"]
    },

    images: {
        imagemin: {
            enabled: true,
            config: [
                imagemin.gifsicle({ interlaced: true }),
                imagemin.jpegtran({ progressive: true }),
                imagemin.optipng({ optimizationLevel: 5 }),
                imagemin.svgo({ plugins: [{ removeViewBox: true }] })
            ]
        }
    },

    svg: {
        svgmin: {
            enabled: true,
            config: {}
        }
    },

    extraTasks: {},

    paths: {
        // "DESTINATION" : ['SOURCE']
        css: {
            "dist/css/": ["src/scss/**/*.scss"]
        },
        js: {
            "dist/js/script.js": [
                "src/js/**/*.js"
            ]
        },
        images: {
            "dist/images/": [
                "src/images/**/*.jpeg",
                "src/images/**/*.jpg",
                "src/images/**/*.png",
                "src/images/**/*.gif"
            ]
        },
        svg: {},
        copy: {}
    },

    // All tasks above are available (css, js, images and svg)
    combinedTasks: {
        default: [["dist", "watch"]],
        dist: ["js", "images", "svg", "css", "clean"],
    },

    watchTask: {
        images: ["images"],
        svg: ["svg"],
        css: ["css"],
        js: ["js"],
        copy: ["copy"]
    }
};
