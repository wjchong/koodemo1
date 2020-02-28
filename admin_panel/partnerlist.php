<?php 
include("config.php");
if(!isset($_SESSION['admin']))
{
	header("location:login.php");
}
if(isset($_POST['choose_agent']))
{
	extract($_POST);
	// $m_id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM users WHERE name='$tags_merchant' and user_roles='2' LIMIT 1"))['id'];  
	$query="select unrecoginize_coin.*,users.name as merchant_name,users.special_coin_name from unrecoginize_coin inner join users on users.id=unrecoginize_coin.user_id where unrecoginize_coin.merchant_id='$m_id' and status=1 order by unrecoginize_coin.id desc";
	 $coin_in_market=partnerbal($m_id,$conn);
	$u_query = mysqli_query($conn,$query);   
}
function partnerbal($coin_merchant_id,$conn)
{
	$q="select sum(amount) as total_amount from tranfer as t where receiver_id in(select user_id from unrecoginize_coin where merchant_id='$coin_merchant_id') and coin_merchant_id='$coin_merchant_id'";
	$parq=mysqli_query($conn,$q);
	$p_total=mysqli_fetch_assoc($parq);
	return $p_total['total_amount'];
}
?>
<!DOCTYPE html>
<html lang="en" style="" class="js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">

<head>   
    <?php include("includes1/head.php"); ?>
	
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
	
    <link rel="stylesheet" href="/css/dropzone.css" type="text/css" /> 
	<style>
	.well
	{
		min-height: 20px;
		padding: 19px;
		margin-bottom: 20px;
		background-color: #fff;
		border: 1px solid #e3e3e3;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
		box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
	}
	#kType_table_paginate
	{
		display:none !important;
	}
	
	.wallet_h{
	    font-size: 30px;
        color: #213669;

	}
	.kType_table{
	    border: 1px #aeaeae solid !important;
	}
	.kType_table th, .kType_table td{
	    border: 1px #aeaeae solid !important;
	}
	.kType_table thead th{
	    border-bottom: 1px  #aeaeae solid !important;
	} 
	.kType_table tbody .complain{
	    color: red;
	    text-decoration: underline;
	}
	.sort{
	    margin-bottom: 10px;
	}
	/*kType_table tbody tr.k_normal{
	    background: #ececec;
	}*/
	#kType_table tbody tr.k_user{
	    background: #bcbcbc;
	}
	#kType_table tbody tr.k_merchant{
	    background: #dcdcdc;
	}
	.select2-container--bootstrap{
	    width: 175px;
	    display: inline-block !important;
	    margin-bottom: 10px;
	}
	.select2-dropdown {
	  z-index: 90019;
	}
	@media  (max-width: 750px) and (min-width: 300px)  {
	    .select2-container--bootstrap{
	        width: 300px;
	    }
	}
	</style>
</head>

