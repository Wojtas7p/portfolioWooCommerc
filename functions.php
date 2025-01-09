<?php

add_filter( 'auto_update_plugin', '__return_true' );



function remove_primary_nav() { 
    remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
} add_action( 'init' , 'remove_primary_nav');


function remove_logo() { 
    add_action( 'storefront_header', 'storefront_site_branding', 20 );
} add_action( 'init' , 'remove_logo');


function storefront_search() { 
    remove_action( 'storefront_header', 'storefront_product_search', 40 );
} add_action( 'init' , 'storefront_search');


if ( ! function_exists( 'storefront_cart_link' ) ) {
	/**
	 * @return void
	 * @since  
	 */
	function storefront_cart_link() {
		if ( ! storefront_woo_cart_available() ) {
			return; } 
            ?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'storefront' ); ?>">
				<span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'storefront' ), WC()->cart->get_cart_contents_count() ) ); ?></span>
			</a>
		<?php
	}
}

function remove_section_content() { 
 remove_action( 'homepage', 'storefront_homepage_content', 10 );
 remove_action( 'homepage', 'storefront_popular_products', 50 );
 remove_action( 'homepage', 'storefront_best_selling_products', 70 );
 remove_action( 'homepage', 'storefront_on_sale_products', 60 );
} add_action( 'init' , 'remove_section_content');
	


function order_popular_content() { 
add_action( 'homepage', 'storefront_popular_products', 5 );
add_action( 'homepage', 'storefront_on_sale_products', 6 );
 } add_action( 'init' , 'order_popular_content');



function storefront_footer_create(){
if(is_product() || is_shop() || is_cart() || is_product_category() || is_account_page() || is_checkout()){
global $product;
?>

<h1 class="footer_text"><?=$product->get_name()?></h1>

<?php } else {
?>
<h1 class="footer_text">nukhku</h1>
<?php 
}
}


function footer_create(){
	add_action('storefront_footer', 'storefront_footer_create', 100);
}
add_action('init', 'footer_create');



function price_up(){
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 1 );
}

add_action('init', 'price_up');