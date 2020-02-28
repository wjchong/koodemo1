<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Users";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('users',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Users";        
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
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">EZLoading</a></li>
                                    <li class="active">Add User</li>
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
                                    <div class="panel-heading"><h3 class="panel-title">ADD NEW USER</h3></div>
                                    <div class="panel-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>User Name *</label>
                                                <input type="text" class="form-control" name="username" required value="<?=$row['username'];?>">
                                            </div>

                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Email address *</label>
                                                <input type="email" class="form-control" name="email" required value="<?=$row['email'];?>" >
                                            </div>

                                             <div class="form-group">
                                                <label>Password *</label>
                                                <input type="text" class="form-control" name="password" required value="<?=$row['password'];?>">
                                            </div>

                                             <div class="form-group">
                                                <label>Mobile Number *</label>
                                                <input type="text" class="form-control" name="mobile" required value="<?=$row['mobile'];?>">
                                            </div>


                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>Status *</label>
                                               <select class="form-control" name="status" required>
                                              
                                               <option value="">--select--</option>
                                               <option value="Active" <?php if($row['status']=='Active'){ echo 'selected'; } ?>>Active</option>
                                               <option value="Deactive" <?php if($row['status']=='Deactive'){ echo 'selected'; } ?>>Deactive</option>
                                               </select>
                                            </div>

                                              <div class="form-group col-md-6">
                                                <label>User Image</label>

                                               <input type="file" name="image" onchange="readURL(this,'image');" class="form-control">
                                            </div> 
                                        </div>

                                           
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                            <div class="col-md-6">
                            <div class="image-view">
                            <img src="<?=$path;?>" name="image" id="image">    
                            </div>    
                            </div>
                           

                        </div> <!-- End row -->

 <button type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button>
                                        </form>
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
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }

          //print_r($arr_data);die;

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('users',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Users Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/user_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Users',
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
    
                      //  unlink("uploads/images/" . $rest_image);
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['image'] = $img; 

            }


$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('users',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Users Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/user_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Users',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>
