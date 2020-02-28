<?php define("admin_assets", base_url()."assets/admincss/"); ?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <title>SocialRyde | Admin</title>
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
                    <img src="<?php echo base_url('assets'); ?>/images/banner/logo.png" alt="" class="img-responsive center-block"style="width:31%;">
                </div> 

 
                <div class="panel-body">

 <?php include("session_msg.php");  ?>
          <?php if($this->session->flashdata('success')){ ?>
             <div class="notibar msgsuccess" style="background-position: 0 -103px;"><p><?= $this->session->flashdata('success'); ?></p></div>
            <?php } ?>

            <form id="login" action="<?php echo base_url('admin/forgot_password'); ?>" method="post">
            	
                <h3 class="text-center">Forgot Password</h3>
                    
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg" type="text" required="" name="email" id="email" placeholder="Email Address">
                        </div>
                    </div>

                
<div class="form-group pull-right" style="margin-right: 2px;">
                 
                         <div>
                            <a href="<?php echo base_url(); ?>admin">Login</a>
                        </div>
                    </div>


                    
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg w-lg waves-effect waves-light bg-login-btn" type="submit" style="background-color:#f7ce11 !important;border-color: #f7ce11 !important">Forgot Password</button>
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
