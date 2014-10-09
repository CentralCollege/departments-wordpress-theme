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
		
		cssmin: {
			target:{
				files:[{
					expand: true,
					cwd: '',
					src:['*.css','!*.min.css'],
					dest: '',
					ext:'.min.css'
				}]
			}
		},
		
		//Watch folders		
		watch: {
			css:{
				files: ['*.css'],
				tasks: ['cssmin'],
				options:{
					spawn: false,
				},
			php:{
				files: ['*.php', '*.css'],
				tasks:['sftp'],
				options:{
					spawn: false,
				}			
			}
		}
	}
});
	
	grunt.loadNpmTasks('grunt-ssh');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
		
	grunt.registerTask('default', ['watch']);
};
	