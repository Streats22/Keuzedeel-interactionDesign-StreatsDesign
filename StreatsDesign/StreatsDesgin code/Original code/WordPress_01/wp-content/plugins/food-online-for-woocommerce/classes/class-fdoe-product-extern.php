<?php

if ( !defined( 'ABSPATH' ) ) {

    exit;

}

if ( !class_exists( 'Food_Online_Product2' ) ) {

     /**

		 * Class Food_Online_Product

		 *

		 * @since 1.0

		 */

    class Food_Online_Product2

    {

	public static $item_icon;
	public static $cats_to_include;
	public static $modal_settings;
	public static $counter = 1;

	public static $products_shortcode_list;


static function variation_has_option( $var ) {

   $variation_attr =  $var-> get_variation_attributes( );
	$variation_has_option = array_search("", $variation_attr);
	return $variation_has_option;
}

		public static function get_icon(){

			if(!isset(self::$item_icon)){

		 self::$item_icon = WC_Admin_Settings::get_option('fdoe_item_icon');


			}

		 return self::$item_icon;

		}
		public static function get_modal_settings(){

			if(!isset(self::$modal_settings)){

		 self::$modal_settings = array(  get_option('fdoe_popup_simple','yes') == 'yes',get_option('fdoe_popup_variable','yes') == 'yes' , get_option('fdoe_is_prem','no') == 'yes', get_option('fdoe_popup_variable','yes'));


			}

		 return self::$modal_settings;

		}

		public static function get_cats_to_include(){

			if(!isset(self::$cats_to_include)){
				Food_Online::setVar();
				$cats = Food_Online::getVar();
				if ( get_option('fdoe_is_prem','yes') == 'yes' && is_array($cats) && !empty($cats)){

			self::$cats_to_include = array_column($cats,'ID');
			// Fix for PHP 7.0.32-33 where array_column is broken
			if(empty(self::$cats_to_include)):
				self::$cats_to_include = array_map(function ($each) {
					return $each['ID'];
					}, $cats);
				endif;

				}elseif(!empty(Food_Online::get_categories_raw())){

					$cats = Food_Online::get_categories_raw() ;
					self::$cats_to_include = array_column($cats,'cat_ID');
			// Fix for PHP 7.0.32-33 where array_column is broken
			if(empty(self::$cats_to_include)):
				self::$cats_to_include = array_map(function ($each) {
					return $each['cat_ID'];
					}, $cats);
				endif;



		}else{
		self::$cats_to_include = array();
		}

			}
			return self::$cats_to_include;


		}





		// Get the single page shortcode
		private static function do_product_shortcode(  $id){


			if(self::$counter <= 50 ){
				$in_cat = false;
				if(!Food_Online::get_is_shortcode()){

				if(get_option('fdoe_is_prem','no') == 'no' || empty(self::get_cats_to_include()) || in_array($id, self::get_product_list(self::get_cats_to_include() ))){

					$in_cat = true;
				}else{

					return '';
				}




			}elseif(Food_Online::get_is_shortcode()){
				if(get_option('fdoe_is_prem','no') == 'no' || empty(Food_Online_Shortcode::get_shortcode_order() ) || in_array($id, self::get_product_list(Food_Online_Shortcode::get_shortcode_order()))){

					$in_cat = true;
				}else{

					return '';
				}




		}else{
			return '';
		}
			$temp_modal_settings = self::get_modal_settings();
			$to_return = ((  !$temp_modal_settings [2])  || ((  $temp_modal_settings [2]) &&  $in_cat  ))

			? do_shortcode('[product_page id="' . $id . '" ]') : '';
			if($to_return != ''){
			self::$counter++;

			}
			return $to_return;
		}else{return '';}
		}


		public static function get_product_list($cats){

			if(!isset(self::$products_shortcode_list)  ){
				$products_shortcode_list = array();
$type = array();
if(get_option('fdoe_popup_simple','yes') == 'yes')  array_push($type, 'simple');
if(get_option('fdoe_popup_variable','yes') == 'yes')  array_push($type, 'variable');

			foreach($cats as $cat){
				if(is_countable($products_shortcode_list) && count($products_shortcode_list) > 49){break;}
				$term = get_term_by('id', (int)$cat, 'product_cat', 'ARRAY_A');


				$args = array(
				'category' => array($term['slug']),
				'return' => 'ids',
				'limit' => 50,
				//'orderby' => 'title',
				'type' => $type,
				);

				$products_shortcode_list = array_merge_recursive($products_shortcode_list, wc_get_products( $args ));




			}
			self::$products_shortcode_list = array_slice($products_shortcode_list,0,50);

			}

			return self::$products_shortcode_list;
			}
		 // Gets the products and returns them to the loop

        public static function the_product($product)

        {





            $id        = $product->get_id();

			$is_variable = $product->is_type( 'variable' );
			$is_simple = $product->is_type( 'simple' );

            global $woocommerce;


            $cat_id_simple = $product->get_category_ids();



			 $temp_modal_settings = self::get_modal_settings();
			  if($is_simple && !$temp_modal_settings[0]){
				// Maybe add to enable redirect to product page $product_add_url = $product->add_to_cart_url();
			$do_add_url =	'<span><a href="" class="add_to_cart_button fdoe_simple_add_to_cart_button product_type_simple" data-product_id="'. $id  .'" data-product_sku="'.$product->get_sku().'"   data-quantity="1" rel="nofollow">  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>'
			;}elseif($is_variable && $temp_modal_settings[3] == 'add'){

				$children_id =  $product-> get_visible_children();
				$variable_has_option = false;

foreach($children_id as $child_id){
	$var = wc_get_product($child_id);

	$variable_has_option = $variable_has_option ? $variable_has_option : self::variation_has_option($var) !== false;


if(!$var ->is_purchasable() || !$var ->variation_is_active() || !$var -> variation_is_visible() || !$var->is_in_stock() ){
	continue;
}



$children[] = array_combine(
					array('id','price','name'),
					array($child_id, $var->get_price_html(), wc_get_formatted_variation( $var, true, false, false ) )
					);

}


				$do_add_url =	'<span>

				<a href="" class="fdoe_var_add" data-inactive="true"  data-variation_atts="" data-variation_id="" data-add-to-cart="" data-quantity="1" rel="nofollow">  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a>

				</span>';

				}
				elseif($is_variable && $temp_modal_settings[3] == 'no'){
								$product_add_url = do_shortcode('[add_to_cart_url id="'.  $id   .'"]');

				$do_add_url =	'<span><a href="'.$product_add_url.'"  rel="nofollow" class="fdoe-product-link"  >  <i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></a></span>';

				}


				else{
					$do_add_url = '';

				}


        $item  = array(

				'variable_has_options' => isset($variable_has_option) ? $variable_has_option : null,

				'featured' =>  $product-> is_featured(),

                'short_description' => $product->get_short_description(),

                'image' => array(



                     'src' => Food_Online_Product::get_image_src($product)

                ) ,

                'title' => $product->get_title(),

                'price_html' => $product->get_price_html(),

                'id' =>  $id,

                'variations' => array(),
				'children' => isset($children) ? $children : array(),


                'cart_button' => '<span><i  class="'.self::get_icon() .' fa-2x fdoe-item-icon" ></i></span>',

				'cart_button_add' => $do_add_url,


				'cat_id' => (array) $cat_id_simple,


                'parent_id' =>  $id,

				'is_variable' => $is_variable,

				'is_simple' => $is_simple,
				'simple' => $is_simple ? 'fdoe-simple' : '',
				'variable' => $is_variable ? 'fdoe-variable' : '',

				'in_stock' => $product-> is_in_stock(),

				'single_shortcode' => ($is_variable && $temp_modal_settings [1]) || ($is_simple && $temp_modal_settings [0]) ? self::do_product_shortcode(   $id  ) : '',



            );


			$products[]    = apply_filters( 'fdoe_loop_single_item', $item, $product );


            return $item;

        }

    }

}
