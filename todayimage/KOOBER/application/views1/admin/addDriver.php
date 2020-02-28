<!DOCTYPE html>
<html>
<?php include 'include/head.php';
    // $driver_national_id = $this->admin_common_model->get_all('driver_national_id');
    //  $drivers_license = $this->admin_common_model->get_all('drivers_license');
    //  $driver_vehicles_reg = $this->admin_common_model->get_all('driver_vehicles_reg');
      $button = "submit";
      $btn_name = "Add Driver";
      $path = base_url("uploads/images/no_image.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('drivers',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Driver";        
        if($row['image']!=''){
          $path = base_url("uploads/images/".$row['image']);
        }
      }
      

 ?>

<body class="hold-transition skin-blue sidebar-mini" id="">
<div class="wrapper">
<?php include 'include/header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
   <div class="row ">
      <div class="col-sm-12 cdG">
      <span class="fs30 "><?=$btn_name;?></span> 
      <!--<p><?=$btn_name;?> and add them to this site.  </p>-->
    </div>
   <div class="col-sm-12 cdG">
          <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
          <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">
         
         

           <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="first_name" required value="<?=$row['first_name'];?>">
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="last_name" required value="<?=$row['last_name'];?>">
            </div>
          </div>

             <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="email" required value="<?=$row['email'];?>">
            </div>
          </div>
      
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
              <input type="password"  class="form-control" name="password" required value="<?=$row['password'];?>">
            </div>
          </div>
   
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="phone"  value="<?=$row['phone'];?>">
            </div>
          </div>


         
             <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-8">
              <select class="form-control" name="gender">
            <option>--select--</option> 
            <option>male</option>
            <option>female</option>
           
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="address"  value="<?=$row['address'];?>">
            </div>
          </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Id Number</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="id_number"  value="<?=$row['id_number'];?>">
            </div>
          </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Type</label>
            <div class="col-sm-8">
 <select class="form-control" name="vehicle_type">
            <option>--select--</option> 
            <option>Car</option>
            <option>MotorCycle</option>
            <option>Bicycle</option>
            <option>Walker</option>
              </select>
            </div>
          </div>
          
    <!--      <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">id Number</label>
            <div class="col-sm-8">
            <select class="form-control" name="national_id"> 
            <option>--select--</option>
              <?php foreach($driver_national_id as $arr){ ?>
                 <option <?php if($row['national_id']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['national_id_no'];?> </option>
              <?php } ?>
              </select>
            
            </div>
          </div>   


 
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">License No.</label>
            <div class="col-sm-8">
              <select class="form-control" name="drivers_license"> 
            <option>--select--</option>
              <?php foreach($drivers_license as $arr){ ?>
                 <option <?php if($row['drivers_license']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['license_no'];?> </option>
              <?php } ?>
              </select>
   
            </div>
          </div>


          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Registration No.</label>
            <div class="col-sm-8">
              <select class="form-control" name="vehicle_registration_id"> 
            <option>--select--</option>
              <?php foreach($driver_vehicles_reg as $arr){ ?>
                 <option <?php if($row['vehicle_registration_id']==$arr['id']){echo "selected"; } ?> value="<?=$arr['id'];?>"> <?=$arr['plate_number'];?> </option>
              <?php } ?>
              </select>

            </div>
          </div>  -->
     
 
          
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Driver image</label>
            <div class="col-sm-8">
               <label>
                 <img src="<?=$path;?>" width="200" id="image">
                 <input type="file"  class="form-control" name="image" onchange="readURL(this,'image');" style="display:block">
               </label>              
            </div>
          </div>


        


  <div class="form-group">
    <div class=" col-sm-2 col-sm-offset-2">
      <button type="submit" name="<?=$button;?>" class="btn btn-dang-add mr10 "><?=$btn_name;?></button>
    </div>
  </div>
</form>


   </div><!-- /.col-sm-9 -->


  
  </div><!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<?php include 'include/script.php' ?>


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

    

 </body>
</html>



<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();

            if($_FILES['image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }


unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('drivers',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Driver Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driverList')."';
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


$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('drivers',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Driver Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driverList')."';
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




