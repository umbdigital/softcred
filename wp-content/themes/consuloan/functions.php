<?php
/**
 * themesflat functions and definitions
 *
 * @package consuloan
 */
define( 'THEMESFLAT_DIR', trailingslashit( get_template_directory() )) ;
define( 'THEMESFLAT_LINK', trailingslashit( get_template_directory_uri() ) );
define( 'THEMESFLAT_ICON', THEMESFLAT_LINK.'images/controls/logo.png' );
define( 'PROTOCOL' , (is_ssl()) ? 'https' : 'http' );
if ( ! function_exists( 'themesflat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function themesflat_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on burger, use a find and replace
	 * to change 'consuloan' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'consuloan', THEMESFLAT_DIR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );


	// Content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1170; /* pixels */
	}	

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );	
	add_image_size( 'themesflat-recent-news-thumb', 106, 73, true );		
	add_image_size( 'themesflat-portfolio-thumb', 370, 245, true );	
    add_image_size( 'themesflat-blog-full-width', 1170, 676, true );
	add_image_size( 'themesflat-blog', 870, 430, true );	
	add_image_size( 'themesflat-blog-grid', 370, 220, true );
    add_image_size( 'themesflat-blog-grid-masonry', 560, 755, true );
    add_image_size( 'themesflat-blog-grid-image-left', 270, 200, true );	
	add_image_size( 'themesflat-blog-single', 1170, 600, true );	
	add_image_size( 'themesflat-blog-listsmall', 420, 380, true );
    add_image_size( 'themesflat-portfolio-listsmall', 567, 380, true );
    add_image_size( 'themesflat-portfolio-grid', 570, 340, true );	
	add_image_size( 'themesflat-case-single', 570, 570, true );	
	add_image_size( 'themesflat-case-single2', 1170, 600, true );	
	add_image_size( 'themesflat-case', 320, 320, true );	
	add_image_size( 'themesflat-case2', 370, 210, true );	
	add_image_size( 'themesflat-case3', 600, 455, true );
    add_image_size( 'themesflat-case4', 384, 290, true );
    add_image_size( 'themesflat-case5', 270, 270, true );	
	add_image_size( 'themesflat-testimonial', 90, 90, true );	
	add_image_size( 'themesflat-faq', 570, 340, true );	

	//Get thumbnail url
	function themesflat_thumbnail_url($size){
	    global $post;
	    if( $size== '' ) {
	        $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	        return esc_url($url);
	    } else {
	        $url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), $size);
	        return esc_url($url[0]);
	    }
	}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'consuloan' ),
		'footer' => esc_html__( 'Footer Menu', 'consuloan' ),
		'bottom' => esc_html__( 'Bottom Menu', 'consuloan' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'gallery', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	add_theme_support( 'custom-background', $args );
    add_theme_support( 'custom-header', $args );

	// Custom stylesheet to the TinyMCE visual editor
	function themesflat_add_editor_styles() {
	    add_editor_style( 'css/editor-style.css' );
	}
	add_action( 'admin_init', 'themesflat_add_editor_styles' );	

}
endif; // themesflat_setup

add_action( 'after_setup_theme', 'themesflat_setup' );

