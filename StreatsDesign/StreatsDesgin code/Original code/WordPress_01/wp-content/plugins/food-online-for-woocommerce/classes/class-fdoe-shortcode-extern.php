<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Food_Online_Shortcode2 {

	protected static $_instance = null;

	protected $is_active = false;

	public static $shortcode_order;

	public function __construct() {

		add_shortcode( 'foodonline2', array( $this, 'shortcode' ) );



	}

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}
public static function save_shortcode_order($cats_array){

	if(!isset(self::$shortcode_order)){


	self::$shortcode_order = $cats_array;

}
}
public static function get_shortcode_order(){

	return self::$shortcode_order;
}
public function shortcode( $atts ) {

if ( ($this->is_active && get_option('fdoe_force_shortcode','no') == 'no') || is_admin() ) {
			return;
		}



		$this->is_active = true;




		$options = shortcode_atts( array(
			'categories'         => null,
			'tags'               => null,
			'orderby'               => null,
			'order'               => null,
			'ids'               => null,


		), $atts );
		$pp  = get_option('fdoe_is_prem') == 'yes' ? max( sqrt(Food_Online::$fdoe_doit[0]) , Food_Online::$fdoe_doit[1] ) : min( sqrt(Food_Online::$fdoe_doit[0]) , Food_Online::$fdoe_doit[1] ) ;
		$l = 'limit='.$pp;
$args = array(
			'status' => 'publish',
			'limit' => $pp,

					  );


		$args += empty($options['ids']) ? [] : ['include' => explode(",", $options['ids']) ]  ;
		$args += empty($options['order']) ? ['order' => 'ASC'] : ['order' => $options['order'] ];
		$args += empty($options['tags']) ? []: ['tag' => explode(",", $options['ids']) ] ;
		$args += empty($options['categories']) ? []: ['category' =>  explode(",", $options['categories']) ] ;

		if(wc_clean($options['orderby']) == 'price'){

		$args += [ 'orderby' => 'meta_value_num'];
		$args += [ 'meta_key' => '_price'];
		}else{
			$args += empty($options['orderby'])  ? ['orderby' => 'name' ] :  ['orderby' => $options['orderby'] ];
		}



        $products = wc_get_products( $args );

		$cats_array = [];
				if( !empty($options['categories']) ){
		$pieces = explode(",", $options['categories']);

		foreach ($pieces as $piece ){

			$category = get_term_by( 'name', $piece, 'product_cat' );
			if($category !== false){
			$cat_id = $category->term_id;
			$cats_array[] = $cat_id;
			}else{
				$piece = str_replace(' ', '', $piece);
				$category = get_term_by( 'slug', $piece, 'product_cat' );
				$cat_id = $category->term_id;
			$cats_array[] = $cat_id;
			}

		}

			if( get_option('fdoe_is_prem','no') == 'no' && !empty(Food_Online::get_categories_raw())){

					$cats2 = Food_Online::get_categories_raw() ;
					$cats_array_2 = array_column($cats2,'cat_ID');
				// Fix for PHP 7.0.32-33 where array_column is broken
			if(empty($cats_array_2) && is_array($cats2) ):
				$cats_array_2 = array_map(function ($each) {

					return $each->cat_ID;
					}, $cats2);
				endif;

				$cats_array = array_intersect($cats_array_2, $cats_array );
			}
		}else{
			$cats = '';
		}
				self::save_shortcode_order($cats_array);
		$locs = array(
					  'cats' => self::get_shortcode_order(),
					  );

		wp_localize_script( 'fdoe-order', 'fdoe_short', $locs );


		ob_start();








do_action('fdoe_loop_start');
$fdoe_color_back = get_option('fdoe_color_back','inherit');
$menu_color_back = $fdoe_color_back == '' ? 'inherit' : $fdoe_color_back  ;

$fdoe_border_color = get_option('fdoe_border_color','#ddd');
$menu_border_color = $fdoe_border_color == '' ? '#ddd' : $fdoe_border_color  ;
$display_top_cat_menu = get_option('fdoe_cat_top_menu','no') == 'yes' ? 'flex' : 'none';


?>

<style>

	.woocommerce-pagination {

		display: none;

	}


.woocommerce-result-count {
	display: none;
}

#the_menu, #menu_headings, div.fdoe-item:hover  {background-color: <?php echo $menu_color_back; ?>;
}
#the_menu .fdoe-item{
	border-right-color: <?php echo $menu_border_color; ?>;
	border-bottom-color: <?php echo $menu_border_color; ?>;

}
#the_main_container.fdoe-shortcode-extern{

   /* margin-left: auto;
    margin-right: auto;
    width: 90%;
    max-width: 90%;

    line-height: 1;
    font-size: initial;
	*/
}
#the_main_container  h5{
    margin-top: 1rem;
	margin-bottom: 1rem;
	margin-left: .2rem;
	margin-right: .2rem;
}
#menu_headings{
	display: <?php echo $display_top_cat_menu; ?>;
}

