<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

// total_users

$query="SELECT * FROM users where type = 'USER'";
$sql = mysql_query($query);
$total_users = mysql_num_rows($sql);


// total_drivers

$query="SELECT * FROM users where type = 'DRIVER'";
$sql = mysql_query($query);
$total_drivers = mysql_num_rows($sql);


// total_drivers active

$query_a="SELECT * FROM users where type = 'DRIVER' AND available_status = 'ONLINE'";
$sql_a = mysql_query($query_a);
$total_drivers_a = mysql_num_rows($sql_a);


// total_events

$query="SELECT * FROM car_list";
$sql = mysql_query($query);
$total_events = mysql_num_rows($sql);



$today_date =  @date("Y-m-d");
$this_month = date("Y-m-d", strtotime($today_date ."first day of this month"));
$str_this_month = strtotime($this_month);
$this_year = date("Y-m-d",  strtotime('first day of January this year'));
$str_this_year = strtotime($this_year);



while($count_drivers = mysql_fetch_assoc($sql)){
$count_all_drivers[]  = $count_drivers['id'];
if($count_drivers['status'] == "Active") {$count_active_drivers[]  = $count_drivers['status'];}
$add_drivers_date = date('Y-m-d',strtotime($count_drivers['date_time']));
if($add_drivers_date == $today_date){$today_add_drivers[] = $add_drivers_date;}
$str_add_drivers = strtotime($add_drivers_date);
if($str_add_drivers >= $str_this_month){$this_month_drivers[] = $add_drivers_date;}
if($str_add_drivers >= $str_this_year){$this_year_drivers[] = $add_drivers_date;}
}






// total_drivers_active

$query="SELECT * FROM users WHERE type = 'DRIVER'AND status = 'active'";
$sql = mysql_query($query);
$total_drivers_active = mysql_num_rows($sql);

$total_drivers_per = (100 * $total_drivers_active)/$total_drivers;




// user_request

$query="SELECT * FROM user_request";
$sql = mysql_query($query);
$user_request = mysql_num_rows($sql);


while($count_ride = mysql_fetch_assoc($sql)){
$count_all_ride[]  = $count_ride['id'];
if($count_ride['status'] == "Accept") {$count_upcoming_status[]  = $count_ride['id'];}
if($count_ride['status'] == "Start") {$count_onride_status[]  = $count_ride['id'];}
if($count_ride['status'] == "Complete") {$count_completed_status[]  = $count_ride['id'];}
$add_ride_date = date('Y-m-d',strtotime($count_ride['date']));
if($add_ride_date == $today_date){$today_add_ride[] = $add_ride_date;}
$str_add_ride = strtotime($add_ride_date);
if($str_add_ride >= $str_this_month){$this_month_ride[] = $add_ride_date;}
if($str_add_ride >= $str_this_year){$this_year_ride[] = $add_ride_date;}

}

$ride_percent = count($count_completed_status) * 100 / count($count_all_ride);











// user_request Accept

$query="SELECT * FROM user_request WHERE status = 'Accept'";
$sql = mysql_query($query);
$Accept = mysql_num_rows($sql);


// user_request Start

$query="SELECT * FROM user_request WHERE status = 'Start'";
$sql = mysql_query($query);
$Start = mysql_num_rows($sql);

// user_request Complete

$query="SELECT * FROM user_request WHERE status = 'Complete'";
$sql = mysql_query($query);
$Complete = mysql_num_rows($sql);


// user_request user Reject

$query="SELECT * FROM user_request WHERE user_status = 'Reject'";
$sql = mysql_query($query);
$user_reject = mysql_num_rows($sql);


// user_request driver_reject

$query="SELECT * FROM user_request WHERE status = 'Reject' AND user_status = ''";
$sql = mysql_query($query);
$driver_reject = mysql_num_rows($sql);



?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="<?=base_url('admin/view_page/dashboard');?>">EZLoading</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">

<div class="main-box">
    <div class="main-hedline">
       <h1><i class="fa fa-line-chart"></i> SITE STATISTICS</h1>    
    </div>  

<div class="clearfix">
   <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow bg-info">
                                    <span class="mini-stat-icon"><i class=" fa fa-user-plus"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_users;?></span>
                                        Total Users
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="">
                                            <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/user_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-purple bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_drivers;?></span>
                                       Total Drivers
                                    </div>
                                    <div class="tiles-progress color-c1">
                                        <div class="">
                                           <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/driver_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-success bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-location-arrow"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?php echo $total_drivers_a;?></span>
                                       Active Drivers
                                    </div>
                                    <div class="tiles-progress color-c2">
                                        <div class="">
                                        <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/driver_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c2 bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-car"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $total_events; ?></span>
                                     Total Vehicle
                                    </div>
                                    <div class="tiles-progress bgc-cd2">
                                        <div class="">
                                         <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/vehicle_list');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                             <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c3 bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-wrench"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $user_request; ?></span>
                                      Total Request
                                    </div>
                                    <div class="tiles-progress bgc-cd3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/pending_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                             <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-primary bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa fa-dollar"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter">5210</span>
                                      Total Earnings
                                    </div>
                                    <div class="tiles-progress color-c3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="#">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 
