<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package consuloan
 */

get_header(); ?>
<div class="col-md-12">

	<div id="primary" class="content-area fullwidth-404">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="title-404 nothing"><?php esc_html_e( '404', 'consuloan' ); ?></h1>
				</header><!-- .page-header -->

				<div class="sub-title-404">
					<?php esc_html_e( 'Opps! This page Could Not Be Found!', 'consuloan' ); ?>
				</div><!-- .title-404 -->

				<div class="page-content">
					<p class="subtext-nothing">
					<?php 
					$allowed = array( 'br' => array() );
					echo wp_kses( esc_html__( 'Sorry bit the page you are looking for does not exist, have been removed or name changed', 'consuloan' ), 
						$allowed );
					?>
					</p>					
					<h4><a class="themesflat-button" href="<?php echo esc_url( home_url('/') ); ?>">
						<i class="fa fa-long-arrow-left" aria-hidden="true"></i><?php esc_html_e( 'Go Back to the homepage','consuloan' ) ?></a>
					</h4>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- /.col-md-12 -->
<?php get_footer(); ?>