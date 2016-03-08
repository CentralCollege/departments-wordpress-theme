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

	// Default widgets
	function unregister_default_wp_widgets(){
		unregister_widget('WP_Widget_Calendar');
		unregister_widget('WP_Widget_Meta');
		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Recent_Comments');
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

	// ----------------------------------------------------------------
	// Allow users to change the background image of the site
	// ----------------------------------------------------------------
	$background_defaults = array(
		'default-image' => get_template_directory_uri() . '/images/graystripes2.png',
		'default-repeat'	=> 'repeat'
	);
	add_theme_support('custom-background', $background_defaults);

	// ----------------------------------------------------------------
	// Add theme support for custom title tags
	// ----------------------------------------------------------------
	add_theme_support('title-tag');
	
	// ----------------------------------------------------------------
	// Add HTML5 shim if needed
	// ----------------------------------------------------------------
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
	// Add menu for managing homepage items
	// ----------------------------------------------------------------
	function site_settings_items_menu(){
		add_menu_page('Site Settings', 'Site Settings', 'edit_pages', 'site_settings_items_menu', 'site_settings_items_edit', 'dashicons-admin-home', 81);
	}
	add_action('admin_menu', 'site_settings_items_menu');
	//HTML for this page is done through an include.
	function site_settings_items_edit(){
		include 'features/settings.php';
	}

	// ----------------------------------------------------------------
	// tinyMCE adjustments
	// ----------------------------------------------------------------
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
	add_filter('mce_buttons', 'cui_mce_buttons');

	// Callback function to filter the MCE settings
	function add_tinyMCE_formats( $init_array ) {
 		$style_formats = array(
 			array(
 				'title' => 'errorBox',
				'selector' => 'p,div',
				'block' => 'p',
				'selector' => 'p',
 				'classes' => 'errorBox',
 				'wrapper' => true,
 			),
			array(
			'title' => 'infoBox',
				'block' => 'p',
				'selector' => 'p',
				'classes' => 'infoBox',
				'wrapper' => true,
			),
			array(
				'title' => 'successBox',
				'block' => 'p',
				'selector' => 'p',
				'classes' => 'successBox',
				'wrapper' => true,
			),
			array(
				'title' => 'warningBox',
				'block' => 'p',
				'selector' => 'p',
				'classes' => 'warningBox',
				'wrapper' => true,
			),		);
		$init_array['style_formats'] = json_encode( $style_formats );
		return $init_array;
	}
	// Attach callback to 'tiny_mce_before_init'
	add_filter( 'tiny_mce_before_init', 'add_tinyMCE_formats' );

	// ----------------------------------------------------------------
	// Add breadcrumb functionality
	// ----------------------------------------------------------------
	function central_breadcrumbs() {
		$delimiter = '/';
		$name = 'Home'; //text for the 'Home' link
		$currentBefore = '<span class="active_breadcrumb">';
		$currentAfter = '</span>';

		if ( !is_home() && !is_front_page() || is_paged() ) {
			global $post;
			$home = get_bloginfo('url');
			echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

			if ( is_single() ) {
			  $cat = get_the_category(); $cat = $cat[0];
			  echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			  echo $currentBefore;
			  the_title();
			  echo $currentAfter;
			}
			elseif ( is_page() && !$post->post_parent ) {
			  echo $currentBefore;
			  the_title();
			  echo $currentAfter;
			}
			elseif ( is_page() && $post->post_parent ) {
			  $parent_id  = $post->post_parent;
			  $breadcrumbs = array();
			  while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id  = $page->post_parent;
			  }
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $currentBefore;
			the_title();
			echo $currentAfter;
			}
		}
	}

	// ----------------------------------------------------------------
	// Add a GitHub dashboard widgets to keep people updated on changes.
	// ----------------------------------------------------------------
	function add_dashboard_widgets() {
		wp_add_dashboard_widget(
			'rss_dashboard_widget',         // Widget slug.
			'Latest Template Updates',         // Title.
			'rss_dashboard_widget_function' // Display function.
        );
	}
	add_action( 'wp_dashboard_setup', 'add_dashboard_widgets' );

	function rss_dashboard_widget_function() {
		include 'features/gitHubFeed.php';
	}
?>
