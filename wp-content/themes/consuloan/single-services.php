<?php
/**
 * The template for displaying all single services posts.
 *
 * @package consuloan
 */

get_header(); ?>
<div id="primary" class="content-area">
		<main id="main" class="post-wrap" role="main">
			<div class="services-single">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'services' ); ?>
					<?php 
						if ( themesflat_choose_opt( 'services_show_post_navigator') == 1 ) :
							themesflat_post_navigation();
						endif;		 
					?>		
					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				<?php endwhile; // end of the loop. ?>	
			</div><!-- services-single -->
	</main>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
