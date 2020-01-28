<?php
/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */

/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_infomation_shortcode_params' );

/**
 * Register parameters for iconbox shortcode
 * 
 * @return  void
 */
function themesflat_infomation_shortcode_params() {
	vc_map( array(
		'base'        => 'infomation',
		'name'        => esc_html__( 'Themesflat: Infomation', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Phone', 'consuloan' ),
				'param_name'  => 'phone',
				'description' => esc_html__( 'Enter Phone Number', 'consuloan' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Address', 'consuloan' ),
				'param_name'  => 'address',
				'description' => esc_html__( 'Enter Your Address', 'consuloan' )
			),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Email', 'consuloan' ),
				'param_name'  => 'email',
				'description' => esc_html__( 'Enter Your Email', 'consuloan' )
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Facebook URL', 'consuloan' ),
				'param_name' => 'facebook'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Twitter URL', 'consuloan' ),
				'param_name' => 'twitter'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'LinkedIn URL', 'consuloan' ),
				'param_name' => 'linkedin'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Google+ URL', 'consuloan' ),
				'param_name' => 'google'
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

add_shortcode( 'infomation', 'themesflat_shortcode_infomation' );

/**
 * Iconbox shortcode handle
 * 
 * @param   array  $atts  Shortcode attributes
 * @return  void
 */
function themesflat_shortcode_infomation( $atts, $content = null ) {
	$atts = shortcode_atts( apply_filters( 'themesflat/shortcode/iconbox_atts', array(
		'class' => '',
		
		// Info
		'phone'  => '61 3 8376 6284',
		'email'  => 'Alitstudios@gmail.com',
		'address'  => '21 King Street, Melbourne 
					Victoria 3000 Australia',
		
		// Sicoal
		'facebook' => '',
		'twitter'  => '',
		'linkedin' => '',
		'google'   => '',
		
		'css'   => ''
	) ), $atts );

	$class = apply_filters( 'themesflat/shortcode/infomation_class', array( 'infomation shortcode', $atts['class'] ), $atts );

	$social_links = '';

	if ( ! empty( $atts['facebook'] ) )
		$social_links.= sprintf( ' <a href="%s" data-title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>', esc_url( $atts['facebook'] ) );

	if ( ! empty( $atts['twitter'] ) )
		$social_links.= sprintf( ' <a href="%s" data-title="Twitter" class="twitter"><i class="fa fa-twitter"></i></a>', esc_url( $atts['twitter'] ) );

	if ( ! empty( $atts['linkedin'] ) )
		$social_links.= sprintf( ' <a href="%s" data-title="LinkedIn" class="linkedin"><i class="fa fa-linkedin"></i></a>', esc_url( $atts['linkedin'] ) );

	if ( ! empty( $atts['google'] ) )
		$social_links.= sprintf( ' <a href="%s" data-title="Google Plus" class="google-plus"><i class="fa fa-google-plus"></i></a>', esc_url( $atts['google'] ) );

	if ( ! empty( $social_links ) )
		$social_links = sprintf( '<div class="social-links">%s</div>', $social_links );

	return sprintf( '<div class="%1$s">
		<ul>
			<li><span>%2$s</span></li>
			<li><span>%3$s</span></li>
			<li><span>%4$s</span></li>			
		</ul>
		%5$s
	</div>',esc_attr( implode( ' ', $class ) ), esc_html( $atts['phone'] ), wp_kses_post( $atts['address']), esc_html( $atts['email']), $social_links ); 
}