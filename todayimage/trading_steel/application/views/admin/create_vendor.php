<!DOCTYPE html>
<html lang="en">
<head>
    <title> eKart::Admin Panel</title>
    <?php require_once('includes/site-master-dashboard.php'); ?>
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
                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Create Vendors</li>
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
                    <div class="col-md-12 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title mr-b-0">Create Vendors</h5>
                                
								 <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l8">Apply For Category</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                              
											  <select name="usertype" id="category" class="form-control">
											     <option value="">--select Category--</option>
											    <?php
                                     
										if (count($getvals) > 0){ ?>
                                            <?php 
											
											foreach($getvals as $getval){
                                              
											?>
											    <option <?php if(count($edit_data) > 0) {  if($getval['category']==$edit_data[0]['apply_category']){ echo "selected";  ?> <?php } } ?> value="<?php echo $getval['category']; ?>" ><?php echo $getval['category']; ?></option>
											<?php }
										}
											?>
											  </select>
                                            </div>
                                        </div>
                                    </div>
                          
                                 <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l8">UserName</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input class="form-control" id="username" <?php if(count($edit_data) > 0) {?>  value="<?php echo $edit_data[0]['username'] ?>" <?php }else{ } ?>  placeholder="Username" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l10">E-mail Adress</label>
                                        <div class="col-md-9">
                                            <input class="form-control"  id="email" <?php if(count($edit_data) > 0) {?>  value="<?php echo $edit_data[0]['email'] ?>" <?php }else{ } ?> placeholder="E-mail Address" type="email"> 
                                           <?php if(count($edit_data) > 0) {?> 
                                            <input class="form-control" id="ids" value="<?php echo $edit_data[0]['id'] ?>" type="hidden">
											<?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l11">Passsword</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="password" <?php if(count($edit_data) > 0) {?>  value="<?php echo doDecode($edit_data[0]['password']) ?>" <?php }else{ } ?> placeholder="Passsword"  type="text">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l1">Contact No</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="contactno" <?php if(count($edit_data) > 0) {?>  value="<?php echo $edit_data[0]['contact_no'] ?>" <?php }else{ } ?> placeholder="Contact No" type="text"> 
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label" for="l7">Address</label>
                                        <div class="col-md-9">
                                            <div class="form-input-icon form-input-icon-right">
                                             
												<textarea name="address" class="form-control" id="address"><?php if(count($edit_data) > 0) {?>  <?php echo $edit_data[0]['address']; ?><?php }else{ } ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="form-actions">
                                        <div class="form-group row">
                                            <div class="col-md-9 ml-md-auto btn-list">
                                                <a class="btn btn-primary btn-rounded" <?php 
								//print_r($edit_data);
								
								
								if(count($edit_data) > 0) {?> onclick="update_vendor()"  <?php }else{?> onclick="create_vendor()" <?php } ?> onclick="create_vendor()">Create Vendor</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
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
function GetUser()
{
    var username = $('#username').val();
    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>admin/wallet/getuserid",
      data: {user:username}
    })
    .done(function( msg ) {
       // $('#email').val(msg);
		$('#ids').val(msg);

    });
	$.ajax({
      method: "POST",
      url: "<?php echo base_url();?>admin/wallet/getuser",
      data: {user:username}
    })
    .done(function( msg ) {
        $('#email').val(msg);
    });

     

    $.ajax({
      method: "POST",
      url: "<?php echo base_url();?>admin/wallet/getbalance",
      data: {user:username}
    })
    .done(function( msg ) {
        $('#blnc').val(msg);
    });
}

function validateEmail(sEmail) {

    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if (filter.test(sEmail)) {

        return true;

    }

    else {

        return false;

    }

}
function create_vendor()
{
    var category = $('#category').val();
    var username = $('#username').val();
    var email = $('#email').val();
	var password = $('#password').val();
	var contactno = $('#contactno').val();
	var address = $('#address').val();
	
	 if(category==""){
		
		swal("Validation!", "Please select Product Category", "error");
		return false;
	}else if(username==""){
		swal("Validation!", "Please enter Username", "error");
		
		return false;
	}else if ($.trim(email).length == 0) {

            alert('Please enter valid email address');

           return false;

        } else if(password==""){
		swal("Validation!", "Please enter transaction password", "error");
		
		return false;
	}else if(contactno==""){
		swal("Validation!", "Please enter Contact Noe", "error");
		
		return false;
	}else{
		$.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>admin/Vendors/add_vendor",
		  data: {category:category,username:username,email:email,password:password,contactno:contactno,address:address}
		})
		.done(function(msg) {
						swal({
                title: "Insert", 
                text: "Vendors has been successfully Added", 
                icon: "success",
            }).then(function() {
               window.location = "<?php echo base_url();?>admin/Vendors/manage_vendor";
            });
				
					});
	}
    
     
}


function update_vendor()
{
    var category = $('#category').val();
    var username = $('#username').val();
    var email = $('#email').val();
	var password = $('#password').val();
	var contactno = $('#contactno').val();
	var address = $('#address').val();
	var id = $('#ids').val();
	
	 if(category==""){
		
		swal("Validation!", "Please select Category", "error");
		return false;
	}else if(username==""){
		swal("Validation!", "Please enter Username", "error");
		
		return false;
	}else if ($.trim(email).length == 0) {

            alert('Please enter valid email address');

           return false;

        } else if(password==""){
		swal("Validation!", "Please enter transaction password", "error");
		
		return false;
	}else if(contactno==""){
		swal("Validation!", "Please enter Contact Noe", "error");
		
		return false;
	}else{
		$.ajax({
		  method: "POST",
		  url: "<?php echo base_url();?>admin/Vendors/update_vendor",
		  data: {category:category,username:username,email:email,password:password,contactno:contactno,address:address,id:id}
		})
		.done(function(msg) {
						swal({
                title: "update", 
                text: "Vendors has been successfully Updated", 
                icon: "success",
            }).then(function() {
               window.location = "<?php echo base_url();?>admin/Vendors/manage_vendor";
            });
				
					});
	}
    
     
}
</script>
</body>

</html>
