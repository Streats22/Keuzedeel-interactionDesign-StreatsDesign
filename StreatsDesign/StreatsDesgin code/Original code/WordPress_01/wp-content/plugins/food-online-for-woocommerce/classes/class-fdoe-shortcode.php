<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Food_Online_Shortcode {

	protected static $_instance = null;

	protected $is_active = false;

	public static $shortcode_order;

	public function __construct() {


		add_shortcode( 'foodonline', array( $this, 'shortcode' ) );



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

if ( $this->is_active && get_option('fdoe_force_shortcode','no')=='no') {
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

		$orderby = empty($options['orderby']) ? "title" : $options['orderby']  ;
		if(wc_clean($options['orderby']) == 'price'){

		add_filter( 'woocommerce_shortcode_products_query', array($this, 'price_sorting') );
		$options['orderby'] == '';
		}
		$ids = empty($options['ids']) ? '' : 'ids='.$options['ids'];
		
		$order = empty($options['order']) ? '' : 'order="'.$options['order'].'"'  ;
		$tags = empty($options['tags']) ? '' : 'tag="'.$options['tags'].'"'  ;
		$cats = empty ($options['categories']) ? false : 'category="'. $options['categories'] .'"' ;
		$cats_array = [];
				if($cats !== false ){
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
			$cats = 'category="'. implode(',',$cats_array ) .'"';
		}
				self::save_shortcode_order($cats_array);
		$locs = array(
					  'cats' => self::get_shortcode_order(),
					  );

		wp_localize_script( 'fdoe-order', 'fdoe_short', $locs );


		ob_start();

		$pp  = get_option('fdoe_is_prem') == 'yes' ? max( sqrt(Food_Online::$fdoe_doit[0]) , Food_Online::$fdoe_doit[1] ) : min( sqrt(Food_Online::$fdoe_doit[0]) , Food_Online::$fdoe_doit[1] ) ;
		$l = 'limit='.$pp;
		$shortcode_string = '[products '.$cats.' '.$tags.' '.$l.' orderby="'.$orderby.'" ' . $order .' ' . $ids .' ]';


		echo do_shortcode($shortcode_string);




		$content = ob_get_clean();




		return ($content);
	}

function price_sorting( $args) {

		$args['orderby'] = 'meta_value_num';
	//	$args['order'] = 'asc';
		$args['meta_key'] = '_price';

	return $args;
}

}