</div>

</div>

<div class="main-box">
    <div class="main-hedline">
       <h1><i class="fa fa-line-chart"></i> RIDE STATISTICS</h1>    
    </div>  

<div class="clearfix">
   <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bx-shadow bg-info">
                                    <span class="mini-stat-icon"><i class="fa  fa-car"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $user_request; ?></span>
                                       Total Rides
                                    </div>
                                    <div class="tiles-progress">
                                        <div class="">
                                         <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/pending_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-purple bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-car"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $Accept; ?></span>
                                      Upcoming Rides
                                    </div>
                                    <div class="tiles-progress color-c1">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/just_booked');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-success bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-car"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $Start; ?></span>
                                    On Rides
                                    </div>
                                    <div class="tiles-progress color-c2">
                                        <div class="">
                                        <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/start_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c2 bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-car"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $user_reject; ?></span>
                                  Rider Denied
                                    </div>
                                    <div class="tiles-progress bgc-cd2">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/user_reject_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 


                             <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bgc-c3  bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-car"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $driver_reject; ?></span>
                                    Driver Denied
                                    </div>
                                    <div class="tiles-progress bgc-cd3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/driver_reject_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                             <div class="col-sm-6 col-lg-4">
                                <div class="mini-stat clearfix bg-primary bx-shadow">
                                    <span class="mini-stat-icon"><i class="fa  fa-car"></i></span>
                                    <div class="mini-stat-info text-right">
                                        <span class="counter"><?= $Complete; ?></span>
                                    Completed Rides
                                    </div>
                                    <div class="tiles-progress color-c3">
                                        <div class="">
                                          <h5 class="text-uppercase text-white m-0"><a style="color: #fff;" href="<?=base_url('admin/view_page/complete_ride');?>">More Info</a> <i class="fa  fa-long-arrow-right"></i> </h5>
                                        </div>
                                    </div>
                                </div>
                            </div> 
</div>

</div>
        
                        </div> <!-- end row -->


<div class="row">
                        
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-line-chart"></i> Rides</h3>
                                    </div>
                                    <div class="panel-body text-center">
                                    <div class="tab-ride">
                                      <h1> Rides Count : <?php echo count($count_all_ride);?></h1>
                                      <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Today</td>
                                                                <td><?php echo count($today_add_ride);?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>This Month</td>
                                                                <td> <?php echo count($this_month_ride);?> </td>
                                                            </tr>
                                                             <tr>
                                                                <td>This Year</td>
                                                                <td><?php echo count($this_year_ride);?></td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>

                                    </div>
                                        <div class="row">
        
                                            <div class="col-sm-6">
                                                <div class="chart easy-pie-chart-3" data-percent="<?php echo round($ride_percent,1);?>">
                                                    <span class="percent"></span>
                                                </div>
                                            </div>

                                             <div class="col-sm-6">
                                            <div class="total-rid">
                                               <ul>
                                    <li><span class="new_visits"></span>Completed Rides: <?php echo count($count_completed_status);?></li>
                                    <li><span class="unique_visits"></span>Total Rides: <?php echo count($count_all_ride);?></li>
                                </ul> 
                                            </div>
                                            </div>
        
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"> <i class="fa fa-line-chart"></i> DRIVERS</h3>
                                    </div>
                                    <div class="panel-body text-center">
                                    <div class="tab-ride">
                                      <h1>Drivers Count : <?= $total_drivers;?></h1>
                                      <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td>Today</td>
                                                                <td><?php echo count($today_add_drivers);?> </td>
                                                            </tr>
                                                            <tr>
                                                                <td>This Month</td>
                                                                <td> <?php echo count($this_month_drivers);?>       </td>
                                                            </tr>
                                                             <tr>
                                                                <td>This Year</td>
                                                                <td><?php echo count($this_year_drivers);?></td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>

                                    </div>
                                        <div class="row">
        
                                            <div class="col-sm-6">
                                                <div class="chart easy-pie-chart-3" data-percent="<?= $total_drivers_per;?>">
                                                    <span class="percent"></span>
                                                </div>
                                            </div>

                                             <div class="col-sm-6">
                                            <div class="total-rid">
                                               <ul>
                                    <li><span class="new_visits"></span>Active Drivers: <?= $total_drivers_active;?></li>
                                    <li><span class="unique_visits"></span>Total Drivers: <?= $total_drivers;?></li>
                                </ul> 
                                            </div>
                                            </div>
        
                                    
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-line-chart"></i> EARNINGS</h3>
                                    </div>
                                    <div class="panel-body text-center">
                                    
                                  <div id="morris-line-example" style="height: 300px"></div>
                                    
                                    </div>
                                </div>
                            </div>
                        
                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © EZLoading.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->


 <?php include 'include/footer.php';?>
