<?php
class Themesflat_Testimonial_widgets extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return Themesflat_Testimonial_widgets
     */
    
    function __construct() {
        $this->defaults = array(
            'title' 	=> 'Themesflat: Testimonial', 
            'autoplay'        => '',
            'show_control'    => false,
            'show_direction'    => false,
            'style'    => 'style1',
            'exclude'    => '',
            'post_in'    => '',
            'limit'    => 3,
            'class'           => '',
            'autoid'           => ''
            );

        parent::__construct(
            'widget_themesflat_testimonial',
            esc_html__( 'Themesflat - Testimonial', 'consuloan' ),
            array(
                'classname'   => 'widget-themesflat-testimonial',
                'description' => esc_html__( 'Testimonial', 'consuloan' )
                )
            );
    }

    /**
     * Display widget
     */
    function widget( $args, $instance ) {

        $instance = wp_parse_args( $instance, $this->defaults );
        extract($args);
        extract($instance);
        $instance['class'] .= ' '.esc_attr($autoid);
        echo $before_widget;
        if ( !empty($title) ) echo $before_title.esc_html($title).$after_title;
        if (function_exists('themesflat_shortcode_testimonial_slider')) {
            echo themesflat_shortcode_testimonial_slider($instance);
        }
        $css = sprintf('.%1$s {
        }',esc_attr($autoid));
        wp_add_inline_style( 'inline-css', $css);
        echo $after_widget;
}

    /**
     * Update widget
     */
    function update( $new_instance, $old_instance ) {

        $instance               = $old_instance;
        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['style']      =  ($new_instance['style']);
        $instance['autoplay']      =  intval($new_instance['autoplay']);
        $instance['show_direction']      =  intval($new_instance['show_direction']);
        $instance['show_control']      =  intval($new_instance['show_control']);
        $instance['post_in']      =  ($new_instance['post_in']);
        $instance['exclude']      =  ($new_instance['exclude']);
        $instance['limit']      =  intval($new_instance['limit']);
        $instance['class']      =  ($new_instance['class']);
        $instance['autoid']      =  $instance['autoid'] == '' ? 'themesflat_'.current_time('timestamp') : $instance['autoid'];
        return $instance;
    }

    /**
     * Widget setting
     */
    function form( $instance ) {

        $instance = wp_parse_args( $instance, $this->defaults );
      
        ?>
        <script type='text/javascript'>
            jQuery(document).ready(function($) {
                $('.themesflat_color_picker').wpColorPicker();
            });
        </script>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'consuloan' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
        </p>

        <?php $styles = array(
            'sidebar' => esc_html__('Sidebar','consuloan'),
            'style1' => esc_html__('Style 1','consuloan'),
            'style2' => esc_html__('Style 2','consuloan'),            
            ); ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>"><?php esc_html_e( 'Select style:', 'consuloan' ); ?></label>
                <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'style' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'style' ) ); ?>">
                    <?php               
                    foreach ($styles as $key => $style) {
                        printf('<option value="%1$s" %3$s>%2$s</option>', esc_attr($key), esc_attr($style),($key == $instance['style']  ? 'selected="selected"' : ''));
                    }               
                    ?>
                </select>
            </p>

            <p>
                <input class="checkbox" value="1" type="checkbox" <?php checked( $instance['show_control'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_control' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_control' ) ); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_control' ) ); ?>"><?php esc_html_e( 'Show Control ?', 'consuloan' ) ?></label>
            </p>       

            <p>
                <input class="checkbox" value="1" type="checkbox" <?php checked( $instance['show_direction'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'show_direction' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_direction' ) ); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'show_direction' ) ); ?>"><?php esc_html_e( 'Show Direction ?', 'consuloan' ) ?></label>
            </p>   

            <p>
                <input class="checkbox" value="1" type="checkbox" <?php checked( $instance['autoplay'] ); ?> id="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'autoplay' ) ); ?>" />
                <label for="<?php echo esc_attr( $this->get_field_id( 'autoplay' ) ); ?>"><?php esc_html_e( 'Auto Play ?', 'consuloan' ) ?></label>
            </p>       
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>"><?php esc_html_e( 'Limit:', 'consuloan' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'limit' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'limit' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['limit'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'post_in' ) ); ?>"><?php esc_html_e( 'Include:', 'consuloan' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post_in' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_in' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['post_in'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>"><?php esc_html_e( 'Exclude:', 'consuloan' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'exclude' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'exclude' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['exclude'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>"><?php esc_html_e( 'Class:', 'consuloan' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'class' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'class' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['class'] ); ?>">
            </p>
            <p>
             
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'autoid' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'autoid' ) ); ?>" type="hidden" value="<?php echo esc_attr( $instance['autoid'] ); ?>">
            </p>


            <?php
        }

    }

    add_action( 'widgets_init', 'themesflat_testimonial_widget' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function themesflat_testimonial_widget() {
    register_widget( 'Themesflat_Testimonial_widgets' );
}