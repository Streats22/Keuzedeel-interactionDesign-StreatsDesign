<?php
if (!defined('ABSPATH')) {
    exit;
}
if (!isset($settings_args)) {
    $settings_args = array(
        array(
            'name' => __('Main Settings', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_visibility',
             'desc' => __( 'Either show the Menu on shop page or use shortcode [foodonline] or [foodonline2] on any page.', 'food-online-for-woocommerce' ),
             'class' => 'test'
        ),
        array(
             'name' => __( 'Main shop page', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_override_shop',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Show the menu on main shop page', 'food-online-for-woocommerce' ),
            'default' => 'yes'
        ),

              array(
            'name' => __('Sticky', 'food-online-for-woocommerce'),
            'id' => 'fdoe_sticky_bar',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Make side/top menu bars sticky?', 'food-online-for-woocommerce')
        ),


 array(
            'name' => __('Sticky for mobile devices?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_sticky_mobile',
            'type' => 'select',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Choose what to make sticky on mobile devices?', 'food-online-for-woocommerce'),
            'options' => array(
                  'cats' => __( 'Top Category Menu', 'food-online-for-woocommerce' ),

                  'selector' => __( 'Delivery Selector', 'food-online-for-woocommerce' ),
                   'both' => __( 'Top Category Menu & Delivery Selector', 'food-online-for-woocommerce' ),
                'no' => __( 'None', 'food-online-for-woocommerce' ),
            ),
        ),
                                array(
            'name' => __('Smooth Scrolling', 'food-online-for-woocommerce'),
            'id' => 'fdoe_smooth_scrolling',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Use smooth scrolling navigating in the Menu?', 'food-online-for-woocommerce')
        ),
        array(
            'name' => __('Show confirmation when added to cart', 'food-online-for-woocommerce'),
            'id' => 'fdoe_show_confirmation',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show confirmation when an item is added to cart?', 'food-online-for-woocommerce')
        ),

        array(
            'name' => __('Hide the Storefront Theme Headings', 'food-online-for-woocommerce'),
            'id' => 'fdoe_hide_storefront_head',
            'type' => 'checkbox',
            'default' => 'yes',
            'css' => 'min-width:300px;',
            'desc' => __('Hide the Menu, Search fields and Cart in the page headings? (Only for the Storefront Theme)', 'food-online-for-woocommerce')
        ),
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_visibility'
        ),
        array(
            'name' => __('Checkout Settings', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_visibility',

        ),
        array(
            'name' => __('Checkout', 'food-online-for-woocommerce'),
            'id' => 'fdoe_limited_fields',
            'type' => 'select',
            'options' => array(
                'phone' => __('Phone Only', 'food-online-for-woocommerce'),
                'e-mail' => __('Phone and E-mail', 'food-online-for-woocommerce'),
                'name' => __('Phone, E-mail and Name', 'food-online-for-woocommerce'),
                'woo_default' => __('Default Woocommerce Setup', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Checkout field for "Pick Up" or when the delivery Switch is turned off.', 'food-online-for-woocommerce'),
            'default' => 'woo_default',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
        array(
            'id' => 'fdoe_limited_fields2',
            'type' => 'select',
            'options' => array(
                'limited' => __('Limited field', 'food-online-for-woocommerce'),
                'woo_default' => __('Default Woocommerce Setup', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Checkout field for "Delivery" choice ', 'food-online-for-woocommerce'),
            'default' => 'woo_default',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
         array(
            'name' => __('Extra? Popup', 'food-online-for-woocommerce'),
            'id' => 'fdoe_extra_popup',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show a popup at checkout with featured products as supplementary?', 'food-online-for-woocommerce'),
            'default' => 'no',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_checkout'
        ),



  array(
             'name' => __( 'Minicart Settings', 'food-online-for-woocommerce' ),
            'type' => 'title',
            'id' => 'fdoe_minicart_style'
        ),
   array(
            'name' => __('Hide the Cart', 'food-online-for-woocommerce'),
            'id' => 'fdoe_hide_minicart',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Hide the Cart from Menu page?', 'food-online-for-woocommerce'),
            'default' => 'no'
        ),
        array(
             'name' => __( 'Minicart Style', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_minicart_style',
            'default' => 'popover',
            'type' => 'select',
            'options' => array(
                  'popover' => __( 'Popup Style', 'food-online-for-woocommerce' ),
                 'basic' => __( 'Basic Style', 'food-online-for-woocommerce' ),
                  'increment' => __( '+ / - Buttons', 'food-online-for-woocommerce' ),
                'theme' => __( 'Theme Default', 'food-online-for-woocommerce' ),
            ),
            'css' => 'max-width:200px;',
            'desc' => __( 'Choose how to style the minicart?', 'food-online-for-woocommerce' )
    ),
         array(
             'name' => __( 'Minicart Order', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_minicart_reverse_order',
            'default' => 'no',
            'type' => 'select',
            'options' => array(
                 'no' => __( 'Add to bottom', 'food-online-for-woocommerce' ),
                 'yes' => __( 'Add to top', 'food-online-for-woocommerce' ),


            ),
            'css' => 'max-width:200px;height:auto;',
            'desc' => __( 'Select where added products appear in minicart', 'food-online-for-woocommerce' )
    ),
         array(
             'type' => 'sectionend',
            'id' => 'fdoe_minicart_style'
        ),
         array(
             'name' => __( 'Product Popup Options', 'food-online-for-woocommerce' ),
            'type' => 'title',
            'id' => 'fdoe_popup_options'
        ),
           array(
             'name' => __( 'Pop-up simple products?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_popup_simple',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Use pop-up for simple products when add-to-cart.', 'food-online-for-woocommerce' ),
            'default' => 'yes'
        ),
          array(
             'name' => __( 'Pop-up variable products?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_popup_variable',
            'type' => 'select',
            'css' => 'min-width:300px;',
            'desc' => __( 'The "Add to cart instantly" option is applicable when variation products doesn´t have options', 'food-online-for-woocommerce' ),
            'default' => 'yes',
            'options' => array(
                 'yes' => __( 'Use Popups', 'food-online-for-woocommerce' ),

                 'add' => __( 'Add to cart instantly', 'food-online-for-woocommerce' ),
                 'no' => __( 'Redirect to product page', 'food-online-for-woocommerce' ),


            ),
        ),
          array(
             'name' => __( 'Product Popup Source', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_product_popup_content',
            'default' => 'custom',
            'type' => 'select',
            'options' => array(
                 'theme' => __( 'Theme Template', 'food-online-for-woocommerce' ),
                 'custom' => __( 'Food Online Original', 'food-online-for-woocommerce' ),
                  'style-1' => __( 'Food Online Style 1', 'food-online-for-woocommerce' ),

            ),
            'css' => 'max-width:200px;',
            'desc' => __( 'Choose how to display content in product popup?', 'food-online-for-woocommerce' )
    ),
            array(
             'name' => __( 'Product Popup Content', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_product_popup_content_spec',
            'default' => array(),
            'type' => 'multiselect',
            'class' => 'wc-enhanced-select',

            'options' => array(
                 'image' => __( 'Product Image', 'food-online-for-woocommerce' ),
                 'meta' => __( 'Product Meta', 'food-online-for-woocommerce' ),
                 'rating_' => __( 'Product Rating', 'food-online-for-woocommerce' ). ' (Premium)',
                 'desc_' => __( 'Product Description', 'food-online-for-woocommerce' ). ' (Premium)',

            ),
            'css' => 'max-width:200px;height:auto;',
            'desc' => __( 'Select content for the product popup.', 'food-online-for-woocommerce' )
        ),

        array(
            'name' => __('Hide the increment buttons', 'food-online-for-woocommerce'),
            'id' => 'fdoe_use_plugin_increment_css',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Hide the increment buttons (+/-) in the quantity input field?', 'food-online-for-woocommerce')
        ),


          array(
             'type' => 'sectionend',
            'id' => 'fdoe_popup_options'
        ),


    );

}
if (!isset($settings_args_menu_styling)) {

    $settings_args_menu_styling = array(

        array(
            'name' => __('Menu Layout', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_menu_layout'
        ),
        array(
            'name' => __('Menu Layout', 'food-online-for-woocommerce'),
            'id' => 'fdoe_layout',
            'default' => 'fdoe_onecol',
            'type' => 'select',
            'options' => array(
                'fdoe_onecol' => __('One Column', 'food-online-for-woocommerce'),
                'fdoe_twocols' => __('Two Columns', 'food-online-for-woocommerce'),
                  'fdoe_twentytwenty' => __('2020 Template', 'food-online-for-woocommerce')
            )
        ),
         array(
             'name' => __( 'Show Menu like Accordian?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_accordian',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Show only one category at time with accoridan behaviour', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
         array(
             'name' => __( 'Show Sub Categories along with Parent Category?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_subcat_with_parent',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Show sub categories together with their parent category and not as a independent category', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
         array(
            'name' => __('Top Bar', 'food-online-for-woocommerce'),
            'id' => 'fdoe_top_bar',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show a bar above the Menu?', 'food-online-for-woocommerce'),
            'default' => 'no'
        ),
           array(
            'name' => __('Categories Left Menu', 'food-online-for-woocommerce'),
            'id' => 'fdoe_left_menu',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show categories in left-bar menu?', 'food-online-for-woocommerce')
        ),
                  array(
            'name' => __('Categories Top Menu', 'food-online-for-woocommerce'),
            'id' => 'fdoe_cat_top_menu',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show categories in top-bar menu?', 'food-online-for-woocommerce')
        ),
                                    array(
            'name' => __('Mobile Categories Top Menu', 'food-online-for-woocommerce'),
            'id' => 'fdoe_cat_top_menu_mobile',
            'type' => 'checkbox',
            'default' => 'yes',
            'css' => 'min-width:300px;',
            'desc' => __('Show categories in top-bar menu on mobile devices?', 'food-online-for-woocommerce')
        ),
                    array(
           'name' => __('Bottom Mobile Bar', 'food-online-for-woocommerce'),
            'id' => 'fdoe_bottom_bar',
             'desc' => __('Show a bottom bar for mobile devices?', 'food-online-for-woocommerce'),
            'default' => 'yes',
            'type' => 'select',
            'options' => array(
                'yes' => __('Show at whole site', 'food-online-for-woocommerce'),

                'menu' => __('Show at Menu pages', 'food-online-for-woocommerce'),
                 'woocommerce' => __('Show at woocommerce pages', 'food-online-for-woocommerce'),
                  'no' => __('Hide Bottom bar', 'food-online-for-woocommerce'),
            )
        ),
  array(
            'type' => 'sectionend',
            'id' => 'fdoe_menu_layout'
        ),
         array(
            'name' => __('Menu Style', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_menu_style'
        ),
        array(
            'name' => __('Menu Color', 'food-online-for-woocommerce'),
            'id' => 'fdoe_color',
            'type' => 'text',
            'class' => 'fdoe-color-picker',
            'default' => '#bf5bb6'
        ),
        array(
             'name' => __( 'Menu Background Color', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_color_back',
            'type' => 'text',
            'class' => 'fdoe-color-picker',
            'default' => '#fff'
        ),
        array(
            'name' => __('Menu Items Separator', 'food-online-for-woocommerce'),
            'id' => 'fdoe_item_separator',
            'default' => 'dashed',
            'type' => 'select',
            'options' => array(
                'dashed' => __('Dashed', 'food-online-for-woocommerce'),
                'solid' => __('Solid', 'food-online-for-woocommerce'),
                'dotted' => __('Dotted', 'food-online-for-woocommerce'),
                'hidden' => __('None', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Style of the Menu items separator?', 'food-online-for-woocommerce')
        ),
     array(
             'name' => __( 'Menu Items Separator Color', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_border_color',
            'type' => 'text',
            'class' => 'fdoe-color-picker',
            'default' => '#ddd'
        ),
        array(
            'name' => __('Menu Titles Icon', 'food-online-for-woocommerce'),
            'id' => 'fdoe_menu_titles_icon',
            'default' => 'fas fa-ellipsis-h',
            'class' => 'fdoe-icon-picker',
            'type' => 'select',
            'options' => array(
                                                'fas fa-ellipsis-h' => __( 'Dots', 'food-online-for-woocommerce' ),
                                                'fas fa-minus' => __( 'Lines', 'food-online-for-woocommerce' ),
                                                 'fas fa-seedling' => __( 'Leef', 'food-online-for-woocommerce' ),
                                                 'fas fa-genderless' => __( 'Ring', 'food-online-for-woocommerce' ),
                                                 'fas fa-star' => __( 'Star', 'food-online-for-woocommerce' ),
                                                 'fas fa-pepper-hot' => __( 'Chili Pepper', 'food-online-for-woocommerce' ),
                                                 'fas fa-pizza-slice' => __( 'Pizza', 'food-online-for-woocommerce' ),
                                                 'fas fa-hamburger' => __( 'Hamburger', 'food-online-for-woocommerce' ),
                                                 'fas fa-apple-alt' => __( 'Apple', 'food-online-for-woocommerce' ),
                                                '' => __( 'None', 'food-online-for-woocommerce' )
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Icon to display with the menu titles?', 'food-online-for-woocommerce')
        ),
        array(
            'name' => __('Item Icon', 'food-online-for-woocommerce'),
            'id' => 'fdoe_item_icon',
            'default' => 'fas fa-plus-circle',
            'class' => 'fdoe-icon-picker',
            'type' => 'select',
            'options' => array(
                'fas fa-plus-circle' => __('Standard', 'food-online-for-woocommerce'),
                'fas fa-plus' => __('Plus', 'food-online-for-woocommerce'),
                'fas fa-plus-square' => __('Square Shape Plus', 'food-online-for-woocommerce'),
                'fas fa-seedling' => __('Leef', 'food-online-for-woocommerce'),
                'fas fa-shopping-basket' => __('Shopping Basket', 'food-online-for-woocommerce'),
                'fas fa-shopping-cart' => __('Shopping Cart', 'food-online-for-woocommerce'),
                'fas fa-cart-plus' => __('Shopping Cart with plus', 'food-online-for-woocommerce'),
                'fas fa-utensils' => __('Knife & Fork', 'food-online-for-woocommerce'),
                '' => __('None', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Item "Add" icon in the Menu?', 'food-online-for-woocommerce')
        ),


        array(
            'name' => __('Product Images', 'food-online-for-woocommerce'),
            'id' => 'fdoe_show_images',
            'default' => 'rec',
            'type' => 'select',
            'options' => array(
                'small' => __('Small size', 'food-online-for-woocommerce'),
                'rec' => __('Normal Size', 'food-online-for-woocommerce'),
                'big' => __('Big Size', 'food-online-for-woocommerce'),
                'hide' => __('Hide images', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Show images for products in menu?', 'food-online-for-woocommerce')
        ),
         array(
            'name' => __('Product Image Type', 'food-online-for-woocommerce'),
            'id' => 'fdoe_image_size',
            'default' => 'default',
            'type' => 'select',
            'options' => array(
                'default' => __('Default Type', 'food-online-for-woocommerce'),
                'woocommerce_thumbnail' => __('WooCommerce Thumbnail', 'food-online-for-woocommerce'),


            ),
            'css' => 'max-width:200px;',
            'desc' => __('Choose product image type?', 'food-online-for-woocommerce')
        ),
        array(
            'name' => __('Category Images', 'food-online-for-woocommerce'),
            'id' => 'fdoe_cat_image',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show images for categories in menu?', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
        array(
            'name' => __('Category Description', 'food-online-for-woocommerce'),
            'id' => 'fdoe_show_cat_desc',
            'type' => 'checkbox',
            'default' => 'no',
            'css' => 'min-width:300px;',
            'desc' => __('Show description for categories in menu?', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),


             array(
            'type' => 'sectionend',
            'id' => 'fdoe_menu_style'
        ),



                                    );}
if (!isset($settings_args_delivery)) {

    $settings_args_delivery = array(
      array(
            'name' => __('Delivery Features Settings', 'food-online-for-woocommerce'),
            'type' => 'title',
            'desc' => __('A Google Maps API Key is needed to let customers fill in their delivery address. ( Maps JavaScript API, Places API, Geocoding API, Directions API)', 'food-online-for-woocommerce'),
            'id' => 'fdoe_delivery_swithcher'
        ),
        array(
            'name' => __('Enable the Delivery Selector', 'food-online-for-woocommerce'),
            'id' => 'fdoe_enable_delivery_switcher',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __('Show a switch to let customers choose between "Pick Up" or "Delivery".', 'food-online-for-woocommerce'),

            'custom_attributes' => array('disabled' => 'disabled'),
            'class' => 'fdoe_premium_option',
        ),
         array(
            'name' => __('Google Maps API Key', 'food-online-for-woocommerce'),
            'id' => 'fdoe_google_maps_api',
            'type' => 'text',
            //'css' => 'min-width:300px;',
            'desc' => __(' <p><a href="https://cloud.google.com/maps-platform/#get-started" target="_blank">Visit Google to get your API Key &raquo;</a></p>', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
        array(
            'name' => __('Default mode of the Delivery Selector?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_default_for_switch',
            'default' => 'pickup',
            'type' => 'select',
            'options' => array(
                'pickup' => 'Pick Up',
                'delivery' => 'Delivery'
        ),
            'desc' => __('Select the default mode of the delivery selector at page load.', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
            'class' => 'fdoe_premium_option',
        ),
        array(
            'name' => __('Skip address input and validation at Menu page', 'food-online-for-woocommerce'),
            'id' => 'fdoe_skip_address_validation',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
          //  'class' => 'fdoe',
            'desc' => __('Let users input their delivery address at checkout page. No address validation will be performed.', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
               'class' => 'fdoe_premium_option',
        ),
        array(
            'name' => __('Allow shipping method fallback to "Pick Up"', 'food-online-for-woocommerce'),
            'id' => 'fdoe_allow_ship_change',
           // 'css' => 'max-width:100px;',
            'default' => 'yes',
            'type' => 'checkbox',
            'desc' => __('Allow checkout to change shipping method to "Pick Up" and override the choice of the "Delivery selector" ', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
             'class' => 'fdoe_premium_option',
        ),
array(
            'name' => __('Change checkout notice', 'food-online-for-woocommerce'),
            'id' => 'fdoe_checkout_message',
           // 'css' => 'max-width:100px;',
            'default' => '',
            'type' => 'text',
            'desc' => __('Change the message that inform that shipping method has been changed', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
        array(
            'name' => __('Minimum Order Value', 'food-online-for-woocommerce'),
            'id' => 'fdoe_min_order',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set a minimum order value limit for delivery, default is 0 which means no limit.', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
        array(
            'name' => __('Minimum Items per Order', 'food-online-for-woocommerce'),
            'id' => 'fdoe_min_order_items',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set a minimum of items per order for delivery, default is 0 which means no limit.', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_delivery_swithcher'
        ),
        );



}
if (!isset($settings_args_advanced)) {

    $settings_args_advanced = array(
     array(
            'name' => __('Advanced Settings', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_advanced'
        ),


        array(
            'name' => __('Force Enqueue Google Maps JS', 'food-online-for-woocommerce'),
            'id' => 'fdoe_force_enqueue_google',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',

        ),
         array(
            'name' => __('Lazy load Menu images', 'food-online-for-woocommerce'),
            'id' => 'fdoe_lazy_load_menu',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
             'desc' => __( 'Wait loading Menu images until they appear on screen', 'food-online-for-woocommerce' ),
              'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',

        ),
        array(
            'name' => __('Do not restrict Google Autocomplete to IP-located country', 'food-online-for-woocommerce'),
            'id' => 'fdoe_restrict_country',
            'default' => 'no',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),

        array(
             'name' => __( 'Multiple shortcode instances?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_force_shortcode',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Not recommended. Only for troubleshooting', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
         array(
             'name' => __( 'Show error messages at checkout?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_show_error_messages',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Show WooCommerce error messages at checkout?', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
         array(
             'name' => __( 'Delete settings?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_clean_settings',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Delete all settings on plugin removal?', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
         array(
             'name' => __( 'Product Sorting by Title?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_product_sorting_title',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Override WooCommerce and sort products by title on shop page?', 'food-online-for-woocommerce' ),
            'default' => 'yes'
        ),
        array(
            'type' => 'sectionend',
            'id' => 'fdoe_advanced'
        )
        );



}
    if (!isset($settings_args_third)) {
    $settings_args_third = array(
        array(
            'name' => __('Time to finished order', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_time_to_delivery',
             'desc' => __( 'Show an approximate time for an order to be ready.', 'food-online-for-woocommerce' ),
        ),

 array(
            'name' => __('Fixed time per order', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickup_fixed',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set a fixed time in minutes for preparing an order.', 'food-online-for-woocommerce')
        ),
          array(
            'name' => __('Extra time per processing order', 'food-online-for-woocommerce'),
            'id' => 'fdoe_pickup_var',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set extra time in minutes per order already processing.', 'food-online-for-woocommerce')
        ),
          array(
            'type' => 'sectionend',
             'id' => 'fdoe_time_to_delivery',
        ),
           array(
            'name' => __('Pickup Orders', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_time_to_delivery_pickup',

        ),
        array(
            'name' => __('Show time until ready for pickup?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_ready_for_pickup_show',
            'type' => 'select',
            'options' => array(
                'none' => __('Hide', 'food-online-for-woocommerce'),
                'fixedtime' => __('By a fixed time', 'food-online-for-woocommerce'),
                'variable' => __('By fixed time & orders in progress', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Show the time until a pickup order is ready.', 'food-online-for-woocommerce'),
            'default' => 'none'
        ),

array(
            'type' => 'sectionend',
             'id' => 'fdoe_time_to_delivery_pickup',
        ),
 array(
            'name' => __('Delivery Orders', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_time_to_delivery_del',

        ),
  array(
            'name' => __('Set vehicle', 'food-online-for-woocommerce'),
            'id' => 'shipping_vehicle',
            'type' => 'select',
            'options' => array(

                'DRIVING' => __('By car or truck', 'food-online-for-woocommerce'),
                'BICYCLING' => __('By bicycle', 'food-online-for-woocommerce'),


             ),
            'css' => 'max-width:200px;',
            'desc' => __('Select a vehicle type that will be used to calculate shipping time. It will also be used to decide the delivery icon.', 'food-online-for-woocommerce'),
            'default' => 'driving',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
          array(
            'name' => __('Show time until delivery?', 'food-online-for-woocommerce'),
            'id' => 'fdoe_ready_for_delivery_show',
            'type' => 'select',
            'options' => array(
                'none' => __('Hide', 'food-online-for-woocommerce'),
                'fixedtime' => __('By a fixed time', 'food-online-for-woocommerce'),
                'variable' => __('By fixed time & orders in progress', 'food-online-for-woocommerce'),
                 'fixed_ship' => __('By fixed time & shipping time', 'food-online-for-woocommerce'),
                 'variable_ship' => __('By fixed time & orders in progress & shipping time', 'food-online-for-woocommerce')
            ),
            'css' => 'max-width:200px;',
            'desc' => __('Show the time until a delivery order can be delivered.', 'food-online-for-woocommerce'),
            'default' => 'none',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),

           array(
            'name' => __('Set shipping time', 'food-online-for-woocommerce'),
            'id' => 'fdoe_shipping_time',
            'type' => 'select',
            'options' => array(
                'none' => __('None', 'food-online-for-woocommerce'),
                'fixedtime' => __('Fixed shipping time', 'food-online-for-woocommerce'),
                'calculate' => __('Calculate shipping time', 'food-online-for-woocommerce'),

            ),
            'css' => 'max-width:200px;',
            'desc' => __('Show the time until a delivery order can be delivered.', 'food-online-for-woocommerce'),
            'default' => 'none',
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
            array(
            'name' => __('Fixed shipping time', 'food-online-for-woocommerce'),
            'id' => 'fdoe_shipping_fixed',
            'css' => 'max-width:100px;',
            'default' => '0',
            'type' => 'text',
            'desc' => __('Set a fixed time in minutes for shipping an order.', 'food-online-for-woocommerce'),
             'custom_attributes' => array('disabled' => 'disabled'),
              'class' => 'fdoe_premium_option',
        ),
            array(
            'type' => 'sectionend',
             'id' => 'fdoe_time_to_delivery_del',
        ),

array(
            'name' => __('Attach to e-mails etc.', 'food-online-for-woocommerce'),
            'type' => 'title',
            'id' => 'fdoe_order_time_email',

        ),
 array(
             'name' => __( 'Add to customer processing e-mail?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_add_to_processing',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to customer e-mails for processing order.', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
  array(
             'name' => __( 'Add to customer completed e-mail?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_add_to_completed',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to customer e-mails for completed order.', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
   array(
             'name' => __( 'Add to "Thank You" page?', 'food-online-for-woocommerce' ),
            'id' => 'fdoe_add_to_thank_you',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to the "Thank You" page showing when an order is received.', 'food-online-for-woocommerce' ),
            'default' => 'no'
        ),
    array(
             'name' => __( 'Add to new order e-mail?', 'fdoep' ),
            'id' => 'fdoe_add_to_neworder',
            'type' => 'checkbox',
            'css' => 'min-width:300px;',
            'desc' => __( 'Add the order time to store admin e-mail (New Order).', 'food-online-for-woocommerce' ),
            'default' => 'yes'
        ),


         array(
            'type' => 'sectionend',
             'id' => 'fdoe_order_time_email',
        ),

        );
}
