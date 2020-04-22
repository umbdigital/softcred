<?php

/**

 * Return the default options of the theme

 * 

 * @return  void

 */



function themesflat_customize_default($key) {

	$default = array(

		'logo_controls' => array('padding-top' => 32,'padding-left' => 0),

		'footer_controls' => array('padding-top' => 70,'padding-bottom' => 48),

		'bread_crumb_prefix' =>'<i class="fa fa-home" aria-hidden="true"></i>',

		'bottom_style' => 'bottom-center',

		'footer_background_image' => '',

		'breadcrumb_separator' =>  '<i class="fa fa-angle-right" aria-hidden="true"></i>',

		'footer_widget_areas'				=> 4,

		'show_post_navigator' => 0,

		'breadcrumb_prefix' => '',

		'logo_height' => 35,

		'menu_location_primary' => 'primary',

		'site_logo'	=> THEMESFLAT_LINK . 'images/logo.png',

		'site_retina_logo' => THEMESFLAT_LINK . 'images/logo@2x.png',

		'social_links'	=> array ("facebook" => '#', "twitter" => '#', "google-plus" => '#'),

		'enable_footer_social' => 0,

		'page_title_overlay_color' => 'rgba(41,38,54,0.85)',

		'page_title_text_color' => '#ffffff',

		'page_title_link_color' => '#ffffff',

		'page_title_overlay_opacity' => 0.11,

		'page_title_controls' => array('padding-top' => 51, 'padding-bottom' => 64, 'margin-bottom' => 80),

		'page_title_background_image' => THEMESFLAT_LINK . 'images/page-title.jpg',

		'show_footer' => 0,

		'footer1' => 'footer-1',

		'footer2' => 'footer-2',

		'footer3' => 'footer-3',

		'footer4' => 'footer-4',

		'enable_social_link_top'  => 0,

		'logo_margin_left' 	  => 0,

		'show_page_title'	  => 1,

		'page_title_absolute'	=> 0,

		'show_page_title_heading' => 0,

		'portfolio_show_post_navigator' => 0,

		'enable_content_right_top'  => 1,

		'top_background_color'	=> '#edeff1',

		'topbar_textcolor'	=> '#28293a',

		'mainnav_backgroundcolor'=>'#ffffff',

		'mainnav_color'		=> '#28293a',

		'mainnav_hover_color'=>'#f2c21a',

		'mainnav_hover_background'=> 'rgba(242,194,26,0)',

		'sub_nav_color'		=>'#3c3a42',

		'sub_nav_background'=>'#ffffff',

		'border_color_sub_nav'=>'#ffffff',

		'sub_nav_background_hover'=>'#0f3661',

		'primary_color'=>'#0f3661',

		'body_text_color'=>'#42435d',

		'hover_body_color'	=>	'#f2c21a',

		'body_background_color' => '#ffffff',

		'body_font_name'	=> array(

			'family' => 'Work Sans',

			'style'  => 'regular',

			'size'   => '14',

			'line_height'=>'24'

			), 

		'header_style'	=> 'header-style2',

		'header_content'	=> '<ul>

									<li>

										<div class="border-icon">

											<i class="fa fa-phone" aria-hidden="true"></i>

										</div>

										<div class="text">
											<span>TEL:.</span></br>
											<strong>001-1234-88888</strong>

										<p>info.deercreative@gmail.com</p>

										</div>

									</li>

									<li >

										<div class="border-icon">

											<i class="fa fa-map-marker" aria-hidden="true"></i>

										</div>

										<div class="text">

										<strong>40 Baria Sreet 133/2</strong>

										<p>NewYork City, US</p>

										</div>

									</li>

								</ul>',

		'headings_font_name'	=> array(

			'family' => 'Work Sans',

			'style'  => '700'			

			),

		'h1_size' => 36,

		'h2_size' => 30,

		'h3_size' => 24,

		'h4_size' => 18,

		'h5_size' => 15,

		'h6_size' => 13,

		'breadcrumb_enabled' => 1,

		'show_post_paginator' => 0,

		'blog_grid_columns' => 3,

		'blog_archive_exclude' => '',

		'testimonial_rating' => 0,

		'blog_layout' => 'sidebar-left',

		'page_layout' => 'sidebar-left',

		'blog_archive_layout' => 'blog-list-full-width',

		'related_post_style'	=> 'blog-grid',

		'blog_sidebar_list'		  => 'blog-sidebar',

		'blog_archive_show_post_meta'	=> 1,		

		'blog_archive_readmore' => 1,

		'blog_archive_post_excepts_length' => 57,

		'blog_archive_readmore_text' => 'READ MORE <i class="fa fa-angle-double-right" aria-hidden="true"></i>',

		'blog_archive_pagination_style' => 'pager-numeric',

		'blog_posts_per_page'	=> 5,

		'blog_order_by'	=> 'date',

		'blog_order_direction' => 'DESC',

		'page_sidebar_list'	=> 'blog-sidebar',

		'menu_font_name'	=> array(

			'family' => 'Work Sans',

			'style'  => '600',

			'size'   => '14',

			'line_height'=>'60',

			),

		'show_readmore'	  => 1,

		'show_filter_portfolio' => 1,

		'portfolio_style'		=>'grid',

		'grid_columns_portfolio' => 'one-three',

		'portfolio_exclude' =>'',

		'portfolio_archive_pagination_style' => 'pager-numeric',

		'portfolio_grid_columns' => 'one-three',	

		'portfolios_sidebar'		=> 'fullwidth',

		'portfolio_post_perpage'	=> 9,

		'portfolio_order_by'	=> 'date',

		'portfolio_order_direction' => 'DESC',

		'portfolio_category_order' => '',

		'portfolio_single_style'	=> 'left_content',

		'related_portfolio_style' => 'grid',

		'grid_columns_portfolio_related' => 'one-three',

		'number_related_portfolio' => 3,

		'show_related_portfolio' => 0,		

		'enable_custom_topbar'  => 0,

		'enable_page_callout'	=> 0,

		'topbar_enabled' => 0,

		'header_sticky' => 1,

		'header_searchbox' => 1,		

		'footer_background_color'	=> '#0d2034',

		'footer_text_color'			=> '#b5b7d2',

		'bottom_background_color'	=> '#0a1c2e',

		'bottom_text_color'			=> '#6c6d83',

		'show_bottom'				=> 1,

		'go_top'					=> 1,

		'layout_version'			=> 'wide',		

		'footer_copyright'			=> '<p>2018 <a href="#">Consuloan.</a> All rights reserved.</p>',

		'top_content' => 'Welcome to Financial Services Consultant!',

		'button_topbar' => '<a href="https://iwbarecebiveis.wba.com.br/iwba/pages/index.jsf" class="button-topbar">Área do cliente</a>',

		'button_menu' => '<a href="https://iwbarecebiveis.wba.com.br/iwba/pages/index.jsf" class="button-menu">Área do cliente</a>',

		'show_pagination_portfolio' => 0,

		'show_header_content' => 0,

		'enable_smooth_scroll'	=> 0,

		'show_post_meta_date' => 1,

		'show_post_meta_author' => 1,

		'enable_language_switch' => 0,

		'header_button_text' => '<a href="https://iwbarecebiveis.wba.com.br/iwba/pages/index.jsf" class="button-header">Área do cliente</a>',

		'show_social_share'	=> 0,

		'show_count_posts'	=> 1,

		'hide_content' => 'yes',

		'product_layout'	=> 'fullwidth',

		'woo_products_per_page' => 9,

		'product_columns' => 'three-columns',

		'woo_products_related_per_page' => 3,

		'woo_products_related_columns' => 'three-columns',

		'show_date_portfolio' => 0,

		'show_readmore_portfolio' => 0,

		'show_content_portfolio' => 0,

		'portfolio_content_length' => 150,

		'services_grid_columns' => 'one-three',

		'services_show_post_navigator' => 1,

		'services_post_perpage' => 9,

		'include_pages_list' => '',

		'services_content_length' => 150,

		'show_pagination_services' => 1,

		'hide_content_services' => 1,

		'services_archive_post_excepts_length'=> 150,

		'show_addtocard_header' => 0,

		'show_addtocard_topbar'	=> 0,

		'topbar_searchbox' => 0,

		'show_button_topbar' => 0,

		'show_button_menu'	=> 0,

		'header_absolute'	=> 0,

		'topbar_absolute'	=> 0,

		'show_header_button' => 1,

		'comming_soon_time' => '2018/12/01',

		'key_google_api'	=> 'AIzaSyCOYt9j4gB6udRh420WRKttoGoN38pzI7w',

		'enable_preload'	=> 1,

	);

	return $default[$key];

}



