        <nav class="navbar">
            <!-- Logo Area -->
            <div class="navbar-header">
                <a href="<?= base_url('admin/user/dashboard') ?>" class="navbar-brand">
                       <h3>Steel Ekart</h3>
                    <img class="logo-collapse" alt="" src="<?= base_url('assets/admin') ?>/demo/logo-collapse.png">
                    <!-- <p>OSCAR</p> -->
                </a>
            </div>
            <!-- /.navbar-header -->
            <!-- Left Menu & Sidebar Toggle -->
            <ul class="nav navbar-nav">
                <li class="sidebar-toggle"><a href="javascript:void(0)" class="ripple"><i class="material-icons list-icon">menu</i></a>
				
                </li>
            </ul>
            <!-- /.navbar-left -->
   
            <div class="spacer"></div>
            <!-- Button: Create New -->
          
            <!-- /.btn-list -->
            <!-- Right Menu -->
           
            <!-- /.navbar-right -->
            <!-- User Image with Dropdown -->
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle ripple" data-toggle="dropdown"><span class="avatar thumb-sm"><img src="<?= base_url('assets/admin') ?>/demo/users/user-image.png" class="rounded-circle" alt=""> <i class="material-icons list-icon">expand_more</i></span></a>
                    <div
                    class="dropdown-menu dropdown-left dropdown-card dropdown-card-wide dropdown-card-dark text-inverse">
                        <div class="card">
                            <header class="card-heading-extra">
                                <div class="row">
                                    <div class="col-8">
                                        <h3 class="mr-b-10 sub-heading-font-family fw-300"><?php echo $this->session->userdata('loged_in')['name']; ?></h3><span class="user--online">Available <i class="material-icons list-icon">expand_more</i></span>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end"><a href="<?= base_url('admin') ?>/user/logout" class="mr-t-10"><i class="material-icons list-icon">power_settings_new</i> Logout</a>
                                    </div>
                                    <!-- /.col-4 -->
                                </div>
                                <!-- /.row -->
                            </header>
                          
                        </div>
    </div>
    </li>
    </ul>
    <!-- /.navbar-right -->
    </nav>