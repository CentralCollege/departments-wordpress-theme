<?php get_header(); ?>
<?php get_sidebar(); ?>

	<?php 
	//Loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<?php 
    //Loop ends here
    endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
	
<?php get_footer(); ?>