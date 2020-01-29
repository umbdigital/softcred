<?php
class Themesflat_Contact_Us_widget extends WP_Widget {
    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     *
     * @return Themesflat_Contact_Us_widget
     */        
    
    function __construct() {
        $this->defaults = array(
            'title' 	=> 'Themesflat: Contact Us', 
            'image_uri' => '',
            'image_url' => '#',
            'text'    => '',
            'class'   => '',
            );

        parent::__construct(
            'widget_themesflat_contact_us',
            esc_html__( 'Themesflat - Contact Us', 'consuloan' ),
            array(
                'classname'   => 'widget-themesflat-contact-us',
                'description' => esc_html__( 'Contact Us', 'consuloan' )
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
        $instance['class'] .= '';        
        echo $before_widget;
        echo '<div class="themesflat-contact-us '.esc_attr($class).'">';
        if ( !empty($image_uri) ) 
            echo    '<div class="themesflat-images-contact-us"><a href='.esc_html($image_url).'>                        
                        <img src="'.esc_url($instance['image_uri']).'" alt="image" height="179" width="270">
                    </a></div>';

        if ( !empty($title) ) echo $before_title.esc_html($title).$after_title; 
        if ( !empty($text) ) {echo do_shortcode('<div class="contact-us-content">' . $text . '</div>');}
        echo '</div>';
        echo $after_widget;
    }

    /**
     * Update widget
     */
    function update( $new_instance, $old_instance ) {

        $instance               = $old_instance;
        $instance['title']      = strip_tags( $new_instance['title'] );
        $instance['text']       = ( $new_instance['text'] );
        $instance['image_uri']  = strip_tags( $new_instance['image_uri'] );
        $instance['image_url']  = strip_tags( $new_instance['image_url'] );
        $instance['class']      =  ($new_instance['class']);
       
        return $instance;
    }

    /**
     * Widget setting
     */
    function form( $instance ) {

        $instance = wp_parse_args( $instance, $this->defaults );
      
        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('image_uri') ); ?>"><?php esc_html_e( 'Image:', 'consuloan' ); ?></label>
                <img class="themesflat_media_image" src="<?php if(!empty($instance['image_uri'])){echo esc_attr( $instance['image_uri'] );} ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                <input type="text" class="widefat themesflat_image_uri" name="<?php echo esc_attr($this->get_field_name('image_uri') ); ?>" id="<?php echo esc_attr( $this->get_field_id('image_uri') ); ?>" value="<?php echo esc_attr( $instance['image_uri'] ); ?>">
                <input type="button" value="<?php esc_html_e( 'Upload Image', 'consuloan' ); ?>" class="button themesflat_media_upload" id="custom_image_uploader"/>
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id('image_url') ); ?>"><?php esc_html_e( 'Image URL:', 'consuloan' ); ?></label><br />
                <input type="text" class="widefat themesflat_image_url" name="<?php echo esc_attr( $this->get_field_name('image_url') ); ?>" id="<?php echo esc_attr( $this->get_field_id('image_url') ); ?>" value="<?php echo esc_attr( $instance['image_url'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'consuloan' ); ?></label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>"/>
            </p>
            
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_html_e( 'Content:', 'consuloan' ); ?></label>
                <textarea class="widefat" rows="16" cols="20" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea>
            </p>  

            <?php
        }

    }

    add_action( 'widgets_init', 'Themesflat_contact_us_widget' );

/**
 * Register widget
 *
 * @return void
 * @since 1.0
 */
function Themesflat_contact_us_widget() {
    register_widget( 'Themesflat_Contact_Us_widget' );
}