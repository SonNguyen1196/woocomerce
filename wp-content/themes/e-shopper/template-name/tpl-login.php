<?php
/*
 * Template Name: Login
 * */
get_header();

if (is_user_logged_in()){
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul>
                    <li><a href="<?php echo site_url('/login/dashboard')?>">Dashboard</a></li>
                    <li><a href="<?php echo site_url('/login/order')?>">Order</a></li>
                    <li><a href="<?php echo site_url('/login/info')?>">Info</a></li>
                </ul>
            </div>
            <div class="col-md-8">
            </div>
        </div>
    </div>
    <?php
}else{
    include 'view/login-form.php';
}
?>

<?php

get_footer();