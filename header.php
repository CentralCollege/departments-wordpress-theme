<!doctype html>
<html>
	<head>
    	<title><?php wp_title( '-', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
        <link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    	<?php wp_head(); ?>
    </head>
    <body>
        <div class="coverImage">
            <img src="<?php header_image(); ?>" />
        </div>
        
        <div class="logoGroup">	
                <div class="logo"><a href="http://www.central.edu/"><img alt="Central College Logo" src="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo.png"></a></div>
                <h1><?php bloginfo('name'); ?></h1>   
        </div>
        <div id="wrapper">
            <div id="header">
                <div class="headbar">
                	 <?php
						if ( has_nav_menu( 'header-menu' ) ) {
                    		wp_nav_menu( array( 'menu' => 'header-menu', 'menu_class' => 'menu', ) ); 
						} ?>
                </div>
            </div>
    
        <div class="header">
            <h1>Department Name</h1>
        </div> 