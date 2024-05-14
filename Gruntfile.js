/* jshint node:true */
module.exports = function( grunt ) {
	'use strict';

	var is_dev = grunt.option( 'dev' );
	var sass   = require( 'node-sass' );

	// Configuration.
	grunt.initConfig( {

		// Setting folder templates.
		dirs: {
			css: './assets/css',
			sass: './assets/sass',
			images: './assets/images',
			js: './assets/js',
			php: './includes',
			languages: './languages',
			build: './build',
		},
		phpcs: {
			options: {
				bin: 'vendor/bin/phpcs'
			},
			dist: {
				src:  [
					'**/*.php', // Include all php files.
					'!node_modules/**',
					'!vendor/**'
				]
			}
		},
		stylelint: {
			options: {
				configFile: '.stylelintrc',
				customSyntax: 'postcss-scss',
				fix: true
			},
			all: [
				'<%= dirs.sass %>/**/*.scss'
			]
		},
		jshint: {
			options: {
				jshintrc: '.jshintrc'
			},
			all: [
				'Gruntfile.js',
				'assets/js/*.js'
			]
		},
		sass: {
			compile: {
				options: {
					implementation: sass,
					sourceMap: is_dev ? true : false,
					outputStyle: 'expanded'
				},
				files: [ {
					'<%= dirs.css %>/wooawa-admin.css': '<%= dirs.sass %>/wooawa-admin.scss'
				} ]
			}
		},
		makepot: {
			options: {
				type: 'wp-plugin',
				domainPath: 'languages',
				potHeaders: {
					'report-msgid-bugs-to': '',
					'language-team': 'LANGUAGE <EMAIL@ADDRESS>'
				}
			},
			frontend: {
				options: {
					potFilename: 'wooawa.pot',
					exclude: [
						'node_modules',
						'vendor'
					]
				}
			}
		},
		watch: {
			css: {
				files: ['<%= dirs.sass %>/**/*.scss'],
				tasks: ['sass'],
				options: {
					spawn: false
				}
			}
		},
		copy: {
			build: {
				src: [
					'**',
					'!.*',
					'!.*/**',
					'!*.md',
					'!*.scss',
					'!**/*.gitkeep',
					'!assets/sass/**',
					'!.DS_Store',
					'!assets/js/src/**',
					'!composer.json',
					'!composer.lock',
					'!Gruntfile.js',
					'!node_modules/**',
					'!npm-debug.log',
					'!package.json',
					'!package-lock.json',
					'!pnpm-lock.yaml',
					'!phpcs.xml',
					'!woocommerce-apiwa-auto/**',
					'!woocommerce-apiwa-auto.zip',
					'!vendor/**'
				],
				dest: '<%= dirs.build %>/woocommerce-apiwa-auto',
				expand: true,
				dot: true
			}
		},
		compress: {
			build: {
				options: {
					archive: '<%= dirs.build %>/woocommerce-apiwa-auto.zip',
					mode: 'zip'
				},
				files: [ {
					expand: true,
					cwd: '<%= dirs.build %>/',
					src: '**'
				} ]
			}
		},
		clean: {
			build: {
				src: [
					'<%= dirs.css %>/**/*.css',
					'<%= dirs.css %>/**/*.css.map',
					'<%= dirs.languages %>/*.pot',
					'<%= dirs.build %>/**',
				]
			}
		}
	} );

	// Load NPM tasks to be used here.
	grunt.loadNpmTasks( 'grunt-contrib-clean' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-phpcs' );
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-stylelint' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	// Register tasks.
	grunt.registerTask( 'default', [] );

	grunt.registerTask( 'css', [
		'sass'
	] );

	grunt.registerTask( 'lint', [
		'stylelint',
		'jshint',
		'phpcs'
	] );

	grunt.registerTask( 'dev', [
		'css',
		'makepot'
	] );

	grunt.registerTask( 'build', [
		'clean',
		'lint',
		'dev',
		'copy',
		'compress'
	] );
};
