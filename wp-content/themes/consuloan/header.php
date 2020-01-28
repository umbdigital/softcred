<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package consuloan
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Preloader -->
<?php if (themesflat_choose_opt('enable_preload') == 1): ?>
<section id="loading-overlay">
    <div class="themesflat-loader"></div>
</section>
<?php endif; ?>

<div class="themesflat-boxed">	
	<?php 
		get_template_part( 'tpl/topbar');       
        get_template_part( 'tpl/site-header');        		
	?>
	<!-- Page Title -->
	<?php get_template_part( 'tpl/page-title'); ?>	
	<div id="themesflat-content" class="page-wrap <?php echo esc_attr( themesflat_blog_layout() ); ?>">
		<div class="container content-wrapper">
			<div class="row">