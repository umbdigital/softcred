<?php 
// Ignore ouput topbar when it isn't enabled
$top_status = themesflat_choose_opt('topbar_enabled');
$top_content = themesflat_choose_opt('top_content');
$button_topbar = themesflat_choose_opt('button_topbar');
if ( $top_status != 1 ) return;
?>
<!-- Top -->
<div class="themesflat-top">    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container-inside">
                    <div class="content-left text-left">
                    <?php
                        echo wp_kses_post($top_content);
                    ?>
                    </div>

                    <div class="content-right text-right">
                    <?php                              
                        if ( themesflat_choose_opt('enable_content_right_top') == 1 ):                           

                            if (themesflat_choose_opt('enable_language_switch') == 1) { 
                                if ( is_active_sidebar('languages-sidebar') ) {
                                    themesflat_dynamic_sidebar('languages-sidebar');                    
                                }else {
                                    themesflat_language_switch();
                                }
                            } 

                            if ( themesflat_choose_opt('enable_social_link_top') == 1 ):
                                themesflat_render_social();    
                            endif; 

                            if ( themesflat_choose_opt('topbar_searchbox') == 1 ) :?>
                                <div class="show-search">
                                    <a href="#"><i class="fa fa-search"></i></a> 
                                    <div class="submenu top-search widget_search">
                                        <?php get_search_form(); ?>
                                    </div>        
                                </div> 
                            <?php endif; 

                            if (themesflat_choose_opt('show_addtocard_topbar') == 1) {
                                if(is_plugin_active('woocommerce/woocommerce.php')) {
                                    themesflat_cart_count();
                                }
                            }  

                            if (themesflat_choose_opt('show_button_topbar') == 1) {
                                echo wp_kses_post( $button_topbar );  
                            }                   
                                               
                        endif;                
                    ?>
                    </div>

                </div><!-- /.container-inside -->
            </div>
        </div>
    </div><!-- /.container -->        
</div><!-- /.top -->