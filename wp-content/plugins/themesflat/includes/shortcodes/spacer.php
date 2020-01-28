<?php
/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */

/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_spacer_shortcode_params' );

/**
 * Register parameters for iconbox shortcode
 * 
 * @return  void
 */
function themesflat_spacer_shortcode_params() {
	vc_map( array(
		'base'        => 'themesflat_spacer',
		'name'        => esc_html__( 'Themesflat: Spacer', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => array(

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Desktop', 'consuloan' ),
				'param_name'       => 'desktop',
				'value'            => 80
			),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Mobile', 'consuloan' ),
				'param_name'       => 'mobile',
				'value'            => 40
			),			

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'SMobile', 'consuloan' ),
				'param_name'       => 'smobile',
				'value'            => 30
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class', 'consuloan' ),
				'param_name' => 'class'
			),

			array(
				'type' => 'css_editor',
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'consuloan' )
			)
		)
	) );
}

add_shortcode( 'themesflat_spacer', 'themesflat_shortcode_spacer' );

/**
 * Iconbox shortcode handle
 * 
 * @param   array  $atts  Shortcode attributes
 * @return  void
 */
function themesflat_shortcode_spacer( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_spacer', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_spacer_atts',$atts));

	$class = apply_filters( 'themesflat/shortcode/themesflat_spacer', array( 'themesflat-spacer', $atts['class'] ), $atts );
	
	return sprintf( '
		<div class="%1$s" data-desktop="%2$s" data-mobile="%3$s" data-smobile="%4$s">			
		</div>', esc_attr( implode( ' ', $class ) ), $atts['desktop'], $atts['mobile'], $atts['smobile'] );
}