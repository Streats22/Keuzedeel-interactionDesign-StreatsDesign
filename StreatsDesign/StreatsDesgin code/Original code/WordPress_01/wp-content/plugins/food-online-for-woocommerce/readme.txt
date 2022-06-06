=== Food Online for WooCommerce ===
Contributors: arosoft
Donate link: https://paypal.me/arosoftdonate
Tags: home delivery, take away, restaurant, ordering, woocommerce, food, menu, online, order
Requires at least: 5.0
Tested up to: 5.4
Stable tag: 3.2.3
Requires PHP: 7.0
License: GPL v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A restaurant ordering system for WooCommerce. Simple to use. Looks smooth with desktop and mobile.


== Description ==



A restaurant ordering system for WooCommerce. Simple to use. Looks smooth with desktop and mobile.

Insert the Menu with shortcode [foodonline] or [foodonline2] on any page or override the shop page if you so like.

Choose between a one- or two-column menu layout and customize the menu with colors, icons and borders.


With product attributes you can offer your dishes with varieties of size, protein etc.

The plugin is also avalible in a [premium version](https://foodonlineplugin.com/) with extended features.
The plugin is compatible with [WooCommerce Product Add-Ons](https://woocommerce.com/products/product-add-ons/) if you want to offer even more product options and with [Shipping Zones by Drawing](https://wordpress.org/plugins/shipping-zones-by-drawing-for-woocommerce/) if you need to draw your own shipping zones in to a map.

To display products with a table style, look at [Wholesale Order Table](https://wordpress.org/plugins/order-table-for-woocommerce/).



== Installation ==





After activation, add your dishes as WooCommerce simple or variable products.



With variable products you are able to make a dish with choices of size or protien etc.


Use WooCommerce product Categories to sort dishes under menu titles.



Go to WooCommerce -> Settings -> Food Online to setup the Menu color, product image style and the popup style.











== Frequently Asked Questions ==



= Is it possible to define the delivery area through a drawn zone? =

Yes, Food Online is compatible with the free plugin [Shipping Zones by Drawing](https://wordpress.org/plugins/shipping-zones-by-drawing-for-woocommerce/).



= Does this work with WooCommerce Add-Ons? =




Yes, from version 1.6 it´s compatible with WooCommere Add-ons.



You could then offer toppings, side dishes and more.







= Can you tell me please how to display more than 50 products on shop page? =







The free version only allows for 50 products per menu.







= In what order does categories and product items appear in the Menu? =

In alphabetical order.


= Why does the page reload when I´m removing an item from the minicart? =

Go to WooCommerce -> Settings -> Products and check the option "Enable AJAX add to cart buttons on archives".
Then the page will not reload when removing an item from the minicart.


== Changelog ==

= 3.2.3 =

* Bug Fix: Product popups with shortcode [foodonline2] 
* Compatibility with jQuery 3
* Added option to use "woocommerce_thumbnail" format as product image

= 3.2.2 =

* Style fix minicart

= 3.2.1 =

* Bug fix: Product popup shows no content if using Theme as content provider

= 3.2 =

* Adjustments of margins and padding for outer elements
* Product modal images loads when showing modal

= 3.1.1.5 =

* Style sheet improvments

= 3.1.1.3 =

* Style sheet improvments

= 3.1.1.2 =

* Bug Fix: Script dependencies


= 3.1.1.1 =

* Improved script dependency bootstrap
* More robust minicart +/- buttons stylesheet

= 3.1.1 =

 * Bug Fix: WooCommerce Product Addons script dependency when adding directly from Menu
 * Display subtotal at minicart when using WooCommerce Product Addons
 * Added option where to show mobile bottom bar
 * Compatibility improvments IE11 & Edge
 * Option to remove time notice in 'New order' e-mail
 * Improved perfomance at +/- buttons minicart

= 3.0.5 =

 * Bug Fix: Products sold individually can be added multiple times with different options

= 3.0.4 =

 * Bug Fix: Smooth scrolling error when not using sticky bars

= 3.0.3 =

 * Not available message will be shown at Menu for out of stock products

= 3.0.2 =

 * Bug fix: Variation options when add to cart
 * Improved front end for "sold individually" products
 * Bug fix: Redirect to product page for variation products
 * Hide empty categories

= 3.0 =

* MAJOR RELEASE - Make sure to test in your environment before you go live
* New settings pages setup
* New options regarding sticky bars for mobile devices
* New feature to add variation products directly from the menu
* New template (Food Online Style 1) for the product popup
* New template (2020 Template) for the menu layout
* New feature to show one category at time with an accordian behaviour
* New option to show sub categories together with their parent category and not as a independent category
* New top bar
* New feature to add order time to order emails and "Thank you" page
* Some stylesheet changes to improve compatibility with more Themes
* Added alert when menu contains more than 50 products
* New shortcode [foodonline2] that goes around the product loop for better reliability


= 2.6.3 =

* Compatibility with YITH Points & Rewards.
* Improvment of enqueue frontend javascript files.

= 2.6 =

* New minicart option with increment buttons.
* New option to handle sticky behaviuor for mobile devices.
* New option to display categories in top bar.
* Some new styling improvments.


= 2.5.2 =

* Bug fix with subcategories that appeared in 2.5.1

= 2.5.1 =

* New option allowing WooCommerce to handle product sorting

= 2.5.0 =

* Compatibility with WordPress 5.3

= 2.4.9.9.1 =

* More robust error handling
* Modal new z-value

= 2.4.9.9 =

* More robust naming of class row (now arorow)

= 2.4.9.8 =

* Bug fix: Variation form trying to add item without selection

= 2.4.9.3 =

* Open up possibility for account creation at checkot, user login at checkout and use of coupons
* Mini-cart css fix with WooCommerce Product Add ons
* Error messages enabled at checkout

= 2.4.9.2 =

* Minor css margin adjustment on main element

= 2.4.9 =

* Fix: Shortcode with categories safeup


= 2.4.8 =

* Fix: Javascript error when left bar is disabled
* Bootstrap compatibility improvement

= 2.4.7 =

* Fix: Script dependency bug

= 2.4.6 =

 * Tooltip (jQuery tipTip) fix

= 2.4.5 =

* Better compatibility with Internet Explorer
* Bug fix: shortcode error fixes
* Better performance when using sticky sidebars with fixed header


= 2.4.4 =

* Better compatibility with Themes using fixed headers

= 2.4.3 =

* Sticky minicart improvement
* Better stability regarding Theme conflicts
* Option to show woocommerce error messages at checkout
* Fix: not showing price for varaible products
* Added option to confirm when a product is added to cart


= 2.4.1 =

*  Hides products header on shop page only if it is empty.

= 2.4.0 =

*  Menu loading optimization and improved robustness with new Menu templates.


= 2.3.8 =

* Menu loading optimization.
* New product modal settings and templates.
* Fix: Sticky side-bars stops at end of menu.
* Fix: Text Domain adjustment.




= 2.3.7 =


* New independent Bootstrap.(Option to disable Bootstrap is not needed anymore)
* Minicart fixes.
* New checkout field option.
* Improved loading performance.
* Override related products loop at Menu page.
* Improved compatibility with WooCommerce Product Add Ons.

= 2.3.6 =

* Improved compatibility with WooCommerce Product Add Ons.

= 2.3.5 =


* Fix: CSS broken in version 2.3.4.

= 2.3.4 =


* Fix: Remove button not showing.
* Fix: Placement of ordertime on mobile.


= 2.3.3 =

* New z-value on Bootstrap modals.
* Fix: Remove buttons at Cart modal.
* Reset options at modal opening for WooCommerce Product Add-Ons.

= 2.3.2 =


* Fix: Order time showed at bottom of Menu

= 2.3.1 =


* Added feature to display the time until an order is ready.
* Fix: Compatibility with Internet Explorer.
* Added option to keep/remove settings on plugin removal


= 2.3.0 =


* Added advanced option to allow multiple shortcode instances.
* Restrict bootstrap css to food online elements only.
* Re-structure of main js file.
* Memory saving optimization.

= 2.2.9 =


* Sticky right and left bars as option.
* Smooth scrolling as option.
* Options to change menu background and border colors.
* Option to select minicart apperance.

= 2.2.8 =


* New menu titles icons.

= 2.2.7 =


* Bug fix for the shortcode with categories and tags.
= 2.2.6 =


* Included support for categories and tags as options for the shortcode.

= 2.2.5 =


* Fix: Mini cart styling bug.

= 2.2.4 =

* Better compability with WooCommerce Product Addons 3.0.
* Improved styling of the mini cart.



== Screenshots ==







1. Food Online desktop look







2. Food Online mobile look with Storefront Theme







3. Selection of dish varieties







4. Menu Layout with 2020 Premium Template







5. Side dish example with WooCommerce Add-On





6. Example of alternative icons in the Menu





7. Menu Layout with 2 columns

8.  Product Pop Up
