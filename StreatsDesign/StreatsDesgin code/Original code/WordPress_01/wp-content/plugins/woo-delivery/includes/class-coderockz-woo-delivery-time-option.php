<?php
if( !class_exists( 'Coderockz_Woo_Delivery_Time_Option' ) ) {
	
	class Coderockz_Woo_Delivery_Time_Option {
		
		public static function delivery_time_option($delivery_time_settings,$meta_box=null) {
			
			if(isset($delivery_time_settings['store_location_timezone']) &&
				!empty($delivery_time_settings['store_location_timezone'])) {
				date_default_timezone_set($delivery_time_settings['store_location_timezone']);
			}

			$currency_symbol = get_woocommerce_currency_symbol();
			
			$start = (isset($delivery_time_settings['delivery_time_starts']) && !empty($delivery_time_settings['delivery_time_starts'])) ? $delivery_time_settings['delivery_time_starts'] : "0";
			$end = (isset($delivery_time_settings['delivery_time_ends']) && !empty($delivery_time_settings['delivery_time_ends'])) ? $delivery_time_settings['delivery_time_ends'] : "1440";
			$time_slot = (isset($delivery_time_settings['each_time_slot']) && !empty($delivery_time_settings['each_time_slot'])) ? $delivery_time_settings['each_time_slot'] : "180";

			$time_format = (isset($delivery_time_settings['time_format']) && !empty($delivery_time_settings['time_format'])) ? $delivery_time_settings['time_format'] : "12";
			if($time_format == 12) {
				$time_format = "h:i A";
			}
			elseif ($time_format == 24) {
				$time_format = "H:i";
			}

			$result = [];
			$it = $end;
			if(($end-$start)%$time_slot !=0){
				$remaining_time = ($end-$start)%$time_slot;
				$it = $end-$remaining_time;
				$fractional_from_hour = date($time_format, mktime(0, $it));
				$fractional_to_hour = date($time_format, mktime(0, $end));
				$result["$it,$end"] = $fractional_from_hour . ' - ' . $fractional_to_hour;
							
			}
			while($it > $start) {
				$to = $it;
				$from = $it - $time_slot;
				$from_hour = date($time_format, mktime(0, $from));
				if($time_format == "H:i" && $to == 1440){
					$to_hour = "24:00";
				} else {
					$to_hour = date($time_format, mktime(0, $to));
				}
				$result["$from,$to"] = $from_hour . ' - ' . $to_hour;
				
				$it = $from;
			}
			$new_result = [];
			$custom_result = [];
			if(is_null($meta_box)){
				$result[''] = '';
			}
			
			$result = array_reverse($result);

			return $result;
		}
	}
}