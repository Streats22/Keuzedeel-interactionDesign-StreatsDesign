<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
if ( !class_exists( 'Food_Online_Orders' ) ) {
    /**
		 * Main Class Food_Online_Orders
		 *
		 * @since 2.3.1
		 */
    class Food_Online_Orders
    {
            // The Constructor
        public function __construct()
        {
             add_action( 'wp', array(
                 $this,
                'init'
            ), 10 );
			 add_action( 'init', array(
                 $this,
                'init2'
            ), 10 );
        }
		public function init2(){
			 add_action( 'wp_ajax_nopriv_get_store_location', array($this,'get_store_location') );
			add_action( 'wp_ajax_get_store_location',array($this, 'get_store_location') );
		}
    public function init(){
         if( (is_shop() && get_option('fdoe_override_shop') == "yes") || wc_post_content_has_shortcode( 'foodonline' ) || wc_post_content_has_shortcode( 'foodonline2' ) ){
        add_action( 'fdoe_loop_end_3', array($this, 'output_order_time'));
		 }

add_action( 'woocommerce_email_order_meta', array($this,'add_order_time_info_to_emails'), 10, 4 );
if (  get_option('fdoe_add_to_thank_you', 'no') == 'yes' ) {
add_action( 'woocommerce_thankyou', array($this,'add_to_thankyou_page'), 99 );
}


    }

function echo_time($store=false){
	$type = WC()
					->session
					->get('fdoe_shipping');
		$time = WC()
					->session
					->get('fdoe_shipping_time');

	ob_start();

if($store == false){
		if($type == 'local_pickup'  ){
			if(isset($time[0])){
			echo '<h2>' . __( 'When to pick up?', 'food-online-for-woocommerce' ) . '</h2><ul><li>'. __( 'Your order will be ready in ', 'food-online-for-woocommerce' ) . $time[0] . __( ' minutes.', 'food-online-for-woocommerce' ).'</li></ul>';
			}else{
				echo '<h2>' . __( 'This order is for pick up.', 'food-online-for-woocommerce' ) . '</h2>';
			}
			}elseif( ($type == 'flat_rate' || $type == 'free_shipping' || $type == 'szbd-shipping-method') ){
				if(isset($time[1])){
				echo '<h2>' . __( 'When will we deliver to you?', 'food-online-for-woocommerce' ) . '</h2>';
					 echo __( 'Your order will be delivered in ', 'food-online-for-woocommerce' ) . $time[1] . __( ' minutes.', 'food-online-for-woocommerce' );
				}else{
					echo '<h2>' . __( 'This order will be delivered.', 'food-online-for-woocommerce' ) . '</h2>';
				}
			}
}elseif($store == true){

	if($type == 'local_pickup'){
		if( isset($time[0])){
			echo '<h2>' . __( 'Pick Up Order', 'food-online-for-woocommerce' ) . '</h2><ul><li>'. __( 'The customer will pickup the order in ', 'food-online-for-woocommerce' ) . $time[0] . __( ' minutes.', 'food-online-for-woocommerce' ).'</li></ul>';
		}else{
				echo '<h2>' . __( 'Pick Up Order', 'food-online-for-woocommerce' ) . '</h2>';
		}
			}elseif( ($type == 'flat_rate' || $type == 'free_shipping' || $type == 'szbd-shipping-method')  ){
				if( isset($time[1])){
				echo '<h2>' . __( 'Delivery Order' ,'food-online-for-woocommerce' ) . '</h2>';
				 echo __( 'Deliver the order in ', 'food-online-for-woocommerce' ) . $time[1] . __( ' minutes.', 'food-online-for-woocommerce' );
				}else{
						echo '<h2>' . __( 'Delivery Order' ,'food-online-for-woocommerce' ) . '</h2>';
				}

				}
			}


			$message = ob_get_clean();


    echo $message;;
}
function add_order_time_info_to_emails( $fields, $sent_to_admin, $order, $email ) {
	if ( $email->id == 'customer_processing_order' && get_option('fdoe_add_to_processing', 'no') == 'yes' ) {
	$this-> echo_time();
	}
	if ( $email->id == 'customer_completed_order' && get_option('fdoe_add_to_completed', 'no') == 'yes'){
		$this-> echo_time();
	}
	if ( $email->id == 'new_order' && get_option('fdoe_add_to_neworder', 'yes') == 'yes') {
			$this-> echo_time(true);
	}
}
function add_to_thankyou_page(){

	$this-> echo_time();
}
    public function output_order_time(){

$session = array(null,null);


		$is_prem = get_option('fdoe_is_prem','no');
        $for_pickup = get_option('fdoe_ready_for_pickup_show','none');
        $for_delivery = get_option('fdoe_ready_for_delivery_show','none');
		$is_free = $is_prem == 'no' || get_option('fdoe_enable_delivery_switcher','no') == 'no'  ? 'style=display:flex; justify-content:center; align-items:center;' :'';
	if($for_pickup !== 'none' || $for_delivery !== 'none'){
ob_start();
echo 	'<span class="fdoe_order_time fdoe_hidden" >';
// For pickup orders
//echo "<script type='text/javascript'> alert('".json_encode($mode)."') </script>";

switch ($for_pickup) {
    case 'fixedtime':
		$time =intval( get_option('fdoe_pickup_fixed',''));
        echo '  <span class="fdoe_pickup_time" '.esc_attr($is_free).'><i class="far fa-clock "></i>' .'&nbsp;'. esc_html(intval( get_option('fdoe_pickup_fixed',''))).__( ' min', 'food-online-for-woocommerce' ).'</span>';
        break;
     case 'variable':

        $time =  intval(get_option('fdoe_pickup_fixed','0'))+intval(get_option('fdoe_pickup_var','0') ) * intval(self::get_processing_orders());
        echo '  <span class="fdoe_pickup_time" '.esc_attr($is_free).'><i class="far fa-clock "></i>' .'&nbsp;'.esc_html($time) .__( ' min', 'food-online-for-woocommerce' ).'</span>';
        break;
    default:
}
	$session[0] = $time;

// For delivery orders
if($is_prem == 'yes' ):
switch ($for_delivery) {
    case 'fixedtime':
		$del_time = intval( get_option('fdoe_pickup_fixed',''));
		$symbole = get_option('shipping_vehicle','DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';
        echo '  <span class="fdoe_delivery_time" '.esc_attr($is_free).'>'. ($symbole) .'&nbsp;'. esc_html($del_time).__( ' min', 'food-online-for-woocommerce' ).'</span>';
        break;
     case 'variable':
		$symbole = get_option('shipping_vehicle','DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';
        $del_time =  intval(get_option('fdoe_pickup_fixed','0'))+intval(get_option('fdoe_pickup_var','0') ) * intval(self::get_processing_orders());
        echo '  <span class="fdoe_delivery_time" '.esc_attr($is_free).'>'.($symbole) .'&nbsp;'.esc_html($time) .__( ' min', 'food-online-for-woocommerce' ).'</span>';
        break;
    case 'fixed_ship':

		if(get_option('fdoe_shipping_time','fixedtime') == 'fixedtime'){
			$symbole = get_option('shipping_vehicle','DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';
        $del_time =  intval(get_option('fdoe_pickup_fixed','0')) + intval(get_option('fdoe_shipping_fixed','0'));
        echo '  <span class="fdoe_delivery_time" '.esc_attr($is_free).'>'. ($symbole).'&nbsp;'.esc_html($time) .__( ' min', 'food-online-for-woocommerce' ).'</span>';
		}
        break;
	case 'variable_ship':

		if(get_option('fdoe_shipping_time','fixedtime') == 'fixedtime'){
			$symbole = get_option('shipping_vehicle','DRIVING') == 'DRIVING' ? '<i class="fas fa-truck"></i>' : '<i class="fas fa-bicycle"></i>';
        $del_time =  intval(get_option('fdoe_pickup_fixed','0'))+intval(get_option('fdoe_pickup_var','0') ) * intval(self::get_processing_orders()) + intval(get_option('fdoe_shipping_fixed','0'));
        echo '<span class="fdoe_delivery_time" '.esc_attr($is_free).'>'.($symbole) .'&nbsp;'.esc_html($time) .__( ' min', 'food-online-for-woocommerce' ).'</span>';
		}
        break;
    default:
}
		$session[1] = isset($del_time) ? $del_time: null;
		endif;
	echo '</span>';
$output = ob_get_clean();
echo $output;
WC()
					->session
					->set('fdoe_shipping_time', $session);
	 }
    }
    public static function get_processing_orders(){
$args = array(
    'status' => 'processing',
);
$orders = wc_get_orders( $args );
        return is_countable($orders) ? count($orders ) : 0;
    }

    public function get_store_location(){
// Collect the store address
$store_address     = get_option( 'woocommerce_store_address' ,'');
$store_address_2   = get_option( 'woocommerce_store_address_2','' );
$store_city        = get_option( 'woocommerce_store_city','' );
$store_postcode    = get_option( 'woocommerce_store_postcode','' );
$store_raw_country = get_option( 'woocommerce_default_country','' );
$split_country = explode( ":", $store_raw_country );
// Country and state
$store_country = $split_country[0];
$store_state   = isset($split_country[1]) ?  $split_country[1] : '';
        $args = array(
                      'store_address' => $store_address,
					  'store_city'	=> $store_city,
					  'store_postcode' => $store_postcode,
					  'store_country'	=> $store_country,
					  'store_state'	=> $store_state,
                      );
       wp_send_json($args);
    }
    }
}
