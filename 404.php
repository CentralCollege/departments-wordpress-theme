<title>Central College - Page not found</title>

<?php get_header(); ?>

<div class="posts">
    <div class="post-content">
        <h2>Error 404</h2>
        <h4>The requested page was not found</h4>
        <p>We're sorry, that page can't be found. We may have moved that page to a new location or removed it from our site.</p>
		<strong>Perhaps you'd like to try the following:</strong>
        <p>
            <ul>
                <li><a href="/human-resources/directory/">Find someone in the directory to contact</a></li>
                <li><a href="http://search.central.edu">Search our site</a></li>
                <li>Start over at the <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?> homepage</a></li>
            </ul>
        </p>
        <p>&nbsp;</p>
    	<div class="clearboth"></div>
    </div>
</div>

	<?php get_sidebar(); ?>
<?php get_footer(); ?>
