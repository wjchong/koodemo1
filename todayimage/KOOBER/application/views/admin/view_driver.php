<?php include 'include/header.php';

      
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
               
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }else{

          $path = base_url("assets/images/banner/user_d.png");
//http://ambitious.in.net/EZLoading/assets/images/banner/user_d.png
           }
      }
      

 ?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';?>

      
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
                                    <li><a href="<?=base_url('admin/view_page/driver_list');?>">Driver List</a></li>
                                    <li class="active">Driver Details</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">VIEW Driver</h3></div>
                                    <div class="panel-body">
                                     
<div class="row">
 <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">Driver Details</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">Vehicle Details</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">Documents</span> 
                                        </a> 
                                    </li> 

                                </ul> 
                                <div class="tab-content"> 

                                    <div class="tab-pane active" id="home-2"> 
                                      
                                  <div class="row">
                <div class="col-md-3 col-lg-2 " align="center"> 
                <img alt="User Pic" src="<?=$path;?>" class="img-circle img-responsive">
                 </div>
           
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information paddingt">
                    <tbody>

                      <tr>
                        <td><strong>User Name:</strong></td>
                        <td><?=$row['username'];?></td>
                      </tr>


                       <tr>
                        <td><strong>Email Address:</strong></td>
                        <td><?=$row['email'];?></td>
                      </tr>

                       <tr>
                        <td><strong>Phone Number:</strong></td>
                        <td><?=$row['mobile'];?></td>
                      </tr>


                       <tr>
                        <td><strong>Status:</strong></td>
                        <td><?=$row['status'];?></td>
                      </tr>


                
                        <tr>
                        <td><strong> Available_status:</strong></td>
                        <td><?=$row['available_status'];?></td>
                      </tr>

                     
                    </tbody>
                  </table>
                  
                </div>
              </div>

                                    </div> 

                                    <div class="tab-pane" id="profile-2">
                                      <div class="row">
           
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information paddingt">
                    <tbody>

                      <tr>
                        <td><strong> Vehicle Type:</strong></td>
                        <td><?=$row['car_id'];?></td>
                      </tr>

                       <tr>
                        <td><strong>Model Number:</strong></td>
                        <td><?=$row['model'];?></td>
                      </tr>

                       <tr>
                        <td><strong>Registration Number:</strong></td>
                        <td><?=$row['registration_no'];?></td>
                      </tr>

                       <tr>
                        <td><strong>Vehicle Color:</strong></td>
                        <td><?=$row['color'];?></td>
                      </tr>

                     
                    </tbody>
                  </table>
                  
                </div>
              </div> 
                                    </div> 

                                    <div class="tab-pane" id="messages-2">
                                      <div class="row">

                            <!-- Area Chart -->
                            <div class="col-lg-6">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Driver Documents</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                         <p>No records found</p>
                                    </div> 
                                </div>
                            </div> <!-- col -->
                            

                            <!-- Donut Chart -->
                            <div class="col-lg-6">
                                <div class="panel panel-border panel-primary">
                                    <div class="panel-heading"> 
                                        <h3 class="panel-title">Vehicle Documents</h3> 
                                    </div> 
                                    <div class="panel-body"> 
                                      <p>No records found</p>
                                    </div> 
                                </div>
                            </div> <!-- col -->
                        </div> <!-- End row-->
                                    </div> 
                                  
                                </div> 
                            </div>  
</div>

    
        


                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                        
                           

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
