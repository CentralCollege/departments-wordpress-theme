	<div class="clearboth"></div>
    	<div id="footer-widgets">
        	<?php dynamic_sidebar('central_footer_widgets') ?>
            <div class="clearboth"></div>
        </div>
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
			
        <p id="copyright">
			&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> at
			<a title="Central College" href="http://www.central.edu">Central College</a>
		</p>
        
        </div>
    </div>
</div>
    <?php wp_footer(); ?>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
        $(document).ready(function(){
            //Open the menu
            $('#hamburger').click(function() {
                //set the width of primary content container -> content should not scale while animating
			var contentWidth = $('#content').width();
	
			//set the content with the width that it has originally
			$('#content').css('width', contentWidth);
	
			//display a layer to disable clicking and scrolling on the content while menu is shown
			$('#contentLayer').css('display', 'block');
	
			//disable all scrolling on mobile devices while menu is shown
			$('#container').bind('touchmove', function(e){e.preventDefault()});
	
			//set margin for the whole container with a $ UI animation
			$("#container").animate({"marginLeft": ["70%", 'easeOutExpo']}, {
				duration: 700
			});
    });
            //Close the menu
            $('#contentLayer').click(function() {		
            });
        });
    </script>
</div>
	</body>
</html>