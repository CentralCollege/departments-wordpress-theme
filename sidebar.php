<ul class="pagenav">
<?php 
	$args = array(
		'title_li'     => __('')
	);
		wp_list_pages($args); ?></ul> 	
		
   

<?php dynamic_sidebar('central_sidebar_widgets') ?>