<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	/**
	 * Extended class to integrate testimonial slider with
	 * visual composer
	 */
	class WPBakeryShortCode_themesflat_iconlist extends WPBakeryShortCodesContainer {
	}
}

/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */
add_filter( 'themekit/shortcode/themesflat_iconlist_class', 'themesflat_iconlist_shortcode_class', 10, 3 );


/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_iconlist_shortcode_params' );

function themesflat_iconlist_shortcode_params() {
	/**
	 * Map the iconlist slider shortcode
	 */
	vc_map( array(
		'name'                    => esc_html__( 'Themesflat: Icon List', 'consuloan' ),
		'base'                    => 'themesflat_iconlist',
		'as_parent'               => array( 'only' => 'themesflat_iconlist_item' ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element'         => true,
		'icon'        => THEMESFLAT_ICON,
		'show_settings_on_create' => false,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'                  => array(
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Use Auto Increment Number', 'consuloan' ),
				'param_name' => 'auto_increment_icon',
				'description' => esc_html__( 'This option will disable font icon and use auto increment number ', 'consuloan' ),
				'value' => array(
					esc_html__( 'Yes, Please', 'consuloan' ) => 'yes'
					)
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
	 * Map the single iconlist_item item
	 */
	$icons_params = themesflat_map_icons('icon','Icon for list item');

	vc_map( array(
		'base'        => 'themesflat_iconlist_item',
		'name'        => esc_html__( 'Themesflat: Icon List Item', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'as_child'    => array( 'only' => 'themesflat_iconlist' ),
		'params'      => array_merge($icons_params,array(
			
			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Enable Icon Circle Style', 'consuloan' ),
				'param_name' => 'circle_style',
				'value' => array(
					esc_html__( 'Yes, please', 'consuloan' ) => 'yes'
					)
				),

			array(
				'type' => 'attach_image',
				'heading' => esc_html__( 'List Image', 'consuloan' ),
				'param_name' => 'image',
				'description' => esc_html__( 'Default image for all items in the list', 'consuloan' )
				),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'consuloan' ),
				'param_name' => 'title',
				),

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Link to', 'consuloan' ),
				'param_name' => 'link',
				),

			array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Content', 'consuloan' ),
				'param_name' => 'content'
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
			))
		) );
}



add_filter( 'themekit/shortcode/iconlist_item_atts', 'themesflat_iconlist_shortcode_atts' );

function themesflat_iconlist_shortcode_atts( $atts ) {
	$atts['circle_style'] = '';

	return $atts;
}

function themesflat_iconlist_shortcode_class( $classes, $atts ) {
	if ($atts['auto_increment_icon'] == 'yes')
		$classes[] = 'auto_increment_number';
	return $classes;
}

add_filter( 'themekit/shortcode/themesflat_iconlist_item_class', 'themesflat_iconlist_item_shortcode_class', 10, 2 );

function themesflat_iconlist_item_shortcode_class( $classes, $atts ) {
	if ( $atts['circle_style'] == 'yes' )
		$classes[] = 'circle';
	return $classes;
}

add_shortcode( 'themesflat_iconlist', 'themekit_shortcode_iconlist' );
add_shortcode( 'themesflat_iconlist_item', 'themekit_shortcode_iconlist_item' );

/**
 * Iconlist shortcode handle
 * 
 * @param   array  $atts  Shortcode attributes
 * @return  void
 */
function themekit_shortcode_iconlist( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_iconlist', $atts );
	extract (apply_filters( 'themekit/shortcode/themesflat_iconlist_atts',$atts));
	$class = apply_filters( 'themekit/shortcode/themesflat_iconlist_class', array( 'themesflat_iconlist', $class ), $atts );
	$children = array();

	if ( preg_match_all( '/\[themesflat_iconlist_item([^\]]+)\](.*?)\[\/themesflat_iconlist_item\]/is', $content, $matches ) ) {
		foreach ( $matches[1] as $index => $attributes ) {
			$_attributes = shortcode_parse_atts( trim( $attributes ) );
			$_content = trim( $matches[2][$index] );

			if ( ! isset( $_attributes['icon'] ) && ! empty( $atts['icon'] ) )
				$_attributes['icon'] = $atts['icon'];

			if ( ! isset( $_attributes['image'] ) && ! empty( $atts['image'] ) )
				$_attributes['image'] = $atts['image'];

			$children[] = themekit_shortcode_iconlist_item( $_attributes, $_content );
		}
	}

	// Enqueue shortcode assets
	wp_enqueue_script( 'themekit-shortcodes' );
	return sprintf( '<ul class="%s">%s</ul>', esc_attr( implode( ' ', $class ) ), implode( '', $children ) );
}

function themekit_shortcode_iconlist_item( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_iconlist_item', $atts );
	extract (apply_filters( 'themekit/shortcode/themesflat_iconlist_item_atts',$atts));
	$icon_name = themesflat_shortcode_icon_name('icon_',$icon_type);
	$icon_value = !empty($icon_name) ? $atts[$icon_name] : '';
	$class = apply_filters( 'themekit/shortcode/themesflat_iconlist_item_class', array( $class ), $atts );
	$icon = '';
	if ( ! empty( $image ) ) {
		if ( is_numeric( $image ) ) {
			$image_src = wp_get_attachment_image_src( $image, 'themesflat_list_thumb' );
			$image = array_shift( $image_src );
		}
		$alt  = ! empty($atts['title'])? $atts['title']: basename($image);
		$icon = sprintf( '<span><img src="%s" alt="%s" /></span>', esc_url( $image ), esc_attr( $alt ) );
	}
	elseif ( $icon_type != 'none' ) {
		$icon = sprintf( '<span class="%s"></span>', esc_attr( $icon_value ) );
	}

	$class = esc_attr( trim( implode( ' ', $class ) ) );
	// Enqueue shortcode assets
	wp_enqueue_script( 'themekit-shortcodes' );

	return sprintf( '<li class="%1$s">
		%2$s 
		<div class="list-content">
			<h3 class="list-title"><a href="%5$s">%3$s</a></h3>
			%4$s
		</div>
	</li>',
	esc_attr($class),
	wp_kses_post($icon),
	esc_html($title),
	wp_kses_post($content),
	esc_url($link)
	);
}