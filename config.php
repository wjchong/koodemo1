<?php
 date_default_timezone_set("Asia/Kuala_Lumpur");
// session_start();
if(!isset($_SESSION))
{
 session_start();
 }
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
$limit_class=array('A'=>100,'B'=>500,'C'=>5000,'D'=>10000);
if(substr($_SERVER['SERVER_NAME'],0,4) != "www." && $_SERVER['SERVER_NAME'] != 'localhost')  header('Location: https://www.'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);
    
    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}	

error_reporting(0);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$conn = mysqli_connect("localhost", "koofamil_B277", "rSFihHas];1P", "koofamil_demo1");   
//$conn = mysqli_connect("localhost", "root","","koofamil_b277");
// $conn = mysqli_connect("stallioni.net", "dotnetst_B277", "Sy?}z)-o;TB6", "dotnetst_B277");

if(!$conn)
{
	echo "database error"; die;
}
// print_R($_SESSION);
// die;    
// if (!isset($_SESSION['login']) || $_SESSION['login'] == '') {
	// if (isset($_COOKIE['my_cookie_id']) && $_COOKIE['my_cookie_id'] != '') {
		// $my_cookie_id = $_COOKIE['my_cookie_id'];
		// $sql = "SELECT user_id, salt, cookie_id FROM pcookies WHERE cookie_id = '$my_cookie_id'";
		// $result = $conn->query($sql);

		// $savedCookie = mysqli_fetch_assoc(mysqli_query($conn, $sql));
		// if ($savedCookie > 0) {
			// $old_cookie_id = hash_hmac('sha512',$_COOKIE['my_token'],$savedCookie['salt']);
			// if ($savedCookie['cookie_id'] == $old_cookie_id) {
				// $salt=md5(mt_rand());
	    		// $my_cookie_id = hash_hmac('sha512', $_COOKIE['my_token'], $salt);
	    		// $_SESSION['login'] = $savedCookie['user_id'];
	    		// $token_sql = "UPDATE pcookies SET cookie_id = '$my_cookie_id', salt = '$salt'";
	    		// $conn->query($token_sql);
	    		// $_COOKIE['my_cookie_id'] = $my_cookie_id;
	    		// setcookie("session_id", $_COOKIE['my_token'], time() + 3600 * 24 * 30 * 12 * 10,"/");
			// } else {
				// unset($_COOKIE['my_cookie_id']);
				// unset($_COOKIE['my_token']);
				// $remove_sql = "DELETE FROM pcookies WHERE cookie_id = '$my_cookie_id'";
	    		// $conn->query($remove_sql);
			// }
		// }
	// }	
// }
// $paypalUrl='https://www.sandbox.paypal.com/cgi-bin/webscr'; 

$site_url = "";   // Prod


$site_url = "https://www.koofamilies.com";   // Prod // Prod   
// $paypalUrl='https://www.sandbox.paypal.com/cgi-bin/webscr';
$paypalUrl='https://www.paypal.com/cgi-bin/webscr';
// $paypalId='click4mayank@gmail.com';
$paypalId='wjchong@koofamilies.com';
$paypal_cancel_url = $site_url . "/view_merchant.php?status=paypalcancel";
$paypal_success_url = $site_url . "/orderstatus.php";   
 if(!function_exists('redirectToUrl')) {
	function redirectToUrl($url) {
		echo '<script language="javascript">window.location.href ="'.$url.'"</script>';
		exit;
	}
}
   
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $completeUrlLink = "https";
} else {
    $completeUrlLink = "http";
}
  
// Here append the common URL characters. 
$completeUrlLink .= "://";
  
// Append the host(domain name, ip) to the URL. 
$completeUrlLink .= $_SERVER['HTTP_HOST'];
  
// Append the requested resource location to the URL 
$completeUrlLink .= $_SERVER['REQUEST_URI'];
if((!isset($_SESSION['login']) || !$_SESSION['login'])  && isset($_COOKIE['koofamilieslsvid']) && $_COOKIE['koofamilieslsvid'])
{
	
	//if session not exit but cookie is there mean that cookie to value pass session. this include all page so first before session check cokkie proces will give value to session
	
	$koofamilieslsvid = encrypt_decrypt('decrypt', $_COOKIE['koofamilieslsvid']);
		
	//here you can write your custom check , ex : user status blocked or not something
	$_SESSION['login']=$koofamilieslsvid;
				$_SESSION['user_id']=$koofamilieslsvid;

$_SESSION['IsVIP'] = null ;
if (empty($_SESSION["langfile"])) { $_SESSION["langfile"] = "english"; }
	
	
}
?>
