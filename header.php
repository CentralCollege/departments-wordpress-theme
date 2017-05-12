<!doctype html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="shortcut icon" href="//www.central.edu/favicon.ico" />
        <link rel="apple-touch-icon-precomposed" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-57.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-72.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="//d1lqhpmxg10s5j.cloudfront.net/images/main/centralCollegeLogo-144.png">
        <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
				<?php if($_SERVER['HTTP_HOST'] == 'lillyfellows.central.edu'){ ?>
				<script>
				  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
				  ga('create', 'UA-99021860-1', 'auto');
				  ga('send', 'pageview');
				</script>
				<?php } ?>
    	<?php wp_head(); ?>
    </head>
    <body <?php body_class($class); ?>>
		<?php if (get_option('active_banner_photo') == 'no') {?>
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
