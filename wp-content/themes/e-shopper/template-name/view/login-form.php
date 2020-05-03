<?php
    $errorUsername = (!empty($_GET['user_name_create'])) ? $_GET['user_name_create'] :'';
    $errorPassword = (!empty($_GET['password_create'])) ? $_GET['password_create'] :'';
    $first_name = (!empty($_GET['first_name'])) ? $_GET['first_name'] :'';
    $last_name = (!empty($_GET['last_name'])) ? $_GET['last_name'] :'';
    $email = (!empty($_GET['email'])) ? $_GET['email'] :'';
    $phone = (!empty($_GET['phone'])) ? $_GET['phone'] :'';
    $password_confirm = (!empty($_GET['password_confirm'])) ? $_GET['password_confirm'] :'';
    $username_exists = (!empty($_GET['username_exists'])) ? $_GET['username_exists'] :'';
    $email_exists = (!empty($_GET['email_exists'])) ? $_GET['email_exists'] :'';
    $password_math = (!empty($_GET['password_math'])) ? $_GET['password_math'] :'';
    $errorLogin = (!empty($_GET['error_login'])) ? $_GET['error_login'] :'';
    $insert_user = (!empty($_GET['insert_user'])) ? $_GET['insert_user'] :'';
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="" id="loginModal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3>Have an Account?</h3>
                </div>
                <div class="modal-body">
                    <div class="well">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                            <li><a href="#create" data-toggle="tab">Create Account</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane active in" id="login">
                                <form class="form-horizontal"  method="POST">
                                    <fieldset>
                                        <div id="legend">
                                            <legend class="">Login</legend>
                                        </div>
                                        <?php echo (!empty($errorLogin)) ? '<small class="form-text text-muted">'.$errorLogin.'</small>' : ''; ?>
                                        <div class="control-group">
                                            <!-- Username -->
                                            <label class="control-label"  for="username">Username</label>
                                            <div class="controls">
                                                <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                                                <?php echo (!empty($errorUsername)) ? '<small class="form-text text-muted">'.$errorUsername.'</small>' : ''; ?>

                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <!-- Password-->
                                            <label class="control-label" for="password">Password</label>
                                            <div class="controls">
                                                <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                                                <?php echo (!empty($errorPassword)) ? '<small class="form-text text-muted">'.$errorPassword.'</small>' : ''; ?>
                                            </div>
                                        </div>


                                        <div class="control-group">
                                            <!-- Button -->
                                            <div class="controls">
                                                <button class="btn btn-success">Login</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="create">
                                <div><?php echo (!empty($password_math)) ? '<small class="form-text text-muted">'.$password_math.'</small>' : ''; ?></div>
                                <div><?php echo (!empty($email_exists)) ? '<small class="form-text text-muted">'.$email_exists.'</small>' : ''; ?></div>
                                <div><?php echo (!empty($username_exists)) ? '<small class="form-text text-muted">'.$username_exists.'</small>' : ''; ?></div>
                                <div><?php echo (!empty($insert_user)) ? '<small class="form-text text-muted">'.$insert_user.'</small>' : ''; ?></div>
                                <form id="tab" action="<?php site_url('login')?>" method="post">
                                    <label>Username</label>
                                    <input type="text" name="user_name_create" value="" class="input-xlarge">
                                    <div><?php echo (!empty($errorUsername)) ? '<small class="form-text text-muted">'.$errorUsername.'</small>' : ''; ?></div>
                                    <label>First Name</label>
                                    <input type="text" name="first_name" value="" class="input-xlarge">
                                    <div><?php echo (!empty($first_name)) ? '<small class="form-text text-muted">'.$first_name.'</small>' : ''; ?></div>
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" value="" class="input-xlarge">
                                    <div><?php echo (!empty($last_name)) ? '<small class="form-text text-muted">'.$last_name.'</small>' : ''; ?></div>
                                    <label>Email</label>
                                    <input type="text" name="email" value="" class="input-xlarge">
                                    <div><?php echo (!empty($email)) ? '<small class="form-text text-muted">'.$email.'</small>' : ''; ?></div>
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="" class="input-xlarge">
                                    <div><?php echo (!empty($phone)) ? '<small class="form-text text-muted">'.$phone.'</small>' : ''; ?></div>
                                    <label>Password</label>
                                    <input type="password" name="password_create" value="" class="input-xlarge">
                                    <div><?php echo (!empty($errorPassword)) ? '<small class="form-text text-muted">'.$errorPassword.'</small>' : ''; ?></div>
                                    <label>Password Confirm</label>
                                    <input type="password" name="password_confirm" value="" class="input-xlarge">
                                    <div><?php echo (!empty($password_confirm)) ? '<small class="form-text text-muted">'.$password_confirm.'</small>' : ''; ?></div>
                                    <div>
                                        <button type="submit" class="btn btn-primary">Create Account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>