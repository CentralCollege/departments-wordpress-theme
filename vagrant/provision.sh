#!/bin/sh

## Install all the things
export DEBIAN_FRONTEND=noninteractive
apt-get update
apt-get install --assume-yes php5 php5-mysql php5-cli php5-curl php-apc \
	apache2 libapache2-mod-php5 mysql-client mysql-server supervisor \
	vim ntp bzip2 php-pear imagemagick php5-imagick

## make www-data use /bin/bash for shell
chsh -s /bin/bash www-data

## Create a directory structure
## (These would probably already exist within your project)
mkdir /var/www/wordpress

## Create an Apache vhost
## (This would probably already exist within your project)
echo "<VirtualHost *:80>
ServerName dev.departments.central.edu
DocumentRoot /var/www/wordpress
<Directory /var/www/wordpress>
	AllowOverride All
    Allow from All
</Directory>
</VirtualHost>" > /var/www/wordpress/departments.dev.conf

## Tell Apache about our vhost
ln -s /var/www/wordpress/departments.dev.conf /etc/apache2/sites-enabled/departments.dev.conf

## Tweak permissions for www-data user
chgrp www-data /var/log/apache2
chmod g+w /var/log/apache2

## Enable Apache's mod-rewrite, if it's not already
a2enmod rewrite

## Disable the default sites
a2dissite 000-default

## Configure PHP for dev
echo "upload_max_filesize = 15M
log_errors = On
display_errors = On
display_startup_errors = On
error_log = /var/log/apache2/php.log
memory_limit = 1024M
date.timezone = Europe/London" > /etc/php5/mods-available/software.ini

php5enmod software

## Restart Apache
service apache2 reload

## Create a database and grant a user some permissions
echo "create database departments;" | mysql -u root
echo "grant all on departments.* to departments@localhost identified by 'departments';" | mysql -u root

## Install wp-cli
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar

mv /home/vagrant/wp-cli.phar /var/www/wordpress/wp-cli
chmod +x /var/www/wordpress/wp-cli

## Install Wordpress core using wp-cli
/var/www/wordpress/wp-cli core download \
	--path=/var/www/wordpress \
	--force --allow-root

rm /var/www/wordpress/wp-config-sample.php

## Very basic wp-config.php using our recently created MySQL credentials
## Could use wp-cli for this too, but this'll do
echo "<?php
\$table_prefix = 'foo_';
define('DB_NAME',     'departments');
define('DB_USER',     'departments');
define('DB_PASSWORD', 'departments');
define('DB_HOST',     'localhost');
define('DB_CHARSET',  'utf8');
define('WPLANG', '' );
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');
?>" > /var/www/wordpress/wp-config.php

## Create a default .htaccess
echo "# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>
# END WordPress" > /var/www/wordpress/.htaccess

## Provision Wordpress using wp-cli
/var/www/wordpress/wp-cli core install \
	--url='http://192.168.56.111' \
	--path=/var/www/wordpress \
	--title='Departments' \
	--admin_user=admin \
	--admin_password=admin \
	--admin_email=oyenj@central.edu \
	--allow-root

## siteurl & home are getting /code appended in wp_options, no idea why
/var/www/wordpress/wp-cli option update siteurl 'http://192.168.56.111' \
	--path=/var/www/wordpress \
	--allow-root

/var/www/wordpress/wp-cli option update home 'http://192.168.56.111' \
	--path=/var/www/wordpress \
	--allow-root

/var/www/wordpress/wp-cli option update blogdescription 'A test site for departments.' \
	--path=/var/www/wordpress \
	--allow-root

/var/www/wordpress/wp-cli rewrite structure '/%year%/%monthnum%/%postname%/' \
	--path=/var/www/wordpress \
	--allow-root

/var/www/wordpress/wp-cli theme activate departments-wordpress-theme \
	--path=/var/www/wordpress \
	--allow-root

# Check and see if there is an import file. If so download the import plugin and run it.
file=/var/www/wordpress/wp-content/themes/departments-wordpress-theme/wp-import-data.xml
if [ -f $file ];
then
	/var/www/wordpress/wp-cli plugin install wordpress-importer --activate \
		--path=/var/www/wordpress \
		--allow-root

	/var/www/wordpress/wp-cli import '/var/www/wordpress/wp-content/themes/departments-wordpress-theme/wp-import-data.xml' \
		--authors=skip \
		--path=/var/www/wordpress \
		--allow-root
# Import generic testing data.
else
	curl -OL https://raw.githubusercontent.com/manovotny/wptest/master/wptest.xml
	#Optionally, use WordPress official theme unit test data
	# curl -OL https://wpcom-themes.svn.automattic.com/demo/theme-unit-test-data.xml
	mv /home/vagrant/wptest.xml /var/www/wordpress/wp-content/themes/departments-wordpress-theme/wp-import-data.xml

	/var/www/wordpress/wp-cli plugin install wordpress-importer --activate \
		--path=/var/www/wordpress \
		--allow-root

	/var/www/wordpress/wp-cli import '/var/www/wordpress/wp-content/themes/departments-wordpress-theme/wp-import-data.xml' \
		--authors=skip \
		--path=/var/www/wordpress \
		--allow-root

	echo "Imported generic test data."
fi

/var/www/wordpress/wp-cli post delete 1 --force \
	--path=/var/www/wordpress \
	--allow-root

/var/www/wordpress/wp-cli post create \
	--path=/var/www/wordpress \
	--post_title='Get started testing' \
	--post_content='<p>Login with admin/admin.<p>' \
	--post_status=publish \
	--allow-root

# Add/Remove plugins then update everything that is installed.
/var/www/wordpress/wp-cli plugin uninstall hello \
	--path=/var/www/wordpress \
	--allow-root

/var/www/wordpress/wp-cli plugin install "WordPress Beta Tester" \
	--path=/var/www/wordpress \
	--allow-root

/var/www/wordpress/wp-cli plugin update \
	--path=/var/www/wordpress \
	--allow-root \
	--all

## Set excessively liberal permissions on all of WordPress since we are testing.
chmod -R 777 /var/www/wordpress
chown www-data.www-data /var/www/wordpress -R
