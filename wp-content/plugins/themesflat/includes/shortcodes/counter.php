<?php
/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */
add_filter( 'themesflat/shortcode/themesflat_counter_class', 'themesflat_counter_shortcodes_class', 10, 3 );

/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_counter_shortcode_params' );

/**
 * Register parameters for counter shortcode
 * 
 * @return  void
 */
$icons_type = array();

function themesflat_counter_shortcodes_class($atts) {
	$class[] = 'themesflat_counter';
	$class[] =  $atts['counter_style'];
	$class[] = $atts['class'];
	if (function_exists('vc_shortcode_custom_css_class')) {
		$vcclass = vc_shortcode_custom_css_class( $atts['css'], ' ' );
	}
	$class[] =$vcclass;
	return $class;
}

function themesflat_counter_shortcode_params() {
	$icons_params = themesflat_map_icons('icon','Icon for box');
	$icons_params2 = themesflat_map_icons('counter','Icon for readmore');
	$params = array_merge(
		$icons_params,$icons_params2, array(

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Title', 'consuloan' ),
				'param_name'       => 'title'
				),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Value', 'consuloan' ),
				'param_name'       => 'value',
				'value'            => 0
				),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Add Zero', 'consuloan' ),
				'param_name' => 'add_zero',
				'description' => esc_html__( 'Add Zero To Number < 10', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, please', 'consuloan' ) => 1 )
			),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Prefix', 'consuloan' ),
				'param_name'       => 'prefix'
				),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Suffix', 'consuloan' ),
				'param_name'       => 'surfix'
				),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Duration', 'consuloan' ),
				'param_name'       => 'duration',
				'value'            => 2000
				),

			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Content', 'consuloan' ),
				'param_name' => 'content'
				),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Read More Link', 'consuloan' ),
				'param_name' => 'readmore_link',
				'description' => esc_html__( 'Enter custom url for read more button', 'consuloan' )
				),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Read More Text', 'consuloan' ),
				'param_name' => 'readmore_text',
				'description' => esc_html__( 'Enter custom text for read more button', 'consuloan' ),
				'value' =>  '',
				),	

			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Counter Style', 'consuloan' ),
				'param_name' => 'counter_style',
				'value'      => array(
					'Style 3' => 'style3',
					'Style 1' => 'style1',
					'Style 2' => 'style2',					
					)
				),	
			
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class', 'consuloan' ),
				'param_name' => 'class',
				'description' => esc_html__( 'Enter class: left right font-size-60', 'consuloan' ),
				),

			array(
				'type' => 'css_editor',
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'consuloan' )
				)
			)
		);

	vc_map( array(
		'base'        => 'themesflat_counter',
		'name'        => esc_html__( 'Themesflat: Counter', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => $params
		) );
}

add_shortcode( 'themesflat_counter', 'themesflat_shortcode_counter' );
/**
 * Counter shortcode handle
 * 
 * @param   array  $atts  Shortcode attributes
 * @return  void
 */
function themesflat_shortcode_counter( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_counter', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_counter_atts',$atts));
	$icon_name = themesflat_shortcode_icon_name('counter_',$counter_type);
	$icon_name2 = themesflat_shortcode_icon_name('icon_',$icon_type);
	$icon_value = !empty($icon_name) ? $atts[$icon_name] : '';
	$icon_value2 = !empty($icon_name2) ? $atts[$icon_name2] : '';

	$class = apply_filters( 'themesflat/shortcode/themesflat_counter_class', $atts );
	$_content = '';
	if ($content != null) {
		$_content = '<div class="counter-content">'.$content.'</div>';
	}
	$title_html='';
	if (!empty($title)) {
		$title_html = '<p class="title">'.$title.'</p>';
	}
	$link = '';
	if (!empty($readmore_link) && !empty($readmore_text)) {
		$link = '<a href="'.esc_url($readmore_link).'" class="counter-link">'.esc_attr($readmore_text).'<i class="'.esc_attr($icon_value).'"></i></a>';
	}
	if ( $icon_name2 != '' ) {
		$icon = sprintf( '<span class="%s"></span>', $icon_value2);
	}
	else {
		$icon = false;
	}

	$icon_html = $icon ? sprintf( '<div class="counter-icon"><div class="icon">%s</div></div>', $icon ) : '';

	$allow = array(
		'div' => array(
			'class' => array(),
			)
		);

	$themesflat_client = sprintf( '
		<div class="%6$s">
		%5$s
		<div class="counter-content-left">
			<span class="counter-prefix">%3$s</span>
			<span class="numb-count" data-add_zero = "%7$d" data-from="0" data-to="%1$d" data-speed="%2$s" data-waypoint-active="yes">%1$d</span>
			<span class="counter-surfix">%4$s</span>
		</div>
		', esc_html($value), esc_html($duration), esc_html($prefix), esc_html($surfix),wp_kses_post($icon_html),esc_attr(implode(" ",$class)), $add_zero );

	$themesflat_client .= sprintf( '
		<div class="counter-content-right">
			%1$s
			%3$s
			%2$s
		</div>', wp_kses_post($title_html),wp_kses_post($link),wpb_js_remove_wpautop($_content,true));

	$themesflat_client .= '</div>';

	// Enqueue shortcode assets		
	wp_enqueue_script( 'themesflat-counter' );	

	return $themesflat_client ;
}