<!DOCTYPE html>
<html>

<?php include 'include/head.php'; ?>

<?php include 'include/script.php' ?>

<!-- for datatable -->

<link href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />

<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<style>
.custom-select-10 .btn-default{
background-color:#31BFFC;
color:#fff;
width: 89px;
}
.custom-select-10 .dropdown-menu {
    box-shadow: 1px 2px 9px #C5C1C1;     
    min-width: 93px;
}
.btn-default.active, .btn-default:active, .open>.dropdown-toggle.btn-default{
background-color:#31BFFC;
color:#fff;
}
</style>

<script>

  $(document).ready(function() {
    $('#example').DataTable();
  } );

  </script>

<body class="hold-transition skin-blue sidebar-mini" id="" ng-app="myApp">

<div class="wrapper" >
<?php include 'include/header.php';
      
      $userList = $this->admin_common_model->get_all('drivers');
     
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
    <form action="" method="POST" id="bulk_form">

      <span class="fs30 cdG">Drivers </span> <a href="<?=base_url('admin/view_page/addDriver');?>"><button type="button" class=" btn  btn-info-add btn-md mt-10 ml10" > Add New</button></a>

          <!-- <div class="box-body bcw mt20 ">
              <div class="">
                <div class="row pt10 ">
              
                <div class="col-sm-2">
                  <div class="form-group">
                    <select class="form-control " tabindex="-1" aria-hidden="true" name="bulk_action">
                      <option value="">---Bulk Select---</option>
                       <option value="delete">Delete</option>                   
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <a href="#" onclick="$('#bulk_form').submit()" class=" btn btn-default-add btn-block">Bulk Action</a>  
                </div>

              </div>
              </div>
              
        </div>-->

         



        <div class="row mt10">
           <div class="col-xs-12 cdG">

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="box-body table-responsive no-padding ">
             <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                  <!--<th><div class="[ form-group ] mb0">
                              <input name="action" id="user1" class="checkboxPar" type="checkbox" value="all">
                              <div class="[ btn-group ]">
                                  <label for="user1" class="[ myradioBtn ]">
                                      <span class="[ glyphicon glyphicon-ok ]"></span>
                                      <span></span>
                                  </label>
                              </div>

                        </div> </th>-->addressvehicle_type
                  <th>First Name</th>  
                  <th>Last Name</th>                 
                  <th> Driver Status </th>                       
                  <th>Email </th>
                  <th>Phone </th>
                  <th>Gender </th>
                  <th>Vehicle Type </th>
                  <th>Registration Date</th>
                </tr>
        </thead>
        <tfoot>
            <tr>
                  <!--<th><div class="[ form-group ] mb0">
                              <input name="action" id="user1" class="checkboxPar" type="checkbox" value="all">
                              <div class="[ btn-group ]">
                                  <label for="user1" class="[ myradioBtn ]">
                                      <span class="[ glyphicon glyphicon-ok ]"></span>
                                      <span></span>
                                  </label>
                              </div>

                        </div> </th>-->
                 <th>First Name</th>  
                  <th>Last Name</th>                 
                  <th> Driver Status </th>                   
                  <th>Email </th>
                  <th>Phone </th>
                  <th>Gender </th>
                  <th>Vehicle Type </th>
                  <th>Registration Date</th>
                  
                </tr>
        </tfoot>
        <tbody>
           <?php $i=2; foreach($userList as $row){ 
               
               ?>

                <tr>
                <!--<td><div class="[ form-group ] mb0">
                              <input name="user_action[]" id="user<?=$i;?>"  type="checkbox" value="<?= $row['id']; ?>">
                              <div class="[ btn-group ]">
                                  <label for="user<?=$i;?>" class="[ myradioBtn ]">
                                      <span class="[ glyphicon glyphicon-ok ]"></span>
                                      <span></span>
                                  </label>
                              </div>

                        </div> </td>-->
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
                    <sapn><?= $row['first_name']; ?>
                        <div>
                        <span><a href="<?=base_url('admin/view_page/addDriver/'.$row['id']);?>" class="cdG">Edit</a> | </span>  
                        <span><a href="#" class="cdG" onclick="deleteUsers('<?=$row["id"];?>')">Delete</a></span>
                        </div>
                    </sapn></div><!-- /row -->
                
                  </div><!-- col-sm-10 -->
                </td>
                <td><p><?= $row['last_name']; ?></p></td>

<td>

 <div class="dropdown custom-select-10">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?php echo $row['status']; ?>
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">      
      <li role="presentation" onclick="updateStatus('deactive','<?=$row['id'];?>')"><a role="menuitem" tabindex="-1" href="#">Deactive</a></li>
      <li role="presentation" class="divider"></li>      
     
          
      <li role="presentation" onclick="updateStatus('active','<?=$row['id'];?>')"><a role="menuitem" tabindex="-1" href="#">Active</a></li>

  
    </ul>
  </div>
              
</td>


                
                <td><p><?= $row['email']; ?></p></td>
                <td><p><?= $row['phone']; ?></p></td>
                <td><p><?= $row['gender']; ?></p></td>
                
                <td><p><?= $row['vehicle_type']; ?></p></td>
                <td><p><?= $row['date_time']; ?></p></td>
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
          data: {'table': 'drivers', 'id': id}, // change this to send js object
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

<script>
 // for updateStatus 
   function updateStatus(status,id){
        
          $.ajax({
                 type: 'post',
                 url: "<?=base_url();?>admin/updateStatus/",
                 data: "status="+status+"&id="+id,
                 success: function (data) {
                     // alert(data);
                      //$("#menu1").html(status);  
                       location.reload();  
                }
          });


    }

$body = $("body");

$(document).on({
    ajaxStart: function() { $body.addClass("loading");    },
     ajaxStop: function() { $body.removeClass("loading"); }    
});

</script>
