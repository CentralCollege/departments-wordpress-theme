	<div class="clearboth"></div>
    	<div class="footer">
            <?php if (strlen(get_option('central_facebook_url')) > 0) {?>
            	<a href="<?php echo get_option('central_facebook_url');?>" class="icon-facebook"> </a>
            <?php } else {
                echo '<a href="http://facebook.com/centralcollege" class="icon-facebook"> </a>';
            } ?>
            <?php if (strlen(get_option('central_twitter_url')) > 0) {?>
            	<a href="<?php echo get_option('central_twitter_url');?>" class="icon-twitter"> </a>
            <?php } else {
                echo '<a href="http://twitter.com/centralcollege" class="icon-twitter"> </a>';
            } ?>
             <?php if (strlen(get_option('central_youtube_url')) > 0) {?>
            	<a href="<?php echo get_option('central_youtube_url');?>" class="icon-youtube"> </a>
            <?php } else {
                echo '<a href="http://youtube.com/centralcollegeadm" class="icon-youtube"> </a>';
            } ?>
			
        </div>
        
        <p id="copyright">
			&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> at
				<a title="Central College" href="http://www.central.edu">Central College</a>
		</p>
    </div>
</div>
    <?php wp_footer(); ?>
	</body>
</html>