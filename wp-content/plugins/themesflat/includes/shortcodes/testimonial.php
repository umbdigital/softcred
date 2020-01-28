<?php
/**
 * Extended class to integrate testimonial slider with
 * visual composer
 */
 
/**
 * Register filter for append custom class name
 * that generated from visual-composer
 */
add_filter( 'themesflat/shortcode/themesflat_testimonial_class', 'themesflat_testimonial_shortcode_class', 10, 2 );
add_filter( 'themesflat/shortcode/themesflat_testimonial_slider_class', 'themesflat_custom_shortcodes_class', 10, 2 );
add_action( 'vc_before_init', 'themesflat_testimonial_shortcode_params' );

function themesflat_testimonial_shortcode_class(  $atts) {
	
	if (function_exists('vc_shortcode_custom_css_class')) {
		$vcclass = vc_shortcode_custom_css_class( $atts['css'], ' ' );
	}
	$classes[] =$vcclass;
	$classes[] = $atts['class'];
	$classes[] = $atts['style'];
	return $classes;
}

function themesflat_testimonial_shortcode_params() {
	/**
	 * Map the testimonial slider shortcode
	 */
	vc_map( array(
		'name'                    => esc_html__( 'Themesflat: Testimonial Slider', 'consuloan' ),
		'base'                    => 'themesflat_testimonial_slider',
		'icon'        => THEMESFLAT_ICON,
		'category'                => esc_html__( 'Consuloan', 'consuloan' ),
		'params'                  => array(		
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Style', 'consuloan' ),
				'param_name' => 'style',
				'value' => array(
					esc_html__( 'Style 1', 'consuloan' )   => 'style1',
					esc_html__( 'Style 2', 'consuloan' )   => 'style2',
					),
				'std' => 'style1'
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Item margin right(px) not include unit', 'consuloan' ),
				'param_name' => 'gutter',
				'value'      => 30,
				),	

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Autoplay', 'consuloan' ),
				'param_name' => 'autoplay',
				'description' => esc_html__( 'Autoplay Mode.', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => true ),
				'std' => false
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Pagination Control', 'consuloan' ),
				'param_name' => 'show_control',
				'description' => esc_html__( 'If YES pagination control will be enabled.', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 1 ),
				'std' => 0
			),

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Logo', 'consuloan' ),
				'param_name' => 'show_logo',
				'description' => esc_html__( 'If YES Show Logo will be enabled.', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 1 ),
				'std' => 0
			),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Number Of Testimonials', 'consuloan' ),
				'param_name' => 'limit',
				'value'      => 3,
				'std'	     => 3
				),

			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Show Item Of Testimonials', 'consuloan' ),
				'param_name' => 'show_item',
				'value'      => '',
				'std'	     => 1
				),		

			array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'My Custom Ids', 'consuloan' ),
					'param_name'  => 'post_in',
					'value'		  => '',
					'std'		  => ' ',
					'description' => esc_html__( 'Just Show these testimonial by IDs EX:1,2,3', 'consuloan' ),
					),		

			array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Exclude', 'consuloan' ),
					'param_name'  => 'exclude',
					'dependency' 	  => array(
						'element'	=> 'post_in',
						'value'		=> ' ',
						),
					'description' => esc_html__( 'Not Show these testimonial by IDs EX:1,2,3', 'consuloan' ),
					),	

			array(
				'type' => 'checkbox',
				'heading' => esc_html__( 'Show Prev/Next Buttons', 'consuloan' ),
				'param_name' => 'show_direction',
				'description' => esc_html__( 'If "YES" prev/next control will be enabled.', 'consuloan' ),
				'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => true ),
				'std'	     => false
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
	) );

	
}

add_shortcode( 'themesflat_testimonial_slider', 'themesflat_shortcode_testimonial_slider' );

/**
 * This function will be use to handle testimonial slider
 * shortcode
 * 
 * @param   string  $atts     Shortcode attributes
 * @param   string  $content  Shortcode content
 * @return  string
 */
