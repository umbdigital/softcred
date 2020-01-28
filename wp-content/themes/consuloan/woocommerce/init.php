<?php
/**
 * Initialize woocommerce.
 *
 * @since   1.0.0
 * @package consuloan
 */
if ( ! class_exists( 'WooCommerce' ) ) return;
// Add this theme support woocommerce
add_theme_support( 'woocommerce' );
/**
 * Locate a template and return the path for inclusion.
 *
 * @since 1.0.0
 */

function themesflat_wc_locate_template( $template, $template_name, $template_path ) {
	global $woocommerce;
	$_template = $template;
	if ( ! $template_path ) $template_path = $woocommerce->template_url;
	$theme_path = THEMESFLAT_DIR . 'woocommerce/templates/';

	// Look within passed path within the theme - this is priority
	$template = locate_template( array(trailingslashit( $template_path ) . $template_name,$template_name) );

	// Modification: Get the template from this folder, if it exists
	if ( ! $template && file_exists( $theme_path . $template_name ) )
	$template = $theme_path . $template_name;

	// Use default template
	if ( ! $template )
	$template = $_template;

	// Return what we found
	return $template;
}

/*get path*/
function themesflat_wc_template_parts( $template, $slug, $name ) {
 $theme_path  = THEMESFLAT_DIR . '/woocommerce/';
 if ( $name ) {
  $newpath = $theme_path . "{$slug}-{$name}.php";
 } else {
  $newpath = $theme_path . "{$slug}.php";
 }
 return file_exists( $newpath ) ? $newpath : $template;
}

add_filter( 'woocommerce_locate_template', 'themesflat_wc_locate_template', 10, 3 );
add_filter( 'wc_get_template_part', 'themesflat_wc_template_parts', 10, 3 );

/* Custom Products Per Page */
if ( ! function_exists( 'themesflat_woocommerce_products_per_page' ) ) {
	add_filter( 'loop_shop_per_page', 'themesflat_woocommerce_products_per_page', 20 );

	/**
	 * Return the number of how many products that will be
	 * displayed on archive page
	 * 
	 * @return  int
	 */
	function themesflat_woocommerce_products_per_page($count) {
		
		$count = intval(themesflat_choose_opt('woo_products_per_page'));
		return $count;
	}
}


/**
 * Product Loop Items
 *
 * @see woocommerce_template_loop_add_to_cart()
 * @see woocommerce_template_loop_product_thumbnail()
 * @see woocommerce_template_loop_price()
 * @see woocommerce_template_loop_rating()
 */
add_action( 'woocommerce_template_loop_add_to_cart', 'woocommerce_template_loop_add_to_cart', 10 );
add_action( 'woocommerce_template_loop_product_thumbnail', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_template_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_template_loop_rating', 'woocommerce_template_loop_rating', 5 );

/* Remove hook WooCommerce */
add_action('init','themesflat_remove_hook_woo',20);
function themesflat_remove_hook_woo() {
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
}

/* Custom Products Related */
function woocommerce_output_related_products() { 
	$products_relate_per_page = intval(themesflat_get_opt('woo_products_related_per_page'));
    $args = array( 
        'posts_per_page' => $products_relate_per_page, 
 	);  
    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) ); 
} 


/**
 * After Single Products Summary Div
 *
 * @see woocommerce_output_product_data_tabs()
 * @see woocommerce_upsell_display()
 * @see woocommerce_output_related_products()
 */
add_action( 'woocommerce_output_product_data_tabs', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_upsell_display', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_output_related_products', 'woocommerce_output_related_products', 20 );



function themesflat_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
        $count = WC()->cart->cart_contents_count;?>
        <div class="wrap-cart-count">
        	<a class="icon-cart" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'consuloan' ); ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>        	
	        <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'consuloan' ); ?>">	        	
	        	<?php
	        	if ( $count > 0 ) {?>
	            	<span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
	        	<?php } ?>
	        </a>
	    </div>
        <?php
    }
 
}
add_action( 'themesflat_header_top_cart_count', 'themesflat_cart_count' );

function themesflat_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'consuloan' ); ?>"><?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'themesflat_header_add_to_cart_fragment' );


