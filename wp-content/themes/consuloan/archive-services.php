<?php
/*
Template Name: Services
*/

get_header(); ?>
<div class="col-md-12">    
    <div class="themesflat-services content-area">
    <?php
        global $themesflat_paging_style;
        $services_columns = themesflat_choose_opt('services_grid_columns');
        $limit = themesflat_choose_opt('services_post_perpage');
        $hide_content_services = themesflat_choose_opt('hide_content_services');  
        $hide_content = 'no'; 
        if ($hide_content_services == 1) {
            $hide_content = 'yes';
        }

        $content_length = themesflat_choose_opt('services_archive_post_excepts_length');
        
        $args = array(
            'limit' => $limit,
            'services_columns' => $services_columns,
            'hide_content'  => $hide_content,
            'content_length' => $content_length
            );       
        ?>
        <?php
        if (class_exists('themesflat_VCExtend')) {
            echo themesflat_VCExtend::themesflat_services( $args );            
        }
        ?>
    </div><!-- /.services-container -->   
    <?php get_sidebar();?>    
</div><!-- /.col-md-12 -->
<div class="col-md-12">
    <?php
    global $themesflat_paging_for ;    
    $themesflat_paging_for = 'services';
    if (themesflat_get_opt('show_pagination_services') == 1) {
        get_template_part( 'tpl/pagination' );
    }                  
    ?> 
    <?php get_template_part( 'tpl/counter-posts' ); ?>  
</div>
<?php get_footer(); ?>