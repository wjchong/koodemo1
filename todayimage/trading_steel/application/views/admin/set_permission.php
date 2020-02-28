<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
    <?php require_once('includes/site-master-dashboard.php'); ?>
	<style>
	 .permission_center{
		 text-align:center; 
	 }
	</style>
</head>

<body class="header-light sidebar-dark sidebar-expand">
    <div id="wrapper" class="wrapper">
        <?php require_once('includes/header.php'); ?>
    <div class="content-wrapper">
        <?php require_once('includes/sidebar.php'); ?>

        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h5 class="mr-0 mr-r-5">Dashboard</h5>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/user/dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Set Permission</li>
                    </ol>
                </div>
                <!-- /.page-title-right -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <div class="row">
                    <div class="col-md-12 widget-holder" style="width:100%;">
                        <div class="widget-bg">
                            <div class="widget-heading clearfix">
                                <h5>Set Permission</h5>
								
                               <?php //print_r($title);?>
                            </div>
                            <div class="widget-body clearfix">
							<form method="post">
                                <table class="table table-striped" data-toggle="datatables">
                                    <thead>
                                        <?php if ($this->session->flashdata("sale")) { ?>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="<?php echo $this->session->flashdata("sale")['class']; ?>" role="alert" style="text-align:center; border-radius: 0px">
                                                        <?php echo $this->session->flashdata("sale")['msg']; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
									 <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l8">User Role</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                              
											  <select name="usertype" id="usertype" class="form-control" onchange="get_user_data(this)">
											     <option value="">--select User Role--</option>
												  <?php
                                     
										if (count($getvals) > 0){ ?>
                                            <?php 
											
											foreach($getvals as $getval){
                                              
											?>
											    <option <?php if(count($edit_data) > 0) {  if($getval['assist_type']==$edit_data[0]['user_type']){ echo "selected";  ?> <?php } } ?> value="<?php echo $getval['assist_type']; ?>" ><?php echo $getval['assist_type']; ?></option>
											<?php }
										}
											?>
											  </select>
                                            </div>
                                        </div>
                                    </div>
										<tr><th class="permission_center">Create assistant</th></tr>
                                        <tr>
                                            
                                            <th>permission Tags</th>
                                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        <tr>
                                            <td>Create Role</td>
											 <td><input type="checkbox" name="create_role" id="create_role" value="1"></td>
                                           
                                        </tr>
										
										 <tr>
                                            <td>Manage Role</td>
                                            <td><input type="checkbox" name="manage_role" id="manage_role" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Create Assistant</td>
                                            <td><input type="checkbox" name="create_assistant" id="create_assistant" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Manage Assistant</td>
                                            <td><input type="checkbox" name="manage_assistant" id="manage_assistant" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Set Permission</td>
                                            <td><input type="checkbox" name="set_permission"  id="set_permission" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Role Edit</td>
                                            <td><input type="checkbox" name="role_edit" id="role_edit" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Role Delete</td> 
                                            <td><input type="checkbox" name="role_delete" id="role_delete" value="1"></td>
                                        </tr>
										
										
										 <tr>
                                            <td>Assistant Approve</td>
                                            <td><input type="checkbox" name="assistant_approve" id="assistant_approve" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Assistant Edit</td>
                                            <td><input type="checkbox" name="assistant_edit" id="assistant_edit" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Assistant Delete</td>
                                            <td><input type="checkbox" name="assistant_delete" id="assistant_delete" value="1"></td>
                                        </tr>
										
										
										<tr class="permission_center"><th>Company Vendor</th></tr>
										
										  <tr>
                                            <td>Add Product Category</td>
											 <td><input type="checkbox" name="product_category" id="product_category" value="1"></td>
                                           
                                        </tr>
										
										 <tr>
                                            <td>Manage Category</td>
                                            <td><input type="checkbox" name="manage_category" id="manage_category" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Add New Vendor</td>
                                            <td><input type="checkbox" name="add_vendor"  id="add_vendor" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Manage Vendor</td>
                                            <td><input type="checkbox" name="manage_vendor" id="manage_vendor" value="1"></td>
                                        </tr>
									
										
										 <tr>
                                            <td>Category Edit</td>
                                            <td><input type="checkbox" name="category_edit" id="category_edit" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Category Delete</td>
                                            <td><input type="checkbox" name="category_delete" id="category_delete" value="1"></td>
                                        </tr>
										
										
										 <tr>
                                            <td>Vendor Approve</td>
                                            <td><input type="checkbox" name="vendor_approve" id="vendor_approve" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Vendor Edit</td>
                                            <td><input type="checkbox" name="vendor_edit"  id="vendor_edit" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Vendor Delete</td>
                                            <td><input type="checkbox" name="vendor_delete" id="vendor_delete" value="1"></td>
                                        </tr>
                                     
									  <tr><th class="permission_center">Users Demands</th></tr>
					                   
									    <tr>
                                            <td>View Demands</td>
                                            <td><input type="checkbox" name="view_demands" id="view_demands" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Demands approve</td>
                                            <td><input type="checkbox" name="demands_approve" id="demands_approve" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Demands delete</td>
                                            <td><input type="checkbox" name="demands_delete" id="demands_delete" value="1"></td>
                                        </tr>
					                   
									    <tr><th class="permission_center">purchases products</th></tr>
					                   
									    <tr>
                                            <td>View Purchases</td>
                                            <td><input type="checkbox" name="view_purchases" id="view_purchases" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>Purchases approve</td>
                                            <td><input type="checkbox" name="purchase_approve" id="purchase_approve" value="1"></td>
                                        </tr>
										
										 <tr>
                                            <td>purchases delete</td>
                                            <td><input type="checkbox" name="purchase_delete" id="purchase_delete" value="1"></td>
                                        </tr>
										
										
										   <tr><th>Enquiry</th></tr>
					                   
									    <tr>
                                            <td>View Enquiry</td>
                                            <td><input type="checkbox" name="enquiry" id="enquiry" value="1"></td>
                                        </tr>
										
										  <tr><th class="permission_center">Statistics</th></tr>
					                   
									    <tr>
                                            <td>View Statistics</td>
                                            <td><input type="checkbox" name="view_statistics" id="view_statistics" value="1"></td>
											
											
                                        </tr>
										<tr><td>  <div class="form-actions">
                                        <div class="form-group row">
                                            <div class="col-md-9 ml-md-auto btn-list">
                                                <a class="btn btn-primary btn-rounded"  <?php 
								//print_r($edit_data);
								
								
								if(count($edit_data) > 0) {?> onclick="update_permission()"  <?php }else{?> onclick="create_permission()" <?php } ?>><?php 
								//print_r($edit_data);
								
								
								if(count($edit_data) > 0) {  echo "Update permission"; ?>  <?php }else{ echo "Create permission";} ?></a>
                                            </div>
                                        </div>
                                    </div></td></tr>
								 
                                        <?php ?>
                                    </tbody>
                             
                                </table>
								</form>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                </div>
            </div>
            <!-- /.widget-list -->
        </main>
        <!-- /.main-wrappper -->
        <!-- RIGHT SIDEBAR -->
        <aside class="right-sidebar scrollbar-enabled">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                    <h3>Chat</h3>
                    <p class="text-muted">You can chat with your family and friends in this space.</p>
                </div>
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Online</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Julein Renvoye">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--online thumb-xs" data-chat-user="Eddie Lebanovkiy">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--away thumb-xs" data-chat-user="Cameron Moll">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user3.jpg" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user7.jpg" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--busy thumb-xs" data-chat-user="Trent Walton">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user6.jpg" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
                <div class="chat-list">
                    <h6 class="sidebar-chat-subtitle">Offline</h6>
                    <div class="list-group row">
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Julien Renvoye">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" class="rounded-circle" alt=""> <span class="name">Julien Renvoye</span>  <span class="username">@jrenvoye</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Eddie Lebaovskiy">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" class="rounded-circle" alt=""> <span class="name">Eddie Lebanovskiy</span>  <span class="username">@elebano</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Cameron Moll">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user3.jpg" class="rounded-circle" alt=""> <span class="name">Cameron Moll</span>  <span class="username">@cammoll</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Bill S Kenny">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user7.jpg" class="rounded-circle" alt=""> <span class="name">Bill S Kenny</span>  <span class="username">@billsk</span> 
                        </a>
                        <a href="javascript:void(0)" class="list-group-item user--offline thumb-xs" data-chat-user="Trent Walton">
                            <img src="<?= base_url('assets/admin') ?>/demo/users/user6.jpg" class="rounded-circle" alt=""> <span class="name">Trent Walton</span>  <span class="username">@trentwalton</span>
                        </a>
                    </div>
                    <!-- /.list-group -->
                </div>
                <!-- /.chat-list -->
            </div>
            <!-- /.sidebar-chat -->
        </aside>
        <!-- CHAT PANEL -->
        <div class="chat-panel" hidden>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                    <button type="button" class="minimize" aria-label="Minimize"><span aria-hidden="true"><i class="material-icons">expand_more</i></span>
                    </button> <span class="user-name">John Doe</span>
                </div>
                <!-- /.card-header -->
                <div class="card-block custom-scroll">
                    <div class="messages custom-scroll-content scrollbar-enabled">
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <p>Lorem ipsum dolor sit amet?</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" alt="">
                            <div class="message">
                                <p>Etiam rhoncus. Maecenas tempus, tellus eget condi mentum rhoncus</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <img src="<?= base_url('assets/admin') ?>/demo/chat-message.jpg" alt=""> <small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="current-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user1.jpg" alt="">
                            <div class="message">
                                <p>Maecenas nec odio et ante tincidunt tempus.</p><small>10:00 am</small>
                            </div>
                            <!-- .,message -->
                        </div>
                        <!-- /.current-user-message -->
                        <div class="other-user-message">
                            <img class="user-image" width="30" height="30" src="<?= base_url('assets/admin') ?>/demo/users/user2.jpg" alt="">
                            <div class="message">
                                <p>Donec sodales :)</p><small>10:00 am</small>
                            </div>
                            <!-- /.message -->
                        </div>
                        <!-- /.other-user-message -->
                    </div>
                    <!-- /.messages -->
                    <form action="javascript:void(0)" method="post">
                        <textarea name="message" style="resize: none" placeholder="Type message and hit enter"></textarea>
                        <ul class="list-unstyled list-inline chat-extra-buttons">
                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="material-icons">insert_emoticon</i></a>
                            </li>
                            <li class="list-inline-item"><a href="javascript:void(0)"><i class="material-icons">attach_file</i></a>
                            </li>
                        </ul>
                        <button class="btn btn-color-scheme btn-circle submit-btn" type="submit"><i class="material-icons">send</i>
                        </button>
                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.chat-panel -->
    </div>
    <!-- /.content-wrapper -->
    <?php require_once('includes/footer.php'); ?>
	<script>
	function create_permission()
{
    var usertype = $('#usertype').val(); 
	
    var create_role =  $('#create_role:checked').val();
    var manage_role = $('#manage_role:checked').val();
	var create_assistant =  $('#create_assistant:checked').val();
	var manage_assistant =  $('#manage_assistant:checked').val();
	var set_permission =  $('#set_permission:checked').val();
	
	var role_edit =$('#role_edit:checked').val();
	var role_delete = $('#role_delete:checked').val();
	var assistant_approve = $('#assistant_approve:checked').val();     
	var assistant_edit = $('#assistant_edit:checked').val();
	                                                      
	var assistant_delete =  $('#assistant_delete:checked').val();   
	var product_category =  $('#product_category:checked').val();                           
	var manage_category =  $('#manage_category:checked').val();
	var add_vendor =    $('#add_vendor:checked').val();
	                                                                 
		var manage_vendor =  $('#manage_vendor:checked').val();
			var category_edit = $('#category_edit:checked').val();
				var category_delete = $('#category_delete:checked').val();
					var vendor_approve = $('#vendor_approve:checked').val();
					                                                      
		var vendor_edit = $('#vendor_edit:checked').val();
			var vendor_delete =  $('#vendor_delete:checked').val();
				var view_demands =  $('#view_demands:checked').val();
					var demands_approve = $('#demands_approve:checked').val();	
        var demands_delete = $('#demands_delete:checked').val();

    var view_purchases =  $('#view_purchases:checked').val();
			var purchase_approve =  $('#purchase_approve:checked').val();
				var purchase_delete = $('#purchase_delete:checked').val();
				
		var enquiry =  $('#enquiry:checked').val();
				var view_statistics = $('#view_statistics:checked').val();	
							
	
	 if(usertype==""){
		
		swal("Validation!", "Please select User Role", "error");
		return false;
	
	}else{
		$.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>admin/Assistant/add_permission",
		  data: {usertype:usertype,create_role:create_role,manage_role:manage_role,create_assistant:create_assistant,manage_assistant:manage_assistant,set_permission:set_permission,role_edit:role_edit,role_delete:role_delete,assistant_approve:assistant_approve,assistant_edit:assistant_edit,assistant_delete:assistant_delete,product_category:product_category,manage_category:manage_category,add_vendor:add_vendor,manage_vendor:manage_vendor,category_edit:category_edit,category_delete:category_delete,vendor_approve:vendor_approve,vendor_edit:vendor_edit,vendor_delete:vendor_delete,view_demands:view_demands,demands_approve:demands_approve,demands_delete:demands_delete,view_purchases:view_purchases,purchase_approve:purchase_approve,purchase_delete:purchase_delete,enquiry:enquiry,view_statistics:view_statistics}
		})
		.done(function(msg) {
						swal({
                title: "Insert", 
                text: "permission has been successfully Added", 
                icon: "success",
            }).then(function() {
               window.location = "<?php echo base_url();?>admin/Assistant/set_permission";
            });
				
					});
	}
    
     
}


function get_user_data(sel)
{
    var usertype = sel.value;
	//alert(usertype);
	
		$.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>admin/Assistant/get_permission",
		  data: {usertype:usertype}
		})
		.done(function(msg) {
						swal({
                title: "Insert", 
                text: "permission has been successfully Added", 
                icon: "success",
            }).then(function() {
               //window.location = "<?php echo base_url();?>admin/Assistant/set_permission";
            });
				
					});
	
    
     
}


</script>
</body>

</html>
