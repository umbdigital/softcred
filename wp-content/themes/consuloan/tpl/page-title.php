<?php 
    if ( is_page() && is_page_template( 'tpl/front-page.php' ) ) {
        echo '<div class="clearfix"></div>';
        return;
    }

    $title = esc_html__( 'Archives', 'consuloan' );

    if ( is_home() ) {
        if (is_front_page() ) {
            $title = esc_html__( 'Home', 'consuloan' );
        }
        else {
            $title = esc_html( wp_title('',FALSE) );
        }
    } elseif ( is_singular() ) {
        if (is_single()) {
            $title = get_the_title();
        }elseif(is_page_template('tpl/page_single.php')) {
            $title = get_the_title();
        }
         elseif(is_page_template('tpl/page_no_title.php')) {
            $title = '';
        }else {
            $title = get_the_title();
        }
    } elseif ( is_search() ) {
        $title = sprintf( esc_html__( 'Search results for &quot;%s&quot;', 'consuloan' ), get_search_query() );
    } elseif ( is_404() ) {
        $title = esc_html__( 'Not Found', 'consuloan' );
        return;
    } elseif ( is_author() ) {
        the_post();
        $title = sprintf( esc_html__( 'Author Archives: %s', 'consuloan' ), get_the_author() );
        rewind_posts();
    } elseif ( is_day() ) {
        $title = sprintf( esc_html__( 'Daily Archives: %s', 'consuloan' ), get_the_date() );
    } elseif ( is_month() ) {
        $title = sprintf( esc_html__( 'Monthly Archives: %s', 'consuloan' ), get_the_date( 'F Y' ) );
    } elseif ( is_year() ) {
        $title = sprintf( esc_html__( 'Yearly Archives: %s', 'consuloan' ), get_the_date( 'Y' ) );
    } elseif ( is_tax() || is_category() || is_tag() ) {
        $title = single_term_title( '', false );
    }
?>

<?php if (themesflat_choose_opt('show_page_title') != 1 || $title =='' ) return;?>
<!-- Page title -->
<div class="page-title">
    <div class="overlay"></div>   
    <div class="container"> 
        <div class="row">
            <div class="col-md-12 page-title-container">
            <?php 
            if ( themesflat_choose_opt('show_page_title_heading') == 1 ) {
                printf('<h1>%s</h1>',$title);
             }                 
            ?>
            <?php 
                if ( themesflat_choose_opt( 'breadcrumb_enabled' ) == 1 ):
                    themesflat_breadcrumb_trail( array(
                        'separator'   => themesflat_choose_opt('breadcrumb_separator'),
                        'show_browse' => true,
                        'labels'      => array(
                        'browse'  => themesflat_choose_opt( 'bread_crumb_prefix', esc_html__( '', 'consuloan' ) ),
                            'home'    => esc_html__( 'Home', 'consuloan' )
                        )
                    ) );
                
                endif;                       
            ?>             
            </div><!-- /.col-md-12 -->  
        </div><!-- /.row -->  
    </div><!-- /.container -->                      
</div><!-- /.page-title --> 