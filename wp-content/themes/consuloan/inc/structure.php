<?php
if ( ! function_exists( 'themesflat_body_classes' ) ) {
	add_filter( 'body_class', 'themesflat_body_classes' );

	function themesflat_body_classes( $classes ) {	
		$custom_page_class = themesflat_meta('custom_page_class');

		$classes[] = $custom_page_class;

		if ( themesflat_meta('enable_custom_topbar') == 1 ) {
			if (themesflat_meta( 'topbar_enabled' ) == 1 )	{	
				$classes[] = 'has-topbar';
			}			
		}
		else {
			if ( themesflat_get_opt( 'topbar_enabled') == 1 )
				$classes[] = 'has-topbar';		
		}

		if ( themesflat_choose_opt('header_sticky') == 1 ) {	
			$classes[] = 'header_sticky';
		}

		if ( (themesflat_choose_opt('enable_content_right_top') ==1) ) {
			$classes[] = 'long_content';
		}

		/**
		 * Portfolio template
		 */
		if ( is_page_template( 'tpl/portfolio.php' ) ) $classes[] = 'page-portfolio';

		/**
		 * Full-Width layout template
		 */
		if ( is_page_template( 'tpl/page_fullwidth.php' ) ) $classes[] = 'page-fullwidth';
		$classes[] =  themesflat_choose_opt('layout_version');

		/**
		 * Full Width Sidebar Position
		 */
		$classes[] = themesflat_choose_opt( 'page_layout' );
		$classes [] = themesflat_choose_opt('bottom_style');

		/**
		 * Page Title absolute
		 */
		if ( themesflat_choose_opt('page_title_absolute')==1 ) {
			$classes[] = 'page-title-absolute';
		}

		/**
		 * Header Absolute
		 */
		if ( themesflat_choose_opt('header_absolute')==1 ) {
			$classes[] = 'header-absolute';
		}

		/**
		 * Topbar Absolute
		 */
		if ( themesflat_choose_opt('topbar_absolute')==1 ) {
			$classes[] = 'topbar-absolute';
		}

		return $classes;
	}
}