function themesflat_wpfilesystem() {
	include_once (ABSPATH . '/wp-admin/includes/file.php');
	WP_Filesystem();
}

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function themesflat_widgets_init() {

	register_sidebar( array(
        'name'          => esc_html__( 'Blog Sidebar', 'consuloan' ),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer1.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

	register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar', 'consuloan' ),
        'id'            => 'page-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer1.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Page Sidebar Single', 'consuloan' ),
        'id'            => 'page-sidebar-single',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer1.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    // Languages Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Languages Sidebar', 'consuloan' ),
        'id'            => 'languages-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in Languages Sidebar.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget themesflat-widget-languages %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    //Sidebar Woocommerce
    register_sidebar( array(
        'name'          => esc_html__( 'Woocommerce Sidebar', 'consuloan' ),
        'id'            => 'woo-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Woocommerce Sidebar.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    //Sidebar footer
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 1', 'consuloan' ),
        'id'            => 'footer-1',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer1.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 2', 'consuloan' ),
        'id'            => 'footer-2',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer2.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 3', 'consuloan' ),
        'id'            => 'footer-3',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer3.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 4', 'consuloan' ),
        'id'            => 'footer-4',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer4.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );    

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget 5', 'consuloan' ),
        'id'            => 'footer-5',
        'description'   => esc_html__( 'Add widgets here to appear in your sidebar Footer5.', 'consuloan' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );   
	
	//Register the front page widgets	
	register_widget( 'Themesflat_Flicker' );
	register_widget( 'Themesflat_Recent_Post' );
	register_widget( 'Themesflat_Categories' );
		
}
add_action( 'widgets_init', 'themesflat_widgets_init' );

function themesflat_get_style($style) {
	return str_replace('italic', 'i', $style);
}

function themesflat_fonts_url() {
    $fonts_url = '';
    $body_font_name =  themesflat_get_json('body_font_name');
    $headings_font_name = themesflat_get_json('headings_font_name');
    $menu_font_name = themesflat_get_json('menu_font_name');
    $font_families = array(); 

    if ( '' != $body_font_name ) {
        $font_families[] = $body_font_name['family'].':300,400,500,600,700,900,'.themesflat_get_style($body_font_name['style']);
    } else {
    	$font_families[] = 'Lato:400,400i,700,700i,900';
    }    

    if ( '' != $headings_font_name ) {
        $font_families[] = $headings_font_name['family'].':300,400,500,600,700,900,'.themesflat_get_style($headings_font_name['style']);
    }

     else {
    	$font_families[] = 'Poppins:400,500,600,700';
    }    

    if ( '' != $menu_font_name ) {
        $font_families[] = $menu_font_name['family'].':'.themesflat_get_style($menu_font_name['style']);
    } else {
    	$font_families[] = 'Poppins:400,500,600,700';
    }    
    
    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),        
    );

    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

    return esc_url_raw( $fonts_url );
}

function themesflat_scripts_styles() {
    wp_enqueue_style( 'themesflat-theme-slug-fonts', themesflat_fonts_url(), array(), null );
}

add_action( 'wp_enqueue_scripts', 'themesflat_scripts_styles' );

/**
 * Enqueue scripts and styles.
 */

function themesflat_scripts() {

	// Theme stylesheet.
	wp_enqueue_style( 'themesflat_main', THEMESFLAT_LINK . 'css/main.css' );
	wp_enqueue_style( 'themesflat-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font_awesome', THEMESFLAT_LINK . 'css/font-awesome.css' );
    wp_enqueue_style( 'font-elegant', THEMESFLAT_LINK . 'css/font-elegant.css' );
	wp_enqueue_style( 'ionicons-min', THEMESFLAT_LINK . 'css/ionicons.min.css' );	
    wp_enqueue_style( 'simple-line-icons', THEMESFLAT_LINK. 'css/simple-line-icons.css');
    wp_enqueue_style( 'font-antro', THEMESFLAT_LINK. 'css/font-antro.css');
    wp_enqueue_style( 'themify-icons', THEMESFLAT_LINK . 'css/themify-icons.css' );
    wp_enqueue_style( 'headline', THEMESFLAT_LINK . 'css/headline.css' );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'ie9', THEMESFLAT_LINK . 'css/ie.css');
	wp_style_add_data( 'ie9', 'conditional', 'lte IE 9' ); 
	wp_enqueue_style( 'animate', THEMESFLAT_LINK . 'css/animate.css' );		
	wp_enqueue_style( 'inline-css', THEMESFLAT_LINK . 'css/inline-css.css' );
    wp_enqueue_style( 'layers-css', THEMESFLAT_LINK . 'css/layers.css' ); 
    wp_enqueue_script( 'magnific-popup', THEMESFLAT_LINK . 'js/jquery.magnific-popup.min.js', array(), '1.0.0', true );
	
	// Load the html5 shiv..	
	wp_enqueue_script( 'html5', THEMESFLAT_LINK . 'js/html5shiv.js', array('jquery'), '1.3.0' ,true);	
	wp_enqueue_script( 'respond', THEMESFLAT_LINK . 'js/respond.min.js', array(), '1.3.0',true);
	wp_enqueue_script( 'easing', THEMESFLAT_LINK . 'js/jquery.easing.js', array(),'1.3' ,true);
	wp_enqueue_script( 'waypoints', THEMESFLAT_LINK . 'js/jquery-waypoints.js', array(),'1.3' ,true);
	wp_enqueue_script( 'match', THEMESFLAT_LINK . 'js/matchMedia.js', array(),'1.2',true);
	wp_enqueue_script( 'fitvids', THEMESFLAT_LINK . 'js/jquery.fitvids.js', array(),'1.1',true);
    wp_enqueue_script( 'carousel', THEMESFLAT_LINK . 'js/owl.carousel.js', array(),'1.1',true);
    wp_enqueue_script( 'countdown', THEMESFLAT_LINK . 'js/countdown.js', array(),'1.1',true);
    wp_enqueue_script( 'headline', THEMESFLAT_LINK . 'js/headline.js', array(),'1.1',true);
    wp_enqueue_script( 'flex-slider', THEMESFLAT_LINK . 'js/jquery.flexslider-min.js', array(),'2.6.0',true);
    
    if ( themesflat_get_opt('enable_smooth_scroll') == 1 ) {
       wp_enqueue_script( 'smoothscroll', THEMESFLAT_LINK . 'js/smoothscroll.js', array(),'1.2.1',true);
    }    
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply', array(),'2.0.4',true );
	}

    if ( class_exists( 'woocommerce' ) ) {
        wp_enqueue_style( 'shop-woocommerce-css', THEMESFLAT_LINK . 'css/shop-woocommerce.css' );
        wp_enqueue_script( 'themesflat-woo', THEMESFLAT_LINK . 'js/themesflat-woo.js', array(),'1.1',true);
    }

    wp_enqueue_style( 'responsive', THEMESFLAT_LINK . 'css/responsive.css' );

	// Load the main js    
	wp_enqueue_script( 'themesflat-main', THEMESFLAT_LINK . 'js/main.js', array(),'2.0.4',true);
}

