<?php include 'include/header.php';?>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <?php include 'include/side_menu.php';

  $button = "submit";
      $btn_name = "Add Event";
      $path = base_url("assets/images/banner/user_d.png");
      $id = $this->uri->segment(4);
      if($id!=''){
        $fetch = $this->admin_common_model->get_where('events',['id'=>$id]);
        $row = $fetch[0];
        $button = "update";
        $btn_name = "Update Event";        
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAOsaweruJ1wTisWeanZ5dlxaJtOyZsndQ"></script>

      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">SocialRyde</a></li>
                                    <li class="active">Add Event</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                
<div class="row">
<form method="POST" action="" enctype="multipart/form-data">
          <input type="hidden"  class="form-control" name="id" value="<?=$row['id'];?>">

                            <!-- Basic example -->
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">ADD NEW Event</h3></div>
                                    <div class="panel-body">
                                        <form role="form">
                                            <div class="form-group">
                                                <label>Event Name *</label>
                                                <input type="text" class="form-control" name="event_name" required value="<?=$row['event_name'];?>">
                                            </div>

                                        

                                             <div class="form-group">
                                                <label>Event Date *</label>
                                                <input type="date" class="form-control" name="event_date" required value="<?=$row['event_date'];?>">
                                            </div>

                                             <div class="form-group">
                                                <label>Event Description *</label>
                                                <input type="text" class="form-control" name="description" required value="<?=$row['description'];?>">
                                            </div>

                                             <div class="form-group">
                                             <label>Find the address</label>
                                             <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
                                             <div class="map" id="map" style="width: 100%; height: 300px;"></div>               
                                             </div>


                                             <div class="row clearfix">
                                             	 <div class="form-group form_area">
                                             <label>Address</label>
                                             <textarea class="form-control" name="address"  id="location" placeholder="Address here" required><?=$row['address'];?></textarea>
                                              <br>
                                            

                                                <div class="col-sm-4">
                                                <input type="text"  class="form-control" name="lat" id="lat" value="<?=$row['lat'];?>" placeholder="Latitude here">
                                              </div>
                                              <div class="col-sm-4">
                                               <input type="text"  class="form-control" name="lon" id="lng" value="<?=$row['lon'];?>" placeholder="Longitude here">
                                              </div>
                                           
                                           </div>
                                             </div>
         

                                            

                                            <div class="row clearfix">
                                              <div class="form-group col-md-6">
                                                <label>Event Image</label>

                                               <input type="file" name="event_image" onchange="readURL(this,'event_image');" class="form-control">
                                            </div>

                                              </div>

                          <div class="row clearfix">
                           <div class="col-md-4">
                            <div class="image-view">
                            <img src="<?=$path;?>" name="event_image" id="event_image">    
                            </div>    
                            </div>
                            </div>


                            <button style="margin-top:13px;" type="submit" name="<?=$button;?>" class="btn btn-purple waves-effect waves-light"><?=$button;?></button>

                                        </div>

                                           
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                            
                            
                           

                        </div> <!-- End row -->

 
                                        </form>
                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © SocialRyde.
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

<?php

extract($_REQUEST);
// for add holidays
if(isset($submit)){

            $arr_data = $this->input->post();

            if($_FILES['event_image']['name']!=''){
    
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['event_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['event_image'] = $img; 

            }

          //print_r($arr_data);die;

unset($arr_data['submit'],$arr_data['id']);
$result = $this->admin_common_model->insert_data('events',$arr_data); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Add Event Successfully',
  'success'

); 

$('.confirm').click(function(){

        window.location='".base_url('admin/view_page/event_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Add Event',
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


            $user_image = $row['event_image'];
            if($_FILES['event_image']['name']!=''){
    
                      //  unlink("uploads/images/" . $rest_image);
                        $n = rand(0, 100000);
                        $img = "USER_IMG" . $n . '.png';
                        move_uploaded_file($_FILES['event_image']['tmp_name'], "uploads/images/" . $img);
                        $arr_data['event_image'] = $img; 

            }


$arr_where = ['id'=>$arr_data['id']];
unset($arr_data['update']);
$result = $this->admin_common_model->update_data('events',$arr_data, $arr_where); 
//echo $this->db->last_query(); die;
             
        
if ($result) {
echo 
"<script> swal(
  'Success',
  'Update Event Successfully',
  'success'
); 

$('.confirm').click(function(){
        window.location='".base_url('admin/view_page/event_list')."';
});

</script>";

    }else{

echo "<script> swal(
  'Error',
  'Error In Updating Event',
  'error'
); 

$('.confirm').click(function(){
        window.location='';
});

</script>";

}// end if result




}


?>

