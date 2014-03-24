<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div class="posts">
	<?php
	//Loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post-entry">
    <?php the_title( '<h2>', '</h2>' ); ?>
    
    <?php the_excerpt(); ?>
    
    <a href="<?php the_permalink() ?>" >Read more</a>
    <div class="clearboth"></div>
    </div>

	<?php 
    //Loop ends here
    endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    </div>
	
<?php get_footer(); ?>