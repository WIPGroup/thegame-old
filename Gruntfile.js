module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		clean: {
			js: ["bower_components/**/*.*",
			"!bower_components/**/*.min.js",
			"!bower_components/**/*.min.css",
			"!bower_components/pace/themes/black/pace-theme-minimal.css",
			"!bower_components/pace/pace.js",
			"!bower_components/offline/themes/offline-theme-slide.css",
			"!bower_components/offline/themes/offline-language-english.css",
			"!bower_components/sweetalert/lib/sweet-alert.css"]
		}
	});

	grunt.loadNpmTasks('grunt-contrib-clean');
	grunt.registerTask('default', ['clean']);
};
