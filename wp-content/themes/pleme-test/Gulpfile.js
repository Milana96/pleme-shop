const project_name = 'pleme-test';

// In this file change only project_name
var project = {

    text_domain: '' || project_name,
    packageName: '' || project_name,
    url: 'http://localhost/' + project_name,

    uploads_dir: {
        files: '../../uploads/**',
        filesDest: '../../uploads/**',
    },

    scss: {
        custom: {
            src: 'assets/scss/main.scss',
            dest: 'assets/css/',
            watch: 'assets/scss/**/*.scss',
        },
    },
    js: {
        custom: {
            fileName: 'main',
            src: 'assets/js/concat/*.js',
            dest: 'assets/js/',
            watch: 'assets/js/concat/*.js',
        },
        vendor: {
            folderName: 'vendor',
            src: 'assets/vendor/js/*.js',
            dest: 'assets/js/',
            watch: 'assets/vendor/js/*.js',
        },
    },
    icon_font: {
        font_name: 'icon-font',
        dest: 'assets/fonts/icons/',
        class: 'icon',
        font_path: '../fonts/icons/'
    },
    php: {
        watch: '**/*.php',
    },
    settings: {

        browsers_autoprefixes: [
            'last 3 version',
            '> 1%',
            'ie >= 9',
            'ie_mob >= 10',
            'ff >= 30',
            'chrome >= 34',
            'safari >= 7',
            'opera >= 23',
            'ios >= 7',
            'android >= 4',
            'bb >= 10',
        ]
    }
};

var gulp = require('gulp');                          
var imagemin = require('gulp-imagemin');                 
var pngcrush = require('imagemin-pngcrush');             
var sass = require('gulp-sass');                     
var minifycss = require('gulp-uglifycss');                
var autoprefixer = require('gulp-autoprefixer');             
var mmq = require('gulp-merge-media-queries');      
var concat = require('gulp-concat');                   
var uglify = require('gulp-uglify');                  
var rename = require('gulp-rename');                  
var lineec = require('gulp-line-ending-corrector');    
var filter = require('gulp-filter');                   
var sourcemaps = require('gulp-sourcemaps');               
var notify = require('gulp-notify');                   
var browserSync = require('browser-sync').create();         
var wpPot = require('gulp-wp-pot');                  
var sort = require('gulp-sort');                       
var iconfont = require('gulp-iconfont');
var iconfontCss = require('gulp-iconfont-css');

// Generate font from svg
function fonticons() {

    return gulp.src(['assets/icons/*.svg'])

        .pipe(iconfontCss({
            fontName: project.icon_font.font_name,
            cssClass: project.icon_font.class,
            path: 'assets/scss/utilities/_icons-config.scss',
            targetPath: '../../scss/general/_icons.scss',
            fontPath: project.icon_font.font_path
        }))
        .pipe(iconfont({
            fontName: project.icon_font.font_name,
            prependUnicode: true,
            formats: ['woff2', 'woff', 'ttf'],
            normalize: true,
            centerHorizontally: true
        }))
        .pipe(gulp.dest(project.icon_font.dest))
}
// Testing prodaction task
function is_production(task_name) {
    if (task_name == 'gulp build') {
        return true;
    } else {
        return false;
    }
}
// Browser sync and local server
function browser_sync() {
    return browserSync.init({
        proxy: project.url,
        open: true,
        injectChanges: true,
    });
}
// Compailing SCSS
function styles() {

    let task_name = this.process.title;

    if (is_production(task_name)) {

        return gulp.src(project.scss.custom.src)
            .pipe(sass({
                errLogToConsole: true,
                outputStyle: 'compressed',
                precision: 10
            }))
            .on('error', console.error.bind(console))
            .pipe(autoprefixer(project.settings.browsers_autoprefixes))

            .pipe(lineec())
            .pipe(gulp.dest(project.scss.custom.dest))

            .pipe(filter('**/*.css')) 
            .pipe(mmq({ log: true })) 

            .pipe(browserSync.stream()) 

            .pipe(rename({ suffix: '.min' }))
            .pipe(minifycss())
            .pipe(lineec()) 
            .pipe(gulp.dest(project.scss.custom.dest))

            .pipe(filter('**/*.css')) 
            .pipe(browserSync.stream())
            .pipe(notify({ message: 'TASK: "styles" Completed! 💯', onLast: true }));
    } else {

        return gulp.src(project.scss.custom.src)
            .pipe(sourcemaps.init({ loadMaps: true }))
            .pipe(sass({
                errLogToConsole: true,
                outputStyle: 'compact',
                precision: 10
            }))
            .on('error', console.error.bind(console))
            .pipe(autoprefixer(project.settings.browsers_autoprefixes))

            .pipe(lineec())
            .pipe(filter('**/*.css'))

            .pipe(rename({ suffix: '.min' }))

            .pipe(lineec())
            .pipe(sourcemaps.write())

            .pipe(gulp.dest(project.scss.custom.dest))

            .pipe(filter('**/*.css'))
            .pipe(browserSync.stream())
            .pipe(notify({ message: 'TASK: "styles" Completed! 💯', onLast: true }));
    }
}
// Compiling vendor JS
function vendorJS() {
    return gulp.src(project.js.vendor.src)
        .pipe(concat(project.js.vendor.folderName + '.js'))
        .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
        .pipe(gulp.dest(project.js.vendor.dest))
        .pipe(rename({
            basename: project.js.vendor.folderName,
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
        .pipe(gulp.dest(project.js.vendor.dest))
        .pipe(notify({ message: 'TASK: "vendorsJs" Completed! 💯', onLast: true }));
}
// Compiling custom JS
function customJS() {
    return gulp.src(project.js.custom.src)
        .pipe(concat(project.js.custom.fileName + '.js'))
        .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
        .pipe(gulp.dest(project.js.custom.dest))
        .pipe(rename({
            basename: project.js.custom.fileName,
            suffix: '.min'
        }))
        .pipe(uglify())
        .pipe(lineec()) // Consistent Line Endings for non UNIX systems.
        .pipe(gulp.dest(project.js.custom.dest))
        .pipe(notify({ message: 'TASK: "customJs" Completed! 💯', onLast: true }));
}
// Generate pot file from theme
function translate() {
    return gulp.src(project.php.watch)
        .pipe(sort())
        .pipe(wpPot({
            domain: project.text_domain,
            package: project.packageName,
        }))
        .pipe(gulp.dest('languages/'))
        .pipe(notify({ message: 'TASK: "translate" Completed! 💯', onLast: true }))
}
// Optimization image
function files() {
    'use strict';

    return gulp.src(project.uploads_dir.files, { base: project.uploads_dir.files })
        .pipe(imagemin({
            interlaced: true,
            progressive: true,
            optimizationLevel: 7,
            svgoPlugins: [{ removeViewBox: false }],
            use: [pngcrush()]
        }))
        .pipe(gulp.dest(project.uploads_dir.filesDest));
}
// Watch JS and SCSS
function watchFiles() {
    gulp.watch(project.scss.custom.watch, styles);
    gulp.watch(project.js.vendor.watch, vendorJS);
    gulp.watch(project.js.custom.watch, customJS);
}

// Tasks
gulp.task("styles", styles);
gulp.task("vendorJS", vendorJS);
gulp.task("customJS", customJS);
gulp.task("translate", translate);
gulp.task("files", files);

gulp.task("product", gulp.series(gulp.parallel(styles, vendorJS, customJS, translate, files)));

gulp.task("default", gulp.series(gulp.parallel(browser_sync, watchFiles)));

gulp.task("fonticons", gulp.series(gulp.parallel(fonticons)));
