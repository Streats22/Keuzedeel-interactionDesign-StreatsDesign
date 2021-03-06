<?php
/**
 * A single fooditem inside of the [fooditems] shortcode.
 *
 * @since 1.0.0
 *
 * @package RPRESS
 * @category Template
 * @author RestroPress
 * @version 1.0.4
 */

global $rpress_fooditem_shortcode_item_atts, $rpress_fooditem_shortcode_item_i, $rpress_food_item_cats;

?>

<?php $schema = rpress_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : ''; ?>
<?php
$post_terms = wp_get_post_terms( get_the_ID(), 'food-category');
$get_food_id = $post_terms[0]->term_taxonomy_id;
?>

<div <?php echo $schema; ?>class="<?php echo esc_attr( apply_filters( 'rpress_fooditem_class', 'rpress_fooditem', get_the_ID(), $rpress_fooditem_shortcode_item_atts, $rpress_fooditem_shortcode_item_i ) ); ?>" data-term-id="<?php echo $get_food_id; ?>" id="rpress_fooditem_<?php the_ID(); ?>">

	<div class="row <?php echo esc_attr( apply_filters( 'rpress_fooditem_inner_class', 'rpress_fooditem_inner', get_the_ID(), $rpress_fooditem_shortcode_item_atts, $rpress_fooditem_shortcode_item_i ) ); ?>">

		<?php
			do_action( 'rpress_fooditem_before' );

				rpress_get_template_part( 'shortcode', 'content-image' );
				do_action( 'rpress_fooditem_after_thumbnail' );

				rpress_get_template_part( 'shortcode', 'content-title' );
				do_action( 'rpress_fooditem_after_title' );

				rpress_get_template_part( 'shortcode', 'content-cart-button' );
				do_action( 'rpress_fooditem_after_cart_button' );

			do_action( 'rpress_fooditem_after' );
		?>

	</div>

</div>
