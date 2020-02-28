<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

// total_users

$query="SELECT * FROM users";
$sql = mysql_query($query);
$total_users1 = mysql_num_rows($sql);

// total_users_active

$query="SELECT * FROM users WHERE status = 'active'";
$sql = mysql_query($query);
$total_users_active = mysql_num_rows($sql);

$total_users_per = (100 * $total_users_active)/$total_users1;


// total_users

$query="SELECT * FROM users order by id desc limit 0,3";
$sql = mysql_query($query);
$total_users = mysql_num_rows($sql);


// top rider

$query1="SELECT * FROM user_request WHERE status = 'Complete' group by user_id desc limit 0,3";
$sql1 = mysql_query($query1);
$re_users1 = mysql_num_rows($sql1);



?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">User Dashboard !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">SocialRyde</a></li>
                                    <li class="active">User Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->

                
<div class="row">


<div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">USERS REGISTERED IN THIS SITE</h3>
                                    </div>
                                    <div class="panel-body">
                                    <h1 class="total-cd"><?= $total_users1;?> Total Users</h1>
                                     <div id="members-tickets" style="height:280px;"></div> 
                                    </div>
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">USERS WHO MADE SUCCESSFUL RIDES</h3>
                                    </div>
                                    <div class="panel-body">
                                     <div id="truke1" style="height:280px;"></div> 
                                    </div>
                                </div>
                            </div> 

 <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">RECENT USERS</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>User Name</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
<?php $i++;
while ($val = mysql_fetch_assoc($sql))
			{  ?>
                                                    <tbody>
                                                        <tr>
                                                            <td><?= $val['name'];?></td>
                                                            <td><?= $val['email'];?></td>
                                                            <td><?= $val['status'];?></td>
                                                        </tr>
<?php $i++; }?>
                                                         

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 


                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">RECENT USERS COMPLETE RIDE</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>User Name</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
<?php $j++;
while ($val1 = mysql_fetch_assoc($sql1))
			{ 
                      $username = $this->admin_common_model->get_where('users',['id'=>$val1['user_id']]);

 ?>
                                                    <tbody>
                                                       

                                                           <tr>
                                                           <td><?= $username[0]['name'];?></td>
                                                            <td><?= $username[0]['email'];?></td>
                                                            <td><?= $val1['status'];?></td>
                                                        </tr>            
 
       <?php $j++; }?> 

                                                    
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            
</div>

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © SocialRyde.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
