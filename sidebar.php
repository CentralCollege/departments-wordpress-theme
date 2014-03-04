<h2>Sidebar</h2>
<?php 
	$args = array(
		'title_li'     => __('Pages')
	);
	wp_list_pages($args); ?> 

<?php dynamic_sidebar('central_sidebar_widgets') ?>