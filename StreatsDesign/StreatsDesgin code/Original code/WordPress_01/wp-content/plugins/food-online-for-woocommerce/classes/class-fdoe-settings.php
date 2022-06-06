<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !class_exists( 'Food_Online_Settings' ) ):
    function Food_Online_Add_Tab( )
    {
        class Food_Online_Settings extends WC_Settings_Page
        {
            public function __construct( )
            {
                $this->id    = 'fdoe';
                 $this->label = __( 'Food Online', 'food-online-for-woocommerce' );
                add_filter( 'woocommerce_settings_tabs_array', array(
                     $this,
                    'add_settings_page'
                ), 20 );
                add_action( 'woocommerce_settings_' . $this->id, array(
                     $this,
                    'output'
                ) );
                add_action( 'woocommerce_settings_save_' . $this->id, array(
                     $this,
                    'save'
                ) );
                add_action( 'woocommerce_sections_' . $this->id, array(
                     $this,
                    'output_sections'
                ) );
                add_action( 'woocommerce_admin_field_layout', array(
                     $this,
                    'fdoeorder_admin_field_layout'
                ) );
				add_filter( 'woocommerce_admin_settings_sanitize_option', array(
                     $this,
                    'sanitize_callback'
                ), 10, 3 );
				add_action('admin_notices', array( $this, 'premium_admin_notice'));

            }

            public function get_sections( )
            {
                $sections = array(
                     '' => __( 'Main Settings', 'food-online-for-woocommerce' ),
					  'menu_styling' => __( 'Menu Layout & Styling', 'food-online-for-woocommerce' ),
                    'cat_sorting' => __( 'Menu Category Sorting', 'food-online-for-woocommerce' ),//. ' <span class="fdoe_premium_link_tab">Premium</span>',
                    'order_time' => __( 'Order Time Management', 'food-online-for-woocommerce' ),
					  'delivery' => __( 'Delivery Features', 'food-online-for-woocommerce' ),//. ' <span class="fdoe_premium_link_tab">Premium</span>',
					  'advanced' => __( 'Advanced', 'food-online-for-woocommerce' )
                );
                return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
            }
			 public function sanitize_callback( $value, $option, $raw_value )
            {
                global $current_section;
                if ( 'second' == $current_section ) {
                    $value = stripslashes( $raw_value );
                 //   $value       = json_decode( $new_order_2, TRUE );
                    return $value;
                } else {
                    return $value;
                }
            }
            public function save( )
            {
                global $current_section;
                $settings = $this->get_settings( $current_section );
                WC_Admin_Settings::save_fields( $settings );
            }
            public function output( )
            {
                global $current_section;
                $settings = $this->get_settings( $current_section );
                WC_Admin_Settings::output_fields( $settings );
            }
            public function get_settings( $current_section = '' )
            {
                if ( 'cat_sorting' == $current_section ) {
                    $settings = apply_filters( 'fdoe_section2_settings', array(
                         array(
                            'name' => __( 'Menu Category Sorting', 'food-online-for-woocommerce' ),
                            'type' => 'title',
                            'desc' => __( 'This setting is only for the shop page of WooCommerce.', 'food-online-for-woocommerce' ),
                            'id' => 'fdoe_category_order'
                        ),
                        array(
                             'type' => 'layout',
                            'id' => 'layout'
                        ),
                        array(
                             'type' => 'sectionend',
                            'id' => 'fdoe_category_order'
                        )
                    ) );
                } else if ( 'order_time' == $current_section ){
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_third);
				}else if ( 'delivery' == $current_section ){
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_delivery);

				}
				else if ( 'menu_styling' == $current_section ){
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_menu_styling);

				}else if ( 'advanced' == $current_section ){
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args_advanced);
                }else {
                    include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
                    $settings = apply_filters( 'fdoe_section1_settings', $settings_args);


                }
                return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings, $current_section );
            }
            public function fdoeorder_admin_field_layout( $value )
            {

                ob_start();
                include (plugin_dir_path( __DIR__ ) . 'includes/start-args.php');
				Food_Online::setVar();

                $fdoe_category_order =  Food_Online::getVar();
                echo '<div class="wrap">';
                Food_Online::set_categories();
                $pre_defiend_columns = Food_Online::get_categories_raw();
                $cats = $pre_defiend_columns;
                $pages2 = array();
                 $cats_name = array();
                foreach($cats as $cat  ){
                        $cates =  $cat->cat_ID;
                        $cats_name[] = $cat->name;
                        $pages2[] = $cates;
	 }
                if ( true ) {
                    echo '<div class="related_pages flex-container">';
echo '<div class="left_container">';
                    echo '<h3 class="left_container-heading "> '. __('Selectable Product Categories', 'food-online-for-woocommerce'). '</h3>';
                     echo '<h4 class="left_container-heading">'. __('Drag them to the Menu box', 'food-online-for-woocommerce'). '</h4>';
                    echo '<ul class="left_items"  id="left">';
                    if ( is_array( $pre_defiend_columns )){
							foreach ( $pre_defiend_columns as $page2 ) {
                            if ( is_array($fdoe_category_order)) {
                                if ( !in_array( $page2->cat_ID, array_column( $fdoe_category_order, 'ID' ) ) ) {
                                    echo '<li class="admin_column" id="' . $page2->cat_ID . '">';
                            echo $page2 -> name;
                                    echo '</li>';
                                }
                            }
                        }
                    }
                    echo '</ul>';
                    echo '</div>';
                    //end left container
                    echo '<div class="right_container inactive-option" >';
                    echo '<h3 class="right_container-heading fdoe_premium_option"> '. __('Menu', 'food-online-for-woocommerce'). '</h3>';
                    echo '<h4 class="right_container-heading">'. __('Sort your product categories as you would like them in the menu', 'food-online-for-woocommerce'). '</h4>';
                    echo '<ul  class="right_items" id="right">';
                   if ( !empty( $fdoe_category_order ) && is_array($fdoe_category_order)) {
                        foreach ( $fdoe_category_order as $key ) {
                                if ( in_array($key[ 'ID' ], $pages2 ) && is_array( $pre_defiend_columns )) {
                                echo '<li class="admin_column" id="' . $key[ 'ID' ] . '"  >';
                               $cat_name_ = get_the_category_by_ID((int)$key[ 'ID' ]);
                             if ( $cat_name_ != null) {
                            echo $cat_name_ ;
                              }
                            echo '</li>';
                        }
                        }
                    }
                    echo '</ul>';
                    echo '</div>';
                    echo '</div>';


                    echo '</div>';
                }
                echo ob_get_clean();
                echo '<div id="result" >';
                echo '</div>';
            }
			  function premium_admin_notice(){

    if ( isset ($_GET['tab']) && $_GET['tab'] == 'fdoe' ) {
		if( mt_rand (1,2) == 1):
		echo '<div class="notice notice-success is-dismissible">

            <div class="fdoe_premium">

            	<table>

                	<tbody><tr>

                    	<td width="70%">

                        	<p style="font-size:1.3em"><strong><i>Food Online Premium </i></strong>provides more features</p>

                            <ul class="fa-ul" id="fdoe_premium_ad">

								<li ><span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Display more than 50 Menu Items</li>


                            	<li ><span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Delivery or Pick-Up selector at Menu page</li>

							<li ><span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Calculate delivery time with Google Maps</li>

								<li ><span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Choose to show more content in product popups</li>


                                <li> <span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Delivery addresses validation with Google Maps & Minimum order value for delivery</li>

                                <li ><span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Decide which categories to show in Menu</li>

								<li ><span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Decide the order of categories in Menu</li>

                                <li ><span class="fa-li" ><i class="fas fa-check" style="color:green"></i></span>	Up-Sell products reminder at checkout</li>





								  <li >	and more...</li>



								 <li> Or if you just like our free plugin, give us a <a target="_blank" rel="noopener noreferrer" href=" https://wordpress.org/support/plugin/food-online-for-woocommerce/reviews?rate=5#new-post"><span id="fdoe_star_rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span> five star rating</a></li>

                            </ul>

                        </td>

                        <td>

                            <a target="_blank" rel="noopener noreferrer" href="http://www.foodonlineplugin.com" class=" button_premium" ><p style="font-size:1.2em">Upgrade To Premium </p><p>Learn More <i class="fas fa-arrow-right"></i></p></a>

                        </td>

                    </tr>

                </tbody></table>

            </div>

         </div>';
		endif;
		if( mt_rand (1,3) == 1):
        echo '<div class="notice notice-info is-dismissible">

            <div class="fdoe_premium">

            	<table>

                	<tbody><tr>

                    	<td width="100%">

                        	<p style="font-size:1.3em"><strong><i>New! Shipping Zones by Drawing </i></strong>let you draw your own shipping zones</p>

                            <ul class="fa-ul" id="fdoe_premium_ad">

								<li ><span class="fa-li" ><i class="fas fa-check" style="color:#00a0d2"></i></span>	Draw your own shipping zones for WooCommerce into a map</li>

                            	<li ><span class="fa-li" ><i class="fas fa-check" style="color:#00a0d2"></i></span>	Define a shipping cost for every zone</li>



                                <li ><span class="fa-li" ><i class="fas fa-check" style="color:#00a0d2"></i></span>	Compatible with Food Online</li>
								 <a target="_blank" rel="noopener noreferrer" href="https://wordpress.org/plugins/shipping-zones-by-drawing-for-woocommerce/" class=" " ><p style="display: inline-block;
    padding: 12px 20px;
    border-radius: 8px;
    border: 0;
    font-weight: bold;
    letter-spacing: 0.0625em;
    text-decoration: none;
    background: #00a0d2;
    color: #fff;
    text-align: center;">Get it for free!</p><p></p></a>


                            </ul>

                        </td>



                    </tr>

                </tbody></table>

            </div>

         </div>';
		 endif;

    }

}
        }
        return new Food_Online_Settings();
    }
    add_filter( 'woocommerce_get_settings_pages', 'Food_Online_Add_Tab', 15 );
endif;
