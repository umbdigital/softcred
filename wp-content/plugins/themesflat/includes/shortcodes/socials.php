<?php
class themesflat_socials extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return themesflat_socials
     */
    function __construct() {
        $this->defaults = array(
            'title'         => 'Themesflat: Socials',
            'value'         => '',
        );
        parent::__construct(
            'widget_themesflat_socials',
            esc_html__( 'Themesflat: Socials', 'consuloan' ),
            array(
                'classname'   => 'widget_themesflat_socials',
                'description' => esc_html__( 'Themesflat Socials.', 'consuloan' )
            )
        );
    }

    /**
     * Display widget
     */
    function widget( $args, $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $instance );
        extract( $args );
        echo $before_widget;
        if ( !empty($title) ) echo $before_title.esc_html($title).$after_title;?>
        <?php themesflat_render_social('',$instance['value'],true);?>
        <?php echo $after_widget;
    }

    /**
     * Update widget
     */
    function update( $new_instance, $old_instance ) {
        $instance                   = $old_instance;
        $instance['title']          = strip_tags( $new_instance['title'] );
        $instance['value']          = ( $new_instance['value'] );
        
        return $instance;
    }

    /**
     * Widget setting
     */
    function form( $instance ) {
        wp_enqueue_script('themesflat_customizer_js');
        $instance = wp_parse_args( $instance, $this->defaults );
        $icons = themesflat_available_social_icons();
        $value = $instance['value'];
        $order = $icons['__ordering__'];
        if ( ! is_array( $value ) ) {
            $decoded_value = json_decode(str_replace('&quot;', '"', $value), true );
            $value = is_array( $decoded_value ) ? $decoded_value : array();
        }
        if ( isset( $value['__ordering__'] ) && is_array( $value['__ordering__'] ) )
            $order = $value['__ordering__'];
        ?>
        <div class="themesflat_widget_socials themesflat-options-control-social-icons">
            <ul class="themesflat_icons">
                <li class="item-properties">
                    <label>
                        <span class="input-title"></span>
                        <input type="text" class="input-field" />
                    </label>
                    <button type="button" class="button button-primary confirm"><i class="fa fa-check"></i></button>
                </li>
                <?php foreach ( $order as $id ):
                    $params = $icons[$id];
                    $link = isset( $value[$id] ) ? sprintf( 'data-link="%s"', esc_attr( $value[$id] ) ) : '';
                    ?>
                    <li class="item flat-<?php themesflat_esc_attr( $id ) ?>" data-id="<?php themesflat_esc_attr( $id ) ?>" <?php themesflat_esc_attr($link) ?> data-title="<?php themesflat_esc_attr( $params['title'] ) ?>">
                        <i class="fa <?php themesflat_esc_attr( $params['iclass'] ) ?>"></i>
                    </li>
                <?php endforeach ?>
            </ul>
            <input type="hidden" id="typography-value"  name="<?php themesflat_esc_attr($this->get_field_name('value'));?>"  value="<?php themesflat_esc_attr(  $instance['value'] ) ?>" />
        </div>
    <?php
    }
}

add_action( 'widgets_init', 'themesflat_socials_widget' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_socials_widget() {
    register_widget( 'themesflat_socials' );
}