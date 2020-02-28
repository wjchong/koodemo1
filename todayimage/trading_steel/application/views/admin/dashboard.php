<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin Panel</title>
<?php 
require_once('includes/site-master-dashboard.php'); ?>
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
                    <p class="mr-0 text-muted hidden-sm-down">statistics, charts, events and reports</p>
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/User/dashboard') ?>">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                  
                </div>
                <!-- /.page-title-right -->
            </div>
            <!-- /.page-title -->
            <!-- =================================== -->
            <!-- Different data widgets ============ -->
            <!-- =================================== -->
            <div class="widget-list">
                <!-- Counters -->
                <div class="row">
                    <!-- Counter: Sales -->
              
        
                </div>
                <!-- /.row -->
                <!-- Chart Group 1 -->
              
                <!-- /.row -->
                <!-- Chart Group 2 -->
              
                <!-- /.user -->
                <!-- Activity & Social Feeds -->
              
                <!-- /.row -->
                <!-- Other Widgets -->
                <div class="row">
                    <!-- Calender -->
               
                    <!-- /.widget-holder -->
                    <!-- Weather -->
             
                    <!-- /.widget-holder -->
                    <!-- To Do -->
              
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- User List: User Registrations -->
                    <div class="col-md-5 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">User Registrations</h5>
                               <ul class="list-unstyled widget-user-list">
								<?php foreach($assisvals as $assisval) { ?>
								 <?php
                                                    $time = strtotime($assisval['createddate']);
                                                    $active = ($assisval['locked'] > 0) ? '<span style="color:green">Active</span>' : '<span style="color:red">Not Active</span>';
                                                    $block = ($assisval['locked'] > 0) ? 'Block' : 'Approve';
                                                ?>
                                    <li class="media">
                                   
                                        <div class="media-body"><a href="javascript:blockMember('<?= base_url('admin/Vendors/block_vendor') ?>/<?= $assisval['id']; ?>/<?php echo $block; ?>/manage_vendor')" class="btn btn-outline-default"><?php echo $block; ?></a>
										
										<a href="" class=""><?php echo $active; ?></a>
										
                                            <h5 class="media-heading"><a ><?php echo $assisval['username']; ?></a> <small><?php echo $assisval['email']; ?></small></h5>
                                        </div>
                                    </li>
									<?php } ?>
                            
                                </ul>
                                <!-- /.widget-user-list -->
                            </div>
                            <!-- /.widget-body -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                    <!-- Table: Order Status -->
                    <div class="col-md-7 widget-holder">
                        <div class="widget-bg">
                            <div class="widget-body clearfix">
                                <h5 class="box-title">Recent Order Status</h5>
                                <div class="padded-reverse">
                                    <table class="table table-striped widget-status-table mr-b-0">
                                        <thead>
                                            <tr>
                                                <th class="pd-l-20">Orders</th>
                                                <th>Status</th>
                                                <th class="hidden-xs">Date</th>
                                                <th class="text-right pd-r-20">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Tarcho Tee</a>
                                                </th>
                                                <td><span class="badge badge-info text-inverse">Complete</span>
                                                </td>
                                                <td class="text-muted hidden-xs">July 31,2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Athlete Tee</a>
                                                </th>
                                                <td><span class="badge badge-danger text-inverse">Pending</span>
                                                </td>
                                                <td class="text-muted hidden-xs">April 12, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Namche Zip Tee</a>
                                                </th>
                                                <td><span class="badge badge-warning text-inverse">Delivered</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 3, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Asaar Jacket</a>
                                                </th>
                                                <td><span class="badge badge-info text-inverse">Complete</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 12, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Everest Zip Jacket</a>
                                                </th>
                                                <td><span class="badge badge-danger text-inverse">Pending</span>
                                                </td>
                                                <td class="text-muted hidden-xs">March 1, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Namche Zip Tee</a>
                                                </th>
                                                <td><span class="badge badge-warning text-inverse">Delivered</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 3, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Tarcho Tee</a>
                                                </th>
                                                <td><span class="badge badge-info text-inverse">Complete</span>
                                                </td>
                                                <td class="text-muted hidden-xs">July 31,2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="pd-l-20"><a href="index.html#">Namche Zip Tee</a>
                                                </th>
                                                <td><span class="badge badge-warning text-inverse">Delivered</span>
                                                </td>
                                                <td class="text-muted hidden-xs">August 3, 2017</td>
                                                <td class="text-right"><a href="index.html#"><i class="material-icons list-icon md-18 text-muted">edit</i></a>  <a href="index.html#"><i class="material-icons list-icon md-18 text-muted">delete</i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- /.widget-status-table -->
                                </div>
                                <!-- /.padded-reverse -->
                            </div>
                            <!-- /.widget-body badge -->
                        </div>
                        <!-- /.widget-bg -->
                    </div>
                    <!-- /.widget-holder -->
                </div>
                <!-- /.row -->
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
</body>
</html>