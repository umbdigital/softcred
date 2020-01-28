<?php
/**
 * Prevent direct access to this file
 */

add_action( 'wp_enqueue_scripts', 'themesflat_portfolios_scripts' );

/**
  * Load the scripts
*/
function themesflat_portfolios_scripts() {  
    wp_enqueue_script( 'themesflat-isotope', plugin_dir_url( __FILE__ ) . '/lib/js/isotope.min.js', array('jquery'), true );
    wp_enqueue_script( 'imagesloaded');
}

add_action('init', 'themesflat_register_portfolio_post_type');


/**
  * Register Portfolios post type
*/
function themesflat_register_portfolio_post_type() {

    $labels = array(
        'name'                  => esc_html__( 'Portfolios', 'consuloan' ),
        'singular_name'         => esc_html__( 'Portfolios', 'consuloan' ),
        'rewrite'               => array( 'slug' => esc_html__( 'portfolios' ) ),
        'menu_name'             => esc_html__( 'Portfolios', 'consuloan' ),
        'add_new'               => esc_html__( 'New Portfolios', 'consuloan' ),
        'add_new_item'          => esc_html__( 'Add New Portfolios', 'consuloan' ),
        'new_item'              => esc_html__( 'New Portfolios Item', 'consuloan' ),
        'edit_item'             => esc_html__( 'Edit Portfolios Item', 'consuloan' ),
        'view_item'             => esc_html__( 'View Portfolios', 'consuloan' ),
        'all_items'             => esc_html__( 'All Portfolios', 'consuloan' ),
        'search_items'          => esc_html__( 'Search Portfolios', 'consuloan' ),
        'not_found'             => esc_html__( 'No Portfolios Items Found', 'consuloan' ),
        'not_found_in_trash'    => esc_html__( 'No Portfolios Items Found In Trash', 'consuloan' ),
        'parent_item_colon'     => esc_html__( 'Parent Portfolios:', 'consuloan' ),
        'not_found'             => esc_html__( 'No portfolios found', 'consuloan' ),
        'not_found_in_trash'    => esc_html__( 'No portfolios found in Trash', 'consuloan' )

    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'public'      => true,
        'has_archive' => true,
        'rewrite'     => array('slug' => get_theme_mod('portfolios_slug','portfolios')),
        'menu_icon'   => 'dashicons-portfolio',
    );
    register_post_type( 'portfolios', $args );

    $labels = array(
        'name'                  => esc_html__( 'Testimonial', 'consuloan' ),
        'singular_name'         => esc_html__( 'Testimonial', 'consuloan' ),
        'rewrite'               => array( 'slug' => esc_html__( 'testimonial' ) ),
        'menu_name'             => esc_html__( 'Testimonial', 'consuloan' ),
        'add_new'               => esc_html__( 'New Testimonial', 'consuloan' ),
        'add_new_item'          => esc_html__( 'Add New Testimonial', 'consuloan' ),
        'new_item'              => esc_html__( 'New Testimonial Item', 'consuloan' ),
        'edit_item'             => esc_html__( 'Edit Testimonial Item', 'consuloan' ),
        'view_item'             => esc_html__( 'View Testimonial', 'consuloan' ),
        'all_items'             => esc_html__( 'All Testimonial', 'consuloan' ),
        'search_items'          => esc_html__( 'Search Testimonial', 'consuloan' ),
        'not_found'             => esc_html__( 'No Testimonial Items Found', 'consuloan' ),
        'not_found_in_trash'    => esc_html__( 'No Testimonial Items Found In Trash', 'consuloan' ),
        'parent_item_colon'     => esc_html__( 'Parent Testimonial:', 'consuloan' ),
        'not_found'             => esc_html__( 'No Testimonial found', 'consuloan' ),
        'not_found_in_trash'    => esc_html__( 'No Testimonial found in Trash', 'consuloan' )
    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail' ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-testimonial',
    );
    register_post_type( 'testimonial', $args );

    $labels = array(
        'name'                  => esc_html__( 'Services', 'consuloan' ),
        'singular_name'         => esc_html__( 'Services', 'consuloan' ),
        'rewrite'               => array( 'slug' => esc_html__( 'services' ) ),
        'menu_name'             => esc_html__( 'Services', 'consuloan' ),
        'add_new'               => esc_html__( 'New Services', 'consuloan' ),
        'add_new_item'          => esc_html__( 'Add New Services', 'consuloan' ),
        'new_item'              => esc_html__( 'New Services Item', 'consuloan' ),
        'edit_item'             => esc_html__( 'Edit Services Item', 'consuloan' ),
        'view_item'             => esc_html__( 'View Services', 'consuloan' ),
        'all_items'             => esc_html__( 'All Services', 'consuloan' ),
        'search_items'          => esc_html__( 'Search Services', 'consuloan' ),
        'not_found'             => esc_html__( 'No Services Items Found', 'consuloan' ),
        'not_found_in_trash'    => esc_html__( 'No Services Items Found In Trash', 'consuloan' ),
        'parent_item_colon'     => esc_html__( 'Parent Services:', 'consuloan' ),
        'not_found'             => esc_html__( 'No Services found', 'consuloan' ),
        'not_found_in_trash'    => esc_html__( 'No Services found in Trash', 'consuloan' )

    );
    $args = array(
        'labels'      => $labels,
        'supports'    => array( 'title', 'editor', 'thumbnail','post-formats' ),
        'public'      => true,
        'has_archive' => false,
        'rewrite'      => array('slug' => get_theme_mod('services_slug','services')),
        'menu_icon'   => 'dashicons-format-gallery',
    );
    register_post_type( 'services', $args );

    flush_rewrite_rules();
}