/**

 * Return an array that used to declare options

 * for the page

 * 

 * @return  array

 */

function themesflat_portfolio_options_fields() {

	$options['cover_heading'] = array(

		'type' => 'heading',

		'section' => 'general',

		'title' => esc_html__( 'Portfolio', 'consuloan' ),

		'description' => esc_html__( 'This is an special option, it allow to set Portfolio informations.', 'consuloan' )

		);



	$options['gallery_portfolio'] = array(

		'type'    => 'image-control',

		'section' => 'general',

		'title' => esc_html__( 'Images', 'consuloan' ),

		'default' => ''

		);



	themesflat_prepare_options($options);

	return $options;

}



function themesflat_testimonial_options_fields() {

	$options['cover_heading'] = array(

		'type' => 'heading',

		'section' => 'testimonial_details',

		'title' => esc_html__( 'Testimonial Details', 'consuloan' ),

		);



	$options['testimonial_number'] = array(

		'type'    => 'text',

		'section' => 'testimonial_details',

		'title' => esc_html__( 'Number Title', 'consuloan' ),

		'default' => ''

		);



	$options['testimonial_suffix_number'] = array(

		'type'    => 'text',

		'section' => 'testimonial_details',

		'title' => esc_html__( 'Number Suffix Title', 'consuloan' ),

		'default' => ''

		);



	$options['testimonial_subtitle'] = array(

		'type'    => 'text',

		'section' => 'testimonial_details',

		'title' => esc_html__( 'Subtitle', 'consuloan' ),

		'default' => ''

		);



	$options['testimonial_position'] = array(

		'type'    => 'text',

		'section' => 'testimonial_details',

		'title' => esc_html__( 'Position', 'consuloan' ),

		'default' => ''

		);



	$options['testimonial_rating'] = array(

		'type'    => 'select',

		'section' => 'testimonial_details',

		'title'   => esc_html__( 'Ratings', 'consuloan' ),

		'default' => themesflat_get_opt('testimonial_rating'),

		'choices'   => array(

				'5' => esc_html__('5 Stars','consuloan'),

				'4' => esc_html__('4 Stars','consuloan'),

				'3' => esc_html__('3 Stars','consuloan'),

				'2' => esc_html__('2 Stars','consuloan'),

				'1' => esc_html__('1 Stars','consuloan'),

				'0' => esc_html__('No Rating','consuloan')

			)

	);



	$options['testimonial_link'] = array(

		'type'    => 'text',

		'section' => 'testimonial_details',

		'title' => esc_html__( 'Link', 'consuloan' ),

		'default' => ''

	);



	themesflat_prepare_options($options);

	return $options;

}



