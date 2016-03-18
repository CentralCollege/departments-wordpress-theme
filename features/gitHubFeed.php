<?php // Get RSS Feed(s)

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'https://github.com/CentralCollege/departments-wordpress-theme/commits/master.atom' );

if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

    // Figure out how many total items there are, but limit it to 5.
    $maxitems = $rss->get_item_quantity( 5 );

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );

endif;
?>

<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
          <?php if(stripos($item->get_title(), 'Merge pull request') !== false){
            $display = false;
          }else {
            $display = true;
          }
          if($display==true){?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
          <?php } ?>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
<hr size="1">
<p>Having problems? <a href="https://github.com/CentralCollege/departments-wordpress-theme/issues" target="_blank">Check the list of open issues</a>.</p>
