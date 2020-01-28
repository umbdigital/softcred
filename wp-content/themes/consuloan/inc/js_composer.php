<?php 
if ( function_exists( 'visual_composer' ) ) {
	add_action( 'vc_before_init', 'themesflat_add_param' );
	function themesflat_add_param() {
		vc_add_param( 'vc_row', array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Overlay Color', 'consuloan' ),
				'param_name'       => 'overlay_color',
				'std'				=> '',
				'description'      => esc_html__( 'Select Overlay color', 'consuloan' ),
			) );
		vc_add_param('vc_row',themesflat_shortcode_default_id());
	}
}
?>