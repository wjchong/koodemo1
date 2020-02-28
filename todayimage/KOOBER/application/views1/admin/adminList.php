<!DOCTYPE html>
<html>

<?php include 'include/head.php'; ?>

<?php include 'include/script.php' ?>

<!-- for datatable -->

<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<script>

  $(document).ready(function() {
    $('#example').DataTable();
  } );

  </script>

<body class="hold-transition skin-blue sidebar-mini" id="" ng-app="myApp">

<div class="wrapper" >
<?php include 'include/header.php';

      $adminList = $this->admin_common_model->get_where('admin',"id NOT IN($admin->id)");      
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    <form action="" method="POST" id="bulk_form">

      <span class="fs30 cdG">Admin List </span> <a href="<?=base_url('admin/view_page/addAdmin');?>"><button type="button" class=" btn  btn-info-add btn-md mt-10 ml10" > Add New</button></a>


        <div class="row mt10">
           <div class="col-xs-12 cdG">

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="box-body table-responsive no-padding ">
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                  
                  <th>Owner Name</th>                  
                  <th>Email </th>
                  <th>Shop Limit </th>
                  <th>Country </th>
                </tr>
        </thead>
        <tfoot>
            <tr>
                 
                  <th>Owner Name</th>                  
                  <th>Email </th>
                  <th>Shop Limit </th>
                  <th>Country </th>
                </tr>
        </tfoot>
        <tbody>
           <?php $i=2; foreach($adminList as $row){ 
                 if($row['type']=='OWNER'){ $row['type'] = 'SUB ADMIN'; }
               
               ?>

                <tr>
                
                  <td style="min-width:25em">
                  <div class="row">
                    <div class="col-sm-2">
                       <?php
                        if ($row['image'] == ''){
                          $img_url = base_url('uploads/images/user.jpg');
                        }else{
                          $img_url = base_url('uploads/images/'.$row['image']);
                        }
                      ?>
                      <img src="<?=$img_url;?>" alt="" width="50"> 
                    </div><!-- col-sm-2 -->
                    <div class="col-sm-10">
                    <sapn><?= $row['name']; ?>
                        <div>
                        <span><a href="<?=base_url('admin/view_page/addAdmin/'.$row['id']);?>" class="cdG">Edit</a> | </span>  
                        <span><a href="#" class="cdG" onclick="deleteAdmin('<?=$row["id"];?>')">Delete</a></span>
                        </div>
                    </sapn></div><!-- /row -->
                
                  </div><!-- col-sm-10 -->
                </td>

                <td><p><?= $row['email']; ?></p></td>
                <td><p><?= $row['shop_limit']; ?></p></td>
                <td><p><?= $this->admin_common_model->fetch_recordbyid('country',['id'=>$row['country_id']])->country; ?></p></td>
                
               </tr>


               <?php $i++; } ?>
        </tbody>
    </table>
            </div>
    </div><!--#home-->



  </div><!--tab-content-->


    </div> <!-- /.col-xs-12 -->
        </div><!-- /row -->
       </form>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


</div>
<!-- ./wrapper -->


 <!-- start the model here -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Create Shop Owner</h4>
                </div>

               <form action="<?=base_url('admin/create_owner');?>" method="POST">

                <div class="modal-body">
                 
                  <input type="hidden"  class="form-control" id="user_id" name="user_id">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Select Shop</label>
                    <div class="col-sm-8">
                       <select class="form-control" name="shop_id"> 
                        <?php  foreach($shops as $arr){ ?>
                           <option value="<?=$arr['id'];?>"> <?=$arr['name'];?> </option>
                       <?php } ?>
                       </select>
                    </div>
                 </div>
            
                </div>
                <div class="modal-footer" style="text-align: center;">
                  <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
              </div>
 
              </form>
              
            </div>
        </div>
  <!-- end the model here -->


 </body>
</html>


<script>
// for open dialog popup
    $('select').change(function () {
        
     if ($(this).val() == "notification") {
            $('#dialog-modal').click();
        }
    });

</script>


<script>
// delete function
function deleteAdmin(id)
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
          data: {'table': 'admin', 'id': id}, // change this to send js object
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

<style type="text/css">
.table-striped > tbody > tr:nth-of-type(2n+1){
background-color: #fff;
}

.table-striped > tbody > tr{background-color: #f6f6f6;  }

</style>

<script type="text/javascript">
  $(function () {
    $('.checkboxPar').change(function(){ 
      $("#home input:checkbox").prop('checked', $(this).prop("checked"));
    })
  })

  $(function () {
    $('.checkboxPar1').change(function(){ 
      $("#menu1 input:checkbox").prop('checked', $(this).prop("checked"));
    })
  })

  $(function () {
    $('.checkboxPa2').change(function(){ 
      $("#menu2 input:checkbox").prop('checked', $(this).prop("checked"));
    })
  })

</script>