add_action( 'wp_enqueue_scripts', 'themesflat_scripts' );

/**
 * Enqueue Bootstrap
 */
function themesflat_enqueue_bootstrap() {
	wp_enqueue_style( 'bootstrap', THEMESFLAT_LINK . 'css/bootstrap.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'themesflat_enqueue_bootstrap', 9 );

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses themesflat_header_style()
 */

// Customizer additions.
require THEMESFLAT_DIR . 'inc/customizer.php';

// Revo Slider
require THEMESFLAT_DIR . 'inc/revo-slider.php';

// metabox-options
require THEMESFLAT_DIR . 'inc/metabox-options.php';

// Helpers
require THEMESFLAT_DIR . 'inc/helpers.php';

// Struct
require THEMESFLAT_DIR . 'inc/structure.php';

// Breadcrumbs additions.
require THEMESFLAT_DIR . 'inc/breadcrumb.php';

// Pagination additions.
require THEMESFLAT_DIR . 'inc/pagination.php';

// Custom template tags for this theme.
require THEMESFLAT_DIR . 'inc/template-tags.php';

// Style.
require THEMESFLAT_DIR . 'inc/styles.php';

// Required plugins
require_once THEMESFLAT_DIR . 'inc/plugins/class-tgm-plugin-activation.php';

// Plugin Activation
require_once THEMESFLAT_DIR . 'inc/plugins/plugins.php';

// Woocommerce
if (class_exists('Woocommerce')){
    require_once THEMESFLAT_DIR . 'woocommerce/init.php';
}

/**
 * Load the front page widgets.
 */
require THEMESFLAT_DIR . "widgets/themesflat_flickr.php";
require THEMESFLAT_DIR . "widgets/themesflat_recent_post.php";  
require THEMESFLAT_DIR . "widgets/themesflat_categories.php";   
require THEMESFLAT_DIR . "widgets/themesflat_testimonial.php";
require THEMESFLAT_DIR . "widgets/themesflat_contact_us.php";

if (class_exists('Woocommerce')) {
    require THEMESFLAT_DIR . "widgets/themesflat_latest_product.php";
}
require THEMESFLAT_DIR . "inc/js_composer.php";
require THEMESFLAT_DIR . "inc/options/options.php";
require THEMESFLAT_DIR . "inc/options/options-definition.php";
require_once(THEMESFLAT_DIR .'inc/options/controls/social_icons.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/number.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/dropdown-sidebars.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/dropdown-pages.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/box-control.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/typography.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/radio-images.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/check-box.php');
require_once(THEMESFLAT_DIR .'inc/options/controls/color_overlay.php');
require THEMESFLAT_DIR . "inc/admin/sample-data.php";

function themesflat_shortcode_icon_name($prefix,$icon_type) {
    $icon_name = '';
    if ($icon_type != 'none') {
        $icon_name  = $prefix.$icon_type;
        wp_enqueue_style('vc_'.$icon_type);
    }
    return $icon_name;
}

function themesflat_admin_color_picker() {
    wp_enqueue_style( 'wp-color-picker' );        
    wp_enqueue_script( 'wp-color-picker' );   
}

add_action( 'admin_enqueue_scripts', 'themesflat_admin_script_meta_box' );

/**
 * Enqueue script for handling actions with meta boxes
 *
 * @return void
 * @since 1.0
 */
function themesflat_admin_script_meta_box() {
    $screen = get_current_screen(); 
    wp_enqueue_script( 'themesflat-meta-box', THEMESFLAT_LINK . 'js/admin/meta-boxes.js', array('customize-preview'), '1.1' );
}

function themesflat_load_custom_wp_admin_style() {
    wp_enqueue_style( 'themesflat_wp_admin_css' );
    wp_enqueue_script( 'wp-plupload' );
    wp_enqueue_style( 'wp-color-picker' ); 
    wp_enqueue_style( 'plugin-install' ); 
    wp_enqueue_media();
    wp_register_script('themesflat_up_image', THEMESFLAT_LINK .'js/themesflat-upload-image.js', false, '1.0.0');    
    wp_enqueue_script( 'themesflat_up_image' );       
}

add_action( 'admin_enqueue_scripts', 'themesflat_load_custom_wp_admin_style' );

/**
 * Register Backend and Frontend CSS Styles
 */
add_action( 'vc_base_register_front_css', 'themesflat_vc_iconpicker_base_register_css' );
add_action( 'vc_base_register_admin_css', 'themesflat_vc_iconpicker_base_register_css' );
function themesflat_vc_iconpicker_base_register_css(){
    wp_register_style('vc_simpleline', THEMESFLAT_LINK. 'css/simple-line-icons.css');
    wp_register_style('vc_ionicons', THEMESFLAT_LINK. 'css/font-ionicons.css');
    wp_register_style('vc_eleganticons', THEMESFLAT_LINK. 'css/font-elegant.css');
    wp_register_style('vc_themifyicons', THEMESFLAT_LINK. 'css/themify-icons.css');
}

/**
 * Enqueue Backend and Frontend CSS Styles
 */
add_action( 'vc_backend_editor_enqueue_js_css', 'themesflat_vc_iconpicker_editor_jscss' );
add_action( 'vc_frontend_editor_enqueue_js_css', 'themesflat_vc_iconpicker_editor_jscss' );
function themesflat_vc_iconpicker_editor_jscss(){
    wp_enqueue_style( 'vc_simpleline' );
    wp_enqueue_style( 'vc_ionicons' );
    wp_enqueue_style( 'vc_eleganticons' );
    wp_enqueue_style( 'vc_themifyicons' );
}

// Load Customizer Style
function themesflat_load_customizer_style() {   
    wp_register_style( 'themesflat_customizer_css', THEMESFLAT_LINK .'css/admin/customizer.css', false, '1.0.0' );
    wp_enqueue_style( 'themesflat-color-alpha-css', THEMESFLAT_LINK .'css/alpha-color-picker.css', false, '1.0.0' );
    wp_register_style( 'font_awesome', THEMESFLAT_LINK .'css/font-awesome.css', false, '1.0.0' );    
    wp_enqueue_style( 'themesflat_customizer_css' ); 
    wp_enqueue_style( 'font_awesome' );
    wp_enqueue_script('jquery-ui');
    wp_enqueue_script( 'themesflat-color-alpha', THEMESFLAT_LINK . 'js/alpha-color-picker.js', array('wp-color-picker'),'2.1.2',true);
    wp_enqueue_script( 
          'themesflat_choosen',            //Give the script an ID
          THEMESFLAT_LINK .'js/admin/3rd/chosen.jquery.min.js',//Point to file
          array( 'jquery'),    //Define dependencies
          '',                       //Define a version (optional) 
          true                      //Put script in footer?
    );
    wp_enqueue_script( 
          'themesflat_customizer_js',            //Give the script an ID
          THEMESFLAT_LINK .'js/admin/customizer.js',//Point to file
          array( 'jquery','customize-preview' ),    //Define dependencies
          '',                       //Define a version (optional) 
          true                      //Put script in footer?
    );

    wp_enqueue_style( 'themesflat_choosen', THEMESFLAT_LINK . 'css/chosen.css', array(), true ); 
}

add_action( 'admin_enqueue_scripts', 'themesflat_load_customizer_style' );
