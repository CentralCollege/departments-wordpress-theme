<?php
/*
Template Name: Full Width
*/ 
 get_header(); ?>

	<div class="postsCustom">
	<?php
	//Loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post-content">
  	
    <h2><?php the_title() ?></h2>
    
    <?php the_content(); ?>
    <div class="clearboth"></div>
    </div>

	<?php 
    //Loop ends here
    endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
    </div>
        
<?php get_footer(); ?>