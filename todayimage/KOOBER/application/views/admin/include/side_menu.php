 <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="<?=base_url('admin/view_page/dashboard');?>" class="logo"><img src="<?=base_url('assets');?>/images/banner/logo.png" style="width: 31%;"></a>
                    </div>
                </div>
                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button type="button" class="button-menu-mobile open-left">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>
                        

                            <ul class="nav navbar-nav navbar-right pull-right">
                              
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="md md-crop-free"></i></a>
                                </li>
                              
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?=base_url('assets');?>/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile</a></li>
                                        <li><a href="<?=base_url('admin/admin_logout');?>"><i class="md md-settings-power"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->



            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?=base_url('admin/view_page/dashboard');?>" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>


                             <li class="has_sub <?php if($page=='user_dashboard' || $page=='user_list' || $page=='add_user'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i><span>  Users </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
<!--                                    <li><a href="<?=base_url('admin/view_page/user_dashboard');?>">Dashboard</a></li>
-->                                    <li><a href="<?=base_url('admin/view_page/user_list');?>">Users List</a></li>
                                    <li><a href="<?=base_url('admin/view_page/add_user');?>">Add User</a></li>
                                   
                                </ul>
                            </li>

                           <li class="has_sub <?php if($page=='driver_list' || $page=='view_driver' || $page=='add_driver'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="ion-android-social"></i><span> Drivers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='driver_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/driver_list');?>">Drivers List</a></li>
                                    <li class="<?php if($page=='add_driver'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_driver');?>">Add Driver</a></li>
                                </ul>
                            </li>

                           <li class="has_sub <?php if($page=='vehicle_list' || $page=='view_vehicle' || $page=='add_vehicle'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-car"></i><span> Vehicle Type</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li class="<?php if($page=='vehicle_list'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/vehicle_list');?>">Vehicle List</a></li>
                                    <li class="<?php if($page=='add_vehicle'){echo 'active';}?>"><a href="<?=base_url('admin/view_page/add_vehicle');?>">Add Vehicle</a></li>
                                </ul>
                            </li>

                                 <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-directions-car"></i><span> Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/pending_ride');?>">Just Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/just_booked');?>">Just Booked</a></li>
<!--                                    <li><a href="<?=base_url('admin/view_page/start_ride');?>">Just Started Rides</a></li>
-->                                    <li><a href="<?=base_url('admin/view_page/complete_ride');?>">Completed Rides</a></li>
                                    <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled Rides</a></li>
                                   
                                </ul>
                            </li>
                           
                        
                          <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-ban"></i><span>Denied Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   
                                    <li><a href="<?=base_url('admin/view_page/user_reject_ride');?>">Rider Denied</a></li>
                                    <li><a href="<?=base_url('admin/view_page/driver_reject_ride');?>">Driver Denied</a></li>
                                </ul>
                            </li>
                            
                         <!--      <li class="has_sub <?php if($page=='event_list' || $page=='add_event'){echo 'active';}?>">
                                <a href="#" class="waves-effect"><i class="fa fa-calendar"></i><span>  Events </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/event_list');?>">All Events</a></li>
                                    <li><a href="<?=base_url('admin/view_page/add_event');?>">Add Event</a></li>
                                   
                                </ul>
                            </li>



                               <li class="has_sub">
                                <a href="#" class="waves-effect"><i class=" md-directions-car"></i><span> Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?=base_url('admin/view_page/pending_ride');?>">Just Request</a></li>
                                    <li><a href="<?=base_url('admin/view_page/just_booked');?>">Just Booked</a></li>
                                    <li><a href="<?=base_url('admin/view_page/start_ride');?>">Just Started Rides</a></li>
                                    <li><a href="<?=base_url('admin/view_page/complete_ride');?>">Completed Rides</a></li>
                                    <li><a href="<?=base_url('admin/view_page/cancel_ride');?>">Cancelled Rides</a></li>
                                   
                                </ul>
                            </li>


                          <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-ban"></i><span>Denied Rides </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                   
                                    <li><a href="<?=base_url('admin/view_page/user_reject_ride');?>">Rider Denied</a></li>
                                    <li><a href="<?=base_url('admin/view_page/driver_reject_ride');?>">Driver Denied</a></li>
                                </ul>
                            </li>



                       <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-user"></i><span> Admin </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Change Password </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-users"></i> <span> Operators  </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Operators list</a></li>
                                    <li><a href="#">Add Operator</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-map-marker"></i><span> Map View  </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">View available drivers</a></li>
                                    <li><a href="#">View available users </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-globe"></i> <span> Location & Fare </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Location List</a></li>
                                    <li><a href="#">Add Location</a></li>
                                </ul>
                            </li>
                            
                           











                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa fa-car"></i><span> Car Types </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Statistics</a></li>
                                    <li><a href="#">Car Types List</a></li>
                                </ul>
                            </li>

                           

                            <li>
                            <a href="calendar.html" class="waves-effect"><i class="fa fa-money"></i><span> Site Earnings </span></a>
                            </li>

                          

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="fa  fa-car"></i><span> Vehicles </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">Vehicle Type List </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="fa  fa-star"></i><span> Review</span><span class="pull-right"><i class="md md-add"></i></span></a>
                                  <ul class="list-unstyled">
                                    <li><a href="#">Vehicle Type List </a></li>
                                </ul>
                            </li>   -->



                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 
