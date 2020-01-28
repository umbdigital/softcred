<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	/**
	 * Extended class to integrate testimonial slider with
	 * visual composer
	 */
    class WPBakeryShortCode_themesflat_imagebox_slider extends WPBakeryShortCodesContainer {
    }
}

/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_imagebox_shortcode_params' );
function themesflat_imagebox_css($atts) {
	$style[] = $atts['css'];
	$vcclass = themesflat_get_class_for_custom($atts['css'],$atts['default_id']);	
	$style[] = sprintf('
		.%1$s.themesflat_imagebox .imagebox-subtitle {
			font-size: %2$spx;
		}',$vcclass,str_replace('px','',$atts['subtitle-font-size']));
	$style[] = sprintf('
		.%1$s.themesflat_imagebox .imagebox-image img,.%1$s.themesflat_imagebox .imagebox-image:after {
			border-radius: %2$spx;
		}',$vcclass,str_replace('px','',$atts['image_radius']));
	return implode(' ', $style);
}

function themesflat_imagebox_shortcode_params() {
	/**
	 * Map the imagebox slider shortcode
	 */
	vc_map( array(
		'name'                    => esc_html__( 'Themesflat: ImageBox Slider', 'consuloan' ),
		'base'                    => 'themesflat_imagebox_slider',
		'as_parent'               => array( 'only' => 'themesflat_imagebox' ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element'         => true,
		'icon'        => THEMESFLAT_ICON,
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
				'value' => '2',
				'description' => esc_html__( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode. Supports also "auto" value, in this case it will fit slides depending on container\'s width. "auto" mode isn\'t compatible with loop mode.', 'consuloan' )
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
				'heading' => esc_html__( 'Show Pagination Control', 'consuloan' ),
				'param_name' => 'show_control',
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 'yes' )
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show prev/next Buttons', 'consuloan' ),
				'param_name' => 'show_direction',
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 'yes' )
			),	

			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra Class Name', 'consuloan' ),
				'param_name' => 'class',
				'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'consuloan' )
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
	 * Map the single imagebox item
	 */
	$icons_params = themesflat_map_icons('icon','Icon for readmore');

	vc_map( array(
		'base'        => 'themesflat_imagebox',
		'name'        => esc_html__( 'Themesflat: Image Box', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => array_merge(array(
			// Title
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Title', 'consuloan' ),
				'param_name'       => 'title'
			),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Subtitle', 'consuloan' ),
				'param_name'       => 'subtitle'
			),

			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Description', 'consuloan' ),
				'param_name' => 'content'
			),

			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__( 'Image', 'consuloan' ),
				'param_name' => 'image'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Image Size', 'consuloan' ),
				'description'    => esc_html__( '( Enter your image size Ex: medium,small,... Default: Full ). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'consuloan' ),
				'param_name' => 'image_size',
				'std'		 => 'full'
			),		

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Image Radius', 'consuloan' ),
				'description'    => esc_html__( '( Image Radius In Px. Ex: 20 )', 'consuloan' ),
				'param_name' => 'image_radius',
				'std'	=> '0px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Sub Title Font Size', 'consuloan' ),
				'description'    => esc_html__( '( Sub Title font size Ex: 16 )', 'consuloan' ),
				'param_name' => 'subtitle-font-size',
				'std'	=> '14px'
			),	

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Readmore buton', 'consuloan' ),
				'param_name' => 'show_readmore',
				'value' => array( esc_html__( 'Yes, please', 'consuloan' ) => 'yes' ),
				'std'	=> 'yes'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Link', 'consuloan' ),
				'param_name' => 'link',
				'value' => esc_html__("#",'consuloan'),
				'dependency' => array(
					'element' => 'show_readmore',
					'value'	=> 'yes'
					)
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Readmore Click Target Blank', 'consuloan' ),
				'param_name' => 'target_blank',
				'value' => array( esc_html__( 'Yes, please', 'consuloan' ) => 'yes' ),
				'dependency' => array(
					'element' => 'show_readmore',
					'value'	=> 'yes'
					)
			),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Button Text', 'consuloan' ),
				'param_name'       => 'button_text',
				'value'			   => esc_html__('View Services','consuloan'),
				'dependency' => array(
					'element' => 'show_readmore',
					'value'	=> 'yes'
					)
			)),$icons_params, array(
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Style', 'consuloan' ),
				'param_name' => 'style',
				'value' => array(
					esc_html__('Style 1','consuloan') => 'style1',
					esc_html__('Style 2','consuloan') => 'style2'
					),
				'description' => esc_html__( 'Margin item for slide', 'consuloan' )
			),						

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class', 'consuloan' ),
				'description' => esc_html__( 'Enter class ex: center right padding-content button-color-white button-color-blue', 'consuloan' ),
				'param_name' => 'class'
			),

			array(
				'type' => 'css_editor',
				'param_name' => 'css',
				'group' => esc_html__( 'Design Options', 'consuloan' )
			),
			themesflat_shortcode_default_id()
		))
	) );
}

add_shortcode( 'themesflat_imagebox_slider', 'themesflat_shortcode_imagebox_slider' );
add_shortcode( 'themesflat_imagebox', 'themesflat_shortcode_imagebox' );

/**
 * Iconbox shortcode handle
 * 
 * @param   array  $atts  Shortcode attributes
 * @return  void
 */
