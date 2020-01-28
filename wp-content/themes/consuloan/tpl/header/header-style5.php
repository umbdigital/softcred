<!-- Header -->

<header id="header" class="header widget-header <?php echo esc_attr( themesflat_choose_opt('header_style') ) ?>" >

    <div class="nav">

        <div class="container-fluid">

            <div class="container">                

                <div class="header-wrap">

                    <div class="col-md-2">

                        <?php get_template_part( 'tpl/header/brand'); ?> 

                    </div><!-- col-md-3 -->

                    <div class="col-md-10">

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



                        <?php 

                            if (themesflat_choose_opt ('show_header_button') == 1) {

                                echo wp_kses_post(themesflat_choose_opt ('header_button_text'));

                            }                    

                        ?>

                        <div class="wrap-header-content-header-styte5">

                        <?php echo wp_kses_post(themesflat_choose_opt ('header_content'));?>

                        </div>



                        <?php get_template_part( 'tpl/header/navigator'); ?>  

                    </div><!-- /.col-md-9 -->                                       

                </div><!-- header-wrap --> 

            </div><!-- /.row -->

        </div><!-- /.container -->

    </div>

</header><!-- /.header -->   

