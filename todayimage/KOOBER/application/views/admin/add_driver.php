<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

      $button = "submit";
      $btn_name = "Add Driver";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Driver";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
?>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Add Driver</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">EZLoading</a></li>
                                    <li class="active">Add Driver</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
<form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">

                            <!-- Basic example -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Driver Information</h3></div>
                                    <div class="panel-body" style="padding-bottom: 20%;">
                                       
                                           


                                             <div class="form-group">
                                                <label>User Name *</label>
                                                <input type="text" class="form-control" name="username" required value="<?=$row['username'];?>">
                                            </div>

                                           
                                             <div class="form-group">
                                                <label>Mobile Number *</label>
                                                <input type="text"  class="form-control" name="mobile" required value="<?=$row['mobile'];?>">
                                            </div>

                                             <div class="form-group">
                                                <label>Email Address *</label>
                                                <input type="text"  class="form-control" name="email" required value="<?=$row['email'];?>">
                                            </div>

                                              <div class="form-group">
                                                <label>Password *</label>
                                                <input type="text"  class="form-control" name="password" required value="<?=$row['password'];?>">
                                            </div>

                                            
                                             <div class="form-group">
                                                <label>Vehicle *</label>
                                                <input type="text"  class="form-control" name="vehicle" required value="<?=$row['vehicle'];?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label>Registration Number *</label>
                                                <input type="text"  class="form-control" name="registration_no" required value="<?=$row['registration_no'];?>">
                                            </div>
                                            
                             <input type="hidden"  class="form-control" name="type" required value="DRIVER">


                                             <div class="form-group">
                                                <label>Model *</label>
                                                <input type="text"  class="form-control" name="model" required value="<?=$row['model'];?>">
                                            </div>
                                            
                                             <div class="form-group">
                                                <label>Color *</label>
                                                <input type="text"  class="form-control" name="color" required value="<?=$row['color'];?>">
                                            </div>

                                         

                                              <div class="form-group col-md-6">
                                                <label>Driver Image</label>
                                                <input type="file"  name="image">
                                              
                                            </div> 
                                      

                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                    <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Vehicle Information</h3></div>
                                    <div class="panel-body">
                                   
                                            <div class="form-group">
                                                <label>Vehicle Type *</label>
                                                <select class="form-control" name="car_id" required > 
                                               <option value="">--select--</option>
<option value="Tata Ace" <?php if($row['car_id']=='Tata Ace'){ echo 'selected'; } ?>>Tata Ace</option>
 <option value="Bolero Pickup" <?php if($row['car_id']=='Bolero Pickup'){ echo 'selected'; } ?>>Bolero Pickup</option> 
<option value="Tata 407" <?php if($row['car_id']=='Tata 407'){ echo 'selected'; } ?>>Tata 407</option>

                                               </select>
                                            </div>


                                     <div class="form-group">
                                                <label>Status *</label>
                                               <select class="form-control" name="status" required>
                                               <option value="">--select--</option>
                                              <option value="Active" <?php if($row['status']=='Active'){ echo 'selected'; } ?>>Active</option>
                                               <option value="Deactive" <?php if($row['status']=='Deactive'){ echo 'selected'; } ?>>Deactive</option>
                                               </select>
                                            </div>

                                          <div class="form-group">
                                                <label>License Image</label>
                                                <input type="file"  name="licence_image">
                                              
                                            </div> 
                                            
                                               <div class="form-group">
                                                <label>Vehicle Registration Image</label>
                                                <input type="file"  name="vehicle_reg_image">
                                              
                                            </div> 
                                            
                                               <div class="form-group">
                                                <label>Vehicle Insurance Image</label>
                                                <input type="file"  name="vehicle_insura_image">
                                              
                                            </div> 

                                      
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
           
           <div class="text-center">
              <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button> 
           </div> 

</form>
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


<script>

   function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result);
                    
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>

<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "DRIVER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

          if($_FILES['license_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "LIE_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['license_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['license_image'] = $img; 

            }

           if($_FILES['vehicle_reg_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "VEH_REG_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['vehicle_reg_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['vehicle_reg_image'] = $img; 

            }

           if($_FILES['vehicle_insura_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "VEH_INS_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['vehicle_insura_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['vehicle_insura_image'] = $img; 

            }


unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('users',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Driver Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driver_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Driver',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}

}// end if submit


// for update restaurant
if(isset($update)){

$arr_data = $this->input->post();


            $user_image = $row['image'];
            if($_FILES['image']['name']!=''){
    
                        unlink("uploads/images/" . $rest_image);
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

        

          if($_FILES['license_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "LIE_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['license_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['license_image'] = $img; 

            }

           if($_FILES['vehicle_reg_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "VEH_REG_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['vehicle_reg_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['vehicle_reg_image'] = $img; 

            }

           if($_FILES['vehicle_insura_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "VEH_INS_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['vehicle_insura_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['vehicle_insura_image'] = $img; 

            }

$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('users',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Driver Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driver_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Driver',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

