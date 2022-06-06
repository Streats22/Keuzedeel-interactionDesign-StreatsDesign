<?php

if ( !defined( 'ABSPATH' ) ) {

    exit;

}




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
#menu_headings{
	display: <?php echo $display_top_cat_menu; ?>;
}

</style>

<!-- Main container of the Menu -->

<div class="container-fluid fdoe_main_container" id="the_main_container">

	<div class="arorow">

		<div class="arocol-xs-12 arocol-sm-12 arocol-lg-12" >


			<div class="arorow fdoe-flex-1">

				<?php



                    do_action( 'fdoe_loop_start_2');


if(get_option('fdoe_left_menu', 'no')== 'yes'){
                    ?>
			<div class="hidden-xs arocol-sm-2 fdoe-less-gut" id="fdoe-left-left-container">
<?php
$is_sticky = get_option('fdoe_sticky_bar','no') == 'yes' ? 'fdoe-sticky' : '';

		echo '<div class="'.$is_sticky.'"  id="menu_headings_2" ><h4 class="Category_heading">';
			echo __( 'Menu', 'food-online-for-woocommerce' );
			echo '</h4>
</div>';


?>
			</div>
			<div class="arocol-xs-12 arocol-sm-7 arocol-lg-7 fdoe-less-gut" id="fdoe-left-container">
			<?php }else{
				?>
				<div class="arocol-xs-12 arocol-sm-9 arocol-lg-9 fdoe-less-gut" id="fdoe-left-container">
					<?php

				} ?>



					<div class="fdoe">

						<div class="fdoe-products flex-container-column" id="the_menu"  >

							<div id="fdoe_products_id" class="fdoe_menu_header fdoe-top-sticky">
								<ul class="nav nav-tabs fdoe-menu-2  " id="menu_headings" >
								</ul>

							</div>
