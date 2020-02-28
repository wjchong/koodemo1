<?php
include('config.php');
if(isset($_POST['submit']))
{
	// var_dump($_POST);
	//  die;
	extract($_POST);
	if(count($tags_merchant)>0)
	{
		$i=0;
		$user_array = array();
		foreach($tags_merchant as $s_merchant)
		{
			
			$user_id=$tags_merchant[$i];
			if($user_id!='-1')
			{
				$l_class=$limit_class[$i];
				$max_limit=$coin_max_limit[$i];
				$coin_limit=limitclass($l_class);
				// $user_id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM users WHERE name='$merchant_name' and user_roles='2' LIMIT 1"))['id'];  
				if($user_id && $max_limit && $coin_limit && $l_class)
				{
					if($u_id[$i])
					{
						
						if(in_array($user_id, $user_array)){
							// echo $user_id;
							// echo "yes";
							// print_r($user_array);die;
						}else{
							array_push($user_array, $user_id);
							$s_id=$u_id[$i];
							// update exisiting entry
						 	$query="update unrecoginize_coin set user_id='$user_id',coin_max_limit='$max_limit',coin_class='$l_class',coin_limit='$coin_limit' where id='$s_id'";
							mysqli_query($conn,$query);	
						}
						
					}
					else
					{
						if(in_array($user_id, $user_array)){
							//echo "yes2";die;
						}else{
							array_push($user_array, $user_id);
							// add new entry
							 $query="INSERT INTO unrecoginize_coin(user_id,merchant_id,coin_max_limit,status,coin_class,coin_limit) VALUES ('$user_id', '$merchant_id', '$max_limit', '1','$l_class','$coin_limit')";
							mysqli_query($conn,$query);

						}
						
					}
				}
			}
			$i++;
		}
	}
}
$_SESSION['s']="Partner List updated";
header('Location:partnerlist.php');
// die;
function limitclass($l_class)
{
	if($l_class=="A")
	$l_coin=100;
	else if($l_class=="B")
	$l_coin =500;
	else if($l_class=="C")
	$l_coin=5000;
	else if($l_class=="D")
	$l_coin=10000;
	return $l_coin;
}
?>