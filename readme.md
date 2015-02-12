Central College Departments Wordpress Theme
===================

A WordPress theme for Central College departments to use for a department website.

Sites
------------------
* This theme is available for departments at http://departments.central.edu. Contact Jacob Oyen to upgrade your site.

Deployment
------------------
This theme is currently designed to be manually deployed to a production server.

Vagrant
------------------
To easily spin up a development server to work on this theme, we've included Vagrant configuration files. 

1. [Optional] Include a WordPress XML export of your site in the root of the theme named `wp-import-data.xml`. Vagrant will populate the development server with this data.
2. At the command line, navigate to the vagrant folder.
3. Run `vagrant up` to initate a test server.

Vagrant requires:
* Vagrant to be installed - http://docs.vagrantup.com/v2/installation/
* VirtualBox to be installed - https://www.virtualbox.org/wiki/Downloads


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