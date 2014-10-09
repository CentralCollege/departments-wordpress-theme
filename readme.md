Central College Departments Wordpress Theme
===================

A WordPress theme for Central College departments to use for a department website.

Sites
------------------
* This theme is available on the test site at http://wptest.central.edu
* This theme is available for departments at http://departments.central.edu. Contact Jacob Oyen to upgrade your site.


Grunt Integration
------------------
You can use the Grunt javascript task runner (http://gruntjs.com/) with this project. It currently performs the following commands:

* Watches all `.php` files and uses SSH to transfer to a remote server.
* Watches all `.css` files and minifies them.

Grunt Configuration
------------------

1. Install the Grunt CLI if you haven't already:  http://gruntjs.com/getting-started
2. Run `npm install` to install the project dependencies
3. Create a `secret.json` file following this structure:

	```javscript
	{
	    "host" : "hostname-here",
		"path" : "/remote/server/path/here/",
	    "username" : "username",
	    "password" : "**********"
	}
	```
4. Run Grunt with the `grunt` command.