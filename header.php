<!doctype html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
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
				<div id="cui_menu">
                    <ul id="menu">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#">About</a>
                        <ul class="hidden">
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">What We Do</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Portfolio</a>
                        <ul class="hidden">
                            <li><a href="#">Photography</a></li>
                            <li><a href="#">Web & User Interface Design</a></li>
                            <li><a href="#">Illustration</a></li>
                        </ul>
                    </li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                </div>
                <div class="clearboth"></div>
            </div>
            <?php
				if (function_exists('central_breadcrumbs')){
					?><div id="breadcrumb"><?php central_breadcrumbs(); ?></div><?php
				}
			?>
            <div id="content"></div>
