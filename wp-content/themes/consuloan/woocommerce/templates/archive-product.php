<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$product_columns = themesflat_get_opt('product_columns');

get_header( 'shop' ); ?>

<div class="col-md-12">
	<div id="primary" class="content-area ">
		<main id="main" class="post-wrap" role="main">	
			<div id="container">
				<div id="content-product" role="main" class="content-product <?php echo esc_attr($product_columns) ?>">
    
					<?php if ( have_posts() ) : ?>				

						
						<div class="themesflat-wrap-product">

							<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									/**
									 * woocommerce_shop_loop hook.
									 *
									 * @hooked WC_Structured_Data::generate_product_data() - 10
									 */
									do_action( 'woocommerce_shop_loop' );
								?>

								<?php wc_get_template_part( 'templates/content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

							<?php woocommerce_product_loop_end(); ?>

						</div>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>
						
						<?php
							/**
							 * woocommerce_no_products_found hook.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						?>

					<?php endif; ?>		
				</div>
			</div>	
		</main><!-- #main -->
	
		
	</div><!-- #primary -->	
	<div id="secondary" class="widget-area" role="complementary">
		<div class="sidebar">
			<?php 
				if ( themesflat_get_opt( 'product_layout') != 'fullwidth' ) :
					themesflat_dynamic_sidebar('woo-sidebar');
				endif;
			?>
		</div>
	</div>
</div><!-- /.col-md-12 -->

<?php get_footer( 'shop' ); ?>