</style>

<!-- Main container of the Menu -->
<?php
echo '<div class="container-fluid fdoe_main_container fdoe-shortcode-extern" id="the_main_container">
	<div class="arorow">
		<div class="arocol-xs-12 arocol-sm-12 arocol-lg-12">
			<div class="arorow fdoe-flex-1">';

                    do_action( 'fdoe_loop_start_2');


if(get_option('fdoe_left_menu', 'no')== 'yes'){
                    ?>
			<div class="hidden-xs arocol-sm-2 fdoe-less-gut" id="fdoe-left-left-container">
<?php
$is_sticky = get_option('fdoe_sticky_bar','no') == 'yes' ? 'fdoe-sticky' : '';

 echo '<div class="'.$is_sticky.'" id="menu_headings_2">
	<h4 class="Category_heading">';
	echo __( 'Menu', 'food-online-for-woocommerce' );
	echo '</h4>
</div>
</div>
<div class="arocol-xs-12 arocol-sm-7 arocol-lg-7 fdoe-less-gut" id="fdoe-left-container">';
}else{
	echo '<div class="arocol-xs-12 arocol-sm-9 arocol-lg-9 fdoe-less-gut" id="fdoe-left-container">';
	}

	echo '<div class="fdoe">
			<div class="fdoe-products flex-container-column" id="the_menu">
				<div id="fdoe_products_id" class="fdoe_menu_header fdoe-top-sticky">
					<ul class="nav nav-tabs fdoe-menu-2  " id="menu_headings"> </ul>
				</div>
			</div>
		</div>
	</div>
	<div class="fdoe_extra_checkout" style="display:none"> <a href="' . esc_url( wc_get_checkout_url() ) . '" class="button checkout from_menu" id="checkout_button_1">' . esc_html__( 'Go to Checkout', 'food-online-for-woocommerce' ) . '</a>'; echo '</div>
	<div class=" arocol-sm-3 arocol-lg-3 fdoe-less-gut" id="fdoe-right-container" style="display:none">
		<div class="fdoe-right-sticky">';
		do_action('fdoe_loop_end_1');
		do_action('fdoe_loop_end_3');

			echo '<div class=fdoe_mini_cart_outer>
				<h4 class="Minicart_heading">';
				echo __( 'Your Order', 'food-online-for-woocommerce' );
				echo '</h4>
				<div class="fdoe_mini_cart" id="fdoe_mini_cart_id">
					<div class="widget_shopping_cart_content"> </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>';
$content = ob_get_clean();
$array = array();
do_action('fdoe_before_foodonline2_loop');
foreach($products as $i){

    $array[] =  Food_Online_Product2::the_product($i);
}
?>

<script>

	// Collect the products into a javascript array

	var Food_Online_Items = <?php echo json_encode(array(
                                                         'products' => $array,
                                                         )) ?>;



</script>

<?php do_action('fdoe_loop_end_2');









		return ($content);
	}



}
