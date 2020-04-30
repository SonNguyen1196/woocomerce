<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>

<div class="ht__list__product">

</div>

<div <?php wc_product_class( 'ht__list__product', $product ); ?>>

    <div class="ht__list__thumb">
        <a href="<?php echo get_permalink($product->ID) ?>"><img src="<?php echo get_the_post_thumbnail_url($product->ID)?>" alt="product images"></a>
    </div>
    <div class="htc__list__details">
        <h2><a href="<?php echo get_permalink($product->ID) ?>"><?php echo $product->get_name() ?></a></h2>
        <ul  class="pro__prize">
            <li class="old__prize"><?php echo $product->get_regular_price().get_woocommerce_currency_symbol() ?></li>
            <li><?php echo $product->get_sale_price().get_woocommerce_currency_symbol() ?></li>
        </ul>
        <ul class="rating">
            <li><i class="icon-star icons"></i></li>
            <li><i class="icon-star icons"></i></li>
            <li><i class="icon-star icons"></i></li>
            <li class="old"><i class="icon-star icons"></i></li>
            <li class="old"><i class="icon-star icons"></i></li>
        </ul>
        <p>Lorem ipsum dolor sit amet, consectetur adipisLorem ipsum dolor sit amet, consec adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqul Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <div class="fr__list__btn">
            <a data-product-id = "<?php echo $product->get_id() ?>" class="fr__btn add-to-cart-link" href="<?php echo $product->add_to_cart_url() ?>"><i class="fa fa-spinner" aria-hidden="true"></i> Add To Cart</a>
        </div>
    </div>

</div>

