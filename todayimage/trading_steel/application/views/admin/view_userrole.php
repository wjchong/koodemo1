<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Panel</title>
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
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="d-inline-flex justify-center align-items-center hidden-sm-down"><a href="javascript: void(0);" class="btn btn-outline-primary mr-l-20 btn-sm btn-rounded hidden-xs hidden-sm ripple" target="_blank">Buy Now</a>
                    </div>
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
                            <div class="widget-heading clearfix">
                                <h5>UNVERIFIED MEMBERS LIST</h5>
                            </div>
                            <!-- /.widget-heading -->
                            <div class="widget-body clearfix">
                                <table class="table table-striped" data-toggle="datatables">
                                    <thead>
                                        <?php if ($this->session->flashdata("mem")) { ?>
                                            <tr>
                                                <td colspan="6">
                                                    <div class="<?php echo $this->session->flashdata("mem")['class']; ?>" role="alert" style="text-align:center; border-radius: 0px">
                                                        <?php echo $this->session->flashdata("mem")['msg']; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Account Statud</th>
                                            <th>Ref. ID</th>
                                            <th>Start date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($rows) > 0): $count = 0; ?>
                                            <?php foreach ($rows as $row): ?>
                                                <?php
                                                    $time = strtotime($row->created_date);
                                                    $active = ($row->block > 0) ? '<span style="color:green">Active</span>' : '<span style="color:red">Not Active</span>';
                                                    $block = ($row->block > 0) ? 'Block' : 'Unblock';
                                                ?>
                                                <tr>
                                                    <td><?= ucwords($row->fullname); ?></td>
                                                    <td><?= ucwords($row->email); ?></td>
                                                    <td>Not Verified</td>
                                                    <td><?= $row->referId; ?></td>
                                                    <td><?php echo date("D, d M", $time); ?></td>
                                                    <td>
                                                         <div class="btn-group dropup m-r-10">
                                                            <button aria-expanded="false" data-toggle="dropdown" class="btn btn-color-scheme dropdown-toggle ripple" type="button">More <span class="caret"></span>
                                                            </button>
                                                            <div role="menu" class="dropdown-menu animated fadeInUp">
                                                                <a class="dropdown-item" href="ui-buttons.html#"><strong>Action</strong></a>  
                                                                <a class="dropdown-item" href="ui-buttons.html#">View Profile</a>  
                                                                <a class="dropdown-item" href="ui-buttons.html#">View Packages</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="javascript:deleteMember('<?= base_url('admin/members/delete_member') ?>/<?= $row->id; ?>/unverified_members')"><strong>Delete</strong></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No Record</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Account Statud</th>
                                            <th>Ref. ID</th>
                                            <th>Start date</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
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
</body>

</html>
