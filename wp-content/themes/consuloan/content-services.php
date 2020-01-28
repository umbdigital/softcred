<?php
/**
 * @package consuloan
 */
?>

<?php
/**
 * @package consuloan
 */
global $themesflat_thumbnail;
$themesflat_thumbnail = 'themesflat-blog-single';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post blog-single' ); ?>>
	<?php
$feature_post = '';
global $themesflat_thumbnail;
switch ( get_post_format() ) {	
	case 'gallery':
	$size = 'themesflat-blog';
	$images = themesflat_decode(themesflat_meta( 'gallery_images'));

	if ( empty( $images ) )
		break;
	?>		
	<div class="featured-post blog-slider" data-auto="false" data-effect="slide" data-direction="horizotal">
		<div class="flexslider">
			<ul class="slides">
				<?php 
				if ( !empty( $images ) && is_array( $images ) ) {
					foreach ( $images as $image ) {
						echo '<li>';             
						echo wp_get_attachment_image($image,$themesflat_thumbnail);
						echo '</li>';                                 
					}
				} 
				?> 
			</ul>
		</div>
	</div><!-- /.feature-post -->
	<?php 
	break;
	case 'video':	
	$video = themesflat_meta('video_url');
	if ( !$video ) 
		break;
	global $_wp_additional_image_sizes;
	$video_size = array( 
		'height' => $_wp_additional_image_sizes[$themesflat_thumbnail]['height']
		);
		$end = "";
		if ( has_post_thumbnail() ){
			$feature_post .= '<div class="themesflat_video_embed">';
			$feature_post .= '<a href="#">'.get_the_post_thumbnail(null,$themesflat_thumbnail).'<div class="themesflat_video_button"><i class="fa fa-play" aria-hidden="true"></i></div></a>';
			$end = "</div>";
		}

		if ( filter_var( $video, FILTER_VALIDATE_URL ) ) { // display oEmbed HTML if a url exists
			if ( $oembed = @wp_oembed_get( $video,$video_size ) )
				$feature_post .= $oembed;
		} else { // display oEmbed HTML if a embed code exists
			$feature_post = $video;
		}
		$feature_post .= $end;
		break;
		default:

		$size = is_single() ? 'themesflat-blog-single' : $themesflat_thumbnail;		
		$thumb = get_the_post_thumbnail( get_the_ID(), $size );
		if ( empty( $thumb ) )
			return;
		
		$feature_post .= get_the_post_thumbnail( get_the_ID(), $size );
		
	}

	if ( $feature_post )
		echo '<div class="featured-post">' . $feature_post . '</div>';
	?>
	<div class="entry-box-title clearfix">
		<div class="wrap-entry-title">
			<?php
			the_title( '<h2 class="entry-title">', '</h2>' );				
			?>			
		</div><!-- /.wrap-entry-title -->
	</div>		
	<div class="main-post">		
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
		<div class="clearfix"></div>
	</div><!-- /.main-post -->
</article><!-- #post-## -->

<?php
$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'post_title',
	'hierarchical' => 1,
	'exclude' => '',
	'meta_key' => '',
	'meta_value' => '',
	'authors' => '',
	'child_of' => 0,
	'parent' => -1,
	'exclude_tree' => '',
	'number' => '',
	'offset' => 0,
	'post_type' => 'page',
	'post_status' => 'publish'
); 
$pages = get_pages($args);

$getpageid = intval(themesflat_choose_opt('include_pages_list'));

foreach( $pages as $page ) {      
	$content = $page->post_content;
	$pageid = $page->ID;
	if ($pageid == $getpageid):
		if (!empty($content)):
			$content = apply_filters( 'the_content', $content );
			?>
			<div class="entry"><?php echo do_shortcode($content);?></div>
			<?php
		endif;
	endif;
}


