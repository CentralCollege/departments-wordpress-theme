<!doctype html>
<html>
	<head>
    	<title><?php wp_title( '-', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
        <link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    	<?php wp_head(); ?>
    </head>
    <body>
		<?php if (!is_front_page() && get_option('active_banner_photo') == 'no') { 
			
		?> 
        	<div class="logoLink">
             <a href="<?php echo home_url(); ?>">
                <div class="logoGroupNoImage">	
                    <div class="logo"><img alt="Central College Logo" src="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo.png"></div>
                    <h1><?php bloginfo('name'); ?></h1>   
                </div>
            </a>
            </div>
        <?php }else{?>
        	<div class="logoLink">
        	<a href="<?php echo home_url(); ?>">
                <div class="logoGroup">	
                    <div class="logo"><img alt="Central College Logo" src="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo.png"></div>
                    <h1><?php bloginfo('name'); ?></h1>   
                </div>
            </a> 
            </div>
            <div class="coverImage">
                <img src="<?php header_image(); ?>" />
            </div>
        <?php }?>
      
        <div id="wrapper">
            <div id="header">
                <div class="headbar">
                	 <?php
						if ( has_nav_menu( 'header-menu' ) ) {
                    		wp_nav_menu( array( 'menu' => 'header-menu', 'menu_class' => 'top-menu',) ); 
						} ?>
                </div>
            </div>
