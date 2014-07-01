<!doctype html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    	<title><?php wp_title( '-', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
        <link href='http://fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
        <style type="text/css">
		#cui_menu ul {
			margin: 0;
			padding: 0;
			list-style: none;
			font-size: 1.1em
		}
		#cui_menu ul li {
			display: block;
			position: relative;
			float: left;
			border-right: 1px solid #cb2026;
		}
		#cui_menu ul li:last-child {
			border-right: none;
		}
		#cui_menu li ul {
			display: none;
		}
		#cui_menu ul li a {
			display: block;
			text-decoration: none;
			color: #ffffff;
			padding: 5px 15px 5px 15px;
			background: #990000;
			white-space: nowrap;
			font-size: 1.4em;
		}
		#cui_menu ul li a:hover {
			background: #cb2026;
		}
		#cui_menu li:hover ul {
			display: block;
			position: absolute;
		}
		#cui_menu li:hover li {
			float: none;
		}
		#cui_menu li:hover a {
			background: #ccc;
		}
		#cui_menu li:hover li a:hover {
			background: #333;
		}
		#cui_menu ul li ul li{
			font-size: .5em;
		}
		@media only screen and (max-width: 480px) {
			#cui_menu ul li {
				float: none;
				display: block;	
				color: #fff;
				border-bottom: 1px solid #fff;
			}
			#cui_menu ul li a {
				background: none;
				color: #fff;
				padding: none;
				white-space:normal;
			}
			#cui_menu ul li ul li{
				display: none;
			}	
		}
		</style>
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
            <div id="content"></div>