function themesflat_post_options_fields() {

	$options['blog_heading'] = array(

		'type' => 'heading',

		'section' => 'blog',

		'title' => esc_html__( 'Dear friends,', 'consuloan' ),

		'description' => esc_html__( 'Option just view if post format is gallery or video! <br/>Thanks!', 'consuloan' )

		);



	$options['gallery_images_heading'] = array(

		'type' => 'heading',

		'section' => 'blog',

		'title' => esc_html__( 'Post Format: Gallery .', 'consuloan' ),

		'description' => esc_html__( '', 'consuloan' )

		);



	$options['gallery_images'] = array(

		'type'    => 'image-control',

		'section' => 'blog',

		'title' => esc_html__( 'Images', 'consuloan' ),

		'default' => ''

		);



	$options['video_url_heading'] = array(

		'type' => 'heading',

		'section' => 'blog',

		'title' => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo ...).', 'consuloan' ),

		'description' => esc_html__( '', 'consuloan' )

		);



	$options['video_url'] = array(

		'type'    => 'textarea',

		'section' => 'blog',

		'title' => esc_html__( 'iframe video link', 'consuloan' ),

		'default' => ''

		);

	themesflat_prepare_options($options);

	return $options;

}



function themesflat_blog_options_fields() {

	$options['position_field_heading'] = array(

		'type' => 'heading',

		'section' => 'events',

		'title' => esc_html__( 'Events', 'consuloan' ),

		'description' => esc_html__( 'This is an special option, it allow to set Causes informations.', 'consuloan' )

		);



	$options['position_field'] = array(

		'type'    => 'text',

		'section' => 'events',

		'title' => esc_html__( 'Position', 'consuloan' ),

		'default' => ''

		);



	$options['address'] = array(

		'type'    => 'textarea',

		'section' => 'events',

		'title' => esc_html__( 'Address', 'consuloan' ),

		'default' => ''

		);



	$options['event_time'] = array(

		'type'    => 'datetime',

		'section' => 'events',

		'title' => esc_html__( 'Event date time', 'consuloan' ),

		'default' => ''

		);



	$options['event_link'] = array(

		'type'    => 'text',

		'section' => 'events',

		'title' => esc_html__( 'Link to join', 'consuloan' ),

		'default' => ''

		);

	themesflat_prepare_options($options);

	return $options;

}



