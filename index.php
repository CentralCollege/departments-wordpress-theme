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
<div class="clearboth"></div>
<div class="posts">
<?php
	//Loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="post-entry">
    <h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink() ?>" class="read-more">Read more</a>
    <div class="clearboth"></div>
	</div>
  <?php
  //Loop ends here
	endwhile; ?>
	<div class="pagination">
		<?php next_posts_link('&laquo; Older posts '); ?>
		<?php previous_posts_link( 'Newer posts &raquo;' ); ?>
	</div>
	<?php else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
