<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package consuloan
 */

if ( ! function_exists( 'themesflat_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time, post categories and author.
 */

function themesflat_widget_layout($columns) {
	$layout = array();
	switch ($columns) {
		case 1:
			$layout = array(12);
			break;
		case 2:
			$layout = array(6,6);
			break;
		case 3:
			$layout = array(4,4,4);
			break;
		case 4:
			$layout = array(3,3,3,3);
			break;
		case 5:
			$layout = array(2,2,2,2,2);
			break;
		default:
			$layout = array(12);
			break;
		
	}
	return $layout;
}

function themesflat_posted_on() { ?>	
	<?php if (themesflat_choose_opt('blog_archive_layout') == 'blog-list-small' || themesflat_choose_opt('blog_archive_layout') == 'blog-grid') : ?>	
	<ul class="meta-left">	
		<?php if ( themesflat_choose_opt('show_post_meta_date') == 1 ): ?>
		<li class="post-date">
			<a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a>			
		</li>
		<li class="dot">-</li>
	<?php 
		endif;
		if ( themesflat_choose_opt('show_post_meta_author') == 1 ):
	 ?>
		<li class="post-author">
			<?php			
			printf(
				'<span class="author vcard">By<a class="url fn n" href="%s" title="%s" rel="author"> %s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
				esc_attr( sprintf( esc_html__( 'View all posts by %s', 'consuloan' ), get_the_author() ) ),get_the_author());
			?>
		</li>
		<li class="dot">-</li>
	<?php endif; ?>
		<?php
		echo '<li class="post-categories">'.esc_html__("",'consuloan');
			the_category( ', ' );
		echo '</li>';
		?>		
	</ul>
	<?php 

	elseif (themesflat_choose_opt('blog_archive_layout') == 'blog-list' || themesflat_choose_opt('blog_archive_layout') == 'blog-list-full-width'):	
		?>
		<ul class="meta-left">
		<?php if ( themesflat_choose_opt('show_post_meta_author') == 1 ):?>
			<li class="post-author">
				<?php			
				printf(
					'<span class="author vcard"><a class="url fn n" href="%s" title="%s" rel="author"> %s</a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
					esc_attr( sprintf( esc_html__( 'View all posts by %s', 'consuloan' ), get_the_author() ) ),get_the_author());
				?>
			</li>			
		<?php endif; ?>	
		<?php if ( themesflat_choose_opt('show_post_meta_date') == 1 ): ?>
			<li class="dot">-</li>
			<li class="post-date">
				<a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a>			
			</li>
		<?php endif;?>		
	</ul>
		<?php
		echo '<ul class="meta-right">';
			echo '<li class="post-categories"><i class="fa fa-tag" aria-hidden="true"></i>'.esc_html__("",'consuloan');
				the_category( ', ' );
			echo '</li>';
			echo'<li class="post-comments"><i class="fa fa-comments-o" aria-hidden="true"></i>';
					comments_number ();
			echo '</li>';
		echo'</ul>';
	
	endif;
}

function themesflat_posted_meta_single() { ?>	
	<ul class="meta-left">	
		<li class="post-author">
			<?php			
			printf(
				'<span class="author vcard"><a class="url fn n" href="%s" title="%s" rel="author"> %s</a></span>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
				esc_attr( sprintf( esc_html__( 'View all posts by %s', 'consuloan' ), get_the_author() ) ),get_the_author());
			?>
		</li>
		<li class="dot">|</li>		
		<li class="post-date">
			<a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a>			
		</li>
		<li class="dot">|</li>			
		<?php
		echo '<li class="post-categories">'.esc_html__("",'consuloan');
			the_category( ', ' );
		echo '</li>';
		?>		
	</ul>
<?php
}
endif;

if ( ! function_exists( 'themesflat_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function themesflat_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', ', ' );
		if ( $tags_list && is_single() ) {
			printf( '<div class="tags-links"><strong>Tags:</strong>' . esc_html__( ' %1$s', 'consuloan' ) . '</div>', 
				$tags_list );
		}
	}
	if ( themesflat_get_opt('show_social_share') == 1 ) {
		echo '<div class="wrap-social-share-article">';
			get_template_part('tpl/social-share');
		echo '</div>';
	}
	
	edit_post_link( esc_html__( 'Edit', 'consuloan' ), '<div class="clearboth"><span class="edit-link">', '</span></div>' );
}
endif;

if ( ! function_exists( 'themesflat_post_navigation' ) ) :
function themesflat_post_navigation() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation posts-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'consuloan' ); ?></h2>
		<ul class="nav-links clearfix">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '<li>%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Published In', 'consuloan' ) ) );
			else :
				previous_post_link( '<li class="previous-post">%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Previous Post', 'consuloan' ) ) );
				next_post_link( '<li class="next-post">%link</li>', sprintf( '<span class="meta-nav">%s</span> %%title', esc_html__( 'Next Post', 'consuloan' ) ) );
			endif;
			?>
		</ul><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;