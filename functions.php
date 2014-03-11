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
		unregister_widget('WP_Widget_Text');
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
			'id' => 'central_sidebar_widgets'
		));
		//Footer widgets
		register_sidebar(array(
			'name' => 'Footer widgets',
			'id' => 'central_footer_widgets'
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
?>