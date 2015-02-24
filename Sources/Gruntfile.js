module.exports = function(grunt) {
	grunt.initConfig({
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Du dossier sources vers le dossier local
		// On copie les élément source utilisé dans le projet local
		copy: {
			golocal: {
				files: [
		    	//bootstrap
		    	{expand: true, cwd: 'node_modules/bootstrap/js/', src: ['**', '!**/tests/**'], dest: '../Local/js/js_bs'}, // '!**/tests/**' on exclu le dossier test		    	
		    	{expand: true, cwd: 'node_modules/bootstrap/less/', src: ['**'], dest: '../Local/css/less/less_bs'},
		    	{expand: true, cwd: 'node_modules/bootstrap/fonts/', src: ['**'], dest: '../Local/fonts'},
		      	// font awesome
		      	{expand: true, cwd: 'node_modules/font-awesome/less/', src: ['**'], dest: '../Local/css/less/less_fontawesome'},
		      	{expand: true, cwd: 'node_modules/font-awesome/fonts/', src: ['**'], dest: '../Local/fonts'},
		      	// Paypalplugin js accessible pour bootstrap
		      	{expand: true, cwd: 'node_modules/bootstrap-accessibility-plugin/plugins/js/', src: ['**', '!**/tests/**'], dest: '../Local/js/js_ppaccessible'}, // '!**/tests/**' on exclu le dossier test
		      	],
		      },
		    godist: {
				files: [
	    		//bootstrap
	    		{expand: true, cwd: '../Local/', src: ['**', '!**/tests/**', '!**/_doc/**', '!**/less/**', '!**/js_bs/**', '!**/js_ppaccessible/**', '!**/js_c3rb/**', '!**/js_tablerwd/**'], dest: '../dist/'},		    	
	      		// Dist copy to template mir // idee a aprofondir
	    		{expand: true, cwd: '../dist/', src: ['**'], dest: '../../joomla3x/templates/rgaac3rb/'}, 		    	
	      		],
	      	},
		  },
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Action sur local
		// On compile du less du dossier local vers du css (template.css) toujours en local sans compression.
		// tout les fichier less sont compilé depuis template.less c'est la raison pour laquelle il n'y a pas d'action grunt sur font.less et bsaccessib.less ils sont compris dans la compilation de template.less
		less: {
			tmpl_csscompressdist: {
				options: {
					paths: ["../Local/css/less/**/*"],
					compress: true, //compression du css
					ieCompat: true //Compatibilité Ie8 du css
					// optimization: 1 à 7 // pour compresser encore plus sur une echelle de 1 à 7
				},
				files: {
					"../Local/css/template.min.css": "../Local/css/less/mix.template.less"
				},
			},
			tmpl_csscompressdebug: {
				options: {
					paths: ["../Local/css/less/**/*"],
					compress: false, //compression du css
					ieCompat: true //Compatibilité Ie8 du css
					// optimization: 1 à 7 // pour compresser encore plus sur une echelle de 1 à 7
				},
					files: {
						"../Local/css/template.css": "../Local/css/less/template.less",
						"../Local/css/bootstrap.css": "../Local/css/less/less_bs/bootstrap.less",
						"../Local/css/font-awesome.css": "../Local/css/less/less_fontawesome/font-awesome.less",
						//"../Local/css/bootstrap.css": "../Local/css/less/less_ppaccessible/bootstrap.less" ligne paypaljs accessible
				},
			},
			//tmpl_cssuncompress: {
			//	options: {
			//		paths: ["../Local/css/less/**/*"],
			//		compress: false,
			//		ieCompat: true 
			//	},
			//	files: {
			//		"../Local/css/template.css": "../Local/css/less/template.less"
			//	},
			//},
		},
		// On compile du JS.
		uglify: {
			tmpl_jscompress: {
				options: {
					beautify: false //si true on compile le js sans compression
				},
				files: {
					//bootstrap js
					'../Local/js/bootstrap.min.js': 				[	'../Local/js/js_bs/transition.js',
																		'../Local/js/js_bs/alert.js',
																		'../Local/js/js_bs/button.js',
																		'../Local/js/js_bs/carousel.js',
																		'../Local/js/js_bs/collapse.js',
																		'../Local/js/js_bs/dropdown.js',
																		'../Local/js/js_bs/modal.js',
																		'../Local/js/js_bs/tooltip.js',
																		'../Local/js/js_bs/popover.js',
																		'../Local/js/js_bs/scrollspy.js',
																		'../Local/js/js_bs/tab.js',
																		'../Local/js/js_bs/affix.js'
												 					],
					//paypal accessib js
					'../Local/js/bootstrap-accessibility.min.js': 	[	'../Local/plugin/js/js_ppaccessible/bootstrap-accessibility.js'
												 				  	],

					'../Local/js/stacktable.min.js':				[	'../Local/js/js_tablerwd/stacktable.js'
												 				  	],
					'../Local/js/template.min.js': 					[	'../Local/js/js_c3rb/app.js'
												 				  	],
				},
			},
			tmpl_jsuncompress: {
				options: {
					beautify: true //si true on compile le js sans compression
				},
				files: {
					'../Local/js/bootstrap.js': 					[	'../Local/js/js_bs/transition.js',
																		'../Local/js/js_bs/alert.js',
																		'../Local/js/js_bs/button.js',
																		'../Local/js/js_bs/carousel.js',
																		'../Local/js/js_bs/collapse.js',
																		'../Local/js/js_bs/dropdown.js',
																		'../Local/js/js_bs/modal.js',
																		'../Local/js/js_bs/tooltip.js',
																		'../Local/js/js_bs/popover.js',
																		'../Local/js/js_bs/scrollspy.js',
																		'../Local/js/js_bs/tab.js',
																		'../Local/js/js_bs/affix.js'
												 					],
					'../Local/js/bootstrap-accessibility.js': 		[	'../Local/plugin/js/js_ppaccessible/bootstrap-accessibility.js'
												 				  	],
					'../Local/js/stacktable.js':					[	'../Local/js/js_tablerwd/stacktable.js'
												 				  	],

					'../Local/js/template.js': 						[	'../Local/js/js_c3rb/app.js'
												 				  	],

				},
			},
		},
		watch: {
			css:{
      			files: ['../Local/css/less/**/*'],
      			tasks: ['less','copy:godist'],
     		},
     		js:{
				files: ['../Local/js/**/*'],
      			tasks: ['uglify','copy:godist'],
      		},
      		autres:{
				files: ['../Local/**/*'],
      			tasks: ['copy:godist'],
      		},
      	},
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//Local vers dist & action

	});
	

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// On charge les modules
	grunt.loadNpmTasks('grunt-contrib-copy'); 	// module de copie
	grunt.loadNpmTasks('grunt-contrib-less'); 	// module compilation Less
	grunt.loadNpmTasks('grunt-contrib-uglify');	// module compilation JS
	grunt.loadNpmTasks('grunt-contrib-watch'); 	// module watch pour action a l'enregistrement (regard sur les fichiers)

};

