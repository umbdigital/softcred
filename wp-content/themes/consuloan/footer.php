<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the #content div and all content after

 *

 * @package consuloan

 */

?>



            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- #content -->

    <!-- Footer -->

    

    <div class="footer_background">

        <?php if (themesflat_get_opt('show_footer') == 1): ?> 

        <footer class="footer <?php (themesflat_meta( 'footer_class' ) != "" ? esc_attr( themesflat_meta( 'footer_class' ) ):'') ;?>">      

            <div class="container">

                <div class="row"> 

                 <div class="footer-widgets">

                    <?php

                    global $themesflat_mainID;

                    $footer_controls = themesflat_decode(themesflat_choose_opt('footer_controls',$themesflat_mainID));

                    themesflat_render_box_position(".footer",$footer_controls);



                    $columns = themesflat_widget_layout(themesflat_choose_opt('footer_widget_areas',$themesflat_mainID));                    

                    $key = 0;

                    if (themesflat_choose_opt('footer_widget_areas') == 5 ) {

                        echo '<div class="col-md-12">';

                        for ( $widget_footer_columns = 0; $widget_footer_columns < 5;$widget_footer_columns++ ) {?>

                        <div class="flat-widget-footer">

                            <?php 

                                $key = $widget_footer_columns +1;

                                $widget = "footer-".$key;

                                themesflat_dynamic_sidebar($widget);

                            ?>

                        </div>

                    <?php }

                    echo '</div>';

                    } else {

                        foreach ($columns as $key => $column) {?>

                        <div class="col-md-<?php themesflat_esc_attr($column);?> col-sm-6">

                            <?php 

                                $key = $key +1;

                                if ($key == 1) {
                                    if ( themesflat_choose_opt('enable_footer_social') == 1 ):
                                        themesflat_render_social();    
                                    endif;    
                                }

                                $widget = themesflat_choose_opt("footer".$key,$themesflat_mainID);

                                themesflat_dynamic_sidebar($widget);

                            ?>

                        </div>

                    <?php }

                    }

                    ?>

                   

                    </div><!-- /.footer-widgets -->           

                </div><!-- /.row -->    

            </div><!-- /.container -->   

        </footer>

        <?php endif ?>

        <!-- Bottom -->

        <?php if ( themesflat_choose_opt( 'show_bottom') == 1 ) : ?>

        <div class="bottom ">

            <div class="container">           

                <div class="row">

                    <div class="col-md-6">                        

                        <div class="copyright">                     

                            <?php echo wp_kses_post(themesflat_choose_opt( 'footer_copyright')); ?>

                        </div>

                    </div><!-- /.col-md-6 -->



                    <div class="col-md-6 text-right">

                        <?php if ( themesflat_choose_opt('enable_footer_social') == 1 ):

                                themesflat_render_social();    

                            endif;    

                        ?>    

                    </div>



                    <?php if ( themesflat_choose_opt( 'go_top') == 1 ) : ?>

                        <!-- Go Top -->

                        <a class="go-top show">

                            <i class="fa fa-chevron-up"></i>

                        </a>

                    <?php endif; ?>                    

                </div><!-- /.row -->

            </div><!-- /.container -->

        </div> 

        <?php endif; ?>   

    </div> <!-- Footer Background Image -->    

</div><!-- /#boxed -->

<?php wp_footer(); ?>

</body>

</html>