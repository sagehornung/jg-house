
module.exports = function ( grunt ) {

	// load all grunt tasks matching the `grunt-*` pattern
	// Ref. https://npmjs.org/package/load-grunt-tasks
	require( 'load-grunt-tasks' )( grunt );

	grunt.initConfig( {
		// watch for changes and trigger sass, jshint, uglify and livereload
		watch: {
			sass: {
				files: [ 'sass/**/*.{scss,sass}' ],
				tasks: [ 'sass' ]
			},
			js: {
				files: '<%= uglify.frontend.src %>',
				tasks: [ 'uglify' ]
			},
			livereload: {
				// Here we watch the files the sass task will compile to
				// These files are sent to the live reload server after sass compiles to them
				options: { livereload: true },
				files: [ '*.php', '*.css' ]
			}
		},
		// Compile Sass to CSS
		// Ref. https://www.npmjs.com/package/grunt-contrib-sass
		sass: {
			minify: {
						options: {
							style: 'compressed' // nested / compact / compressed / expanded
						},
						files: {
							'style.css': 'sass/style.scss' // 'destination': 'source'
						}
					},
			expanded: {
						options: {
							style: 'nested' // nested / compact / compressed / expanded
						},
						files: {
							'style-dev.css': 'sass/style.scss' // 'destination': 'source'
						}
					  },

			// editor: {
			// 			options: {
			// 				style: 'compressed' // nested / compact / compressed / expanded
			// 			},
			// 			files: {
			// 				'editor-style.css': 'sass/editor-style.scss' // 'destination': 'source'
			// 			}
			// 		},

		},
		// autoprefixer
		autoprefixer: {
			options: {
				browsers: [ 'last 2 versions', 'ie 9', 'ios 6', 'android 4' ],
				map: true
			},
			files: {
				expand: true,
				flatten: true,
				src: '*.css',
				dest: ''
			}
		},
		// Uglify Ref. https://npmjs.org/package/grunt-contrib-uglify
		uglify: {
			options: {
				banner: '/*! \n * Supernova v2.0 JavaScript Library \n * Contains jQuery.cycle2.js, jquery.mmenu.min.all.js, jquery.sticky.js, main.js \n * @package Supernova \n */',
				sourceMap: 'js/main.js.map',
				sourceMappingURL: 'main.js.map',
				sourceMapPrefix: 2
			},
			frontend: {
				src: [
					'js/vendor/jquery.cycle2.js',
					'js/vendor/jquery.mmenu.min.all.js',
					'js/vendor/jquery.sticky.js',
					'js/main.js'
				],
				dest: 'js/main.min.js'
			}
		},
		// Internationalize WordPress themes and plugins
		// Ref. https://www.npmjs.com/package/grunt-wp-i18n
		//
		// IMPORTANT: `php` and `php-cli` should be installed in your system to run this task
		makepot: {
					target: {
						options: {
							cwd: '.', // Directory of files to internationalize.
							domainPath: 'languages/', // Where to save the POT file.
							exclude: [ 'node_modules/*' ], // List of files or directories to ignore.
							mainFile: 'index.php', // Main project file.
							potFilename: 'supernova.pot', // Name of the POT file.
							potHeaders: { // Headers to add to the generated POT file.
								poedit: true, // Includes common Poedit headers.
								'Last-Translator': 'Supernova Themes <support@supernovathemes.com>',
								'Language-Team': 'Team <support@supernovathemes.com>',
								'report-msgid-bugs-to': 'http://supernovathemes.com/',
								'x-poedit-keywordslist': true // Include a list of all possible gettext functions.
							},
							type: 'wp-theme', // Type of project (wp-plugin or wp-theme).
							updateTimestamp: true // Whether the POT-Creation-Date should be updated without other changes.
						}
					}
				},

		//https://www.npmjs.com/package/grunt-checktextdomain
		checktextdomain: {
			options: {
				text_domain: 'supernova', //Specify allowed domain(s)
				keywords: [ //List keyword specifications
					'__:1,2d',
					'_e:1,2d',
					'_x:1,2c,3d',
					'esc_html__:1,2d',
					'esc_html_e:1,2d',
					'esc_html_x:1,2c,3d',
					'esc_attr__:1,2d',
					'esc_attr_e:1,2d',
					'esc_attr_x:1,2c,3d',
					'_ex:1,2c,3d',
					'_n:1,2,4d',
					'_nx:1,2,4c,5d',
					'_n_noop:1,2,3d',
					'_nx_noop:1,2,3c,4d'
				]
			},
			target: {
				files: [ {
						src: [
							'*.php',
							'**/*.php',
							'!node_modules/**',
							'!tests/**'
						], //all php
						expand: true
					} ]
			}
		},
	} );

	// register task
	//grunt.registerTask( 'default', [ 'sass' , 'watch' ] );
	grunt.registerTask( 'default', [ 'sass', 'autoprefixer', 'checktextdomain', 'makepot', 'uglify', 'watch' ] );
};
