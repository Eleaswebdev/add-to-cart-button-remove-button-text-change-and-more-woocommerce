//change default add-to-cart text on single product page
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');   
function woo_custom_cart_button_text() {
 return __('Add Product', 'woocommerce'); 
}

/**
 * Redirect users after add to cart.
 */
function my_custom_add_to_cart_redirect( $url ) {

	$url = WC()->cart->get_checkout_url();
	// $url = wc_get_checkout_url(); // since WC 2.5.0

	return $url;

}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );

/**
 * remove add to cart button for specific products
 */

//for category
add_action( 'woocommerce_is_purchasable', 'hide_add_to_cart_function', 10, 2 );

function hide_add_to_cart_function( $return_value, $product )
{
// For example, you want to filter out add to cart button for all the products with category accessories.
if ( has_term( 'category1', 'product_cat' ) ) {
return false;
}

return $return_value;
}

//for simpe type product
add_action( 'woocommerce_is_purchasable', 'hide_add_to_cart_function1', 10, 2 );

function hide_add_to_cart_function1( $return_value, $product )
{
// For example, you want to filter out add to cart button for all the products with category accessories.
if ( $product->is_type( 'simple' ) ) {
return false;
}

return $return_value;
}

//remove the Add to Cart button in shop page as well as product pages.


remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
