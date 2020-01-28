<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $product,$woocommerce_loop;
// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;
?>
<li>					
	<a href="<?php the_permalink(); ?>" class="image-product" data-thumb="true">
		<?php do_action( 'woocommerce_template_loop_product_thumbnail' );?>
	</a>
	<div class="themesflat-content">
		<a href="<?php the_permalink(); ?>" class="style-ellipsis"><?php the_title(); ?></a>
		<?php
			do_action( 'woocommerce_template_loop_price' );
		?>
	</div>
</li>