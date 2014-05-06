<?php get_header(); ?>

	<div class="posts">
	<?php
	//Loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post-content">
    <h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a></h2>
    
    <?php the_time( get_option( 'date_format' ) ) ?>
    
    <?php the_content(); ?>
    
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