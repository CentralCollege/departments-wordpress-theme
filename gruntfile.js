 module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		
		secret:grunt.file.readJSON('secret.json'),
		sftp: {
		  test: {
			files: {
			  "./": ["custom-editor-style.css", "footer.php", "full-width-page.php", "functions.php", "header.php", "index.php", "page.php", "sidebar.php", "single.php", "style.css"]
			},
			options: {
			  path: '<%= secret.path %>',
			  host: '<%= secret.host %>',
			  username: '<%= secret.username %>',
			  password: '<%= secret.password %>',
			  showProgress: true
			}
		  }
		},
		
		//Watch folders		
		watch: {
			php:{
				files:'*.php',
				tasks:['sftp'],
				options:{
					spawn: false,
				}
			}
		}
	});
	
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-ssh');
		
	grunt.registerTask('default', ['watch']);
};
	