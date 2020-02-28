<?php define("admin_assets", base_url()."assets/admincss/"); ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>KOOBER | Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />


        <link href="<?php echo base_url('assets'); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets'); ?>/css/core.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets'); ?>/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets'); ?>/css/components.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets'); ?>/css/pages.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets'); ?>/css/menu.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('assets'); ?>/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="<?php echo base_url('assets'); ?>/js/modernizr.min.js"></script>
        
    </head>
    <body class="login-bg">


        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-logn bg-img"> 
                    <div class="bg-overlay"></div>
                    <img src="<?php echo base_url('assets'); ?>/images/banner/logo.png" alt="" class="img-responsive center-block" style="width:31%; background-color:#FFFFFF">
                </div> 

 
                <div class="panel-body">

<?php if($this->session->flashdata('success')){ ?>
             <div class="notibar msgerror" style="background: rgba(76, 175, 80, 0.81) url(assets/admincss/images/notifications.png) no-repeat 0 0;
    background-position: 0 -103px;"><p style="color:#fff"><?= $this->session->flashdata('success'); ?></p></div>
            <?php } ?>
          
          <?php include("session_msg.php");  ?>

                <form class="form-horizontal m-t-20" id="login" action="<?php echo base_url(); ?>admin/go" method="post">
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text" required="" name="username" id="username" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="password" required="" name="password" id="password"  placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-6">
                            <div class="checkbox checkbox-primary" style="padding-top: 0px;">
                                <input id="checkbox-signup" type="checkbox">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                         <div class="col-xs-6">
                            <a href="<?php echo base_url('admin/view_page/forgotpassword'); ?>"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                    </div>
                    
                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light bg-login-btn" type="submit" style="background-color:#f7ce11 !important;border-color: #f7ce11 !important">Log In</button>
                        </div>
                    </div>

                    <div >
                       
                
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>

        
    	<script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
        <script src="<?php echo base_url('assets'); ?>/js/jquery.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/detect.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/fastclick.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/waves.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/wow.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url('assets'); ?>/js/jquery.scrollTo.min.js"></script>

        <script src="<?php echo base_url('assets'); ?>/js/jquery.app.js"></script>
	
	</body>
</html>
