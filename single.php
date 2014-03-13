<?php get_header(); ?>
<?php get_sidebar(); ?>

<?php // You'll need to wrap these things in your ids and classes so that everything gets styled properly. ?>
	<?php if (! is_front_page()){
        the_title();
    }?>
    
    <?php the_content(); ?>
        
    <?php comments_template(); ?>
		
<?php get_footer(); ?>