add_filter( 'post_updated_messages', 'themesflat_portfolios_updated_messages' );


/**
  * Portfolios update messages.
*/
function themesflat_portfolios_updated_messages ( $messages ) {
    Global $post, $post_ID;
    $messages[esc_html__( 'portfolios' )] = array(
        0  => '',
        1  => sprintf( esc_html__( 'Portfolios Updated. <a href="%s">View portfolios</a>', 'consuloan' ), esc_url( get_permalink( $post_ID ) ) ),
        2  => esc_html__( 'Custom Field Updated.', 'consuloan' ),
        3  => esc_html__( 'Custom Field Deleted.', 'consuloan' ),
        4  => esc_html__( 'Portfolios Updated.', 'consuloan' ),
        5  => isset( $_GET['revision']) ? sprintf( esc_html__( 'Portfolios Restored To Revision From %s', 'consuloan' ), wp_post_revision_title((int)$_GET['revision'], false)) : false,
        6  => sprintf( esc_html__( 'Portfolios Published. <a href="%s">View Portfolios</a>', 'consuloan' ), esc_url( get_permalink( $post_ID ) ) ),
        7  => esc_html__( 'Portfolios Saved.', 'consuloan' ),
        8  => sprintf( esc_html__('Portfolios Submitted. <a target="_blank" href="%s">Preview Portfolios</a>', 'consuloan' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
        9  => sprintf( esc_html__( 'Portfolios Scheduled For: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Portfolios</a>', 'consuloan' ),date_i18n( esc_html__( 'M j, Y @ G:i', 'consuloan' ), strtotime( $post->post_date ) ), esc_url( get_permalink( $post_ID ) ) ),
        10 => sprintf( esc_html__( 'Portfolios Draft Updated. <a target="_blank" href="%s">Preview Portfolios</a>', 'consuloan' ), esc_url( add_query_arg( 'preview', 'true', get_permalink( $post_ID ) ) ) ),
    );
    return $messages;
}

add_action( 'init', 'themesflat_register_portfolios_taxonomy' );

/**
  * Register portfolios taxonomy
*/
function themesflat_register_portfolios_taxonomy() {
    $labels = array(
        'name'                       => esc_html__( 'Categories', 'consuloan' ),
        'singular_name'              => esc_html__( 'Categories', 'consuloan' ),
        'search_items'               => esc_html__( 'Search Categories', 'consuloan' ),
        'menu_name'                  => esc_html__( 'Categories', 'consuloan' ),
        'all_items'                  => esc_html__( 'All Categories', 'consuloan' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'consuloan' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'consuloan' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'consuloan' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'consuloan' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'consuloan' ),
        'update_item'                => esc_html__( 'Update Categories', 'consuloan' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'consuloan' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'consuloan' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
        'menu_name'                  => esc_html__( 'Categories' ),
    );
    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'portfolios_category', 'portfolios', $args );

    $labels = array(
        'name'                       => esc_html__( 'Categories', 'consuloan' ),
        'singular_name'              => esc_html__( 'Categories', 'consuloan' ),
        'search_items'               => esc_html__( 'Search Categories', 'consuloan' ),
        'menu_name'                  => esc_html__( 'Categories', 'consuloan' ),
        'all_items'                  => esc_html__( 'All Categories', 'consuloan' ),
        'parent_item'                => esc_html__( 'Parent Categories', 'consuloan' ),
        'parent_item_colon'          => esc_html__( 'Parent Categories:', 'consuloan' ),
        'new_item_name'              => esc_html__( 'New Categories Name', 'consuloan' ),
        'add_new_item'               => esc_html__( 'Add New Categories', 'consuloan' ),
        'edit_item'                  => esc_html__( 'Edit Categories', 'consuloan' ),
        'update_item'                => esc_html__( 'Update Categories', 'consuloan' ),
        'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'consuloan' ),
        'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'consuloan' ),
        'not_found'                  => esc_html__( 'No Categories found.' ),
        'menu_name'                  => esc_html__( 'Categories' ),
    );

    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );

    register_taxonomy( 'services_category', 'services', $args );
    flush_rewrite_rules();
}

add_action( 'init', 'themesflat_register_portfolios_tag' );

/**
 * Register tag taxonomy
 */
function themesflat_register_portfolios_tag() {
    $labels = array(
        'name'                       => esc_html__( 'Portfolio Tags', 'consuloan' ),
        'singular_name'              => esc_html__( 'Portfolio Tags', 'consuloan' ),
        'search_items'               => esc_html__( 'Search Tags', 'consuloan' ),        
        'all_items'                  => esc_html__( 'All Tags', 'consuloan' ),
        'new_item_name'              => esc_html__( 'Add New Tag', 'consuloan' ),
        'add_new_item'               => esc_html__( 'New Tag Name', 'consuloan' ),
        'edit_item'                  => esc_html__( 'Edit Tag', 'consuloan' ),
        'update_item'                => esc_html__( 'Update Tag', 'consuloan' ),
        'menu_name'                  => esc_html__( 'Tags' ),
    );
    $args = array(
        'labels'       => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'portfolios_tag', 'portfolios', $args );
    flush_rewrite_rules();
}