<?php
/**
 * Template Name: CommingSoon
 */

get_header(); ?>
<div class="col-md-12">

	<div id="primary" class="content-area fullwidth-comming-soon">
		<main id="main" class="site-main" role="main">
			<section class="error-comming-soon not-found">
				<header class="page-header">
					<h1 class="title-comming-soon"><?php esc_html_e( 'Comming Soon', 'consuloan' ); ?></h1>
				</header><!-- .page-header -->

				<div class="sub-title-comming-soon">
					<?php esc_html_e( 'Our Website is Under Corporate.', 'consuloan' ); ?>
				</div><!-- .title-comming-soon -->

				<div class="page-content">					
					<div id="countdown" class="countdown clearfix" data-set_time="<?php echo themesflat_choose_opt('comming_soon_time'); ?>">
                        <div class="square">
                           <div class="numb time-day">02</div>
                           <div class="text"><?php esc_html_e( 'DAY', 'consuloan' ); ?></div>
                        </div>
                        <div class="square">
                           <div class="numb time-hours">24</div>
                           <div class="text"><?php esc_html_e( 'HOURS', 'consuloan' ); ?></div>
                        </div>
                        <div class="square">
                           <div class="numb time-mins">35</div>
                           <div class="text"><?php esc_html_e( 'MINS', 'consuloan' ); ?></div>
                        </div>
                        <div class="square">
                           <div class="numb time-secs">09</div>
                           <div class="text"><?php esc_html_e( 'SECS', 'consuloan' ); ?></div>
                        </div>
                     </div>
                     <!-- CountDown -->
                     <div class="comming-social">
                        <span><?php esc_html_e( 'Follow Us For Updates', 'consuloan' ); ?></span>
                        <?php themesflat_render_social(); ?>
                     </div>
				</div><!-- .page-content -->
			</section><!-- .error-comming-soon -->
		</main><!-- #main -->
	</div><!-- #primary -->

</div><!-- /.col-md-12 -->
<?php get_footer(); ?>