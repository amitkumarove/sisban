var gulp = require('gulp');
var plumber = require('gulp-plumber');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var gutil = require('gulp-util');
var browsersync = require('browser-sync');
var sourcemaps = require('gulp-sourcemaps');
var wpPot = require('gulp-wp-pot');
var postCSS = require('gulp-postcss');
var objectFitImages = require('postcss-object-fit-images');
const include = require('gulp-include')
let babel = require('gulp-babel');

gulp.task('fonts', gulp.series(function (done) {
    gulp.src(['fonts/**/*']).pipe(gulp.dest('dist/fonts'));
    done();
}));

gulp.task('styles', gulp.series(function (done) {
    gulp.src('sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber(function (error) {
            console.log(error);
            this.emit('end');
        }))
        .pipe(sass())
        .pipe(postCSS([objectFitImages]))
        .pipe(autoprefixer({browsers: ['defaults', 'iOS >= 8']}))
        .pipe(minifyCSS())
        .pipe(rename('main.min.css'))
        .pipe(sourcemaps.write('/'))
        .pipe(gulp.dest('dist/css').on('finish', () => {
            // gulp.start('purgecss');
        }))
        .pipe(browsersync.stream());
    done();
}));

const purgecss = require('gulp-purgecss')

gulp.task('purgecss', () => {
    return gulp.src('dist/css/main.min.css')
        .pipe(purgecss({
            content: ['./**/*.php'],
            whitelist: ['active'],
            whitelistPatterns: [
                /slick/,
                /animated/,
                /fadeIn/,
                /select2/,
                /cornermask/,
                /background__/,
                /modal/,
                /col-/,
                /d-/,
            ],
            whitelistPatternsChildren: [
                /hbspt/,
                /modal/,
                /page-numbers/,
                /header__logo/,
                /header__nav__links/,
                /header/,
                /plyr/,
                /media-frame/,
                /banner/,
                /about-what-we-do/,
                /article-text/,
                /footer/,
                /grid/,
                /block/,
                /herocarousel/,
                /homepage-hero/,
                /article-media/,
                /multi-column-text/,
                /portal-links/,
                /pricing-table/,
                /service-benefits/,
                /service-detail/,
                /service-highlights/,
                /service-product-details/,
                /service-solutions/,
                /statistics/,
                /testimonial/,
                /article-text/,
                /two-column/,
                /video-player/,
            ]
        }))
        .pipe(gulp.dest('dist/css'))
})

gulp.task('styles-prod', gulp.series(function (done) {
    gulp.src('sass/**/*.scss')
        .pipe(plumber(function (error) {
            console.log(error);
            this.emit('end');
        }))
        .pipe(sass())
        .pipe(postCSS([objectFitImages]))
        .pipe(autoprefixer({browsers: ['defaults', 'iOS >= 8']}))
        .pipe(minifyCSS())
        .pipe(rename('main.min.css'))
        .pipe(sourcemaps.write('/'))
        .pipe(gulp.dest('dist/css').on('finish', () => {
            // gulp.start('purgecss');
        }))
        .pipe(browsersync.stream({match: '**/*.css'}));
    done();
}));

gulp.task('scripts', gulp.series(function (done) {
    return gulp.src([
        'js/[^_]*.js',
    ])
        .pipe(include())
        .on('error', console.log)
        .pipe(concat('main.js'))
        .pipe(rename({suffix: '.min'}))
        // .pipe(babel({
        //     presets: ['es2015']
        // }))
        // .pipe(uglify().on('error', function (error) {
        //     gutil.log(gutil.colors.red('[Error]'), error.toString());
        //     this.emit('end');
        // }))
        .pipe(gulp.dest('dist/js'));
    done();
}));

gulp.task('browser-sync', gulp.series(function () {
    browsersync({
        proxy: {
            target: 'https://sisban.local'
        },
        snippetOptions: {
            whitelist: ['/wp-admin/admin-ajax.php'],
            blacklist: ['/wp-admin/**']
        }
    });
}));

gulp.task('vendor', gulp.series(function (done) {
    return gulp.src([
        'js/vendor/[^_]*.js',
    ])
        .pipe(concat('vendor.js'))
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify().on('error', function (error) {
            gutil.log(gutil.colors.red('[Error]'), error.toString());
            this.emit('end');
        }))
        .pipe(gulp.dest('dist/js'));
    done();
}));

gulp.task('translations', gulp.series(function (done) {
    var domain = 'lp';

    return gulp.src('./**/*.php')
        .pipe(wpPot({
            domain: domain,
            package: 'Sisban',
            headers: {
                NOTES: 'CMS = content management system, Copy = text content, Lead = text before something',
            },
        }))
        .pipe(gulp.dest('languages/' + domain + '.pot'));
    done();
}));

gulp.task('build', gulp.series(['styles', 'vendor', 'scripts', 'fonts']));
gulp.task('build-prod', gulp.series(['styles-prod', 'vendor', 'scripts', 'fonts']));
// gulp.task('build-prod', gulp.series(['styles-prod', 'vendor', 'scripts', 'purgecss']));

gulp.task('watch', gulp.series(function (done) {
    browsersync({
        proxy: {
            target: 'https://sisban.local'
        },
        snippetOptions: {
            whitelist: ['/wp-admin/admin-ajax.php'],
            blacklist: ['/wp-admin/**']
        }
    });

    gulp.watch('sass/**/*.scss', gulp.series('styles'));
    gulp.watch('js/**/[^_]*.js', gulp.series('scripts', function (done) {
        browsersync.reload();
        done();
    }))
    gulp.watch('js/vendor/[^_]*.js', gulp.series('vendor'));
    gulp.watch('../**/*.php', function (done) {
        browsersync.reload();
        done();
    });
}));

gulp.task('default', gulp.series(['build','watch'], function(done) {
    // default task code here
}));
