<!DOCTYPE html>
<html>
<?php include 'include/head.php';
      $driver = $this->admin_common_model->get_where('users',['type'=>'driver']);
      $button = "submit";
      $btn_name = "Add Driver Vehicles Reg.";
      $path = base_url("uploads/images/no_image.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('driver_vehicles_reg',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Driver Vehicles Reg.";        
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
            <label for="inputEmail3" class="col-sm-2 control-label">Plate Number</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="plate_number" required value="<?=$row['plate_number'];?>">
            </div>
          </div>
      
            <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Type</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="vehicle_type" required value="<?=$row['vehicle_type'];?>">
            </div>
          </div>

             <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Size</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="size" required value="<?=$row['size'];?>">
            </div>
          </div>

          
   
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Expire Date</label>
            <div class="col-sm-8">
              <input type="date"  class="form-control" name="expire_date"  value="<?=$row['expire_date'];?>">
            </div>
          </div>
          
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Made Year</label>
            <div class="col-sm-8">
              <input type="year"  class="form-control" name="made_year"  value="<?=$row['made_year'];?>">
            </div>
          </div>
         
           <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Vehicle Brand</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="vehicle_brand"  value="<?=$row['vehicle_brand'];?>">
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
$result = $this->admin_common_model->insert_data('driver_vehicles_reg',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Driver Vehicles Reg. Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driverVehiclesRegList')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Driver Vehicles Reg.',
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
$result = $this->admin_common_model->update_data('driver_vehicles_reg',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Driver Vehicles Reg. Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/driverVehiclesRegList')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Driver Vehicles Reg.',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>


