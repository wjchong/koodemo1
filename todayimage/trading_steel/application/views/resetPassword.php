<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo ucwords($member_row->fullname); ?> - Your New Password</title>
    <?php require_once('includes/site-master-account.php'); ?>
</head>

<body class="body-bg-full profile-page" style="background-image: url(<?= base_url('assets') ?>/demo/night.jpg)">
    <div id="wrapper" class="row wrapper">
        <div class="col-10 ml-sm-auto col-sm-6 col-md-4 ml-md-auto login-center mx-auto">
            <div class="navbar-header text-center">
                <a href="<?= base_url(); ?>">
                    <img alt="" src="<?= base_url('assets') ?>/demo/logo-expand-dark.png">
                </a>
            </div>
            <!-- /.navbar-header -->
            <form class="form-material" id="member-resetPswd" method="post" action="<?php echo site_url('user/resetPassword');?>/<?php echo $member_row->id ?>">
                <div class="text-center mr-b-20">
                    <img src="assets/demo/users/user7.jpg" class="rounded-circle img-thumbnail thumb-lg" alt="">
                </div>
                <h4 class="text-center text-muted">Hi, <strong><?php echo ucwords($member_row->fullname); ?></strong></h4>
                <p class="text-center text-muted">Enter your new password to access your account.</p>
                <div class="form-group no-gutters">
                    <label class="col-md-12">New Password</label>
                    <div class="col-md-12">
                        <input type="password" name="password" id="password" placeholder="New Password" class="form-control form-control-line" required="required">
                    </div>
                </div>
                <div class="form-group no-gutters">
                    <label class="col-md-12">Confirm Password</label>
                    <div class="col-md-12">
                        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" class="form-control form-control-line" required="required">
                    </div>
                </div>
                <div class="form-group no-gutters mb-5">
                    <div class="col-md-12">
                        <button class="btn btn-block btn-color-scheme ripple" id="rstPswd" type="submit">Update Password</button>
                    </div>
                </div>
            </form>
            <footer class="col-sm-12 text-center">
                <hr>
                <p>Not you? return <a href="<?= base_url('user/loginForm'); ?>" class="text-primary m-l-5"><b>Login</b></a>
                </p>
            </footer>
        </div>
        <!-- /.login-center -->
    </div>
    <!-- /.body-container -->
    <?php require_once('includes/footer-account.php'); ?>
</body>

</html>