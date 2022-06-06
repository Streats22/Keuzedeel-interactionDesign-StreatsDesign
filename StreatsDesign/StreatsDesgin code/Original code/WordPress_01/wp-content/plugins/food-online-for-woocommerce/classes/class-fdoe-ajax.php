<?php
if ( !class_exists( 'Food_Online_Ajax' ) ) {
    /**
		 * Main Class Food_Online_Ajax
		 *
		 * @since 2.0.3
		 */
    class Food_Online_Ajax
    {
            // The Constructor
        public function __construct()
        {

			 $this->reg_my_ajax_methods();
        }
		public function ajaxfdoe_qty_cart() {
	$cart_item_key       = isset($_POST['hash']) ? $_POST['hash'] : '';
	$fdoe_product_values = WC()
		->cart
		->get_cart_item($cart_item_key);
	if (empty($fdoe_product_values)) {
		wp_send_json(array(
			'status'      => false
		));
	}
	$fdoe_product_quantity = apply_filters('woocommerce_stock_amount_cart_item', wc_stock_amount(preg_replace('/[^0-9\.]/', '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT))) , $cart_item_key);
	$passed_validation     = apply_filters('woocommerce_update_cart_validation', true, $cart_item_key, $fdoe_product_values, $fdoe_product_quantity);
	$product               = wc_get_product($fdoe_product_values['data']->get_id());





	if ($product->get_max_purchase_quantity() <= $fdoe_product_quantity && $product->get_max_purchase_quantity() != - 1) {
		$fdoe_product_quantity = $product->get_max_purchase_quantity();
	}
	if ($passed_validation) {
		$ok                    = WC()
			->cart
			->set_quantity($cart_item_key, $fdoe_product_quantity, true);
	}

	wp_send_json(array(
		'status' => $ok,
		'product' => $fdoe_product_values['data']->get_id(),
		'is_sold_indi' => $product->is_sold_individually(),
		'try_qty' => $fdoe_product_quantity,


	));
}

public function ajaxfdoe_get_comment_form(){
	$id        =  ( $_POST['id']  );
	ob_start();
	$commenter = wp_get_current_commenter();

					$comment_form = array(
						'title_reply_to'       => __( 'Leave a Reply to %s', 'woocommerce' ),
						'title_reply_before'   => '<span id="reply-title" class="comment-reply-title">',
						'title_reply_after'    => '</span>',
						'comment_notes_after'  => '',
						'fields'               => array(
							'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label> ' .
										'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" required /></p>',
							'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label> ' .
										'<input id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" required /></p>',
						),
						'label_submit'  => __( 'Submit', 'woocommerce' ),
						'logged_in_as'  => '',
						'comment_field' => '',
					);

					if ( $account_page_url = wc_get_page_permalink( 'myaccount' ) ) {
						$comment_form['must_log_in'] = '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a review.', 'woocommerce' ), esc_url( $account_page_url ) ) . '</p>';
					}

					if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
						$comment_form['comment_field'] = '<div class="comment-form-rating"><label for="rating">' . esc_html__( 'Your rating', 'woocommerce' ) . '</label><select name="rating" id="rating" required>
							<option value="">' . esc_html__( 'Rate&hellip;', 'woocommerce' ) . '</option>
							<option value="5">' . esc_html__( 'Perfect', 'woocommerce' ) . '</option>
							<option value="4">' . esc_html__( 'Good', 'woocommerce' ) . '</option>
							<option value="3">' . esc_html__( 'Average', 'woocommerce' ) . '</option>
							<option value="2">' . esc_html__( 'Not that bad', 'woocommerce' ) . '</option>
							<option value="1">' . esc_html__( 'Very poor', 'woocommerce' ) . '</option>
						</select></div>';
					}

					$comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . esc_html__( 'Your review', 'woocommerce' ) . '&nbsp;<span class="required">*</span></label><textarea id="comment" name="comment" cols="45" rows="5" required></textarea></p>';

				 	comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ), $id );
$content = ob_get_clean();
				$data = array(
					'success' => true,
					'content' => $content,

			) ;

			wp_send_json( $data );
}

	public function ajaxfdoe_make_product_shortcode(){


	if ( class_exists( 'YITH_WC_Points_Rewards_Frontend' ) ) {

	do_action('yith_before_product_modal');
}
	do_action('fdoe_before_product_modal');

			$id        =  isset( $_POST['id']  ) ? $_POST['id'] : array();
			$content= [];



			if(!is_countable($id)){return;}
			for ($i = 0; $i <= count($id)-1; $i++) {
				$test_product = wc_get_product(intval($id[$i]));
				$product = !is_null($test_product ) && $test_product  !== false ? $test_product  : false;
				if($product === false){


					continue;
				}
			$content_part =array(
								'is_variable' => $product->is_type( 'variable' ),
								'is_simple' => $product->is_type( 'simple' ),
								'price_html' => $product -> get_price_html(),
								'short_description' => $product->get_short_description(),
								'title' => $product -> get_title(),
								 'id' => $id[$i],

								 'single_shortcode' => do_shortcode('[product_page id="' . $id[$i] . '" ]'),
								 'image' => array(

										'src' => Food_Online_Product::get_image_src($product)

               ),


								 );
			$content[] = $content_part;


			}
			$data = array(
					'success' => true,
					'content' => $content,

			) ;

			wp_send_json( $data );



		}
		public function ajaxfdoe_get_wc_price_2() {
			if (!empty($_POST['price'])) {
				$price    = (floatval($_POST['price']));
				$response = array(
					'price'          => wc_price($price)
				);
			}
			else {
				$response = array(
					'price' => ''
				);
			}
			wp_send_json($response);
		}

