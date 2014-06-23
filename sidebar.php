<div class="Rightsidebar">
    	<?php get_search_form(); ?>
        <?php if (get_option('active_side_nav') == 'no') {	
	        dynamic_sidebar('central_sidebar_widgets');
		}else{?> 
        <ul class="pagenav">
    	<?php 
	        $args = array('title_li'     => __(''));
            wp_list_pages($args); 
		?>
		</ul> 	           
		<?php dynamic_sidebar('central_sidebar_widgets');?>
    </div>
 <?php }?>
