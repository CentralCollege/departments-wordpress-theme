<!doctype html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    	<title><?php wp_title( '-', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
        <link rel="shortcut icon" href="//www.central.edu/favicon.ico" /> 
        <link rel="apple-touch-icon-precomposed" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-57.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-72.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-144.png">
        <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
    	<?php wp_head(); ?>
    </head>
    <body <?php body_class($class); ?>> 
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
				<div id="cui_menu">
                    <ul id="menu">
                    	<?php
						if ( has_nav_menu( 'header-menu' ) ) {

                    		wp_nav_menu( array( 'menu' => 'header-menu', 'menu_class' => 'menu', ) ); 

						} ?>
                </ul>
                </div>
                <div class="clearboth"></div>
            </div>
            <?php if (get_option('active_breadcrumb') == 'yes') { ?>
				<?php
                    if (function_exists('central_breadcrumbs')){
                        ?><div id="breadcrumb"><?php central_breadcrumbs(); ?></div><?php
                    }
                ?>
            <?php } ?>
            <div id="content"></div>
