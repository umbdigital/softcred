<?php
/**
 * Plugin Name: ThemesFlat By Themesflat.com
 * Plugin URI:  http://themesflat.com/
 * Description: The theme's components
 * Author:      ThemesFlat
 * Version:     1.0.1
 * Author URI: http://themesflat.com/
 */

define( 'THEMESFLAT_VERSION', '1.0.1' );
define( 'THEMESFLAT_PATH', plugin_dir_path( __FILE__ ) );
define( 'THEMESFLAT_URL', plugin_dir_url( __FILE__ ) );

// Portfolio
require_once THEMESFLAT_PATH . '/includes/portfolio/func-setup.php';

// gets the current theme
$theme = wp_get_theme(); 
if ( 'Consuloan' == $theme->name || 'Consuloan' == $theme->parent_theme ) {
	// Shortcodes
	if ( function_exists( 'visual_composer' ) ) {	
		require_once THEMESFLAT_PATH . '/includes/helpers.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/iconbox.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/iconlist.php';	
		require_once THEMESFLAT_PATH . '/includes/shortcodes/testimonial.php';	
		require_once THEMESFLAT_PATH . '/includes/shortcodes/title-section.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/themesflat-extend.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/team-member.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/maps.php';	
		require_once THEMESFLAT_PATH . '/includes/shortcodes/imagebox.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/infomation.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/spacer.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/counter.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/client.php';		
		require_once THEMESFLAT_PATH . '/includes/shortcodes/socials.php';		
		require_once THEMESFLAT_PATH . '/includes/shortcodes/simple-button.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/section-video.php';
		require_once THEMESFLAT_PATH . '/includes/shortcodes/timeline.php';	
		require_once THEMESFLAT_PATH . '/includes/shortcodes/price.php';		
		
	}
}// end if current theme


if ( ! function_exists( 'themesflat_shortcode_register_assets' ) ) {
	add_action( 'init', 'themesflat_shortcode_register_assets' );

	/**
	 * Register all needed scripts & styles for the plugin
	 * 
	 * @return  void
	 */
	function themesflat_shortcode_register_assets() {		
		wp_enqueue_style( 'vc_extend_shortcode', plugins_url('assets/css/shortcodes.css', __FILE__), array() );	
		wp_enqueue_style( 'vc_extend_style', plugins_url('assets/css/shortcodes-3rd.css', __FILE__),array() );
		wp_enqueue_style( 'jquery-fancybox', plugins_url('assets/css/jquery.fancybox.css', __FILE__), array() );
		wp_register_script( 'themesflat-carousel', plugins_url('assets/3rd/owl.carousel.js', __FILE__), array(), '1.0', true );
		wp_register_script( 'themesflat-manific-popup', plugins_url('assets/3rd/jquery.magnific-popup.min.js', __FILE__), array(), '1.0', true );
		wp_register_script( 'themesflat-isotope', plugins_url('assets/3rd/jquery.isotope.min.js', __FILE__), array(), '2.0.1', true );			
		wp_register_script( 'themesflat-counter', plugins_url('assets/3rd/jquery-countTo.js', __FILE__), array(), '1.0', true );
		wp_enqueue_script( 'themesflat-shortcode', plugins_url('assets/js/shortcodes.js', __FILE__), array(), '1.0', true );
		wp_register_script( 'themesflat-google', 'https://maps.googleapis.com/maps/api/js?key='.get_theme_mod('key_google_map_api', 'AIzaSyBtwK1Hd3iMGyF6ffJSRK7I_STNEXxPdcQ').'&region=GB&v=3.7', array(), '1.0', true );
		wp_register_script( 'themesflat-gmap3', plugins_url('assets/3rd/gmap3.min.js', __FILE__), array(), '1.0', true );
		wp_enqueue_script( 'jquery-cookie', plugins_url('assets/3rd/jquery.cookie.js', __FILE__), array(), '1.0', true );		
		wp_register_script( 'themesflat-jquery-fancybox', plugins_url('assets/3rd/jquery.fancybox.js', __FILE__), array(), '2.1.5', true );	
		
	}
}

// Show notice if your plugin is activated but Visual Composer is not
function showVcVersionNotice() {
    $plugin_data = get_plugin_data(__FILE__);
    echo '<div class="error">';
    echo '<p>' . wp_kses( esc_html__( $plugin_data['Name'] . ' - requires <a href="' . esc_url( admin_url( 'plugins.php') ) . '">Visual Composer</a>  plugin to be installed and activated on your site.', 'themesflat' ), array( 'a' => array( 'href' => array() ) ) ) . '</p>';
    echo '</div>';
}

// disable frontend editor
if ( function_exists('vc_disable_frontend') ) vc_disable_frontend();