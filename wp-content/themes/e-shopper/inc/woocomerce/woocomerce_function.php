<?php
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_notice_before_shop_loop', 'woocommerce_output_all_notices', 10);
add_action('e_shopper_woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );
function custom_woocommerce_product_add_to_cart_text() {
    global $product;

    $product_type = $product->product_type;

    switch ( $product_type ) {
        case 'external':
            return __( 'Take me to their site!', 'woocommerce' );
            break;
        case 'grouped':
            return __( 'VIEW THE GOOD STUFF', 'woocommerce' );
            break;
        case 'simple':
            return '<i class="icon-handbag icons"></i>';
            break;
        case 'variable':
            return __( 'Select the variations, yo!', 'woocommerce' );
            break;
        default:
            return __( 'Read more', 'woocommerce' );
    }

}