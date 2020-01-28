<?php

global $the_query;
if ( $GLOBALS['wp_query']->max_num_pages < 2 ) return;

$paged       = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
$count_posts = wp_count_posts();
$published_posts = $count_posts->publish; 
?>
<?php if ( themesflat_get_opt('show_count_posts') == 1 ): ?>
<div class="wrap-counter-post">
	<div class="counter-post">Page <span><?php echo wp_kses_post( $paged ) ?></span> of <span><?php echo wp_kses_post( $published_posts ) ?></span> results</div>
</div>
<?php endif ?>