function themesflat_shortcode_testimonial_slider( $atts, $content = null ) {
	$atts = vc_map_get_attributes( 'themesflat_testimonial_slider', $atts );
	extract (apply_filters( 'themesflat/shortcode/themesflat_testimonial_slider_atts',$atts));

	$args = array(
		'post_type' => 'testimonial',
		'posts_per_page' => $limit,
		);

	$classes = apply_filters( 'themesflat/shortcode/themesflat_testimonial_class', $atts );

	if ($exclude != '') {
		$args['post__not_in'] = explode(',',trim($exclude));
	}

	if ( trim($post_in) != '') {
		$args['post__in'] = explode(',', trim($post_in));
         $args['orderby'] = 'post__in';
	}

	$testimonial_logo = '';
	if ($show_logo == 1) {
		$testimonial_logo = '<div class="testimonial-logo">“</div>';
	}	
	
	$allow = array(
    'a' => array(
        'href' => array(),
        'title' => array(),
        'class' => array()
    ));

	$testimonials = new WP_Query($args);
	$nav_thumb = '';
	$testimonial_content = '';	
	while ($testimonials->have_posts()) :
		$testimonials -> the_post();
		$star = themesflat_meta('testimonial_rating');
		$stars ='';
		for ( $i = 0 ; $i < $star;$i++) {
			$stars .= '<a href="#" class="fa fa-star"></a>';
		}
		$nav_thumb .= sprintf('<li>%1$s</li>',get_the_post_thumbnail(null,'themesflat-testimonial'));
		$testimonial_content .= sprintf('<div class="item">
			<div class="testimonial-content cd-headline clip">
				<div class="sub-title3">%9$s<span>%10$s</span> %3$s</div>
				%8$s				
				<div class="sub-title1">%9$s<span>%10$s</span> <div class="cd-words-wrapper"><b class="is-visible">%3$s</b><b>%3$s</b></div></div>
				<blockquote class="themesflat_quote1">
					%1$s
				</blockquote>
				<div class="testimonial-image">
					%4$s
				</div>
				<div class="testimonial-author">					
					<div class="author-info1"><p>%7$s</p></div>
					<h6 class="author-name"><a href="%6$s">%2$s</a></h6>
					<div class="wrap-stars">%5$s</div>
					<div class="author-info"><p>%7$s</p></div>					
				</div>
				<div class="sub-title2">%9$s<span>%10$s</span> %3$s</div>
				<blockquote class="themesflat_quote2">
					%1$s
				</blockquote>
			</div>	
		</div>',
		get_the_content(),
		get_the_title(),		
		esc_attr(themesflat_meta('testimonial_subtitle')),
		get_the_post_thumbnail(null,'themesflat-testimonial'),
		wp_kses($stars,$allow),
		esc_url(themesflat_meta('testimonial_link')),
		esc_html(themesflat_meta('testimonial_position')),
		$testimonial_logo,
		esc_attr(themesflat_meta('testimonial_number')),
		esc_attr(themesflat_meta('testimonial_suffix_number'))
		);
	endwhile;
	
	$config = $atts;

	// Enqueue shortcode assets
	wp_enqueue_script( 'themesflat-carousel' );
	
	return sprintf( '
		<div class="testimonial-sliders %8$s" data-autoplay="%3$s" data-show_control="%4$s" data-show_direction="%5$s" data-margin="%9$s" data-items="%10$s">
			<img class="logo_svg testimonial_logo" data-src="%7$s" src="%7$s" alt="thumb">
			<div class="slide_nav"><ul class="slides">%1$s</ul></div>
			<div class="testimonial-slider" >		
				%6$s			
			</div>
		</div>
	', $nav_thumb, esc_attr(implode( ' ', $classes )), esc_attr( $autoplay ), esc_attr( $show_control ), esc_attr( $show_direction ),  $testimonial_content,esc_url(THEMESFLAT_LINK.'images/testimonial.svg'),esc_attr(implode( ' ', $classes )),esc_attr($gutter),esc_attr($show_item) );
}