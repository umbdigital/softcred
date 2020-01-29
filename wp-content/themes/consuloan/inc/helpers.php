<?php
/**
 * Return the built-in header styles for this theme
 *
 * @return  array
 */
Class themesflat_options_helpers {
    public function themesflat_recognize_control_class( $name ) {
        $segments = explode( '-', $name );
        $segments = array_map( 'ucfirst', $segments );
        
        return implode( '', $segments );
    }
}

function themesflat_get_class_for_custom($vc_class = '',$themesflat_class='') {
    if (!empty($vc_class)) {
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcclass = vc_shortcode_custom_css_class( $vc_class, '' );
        }
    }
    else {
        $vcclass = $themesflat_class; 
    }
    return $vcclass;
}

function themesflat_shortcode_default_id(){
    return array(
                'type'       => 'textfield',
                'param_name' => 'default_id',
                'group' => esc_html__( 'Design Options', 'consuloan' ),
                'value' => 'themesflat_'.current_time('timestamp'),
                'std' => 'themesflat_'.current_time('timestamp')
                );
}

function themesflat_add_icons($icon_name='fa',$url='') {
    $icons = '';
    if ($url != '') {
       $fontContent = wp_remote_get( $url, array('sslverify'   => false) );
       if (!is_wp_error($fontContent)){
           $pattern = sprintf('/\.([\A%s].*?)\:/',$icon_name);
           preg_match_all($pattern, $fontContent['body'],$tmp_icons);
           $icons = $tmp_icons[1];
       }
    }

    return $icons;
}

function themesflat_check_isset($control) {
    return isset($control) ? $control : '';
}

function themesflat_render_box_control($name,$control=array(),$id) {
    add_action('admin_enqueue_scripts','themesflat_admin_color_picker');
    $default = array(
        'margin-top' => '',
        'margin-bottom' => '',
        'margin-left' => '',
        'margin-right' => '',
        'padding-top' => '',
        'padding-bottom' => '',
        'padding-left' => '',
        'padding-right' => '',
        'border-top-width' => '',
        'border-bottom-width' => '',
        'border-left-width' => '',
        'border-right-width' => '',
        );
    $controls = themesflat_decode($control);
    if (!is_array($controls)) {
        $controls = array();
    }
    $controls = array_merge($default,$controls);
    ?>
    <div class="themesflat_box_control">
        <div class="themesflat_box_position">
            <div class="themesflat_box_margin">
                <label class="themesflat_box_label"><?php echo esc_html('Margin');?></label>
                <input placeholder="-" data-position='margin-top' value ="<?php themesflat_esc_attr(($controls['margin-top']));?>" class="top" type="text"/>
                <input placeholder="-" data-position='margin-bottom' value ="<?php themesflat_esc_attr(($controls['margin-bottom']));?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='margin-left' value ="<?php themesflat_esc_attr(($controls['margin-left']));?>" class="left" type="text"/>
                <input placeholder="-" data-position='margin-right' value ="<?php themesflat_esc_attr(($controls['margin-right']));?>" class="right" type="text"/>
            </div>

            <div class="themesflat_box_padding">
                <label class="themesflat_box_label"><?php echo esc_html('Padding');?></label>
                <input placeholder="-" data-position='padding-top' value ="<?php themesflat_esc_attr(($controls['padding-top']));?>" class="top" type="text"/>
                <input placeholder="-" data-position='padding-bottom' value ="<?php themesflat_esc_attr(($controls['padding-bottom']));?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='padding-left' value ="<?php themesflat_esc_attr(($controls['padding-left']));?>" class="left" type="text"/>
                <input placeholder="-" data-position='padding-right' value ="<?php themesflat_esc_attr(($controls['padding-right']));?>" class="right" type="text"/>
            </div>

            <div class="themesflat_box_border">
                <label class="themesflat_box_label"><?php echo esc_html('Border');?></label>
                <input placeholder="-" data-position='border-top-width' value ="<?php themesflat_esc_attr(($controls['border-top-width']));?>" class="top" type="text"/>
                <input placeholder="-" data-position='border-bottom-width' value ="<?php themesflat_esc_attr(($controls['border-bottom-width']));?>" class="bottom" type="text"/>
                <input placeholder="-" data-position='border-left-width' value ="<?php themesflat_esc_attr(($controls['border-left-width']));?>" class="left" type="text"/>
                <input placeholder="-" data-position='border-right-width' value ="<?php themesflat_esc_attr(($controls['border-right-width']));?>" class="right" type="text"/>
            </div>
            <div class="themesflat_control_logo"></div>
        </div>
    </div>
    <input name="<?php echo esc_attr($name);?>" data-customize-setting-link="<?php echo  esc_attr($id);?>" value="<?php echo esc_attr(json_encode($controls));?>" type="hidden"/>
    <?php 
}

