<div class="Rightsidebar">
        <?php if (get_option('active_side_nav') == 'no') {	
	        dynamic_sidebar('central_sidebar_widgets');
		}else{?> 
	           
		<?php dynamic_sidebar('central_sidebar_widgets');?>
 <?php }?>
</div>