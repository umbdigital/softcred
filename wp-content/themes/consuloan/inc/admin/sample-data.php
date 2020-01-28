<?php
/**
 * Demo Import Data
 */

function themesflat_import_files() {
    return array(
        array(
            'import_file_name'           => 'Import Demo Data',
            'import_file_url'            => THEMESFLAT_LINK.'sample_data/content.xml',
            'import_widget_file_url'     => THEMESFLAT_LINK.'sample_data/widgets.wie',
            'import_customizer_file_url' => THEMESFLAT_LINK.'sample_data/options.dat',
            'import_preview_image_url'   => THEMESFLAT_LINK.'screenshot.png',
            'import_notice'              => esc_html__( 'After you import this demo, you will have to setup the MailChimp form.', 'consuloan' ),
            'preview_url'                => 'http://corpthemes.com/wordpress/consuloan/',
        ),
    );
}
add_filter( 'pt-ocdi/import_files', 'themesflat_import_files' );

function themesflat_after_import_setup() {
    $main_menu = get_term_by( 'name', 'Main', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $main_menu->term_id,
            'footer' => $footer_menu->term_id,
        )
    );

    $front_page_id = get_page_by_title( 'HOME' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID ); 
    wp_delete_post(1);   
}
add_action( 'pt-ocdi/after_import', 'themesflat_after_import_setup' );

function themesflat_import_revsliders() {
    $file1 = THEMESFLAT_DIR . 'sample_data/home7.zip';
    if (class_exists('RevSlider')) {
        ob_start();
        $rev = new RevSlider();
        $response = $rev->importSliderFromPost(false, false, $file1);
        ob_end_clean();
        return 'Revolution Slider imported';
    }
}
add_action( 'pt-ocdi/after_import', 'themesflat_import_revsliders' );