<body class="header-light sidebar-dark sidebar-expand pace-done">

    <div id="wrapper" class="wrapper">
        <!-- HEADER & TOP NAVIGATION -->
        <?php include("includes1/navbar.php"); ?>
        <!-- /.navbar -->
        <div class="content-wrapper">
            <!-- SIDEBAR -->
            <?php include("includes1/sidebar.php"); ?>
            <!-- /.site-sidebar -->


            <main class="main-wrapper clearfix" style="min-height: 522px;">
                <div class="container-fluid" id="main-content" style="padding-top:25px">
					<h2 class="text-center wallet_h">Partner List</h2>
					<h2 style="color:red;"><?php  if(isset($_SESSION['s'])){ echo $_SESSION['s']; unset($_SESSION['s']);}?></h2>
					<form method="post">
						<div class="row">
							
							
							<div class="col-md-3">
								<div class="ui-widget">
									<div class="form-group">
									<?php 
									 $q="SELECT id,name FROM users WHERE user_roles = '2' and name!='' ORDER BY name ASC";
									 	$qMerchant = mysqli_query($conn,$q);
									 if($_POST['choose_agent'])
									 {
										$q2="SELECT id,name FROM users WHERE user_roles = '2' and name!='' and id!='$m_id' ORDER BY name ASC";
										$qMerchant2 = mysqli_query($conn,$q2);
										$all_partner=mysqli_fetch_all($qMerchant2,MYSQLI_ASSOC);
									 }
									
									?>
										<label for="tags_merchant">Choose a merchant</label>
									
									
									<select class="tags_merchant_select" name='m_id'>
									    <option value='-1'>Select Merchant</option>
										<?php 
										  
											while($row = mysqli_fetch_assoc($qMerchant)){ ?>
									       <option <?php if($m_id==$row['id']){ echo "selected";} ?> value="<?php  echo $row['id'];?>"><?php echo $row['name'];?></option>
											<?php } ?>

									</select>



									</div>  
								</div>
							</div> 
							
							<div class="col-md-6" >
								<input type="submit" class="btn btn-lg btn-outline-primary" name="choose_agent" value="Choose"/>
							 
								<button type="button" class="btn btn-danger" onclick="window.location.href='./partnerlist.php'">Clear Page</button>
				
							</div>

							
						</div>    
					</form>   
					<?php if($coin_in_market){  echo "<h2>Coin in Market $coin_in_market</h2>";} ?>
					<form method="post" action="update_partner.php">
					<input type="hidden" name="merchant_id" value="<?php echo $m_id;?>"/>
					<?php
					    if($_POST['choose_agent'])
						{
						$total_count=mysqli_num_rows($u_query);
						while($r = mysqli_fetch_assoc($u_query)){ ?>    
						<div class="row">
							<div class="col-md-2" style="margin-top:2%;">
								
									<div class="form-group">
										
									<input type="hidden" name="u_id[]" value="<?php echo $r['id']; ?>"/>
										
										<select class="tags_merchant_select" name="tags_merchant[]">
										<?php 
										  
											foreach($all_partner as $p){ ?>
									       <option <?php if($p['id']==$r['user_id']){ echo "selected";} ?> value="<?php  echo $p['id'];?>"><?php echo $p['name'];?></option>
											<?php } ?>

										</select>
									</div>
								
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label for="name">Max Limit</label>
									<input type="text" value="<?php echo $r['coin_max_limit']; ?>" class="form-control" maxlength="8"  name="coin_max_limit[]" placeholder="Coin Max Value">
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label for="name">Limit Class
									
									</label>
									<input type="hidden" id="coin_limit"/>
									 <select class="form-control limit_class" name="limit_class[]">
										<?php  foreach($limit_class as $k=>$v){?>
										<option <?php if($r['coin_class']==$k){ echo "selected";} ?> value="<?php echo $k?>" coin_limit="<?php echo $v;?>"><?php echo $k."-".$v." Coin" ?></option>
										<?php } ?>
										 
									 </select> 
									
								</div>
							</div>
						</div> 
						<?php  }
						for($i=0;$i<5;$i++)
						{ ?>
							<div class="row">
								<div class="col-md-2" style="margin-top:2%;">
									
										<div class="form-group">
											
											<input type="hidden" name="u_id[]" value=""/>
											<select class="tags_merchant_select" name="tags_merchant[]">
											<option value='-1'>Select Merchant</option>
										<?php 
										  
											foreach($all_partner as $p){ ?>
									       <option value="<?php  echo $p['id'];?>"><?php echo $p['name'];?></option>
											<?php } ?>

										</select>
										</div>
									
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label for="name">Max Limit</label>
										<input type="text" class="form-control" maxlength="8" name="coin_max_limit[]" placeholder="Coin Max Value">
									</div>
								</div>
								<div class="col-md-3 col-sm-12">
									<div class="form-group">
										<label for="name">Limit Class
										
										</label>
										<input type="hidden" id="coin_limit"/>
										 <select class="form-control" name="limit_class[]">
											<?php  foreach($limit_class as $k=>$v){?>
											<option value="<?php echo $k?>" coin_limit="<?php echo $v;?>"><?php echo $k."-".$v." Coin" ?></option>
											<?php } ?>
											 
										 </select> 
										
									</div>
								</div>
							</div>    
						<?php } 	
					?>
					<input type="submit" name="submit" class="btn btn-lg btn-outline-primary" value="Submit"/>
						<?php } ?>
					</form>
					
				</div>
			</main>
        </div>
      
        <!-- /.widget-body badge -->
    </div>
    <!-- /.widget-bg -->

    <!-- /.content-wrapper -->
	<?php include("includes1/footer.php"); ?>
	<script type="text/javascript" src="/js/dropzone.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
	






	<script>
	     var merchant_tags = [];
	    $(document).ready(function(){
			
			
	        jQuery(".dropzone").dropzone({
                sending : function(file, xhr, formData){
                },
                success : function(file, response) {
                    $(".complain_image").val(file.name);
                    
                }
            });
            $('#kType_table').DataTable({
				"bSort": false,
				"pageLength":1000,
				dom: 'Bfrtip',
				 buttons: [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
				});
				
				$(".status").change(function(){
		var status = $(this).val();
		//~ alert(status);
		var id = $(this).data("id");
		//~ alert(id);
		$.ajax({
			url : 'updateuser.php',
			type: 'POST',
			data :{updatedid:id,upadtedstatus:status},
			success:function(data){
		
			}
		});
		
	});
	
  $(".name").click(function(){
	  $("#myModal").modal("show");
	  var userid=$(this).data("id");
	 
	  $.ajax({
		  
		  url :'bankdatalil.php',
		  type:'POST',
		  data:{showid:userid},
		  success:function(table){
			 $("#modalcontent").html(table);
		  }		  
	  });
	 
  });
	
	/*user delete function */
	
	$('.del').click(function(){
        var id=$(this).data("del");
        
        $(".confirm-btn").attr({'user-id': id});
    });
    $('.confirm-btn').click(function(){
        var id = $(this).attr('user-id');
        $.ajax({
            url:'user_delete.php',
            type:'POST',
            data:{id:id},
            success: function(data) {
                location.reload();
            }
        });
    });
				
				
	});
	  
	  
	</script>
	<script type="text/javascript">

	  $(document).ready(function() {
    $(".tags_merchant_select").select2();
});
</script>



	
</body>

</html>
