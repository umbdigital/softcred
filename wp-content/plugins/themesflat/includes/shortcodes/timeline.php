<?php
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	/**
	 * Extended class to integrate testimonial slider with
	 * visual composer
	 */
    class WPBakeryShortCode_themesflat_timeline_wrap extends WPBakeryShortCodesContainer {
    }
}

/**
 * Register shortcode into Visual Composer
 */
add_action( 'vc_before_init', 'themesflat_timeline_shortcode_params' );

function themesflat_timeline_css($atts) {
	$style[] = $atts['css'];
	$vcclass = themesflat_get_class_for_custom($atts['css'],$atts['default_id']);
	$style[] = sprintf('
		.%1$s.themesflat_timeline .line {
			width: %2$spx;		
		}',$vcclass,str_replace('px','',$atts['line-width']));
	$style[] = sprintf('
		.%1$s.themesflat_timeline .line {
			width: %2$spx;		
		}',$vcclass,str_replace('px','',$atts['line-height']));
	$style[] = sprintf('
		.%1$s.themesflat_timeline .year {
			margin-top: %2$spx;		
		}',$vcclass,str_replace('px','',$atts['top-year']));
	$style[] = sprintf('
		.%1$s.themesflat_timeline .timeline-title {
			margin-top: %2$spx;		
		}',$vcclass,str_replace('px','',$atts['top-title']));
	$style[] = sprintf('
		.%1$s.themesflat_timeline .timeline-title {
			margin-bottom: %2$spx;		
		}',$vcclass,str_replace('px','',$atts['bottom-title']));
	$style[] = sprintf('
		.%1$s.themesflat_timeline .timeline-desc {
			margin-bottom: %2$spx;		
		}',$vcclass,str_replace('px','',$atts['bottom-content-text']));	
	
	return implode(' ', $style);
}

function themesflat_timeline_shortcode_params() {
	/**
	 * Map the timeline slider shortcode
	 */
	vc_map( array(
		'name'                    => esc_html__( 'Themesflat: TimeLine Wrap', 'consuloan' ),
		'base'                    => 'themesflat_timeline_wrap',
		'as_parent'               => array( 'only' => 'themesflat_timeline' ), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		'content_element'         => true,
		'icon'        => THEMESFLAT_ICON,
		'show_settings_on_create' => false,
		'category'                => esc_html__( 'Consuloan', 'consuloan' ),
		'params'                  => array(						
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'consuloan' ),
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
	 * Map the single timeline item
	 */	

	vc_map( array(
		'base'        => 'themesflat_timeline',
		'name'        => esc_html__( 'Themesflat: TimeLine', 'consuloan' ),
		'icon'        => THEMESFLAT_ICON,
		'category'    => esc_html__( 'Consuloan', 'consuloan' ),
		'params'      => array_merge(array(

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Year', 'consuloan' ),
				'param_name'       => 'year',
				'std'		 	   => '1990'
			),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Title', 'consuloan' ),
				'param_name'       => 'title'
			),			

			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__( 'Description', 'consuloan' ),
				'param_name' => 'content'
			),

			array(
				'type'       => 'attach_images',
				'heading'    => esc_html__( 'Image', 'consuloan' ),
				'param_name' => 'image'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Line Width', 'consuloan' ),
				'description'    => esc_html__( '(Custom Line width Ex: 1px  )', 'consuloan' ),
				'param_name' => 'line-width',
				'std'	=> '1px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Line Height', 'consuloan' ),
				'description'    => esc_html__( '(Custom Line height Ex: 150px  )', 'consuloan' ),
				'param_name' => 'line-height',
				'std'	=> '150px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Margin Top Year', 'consuloan' ),
				'description'    => esc_html__( '(Custom Margin Top Year px Ex: 5 or -5  )', 'consuloan' ),
				'param_name' => 'top-year',
				'std'	=> '0px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Margin Top Title', 'consuloan' ),
				'description'    => esc_html__( '(Custom Margin Top Title px Ex: 5 or -5  )', 'consuloan' ),
				'param_name' => 'top-title',
				'std'	=> '0px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Margin Bottom Title', 'consuloan' ),
				'description'    => esc_html__( '(Custom Margin Bottom Title px Ex: 5 or -5  )', 'consuloan' ),
				'param_name' => 'bottom-title',
				'std'	=> '4px'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Margin Bottom Content Text', 'consuloan' ),
				'description'    => esc_html__( '(Custom Margin Cescription Content Text px Ex: 5 or -5  )', 'consuloan' ),
				'param_name' => 'bottom-content-text',
			)), 
		array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Extra Class', 'consuloan' ),
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

add_shortcode( 'themesflat_timeline_wrap', 'themesflat_shortcode_timeline_wrap' );
add_shortcode( 'themesflat_timeline', 'themesflat_shortcode_timeline' );

/**
 * Iconbox shortcode handle
 * 
 * @param   array  $atts  Shortcode attributes
 * @return  void
 */
add_filter( 'themesflat/shortcode/timeline_atts', 'themesflat_timeline_shortcode_atts' );
add_filter( 'themesflat/shortcode/themesflat_timeline_class', 'themesflat_timeline_shortcode_class' );

function themesflat_timeline_shortcode_atts( $atts ) {
	$atts['icon_position'] = 'top';
	$atts['icon_style']    = 'transparent';		
	return $atts;
}

function themesflat_timeline_shortcode_class(  $atts) {
	$classes[] = 'themesflat_timeline';
	$classes[] = $atts['class'];
	$vcclass = themesflat_get_class_for_custom($atts['css'],$atts['default_id']);
	$classes[] =$vcclass;
		return $classes;
}

function themesflat_shortcode_timeline( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_timeline', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_timeline_atts',$atts));
	ob_start();	

	// Build the element classes
	$classes = apply_filters('themesflat/shortcode/themesflat_timeline_class',$atts);
	
	add_action('wp_head', 'themesflat_timeline_css');

	if ( ! empty( $image ) ) {
		$gallery = shortcode_atts(
		    array(
		        'image'      =>  'image',
		    ), $atts );
		$image="";
		$image_ids = explode(',',$gallery['image']);	
		    foreach( $image_ids as $image_id ){
			    $images = wp_get_attachment_image_src( $image_id, 'themesflat-about-us' );
			    $image .='<div class="timeline-images"><img src="'.$images[0].'" alt="'.$atts['title'].'"></div>';
			    $images++;
		    }
	}	
	
	?>
	<div class="<?php echo esc_attr( join( ' ', $classes ) ) ?>">
		<div class="timeline-wrapper">
			<div class="data data-step">		
				<div class="year" style="margin-top: <?php echo esc_attr(str_replace("px",'',$atts['top-year']));?>px">
					<?php
						echo wp_kses_post( $atts['year'] );
					?>					
				</div>
			</div>

			<div class="data line-step">
			<div class="line" style="width: <?php echo esc_attr(str_replace("px",'',$atts['line-width']));?>px; height: <?php echo esc_attr(str_replace("px",'',$atts['line-height']));?>px;"></div>
			</div>

			<div class="data info-step">	
				<div class="timeline-header">
					<h3 class="timeline-title" style="margin-top: <?php echo esc_attr(str_replace("px",'',$atts['top-title']));?>px; margin-bottom: <?php echo esc_attr(str_replace("px",'',$atts['bottom-title']));?>px">						
						<?php echo wp_kses_post( $atts['title'] ) ?>							
					</h3>					
				</div>

				<div class="timeline-content">
					<?php if ( ! empty( $content ) ): ?>
						<div class="timeline-desc" style="margin-bottom: <?php echo esc_attr(str_replace("px",'',$atts['bottom-content-text']));?>px">
							<?php echo wpb_js_remove_wpautop( $content, true );?>
						</div>
					<?php endif ?>

					<?php if ( ! empty( $image ) ): ?>
						<div class="wrap-timeline-image">
							<?php
								printf( '%s', $image );						
							?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>	
<?php 
return ob_get_clean();
}

/**
 * This function will be use to handle timeline slider
 * shortcode
 * 
 * @param   string  $atts     Shortcode attributes
 * @param   string  $content  Shortcode content
 * @return  string
 */
function themesflat_shortcode_timeline_wrap( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_timeline_wrap', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_timeline_wrap_atts',$atts));
	$config = $atts;
	unset( $config['class'] );
	unset( $config['css'] );
	$class = apply_filters( 'themesflat/shortcode/themesflat_timeline_wrap_class', array( 'themesflat_timeline_wrap', $atts['class'] ), $atts );

	// Enqueue shortcode assets
	wp_enqueue_script( 'themesflat-carousel' );
	
	return sprintf( '
		<div class="%s" >			
			%s				
		</div>
	', implode( ' ', $class ),  do_shortcode( $content ) );
}



