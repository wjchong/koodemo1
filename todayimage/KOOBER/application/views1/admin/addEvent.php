<!DOCTYPE html>
<html>
<?php include 'include/head.php';
     
      $button = "submit";
      $btn_name = "Add Events";
      $path = $path1 = base_url("uploads/images/no_image.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('events',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Events";        
        if($row['event_image']!=''){
          $path = base_url("uploads/images/".$row['event_image']);
        }
     
      }
      


           // script for get current lat long

            $client  = @$_SERVER['HTTP_CLIENT_IP'];
	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	    $remote  = @$_SERVER['REMOTE_ADDR'];
	    $result  = array('country'=>'', 'city'=>'');
	    if(filter_var($client, FILTER_VALIDATE_IP)){
	        $ip = $client;
	    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
	        $ip = $forward;
	    }else{
	        $ip = $remote;
	    }
	    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    
	    if($ip_data && $ip_data->geoplugin_countryName != null){
	    	$ip_result['country_name'] = $ip_data->geoplugin_countryName;
	        $ip_result['country'] = $ip_data->geoplugin_countryCode;
	        $ip_result['city'] = $ip_data->geoplugin_city;
	        $ip_result['lat'] = $ip_data->geoplugin_latitude;
	        $ip_result['lon'] = $ip_data->geoplugin_longitude;
	    }else{
	        $ip_result['lat'] = 28.7041;
	        $ip_result['lon'] = 77.1025;
            }


 ?>

<style>
.avatar-view {    
    height: 140px!important;
    width: 205px!important;
}
</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAOsaweruJ1wTisWeanZ5dlxaJtOyZsndQ"></script>

<body class="hold-transition skin-blue sidebar-mini" id="">
<div class="wrapper">
<?php include 'include/header.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content" id="crop-avatar">
   <div class="row ">
      <div class="col-sm-12 cdG">
      <span class="fs30 "><?=$btn_name;?></span> 
      <!--<p><?=$btn_name;?> and add them to this site.  </p>-->
    </div>
   <div class="col-sm-12 cdG">
          <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
          <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">
         
         

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Event Name</label>
            <div class="col-sm-8">
              <input type="text"  class="form-control" name="event_name" required value="<?=$row['event_name'];?>">
            </div>
          </div>
         
         

         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Event Description</label>
            <div class="col-sm-8">
              <textarea  class="form-control"  rows="3" name="description" required> <?= $row['description'];?></textarea>
                 
            </div>
          </div>
         
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Event Date</label>
            <div class="col-sm-8">
              <input type="date"  class="form-control" name="event_date" required value="<?=$row['event_date'];?>">
                 
            </div>
          </div>
     
           
         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Event image</label>
            <div class="col-sm-8">
               <label>
                 <img src="<?=$path;?>" width="200" id="event_image">
                 <input type="file"  class="form-control" name="event_image" onchange="readURL(this,'event_image');" style="display:block">
               </label>              
            </div>
          </div>

          


         <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Find the address</label>
            <div class="col-sm-8">
              <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
              <div class="map" id="map" style="width: 100%; height: 300px;"></div>               
            </div>
          </div>

          <div class="form-group form_area">
            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-8">
              <textarea class="form-control" name="address" rows="3" id="location" placeholder="Address here" required><?=$row['address'];?></textarea>
              <br>
            </div>
            <div class="col-sm-4 col-sm-offset-2">
              <input type="text"  class="form-control" name="lat" id="lat" value="<?=$row['lat'];?>" placeholder="Latitude here">
            </div>
            <div class="col-sm-4">
             <input type="text"  class="form-control" name="lon" id="lng" value="<?=$row['lon'];?>" placeholder="Longitude here">
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



<!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form class="avatar-form" action="<?=base_url('crop_image/crop.php');?>" enctype="multipart/form-data" method="post">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="avatar-modal-label">Change Avatar</h4>
            </div>
            <div class="modal-body">
              <div class="avatar-body">

                <!-- Upload image and data -->
                <div class="avatar-upload">
                  <input type="hidden" class="avatar-src" name="avatar_src">
                  <input type="hidden" class="avatar-data" name="avatar_data">
                  <input type="hidden" name="path" value="../uploads/images/">
                  <input type="hidden"  name="base_url" value="<?=base_url('uploads/images');?>/">
                  <input type="hidden"  name="wth" value="220">
                  <input type="hidden"  name="hth" value="165">
                  <input type="hidden" value="1.3" id="aspectRatio" >
                  
                  <label for="avatarInput">Local upload</label>
                  <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                </div>

                <!-- Crop and preview -->
                <div class="row">
                  <div class="col-md-9">
                    <div class="avatar-wrapper"></div>
                  </div>
                  <div class="col-md-3">
                    <div class="avatar-preview preview-lg"></div>
                    <div class="avatar-preview preview-md"></div>
                    <div class="avatar-preview preview-sm"></div>
                  </div>
                </div>

                <div class="row avatar-btns">
                  <div class="col-md-9">
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                      <!--<button type="button" class="btn btn-primary" data-method="rotate" data-option="-15">-15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-30">-30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45">-45deg</button>-->
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                      <!--<button type="button" class="btn btn-primary" data-method="rotate" data-option="15">15deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="30">30deg</button>
                      <button type="button" class="btn btn-primary" data-method="rotate" data-option="45">45deg</button>-->
                    </div>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-primary btn-block avatar-save">Done</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
          </form>
        </div>
      </div>
    </div><!-- /.modal -->

    <!-- Loading state -->
    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->


<script>
/* script */
function initialize() {
   var latlng = new google.maps.LatLng(<?=$ip_result['lat'];?>,<?=$ip_result['lon'];?>);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
   document.getElementById('location').value = address;
   document.getElementById('lat').value = lat;
   document.getElementById('lng').value = lng;
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style type="text/css">
    .input-controls {
      margin-top: 10px;
      border: 1px solid transparent;
      border-radius: 2px 0 0 2px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      height: 32px;
      outline: none;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
    }
    #searchInput {
      background-color: #fff;
      font-family: Roboto;
      font-size: 15px;
      font-weight: 300;
      margin-left: 12px;
      padding: 0 11px 0 13px;
      text-overflow: ellipsis;
      width: 50%;
    }
    #searchInput:focus {
      border-color: #4d90fe;
    }
</style>


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

            if($_FILES['event_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $dimg = "EVENT_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['event_image']['tmp_name'], "uploads/images/" . $dimg);
                        $arr_data['event_image'] = $dimg; 

                    } 

    

$mysql_date = date('Y-m-d H:i:s', strtotime($arr_data['event_date']));
 $arr_data['event_date'] = $mysql_date; 
unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('events',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {


echo 
"<script> swal(
  'Success',
  'Add events Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/eventList')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add events',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}

}// end if submit


// for update events
if(isset($update)){

$arr_data = $this->input->post();

             $event_image = $row['event_image'];
            if($_FILES['event_image']['name']!=''){
    
                        unlink("uploads/images/" . $event_image);
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['event_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['event_image'] = $img; 

            }



$arr_where = ['id'=>$arr_data['id']];
$mysql_date = date('Y-m-d H:i:s', strtotime($arr_data['event_date']));
 $arr_data['event_date'] = $mysql_date; 
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('events',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update events Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/eventList')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating events',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>






