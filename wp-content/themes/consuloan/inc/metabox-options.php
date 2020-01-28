<?php
add_action( 'admin_init', 'themesflat_page_options_init' );

function themesflat_page_options_init() {   

    new themesflat_meta_boxes(array(
    	// Portfolio
    	'id'	 => 'portfolio-options',
		'label'  => esc_html__( 'Causes Settings', 'consuloan' ),
		'post_types'  => 'portfolios',
	    'context'     => 'normal',
        'priority'    => 'default',
		'sections' => array(
            'general'   => array( 'title' => esc_html__( 'General', 'consuloan' ) ),
			),
		'options' => themesflat_portfolio_options_fields()
	));	

	new themesflat_meta_boxes(array( 
        'id'          => 'page-options',
        'label'       => esc_html__( 'Page Options', 'consuloan' ),
        'post_types'  => 'page',
        'context'     => 'normal',
        'priority'    => 'default',       

        'sections' => array(
            'general'   => array( 'title' => esc_html__( 'General', 'consuloan' ) ),
            'header'    => array( 'title' => esc_html__( 'Header', 'consuloan' ) ),
            'footer'    => array( 'title' => esc_html__( 'Footer', 'consuloan' ) ),
            'portfolio' => array( 'title' => esc_html__( 'Portfolio', 'consuloan' ) ),
            'service' => array( 'title' => esc_html__( 'Service', 'consuloan' ) ),
            'blog'      => array( 'title' => esc_html__( 'Blog', 'consuloan' ) )
        ),

        'options' => themesflat_page_options_fields()
    ) );

    new themesflat_meta_boxes(array(
		// event
		'id' 	=> 'blog-options',
		'label'	=> esc_html__( 'Post settings', 'consuloan' ),
		'post_types'	=> array('post','faq'),
		'context'     => 'normal',
        'priority'    => 'default',
		'sections' => array(
            'blog'   => array( 'title' => esc_html__( 'Blog', 'consuloan' ) ),
			),
		'options' => themesflat_post_options_fields()
	));

    new themesflat_meta_boxes(array(
        // event
        'id'    => 'testimonial-options',
        'label' => esc_html__( 'Testimonial Details', 'consuloan' ),
        'post_types'    => 'testimonial',
        'context'     => 'normal',
        'priority'    => 'default',
        'sections' => array(
            'testimonial_details'   => array( 'title' => esc_html__( 'Testimonial Details', 'consuloan' ) ),
            ),
        'options' => themesflat_testimonial_options_fields()
    ));
}

