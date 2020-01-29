<?php
/*
Template Name: Portfolio
*/

get_header(); ?>
<div class="col-md-12">    
    <div class="themesflat-portfolio content-area">
        <?php
        global $themesflat_paging_style;
        $show_filter = themesflat_choose_opt('show_filter_portfolio');
        $columns = themesflat_choose_opt('portfolio_grid_columns');
        $limit = themesflat_choose_opt('portfolio_post_perpage');
        $style = themesflat_choose_opt('portfolio_style');
        $style = themesflat_choose_opt('portfolio_style');
        $themesflat_paging_style = themesflat_choose_opt('portfolio_archive_pagination_style');
        $category_order = themesflat_choose_opt('portfolio_category_order')  ;
        $orderby = themesflat_choose_opt('portfolio_order_by');
        $order = themesflat_choose_opt('portfolio_order_direction');        
        $show_filter = ( $show_filter == 1 ) ? 'yes' : 'no';    
        $exclude = themesflat_choose_opt('portfolio_exclude'); 
        $show_date = themesflat_choose_opt('show_date_portfolio');   
        $show_date_portfolio = '';
        if ($show_date == 1) {
            $show_date_portfolio = 'yes';
        }

        $show_readmore = themesflat_choose_opt('show_readmore_portfolio');
        $show_readmore_portfolio = '';
        if ($show_readmore == 1) {
            $show_readmore_portfolio = 'yes';
        } 

        $show_content_portfolio = themesflat_choose_opt('show_content_portfolio');  
        $show_content = 'no'; 
        if ($show_content_portfolio == 1) {
            $show_content = 'yes';
        }

        $content_length = themesflat_choose_opt('portfolio_content_length');
        
        $args = array(
            'style' => $style,
            'limit' => $limit,
            'columns' => $columns,
            'cat_order' => $category_order,
            'show_filter' => $show_filter,
            'orderby'   => $orderby,
            'order' => $order,  
            'exclude' => $exclude,
            'show_date_portfolio'   => $show_date_portfolio,
            'show_readmore_portfolio' => $show_readmore_portfolio,
            'show_content'  => $show_content,
            'content_length' => $content_length
            );       
        ?>
        <?php
        if (class_exists('themesflat_VCExtend')) {
            echo themesflat_VCExtend::themesflat_portfolio( $args );
        }
        ?>
    </div><!-- /.portfolio-container -->   
    <?php get_sidebar();?>    
</div><!-- /.col-md-12 -->
<div class="col-md-12">
    <?php
    global $themesflat_paging_for ;    
    $themesflat_paging_for = 'portfolio';
    if (themesflat_get_opt('show_pagination_portfolio') == 1) {
        get_template_part( 'tpl/pagination' );
    }                  
    ?> 
    <?php get_template_part( 'tpl/counter-posts' ); ?>  
</div>
<?php get_footer(); ?>