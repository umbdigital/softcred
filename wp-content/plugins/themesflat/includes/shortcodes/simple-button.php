<?php
/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */

/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_simple_button_shortcode_params' );

/**
 * Register parameters for iconbox shortcode
 * 
 * @return  void
 */
function themesflat_simple_button_shortcode_params() {
	$icons_params2 = themesflat_map_icons('readmore','Icon for Button');
	$button  = array(
		array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'link', 'consuloan' ),
				'param_name'  => 'button_link',
				'value'	=> ''
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Text', 'consuloan' ),
				'param_name' => 'button_text',
				'value'	=> ''
			),

			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Button Style', 'consuloan' ),
				'param_name' => 'button_style',
				'value'      => array(
					esc_html__('Have Background','consuloan') => 'have_background',
					esc_html__('No Background','consuloan') => 'no-background'
					)
				),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Padding Top', 'consuloan' ),
				'description'    => esc_html__( '(Enter Padding Top Ex: 5px  )', 'consuloan' ),
				'param_name' => 'padding_top',
				'std' => '10px',
				'dependency' => array(
							'element' => 'button_style',
							'value' => 'have_background')
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Padding Right', 'consuloan' ),
				'description'    => esc_html__( '(Enter Padding Right Ex: 20px  )', 'consuloan' ),
				'param_name' => 'padding_right',
				'std' => '32px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Padding Bottom', 'consuloan' ),
				'description'    => esc_html__( '(Enter Padding Bottom Ex: 5px  )', 'consuloan' ),
				'param_name' => 'padding_bottom',
				'std' => '12px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Padding Left', 'consuloan' ),
				'description'    => esc_html__( '(Enter Padding Left Ex: 20px  )', 'consuloan' ),
				'param_name' => 'padding_left',
				'std' => '33px'
			),

			array(
				'type' => 'colorpicker',
				'heading'    => esc_html__( 'Text Color', 'consuloan' ),
				'param_name' => 'text_color',
				'std' => '#28293a'
				),

			array(
				'type' => 'colorpicker',
				'heading'    => esc_html__( 'Text Color Hover', 'consuloan' ),
				'param_name' => 'text_color_hover',
				'std' => '#ffffff'
				),

			array(
				'type' => 'colorpicker',
				'heading'    => esc_html__( 'Background Color', 'consuloan' ),
				'param_name' => 'background_color',
				'std' => '#f2c21a'
				),

			array(
				'type' => 'colorpicker',
				'heading'    => esc_html__( 'Hover Background Color', 'consuloan' ),
				'param_name' => 'hover_color',
				'std' => '#0f3661'
				)
		);	
	$_params = array(		

			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Button Align', 'consuloan' ),
				'param_name' => 'btn_align',
				'value' => array(
					esc_html__( 'Left', 'consuloan' ) => 'text-left',
					esc_html__( 'Center', 'consuloan' ) => 'text-center',
					esc_html__( 'Right', 'consuloan' ) => 'text-right'
					)
				),
		
			array(
				'type' => 'css_editor',
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'consuloan' )
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class', 'consuloan' ),
				'param_name' => 'class'
			));
	$params = array_merge($button,$icons_params2,$_params);
	vc_map( array(
		'base'        => 'themesflat_simple_button',
		'name'        => esc_html__( 'Themesflat: Simple Button', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => $params
	) );
}

add_shortcode( 'themesflat_simple_button', 'themesflat_simple_button_shortcode_render' );

add_filter( 'themesflat/shortcode/simple_button_atts', 'themesflat_simple_button_shortcode_atts' );
add_filter( 'themesflat/shortcode/simple_button_style', 'themesflat_simple_button_shortcode_style' );

function themesflat_simple_button_shortcode_atts( $atts ) {
	$icons_params2 = themesflat_available_icons('readmore');
	$atts = array_merge($atts,$icons_params2);
	return $atts;
}

function themesflat_simple_button_shortcode_style($atts) {
	$style[] = $atts['button_style'];
	if ($atts['button_style'] == 'have_background') {
		if (function_exists('vc_shortcode_custom_css_class')) {
			$vcclass = vc_shortcode_custom_css_class( $atts['css'], ' ' );
		}
		$style[] = $vcclass;
	}
	return $style;
}

// Title section render
function themesflat_simple_button_shortcode_render( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_simple_button', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_simple_button_atts',$atts));
	$icon_name = themesflat_shortcode_icon_name('readmore_',$readmore_type);
	$icon_value = !empty($icon_name) ? $atts[$icon_name] : '';
	$class = apply_filters( 'themesflat/shortcode/simple_button_class', array( 'simple_button', $atts['class'],$atts['btn_align']  ), $atts );
	 $button_style = apply_filters('themesflat/shortcode/simple_button_style',$atts);

	return sprintf('<div class="themesflat_button_container %1$s">
		
		<a class="themesflat-button %2$s" href="%3$s" style="padding-top:%6$spx;padding-right:%7$spx;padding-bottom:%8$spx;padding-left:%9$spx;background:%10$s;" data-text_color="%12$s" data-hover_text_color="%13$s" data-hover_bg_color="%11$s">%4$s <i class="%5$s"></i></a>
	</div>', esc_attr( implode( ' ', $class ) ), esc_attr(implode(' ', $button_style)),esc_url($button_link),esc_html($button_text),esc_attr($icon_value), str_replace('px','',$padding_top), str_replace('px','',$padding_right), str_replace('px','',$padding_bottom), str_replace('px','',$padding_left), $background_color, $hover_color, $text_color, $text_color_hover);
	
}