function themesflat_page_options_fields() {

	global $wp_registered_sidebars;



	$options  = array();

	$sidebars = array();



	// Retrieve all registered sidebars

	foreach( $wp_registered_sidebars as $params )

		$sidebars[$params['id']] = $params['name'];



	/**

	 * General

	 */	

	$options['layout_heading'] = array(

		'type' => 'heading',

		'section' => 'general',

		'title' => esc_html__( 'Layout', 'consuloan' ),

		'description' => esc_html__( 'Choose between a full or a boxed layout to set how this page layout will look like.', 'consuloan' )

		);



	$options['enable_custom_layout'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Layout', 'consuloan' ),

		'section' => 'general',

		'children'=> array('layout_version','page_layout','sidebar_default','page_sidebar_list'),

		'default' => false

		);



	$options['layout_version'] = array(

		'type'    => 'select',

		'title'   => esc_html__( 'Display Style', 'consuloan' ),

		'section' => 'general',

		'default' => 'wide',

		'choices' => array(

			'wide'  =>  esc_html__( 'Wide', 'consuloan' ),

			'boxed'  =>  esc_html__( 'Boxed', 'consuloan' )

			)

		);



	$options['page_layout'] = array(

		'type'    => 'select',

		'title'   => esc_html__( 'Sidebar Position', 'consuloan' ),

		'section' => 'general',

		'default' => 'sidebar-right',

		'choices' => array(

			'fullwidth' => esc_html__( 'No Sidebar', 'consuloan' ),

			'sidebar-left' => esc_html__( 'Sidebar Left', 'consuloan' ),

			'sidebar-right' =>  esc_html__( 'Sidebar Right', 'consuloan' )

			)

		);



	$options['page_sidebar_list'] = array(

		'type'    => 'dropdown-sidebar',

		'title'   => esc_html__( 'Custom Sidebar', 'consuloan' ),

		'section' => 'general',

		'default' => 'sidebar-page'

		);



	$options['page_title_heading'] = array(

		'type' => 'heading',

		'section' => 'general',

		'title' => esc_html__( 'Page Title', 'consuloan' ),

		);



	$options['enable_custom_page-title'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Page Title', 'consuloan' ),

		'section' => 'general',

		'children' => array('show_page_title','show_page_title_heading','page_title_overlay_color','page_title_overlay_opacity','page_title_controls','page_title_background_image','page_title_controls', 'page_title_absolute', 'page_title_text_color', 'page_title_link_color'),

		'default' => false

		);



	$options['show_page_title'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Show Page Title', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_customize_default( 'show_page_title' )

		);



	$options['show_page_title_heading'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Show Page Title Heading', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_customize_default( 'show_page_title_heading' )

		);

	

	$options['page_title_background_image'] = array(

		'type' => 'single-image-control',

		'title'   => esc_html__( 'Page Title Background Image', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_customize_default('page_title_background_image')

		);



	$options['page_title_controls'] = array(

		'type' => 'box-controls',

		'title'   => esc_html__( 'Page Title Controls (px)', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_customize_default('page_title_controls')

		);



	$options['page_title_overlay_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Page Title Overlay Color', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_get_opt( 'page_title_overlay_color' )

		);



	$options['page_title_text_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Page Heading Text Color', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_get_opt( 'page_title_text_color' )

		);



	$options['page_title_link_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Breadcrumb Text Color', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_get_opt( 'page_title_link_color' )

		);



	$options['page_title_absolute'] = array(

		'type'		=> 'power',

		'title'		=>	esc_html__('Page Title Absolute', 'consuloan'),

		'section'	=>	'general',

		'default'	=>	themesflat_customize_default( 'page_title_absolute' ),

	);



	$options['enable_custom_color'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Color', 'consuloan' ),

		'section' => 'general',

		'children' => array('primary_color','hover_body_color','body_background_color'),

		'default' => false

		);



	$options['primary_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Scheme color', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_get_opt( 'primary_color' )

		);	



	$options['hover_body_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Hover, Focus, Active Body Color', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_get_opt( 'hover_body_color' )

		);



	$options['body_background_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Body Background Color', 'consuloan' ),

		'section' => 'general',

		'default' => themesflat_customize_default( 'body_background_color' )

		);



	$options['page_class_heading'] = array(

		'type' => 'heading',

		'section' => 'general',

		'title' => esc_html__( 'Custom Page Class', 'consuloan' ),

		);

	

	$options['custom_page_class'] = array(

		'type'    => 'text',

		'section' => 'general',

		);



	/**

	 * Header

	 */

	$options['topbar_heading'] = array(

		'type' => 'heading',

		'section' => 'header',

		'title' => esc_html__( 'Top Bar', 'consuloan' ),

		'description' => esc_html__( 'Turn on/off the top bar and change it styles.', 'consuloan' )

		);



	$options['enable_custom_topbar'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Topbar', 'consuloan' ),

		'section' => 'header',

		'children' => array('topbar_enabled','enable_content_right_top','top_background_color','topbar_textcolor','top_content','button_topbar','enable_social_link_top','show_button_topbar','show_addtocard_topbar','topbar_searchbox','topbar_absolute'),

		'default' => false

		);



	$options['topbar_enabled'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Display Topbar On This Page', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'topbar_enabled' )

		);	



	$options['topbar_absolute'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Topbar Absolute', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'topbar_absolute' )

		);



	$options['enable_social_link_top'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Social Links Topbar', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'enable_social_link_top' )

		);



	$options['enable_content_right_top'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Content Right Top', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'enable_content_right_top' )

		);



	$options['top_background_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Topbar Background', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_get_opt( 'top_background_color' )

		);



	$options['topbar_textcolor'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Topbar Text Color', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_get_opt( 'topbar_textcolor' )

		);



	$options['top_content'] = array(

		'type'    => 'textarea',

		'title'   => esc_html__( 'Content Left Topbar', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_get_opt( 'top_content' )

		);



	$options['show_button_topbar'] = array(

		'type'		=> 'power',

		'title'		=>	esc_html__('Show Button Topbar', 'consuloan'),

		'section'	=>	'header',

		'default'	=>	themesflat_customize_default( 'show_button_topbar' ),

		'children' => array('button_topbar')

	);



	$options['button_topbar'] = array(

		'type'    => 'textarea',

		'title'   => esc_html__( 'Button Topbar', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_get_opt( 'button_topbar' )

		);



	$options['topbar_searchbox'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Show Search Topbar', 'consuloan' ),

		'default' => themesflat_get_opt('topbar_searchbox')

		);



	$options['show_addtocard_topbar'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Show Add To Cart Topbar', 'consuloan' ),

		'default' => themesflat_get_opt('show_addtocard_topbar')

		);



	$options['header_style_heading'] = array(

		'type'        => 'heading',

		'section'     => 'header',

		'title'       => esc_html__( 'Custom Header', 'consuloan' ),

		'description' => esc_html__( 'Change the header style, toggle sticky header feature and turn on/off extra menu icons.', 'consuloan' )

		);



	$options['enable_custom_header_style'] = array(

		'type'    => 'power',

		'title'   => 'Enable Custom Styles',

		'title'   => esc_html__( 'Enable Custom Header', 'consuloan' ),

		'section' => 'header',

		'children' => array('header_sticky','header_searchbox','header_show_offcanvas','header_image','header_content','header_style','logo_controls','show_button_menu','button_menu','show_addtocard_header','header_absolute','header_button_text','show_header_button'),

		'default' => false

		);



	$options['header_style'] = array(

		'type'    => 'radio-images',

		'title'   => esc_html__( 'Header Style', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default('header_style'),

		'choices' => array (

                'header-style1' => array (

                    'tooltip'   => esc_html( 'Header Style 1','consuloan' ),

                    'src'       => THEMESFLAT_LINK . 'images/controls/header1.jpg'

                ) ,

                'header-style2'=>  array (

                    'tooltip'   => esc_html( 'Header Style 2','consuloan' ),

                    'src'       => THEMESFLAT_LINK . 'images/controls/header2.jpg'

                ) ,

                'header-style3'=>  array (

                    'tooltip'   => esc_html( 'Header Style 3','consuloan' ),

                    'src'       => THEMESFLAT_LINK . 'images/controls/header3.jpg'

                ) ,

                'header-style4'=>  array (

                    'tooltip'   => esc_html( 'Header Style 4','consuloan' ),

                    'src'       => THEMESFLAT_LINK . 'images/controls/header4.jpg'

                ) ,

                'header-style5'=>  array (

                    'tooltip'   => esc_html( 'Header Style 5','consuloan' ),

                    'src'       => THEMESFLAT_LINK . 'images/controls/header5.jpg'

                ) ,

            )

		);



	$options['header_absolute'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Enable Header Absolute', 'consuloan' ),

		'default' => themesflat_customize_default( 'header_absolute' )

		);



	$options['header_content'] = array(

		'type'    => 'textarea',

		'title'   => esc_html__( 'Header Content', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_get_opt( 'header_content' )

		);



	$options['show_header_button'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Show Header Button', 'consuloan' ),

		'default' => themesflat_customize_default('show_header_button'),

		'children' => array('header_button_text')

		);



	$options['header_button_text'] = array(

		'type'    => 'textarea',

		'title'   => esc_html__( 'Header Button Text', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_get_opt( 'header_button_text' )

		);



	$options['logo_controls'] = array(

		'type' => 'box-controls',

		'title'   => esc_html__( 'Logo Box Controls (px)', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default('logo_controls')

		);	



	$options['header_sticky'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Enable Sticky Header', 'consuloan' )

		);



	$options['header_searchbox'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Show Search Menu Header', 'consuloan' ),

		'default' => themesflat_get_opt('header_searchbox')

		);



	$options['show_addtocard_header'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Show Add To Cart Menu Header', 'consuloan' ),

		'default' => themesflat_get_opt('show_addtocard_header')

		);



	$options['show_button_menu'] = array(

		'type'		=> 'power',

		'title'		=>	esc_html__('Show Button Menu', 'consuloan'),

		'section'	=>	'header',

		'default'	=>	themesflat_customize_default( 'show_button_menu' ),

		'children' => array('button_menu')

	);



	$options['button_menu'] = array(

		'type'    => 'textarea',

		'title'   => esc_html__( 'Button Menu Text', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_get_opt( 'button_menu' )

		);



	$options['navigator_heading'] = array(

		'type'        => 'heading',

		'section'     => 'header',

		'title'       => esc_html__( 'Navigator', 'consuloan' ),

		'description' => esc_html__( 'Just select your menu that you wish assign it to the location on the theme.', 'consuloan' )

		);



	$options['enable_custom_navigator'] = array(

		'type'    => 'power',

		'section' => 'header',

		'title'   => esc_html__( 'Enable Custom Navigator', 'consuloan' ),

		'children' => array('mainnav_color','mainnav_backgroundcolor','menu_location_primary','mainnav_hover_background','mainnav_hover_color'),

		'default' => false

		);



	$options['mainnav_backgroundcolor'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Mainnav Background', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'mainnav_backgroundcolor' )

		);



	$options['mainnav_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Mainnav Color', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'mainnav_color' )

		);



	$options['mainnav_hover_background'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Mainnav Hover Background', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'mainnav_hover_background' )

		);



	$options['mainnav_hover_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Mainnav a:hover color', 'consuloan' ),

		'section' => 'header',

		'default' => themesflat_customize_default( 'mainnav_hover_color' )

		);



	// Navigator

	$menus     = wp_get_nav_menus();



	if ( $menus ) {

		$choices = array( 0 => esc_html__( '-- Select --', 'consuloan' ) );

		foreach ( $menus as $menu ) {

			$choices[ $menu->term_id ] = wp_html_excerpt( $menu->name, 40, '&hellip;' );

		}



		$options["menu_location_primary"] = array(

				'title'   => esc_html__('Choose menu for page','consuloan'),

				'section' => 'header',

				'type' 	  => 'select',

				'choices' => $choices,

				'default' => themesflat_customize_default('menu_location_primary')

			);

	}



	/**

	 * Footer

	 */	

	$options['footer_widgets_heading'] = array(

		'type'        => 'heading',

		'section'     => 'footer',

		'title'       => esc_html__( 'Footer Widgets', 'consuloan' ),

		'description' => esc_html__( 'This section allow to change the layout and styles of footer widgets to match as you need.', 'consuloan' )

		);



	$options['enable_custom_footer_widgets'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Footer Widgets', 'consuloan' ),

		'section' => 'footer',

		'children'=> array('footer_background_color','footer_text_color','footer_widget_areas','footer1','footer2','footer3','footer4','footer_controls','footer_background_image'),

		'default' => false

		);

	

	$options['footer_widget_areas'] = array(

		'type'    => 'select',

		'title'   => esc_html__( 'Footer Widget Layout', 'consuloan' ),

		'section' => 'footer',

		'choices'   => array(                

                0    => esc_html( 'None', 'consuloan' ),

                1     => esc_html( '1 Columns', 'consuloan' ),

                2     => esc_html( '2 Columns', 'consuloan' ),

                3     => esc_html( '3 Columns', 'consuloan' ),

                4     => esc_html( '4 Columns', 'consuloan' ),                

                5     => esc_html( '4 Columns Equals', 'consuloan' ),                

            ),

		'default' => themesflat_customize_default('footer_widget_areas')

		);



	$options['footer1'] = array(

		'type'    => 'dropdown-sidebar',

		'title'   => esc_html__( 'Footer Widget Area 1', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_customize_default('footer1')

		);



	$options['footer2'] = array(

		'type'    => 'dropdown-sidebar',

		'title'   => esc_html__( 'Footer Widget Area 2', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_customize_default('footer2')

		);



	$options['footer3'] = array(

		'type'    => 'dropdown-sidebar',

		'title'   => esc_html__( 'Footer Widget Area 3', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_customize_default('footer3')

		);



	$options['footer4'] = array(

		'type'    => 'dropdown-sidebar',

		'title'   => esc_html__( 'Footer Widget Area 4', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_customize_default('footer4')

		);



	$options['footer_controls'] = array(

		'type' => 'box-controls',

		'title'   => esc_html__( 'Footer Controls', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_customize_default('footer_controls')

		);



	$options['footer_background_image'] = array(

		'type' => 'single-image-control',

		'title'   => esc_html__( 'Footer Background Image', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_customize_default('footer_background_image')

		);



	$options['footer_background_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Footer Color Background/Overlay', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_get_opt( 'footer_background_color' )

		);



	$options['footer_text_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Footer Top Text Color', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_get_opt( 'footer_text_color' )

		);

	

	$options['footer_heading'] = array(

		'type'        => 'heading',

		'class'       => 'no-border',

		'section'     => 'footer',

		'title'       => esc_html__( 'Custom Footer', 'consuloan' ),

		'description' => esc_html__( 'You can change the copyright text, show/hide the social icons on the footer.', 'consuloan' )

		);



	$options['enable_custom_footer'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Footer Content', 'consuloan' ),

		'section' => 'footer',

		'children'=>array('footer_copyright','bottom_text_color','bottom_background_color','enable_footer_social','show_bottom'),

		'default' => false

		);



	$options['footer_copyright'] = array(

		'type'    => 'textarea',

		'title'   => esc_html__( 'Copyright', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_customize_default( 'footer_copyright' )

		);



	$options['show_bottom'] = array(

		'type'    => 'power',

		'section' => 'footer',

		'title'   => esc_html__( 'Show Bottom', 'consuloan' ),

		'default' => themesflat_get_opt('show_bottom')

		);



	$options['bottom_background_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Bottom Background Color', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_get_opt( 'bottom_background_color' )

		);



	$options['bottom_text_color'] = array(

		'type'    => 'color-picker',

		'title'   => esc_html__( 'Bottom Text Color', 'consuloan' ),

		'section' => 'footer',

		'default' => themesflat_get_opt( 'bottom_text_color' )

		);



	/**

	 * Portfolio

	 */

	$options['portfolio_list_heading'] = array(

		'type'        => 'heading',

		'class'       => 'no-border',

		'section'     => 'portfolio',

		'title'       => esc_html__( 'Portfolio', 'consuloan' ),

		'description' => esc_html__( 'Change options in this section to custom style for portfolio listing page.', 'consuloan' )

		);



	$options['enable_custom_portfolio'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Portfolio layout', 'consuloan' ),

		'section' => 'portfolio',

		'children'=> array('portfolio_grid_columns','show_filter_portfolio','portfolio_archive_pagination_style','portfolio_post_perpage','portfolio_order_by','portfolio_order_direction','portfolio_pagination_style','portfolio_style','portfolio_exclude','portfolio_category_order','show_pagination_portfolio','show_date_portfolio','show_readmore_portfolio','show_content_portfolio','portfolio_content_length'),		

		'default' => false

		);





	$options['portfolio_grid_columns'] = array(

		'type'    => 'select',

		'section' => 'portfolio',

		'title'   => esc_html__( 'Grid Columns', 'consuloan' ),

		'default' => themesflat_get_opt('portfolio_grid_columns'),

		'choices'   => array(

			'one-half'     => esc_html( '2 Columns', 'consuloan' ),

			'one-three'     => esc_html( '3 Columns', 'consuloan' ),

			'one-four'     => esc_html( '4 Columns', 'consuloan' ),

			'one-five'     => esc_html( '5 Columns', 'consuloan' )

			)

		);



	$options['show_filter_portfolio'] = array(

		'type'    => 'power',

		'section' => 'portfolio',

		'title'   => esc_html__( 'Show Filter', 'consuloan' ),

		'default' => themesflat_get_opt('show_filter_portfolio')

		);



	$options['show_date_portfolio'] = array(

		'type'    => 'power',

		'section' => 'portfolio',

		'title'   => esc_html__( 'Portfolio Show Date', 'consuloan' ),

		'default' => themesflat_customize_default('show_date_portfolio')

		);



	$options['show_content_portfolio'] = array(

		'type'    => 'power',

		'section' => 'portfolio',

		'title'   => esc_html__( 'Portfolio Show Content', 'consuloan' ),

		'default' => themesflat_customize_default('show_content_portfolio')

		);



	$options['portfolio_content_length'] = array(

		'type'     => 'text',

		'section'  => 'portfolio',

		'title'    => esc_html__( 'Portfolio Content Length', 'consuloan' ),

		'default'  => themesflat_customize_default( 'portfolio_content_length' )

	);



	$options['show_readmore_portfolio'] = array(

		'type'    => 'power',

		'section' => 'portfolio',

		'title'   => esc_html__( 'Portfolio Show Read More', 'consuloan' ),

		'default' => themesflat_customize_default('show_readmore_portfolio')

		);	



	$options['portfolio_category_order'] = array(

		'type'     => 'text',

		'section'  => 'portfolio',

		'title'    => esc_html__( 'Portfolio categories order.EX:travel,aviation,business. Leave empty for auto load', 'consuloan' ),

		'default'  => themesflat_get_opt( 'portfolio_category_order' )

	);



	$options['portfolio_style'] = array(

		'type'    => 'select',

		'title'   => esc_html__( 'Portfolio Style', 'consuloan' ),

		'section' => 'portfolio',

		'default' => 'grid',

		'choices'   => array(

			'grid'          	=> esc_html( 'Grid', 'consuloan' ),

			'grid2'          	=> esc_html( 'Grid 1', 'consuloan' ),

			'grid3'          	=> esc_html( 'Grid 2', 'consuloan' ),

			'grid-no-padding'	=>   esc_html( 'Grid No Padding', 'consuloan' ) ,

			'list-small'          	=> esc_html( 'List Small', 'consuloan' ),

			)

		);



	$options['portfolio_exclude'] = array(

		'type'     => 'text',

		'section'  => 'portfolio',

		'title'    => esc_html__( 'Not Show these portfolios by IDs EX:1,2,3', 'consuloan' ),

		'default'  => themesflat_get_opt( 'portfolio_exclude' )

		);





	$options['portfolio_post_perpage'] = array(

		'type'     => 'spinner',

		'section'  => 'portfolio',

		'title'    => esc_html__( 'Posts Per Page', 'consuloan' ),

		'default'  => themesflat_get_opt( 'portfolio_post_perpage' )

		);



	$options['portfolio_archive_pagination_style'] = array(

		'type'    => 'select',

		'title'   => esc_html__( 'Pagination Style', 'consuloan' ),

		'section' => 'portfolio',

		'default' => 'pager-numeric',

		'choices' => array(			

			'pager-numeric' =>  esc_html__( 'Numeric', 'consuloan' ),

			'loadmore' => esc_html__( 'Load More', 'consuloan' )

			)

		);

	

	$options['portfolio_order_by'] = array(

		'type'     => 'select',

		'section'  => 'portfolio',

		'title'    => esc_html__( 'Order By', 'consuloan' ),

		'default'  => 'date',

		'choices'  => array(

			'date'          => esc_html__( 'Date', 'consuloan' ),

			'ID'            => esc_html__( 'ID', 'consuloan' ),

			'author'        => esc_html__( 'Author', 'consuloan' ),

			'title'         => esc_html__( 'Title', 'consuloan' ),

			'modified'      => esc_html__( 'Modified', 'consuloan' ),

			'rand'          => esc_html__( 'Random', 'consuloan' ),

			'comment_count' => esc_html__( 'Comment count', 'consuloan' ),

			'menu_order'    => esc_html__( 'Menu order', 'consuloan' ),

			)

		);



	$options['portfolio_order_direction'] = array(

		'type'     => 'select',

		'section'  => 'portfolio',

		'title'    => esc_html__( 'Order Direction', 'consuloan' ),

		'default'  => 'DESC',

		'choices'  => array(

			'ASC'  => esc_html__( 'Ascending', 'consuloan' ),

			'DESC' => esc_html__( 'Descending', 'consuloan' )

			)

		);



	/**

	 * Service

	 */

	$options['service_list_heading'] = array(

		'type'        => 'heading',

		'class'       => 'no-border',

		'section'     => 'service',

		'title'       => esc_html__( 'Service', 'consuloan' ),

		'description' => esc_html__( 'Change options in this section to custom style for service listing page.', 'consuloan' )

		);



	$options['enable_custom_service'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Service layout', 'consuloan' ),

		'section' => 'service',

		'children'=> array('services_grid_columns','services_post_perpage'),		

		'default' => false

		);



	$options['services_grid_columns'] = array(

		'type'    => 'select',

		'section' => 'service',

		'title'   => esc_html__( 'Grid Columns', 'consuloan' ),

		'default' => themesflat_customize_default('services_grid_columns'),

		'choices'   => array(

			'one-three'     => esc_html( '3 Columns', 'consuloan' ),

			'one-four'     => esc_html( '4 Columns', 'consuloan' )

			)

		);



	$options['services_post_perpage'] = array(

		'type'     => 'spinner',

		'section'  => 'service',

		'title'    => esc_html__( 'Posts Per Page', 'consuloan' ),

		'default'  => themesflat_customize_default( 'services_post_perpage' )

		);



	$options['services_content_length'] = array(

		'type'     => 'text',

		'section'  => 'portfolio',

		'title'    => esc_html__( 'Service Content Length', 'consuloan' ),

		'default'  => themesflat_customize_default( 'services_content_length' )

	);



	/**

	 * Blog Options

	 */

	$options['blog_list_heading'] = array(

		'type'        => 'heading',

		'class'       => 'no-border',

		'section'     => 'blog',

		'title'       => esc_html__( 'Blog', 'consuloan' ),

		'description' => esc_html__( 'All options in this section will be used to make style for blog page.', 'consuloan' )

		);



	$options['enable_custom_blog'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Enable Custom Blog layout', 'consuloan' ),

		'section' => 'blog',

		'children'=> array('blog_grid_columns','blog_archive_post_excepts','blog_archive_post_excepts_length','blog_archive_show_post_meta','blog_archive_readmore','blog_archive_readmore_text','blog_posts_per_page','blog_order_by','blog_order_direction','blog_archive_pagination_style','blog_show_content', 'blog_archive_layout','blog_archive_exclude','show_post_meta_date','show_post_meta_author','hide_content'),		

		'default' => false

		);



	$options['blog_grid_columns'] = array(

		'type'    => 'select',

		'section' => 'blog',

		'title'   => esc_html__( 'Grid Columns', 'consuloan' ),

		'default' => themesflat_customize_default('blog_grid_columns'),

		'choices' => array(

			3 => esc_html__( '3 Columns', 'consuloan' ),

			2 => esc_html__( '2 Columns', 'consuloan' ),

			4 => esc_html__( '4 Columns', 'consuloan' )

			)

		);	



	$options['blog_archive_layout'] = array(

		'type'    => 'select',

		'title'   => esc_html__( 'Blog Layout', 'consuloan' ),

		'section' => 'blog',

		'default' => themesflat_customize_default('blog_archive_layout'),

		'choices' => array(			

            'blog-list-small'=>  esc_html( 'Blog List Small','consuloan' ),

            'blog-list' =>  esc_html( 'Blog List','consuloan' ),

            'blog-list-full-width' =>  esc_html( 'Blog List Full Width','consuloan' ),

            'blog-grid'=>   esc_html( 'Blog Grid','consuloan' ),

            'blog-masonry'=>   esc_html( 'Blog Masonry','consuloan' )

			)

		);



	$options['blog_archive_post_excepts_length'] = array(

		'type'    => 'text',

		'title'   => esc_html__( 'Post Excepts Length', 'consuloan' ),

		'section' => 'blog',

		'default' => themesflat_customize_default('blog_archive_post_excepts_length')

		);	



	$options['blog_archive_readmore'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Show Read More', 'consuloan' ),

		'section' => 'blog',

		'default' => true,

		'children' => array ('blog_archive_readmore_text')

		);	



	$options['blog_archive_readmore_text'] = array(

		'type'    => 'text',

		'title'   => esc_html__( 'Read More Text', 'consuloan' ),

		'section' => 'blog',

		'default' => themesflat_customize_default('blog_archive_readmore_text')

		);



	$options['hide_content'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Hide Content', 'consuloan' ),

		'section' => 'blog',

		'default' => themesflat_customize_default('hide_content')

		);



	$options['show_post_meta_date'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Show Post Meta Date', 'consuloan' ),

		'section' => 'blog',

		'default' => themesflat_customize_default('show_post_meta_date')

		);



	$options['show_post_meta_author'] = array(

		'type'    => 'power',

		'title'   => esc_html__( 'Show Post Meta Author', 'consuloan' ),

		'section' => 'blog',

		'default' => themesflat_customize_default('show_post_meta_author')

		);



	$options['blog_archive_exclude'] = array(

		'type'    => 'text',

		'title'   => esc_html__( 'Post IDs will be inorged. Ex: 1,2,3', 'consuloan' ),

		'section' => 'blog',

		'default' =>themesflat_customize_default('blog_archive_exclude')

		);



	$options['blog_posts_per_page'] = array(

		'type'     => 'spinner',

		'section'  => 'blog',

		'title'    => esc_html__( 'Posts Per Page', 'consuloan' ),

		'default'  => get_option( 'posts_per_page' )

		);



	$options['blog_archive_pagination_style'] = array(

		'type'    => 'select',

		'title'   => esc_html__( 'Pagination Style', 'consuloan' ),

		'section' => 'blog',

		'default' => themesflat_customize_default('blog_archive_pagination_style'),

		'choices' => array(

			'pager' =>  esc_html__( 'Pager', 'consuloan' ),

			'numeric' =>  esc_html__( 'Numeric', 'consuloan' ),

			'pager-numeric' =>  esc_html__( 'Pager & Numeric', 'consuloan' ),

			'loadmore' =>  esc_html__( 'Load More', 'consuloan' )

			)

		);

	

	themesflat_prepare_options($options);

	

	return $options;

}



function themesflat_get_children($ar){

	if (isset($ar['children'])){

	 return $ar['children'];

	}

}

function themesflat_prepare_options($options) {

	$flat_data = get_option('flatopts');

	$flatopts = array();

	if(!is_array($flat_data)) $flat_data = array();

	$children = array_map('themesflat_get_children', $options);

	$children = array_filter($children);

	foreach ($children as $key => $value) {

		if (is_array($value)) {

			foreach ($value as $_key => $_value) {

				$flatopts[$_value] = $key;

			}

		}

		else {

			$flatopts[$value] = $key;

		}

	}

	$flat_data = array_merge($flat_data,$flatopts);

	update_option('flatopts',$flat_data);

}