<?php

if( !class_exists( 'Coderockz_Woo_Delivery_Helper' ) ) {

	class Coderockz_Woo_Delivery_Helper {

		public function coderockz_woo_delivery_array_sanitize($array) {
		    $newArray = array();
		    if (count($array)>0) {
		        foreach ($array as $key => $value) {
		            if (is_array($value)) {
		                foreach ($value as $key2 => $value2) {
		                    if (is_array($value2)) {
		                        foreach ($value2 as $key3 => $value3) {
		                            $newArray[$key][$key2][$key3] = sanitize_text_field($value3);
		                        }
		                    } else {
		                        $newArray[$key][$key2] = sanitize_text_field($value2);
		                    }
		                }
		            } else {
		                $newArray[$key] = sanitize_text_field($value);
		            }
		        }
		    }
		    return $newArray;
		}

		public function containsDecimal( $value ) {
			$value = (string)$value;
		    if ( strpos( $value, "." ) !== false ) {
		        return true;
		    }
		    return false;
		}

		public function check_virtual_downloadable_products() {
			// By default, no virtual or downloadable product
			$has_virtual_downloadable_products = false;
			  
			// Default virtual products number
			$virtual_products = 0;

			// Default downloadable products number
			$downloadable_products = 0;
			  
			// Get all products in cart
			$products = WC()->cart->get_cart();
			  
			// Loop through cart products
			foreach( $products as $product ) {
				  
				// Get product ID and '_virtual' post meta
				$product_id = $product['product_id'];
				$is_virtual = get_post_meta( $product_id, '_virtual', true );
				  
				// Update $has_virtual_product if product is virtual
				if( $is_virtual == 'yes' ) {
					$virtual_products += 1;
				}

				$is_downloadable = get_post_meta( $product_id, '_downloadable', true );
				  
				// Update $has_virtual_product if product is virtual
				if( $is_downloadable == 'yes' ) {
					$downloadable_products += 1;
				}
			  		
			}

			$total_virtual_downloadable_products = $virtual_products + $downloadable_products;

			if( count($products) == $virtual_products || count($products) == $downloadable_products || count($products) == $total_virtual_downloadable_products) {
			 	$has_virtual_downloadable_products = true;
			}

			return $has_virtual_downloadable_products;
		}		

	}

}