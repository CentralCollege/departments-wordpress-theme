<?php
	// ----------------------------------------------------------------
	// Remove WordPress stuff that we don't want
	// ----------------------------------------------------------------
	// Headers
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	remove_action('wp_head', 'start_post_rel_link', 10, 0 );
	remove_action('wp_head', 'rel_canonical');
	
	// Dashboard widgets
	add_action('wp_dashboard_setup', 'CUI_remove_dashboard_widgets' );
	function CUI_remove_dashboard_widgets() {
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal');
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'side');
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'side');
	}
	// ----------------------------------------------------------------
	// Unregister default widgets
	// ----------------------------------------------------------------
	function unregister_default_wp_widgets(){
		unregister_widget('WP_Widget_Pages');
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Archives');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Search');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
		unregister_widget('WP_Widget_RSS');
		unregister_widget('WP_Widget_Tag_Cloud');
	}
	add_action('widgets_init', 'unregister_default_wp_widgets', 1);
	// ----------------------------------------------------------------
	// Add widget spaces
	// ----------------------------------------------------------------
	function central_department_widgets(){
		// Sidebar widgets
		register_sidebar(array(
			'name' => 'Sidebar widgets',
			'id' => 'central_sidebar_widgets',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));
		//Footer widgets
		register_sidebar(array(
			'name' => 'Footer widgets',
			'id' => 'central_footer_widgets',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		));
	}
	add_action('widgets_init', 'central_department_widgets');
	// ----------------------------------------------------------------
	// Add the capability for editors to edit theme options
	// ----------------------------------------------------------------
	$role = get_role('editor');
		$role->add_cap('edit_theme_options');
	// ----------------------------------------------------------------
	// Only keep the last 5 revisions of any page.
	// ----------------------------------------------------------------
	//define( 'WP_POST_REVISIONS', 5);
	
	// ----------------------------------------------------------------
	// Gives option for custom background picture
	// ----------------------------------------------------------------
	$defaults = array(
		'default-image'          => get_template_directory_uri() . '/images/header.jpg',
		'width'                  => 1024,
		'height'                 => 300,
		'flex-height'            => true,
		'flex-width'             => true,
		'header-text'			 => false,
	);
	add_theme_support( 'custom-header', $defaults );
	
	function add_ie_html5_shim () {
		echo '<!--[if lt IE 9]>';
		echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
		echo '<![endif]-->';
	}
	add_action('wp_head', 'add_ie_html5_shim');
	
	// ----------------------------------------------------------------
	// Add menu functionality to template
	// ----------------------------------------------------------------
	function register_my_menu() {
	  register_nav_menu('header-menu',__( 'Header Menu' ));
	}
	add_action( 'init', 'register_my_menu' );
	
	// ----------------------------------------------------------------
	// Add menu for managing social media outlets
	// ----------------------------------------------------------------
	function central_social_menu(){
		add_menu_page('Social Media', 'Social Media', 'edit_pages', 'central-social-media', 'central_social_media', '//img.centralcollege.info/icons/balloon.png', 98);
	}
	add_action('admin_menu', 'central_social_menu');
	
	//HTML for the menu goes here
	function central_social_media(){
		//Save data on form submit
			if (isset($_POST['central_twitter_URL']) && strlen($_POST['central_twitter_URL']) > 0){
				update_option('central_twitter_URL', $_POST['central_twitter_URL']);
			} else {
				update_option('central_twitter_URL','http://twitter.com/centralcollege'); 
			}
			if (isset($_POST['central_facebook_URL']) && strlen($_POST['central_facebook_URL']) > 0){
				update_option('central_facebook_URL', $_POST['central_facebook_URL']);
			} else {
				update_option('central_facebook_URL','http://facebook.com/centralcollege');
			}
			if (isset($_POST['central_youtube_URL']) && strlen($_POST['central_youtube_URL']) > 0){
				update_option('central_youtube_URL', $_POST['central_youtube_URL']);
			} else {
				update_option('central_youtube_URL','http://www.youtube.com/user/centralcollegeadm');
			}?>

	    <div class="wrap">
			<h2>Social Media Settings</h2>
            <p>Enter the URL to the following social media sites if applicable.</p>
            <form name="form1" method="post" action="">
            	<table class="form-table">
                    <tbody>
                        <tr>
                            <th align="right">
                                <label for="central_twitter_URL">Twitter Account:</label>
                            </th>
                            <td>
                                <input type="text" name="central_twitter_URL" id="central_twitter_URL" value="<?php echo get_option('central_twitter_url');?>" size="50" /><br />
                                <span class="description">Enter the URL to your Twitter account. <?php echo get_option('central_twitter_url');?></span>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">
                                <label for="central_facebook_URL">Facebook Account:</label>
                            </th>
                            <td>
                                <input type="text" name="central_facebook_URL" id="central_facebook_URL" value="<?php echo get_option('central_facebook_url');?>" size="50" /><br />
                                <span class="description">Enter the URL to your Facebook account. <?php echo get_option('central_facebook_url');?></span>
                            </td>
                        </tr>
                        <tr>
                            <th align="right">
                                <label for="central_youtube_URL">YouTube Account:</label>
                            </th>
                            <td>
                                <input type="text" name="central_youtube_URL" id="central_youtube_URL" value="<?php echo get_option('central_youtube_url');?>" size="50" /><br />
                                <span class="description">Enter the URL to your YouTube account. <?php echo get_option('central_youtube_url');?></span>
                            </td>
                        </tr>
                        <!--- Need to add Facebook and youTube !--->
                        <tr>
                            <td colspan="2"><input id="submit" class="button button-primary" type="submit" value="Update settings" name="submit"></td>
                        </tr> 
                    </tbody>
                </table>
			</form>
		</div>
	<?php
	}
	
	function central_theme_settings(){
		add_menu_page('Theme Settings', 'Theme Settings', 'edit_pages', 'theme-settings', 'central_theme_page', 'dashicons-art', 99);
	}
	add_action('admin_menu', 'central_theme_settings');
	
	function central_theme_page(){
		if (isset($_POST['active_banner_photo']) ) {
			update_option('active_banner_photo', $_POST['active_banner_photo']);
		}
			
    ?>
		<div class="wrapper">
			<h2>Theme Settings</h2>
            <form name="form2" method="post" action="">
            	<table class="form-table">
                    <tbody>
                        <tr>
                            <th align="right">
            					<label for="active_banner_photo">Banner photo on all pages: </label>
                            </th>
                            <td>
                                <select id="active_banner_photo" name="active_banner_photo">
                                	<option value="<?php echo get_option('active_banner_photo')?>" selected="selected"><?php echo get_option('active_banner_photo')?></option>
                                    <option value="-----------" disabled="disabled">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input id="submit" class="button button-primary" type="submit" value="Update settings" name="submit"></td>
                        </tr> 
                    </tbody>
                </table>
            </form>
        </div>
	<?php
	}
	
	// Add custom tinyMCE stylesheet
	function add_editor_styles() {
		add_editor_style('custom-editor-style.css');
	}
	add_action('init', 'add_editor_styles');
	
	// Add formats dropdown to tinyMCE
	function cui_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'styleselect' );
		return $buttons;
	}
	// Register our callback to the appropriate filter
	add_filter('mce_buttons_2', 'cui_mce_buttons');
	

	// Callback function to filter the MCE settings
	function add_tinyMCE_formats( $init_array ) {  
		$style_formats = array(  
			array(  
				'title' => 'errorBox',  
				'selector' => 'p,div',  
				'classes' => 'errorBox',
				'wrapper' => true,
			),
		);  
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;  
	} 
	// Attach callback to 'tiny_mce_before_init' 
	add_filter( 'tiny_mce_before_init', 'add_tinyMCE_formats' ); 
	
	
	
	//add_action('wp_head', 'show_template');

	//function show_template() {

	//	global $template;

     //   print_r($template);

	//}
?>