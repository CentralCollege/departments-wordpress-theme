<?php get_header(); ?>

	<div class="posts">
	<?php
	//Loop starts here
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="post-content">
    <h2><?php the_title(); ?></h2>
    
    <?php the_time( get_option( 'date_format' ) ) ?>
    
    <?php the_content(); ?>
    
    <hr size="1"/>
	
	<?php comment_form(); ?> 
    
    <div class="comment list">
    	<?php wp_list_comments( array( 'style' => 'div' ) ); ?>
    </div>
    
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