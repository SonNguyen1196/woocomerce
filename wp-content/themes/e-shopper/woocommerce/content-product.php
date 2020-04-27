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

<div <?php wc_product_class( 'col-md-4 col-lg-4 col-sm-6 col-xs-12', $product ); ?>>
    <div class="category">
        <div class="ht__cat__thumb">
            <a href="<?php echo get_permalink($product->ID) ?>">
                <img class="img-responsive" src="<?php echo get_the_post_thumbnail_url($product->ID)?>" alt="<?php echo $product->get_name() ?>">
            </a>
        </div>
        <div class="fr__hover__info">
            <ul class="product__action">
                <li><a href="wishlist.html"><i class="icon-heart icons"></i></a></li>

                <li><a href="<?php echo $product->add_to_cart_url() ?>>"><i class="icon-handbag icons"></i></a></li>

                <li><a href="#"><i class="icon-shuffle icons"></i></a></li>
            </ul>
        </div>
        <div class="fr__product__inner">
            <h4><a href="<?php echo get_permalink($product->ID) ?>"><?php echo $product->get_name() ?></a></h4>
            <ul class="fr__pro__prize">
                <li class="old__prize"><?php echo $product->get_regular_price().get_woocommerce_currency_symbol() ?></li>
                <li><?php echo $product->get_sale_price().get_woocommerce_currency_symbol() ?></li>
            </ul>
        </div>
    </div>
</div>