function ajaxfdoe_add(){

	   ob_start();

            $product_id           = apply_filters('woocommerce_add_to_cart_product_id', absint(sanitize_text_field($_POST['p_id'])));
            $quantity             = empty($_POST['quantity']) ? 0 : wc_stock_amount(sanitize_text_field($_POST['quantity']));

            $product_status       = get_post_status($product_id);
            $variation_id         = empty($_POST['variation_id']) ? 0 : absint(sanitize_text_field($_POST['variation_id']));
			$vars = empty($_POST['variation_atts']) ? array() : json_decode(stripslashes($_POST['variation_atts']),TRUE);


            $variation            = is_null($vars) ||is_bool($vars) ? array() :$vars;
            $status               = true;


             $passed_validation    = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity, $variation_id, $variation );
			$cart_item_data = array();
           if ( class_exists( 'WC_Product_Addons_Display' )  ) {
/*foreach($_POST as $attr => $val){
	if(strpos($attr,'addons') === 0 ){
		$cart_item_data[] = $val['addons'];
	}
}*/
if(!$passed_validation ){
$addon_error = 'addon_error';


}
}
		    $product_quantity_new = $quantity;
            if ($passed_validation && 'publish' === $product_status) {
                $status               = false;
                $product_quantity_new = $quantity;
                if ($variation_id != 0) {
                    $product = wc_get_product($product_id);
                     $variation_product = wc_get_product($variation_id);
					if($variation_product->managing_stock() === true){

                       $product_qty_in_cart = WC()->cart->get_cart_item_quantities();
                        $max_to              = $variation_product->get_max_purchase_quantity();

                        if (array_key_exists($variation_product->get_stock_managed_by_id(), $product_qty_in_cart)) {
                            $in_cart_total = $product_qty_in_cart[$variation_product->get_stock_managed_by_id()];
                        } else {
                            $in_cart_total = 0;
                        }
                        $avalible = ($max_to - $in_cart_total);


                       if($avalible == 0){$product_quantity_new = 0;

						 $overstock               = true;
						}
                        elseif ($quantity > $avalible) {
                            $product_quantity_new = $avalible;
                            $overstock               = true;
                        }elseif($quantity <= $avalible){
							$overstock   = false;
							$product_quantity_new = $quantity;
						}


                    }
                    elseif ($variation_product -> managing_stock() == 'parent') {
                        $product_qty_in_cart = WC()->cart->get_cart_item_quantities();
                        $max_to              = $variation_product->get_max_purchase_quantity();
                       if (array_key_exists($variation_product->get_stock_managed_by_id(), $product_qty_in_cart)) {
                            $in_cart_total = $product_qty_in_cart[$variation_product->get_stock_managed_by_id()] ;
                        } else {
                            $in_cart_total = 0;
                        }
                        $avalible = ($max_to - $in_cart_total);

                       if($avalible == 0){
						$product_quantity_new = 0;

						 $overstock               = true;
						}
                        elseif ($quantity > $avalible) {
                            $product_quantity_new = $avalible;
                            $overstock               = true;
                        }elseif($quantity <= $avalible){
					 $overstock   = false;
							$product_quantity_new = $quantity;
						}
                    }

                }
				// For not variable products
				else{
						 $product = wc_get_product($product_id);
					 if ($product->managing_stock()) {

                        $product_qty_in_cart = WC()->cart->get_cart_item_quantities();
                        $max_to              = $product->get_max_purchase_quantity();
                        if (array_key_exists($product->get_stock_managed_by_id(), $product_qty_in_cart)) {
                            $in_cart_total = $product_qty_in_cart[$product->get_stock_managed_by_id()];
                        } else {
                            $in_cart_total = 0;
                        }
                        $avalible = ($max_to - $in_cart_total);


						if($avalible == 0){
							$product_quantity_new = 0;

						 $overstock               = true;
						}
                        elseif ($quantity > $avalible) {
                            $product_quantity_new = $avalible;
                            $overstock               = true;
                        }elseif($quantity <= $avalible){
						$overstock   = false;
							$product_quantity_new = $quantity;
						}
                    }else{


						$product_quantity_new = $quantity;



					}


				}
				//Check if sold individually

            if ( $product->is_sold_individually() ) {
				  $cart_id = WC()->cart->generate_cart_id( $product_id, $variation_id, $variation, $cart_item_data );


                $cart_item_key =  WC()->cart->find_product_in_cart( $cart_id );


			    $cart_item_data = (array) apply_filters( 'woocommerce_add_cart_item_data', $cart_item_data, $product_id, $variation_id, $product_quantity_new  );
                $product_quantity_new      = apply_filters( 'woocommerce_add_to_cart_sold_individually_quantity', 1, $product_quantity_new, $product_id, $variation_id, $cart_item_data );
                $found_in_cart = apply_filters( 'woocommerce_add_to_cart_sold_individually_found_in_cart', $cart_item_key && WC()->cart->cart_contents[ $cart_item_key ]['quantity'] > 0, $product_id, $variation_id, $cart_item_data, $cart_id );

               foreach( WC()->cart->get_cart() as $cart_item ) {
				$product_in_cart = $cart_item['product_id'];
					if ( $product_in_cart === $product_id ){ $in_cart = true;}else{$in_cart = false;}
				 }
			    if ( $found_in_cart || $in_cart) {

					$is_sold_indi = true;
					$product_quantity_new = 0;
                }
            }
                if ($product_quantity_new > 0) {



                       $hash = WC()->cart->add_to_cart($product_id, $product_quantity_new, $variation_id, $variation);

                    if (false != $hash) {
                        do_action('woocommerce_ajax_added_to_cart', $product_id);
                        do_action('woocommerce_update_cart_action_cart_updated');


                        $data = array(
                            'success' => true,
							'overstock' => isset( $overstock) ? $overstock:false,
							'is_sold_indi'=> isset($is_sold_indi ) ? $is_sold_indi :false,
                            'status' => $status,
                            'product_quantity' => $product_quantity_new,
							'passed_vali' => true

                        );
                    }else{
						$data = array(
                            'success' => false,
							'overstock' => isset( $overstock) ? $overstock:false,
							'is_sold_indi'=> $product->is_sold_individually() ,
                            'status' => $status,
                            'product_quantity' => $product_quantity_new,
							'passed_vali' => false

                        );
					}
                } else {

                    $data = array(
                        'error' => true,
                        'status' => $status,
                        'product_quantity' => $product_quantity_new,
						'overstock' => isset( $overstock) ? $overstock:false,
						'is_sold_indi' => isset($is_sold_indi ) ? $is_sold_indi :false,


					'passed_vali' => false
                    );
                }
            } else {
                $data = array(
                    'error' => true,
                    'status' => isset($addon_error) ? $addon_error : $status,
                    'product_quantity' => $product_quantity_new,
					'passed_vali' => false,
					'overstock' => isset( $overstock) ? $overstock : false,
					'is_sold_indi' => isset($is_sold_indi ) ? $is_sold_indi :false,
                );
            }
			$alert = ob_get_clean();
			$data1 = array_merge($data, array('alert' => $alert));
            wp_send_json($data1);
}



public function reg_my_ajax_methods()
  {
  $new_reflex = new ReflectionClass(get_class($this));
  foreach($new_reflex->getMethods() as $method)
   {
   if (strpos($method->name, 'ajaxfdoe') === 0)
    {
    $ref = new ReflectionMethod(get_class($this) , $method->name);
    add_action('wc_ajax_' . $method->name, array(
     $this,
     $method->name
    ) , 10, count($ref->getParameters()));
    }
   }
  }
    }
}
