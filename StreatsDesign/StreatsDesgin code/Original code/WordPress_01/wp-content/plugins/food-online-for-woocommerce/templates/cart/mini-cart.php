<?php
/**

* Mini-cart

*

* Contains the markup for the mini-cart, used by the cart widget.

*

* This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.

*

* HOWEVER, on occasion WooCommerce will need to update template files and you

* (the theme developer) will need to copy the new files to your theme to

* maintain compatibility. We try to do this as little as possible, but it does

* happen. When this occurs the version of the template file will be bumped and

* the readme will list any important changes.

*

* @see     https://docs.woocommerce.com/document/template-structure/

* @author  WooThemes

* @package WooCommerce/Templates

* @version 3.7.0

*/
if (!defined('ABSPATH'))
    {
    exit;
    }
do_action('woocommerce_before_mini_cart');

?>

<?php
if (!WC()->cart->is_empty()):
?>

    <ul class="woocommerce-mini-cart cart_list product_list_widget flex-container-column fdoe-mini-cart" >

        <?php
    do_action('woocommerce_before_mini_cart_contents');
     $display = get_option('fdoe_minicart_style','popover') != 'popover' ? 'block' : 'none';
      $subtotal_aggregate = 0;

     if(get_option('fdoe_minicart_reverse_order','no') == 'no'){
        $get_cart = WC()->cart->get_cart();
     }else if (get_option('fdoe_minicart_reverse_order','no') == 'yes'){
        $get_cart = array_reverse(WC()->cart->get_cart());
     }
     foreach ($get_cart as $cart_item_key => $cart_item)

        {

        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key))
            {
            $product_name      = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);
           // $thumbnail         = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);
            $product_price     = apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
            $item_total        = WC()->cart->get_product_subtotal($_product, $cart_item['quantity']);
             $subtotal_aggregate =  $subtotal_aggregate + Food_Online::get_product_subs($_product, $cart_item['quantity']);
            // New look at the remove button

            $remove_button     = esc_attr(apply_filters('woocommerce_cart_item_remove_link', '<span class="mini-cart2">' . sprintf('<a href="%s" class=" remove_from_cart_button fdoe_remove" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="fas fa-times-circle fa-lg" style="color:Tomato"></i></a></span>', esc_url(wc_get_cart_remove_url($cart_item_key)), __('Remove this item', 'woocommerce'), esc_attr($product_id), esc_attr($cart_item_key), esc_attr($_product->get_sku())), $cart_item_key));

        ?>

<!-- Adding the remove button into a aropopover that triggers when hovering-->

<li class="woocommerce-mini-cart-item fdoe_minicart_item" data-toggle="aropopover" data-trigger="hover" data-placement="auto right" data-html="true"  data-content="<?= $remove_button ?>">

                        <?php
            echo sprintf('%s &times; %s', $cart_item['quantity'], $product_name);
?>

                        <?php
            echo wc_get_formatted_cart_item_data($cart_item);
?>



                        <?php
            echo apply_filters('woocommerce_widget_cart_item_quantity', '<span class="mini-cart-quantity">' . sprintf('%s  ', $item_total) . '</span>', $cart_item, $cart_item_key);
?>

                    <?php
            echo apply_filters('woocommerce_cart_item_remove_link', '<span class="fdoe-mini-cart-remove" style="display:'.$display.'">' . sprintf('<a href="%s" class=" remove_from_cart_button fdoe_remove" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="fas fa-times-circle fa-lg" style="color:Tomato"></i></a></span>', esc_url(wc_get_cart_remove_url($cart_item_key)), __('Remove this item', 'woocommerce'), esc_attr($product_id), esc_attr($cart_item_key), esc_attr($_product->get_sku())), $cart_item_key);
?>

</li>

                    <?php
            }
        }
    do_action('woocommerce_mini_cart_contents');
?>

    </ul>

    <p class="woocommerce-mini-cart__total total"><?php
    _e('Subtotal', 'woocommerce');
?>:<span class="total-amount">
    <?php
    if( !defined( 'WC_PRODUCT_ADDONS_VERSION' ) && !class_exists('WC_Dynamic_Pricing')){
    echo WC()->cart->get_cart_subtotal();
	}else{

	$addon_sub = wc_price($subtotal_aggregate);

	if (  WC()->cart->display_prices_including_tax() ){
		if( !wc_prices_include_tax() ) {
                    $addon_sub.= ' <small class="tax_label">' . WC()->countries->inc_tax_or_vat() . '</small>';
		}
                }elseif( wc_prices_include_tax()){

					  $addon_sub.= ' <small class="tax_label">' . WC()->countries->ex_tax_or_vat() . '</small>';
				}
	 echo $addon_sub;

	}
    ?>


</span></p>

    <?php

    do_action('woocommerce_widget_shopping_cart_before_buttons');
?>

    <p class="woocommerce-mini-cart__buttons buttons fdoe_minicart_checkout_button"><?php
    do_action('fdoe_woocommerce_widget_shopping_cart_buttons');
?></p>

<?php
else:
?>

    <p class="woocommerce-mini-cart__empty-message"><?php
    _e('No products in the cart.', 'woocommerce');
?></p>

<?php
endif;
?>

<?php
do_action('woocommerce_after_mini_cart');

?>
