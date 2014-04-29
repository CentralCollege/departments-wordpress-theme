<?php get_header(); ?>
<div class="clearboth"></div>
<?php get_sidebar(); ?>

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
    
    <?php get_sidebar(); ?>

	<?php 
    //Loop ends here
    endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    </div>
	
<?php get_footer(); ?>