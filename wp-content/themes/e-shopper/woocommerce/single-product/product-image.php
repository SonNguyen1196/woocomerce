<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;
$imageGallrys = $product->get_gallery_image_ids();
?>

<div class="htc__product__details__tab__content">
    <?php
        if (is_array($imageGallrys)){
            if (count($imageGallrys) > 0){
                ?>
                <!-- Start Product Big Images -->
                <div class="product__big__images">
                    <div class="portfolio-full-image tab-content">
                        <?php
                            foreach ($imageGallrys as $key => $gallry){
                                $imgSrc = wp_get_attachment_image_src($gallry, 'full');
                                ?>
                                <div role="tabpanel" class="tab-pane fade in <?php echo ($key == 0) ? 'active' : '' ?>" id="img-tab-<?php echo $key ?>">
                                    <img src="<?php echo $imgSrc[0]?>" alt="full-image">
                                </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
                <!-- End Product Big Images -->
                <!-- Start Small images -->
                <ul class="product__small__images" role="tablist">
                    <?php
                    foreach ($imageGallrys as $key => $gallry){
                        $imgSrc = wp_get_attachment_image_src($gallry, 'full');
                        ?>
                        <li role="presentation" class="pot-small-img <?php echo ($key == 0) ? 'active' : '' ?>">
                            <a href="#img-tab-<?php echo $key ?>" role="tab" data-toggle="tab">
                                <img src="<?php echo $imgSrc[0]?>" alt="small-image">
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <!-- End Small images -->

                <?php
            }
        }
    ?>

</div>
