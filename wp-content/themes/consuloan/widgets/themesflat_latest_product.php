<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Top Rated Products Widget.
 *
 * Gets and displays top rated products in an unordered list.
 *
 * @author   WooThemes
 * @category Widgets
 * @package  WooCommerce/Widgets
 * @version  2.3.0
 * @extends  WC_Widget
 */
class Themesflat_WC_Widget_Latest_Products extends WC_Widget {
	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_latest_products';
		$this->widget_description = esc_html__( 'Display a list of your latest products on your site.', 'consuloan' );
		$this->widget_id          = 'themesflat_latest_products';
		$this->widget_name        = esc_html__( 'Themesflat Latest Products', 'consuloan' );
		$this->settings           = array(
			'title'  => array(
				'type'  => 'text',
				'std'   => esc_html__( 'Themesflat Products', 'consuloan' ),
				'label' => esc_html__( 'Title', 'consuloan' )
			),
			'number' => array(
				'type'  => 'number',
				'step'  => 1,
				'min'   => 1,
				'max'   => '',
				'std'   => 3,
				'label' => esc_html__( 'Number of products to show', 'consuloan' )
			)
		);
		parent::__construct();
	}
	/**
	 * Output widget.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		if ( $this->get_cached_widget( $args ) ) {
			return;
		}
		ob_start();
		$number = ! empty( $instance['number'] ) ? absint( $instance['number'] ) : $this->settings['number']['std'];
		$query_args = array( 'posts_per_page' => $number, 'no_found_rows' => 1, 'post_status' => 'publish', 'post_type' => 'product', 'orderby' => 'date', 'order' => 'DESC');
		$query_args['meta_query'] = WC()->query->get_meta_query();
		$r = new WP_Query( $query_args );
		if ( $r->have_posts() ) {
			$this->widget_start( $args, $instance );
			echo '<ul class="latest-products">';
				while ( $r->have_posts() ) { 
					$r->the_post();
					wc_get_template( 'content-widget-product.php');
				}
			echo '</ul>';
			$this->widget_end( $args );
		}
		wp_reset_postdata();
		$content = ob_get_clean();
		echo $content;
		$this->cache_widget( $args, $content );
	}
}
function register_themesflat_latest_products() {
    register_widget('Themesflat_WC_Widget_Latest_Products');
}
add_action('widgets_init', 'register_themesflat_latest_products');
