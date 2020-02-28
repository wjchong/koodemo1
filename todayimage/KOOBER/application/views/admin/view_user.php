<?php include 'include/header.php';

      
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
               
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }else{

          $path = base_url("assets/images/banner/user_d.png");

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
                                    <li><a href="<?=base_url('admin/view_page/user_list');?>">User List</a></li>
                                    <li class="active">View User</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <!-- Basic example -->
                            <div class="col-md-8">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">VIEW USER</h3></div>
                                    <div class="panel-body">
                                        
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
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
                        <td><strong>Available Status:</strong></td>
                        <td><?=$row['available_status'];?></td>
                      </tr>

                      
                      

                       <tr>
                        <td><strong>Status:</strong></td>
                        <td><?=$row['status'];?></td>
                      </tr>
                     <tr>
                        <td><strong>Registration Date:</strong></td>
                        <td><?=$row['date_time'];?></td>
                      </tr>
                     
                     
                    </tbody>
                  </table>
                  
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
