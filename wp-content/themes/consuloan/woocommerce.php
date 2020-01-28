<?php 
	if ( is_singular( 'product' )) {
	 	wc_get_template_part('templates/single', 'product');
	} else {
	 	wc_get_template_part('templates/archive', 'product');
	}
 ?>
