<!-- Header -->
<header id="header" class="header widget-header <?php echo esc_attr( themesflat_choose_opt('header_style') ) ?>" >
    <div class="container sticky_hide">
        <div class="row">
            <div class="col-md-3">
                <?php get_template_part( 'tpl/header/brand'); ?>
            </div><!-- /.col-md-4 -->

            <div class="col-md-9">
                <div class="header-wrap">
                    <div class="wrap-header-content clearfix">                        
                        <?php 
                        if (themesflat_choose_opt ('show_header_button') == 1) {
                            echo wp_kses_post(themesflat_choose_opt ('header_button_text'));
                        }
                        ?>
                        
                        <?php echo wp_kses_post(themesflat_choose_opt ('header_content'));?>
                    </div><!-- wrap-widget-header -->
                </div>                
            </div><!-- /.col-md-8 -->            
        </div><!-- /.row -->
    </div><!-- /.container -->    

    <!-- Mainnav -->
    <div class="wrap-nav-s4">
        <div class="container">            
            <div class="col-md-12 clearfix">
                <div class="nav <?php echo esc_attr( themesflat_choose_opt('header_style') ) ?>">
                    <?php get_template_part( 'tpl/header/navigator'); ?>

                    <?php 
                        if (themesflat_choose_opt('show_addtocard_header') == 1) {
                            if(is_plugin_active('woocommerce/woocommerce.php')) {
                                themesflat_cart_count();
                            }
                        }                    
                    ?>

                    <?php if ( themesflat_choose_opt('header_searchbox') == 1 ) :?>
                    <div class="show-search">
                        <a href="#"><i class="fa fa-search"></i></a> 
                        <div class="submenu top-search widget_search">
                            <?php get_search_form(); ?>
                        </div>        
                    </div> 
                    <?php endif;?> 
                </div><!-- /.nav -->                               
            </div><!-- /.col-md-12 -->     
        </div><!-- /.container -->    
    </div><!-- /.wrap-nav -->
</header><!-- /.header -->