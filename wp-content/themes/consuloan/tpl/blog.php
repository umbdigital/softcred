<?php
/*
Template Name: Blog
*/

get_header(); ?>
<?php 
$sidebar_layout = themesflat_choose_opt('page_layout');
$class = array();
$class[] = $sidebar_layout;
?>
<div class="col-md-12">
    <div id="primary" class="content-area <?php echo esc_attr(implode(" ",$class));?>">
    <?php
    global $themesflat_paging_style;
    $layouts = themesflat_choose_opt('blog_archive_layout');
    $exclude = themesflat_choose_opt('blog_archive_exclude');
    $grid_columns = themesflat_choose_opt('blog_grid_columns');
    $themesflat_paging_style = themesflat_choose_opt('blog_archive_pagination_style');
    $total = themesflat_choose_opt('blog_posts_per_page');
    $content_length = themesflat_choose_opt('blog_archive_post_excepts_length');        
    $show_readmore = themesflat_choose_opt('blog_archive_readmore');
    $readmore_text = themesflat_choose_opt('blog_archive_readmore_text');
    $show_post_meta_date = themesflat_choose_opt('show_post_meta_date');
    $show_post_meta_author = themesflat_choose_opt('show_post_meta_author');
    $hide_content = themesflat_choose_opt('hide_content');
    $hide_readmore = 'no';
    if ( $show_readmore == 0 ) {
        $hide_readmore = 'yes';
    }
    $orderby = themesflat_choose_opt('blog_order_by');
    $order = themesflat_choose_opt('blog_order_direction');
    
    $args = array(
        'layout' => $layouts,
        'grid_columns' => $grid_columns,
        'content_length' => $content_length,
        'hide_readmore' => $hide_readmore,           
        'readmore_text' => $readmore_text,
        'order'     => $order,
        'orderby'   => $orderby,
        'exclude' => $exclude,
        'limit' => $total,
        'show_post_meta_date' => $show_post_meta_date,
        'show_post_meta_author' => $show_post_meta_author,
        'hide_content' => $hide_content
        );       
        ?>
        <?php 
        if (class_exists('themesflat_VCExtend')) {
            echo themesflat_VCExtend::themesflat_posts( $args ) ;
        }
        ?>
        <div class="clearfix"></div>
        <?php
        global $themesflat_paging_for ;    
        $themesflat_paging_for = 'blog';   
        get_template_part( 'tpl/pagination' );              
        ?>
        <?php get_template_part( 'tpl/counter-posts' ); ?>
    </div>   <!-- #primary -->   
    <?php get_sidebar();?>
</div><!-- /.col-md-12 -->
<?php get_footer(); ?>