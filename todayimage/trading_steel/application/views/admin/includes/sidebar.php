<!-- SIDEBAR -->
<aside class="site-sidebar scrollbar-enabled clearfix">
    <!-- User Details -->
    <div class="side-user">
        <a class="col-sm-12 media clearfix" href="javascript:void(0);">
            <figure class="media-left media-middle user--online thumb-sm mr-r-10 mr-b-0">
                <img src="<?= base_url('assets/admin') ?>/demo/users/user-image.png" class="media-object rounded-circle" alt="">
            </figure>
            <div class="media-body hide-menu">
                <h4 class="media-heading mr-b-5 text-uppercase"><?php echo $this->session->userdata('loged_in')['name']; ?></h4><span class="user-type fs-12">Edit Profile (...)</span>
            </div>
        </a>
        <div class="clearfix"></div>
        <ul class="nav in side-menu">
            <li><a href="<?= base_url('admin/user/profile') ?>"><i class="list-icon material-icons">face</i> My Profile</a></li>
 
            <li><a href="#"><i class="list-icon material-icons">settings_power</i> Logout</a></li>
        </ul>
    </div>
    <!-- /.side-user -->
     <!-- Sidebar Menu -->
    <nav class="sidebar-nav">
	 <?php $get_data=$title;?>
        <ul class="nav in side-menu">
		
            <li class="current-page "><a href="<?= base_url('admin/User/dashboard') ?>" class="ripple"><i class="list-icon material-icons">network_check</i> <span class="hide-menu">Dashboard</span></a>
            
            </li>
		
	     <li class="menu-item-has-children"><a href="javascript:void(0);" class="ripple"><i class="material-icons" >supervisor_account</i> <span class="hide-menu"> Company Assistant</span></a> 
		
            <ul class="list-unstyled sub-menu">
                <?php  if($get_data[0]['create_role']==1){ ?>
                <li><a href="<?= base_url('admin/Assistant/add_role') ?>">Create New Role</a>
                </li>
				<?php } ?>
				<?php  if($get_data[0]['manage_role']==1){ ?>
				<li><a href="<?= base_url('admin/Assistant/manage_role') ?>">Manage Role</a>
                </li>
				<?php }?>
				<?php  if($get_data[0]['create_assistant']==1){ ?>
				<li><a href="<?= base_url('admin/Assistant/create_assistant') ?>">Create Assistant</a>
                </li>
				<?php } ?>
				<?php  if($get_data[0]['manage_assist']==1){ ?>
				<li><a href="<?= base_url('admin/Assistant/manage_assistant') ?>">Manage Assistant</a>
                </li>
				<?php } ?>
				
				<?php  if($get_data[0]['set_permission']==1){ ?>
				  <li><a href="<?= base_url('admin/Assistant/set_permission') ?>">Set Permission</a>
                </li>
				<?php } ?>
            </ul>
        </li>
	
        <li class="menu-item-has-children"><a href="javascript:void(0);" class="ripple"><i class="material-icons" >person_add</i><span class="hide-menu">Company vendor</span></a> 
		
            <ul class="list-unstyled sub-menu">
			<?php  if($get_data[0]['add_product_category']==1){ ?>
			<li><a href="<?= base_url('admin/Vendors/add_category') ?>">Add product Category</a>
                </li>
			<?php } ?>
			<?php  if($get_data[0]['manage_category']==1){ ?>
				<li><a href="<?= base_url('admin/Vendors/manage_category') ?>">Manage Category</a>
                </li>
			<?php } ?>
			<?php  if($get_data[0]['add_new_vendor']==1){ ?>
                <li><a href="<?= base_url('admin/Vendors/create_vendor') ?>">Add New Vendor</a>
                </li>
			<?php } ?>
			<?php  if($get_data[0]['manage_vendor']==1){ ?>
                <li><a href="<?= base_url('admin/Vendors/manage_vendor') ?>">Manage Vendor</a>
                </li>
			<?php } ?>
			
            </ul>
        </li>
		<?php  if($get_data[0]['view_demands']==1){ ?>
		   <li ><a href="<?= base_url('admin/User/view_demands') ?>" class="ripple"><i class="material-icons">report</i> <span class="hide-menu">View Demands</span></a> 
		
           
        </li>
		<?php } ?>
		
		<?php  if($get_data[0]['view_purchase']==1){ ?>
		 <li ><a href="<?= base_url('admin/User/view_purchase') ?>" class="ripple"><i class="material-icons">report</i> <span class="hide-menu">View Purchases</span></a> 
		</li>
		<?php } ?>
		<?php  if($get_data[0]['view_enquiry']==1){ ?>
		<li ><a href="<?= base_url('admin/User/view_enquiry') ?>" class="ripple"><i class="material-icons list-icon">mail_outline</i> <span class="hide-menu">View Enquiry</span></a> 
		</li>
		<?php } ?>
		<?php  if($get_data[0]['view_statistics']==1){ ?>
		<li><a href="" class="ripple"><i class="material-icons">cloud_queue</i> <span class="hide-menu">View Statistics</span></a> 
		</li>
		<?php } ?>
     
             
    </ul>  
        <!-- /.side-menu -->
    </nav>
    <!-- /.sidebar-nav -->
</aside>