<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
        <?php include 'include/side_menu.php';

$driverList = $this->admin_common_model->get_where('users',[type=>'DRIVER']);

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
                                    <li class="active">Driver List</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Driver List</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>User Name</th>
                                                            <th>Mobile</th>
                                                            <th>Email</th>
                                                            <th>Vehicle Type</th>
                                                            <th>Status</th>
                                                            <th>Registration Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                              <?php $i=2; foreach($driverList as $row){ ?>

                                                        <tr>
                                                            <td><?= $row['username']; ?></td>
                                                            <td><?= $row['mobile']; ?></td>
                                                            <td><?= $row['email']; ?></td>
                                                            <td><?= $row['car_id']; ?></td>
                                                            <td><?= $row['status']; ?></td>
                                                            <td><?= $row['date_time']; ?></td>
                                                            <td class="text-center"><a href="<?=base_url('admin/view_page/add_driver/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-edit"></i></a> </button>  <a href="<?=base_url('admin/view_page/view_driver/'.$row['id']);?>"><button class="btn view-t"><i class="fa  fa-eye"></i></a> </button> <button class="btn delete-t"><i class="fa   fa-trash-o" onclick="deleteUsers('<?=$row["id"];?>')"></i></button></td>


  

                                                        </tr>
<?php $i++; } ?>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> <!-- End Row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © EZLoading.
                </footer>

            </div>
          
        </div>
        <!-- END wrapper -->

<script>
// delete function
function deleteUsers(id)
{
  swal({
  title: "Are you sure?",
  text: "You want to permanently remove this item!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  closeOnConfirm: false
},
function(){



        $.ajax({
          url: "<?=base_url('admin/delete_data');?>",
          data: {'table': 'users', 'id': id}, // change this to send js object
          type: "POST",
          success: function(result){
            //alert(result);
            swal("Deleted!", "Your selected item has been deleted.", "success");
  
            $('.confirm').click(function(){
               location.reload();
            });
             

          }
        });

  

});

} 
// end delete function

</script>

 <?php include 'include/footer.php';?>
