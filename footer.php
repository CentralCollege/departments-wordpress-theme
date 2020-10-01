	<div class="clearboth"></div>
    	<div id="footer-widgets">
        	<?php dynamic_sidebar('central_footer_widgets') ?>
            <div class="clearboth"></div>
        </div>
    	<div class="footer">
            <?php if (strlen(get_option('central_facebook_url')) > 0) {?>
            	<a href="<?php echo get_option('central_facebook_url');?>" class="icon-facebook"> </a>
            <?php } else {
                echo '<a href="https://facebook.com/centralcollege" class="icon-facebook"> </a>';
            } ?>
            <?php if (strlen(get_option('central_twitter_url')) > 0) {?>
            	<a href="<?php echo get_option('central_twitter_url');?>" class="icon-twitter"> </a>
            <?php } else {
                echo '<a href="https://twitter.com/centralcollege" class="icon-twitter"> </a>';
            } ?>
             <?php if (strlen(get_option('central_youtube_url')) > 0) {?>
            	<a href="<?php echo get_option('central_youtube_url');?>" class="icon-youtube"> </a>
            <?php } else {
                echo '<a href="https://youtube.com/centralcollegeadm" class="icon-youtube"> </a>';
            } ?>

        <p id="copyright">
			&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> at
			<a title="Central College" href="https://www.central.edu">Central College</a>
		</p>

        </div>
    </div>
</div>
<!-- begin CBE code -->
<script>
	(function(a,b,c,d,e,f,g) {
	a[e] = a[e] || function() {(a[e].q = a[e].q || []).push(arguments)};f=b.createElement(c);
	g=b.getElementsByTagName(c)[0];f.async=1;f.src=d+"/cbe/cbe.js";g.parentNode.insertBefore(f,g);
	})(window,document,"script","https://cbe.capturehighered.net","_cbe");

	_cbe("create","e1c184ce");
	_cbe("log","pageview");
</script>
<!-- end CBE code -->

    <?php wp_footer(); ?>
	</body>
</html>
