<?php 
	if (!defined('BASEPATH')) exit('No direct script access allowd');
	class Webservice_model extends CI_Model{

		public function get_where($table,$where){
			$data =	$this->db->where($where)
					 		 ->get($table);

			//echo $this->db->last_query();

	 		if($res = $data->result_array()){
	 			return $res;
			}else{
				return FALSE;
			}

			
		}	

		public function insert_data($table,$data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}

		public function update_data($table,$data,$where){
			$query = $this->db->where($where)
					 ->update($table,$data);
			if ($query)
			{
				return TRUE;
			}
		  	else
			{
				return FALSE;
			}
		}

		public function get_all($table){
			$data = $this->db->get($table);
			$data = $data->result_array();
			if ($data) {
				return $data;
			}else{
				return FALSE;
			}
		}

		public function humanTiming($time)
		{
			$time = time() - $time; // to get the time since that moment
			$time = ($time < 1) ? 1 : $time;
			$tokens = array(
				31536000 => 'year',
				2592000 => 'month',
				604800 => 'week',
				86400 => 'day',
				3600 => 'hour',
				60 => 'minute',
				1 => 'second'
			);
			foreach($tokens as $unit => $text)
			{
				if ($time < $unit) continue;
				$numberOfUnits = floor($time / $unit);
				return $numberOfUnits . ' ' . $text . (($numberOfUnits > 1) ? 's' : '');
			}
		}

		function delete_data($table, $where)
		{
			$del = $this->db->where($where)
					 ->delete($table);
			if ($del)
			{
				return TRUE;
			}
		  	else
			{
				return FALSE;
			}
		}



function user_apk_notification($registration_ids, $message)
	{

	// Set POST variables
//print_r($registration_ids); die;
	$url = 'https://android.googleapis.com/gcm/send';
	$fields = array(
		'registration_ids' => $registration_ids,
		'data' => $message,
	);
	$headers = array(
		'Authorization: key=' . "AAAAQw6FtNA:APA91bEorS7LNaYdZ9zsFb5CwnC0VcKPH7rhjTZvPyZsDSl86lXpwfRMrtBBfu3_IPoyVs3efYxzgI2dWRyc7_wCormbYnMZGH4XRYqNOL78j2JhxG9u9lykrgATK6BAIaPnbPj8kdoh",
		'Content-Type: application/json'
	);

	// print_r($headers);
	// Open connection

	$ch = curl_init();

	// Set the url, number of POST vars, POST data

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Disabling SSL Certificate support temporarly

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	// Execute post

	$result = curl_exec($ch);
	if ($result === FALSE)
		{
		die('Curl failed: ' . curl_error($ch));
		}

	// Close connection

	curl_close($ch);

//	echo $result;

	}





function driver_apk_notification($registration_ids, $message)
	{

	// Set POST variables
//print_r($registration_ids); die;
	$url = 'https://android.googleapis.com/gcm/send';
	$fields = array(
		'registration_ids' => $registration_ids,
		'data' => $message,
	);
	$headers = array(
		'Authorization: key=' . "AAAA1Dgb8o8:APA91bF0BejAUNVhtK5PUXg3Ng3ROK2ROFaq8ErKTKCPGKPzqXRjKW1xOxS1apAgGyGazPDaqNXXpPfbjRDNLruxuMhBMWiZhwZiunfZfUHCmyd60WGlDyx-wiMjiZIEYJfcWhdUjCH3",
		'Content-Type: application/json'
	);

	// print_r($headers);
	// Open connection

	$ch = curl_init();

	// Set the url, number of POST vars, POST data

	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Disabling SSL Certificate support temporarly

	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

	// Execute post

	$result = curl_exec($ch);
	if ($result === FALSE)
		{
		die('Curl failed: ' . curl_error($ch));
		}

	// Close connection

	curl_close($ch);

	//echo $result;

	}

function get($table, $select, $where="", $join_count=0, $join_table=[], $join_condition=[], $join_type=[], $limit=[],$orderby=[], $groupby="")
	{
		//print_r($where);die;
       // print_r($limit);die;
        $i=0;
        $this->db->select($select);
        $this->db->from($table);
        if(!empty($join_count))
        {
            while($i<$join_count)
            {
                if(isset($join_type[$i]))
                {
                   $this->db->join($join_table[$i], $join_condition[$i], $join_type[$i]);
                }
                else
                {
                   $this->db->join($join_table[$i], $join_condition[$i]);
                }
                $i++;
            }  
        }
        if(!empty($where))
        {
            $this->db->where($where);
        }
        
        if(!empty($orderby))
        {
            $this->db->order_by($orderby[0], $orderby[1]);
        }
        if(!empty($limit))
        {
            $this->db->limit($limit[0], $limit[1]);
        }
        if(!empty($groupby))
        {
            $this->db->group_by($groupby);
        }
         if(!empty($like))
        {
            //print_r($like);
            if(!empty($like["Name"]))
            {
            $this->db->like("Name",$like["Name"]);
 
            }
            if(!empty($like["name"]))
            {
            $this->db->like("CountryCode",$like["name"]);

            } 
            if(!empty($like["City"]))
            {
            $this->db->like("City",$like["City"]);
            }
            // if(!empty($wherein))
            // {
            // $this->db->where_in("HotelCode",$wherein);
            // }

             //$this->db->or_like("City",$like);

        }
        $result = $this->db->get();
    // print_r($this->db->last_query());die;
        return $result->result_array();
	}


                function generateRandomString($num) {
                         $length=$num;
                         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                         $charactersLength = strlen($characters);
                         $randomString = '';
                         for ($i = 0; $i < $length; $i++) {
                             $randomString .= $characters[rand(0, $charactersLength - 1)];
                         }
                         return $randomString;
               }

               function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
	        {
				$pi80 = M_PI / 180;
				$lat1*= $pi80;
				$lng1*= $pi80;
				$lat2*= $pi80;
				$lng2*= $pi80;
				$r = 6372.797; // mean radius of Earth in km
				$dlat = $lat2 - $lat1;
				$dlng = $lng2 - $lng1;
				$a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
				$c = 2 * atan2(sqrt($a) , sqrt(1 - $a));
				$km = $r * $c;
				return ($miles ? ($km * 0.621371192) : $km);
	        }

        //end class
	}
?>
