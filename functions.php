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
	