<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	/**
	 * Extended class to integrate testimonial slider with
	 * visual composer
	 */
    class WPBakeryShortCode_themesflat_client_slider extends WPBakeryShortCodesContainer {
    }
}

/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */
add_filter( 'themesflat/shortcode/member_class', 'themesflat_custom_shortcodes_class', 10, 3 );
add_action( 'vc_before_init', 'themesflat_client_shortcode_params' );

function themesflat_client_shortcode_params() {
	/**
	 * Map the client slider shortcode
	 */
	vc_map( array(
		'name'                    => esc_html__( 'Themesflat: Client Slider', 'consuloan' ),
		'base'                    => 'themesflat_client_slider',
		'as_parent'               => array( 'only' => 'themesflat_client' ), 
		'icon'       			  => THEMESFLAT_ICON,
		'content_element'         => true,
		'show_settings_on_create' => false,
		'category'                => esc_html__( 'Consuloan', 'consuloan' ),
		'params'                  => array(			
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Margin', 'consuloan' ),
				'param_name' => 'margin',
				'value' => '30',
				'description' => esc_html__( 'Margin item for slide', 'consuloan' )
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Slides Per View', 'consuloan' ),
				'param_name' => 'slides_per_view',
				'value' => '5',
				'description' => esc_html__( 'The number of items you want to see on the screen.', 'consuloan' )
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Slider Autoplay', 'consuloan' ),
				'param_name' => 'autoplay',
				'description' => esc_html__( 'Disable Autoplay Mode.', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 'yes' )
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Hide Pagination Control', 'consuloan' ),
				'param_name' => 'hide_control',
				'description' => esc_html__( 'If YES pagination control will be removed.', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, please', 'consuloan' ) => 'yes' )
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Hide prev/next buttons', 'consuloan' ),
				'param_name' => 'hide_buttons',
				'description' => esc_html__( 'If "YES" prev/next control will be removed.', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 'yes' )
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'consuloan' ),
				'param_name' => 'class',
				'description' => esc_html__( 'Your Custom Class', 'consuloan' )
			),

			array(
				'type' => 'css_editor',
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'consuloan' )
			)
		),
		'js_view' => 'VcColumnView'
	) );

	/**
	 * Map the client item
	 */
	vc_map( array(
		'base'        => 'themesflat_client',
		'name'        => esc_html__( 'Themesflat: Client', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => array(	
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Image', 'consuloan' ),
				'param_name' => 'image'
			),

			array(
				'type' => 'colorpicker',
				'heading'    => esc_html__( 'Image Overlay Color', 'consuloan' ),
				'description' => esc_html__( 'Opacity =1 for Background Color', 'consuloan' ),
				'param_name' => 'image_overlay_color',
				'std' => 'rgba(0,0,0,0.01)'
			),

			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Image Transparent', 'consuloan' ),
				'param_name' => 'image_transparent'
			),
		
			array(
				'type' => 'css_editor',
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'consuloan' )
			)
		)
	) );
}

add_shortcode( 'themesflat_client', 'themesflat_shortcode_client' );
add_shortcode( 'themesflat_client_slider', 'themesflat_shortcode_client_slider' );

function themesflat_client_css($atts) {
	$style[] = $atts['css'];
	if (!empty($atts['css'])) {
		if (function_exists('vc_shortcode_custom_css_class')) {
			$vcclass = vc_shortcode_custom_css_class( $atts['css'], '' );
		}
	}		
	$style['background_image'] = sprintf('
			background: %1$s;
		', $atts['image_overlay_color']);	
	return $style;
}

/**
 * Testimonial shortcode handle
 * 
 * @param   string  $atts  Shortcode attributes
 * @return  void
 */
function themesflat_shortcode_client( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_client', $atts );	
	extract (apply_filters( 'themesflat/shortcode/themesflat_client_atts',$atts));
	$style  = themesflat_client_css($atts);
	if ( ! empty( $image ) ) {
		if ( is_numeric( $image ) && $images = wp_get_attachment_image_src( $image, 'full' ) )
			$image = array_shift( $images );
	}

	if ( ! empty( $image_transparent ) ) {
		if ( is_numeric( $image_transparent ) && $images = wp_get_attachment_image_src( $image_transparent, 'full' ) )
			$image_transparent = array_shift( $images );
	}

	$img_transparent = ( !empty( $image_transparent ) ) ? '<img src="'.$image_transparent.'" alt="images" />' : '';
	
	return sprintf( '
		<div class="themesflat_client-image">
			<div class="Overlay" style="%2$s"></div>
			<img src="%s" alt="images" />
			<div class="image-transparent">'.$img_transparent.'</div>
		</div>'
	,esc_attr( $image ), esc_attr($style['background_image']), esc_attr( $image_transparent ) );
}

/**
 * This function will be use to handle client slider
 * shortcode
 * 
 * @param   string  $atts     Shortcode attributes
 * @param   string  $content  Shortcode content
 * @return  string
 */
function themesflat_shortcode_client_slider( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_client_slider', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_client_slider_atts',$atts));
	$config = $atts;
	unset( $config['class'] );
	unset( $config['css'] );
	$class = apply_filters( 'themesflat/shortcode/themesflat_client_slider_class', array( 'themesflat_client_slider_inner', $class ), $atts );

	// Enqueue shortcode assets
	wp_enqueue_script( 'themesflat-carousel' );
	
	return sprintf( '
		<div class="themesflat_client_slider">
			<div class="%s" data-margin="%s" data-slides_per_view="%s" data-autoplay="%s" data-hide_control="%s" data-hide_buttons="%s">			
				%s				
			</div>
		</div>
	', implode( ' ', $class ), esc_attr( $margin) , esc_attr($slides_per_view ), esc_attr( $autoplay ), esc_attr( $hide_control ), esc_attr( $hide_buttons ),  do_shortcode( $content ) );
}