add_filter( 'themesflat/shortcode/imagebox_atts', 'themesflat_imagebox_shortcode_atts' );
add_filter( 'themesflat/shortcode/themesflat_imagebox_class', 'themesflat_imagebox_shortcode_class' );

function themesflat_imagebox_shortcode_atts( $atts ) {
	$atts['icon_position'] = 'top';
	$atts['icon_style']    = 'transparent';	
	$icons_params = themesflat_available_icons('readmore');
	$icons_params2 = themesflat_available_icons('icon');
	$atts = array_merge($atts,$icons_params,$icons_params2);
	return $atts;
}

function themesflat_imagebox_shortcode_class(  $atts) {
	$classes[] = 'themesflat_imagebox';
	$classes[] = $atts['class'];
	$classes[] = $atts['style'];
	$vcclass = themesflat_get_class_for_custom($atts['css'],$atts['default_id']);
	$classes[] =$vcclass;
		return $classes;
}

function themesflat_shortcode_imagebox( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_imagebox', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_imagebox_atts',$atts));
	ob_start();
	$icon_name = themesflat_shortcode_icon_name('icon_',$icon_type);
	$icon_value = !empty($icon_name) ? $atts[$icon_name] : '';
	// Preparing the shortcode attributes	
	$button_text = empty( $button_text ) ? esc_html__( '', 'consuloan' ) : $button_text;

	// Build the element classes
	$classes = apply_filters('themesflat/shortcode/themesflat_imagebox_class',$atts);

	$button_class = array(
		'style1' => 'no-bg-color',
		'style2' => 'button-bg-color',
		'style3' => 'button-bg-color',
		'style4' => 'no-bg-color',
		'style5' => 'no-bg-color',
		'style6' => 'no-bg-color',
		'style7' => 'circle-outlined',
		);
	add_action('wp_head', 'themesflat_imagebox_css');
	$box_readmore = '';

	$target = '_self';
	if ($target_blank == 'yes') {
		$target = '_blank';
	}
	
	if ( $show_readmore == 'yes' && ! empty( $link ) ) {
		$box_readmore = sprintf( '
		<a class="themesflat-button %4$s" target="%5$s" href="%1$s">%2$s<i class="readmore-icon %3$s"></i></a>',
		esc_url( $link ),  
		esc_attr($button_text),
		esc_attr($icon_value),
		esc_attr($button_class[$style]),
		esc_attr($target));
	}
	
	// Preparing image for the box
	if ( is_numeric( $atts['image'] ) && $atts['image'] != '') {
	  	$image = wpb_getImageBySize( array( 'attach_id' => $atts['image'], 'thumb_size' => $atts['image_size'] ) );
	  	$image = $image['thumbnail'];
	}
	elseif ( filter_var( $atts['image'], FILTER_VALIDATE_URL ) ) {
	  	$image = sprintf( '<img src="%s" alt="imagebox-image"  />', esc_url( $atts['image'] ) );
	}	

	?>
	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
		<div class="imagebox-wrapper">
			<?php if ( ! empty( $image ) ): ?>
				<div class="imagebox-image" style = "border-radius:<?php echo str_replace("px",'',$atts['image_radius']);?>px">
					<?php
						printf( '<a href="%s" >%s</a>', esc_url( $link ), $image );						
					?>
				</div>
				<?php   else:
							print( $image );
						endif; 
				?>
			<div class="imagebox-header">
				<h3 class="imagebox-title">
					<a href="<?php echo esc_url( $link ) ?>">
						<?php echo wp_kses_post( $atts['title'] ) ?>
					</a>	
				</h3>

				<?php if ( ! empty( $atts['subtitle'] ) ): ?>
					<div class="imagebox-subtitle"  style="font-size: <?php echo esc_attr(str_replace("px",'',$atts['subtitle-font-size']));?>"><?php echo wp_kses_post( $atts['subtitle'] ) ?></div>
				<?php endif ?>
			</div>

			<div class="imagebox-content">
				<?php if ( ! empty( $content ) ): ?>
					<div class="imagebox-desc">
						<?php echo wpb_js_remove_wpautop( $content, true );?>
					</div>
				<?php endif ?>
				
					<?php echo wp_kses_post($box_readmore);?>

			</div>
		</div>
	</div>	
<?php 
return ob_get_clean();
}

/**
 * This function will be use to handle imagebox slider
 * shortcode
 * 
 * @param   string  $atts     Shortcode attributes
 * @param   string  $content  Shortcode content
 * @return  string
 */
function themesflat_shortcode_imagebox_slider( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_imagebox_slider', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_imagebox_slider_atts',$atts));
	$config = $atts;
	unset( $config['class'] );
	unset( $config['css'] );
	$class = apply_filters( 'themesflat/shortcode/themesflat_imagebox_slider_class', array( 'themesflat_imagebox_slider','themesflat_enable_slider', $atts['class'] ), $atts );

	// Enqueue shortcode assets
	wp_enqueue_script( 'themesflat-carousel' );
	
	return sprintf( '
		<div class="%s" data-margin="%s" data-slides_per_view="%s" data-autoplay="%s" data-show_control="%s" data-show_direction="%s">			
			%s				
		</div>
	', implode( ' ', $class ), esc_attr( $atts['margin'] ) , esc_attr( $atts['slides_per_view'] ), esc_attr( $atts['autoplay'] ), esc_attr( $atts['show_control'] ), esc_attr( $atts['show_direction'] ),  do_shortcode( $content ) );
}

