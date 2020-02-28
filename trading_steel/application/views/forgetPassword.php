<!DOCTYPE html>
<html lang="en">

<head>
    <title>Email - To Change Password</title>
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
            <form class="form-material" id="member-forget" method="post" action="<?php echo site_url('user/forgetPasswordForm');?>">
                <p class="text-center text-muted">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                <div class="form-group no-gutters">
                    <?php if ($this->session->flashdata("pswd")) { ?>
                        <div class="<?php echo $this->session->flashdata("pswd")['class']; ?>" role="alert" style="text-align:center; border-radius: 0px">
                            <?php echo $this->session->flashdata("pswd")['msg']; ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group no-gutters">
                    <input type="email" placeholder="Email Address" class="form-control form-control-line" name="email" id="email" required="required">
                    <label for="example-email" class="col-md-12 mb-1">Email</label>
                </div>
                <div class="form-group mb-5">
                    <button type="" class="btn btn-block btn-color-scheme ripple" id="frgPswd" type="submit">Submit</button>
                </div>
            </form>
            <!-- /.form-material -->
            <footer class="col-sm-12 text-center">
                <hr>
                <p>Back to <a href="<?= base_url('user/loginForm'); ?>" class="text-primary m-l-5"><b>Login</b></a>
                </p>
            </footer>
        </div>
        <!-- /.login-center -->
    </div>
    <!-- /.body-container -->
    <?php require_once('includes/footer-account.php'); ?>
</body>

</html>