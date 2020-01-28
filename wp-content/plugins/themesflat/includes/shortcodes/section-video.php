<?php
/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */

/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_section_video_shortcode_params' );

/**
 * Register parameters for sectionvideo shortcode
 * 
 * @return  void
 */
function themesflat_section_video_shortcode_params() {
	vc_map( array(
		'base'        => 'themesflat_section_video',
		'name'        => esc_html__( 'Themesflat: Section Video', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => array(

			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Image', 'consuloan' ),
				'param_name' => 'image'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Image Size', 'consuloan' ),
				'description'    => esc_html__( '( Enter your image size Ex: full,... Default: 370x225 ). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'consuloan' ),
				'param_name' => 'image_size',
				'std'		 => '500x340'
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Video Link', 'consuloan' ),
				'param_name' => 'link',
				'description' => esc_html__( 'Enter custom url for video', 'consuloan' ),				
				'std'		 => 'https://www.youtube.com/embed/LHO9BdVDJVM?autoplay=1'
				),

			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Icon Play', 'consuloan' ),
				'param_name'  => 'icon_play',
				'std'		 => '<i class="fa fa-play" aria-hidden="true"></i>'
			),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Size play', 'consuloan' ),
				'description' => esc_html__( 'Icon play size in px. Ex:90px,... Default: 70px', 'consuloan' ),
				'param_name' => 'size_play',
				'std'		 => '60px'
				),

			array(
				'type' => 'colorpicker',
				'heading'    => esc_html__( 'Icon Color', 'consuloan' ),
				'param_name' => 'icon-color',
				'std'	=> '#1e1e27'
				),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Font size icon play', 'consuloan' ),
				'description' => esc_html__( 'Font size icon play in px. Ex:30px,... Default: 22px', 'consuloan' ),
				'param_name' => 'font_size_play',
				'std'		 => '20px'
				),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class', 'consuloan' ),
				'description'    => esc_html__( '( Enter your class Ex: left,center,right,color-white ).', 'consuloan' ),
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

function themesflat_section_video_css($atts) {
	$style[] = $atts['css'];
	if (!empty($atts['css'])) {
		if (function_exists('vc_shortcode_custom_css_class')) {
			$vcclass = vc_shortcode_custom_css_class( $atts['css'], '' );
		}
	}
	$style['icon-size'] = sprintf('
			width: %1$spx;
			height: %1$spx;
			line-height: %1$spx;
			margin-top: calc(-%1$spx/2);
			margin-left: calc(-%1$spx/2);
		',str_replace('px','',$atts['size_play']));
	$style['font_size_play'] = sprintf('
			font-size: %1$spx;
		',str_replace('px','',$atts['font_size_play']));
	$style['icon-color'] = sprintf('
			color: %1$s;
		',$atts['icon-color']);	
	return $style;
}

add_shortcode( 'themesflat_section_video', 'themesflat_section_video_shortcode_render' );
add_filter( 'themesflat/shortcode/section_video_class', 'themesflat_section_video_shortcode_class' );

function themesflat_section_video_shortcode_class(  $atts) {
	if (function_exists('vc_shortcode_custom_css_class')) {
		$vcclass = vc_shortcode_custom_css_class( $atts['css'], ' ' );
	}
	$classes[] = 'wrap-video';
	$classes[] = $atts['class'];
	$classes[] = $vcclass;
	return $classes;
}

function themesflat_section_video_shortcode_render( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_section_video', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_section_video_atts',$atts));
	$style = themesflat_section_video_css($atts);
	$class = apply_filters( 'themesflat/shortcode/section_video_class', $atts );

	
	if ( ! empty( $image ) ) {
		if ( is_numeric( $image ) && $images = wp_get_attachment_image_src( $image, 'full' ) )
			if ( is_numeric( $atts['image'] ) && $atts['image'] != '') {
		  	$image = wpb_getImageBySize( array( 'attach_id' => $atts['image'], 'thumb_size' => $atts['image_size'] ) );
		  	$image = $image['thumbnail'];
		}elseif ( filter_var( $atts['image'], FILTER_VALIDATE_URL ) ) {
		  	$image = sprintf( '<img src="%s" />', esc_url( $atts['image'] ) );
		}
			
	} 

	wp_enqueue_script( 'themesflat-jquery-fancybox' );

	return sprintf( '
		<div class="section-video">
			<a class="themesflat-video-fancybox" data-type="iframe" href="%3$s"> 
                %4$s
                <span class="icon-play" style="%5$s %6$s %7$s">%2$s</span>
            </a>
		</div>', esc_attr( implode( ' ', $class ) ), wp_kses_post( $icon_play ),esc_url( $link ), $image, esc_attr($style['icon-size']), esc_attr($style['font_size_play']), esc_attr($style['icon-color']) );
	
}