function themesflat_color_picker_control($title,$control) { 
    $output = '<span class="themesflat-options-control-title">'. esc_attr($title).'</span>
                <div class="background-color">
                    <div class="themesflat-options-control-color-picker">
                        <div class="themesflat-options-control-inputs">
                            <input type="text" class="themesflat-color-picker" id="'. esc_attr( $control['name'] ) .'-color" name="'. esc_attr($control['name']).'" data-default-color value="'. esc_attr( $control['color'] ) .'" />
                        </div>
                    </div>
                </div>';
    return $output;   
}

function themesflat_iconpicker_type_simpleline($icons) {
    $tmp_icon = themesflat_add_icons('icon',THEMESFLAT_LINK.'css/simple-line-icons.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('icon-', '', $icon);
        $iconname = ucwords(str_replace("-", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge( $icons, $_icons );
}

function themesflat_iconpicker_type_eleganticons($icons) {
    $tmp_icon = themesflat_add_icons('icon social',THEMESFLAT_LINK.'css/font-elegant.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('icon_', '', $icon);
        $iconname = ucwords(str_replace("_", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge( $icons, $_icons );
}

function themesflat_iconpicker_type_ionicons($icons) {
    $tmp_icon = themesflat_add_icons('icon',THEMESFLAT_LINK.'css/font-ionicons.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('ion-', '', $icon);
        $iconname = ucwords(str_replace("-", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge( $icons, $_icons );
}

function themesflat_iconpicker_type_themifyicons($icons) {
    $tmp_icon = themesflat_add_icons('ti',THEMESFLAT_LINK.'css/themify-icons.css');
    foreach ($tmp_icon as $icon) {
        $iconname = str_replace('ti-', '', $icon);
        $iconname = ucwords(str_replace("-", " ", $iconname));
        $_icons[] = array($icon => $iconname);
    }
    return array_merge( $icons, $_icons );
}

add_filter( 'vc_iconpicker-type-simpleline', 'themesflat_iconpicker_type_simpleline' );
add_filter( 'vc_iconpicker-type-eleganticons', 'themesflat_iconpicker_type_eleganticons' );
add_filter( 'vc_iconpicker-type-ionicons', 'themesflat_iconpicker_type_ionicons' );
add_filter( 'vc_iconpicker-type-themifyicons', 'themesflat_iconpicker_type_themifyicons' );

function themesflat_available_icons($name = 'icon' ) {
    $icon_types = array ($name.'_type'=>'fontawesome',$name.'_fontawesome' => '',$name.'_openiconic' => '',$name.'_typicons' => '',$name.'_entypo' => '',$name.'_linecons' => '',$name.'_monosocial' => '',$name.'_material' => '',$name.'_simpleline' => '',$name.'_ionicons' => '',$name.'_eleganticons' => '',$name.'_themifyicons' => '');
    return  $icon_types;
}

function themesflat_map_icons($name='icon',$heading_name = 'Icon') {
    return array(
            array(
                'type' => 'dropdown',
                'heading' => $heading_name.esc_html__( ' library', 'consuloan' ),
                'value' => array(
                    esc_html__( 'None', 'consuloan' ) => 'none',
                    esc_html__( 'Font Awesome', 'consuloan' ) => 'fontawesome',
                    esc_html__( 'Open Iconic', 'consuloan' ) => 'openiconic',
                    esc_html__( 'Typicons', 'consuloan' ) => 'typicons',
                    esc_html__( 'Entypo', 'consuloan' ) => 'entypo',
                    esc_html__( 'Linecons', 'consuloan' ) => 'linecons',
                    esc_html__( 'Mono Social', 'consuloan' ) => 'monosocial',
                    esc_html__( 'Material', 'consuloan' ) => 'material',
                    esc_html__( 'Simple Line', 'consuloan' ) => 'simpleline',
                    esc_html__( 'Font Ionicons', 'consuloan' ) => 'ionicons',
                    esc_html__( 'Font Elegant', 'consuloan' ) => 'eleganticons',
                    esc_html__( 'Font Themify Icons', 'consuloan' ) => 'themifyicons',
                ),
                'std' => 'none',
                'admin_label' => true,
                'param_name' => $name.'_type',
                'description' => esc_html__( 'Select icon library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),
            array(
                'type' => 'iconpicker',
                'heading' => $heading_name,
                'param_name' => $name.'_fontawesome',
                'value' => 'fa fa-adjust',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'fontawesome',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'fontawesome',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),
            array(
                'type' => 'iconpicker',
                'heading' => $heading_name,
                'param_name' => $name.'_simpleline',
                'value' => 'icon-user',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'simpleline',

                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'simpleline',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),
                        
            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'consuloan' ),
                'param_name' => $name.'_openiconic',
                'value' => 'vc-oi vc-oi-dial',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'openiconic',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'openiconic',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
            ),

            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'consuloan' ),
                'param_name' => $name.'_typicons',
                'value' => 'typcn typcn-adjust-brightness',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'typicons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'typicons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),

            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'consuloan' ),
                'param_name' => $name.'_entypo',
                'value' => 'entypo-icon entypo-icon-note',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'entypo',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'entypo',
                ),
                'integrated_shortcode_field' => $name.'_'
            ),

            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'consuloan' ),
                'param_name' => $name.'_linecons',
                'value' => 'vc_li vc_li-heart',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'linecons',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'linecons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),

            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'consuloan' ),
                'param_name' => $name.'_monosocial',
                'value' => 'vc-mono vc-mono-fivehundredpx',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'monosocial',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'monosocial',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),

            array(
                'type' => 'iconpicker',
                'heading' => esc_html__( 'Icon', 'consuloan' ),
                'param_name' => $name.'_material',
                'value' => 'vc-material vc-material-cake',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'material',
                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'material',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),
            
             array(
                'type' => 'iconpicker',
                'heading' => $heading_name,
                'param_name' => $name.'_ionicons',
                'value' => 'ion-home',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'ionicons',

                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'ionicons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),

            array(
                'type' => 'iconpicker',
                'heading' => $heading_name,
                'param_name' => $name.'_eleganticons',
                'value' => 'icon_refresh',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'eleganticons',

                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'eleganticons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),

            array(
                'type' => 'iconpicker',
                'heading' => $heading_name,
                'param_name' => $name.'_themifyicons',
                'value' => 'ti-arrow-up',
                // default value to backend editor admin_label
                'settings' => array(
                    'emptyIcon' => false,
                    // default true, display an "EMPTY" icon?
                    'type' => 'themifyicons',

                    'iconsPerPage' => 4000,
                    // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                ),
                'dependency' => array(
                    'element' => $name.'_type',
                    'value' => 'themifyicons',
                ),
                'description' => esc_html__( 'Select icon from library.', 'consuloan' ),
                'integrated_shortcode_field' => $name.'_'
            ),
        );
}

function themesflat_custom_button_color($color = '') {
    $color = $color == '' ? themesflat_get_opt( 'primary_color' ) : $color;
    return $color;
}

function themesflat_render_post($blog_layout,$readmore = '[...]',$length='') {
    if ($length != '') {
        global $themesflat_length;
        $themesflat_length = $length;
        add_filter('excerpt_length','themesflat_special_excerpt',1000);
    }
    $button_type = array(
        'blog-grid' => 'no-background',
        'blog-list' => '',
        'blog-list-full-width' => '',
        'blog-masonry' => '',
        'blog-list-small' => 'no-background',
        'blog-grid-image-left' => ''
        );
    $_button_type = $button_type[$blog_layout];
    if( strpos( get_the_content(), 'more-link' ) === false ) {
        the_excerpt();

        if ($readmore != '[...]') {
            echo '<div class="themesflat-button-container"><a class="themesflat-button themesflat-archive '. esc_attr($_button_type).'" href="'.get_the_permalink().'" rel="nofollow">'.$readmore.'</a></div>';
            add_filter( 'excerpt_more', 'themesflat_excerpt_more' );
            
        }
    }
    else {
        if ($readmore != '[...]') {
            the_content('[...]');
            echo '<div class="themesflat-button-container"><a class="themesflat-button themesflat-archive '. esc_attr($_button_type).'" href="'.get_the_permalink().'" rel="nofollow">'.$readmore.'</a></div>';
        }
        else {
            the_content($readmore);
        }
    }
}

function themesflat_excerpt_more( $more ) {
    return '[...]';
}

function themesflat_special_excerpt($length) {
    global $themesflat_length;
    return $themesflat_length;
}

function themesflat_predefined_header_styles() {
    static $styles;

    if ( empty( $styles ) ) {
        $styles = apply_filters( 'themesflat/header_styles', array(
            'header-v1' => esc_html__( 'Classic', 'consuloan' ),
            'header-v2' => esc_html__( 'Header style 02', 'consuloan' ),
            'header-v4' => esc_html__( 'Modern', 'consuloan' ),
        ) );
    }

    return $styles;
}

/**
 * Render header style this theme
 *
 * @return  array
 */
function themesflat_render_header_styles() {
    static $header_style;
    
    if ( themesflat_meta( 'custom_header' ) == 1 ) {
        $header_style = themesflat_meta( 'header_style' );
    } else {
        $header_style = get_theme_mod( 'header_style', 'Header-v1' );
    }

    return $header_style;
}

function themesflat_available_social_icons() {
    $icons = apply_filters( 'themesflat_available_icons', array(
        'twitter'        => array( 'iclass' => 'fa-twitter', 'title' => 'Twitter','share_link' => 'https://twitter.com/intent/tweet?url=' ),
        'facebook'       => array( 'iclass' => 'fa-facebook', 'title' => 'Facebook','share_link'=>'https://www.facebook.com/sharer.php?u=' ),
        'google-plus'    => array( 'iclass' => 'fa-google-plus', 'title' => 'Google Plus','share_link'=>'https://plus.google.com/share?url=' ),
        'pinterest'      => array( 'iclass' => 'fa-pinterest', 'title' => 'Pinterest','share_link' =>'https://pinterest.com/pin/create/bookmarklet/?url=' ),
        'instagram'      => array( 'iclass' => 'fa-instagram', 'title' => 'Instagram','share_link' => '' ),
        'youtube'        => array( 'iclass' => 'fa-youtube-play', 'title' => 'Youtube','share_link' =>'' ),
        'vimeo'          => array( 'iclass' => 'fa-vimeo-square', 'title' => 'Vimeo','share_link' =>'' ),
        'linkedin'       => array( 'iclass' => 'fa-linkedin', 'title' => 'LinkedIn','share_link' => 'https://www.linkedin.com/shareArticle?url=' ),
        'behance'        => array( 'iclass' => 'fa-behance', 'title' => 'Behance','share_link' =>'' ),
        'bitcoin'        => array( 'iclass' => 'fa-bitcoin', 'title' => 'Bitcoin','share_link' =>'' ),
        'bitbucket'      => array( 'iclass' => 'fa-bitbucket', 'title' => 'BitBucket','share_link' => '' ),
        'codepen'        => array( 'iclass' => 'fa-codepen', 'title' => 'Codepen','share_link' =>'' ),
        'delicious'      => array( 'iclass' => 'fa-delicious', 'title' => 'Delicious','share_link' =>'https://delicious.com/save?url='),
        'deviantart'     => array( 'iclass' => 'fa-deviantart', 'title' => 'DeviantArt','share_link' =>'' ),
        'digg'           => array( 'iclass' => 'fa-digg', 'title' => 'Digg','share_link' =>'http://digg.com/submit?url=' ),
        'dribbble'       => array( 'iclass' => 'fa-dribbble', 'title' => 'Dribbble','share_link' =>'' ),
        'flickr'         => array( 'iclass' => 'fa-flickr', 'title' => 'Flickr','share_link' => ''),
        'foursquare'     => array( 'iclass' => 'fa-foursquare', 'title' => 'Foursquare','share_link' => ''),
        'github'         => array( 'iclass' => 'fa-github-alt', 'title' => 'Github','share_link' => ''),
        'jsfiddle'       => array( 'iclass' => 'fa-jsfiddle', 'title' => 'JSFiddle','share_link' => ''),
        'reddit'         => array( 'iclass' => 'fa-reddit', 'title' => 'Reddit','share_link' => 'https://reddit.com/submit?url='),
        'skype'          => array( 'iclass' => 'fa-skype', 'title' => 'Skype','share_link' => 'https://web.skype.com/share?url='),
        'slack'          => array( 'iclass' => 'fa-slack', 'title' => 'Slack','share_link' => ''),
        'soundcloud'     => array( 'iclass' => 'fa-soundcloud', 'title' => 'SoundCloud','share_link' => ''),
        'spotify'        => array( 'iclass' => 'fa-spotify', 'title' => 'Spotify','share_link' => ''),
        'stack-exchange' => array( 'iclass' => 'fa-stack-exchange', 'title' => 'Stack Exchange','share_link' => ''),
        'stack-overflow' => array( 'iclass' => 'fa-stack-overflow', 'title' => 'Stach Overflow','share_link' => ''),
        'steam'          => array( 'iclass' => 'fa-steam', 'title' => 'Steam','share_link' => ''),
        'stumbleupon'    => array( 'iclass' => 'fa-stumbleupon', 'title' => 'Stumbleupon','share_link' => 'http://www.stumbleupon.com/submit?url='),
        'tumblr'         => array( 'iclass' => 'fa-tumblr', 'title' => 'Tumblr','share_link' => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl='),
        'rss'            => array( 'iclass' => 'fa-rss', 'title' => 'RSS','share_link' => '' )
    ) );

    $icons['__ordering__'] = array_keys( $icons );

    return $icons;
}

/**
 * Menu fallback
 */
function themesflat_menu_fallback() {
    echo '<ul id="menu-main" class="menu">
    <li>
    <a class="menu-fallback" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__( 'Create a Menu', 'consuloan' ) . '</a></li></ul>';
}

function themesflat_esc_attr($attr) {
    echo esc_attr($attr);
}

function themesflat_esc_html($attr) {
    echo esc_html($attr);
}

/**
 * Change the excerpt length
 */
function themesflat_excerpt_length( $length ) {  
    $excerpt = themesflat_choose_opt('blog_archive_post_excepts_length');
    return $excerpt;
}

add_filter( 'excerpt_length', 'themesflat_excerpt_length', 999 );

/**
 * Blog layout
 */
function themesflat_blog_layout() {
    switch (get_post_type()) {
        case 'page':
            $layout = themesflat_choose_opt('page_layout');
            break;
        case 'post':
            $layout = themesflat_choose_opt('blog_layout');
            break;
        case 'portfolios':
            $layout = themesflat_choose_opt('portfolios_sidebar');
            break; 
        case 'product':
            $layout = themesflat_choose_opt('product_layout');
            break;       
        default:
            $layout = themesflat_choose_opt('blog_layout');
            break;
    }

    return $layout ;
}

function themesflat_font_style($style) {
    if (strlen($style) > 4) {
        switch (substr($style, 0,3)) {
            case 'reg':
                $a[0] = '400';
                $a[1] = 'normal';
            break;
            case 'ita':
                $a[0] = '400';
                $a[1] = 'italic';               
            break;
            default:
                $a[0] = substr($style, 0,3);
                $a[1] = substr($style, 4);
            break;
        }
          
    }
    else {
        $a[0] = $style;
        $a[1] = 'normal';
    }
    return $a;
}

/**
 * Get post meta, using rwmb_meta() function from Meta Box class
 */
function themesflat_meta( $key,$ID = '') {
    global $post;
    if ( $ID =='' && !is_null($post)) :
        return get_post_meta( $post->ID,$key, true );
    else:
        return get_post_meta($ID,$key,true);
    endif;
}

/**
 * Move_comment_field_to_bottom
 */
function themesflat_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'themesflat_move_comment_field_to_bottom' );

if ( ! function_exists( 'themesflat_favicon' ) ) {
    add_action( 'wp_head', 'themesflat_favicon' );

    /**
     * Display the custom favicon setup for the theme
     *   
     * @return  void
     */
     
    function themesflat_favicon() {
        if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
          // your theme specific custom favicon code goes here
            printf ('<link rel="shortcut icon" href="'.esc_url( THEMESFLAT_LINK . 'icon/favicon.png').'" />');      
        }
    }
}

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep Optional separator.
     * @return string The filtered title.
     */
    function themesflat_wp_title( $title, $sep ) {
        if ( is_feed() ) {
            return $title;
        }

        global $page, $paged;

        // Add the blog name
        $title .= get_bloginfo( 'name', 'display' );

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) ) {
            $title .= " $sep $site_description";
        }

        // Add a page number if necessary:
        if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
            $title .= " $sep " . sprintf( esc_html__( 'Page %s', 'consuloan' ), max( $paged, $page ) );
        }

        return $title;
    }

    add_filter( 'wp_title', 'themesflat_wp_title', 10, 2 );

    /**
     * Title shim for sites older than WordPress 4.1.
     *
     * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
     * @todo Remove this function when WordPress 4.3 is released.
     */
    if ( ! function_exists( '_wp_render_title_tag' ) ) {
        function themesflat_render_title() {
            ?>
            <title><?php wp_title( '|', true, 'right' ); ?></title>
            <?php
        }
        add_action( 'wp_head', 'themesflat_render_title' );
    }
    
