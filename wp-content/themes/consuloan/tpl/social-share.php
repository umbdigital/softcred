<?php
$value = themesflat_get_json('social_links');
$sharelink = themesflat_available_social_icons();
?>
<div class="social-share-article"><strong><?php echo esc_html__( 'Share:', 'consuloan' ); ?></strong>
        
<ul class="themesflat-socials">
	 <?php
	foreach ( $value as $key => $val ) {
		if ( $key != '__ordering__') {
			$link = $sharelink[$key]['share_link'].get_the_permalink();
		    printf(
		        '<li class="%s">
		            <a href="%s" target="_blank" rel="alternate" title="%s">
		                <i class="fa fa-%s"></i>
		            </a>
		        </li>',
		        esc_attr( $key ),
		        esc_url( $link ),
		        esc_attr( $link ),
		        esc_attr( $key )
		    );
		}
	}
	    ?>
</ul>
</div>