<?php get_header(); ?>
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

	<div class="posts">
	<?php
	//Loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post-content">
    <h2><?php the_title(); ?></h2>

    <?php the_time( get_option( 'date_format' ) ) ?>

    <?php the_content(); ?>

    <hr size="1"/>

	<?php comments_template(); ?>

    <div class="clearboth"></div>

    </div>

	<?php
    //Loop ends here
    endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>

<?php get_footer(); ?>
