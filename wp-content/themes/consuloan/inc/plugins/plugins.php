<?php
// Register action to declare required plugins
add_action('tgmpa_register', 'themesflat_recommend_plugin');
function themesflat_recommend_plugin()
{
    
    $plugins = array(
        array(
            'name' => 'ThemesFlat',
            'slug' => 'themesflat',
            'source' => THEMESFLAT_DIR . 'inc/plugins/themesflat.zip',
            'required' => true
        ),
        // 3rdplugin
        array(
            'name'      => 'WPBakery Visual Composer',
            'slug'      => 'js_composer',
            'source'    => esc_url( PROTOCOL . '://corpthemes.com/3rdplugin/js_composer.zip' ),
            'required'  => false
        ),
        array(
            'name' => 'Revslider',
            'slug' => 'revslider',
            'source' => esc_url( PROTOCOL . '://corpthemes.com/3rdplugin/revslider.zip' ),
            'required' => false
        ),      
        
        array(
            'name' => 'Contact Form 7',
            'slug' => 'contact-form-7',
            'required' => false
        ),
        
        array(
            'name' => 'Mailchimp',
            'slug' => 'mailchimp-for-wp',
            'required' => false
        ),
        
        array(
            'name' => 'Woocommerce',
            'slug' => 'woocommerce',
            'required' => false
        ),

        array(
          'name'            => esc_html__( 'One Click Demo Import' ),
          'slug'            => 'one-click-demo-import',
          'required'        => false,
        ),
        
    );
    
    tgmpa($plugins);
}

