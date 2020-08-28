/**
 * Load plugins.
 */
var gulp = require( 'gulp' ),
	cached = require( 'gulp-cached' ),
	sass = require( 'gulp-sass' ),
	sourcemaps = require( 'gulp-sourcemaps' ),
	rename = require( 'gulp-rename' ),
	debug = require( 'gulp-debug' ),
	uglify = require( 'gulp-uglify' ),
	imagemin = require( 'gulp-imagemin' ),
	zip = require( 'gulp-zip' ),
	packageJSON = require( './package.json' ),
	exec = require( 'child_process' ).exec;

var plugin = {
	name: 'File Upload Types',
	slug: 'file-upload-types',
	files: [
		'**',
		// Exclude all the files/dirs below. Note the double negate (when ! is used inside the exclusion) - we may actually need some things.
		'!**/*.map',
		'!LICENSE',
		'!assets/**/*.scss',
		'!assets/wporg/**',
		'!assets/wporg',
		'!**/.github/**',
		'!**/.github',
		'!**/bin/**',
		'!**/bin',
		'!**/tests/**',
		'!**/tests',
		'!**/Tests/**',
		'!**/Tests',
		'!**/test/**',
		'!**/test',
		'!**/Test/**',
		'!**/Test',
		'!**/build/**',
		'!**/build',
		'!**/example/**',
		'!**/example',
		'!**/examples/**',
		'!**/examples',
		'!**/doc/**',
		'!**/doc',
		'!**/docs/**',
		'!**/docs',
		'!**/node_modules/**',
		'!**/node_modules',
		'!**/*.md',
		'!**/*.sh',
		'!**/*.rst',
		'!**/*.xml',
		'loco.xml',
		'!**/*.yml',
		'!**/*.dist',
		'!**/*.json',
		'assets/file-types-list.json',
		'assets/file-types-list-v2.json',
		'!**/*.lock',
		'!**/gulpfile.js',
		'!**/Makefile',
		'!**/AUTHORS',
		'!vendor/composer/installers/**'
	],
	php: [
		'**/*.php',
		'!vendor/**',
		'!tests/**'
	],
	scss: [
		'assets/css/**/*.scss',
	],
	js: [
		'assets/js/*.js',
		'!assets/js/*.min.js'
	],
	images: [
		'assets/images/**/*',
	]
};

/**
 * Compile SCSS to CSS, compress.
 */
gulp.task( 'css', function () {
	return gulp.src( plugin.scss )
			   // UnMinified file.
			   .pipe( cached( 'processCSS' ) )
			   .pipe( sourcemaps.init() )
			   // Minified file.
			   .pipe( sass( { outputStyle: 'compressed' } ).on( 'error', sass.logError ) )
			   .pipe( rename( function ( path ) {
				   path.dirname = '/assets/css';
				   path.extname = '.css';
			   } ) )
			   .pipe( sourcemaps.write( '.' ) )
			   .pipe( gulp.dest( '.' ) )
			   .pipe( debug( { title: '[css]' } ) );
} );

/**
 * Compress js.
 */
gulp.task( 'js', function () {
	return gulp.src( plugin.js )
			   .pipe( cached( 'processJS' ) )
			   .pipe( uglify() ).on( 'error', console.log )
			   .pipe( rename( function ( path ) {
				   path.dirname = '/assets/js';
				   path.basename += '.min';
			   } ) )
			   .pipe( gulp.dest( '.' ) )
			   .pipe( debug( { title: '[js]' } ) );
} );

/**
 * Optimize image files.
 */
gulp.task( 'img', function () {
	return gulp.src( plugin.images )
			   .pipe( imagemin() )
			   .pipe( gulp.dest( function ( file ) {
				   return file.base;
			   } ) )
			   .pipe( debug( { title: '[img]' } ) );
} );

/**
 * Generate .pot files.
 */
gulp.task( 'pot', function ( cb ) {
	exec( 'wp i18n make-pot ./ ./languages/file-upload-types.pot --slug="'+ plugin.slug +'" --domain="'+ plugin.slug +'" --package-name="'+ plugin.name +'" --file-comment=""', function ( err, stdout, stderr ) {
		console.log( stdout );
		console.log( stderr );
		cb( err );
	} );
} );

/**
 * Generate a .zip file.
 */
gulp.task( 'zip', function () {
	var files = plugin.files;

	// Modifying 'base' to include plugin directory in a zip.
	return gulp.src( files, { base: '.' } )
			   .pipe( rename( function ( file ) {
				   file.dirname = plugin.slug + '/' + file.dirname;
			   } ) )
			   .pipe( zip( plugin.slug + '-' + packageJSON.version + '.zip' ) )
			   .pipe( gulp.dest( './build' ) )
			   .pipe( debug( { title: '[zip]' } ) );
} );

/**
 * Task: build.
 */
gulp.task( 'build', gulp.series( gulp.parallel( 'css', 'js', 'img', 'pot' ), 'zip' ) );

/**
 * Look out for relevant sass/js changes.
 */
gulp.task( 'watch', function () {
	gulp.watch( plugin.scss, gulp.parallel( 'css' ) );
	gulp.watch( plugin.js, gulp.parallel( 'js' ) );
} );

/**
 * Default.
 */
gulp.task( 'default', gulp.parallel( 'css', 'js', 'pot' ) );
