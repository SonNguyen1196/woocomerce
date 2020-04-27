<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
    <div class="body__overlay"></div>
    <!-- Start Offset Wrapper -->
    <div class="offset__wrapper">
        <!-- Start Search Popap -->
        <div class="search__area">
            <div class="container" >
                <div class="row" >
                    <div class="col-md-12" >
                        <div class="search__inner">
                            <form action="#" method="get">
                                <input placeholder="Search here... " type="text">
                                <button type="submit"></button>
                            </form>
                            <div class="search__close__btn">
                                <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Popap -->
        <!-- Start Cart Panel -->
        <div class="shopping__cart">
            <div class="shopping__cart__inner">
                <div class="offsetmenu__close__btn">
                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                </div>
                <div class="shp__cart__wrap">
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/product-2/sm-smg/1.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">BO&Play Wireless Speaker</a></h2>
                            <span class="quantity">QTY: 1</span>
                            <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/product-2/sm-smg/2.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">Brone Candle</a></h2>
                            <span class="quantity">QTY: 1</span>
                            <span class="shp__price">$25.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="shoping__total">
                    <li class="subtotal">Subtotal:</li>
                    <li class="total__price">$130.00</li>
                </ul>
                <ul class="shopping__btn">
                    <li><a href="cart.html">View Cart</a></li>
                    <li class="shp__checkout"><a href="checkout.html">Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- End Cart Panel -->
    </div>
    <!-- End Offset Wrapper -->
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="index.html">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">Products</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Bradcaump area -->
    <!-- Start Product Grid -->
    <section class="htc__product__grid bg__white ptb--100">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                    <div class="htc__product__rightidebar">
                        <div class="htc__grid__top">
                            <div class="htc__select__option">
                                <select class="ht__select">
                                    <option>Default softing</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select>
                                <select class="ht__select">
                                    <option>Show by</option>
                                    <option>Sort by popularity</option>
                                    <option>Sort by average rating</option>
                                    <option>Sort by newness</option>
                                </select>
                            </div>
                            <div class="ht__pro__qun">
                                <span>Showing 1-12 of 1033 products</span>
                            </div>
                            <!-- Start List And Grid View -->
                            <ul class="view__mode" role="tablist">
                                <li role="presentation" class="grid-view active"><a href="#grid-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-grid"></i></a></li>
                                <li role="presentation" class="list-view"><a href="#list-view" role="tab" data-toggle="tab"><i class="zmdi zmdi-view-list"></i></a></li>
                            </ul>
                            <!-- End List And Grid View -->
                        </div>
                        <!-- Start Product View -->
                        <div class="row">
                            <div class="shop__grid__view__wrap">
                                <div role="tabpanel" id="grid-view" class="single-grid-view tab-pane fade in active clearfix">
                                    <?php
                                    if ( woocommerce_product_loop() ) {

                                        if ( wc_get_loop_prop( 'total' ) ) {
                                            while ( have_posts() ) {
                                                the_post();

                                                /**
                                                 * Hook: woocommerce_shop_loop.
                                                 */
                                                do_action( 'woocommerce_shop_loop' );

                                                wc_get_template_part( 'content', 'product' );
                                            }
                                        }
                                    } else {
                                        /**
                                         * Hook: woocommerce_no_products_found.
                                         *
                                         * @hooked wc_no_products_found - 10
                                         */
                                        do_action( 'woocommerce_no_products_found' );
                                    }

                                    ?>
                                </div>
                                    <!-- Start Single Product -->

                                <div role="tabpanel" id="list-view" class="single-grid-view tab-pane fade clearfix">
                                    <div class="col-xs-12">
                                        <div class="ht__list__wrap">
                                            <!-- Start List Product -->
                                            <?php
                                            if ( woocommerce_product_loop() ) {

                                                if ( wc_get_loop_prop( 'total' ) ) {
                                                    while ( have_posts() ) {
                                                        the_post();

                                                        /**
                                                         * Hook: woocommerce_shop_loop.
                                                         */
                                                        do_action( 'woocommerce_shop_loop' );

                                                        wc_get_template_part( 'content', 'product-list' );
                                                    }
                                                }
                                            } else {
                                                /**
                                                 * Hook: woocommerce_no_products_found.
                                                 *
                                                 * @hooked wc_no_products_found - 10
                                                 */
                                                do_action( 'woocommerce_no_products_found' );
                                            }

                                            ?>
                                            <!-- End List Product -->

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php do_action( 'woocommerce_after_shop_loop' ); ?>
                        </div>
                        <!-- End Product View -->
                    </div>

                </div>
                <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="htc__product__leftsidebar">
                        <!-- Start Prize Range -->
                        <div class="htc-grid-range">
                            <h4 class="title__line--4">Price</h4>
                            <div class="content-shopby">
                                <div class="price_filter s-filter clear">
                                    <form action="#" method="GET">
                                        <div id="slider-range"></div>
                                        <div class="slider__range--output">
                                            <div class="price__output--wrap">
                                                <div class="price--output">
                                                    <span>Price :</span><input type="text" id="amount" readonly>
                                                </div>
                                                <div class="price--filter">
                                                    <a href="#">Filter</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Prize Range -->
                        <!-- Start Category Area -->
                        <div class="htc__category">
                            <h4 class="title__line--4">categories</h4>
                            <ul class="ht__cat__list">
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Bags</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Jewelry</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Food / Drink Store</a></li>
                                <li><a href="#">Gift Store</a></li>
                                <li><a href="#">Accessories</a></li>
                                <li><a href="#">Watch</a></li>
                                <li><a href="#">Other</a></li>
                            </ul>
                        </div>
                        <!-- End Category Area -->

                        <!-- Start Pro Color -->
                        <div class="ht__pro__color">
                            <h4 class="title__line--4">color</h4>
                            <ul class="ht__color__list">
                                <li class="grey"><a href="#">grey</a></li>
                                <li class="lamon"><a href="#">lamon</a></li>
                                <li class="white"><a href="#">white</a></li>
                                <li class="red"><a href="#">red</a></li>
                                <li class="black"><a href="#">black</a></li>
                                <li class="pink"><a href="#">pink</a></li>
                            </ul>
                        </div>
                        <!-- End Pro Color -->
                        <!-- Start Pro Size -->
                        <div class="ht__pro__size">
                            <h4 class="title__line--4">Size</h4>
                            <ul class="ht__size__list">
                                <li><a href="#">xs</a></li>
                                <li><a href="#">s</a></li>
                                <li><a href="#">m</a></li>
                                <li><a href="#">reld</a></li>
                                <li><a href="#">xl</a></li>
                            </ul>
                        </div>
                        <!-- End Pro Size -->
                        <!-- Start Tag Area -->
                        <div class="htc__tag">
                            <h4 class="title__line--4">tags</h4>
                            <ul class="ht__tag__list">
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">bag</a></li>
                                <li><a href="#">Shoes</a></li>
                                <li><a href="#">Jewelry</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Aceessories</a></li>
                                <li><a href="#">Store</a></li>
                                <li><a href="#">Watch</a></li>
                                <li><a href="#">Other</a></li>
                            </ul>
                        </div>
                        <!-- End Tag Area -->
                        <!-- Start Compare Area -->
                        <div class="htc__compare__area">
                            <h4 class="title__line--4">compare</h4>
                            <ul class="htc__compare__list">
                                <li><a href="#">White men’s polo<i class="icon-trash icons"></i></a></li>
                                <li><a href="#">T-shirt for style girl...<i class="icon-trash icons"></i></a></li>
                                <li><a href="#">Basic dress for women...<i class="icon-trash icons"></i></a></li>
                            </ul>
                            <ul class="ht__com__btn">
                                <li><a href="#">clear all</a></li>
                                <li class="compare"><a href="#">Compare</a></li>
                            </ul>
                        </div>
                        <!-- End Compare Area -->
                        <!-- Start Best Sell Area -->
                        <div class="htc__recent__product">
                            <h2 class="title__line--4">best seller</h2>
                            <div class="htc__recent__product__inner">
                                <!-- Start Single Product -->
                                <div class="htc__best__product">
                                    <div class="htc__best__pro__thumb">
                                        <a href="product-details.html">
                                            <img src="images/product-2/sm-smg/1.jpg" alt="small product">
                                        </a>
                                    </div>
                                    <div class="htc__best__product__details">
                                        <h2><a href="product-details.html">Product Title Here</a></h2>
                                        <ul class="rating">
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                        </ul>
                                        <ul  class="pro__prize">
                                            <li class="old__prize">$82.5</li>
                                            <li>$75.2</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                <!-- Start Single Product -->
                                <div class="htc__best__product">
                                    <div class="htc__best__pro__thumb">
                                        <a href="product-details.html">
                                            <img src="images/product-2/sm-smg/2.jpg" alt="small product">
                                        </a>
                                    </div>
                                    <div class="htc__best__product__details">
                                        <h2><a href="product-details.html">Product Title Here</a></h2>
                                        <ul class="rating">
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                        </ul>
                                        <ul  class="pro__prize">
                                            <li class="old__prize">$82.5</li>
                                            <li>$75.2</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                                <!-- Start Single Product -->
                                <div class="htc__best__product">
                                    <div class="htc__best__pro__thumb">
                                        <a href="product-details.html">
                                            <img src="images/product-2/sm-smg/1.jpg" alt="small product">
                                        </a>
                                    </div>
                                    <div class="htc__best__product__details">
                                        <h2><a href="product-details.html">Product Title Here</a></h2>
                                        <ul class="rating">
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                            <li class="old"><i class="icon-star icons"></i></li>
                                        </ul>
                                        <ul  class="pro__prize">
                                            <li class="old__prize">$82.5</li>
                                            <li>$75.2</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        </div>
                        <!-- End Best Sell Area -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grid -->
    <!-- Start Brand Area -->
    <div class="htc__brand__area bg__cat--4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ht__brand__inner">
                        <ul class="brand__list owl-carousel clearfix">
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/1.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/2.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/3.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/4.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/5.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/5.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/1.png" alt="brand images"></a></li>
                            <li><a href="#"><img src="<?php echo get_template_directory_uri()?>/assets/images/brand/2.png" alt="brand images"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Brand Area -->

    <!-- Start Footer Area -->
<?php
get_footer();