endif;

function themesflat_hex2rgba($color, $opacity = false) {
 
    $default = 'rgb(0,0,0)';
 
    //Return default if no color provided
    if(empty($color))
          return $default; 
 
    //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
            return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

function themesflat_render_box_position($class,$box_control,$custom_string='') {
    $css = esc_attr($class) .'{';
    if (is_array($box_control)) {
        foreach ($box_control as $key => $value) {
            if ( $value !='') {
                $css .= esc_attr($key) .':'.esc_attr(str_replace("px","",$value)).'px; ';
            }
        }
    }
    $css .= esc_attr($custom_string);
    $css .= '}';

    wp_add_inline_style( 'inline-css', $css );
}

function themesflat_render_style($class,$custom_string=''){
    $css = esc_attr($class) .'{';
    if (is_array($custom_string)) {
        foreach ($custom_string as $key => $value) {
            if ( $value !='') {
                $css .= esc_attr($key) .':'.esc_attr($value);
            }
        }
    }
    else {
        $css .= esc_attr($custom_string);
    }
    $css .= '}';
    add_action( 'wp_enqueue_scripts', 'themesflat_add_custom_styles',10,$css );
}

function themesflat_add_custom_styles($custom) {
    echo 'inhere';
    wp_add_inline_style( 'inline-css', '.testimagebox{}' );
} 

function themesflat_render_attrs($atts,$echo = true) {
    $attr = '';
    if (is_array($atts)) {
        foreach ($atts as $key => $value) {
            if ( $value !='') {
                $attr .= $key . '="' . esc_attr( $value ) . '" ';
            }
        }
    }
    if ($echo == true) {
        echo esc_attr($attr);
    }
    return $attr;
}

function themesflat_get_json($key) {
    if ( get_theme_mod($key) == '' ) return themesflat_customize_default($key);
    if (!is_array(get_theme_mod($key))) {
    $decoded_value = json_decode(str_replace('&quot;', '"',  get_theme_mod( $key )), true );
    }
    else {
        $decoded_value = get_theme_mod($key);
    }
    return $decoded_value;
}

function themesflat_decode($value) {
    if (!is_array($value)) {
        $decoded_value = json_decode(str_replace('&quot;', '"',  $value) , true );
    }
    else {
        $decoded_value = $value;
    }
    return $decoded_value;
}

function themesflat_get_opt( $key ) {
    return get_theme_mod( $key, themesflat_customize_default( $key ) );
}

function themesflat_dynamic_sidebar($sidebar) {
    if ( is_active_sidebar ( $sidebar ) ) {
        dynamic_sidebar( $sidebar );        
    }else {         
        if ( is_user_logged_in() ) { 
            printf( __( 'This is the %s widget area.Please go to <a href="%s">Admin</a>.', 'consuloan' ), esc_attr($sidebar), esc_url( admin_url( 'widgets.php' ) ) );
        }
    } 
}

function themesflat_render_meta(){
    if ( 'post' == get_post_type() && themesflat_choose_opt('blog_archive_show_post_meta') != 0 ) : ?>
        <div class="entry-meta clearfix">
            <?php themesflat_posted_on(); ?>        
        </div><!-- /.entry-meta -->
    <?php endif; 
}

function themesflat_choose_opt ($key,$ID='') {
    $flatopts = ( get_option('flatopts') );
    if ( isset( $flatopts[$key] ) && themesflat_meta( $flatopts[$key],$ID) == 1 ) {
        return themesflat_meta( $key,$ID );         
    }
    else 
        return themesflat_get_opt( $key );
}

function themesflat_load_page_menu($params) {
    if ( themesflat_meta( 'enable_custom_navigator' ) == 1 && themesflat_meta('menu_location_primary') != false ) {
        if ($params['theme_location'] == 'primary') {
            $params['menu'] = (int)themesflat_meta('menu_location_primary');
        }
    }
    return ($params);
}

add_filter( 'wp_nav_menu_args', 'themesflat_load_page_menu' );

function themesflat_render_social($prefix = '',$value='',$show_title=false) {
    if ($value == '') {
        $value = themesflat_get_json('social_links');
    }
    $class= array();
    $class[] = ($show_title == false ? 'themesflat-socials' : 'themesflat-shortcode-socials');

    if ( ! is_array( $value ) ) {
            $decoded_value = json_decode(str_replace('&quot;', '"', $value), true );
            $value = is_array( $decoded_value ) ? $decoded_value : array();
        }

    $icons = themesflat_available_social_icons();

    ?>
    <ul class="<?php echo esc_attr(implode(" ", $class));?>">
        <?php
        foreach ( $value as $key => $val ) {
            if ($key != '__ordering__') {
                $title = ($show_title == false ? '' : $icons[$key]['title']);
                printf(
                    '<li class="%s">
                        <a href="%s" target="_blank" rel="alternate" title="%s">
                            <i class="fa fa-%s"></i>                            
                        </a>
                    </li>',
                    esc_attr( $key ),
                    esc_url( $val ),
                    esc_attr( $val ),
                    esc_attr( $key ),
                    esc_html($title)
                );
            }
    }
        ?>
    </ul><!-- /.social -->       
<?php 
}

/* Themesflat Language Switch */
if (! function_exists( 'themesflat_language_switch' )) {
    function themesflat_language_switch(){ ?>
        <span class="display-none-languages-sidebar">  
        <?php $languages_sidebar = themesflat_dynamic_sidebar('languages-sidebar'); ?>
        </span>

    <div class="flat-language languages">
        <?php if ( ! empty($languages_sidebar) ): ?>
            <?php themesflat_dynamic_sidebar('languages-sidebar'); ?>
        <?php else: ?>
        <ul class="unstyled">
            <li class="current"><a href="?lang=en" class="lang_sel_sel"><?php echo esc_html__("English",'consuloan');?></a>
                <ul class="unstyled">
                   <li class="icl-en">
                        <a href="?lang=en" class="lang_sel_sel">
                         <?php echo esc_html__("English",'consuloan');?>
                        </a>
                   </li>
                   <li class="icl-fr fr">
                        <a href="?lang=fr" class="lang_sel_other">
                         <?php echo esc_html__("French",'consuloan');?>
                        </a>
                   </li>
                   <li class="icl-ge ge">
                        <a href="?lang=it" class="lang_sel_other">
                            <?php echo esc_html__("German",'consuloan');?>
                        </a>
                   </li>
                </ul>
            </li>
        </ul>
        <?php endif; ?>
    </div>    
    <?php }
}