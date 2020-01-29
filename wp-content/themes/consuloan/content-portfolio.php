<?php
/**
 * @package consuloan
 */

$portfolio_single_style = themesflat_choose_opt('portfolio_single_style');
$imgs = array(
	'full_content' => 'themesflat-case-single2',
	'left_content'=> 'themesflat-case-single'
	);
$featured_img = $imgs[$portfolio_single_style];
?>

<section class="portfolio-detail <?php echo esc_attr($portfolio_single_style);?> ">	
	<div class="container">		
		<div class="row">
			<div class="col-md-6">
				<div class="content-portfolio-detail">
            		<?php the_content(); ?>
            	</div>			
            </div> 
			<div class="col-md-6">
            	<?php $images = themesflat_decode(themesflat_meta( 'gallery_portfolio'));
            	if ( !empty( $images ) && is_array( $images ) ):  ?> 
	            	<div class="themesflat-portfolio-single-carousel">
	                    <div class="themesflat-carousel" >
	                    <?php  ?>
	                        <ul class="flat-carousel">
	                        <?php
			            		$images = themesflat_decode(themesflat_meta( 'gallery_portfolio')); 
			            		echo '<li class="item">';
			            		the_post_thumbnail($featured_img);      		;
			            		echo '</li>';
						        if ( !empty( $images ) && is_array( $images ) ) {
						           foreach ( $images as $image ) {
						              echo '<li class="item">';             
						              echo wp_get_attachment_image($image,$featured_img);
						              echo '</li>';                                 
						           }
						        } 
			        		?>                         
	                        </ul>
	                    </div>	                    
	                </div><!-- /.themesflat-portfolio-single-carousel --> 
	            <?php else: ?>
	            	<div class="themesflat-portfolio-single">
	                    <div class="themesflat-image" >
	                    <?php  ?>
	                        <div>
	                        <?php 			            		
			            		echo '<div>';
			            			the_post_thumbnail($featured_img);      		;
			            		echo '</div>'; 
			        		?>                         
	                        </div>
	                    </div>	                    
	                </div><!-- /.themesflat-portfolio-single-carousel --> 
	            <?php endif; ?>
            </div>            
		</div>
	</div>
</section>