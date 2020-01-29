<?php
get_header(); ?>
<div class="col-md-12">
    <div class="themesflat-portfolio content-area">
        <?php
        global $themesflat_paging_style;
        $show_filter = themesflat_choose_opt('show_filter_portfolio');
        $columns = themesflat_choose_opt('portfolio_grid_columns');
        $limit = themesflat_choose_opt('portfolio_post_perpage');
        $style = themesflat_choose_opt('portfolio_style');
        $themesflat_paging_style = themesflat_choose_opt('portfolio_archive_pagination_style');
        $category = get_query_var('portfolios_category');      
        $orderby = themesflat_choose_opt('portfolio_order_by');
        $order = themesflat_choose_opt('portfolio_order_direction');        
        $show_filter = ( $show_filter == 1 ) ? 'yes' : 'no';
        $args = array(
            'style' => $style,
            'limit' => $limit,
            'columns' => $columns,
            'show_filter' => $show_filter,
            'orderby'   => $orderby,
            'category'      => $category,
            'order' => $order,  
            );       
        ?>
        <?php 
        if (class_exists('themesflat_VCExtend')) {
            echo themesflat_VCExtend::themesflat_portfolio( $args ) ;
        }?>
        </div><!-- /.portfolio-container -->
    </div><!-- /.portfolio-masonry -->
        <?php get_sidebar();?> 
</div><!-- /.col-md-12 -->
<div class="col-md-12">
    <?php
    global $themesflat_paging_for ;    
    $themesflat_paging_for = 'portfolio';   
    get_template_part( 'tpl/pagination' ); 
    ?>   
</div>
<?php get_footer(); ?>