<?php
if ( ! class_exists('themesflat_VCExtend') ) {
	class themesflat_VCExtend {
		function __construct() {
			// We safely integrate with VC with this hook
			add_action( 'init', array( $this, 'integrateWithVC' ) );

			// Use this when creating a shortcode addon
			$shortcodes = 'themesflat_portfolio,themesflat_posts,themesflat_services';
			$shortcodes = explode(",", $shortcodes);
			$shortcodes = array_map("trim", $shortcodes);
			foreach ( $shortcodes as $shortcode ) {
				add_shortcode($shortcode, array( $this, $shortcode ) );
			} 
		}

		public function integrateWithVC() {
	        // Check if Visual Composer is installed
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
	            // Display notice that Visual Compser is required
				add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
				return;
			}		
			
			//portfolio option
			$category_portfolio = get_terms( 'portfolios_category','orderby=name&hide_empty=0' );
			$category_portfolio_name[] = 'All';
			$category_order = array();

			foreach ( $category_portfolio as $category ) {
				
				$category_portfolio_name[$category->name] = $category->slug;
				$category_order[] = $category->slug;		
			}

			$category_order = implode(',', $category_order);			

			vc_map( array(
				'base'        => 'themesflat_portfolio',
				'icon'        => THEMESFLAT_ICON,
				'name'        => esc_html__( 'Themesflat: Portfolio', 'consuloan' ),
				'category'    => esc_html__( 'Consuloan', 'consuloan' ),
				'params'      => array(
					array(
						"type"        => "dropdown",
						"heading" => esc_html__("Category", 'consuloan'),
						"param_name" => "category",
						"value"       => $category_portfolio_name,
						"description" => esc_html__("Display Posts From Some Categories.", 'consuloan'),
						),	

					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Style', 'consuloan' ),
						'param_name' => 'style',
						'value' => array(
							esc_html__( 'Grid', 'consuloan' )              => 'grid',
							esc_html__( 'Grid 2', 'consuloan' )         	 => 'grid2',
							esc_html__( 'Grid 3', 'consuloan' )         	 => 'grid3',							
							esc_html__( 'Grid No Padding', 'consuloan' )   => 'grid-no-padding',
							esc_html__( 'Grid No Padding 2', 'consuloan' )   => 'grid-no-padding2',
							esc_html__( 'List Small', 'consuloan' )         	 => 'list-small',
							esc_html__( 'Grid Masonry', 'consuloan' )              => 'masonry',
							)
						),

					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Grid Columns', 'consuloan' ),
						'param_name' => 'columns',
						'value'      => array(
							esc_html__( '3 Columns', 'consuloan' ) => 'one-three',						
							esc_html__( '4 Columns', 'consuloan' ) => 'one-four',
							esc_html__( '5 Columns', 'consuloan' ) => 'one-five',
							esc_html__( '6 Columns', 'consuloan' ) => 'one-six'
							)
						),

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Number Of Items', 'consuloan' ),
						'param_name' => 'limit',
						'value'      => 6
						),			

					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Exclude', 'consuloan' ),
						'param_name'  => 'exclude',
						'description' => esc_html__( 'Not Show These Portfolios By IDs EX:1,2,3', 'consuloan' ),
						),	

					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Enable Carousel Mode', 'consuloan' ),
						'param_name' => 'enable_carousel',
						'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 'yes' )
						),

					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Hide Title Portfolio', 'consuloan' ),
						'param_name' => 'hide_title',
						'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 'yes' ),
						),

					array(
						'type' => 'checkbox',
						'heading' => esc_html__( 'Hide Category Portfolio', 'consuloan' ),
						'param_name' => 'hide_category',
						'value' => array( esc_html__( 'Yes, Please', 'consuloan' ) => 'yes' )
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Show Portfolio Content', 'consuloan' ),
						'param_name' => 'show_content',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 'yes'
							)
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Show Read More', 'consuloan' ),
						'param_name' => 'show_readmore_portfolio',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 'yes'
							)
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Show Date', 'consuloan' ),
						'param_name' => 'show_date_portfolio',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 'yes'
							)
						),

					array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show Filter', 'consuloan' ),
						'param_name' => 'show_filter',
						'description' => esc_html__( 'If "YES" Portfolio Filter Will Be Shown.', 'consuloan' ),
						'value' => array(
							esc_html__( 'No', 'consuloan' ) => 'no',
							esc_html__( 'Yes, Please', 'consuloan' ) => 'yes'							
							),
						'dependency' => array(
							'element' => 'enable_carousel',
							'is_empty' => true)
						),

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Categories Order', 'consuloan' ),
						'param_name' => 'cat_order',
						'dependency' => array(
							'element' => 'show_filter',
							'value'	=> 'yes'
							),
						'description'=> 'Categories Order Split By ","',
						'value'      => $category_order
						),					

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Portfolio Content Length', 'consuloan' ),
						'param_name' => 'content_length',
						'value'      => 150
						),

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Extra Class', 'consuloan' ),
						'param_name' => 'class'
						),

					array(
						'type' => 'css_editor',
						'param_name' => 'css',
						'group' => esc_html__( 'Design Options', 'consuloan' )
						)
					)

			));    
			
			/**
			 * Map the post shortcode
			 */
			$category_posts = get_terms( 'category' );
			$category_posts_name[] = 'All';
			foreach ( $category_posts as $category_post ) {
				$category_posts_name[$category_post->name] = $category_post->slug;		
			}

			vc_map( array(
				'name'                    => esc_html__( 'Themesflat: Blog Posts', 'consuloan' ),
				'base'                    => 'themesflat_posts',
				'icon'        => THEMESFLAT_ICON,
				'category'    => esc_html__( 'Consuloan', 'consuloan' ),
				'params'                  => array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Widget Title', 'consuloan' ),
						'param_name'  => 'title',
						'description' => esc_html__( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'consuloan' )
						),

					array(
						"type"        => "dropdown",
						"heading" => esc_html__("Category", 'consuloan'),
						"param_name" => "category_post",
						"value"       => $category_posts_name,
						"description" => esc_html__("Display Posts From Some Categories.", 'consuloan'),
						),

					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__( 'Layout', 'consuloan' ),
						'param_name' => 'layout',
						'value'      => array(
							esc_html__( 'List small', 'consuloan' ) => 'blog-list-small',
							esc_html__( 'List', 'consuloan' ) => 'blog-list',
							esc_html__( 'List Full Width', 'consuloan' ) => 'blog-list-full-width',	
							esc_html__( 'Grid', 'consuloan' ) => 'blog-grid',
							esc_html__( 'Grid Image Left', 'consuloan' ) => 'blog-grid-image-left',
							esc_html__( 'Grid Masonry', 'consuloan' )   => 'blog-masonry',
							)
						),

					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Grid Columns', 'consuloan' ),
						'param_name'  => 'grid_columns',
						'description' => esc_html__( 'The number of columns for grid and grid masonry layout', 'consuloan' ),
						'dependency' => array(
							'element' => 'layout',
							'value'	=> array('blog-grid','blog-grid-image-left','blog-masonry'),
							),
						'value'       => array(							
							esc_html__( '3 Columns', 'consuloan' ) => 3,	
							esc_html__( '2 Columns', 'consuloan' ) => 2,						
							esc_html__( '4 Columns', 'consuloan' ) => 4
							)
						),

					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Limit', 'consuloan' ),
						'param_name'  => 'limit',
						'description' => esc_html__( 'The Number Of Posts Will Be Shown', 'consuloan' ),
						'value'       => 9
						),

					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'consuloan' ),
						'param_name'  => 'exclude',
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Hide Post Content', 'consuloan' ),
						'param_name' => 'hide_content',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 1
							)
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Enable Carousel', 'consuloan' ),
						'param_name' => 'blog_carousel',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 'yes'
							)
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Show Post Meta Date', 'consuloan' ),
						'param_name' => 'show_post_meta_date',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 1
							)
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Show Post Meta Author', 'consuloan' ),
						'param_name' => 'show_post_meta_author',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 1
							)
						),

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Post Content Length', 'consuloan' ),
						'param_name' => 'content_length',
						'value'      => 150
						),

					array(
						'type'       => 'checkbox',
						'heading'    => esc_html__( 'Hide Read More', 'consuloan' ),
						'param_name' => 'hide_readmore',
						'value'      => array(
							esc_html__( 'Yes, please', 'consuloan' ) => 'yes'
							)
						),

					array(
						'type'       => 'textfield',
						'heading'    => esc_html__( 'Read More Text', 'consuloan' ),
						'param_name' => 'readmore_text',
						'value'      => htmlspecialchars_decode(esc_html__( 'Read More <i class="fa fa-chevron-right" aria-hidden="true"></i>', 'consuloan' ))
						),

					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Extra Class Name', 'consuloan' ),
						'param_name'  => 'class',
						'description' => esc_html__( 'Your Custom Class Ex: center right padding-right-40', 'consuloan' )
						),

					array(
						'type'       => 'css_editor',
						'param_name' => 'css',
						'group'      => esc_html__( 'Design Options', 'consuloan' )
						)
					)
			) );

			// services option

			$category_services = get_terms('services_category');
			$category_servicesname[] = 'All';

			foreach($category_services as $category){
				$category_servicesname[$category->name] = $category->slug;
			}

			$icons_params = themesflat_map_icons('icon', 'Icon for readmore');
			vc_map(array(
				'name' => esc_html__('Themesflat: Services', 'consuloan') ,
				'base' => 'themesflat_services',
				'icon' => THEMESFLAT_ICON,
				'category' => esc_html__('Consuloan', 'consuloan') ,
				'params' => array_merge(array(
					array(
						"type" => "dropdown",
						"heading" => esc_html__("Category", 'consuloan') ,
						"param_name" => "category_post",
						"value" => $category_servicesname,
						"description" => esc_html__("Display posts from some categories.", 'consuloan') ,
					) ,
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Columns', 'consuloan') ,
						'param_name' => 'services_columns',
						'value' => array(
							esc_html__( '3 Columns', 'consuloan' ) => 'one-three',						
							esc_html__( '4 Columns', 'consuloan' ) => 'one-four',
						)
					) ,
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Limit', 'consuloan') ,
						'param_name' => 'limit',
						'description' => esc_html__('The number of posts will be shown', 'consuloan') ,
						'value' => 9
					) ,
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Hide Post Content', 'consuloan') ,
						'param_name' => 'hide_title',
						'value' => array(
							esc_html__('Yes, please', 'consuloan') => 'yes'
						)
					) ,
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Hide Post Content', 'consuloan') ,
						'param_name' => 'hide_content',
						'value' => array(
							esc_html__('Yes, please', 'consuloan') => 'yes'
						)
					) ,
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Show pagination', 'consuloan') ,
						'param_name' => 'show_pagination',
						'value' => array(
							esc_html__('Yes, please', 'consuloan') => 'yes'
						)
					) ,
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Post Content Length', 'consuloan') ,
						'param_name' => 'content_length',
						'value' => 150
					) ,
					array(
						'type' => 'checkbox',
						'heading' => esc_html__('Hide Read More', 'consuloan') ,
						'param_name' => 'hide_readmore',
						'value' => array(
							esc_html__('Yes, please', 'consuloan') => 'yes'
						)
					) ,
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Read More Text', 'consuloan') ,
						'param_name' => 'readmore_text',
						'value' => esc_html__('Read More', 'consuloan')
					)
				) , $icons_params, array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Extra class name', 'consuloan') ,
						'param_name' => 'class',
						'description' => esc_html__('Your custom class', 'consuloan')
					)
				))
			));

			
			
		}

		// Portfolio render
		public static function themesflat_portfolio( $atts, $content = null ) {
			$atts = vc_map_get_attributes( 'themesflat_portfolio', $atts );
			extract (apply_filters( 'themesflat/shortcode/themesflat_portfolio_atts',$atts));

			if ( empty( $atts['enable_carousel'] ) ) $atts['enable_carousel'] = 'no';
			if ( empty( $atts['show_filter'] ) ) $atts['show_filter'] = 'no';
			if ( empty( $atts['show_content'] ) ) $atts['show_content'] = 'no';

			ob_start();
			$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content

			$limit = intval( $limit );		
			$terms_slug = wp_list_pluck( get_terms( 'portfolios_category','orderby=name&hide_empty=0'), 'slug' );
			$filters 	= wp_list_pluck( get_terms( 'portfolios_category','orderby=name&hide_empty=0'), 'name','slug' ); 

			$tax =  $terms_slug;

			if ( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif ( get_query_var('page') ) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}    

			$query_args = array(
				'post_type' => 'portfolios',
				'posts_per_page' => $limit,
				'paged' => $paged,          
				'order' => themesflat_choose_opt('portfolio_order_direction'),
				'orderby' => themesflat_choose_opt('portfolio_order_by'),
				);
			if ( $category != 'All' ) {            
				$tax = $category;
				$query_args['tax_query'] = array(
					array(
						'taxonomy' => 'portfolios_category',   
						'field'    => 'slug',                   
						'terms'    => $tax,
						),
					);
			}		

			if ( ! empty( $atts['exclude'] ) ) {
				$exclude = $atts['exclude'];				
				if ( ! is_array( $exclude ) )
					$exclude = explode( ',', $exclude );

				$query_args['post__not_in'] = $exclude;
			}

			$query = new WP_Query( $query_args );
			$GLOBALS['wp_query']->max_num_pages = $query->max_num_pages; 

			if ( ! $query->have_posts() )
				return;
			$enable_carousel_class ='';
			if ($atts['enable_carousel'] == 'yes') {
				$enable_carousel_class = 'themesflat_enable_carousel';
			}

			echo '<div class="themesflat-portfolio clearfix '.esc_attr($enable_carousel_class).' '.esc_attr( $style ).'">'; 
			$show_filter_portfolio = '';

			//Build the filter navigation
			if ( $show_filter == 'yes' && $enable_carousel != 1) {	
				$show_filter_portfolio = 'show_filter_portfolio';     	
					echo '<ul class="portfolio-filter '.esc_attr( $class ).'"><li class="active"><a data-filter="*" href="#">' . esc_html__( 'All', 'consuloan' ) . '</a></li>'; 
					if ($cat_order == '') { 

						foreach ($filters as $key => $value) {
							echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $value ) . '">' . esc_html( $value ) . '</a></li>'; 
						}
					
					}
					else {
						$cat_order = explode(",", $cat_order);
						foreach ($cat_order as $key) {
							$key = trim($key);
							echo '<li><a data-filter=".' . esc_attr( strtolower($key)) . '" href="#" title="' . esc_attr( $filters[$key] ) . '">' . esc_html( $filters[$key] ) . '</a></li>'; 
						}
					}
	                echo '</ul>'; //portfolio-filter
	        } 

	        if (!empty($columns)) {
	        	if ($columns == 'one-half') {
	        		$data_item = 2;
	        	}elseif ($columns == 'one-three') {
	        		$data_item = 2;
	        	}elseif ($columns == 'one-four') {
	        		$data_item = 3.9;
	        	}elseif ($columns == 'one-five') {
	        		$data_item = 3.15;
	        	}elseif ($columns == 'one-six') {
	        		$data_item = 3.78;
	        	}

	        }
	        echo '<div class="portfolio-container '.esc_attr( $class ).' '.esc_attr( $style ).' '.esc_attr( $columns ).' '.esc_attr( $show_filter_portfolio ).'" data-item="'.esc_attr($data_item).'">';        
	        while ( $query->have_posts() ) : $query->the_post();
	        global $post;
	        $id = $post->ID;
	        $termsArray = get_the_terms( $id, 'portfolios_category' );
	        $termsString = "";

	        if ( $termsArray ) {
	        	foreach ( $termsArray as $term ) {
	        		$itemname = strtolower( $term->slug ); 
	        		$itemname = str_replace( ' ', '-', $itemname );
	        		$termsString .= $itemname.' ';
	        	}
	        }

	        $imgs = array(
	        	'grid' => 'themesflat-portfolio-grid',
	        	'grid2' => 'themesflat-case2',
	        	'grid3' => 'themesflat-case2',	        	
	        	'grid-no-padding' => 'themesflat-case3',
	        	'grid-no-padding2' => 'themesflat-case4',
	        	'list-small' => 'themesflat-portfolio-listsmall',
	        	'masonry' => 'themesflat-case-single',
	        	);
	        $img_portfolio = $imgs[$style];

	        $link_img = ($style == "grid" || $style == "grid-no-padding") ? themesflat_thumbnail_url( $img_portfolio ) : get_the_permalink();
	        $popup_gallery = ($style == "grid" || $style == "grid-no-padding") ? 'popup-gallery' : '';
	       
	        if ( has_post_thumbnail() ):	

	        // Enqueue shortcode assets
	        echo '<div class="item ' . $termsString . '">';
	        echo '<div class="wrap-border">';
	        echo '<div class="featured-post "><a href="'. get_the_permalink() .'">';
	        	the_post_thumbnail( $img_portfolio );	        			                                                                   
	        echo '</a></div>';
	        $portfolio_hide ='';
	        if ($hide_category == 'yes' && $hide_title == 'yes' && $atts['show_content'] == 'no') {
	        	$portfolio_hide = 'hide';
	        }

	        echo '<div class="portfolio-details '.esc_attr($portfolio_hide).'"><div class="portfolio-details-content">';
	        if ( $hide_category != 'yes' ) {	
	        	echo '<div class="category-post-1">';
	        	echo the_terms( get_the_ID(), 'portfolios_category', 
	        		'', ' / ', '' );                        
	        	echo '</div>';     
	        }

	        echo '<div class="line"></div>';

	        if ( $hide_title != 'yes' ) {
	        	echo '<div class="title-post"><a title="' . get_the_title() . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
	        }
	        
	        if ( $hide_category != 'yes' ) {	
	        	echo '<div class="category-post-2">';
	        	echo the_terms( get_the_ID(), 'portfolios_category', 
	        		'', ' / ', '' );                        
	        	echo '</div>';     
	        }	

	        if ( $show_date_portfolio == 'yes' ) {
	        	echo '<div class="date"><a href="'. get_the_permalink() .'">';
	        	echo esc_attr( get_the_date() ); 
	        	echo '</a></div>';
	        }  
	        

	        if ( $atts['show_content'] != 'no' ):
	        	?>
	        
	        <div class="entry-content">

	        	<?php
	        	$content = get_the_content();
	        	$content = trim( strip_tags( $content ) );
	        	$length  = intval( '0' . $atts['content_length'] );
	        	$length  = max( $length, 1 );

	        	if ( mb_strlen( $content ) > $length ) {
	        		$content = mb_substr( $content, 0, $length );
	        		$content.= '...';
	        	}

	        	echo wp_kses_post( $content );
	        	?>					

	        </div>   		
    		
	        <?php 
        	if ( $show_readmore_portfolio == 'yes' ) {
        		echo '<div class="themesflat-button-container"><a class="themesflat-button" href="' . get_the_permalink() . '">READ MORE <i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>';
	        }
	        ?>	        

		    <?php endif;  

		    echo '</div>';
		    echo '</div>';
		    echo '</div>';
		    echo '</div>';

		    endif;
		    endwhile;	
		    wp_reset_postdata();

		    echo "</div>";
		    echo "</div>";
		    $out_put = ob_get_clean();
		    return $out_put;
		}	

		// Blog post render
		public static function themesflat_posts( $atts, $content = null ) {
			$atts = vc_map_get_attributes( 'themesflat_posts', $atts );
			extract (apply_filters( 'themesflat/shortcode/themesflat_posts_atts',$atts));
			ob_start();
				$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content	

				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}     				

				$query_args = array(					
					'post_status'         => 'publish',
					'post_type'           => 'post',
					'paged' => $paged,
					'ignore_sticky_posts' => true,
					);  

				if ( is_numeric( $atts['limit'] ) && $atts['limit'] >= 0 ) {
					$query_args['posts_per_page'] = $atts['limit'];
				}

				if ( ! empty( $atts['exclude'] ) ) {
					$exclude = $atts['exclude'];

					if ( ! is_array( $exclude ) )
						$exclude = explode( ',', $exclude );

					$query_args['post__not_in'] = $exclude;
				}
				
				if ( $atts['category_post'] != 'All' )
					$query_args['category_name'] = $atts['category_post'];

				$query = new WP_Query( $query_args );	
				$GLOBALS['wp_query']->max_num_pages = $query->max_num_pages; 

				$class_names = array(
					1 => 'blog-one-column',
					2 => 'blog-two-columns',
					3 => 'blog-three-columns',
					4 => 'blog-four-columns',
					);		

				if ( ! $query->have_posts() )
					return;

				$class = apply_filters( 'themesflat/shortcode/posts_class', array( 'blog-shortcode', $atts['class'],  $atts['layout'] ), $atts );

				if ( isset( $class_names[$atts['grid_columns']] ) && in_array( $atts['layout'], array( 'blog-grid', 'blog-grid-image-left', 'blog-masonry' ) ) ) {
					$class[] = $class_names[$atts['grid_columns']];
				}

				if ( $atts['hide_content'] != 'yes' ) {
					$class[] = 'has-post-content';
				}	

				if ( $atts['blog_carousel'] == 'yes' ) {
					$class[] = 'has-carousel';
				}

				$imgs = array(
					'blog-list-full-width' => 'themesflat-blog-full-width',
					'blog-list' => 'themesflat-blog',
					'blog-grid' => 'themesflat-blog-grid',
					'blog-list-small' => 'themesflat-blog-listsmall',
					'blog-masonry' => 'themesflat-blog-grid-masonry',
					'blog-grid-image-left' => 'themesflat-blog-grid-image-left'
					);			
				global $themesflat_thumbnail;
				$themesflat_thumbnail = $imgs[$atts['layout']];
				$items = $atts['layout'] == 'blog-grid' ? $atts['grid_columns'] : 1;
				?>
				<?php if ( ! empty( $atts['title'] ) ): ?>
					<h2 class="blog-shortcode-title"><?php esc_html_e( $atts['title'] ) ?></h2>
				<?php endif ?>

				<div class="<?php esc_attr_e( implode( ' ', $class ) ) ?>" data-items ="<?php themesflat_esc_attr($grid_columns);?>">
					
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<article class="entry format-<?php echo esc_attr(get_post_format()); ?>">
							<div class="entry-border">
								<?php 
								get_template_part('tpl/feature-post'); ?>
								
								<div class="content-post">
									<div class="entry-meta meta-on clearfix">
										<?php if ($layout == 'blog-list-small') : ?>	
											<ul class="meta-left">	
												<?php if ( $show_post_meta_date == 1 ): ?>
												<li class="post-date">
													<a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a>			
												</li>
												<li class="dot">-</li>
												<?php 
													endif;
													if ( $show_post_meta_author == 1 ):
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

											elseif ($layout == 'blog-list' || $layout == 'blog-list-full-width'):	
												?>
												<ul class="meta-left">
												<?php if ( $show_post_meta_author == 1 ):?>
													<li class="post-author">
														<?php			
														printf(
															'<span class="author vcard"><a class="url fn n" href="%s" title="%s" rel="author"> %s</a></span>',
															esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),
															esc_attr( sprintf( esc_html__( 'View all posts by %s', 'consuloan' ), get_the_author() ) ),get_the_author());
														?>
													</li>			
												<?php endif; ?>	
												<?php if ( $show_post_meta_date == 1 ): ?>
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
											
											endif;?>
									</div><!-- /.entry-meta -->	
									<?php if ($layout == 'blog-grid' || $layout == 'blog-masonry' || $layout == 'blog-grid-image-left') : ?>
										<div class="entry-meta meta-on clearfix">										
												<ul class="meta-left">	
													<?php 
													echo '<li class="post-categories">'.esc_html__("",'consuloan');
														the_category( ', ' );
													echo '</li>';
													?>		
												</ul>									
										</div><!-- /.entry-meta -->
									<?php endif; ?>														
									<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									<?php if ($layout == 'blog-grid' || $layout == 'blog-masonry' || $layout == 'blog-grid-image-left') : ?>
										<div class="entry-meta meta-below clearfix">
											
												<ul class="meta-left">	
													<?php if ( $show_post_meta_date == 1 ): ?>
													<li class="post-date">
														<a href="<?php the_permalink(); ?>"><?php echo get_the_date();?></a>			
													</li>
													<?php endif; ?>		
												</ul>									
										</div><!-- /.entry-meta -->
									<?php endif; ?>
									<?php $hide_content_class = '';
										if ( $atts['hide_content'] == 'yes' && $atts['hide_readmore'] == 'yes' ) {
											$hide_content_class = 'hide';										
										}
									 ?>									
									<div class="entry-content <?php echo esc_attr($hide_content_class);?>">

										<?php										
										$readmore = $atts['hide_readmore'] != 'yes'  ? wp_kses_post( $atts['readmore_text'] ) : '[...]';
										if ($hide_content != 1) {
											themesflat_render_post($atts['layout'],$readmore,$atts['content_length']);
										}
										?>

									</div>

								</div>
							</div>
						</article><!-- /.entry -->

						<?php
						endwhile;
						echo '</div>';
						$out_put = ob_get_clean();
						wp_reset_query();
						
						return $out_put;		
						?>
						<?php 				
		}

		public static function themesflat_services( $atts, $content = null ) {
		    $atts = vc_map_get_attributes( 'themesflat_services', $atts );
	      	extract (apply_filters( 'themesflat/shortcode/themesflat_services_atts',$atts));
    	  	if ( get_query_var('paged') ) {
		        $paged = get_query_var('paged');
      		} elseif ( get_query_var('page') ) {
		        $paged = get_query_var('page');
	      	} else {
		        $paged = 1;
	      	}    
	      	global $themesflat_paging_style;
	      	global $themesflat_paging_for;
	      	$themesflat_paging_style = 'loadmore';
	      	$themesflat_paging_for = 'services';
	      	$icon_name = themesflat_shortcode_icon_name('icon_',$icon_type);
	      	$icon_value = !empty($icon_name) ? $atts[$icon_name] : '';
	      	wp_enqueue_style( 'vc_'.$atts['icon_type'] );

	      	if ($icon_value != '') {
		        $readmore_text = $readmore_text . sprintf('<i class="%s"></i>',esc_attr($icon_value));
	      	}
		      
	      	$limit = intval( $limit );    
	      	$terms_slug = wp_list_pluck( get_terms( 'services_category','orderby=name&hide_empty=0'), 'slug' );   
	      	$tax =  $terms_slug;

	      	if ( empty( $atts['enable_carousel'] ) ) $atts['enable_carousel'] = 'no';
	      	if ( empty( $atts['show_filter'] ) ) $atts['show_filter'] = 'no';
	      	if ( empty( $atts['hide_content'] ) ) $atts['hide_content'] = 'no';
		        $query_args = array(
		          	'post_type' => 'services',
		          	'posts_per_page' => $limit,
		          	'paged' => $paged,          
		         );
	        if ($category_post != 'All') {
		         $query_args['tax_query'] = array(
		            array(
		              	'taxonomy' => 'services_category',   
		              	'field'    => 'slug',                   
		              	'terms'    => $category_post,
		            )
		        );
	        }
	        $query = new WP_Query($query_args);
	        $GLOBALS['wp_query']->max_num_pages = $query->max_num_pages; 
	        $_class[] = $services_columns;
	        $_class[] = $class;

	        ob_start();
		        ?>
		        <div class="themesflat-services-shortcodes grid <?php echo esc_attr(implode(" ",$_class));?>">
		          <?php 
		          while ( $query->have_posts() ) : $query->the_post();
		            printf('<div class="item %s">',esc_attr(get_post_format()));
		              echo '<div class="item-inner">';
		                global $themesflat_thumbnail;
		                $themesflat_thumbnail = 'themesflat-blog-grid';
		                get_template_part('tpl/feature-post'); 
		                echo '<div class="services-details-content">';
		                echo '<div class="category-post">';
				        	echo the_terms( get_the_ID(), 'services_category', 
				        		'', ' / ', '' );                        
				        echo '</div>';
		                if ($hide_title  != 'yes') {
		                  printf('<h2 class="services-title"><a href="%1$s">%2$s</a></h2>',esc_url(get_the_permalink()),esc_html(get_the_title()));
		                }
		                echo '<div class="date"><a href="'. get_the_permalink() .'">';
			        	echo esc_attr( get_the_date() ); 
			        	echo '</a></div>';
		                $layout = 'blog-grid';
		                if ($atts['hide_content'] != 'yes') {?>
		                  <div class="entry-content">
		                    <?php
	                    	$readmore = $atts['hide_readmore'] != 'yes'  ? wp_kses_post( $readmore_text ) : '[...]';
	                    	themesflat_render_post($layout,$readmore,$atts['content_length']);
		                    ?>

		                  </div>
		                <?php }
		              echo '</div>';
		            echo '</div>';
		            echo '</div>';
		          endwhile; 
		          ?>
		        </div>
		        <?php if ( $atts['show_pagination'] == 'yes') {
		          add_filter('themesflat/template/loadmore_text','themesflat_services_loadmore_text');
		          get_template_part('tpl/pagination');
		        }
		        wp_reset_query();
		        ?>
	      	<?php 
		        return ob_get_clean();
		}
	}	

}

// Finally initialize code
new themesflat_VCExtend();