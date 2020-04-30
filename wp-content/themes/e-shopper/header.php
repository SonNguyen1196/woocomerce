<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package e-shopper
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title() ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri() ?>/assets/images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>


<!-- Body main wrapper start -->
<div class="wrapper">
    <!-- Start Header Style -->
    <header id="htc__header" class="htc__header__area header--one">
        <!-- Start Mainmenu Area -->
        <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
            <div class="container">
                <div class="row">
                    <div class="menumenu__container clearfix">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5">
                            <div class="logo">
                                <a href="index.html"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/logo/4.png" alt="logo images"></a>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">

                            <?php
                            wp_nav_menu( [
                                'menu' => 'menu-1',
                                'menu_class' => 'main__menu',
                                'container' => 'nav',
                                'container_class' => 'main__menu__nav hidden-xs hidden-sm',
                                'walker' => new WPDocs_Walker_Nav_Menu(),
                            ] )
                            ?>

                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                            <div class="header__right">
                                <div class="header__search search search__open">
                                    <a href="#"><i class="icon-magnifier icons"></i></a>
                                </div>
                                <div class="header__account">
                                    <a href="#"><i class="icon-user icons"></i></a>
                                </div>
                                <?php
                                $carts = WC()->cart->get_cart();
                                $quantity = (is_array($carts)) ? count($carts) : 0 ;
                                global $woocommerce;
                                ?>
                                <div class="htc__shopping__cart">
                                    <a class="cart__menu" href="#"><i class="icon-handbag icons"></i></a>
<!--                                    <a class="cart-customlocation" href="#">--><?php //echo $woocommerce->cart->cart_contents_count ;?><!-- </a>-->
                                    <a class="mini-cart-custom" href="#"><span class="htc__qua"><?php echo $woocommerce->cart->cart_contents_count ;?></span></a>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area"></div>
            </div>
        </div>
        <!-- End Mainmenu Area -->
    </header>


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
                <div id="site-header-cart" class="widget_shopping_cart_content">

                    <div class="shp__cart__wrap widget woocommerce widget_shopping_cart">
                        <?php woocommerce_mini_cart();?>

                    </div>

                </div>

                <ul class="shoping__total">
                    <li class="subtotal">Subtotal:</li>
                    <li class="total__price"><?php echo WC()->cart->get_cart_total();?></li>
                </ul>
                <ul class="shopping__btn">
                    <li><a href="<?php echo wc_get_cart_url() ?>">View Cart</a></li>
                    <li class="shp__checkout"><a href="<?php echo wc_get_checkout_url() ?>">Checkout</a></li>
                </ul>
            </div>
        </div>
        <!-- End Cart Panel -->
    </div>
    <!-- End Offset Wrapper -->



