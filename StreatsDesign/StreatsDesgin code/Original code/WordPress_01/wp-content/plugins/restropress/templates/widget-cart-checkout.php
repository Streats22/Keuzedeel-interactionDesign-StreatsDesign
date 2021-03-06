<?php 
	$color = rpress_get_option( 'checkout_color', 'red' );
	$cart_quantity = rpress_get_cart_quantity();
	$display       = $cart_quantity > 0 ? '' : ' style="display:none;"';
?>

<li class="cart_item rpress-cart-meta rpress_subtotal"><?php _e( 'SubTotal:', 'restropress' ); ?> <span class="cart-subtotal <?php echo $color; ?>"><?php echo rpress_currency_filter( rpress_format_amount( rpress_get_cart_subtotal() ) ); ?></span>
</li>

<?php if ( rpress_use_taxes() ) : ?>
<li class="cart_item rpress-cart-meta rpress_cart_tax"><?php _e( 'Estimated Tax:', 'restropress' ); ?> <span class="cart-tax"><?php echo rpress_currency_filter( rpress_format_amount( rpress_get_cart_tax() ) ); ?></span></li>
<?php endif; ?>

<?php do_action( 'rpress_cart_line_item' ); ?>

<li class="cart_item rpress-cart-meta rpress_total"><?php _e( 'Total (', 'restropress' ); ?><span class="rpress-cart-quantity" <?php echo $display; ?> ><?php echo $cart_quantity; ?></span><?php _e( ' Items)', 'restropress' ); ?><span class="cart-total <?php echo $color; ?>"><?php echo rpress_currency_filter( rpress_format_amount( rpress_get_cart_total() ) ); ?></span></li>
<li class="delivery-items-options">
	<?php echo get_delivery_options( true ); ?>
</li>
<li class="cart_item rpress_checkout <?php echo $color; ?>"><a data-url="<?php echo rpress_get_checkout_uri(); ?>" href="#"><?php _e( 'Checkout', 'restropress' ); ?></a></li>