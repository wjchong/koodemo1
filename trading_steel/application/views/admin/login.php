<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
   <?php require_once('includes/site-master-account.php'); ?>
</head>

<body class="body-bg-full profile-page" style="background-image: url(<?= base_url('assets/admin') ?>/demo/night.jpg)">
    <div id="wrapper" class="row wrapper">
        <div class="col-10 ml-sm-auto col-sm-6 col-md-4 ml-md-auto login-center mx-auto">
            <div class="navbar-header text-center">
                <a href="#">
				
				  <h4>eKart</h4>
                </a>
            </div>
            <!-- /.navbar-header -->
            <form class="form-material" method="POST" id="admin-login" action="<?php echo site_url('admin/user/auth');?>">
                <div class="form-group">
                <?php if ($this->session->flashdata("admin_login")) { ?>
                    <div class="<?php echo $this->session->flashdata("admin_login")['class']; ?>" role="alert" style="text-align:center; border-radius: 0px">
                        <?php echo $this->session->flashdata("admin_login")['msg']; ?>
                    </div>
                <?php } ?>
                </div>
				
				 <div class="form-group">
                   
					<select  name="usertype" class="form-control  form-control-line"  id="usertype" required="required" placeholder="User Role">
					   <option value=""> --Select User Role--</option>
                        <option value="superadmin">Superadmin</option>
						 <option value="admin">admin</option>
						  <option value="subadmin">subadmin</option>
                    
					</select>
                   
                </div>
				
                <div class="form-group">
                    <input type="text" placeholder="Username" class="form-control form-control-line" id="username" name="username" value="<?php echo $_REQUEST['username']; ?>" required="required">
                    <label for="example-email">Username</label>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="password" class="form-control form-control-line" id="password" name="password" value="<?php echo $_REQUEST['password']; ?>" required="required">
                    <label>Password</label>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-lg btn-color-scheme ripple" id="pshoBtnl" type="submit">Login</button>
                </div>
                <div class="form-group no-gutters mb-0">
                    <div class="col-md-12 d-flex">
                        <div class="checkbox checkbox-info mr-auto">
                            <label>
                                <!-- <input type="checkbox" checked="checked"> <span class="label-text">Remember me</span> -->
                            </label>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.form-group -->
            </form>
            <!-- /.form-material -->
       
            <!-- /.btn-list -->
            <footer class="col-sm-12 text-center">
                
               
            </footer>
        </div>
        <!-- /.login-center -->
    </div>
    <!-- /.body-container -->
    <?php require_once('includes/footer-account.php'); ?>
</body>

</html>