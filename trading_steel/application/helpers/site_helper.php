<?php

$CI = & get_instance();

function pr($ary, $exit = true) {
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
    if ($exit)
        exit;
}

function estr($string) {
    return mysql_real_escape_string($string);
}

function showMsg($type = '', $msg = '') {
    global $CI;
    if (empty($type) && empty($msg)) {
        $type = $CI->session->flashdata('f_type');
        $msg = $CI->session->flashdata('f_msg');
    }
    if ($type != '' && $msg != '') {
        switch ($type) {
            case 'success':
                echo '<div class="alert alert-success"><button data-dismiss="alert" class="close"> × </button><strong>Success:</strong> ' . $msg . '</div><div class="clearfix"></div>';
                break;
            case 'error':
                echo '<div class="alert alert-danger"><button data-dismiss="alert" class="close"> × </button><strong>Error: </strong> ' . $msg . '</div><div class="clearfix"></div>';
                break;
            case 'warning':
                echo '<div class="alert alert-warning"><button data-dismiss="alert" class="close"> × </button><strong>Warning:</strong> ' . $msg . '</div><div class="clearfix"></div>';
                break;
            default:
                echo '<div class="alert alert-info"><button data-dismiss="alert" class="close"> × </button><strong>Info:</strong> ' . $msg . '</div><div class="clearfix"></div>';
                break;
        }
    }
}

function setMsg($type, $msg) {

    global $CI;
    $CI->session->set_flashdata('f_type', $type);
    $CI->session->set_flashdata('f_msg', $msg);
}

function setPost($vals) {
    $CI = & get_instance();
    $CI->session->set_flashdata('f_post', $vals);
}

function showVal($val) {
    if (isset($val))
        return $val;
}



function getBredcrum($section, $ary) {
    $bcrum = '
        <ol class="breadcrumb">
            <li>
                <a href="' . base_url($section) . '"><i class="fa fa-home"></i>Home</a>
            </li>';

    foreach ($ary as $key => $value) {
        if ($key == '#') {
            $bcrum .= '<li class="active"><strong>' . $value . '</strong></li>';
        } else {
            $bcrum .= '<li><a href="' . base_url($section . '/' . $key) . '">' . $value . '</a></li>';
        }
    }

    $bcrum .= '</ol>';
    return $bcrum;
}

function getStatus($status) {
    if ($status == '1') {
        return '<strong style="color:green;">Active</strong>';
    } else {
        return '<strong style="color:red;">Inactive</strong>';
    }
}

function getPromoteStatus($type, $status) {
    if ($type != 'free') {
        if ($status == '2') {
            return '<strong style="color:green;">Promoted</strong>';
        } else if ($status == '1') {
            return '<strong style="color:blue;">Awaiting Payment</strong>';
        } else {
            return '<strong style="color:orange;">Processing</strong>';
        }
    } else {
        return '<strong style="color:gray;">No</strong>';
    }
}

function getPromoteYesNo($type, $status) {
    if ($type != 'free') {
        if ($status == '2') {
            return '<strong style="color:green;">Promoted</strong>';
        } else if ($status == '1') {
            return '<strong style="color:blue;">Awaiting Confirmation</strong>';
        } else {
            return '<strong style="color:orange;">Processing</strong>';
        }
    } else {
        return '<strong style="color:gray;">No</strong>';
    }
    /*
      if ($type != 'free') {
      if ($status == '2') {
      return '<strong style="color:green;">Yes</strong>';
      } else {
      return '<strong style="color:gray;">No</strong>';
      }
      } else {
      return '<strong style="color:gray;">No</strong>';
      }
     */
}

function getComplaintStatus($status) {
    if ($status == '1') {
        return '<strong style="color:green;">Received</strong>';
    } else if ($status == '2') {
        return '<strong style="color:red;">Not Received</strong>';
    } else {
        return '<strong style="color:orange;">Pending</strong>';
    }
}

function getLiveStatus($status) {
    if ($status == '1') {
        return '<strong style="color:green;">Live</strong>';
    } else {
        return '<strong style="color:orange;">Processing</strong>';
    }
}

function getStatusApprove($status) {
    if ($status == '1') {
        return '<span class="active" style="color:green;">Approved</span>';
    } else {
        return '<span class="inactive" style="color:orange;">Pending</span>';
    }
}

function getStatusYesNo($status) {
    if ($status == '1') {
        return '<span class="active">Yes</span>';
    } else {
        return '<span class="inactive">No</span>';
    }
}

function upload_image($path, $field_name, $image_width = '') {
    global $CI;
    $CI = & get_instance();

    $stamp = time() . '_' . rand(1111, 9999);
    $config['upload_path'] = $path;
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size'] = 2100000;
    $config['file_name'] = "image_" . $stamp;

    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($field_name)) {
        $image['error'] = $CI->upload->display_errors();
        return $image;
    } else {
        $image = $CI->upload->data();
        return $image;
    }
}

function upload_file($path, $field_name) {
    global $CI;
    $CI = & get_instance();
    $stamp = time();
    $config['upload_path'] = $path;
    $config['allowed_types'] = '*';
    $config['max_size'] = 2100000;
    $config['file_name'] = "file_" . $stamp;

    $CI->load->library('upload', $config);

    if (!$CI->upload->do_upload($field_name)) {
        $image['error'] = $CI->upload->display_errors();
        return $image;
    } else {
        $image = $CI->upload->data();
        return $image;
    }
}

function generate_thumb($frompath, $topath, $file_name, $thumb_width = 100) {
    global $CI;
    $CI = &get_instance();

    $CI->load->library('simpleimage');
    $CI->simpleimage->load($frompath . $file_name);
    $CI->simpleimage->resizeToWidth($thumb_width);
    $CI->simpleimage->save($topath . $file_name);

    return 'thumb_' . $file_name;
}

function getImageSrc($image) {
    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            return base_url() . $image;
        }
    }
    return base_url() . 'assets/images/no_image.jpg';
}

function getImageDimension($image) {
    if (!empty($image)) {
        $ary = explode("/", $image);
        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            list($width, $height) = getimagesize($image);
            return $width . "x" . $height;
        }
    }
    return '768x1191';
}

function getProfilePic($image) {
    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            return base_url() . $image;
        }
    }
    return base_url() . 'assets/images/no_pic.png';
}

function num($val, $size = 6) {
    return number_format(floatval($val), $size, '.', '');
}

function randCode($length = 8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890') {
    $chars_length = (strlen($chars) - 1);
    $string = $chars{rand(0, $chars_length)};

    for ($i = 1; $i < $length; $i = strlen($string)) {
        $r = $chars{rand(0, $chars_length)};
        if ($r != $string{$i - 1})
            $string .= $r;
    }

    return strtoupper($string);
}

function exQuery($query) {
    global $CI;
    $CI = get_instance();
    $ex = $CI->db->query($query);
    return $ex;
}

function checkEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function checkUsername($username) {
    if (preg_match('/^[a-zA-Z0-9]{3,}$/', $username)) {
        return true;
    }
    return false;
}

function checkPassword($password) {
    if (preg_match('/^[a-zA-Z0-9]{5,}$/', $password)) {
        return true;
    }
    return false;
}

function setZeroVal($val, $length = 6) {
    $output = NULL;
    for ($i = 0; $i < intval($length) - strlen($val); $i++) {
        $output .= '0';
    }
    return $output . $val;
}

function toSlugUrl($text) {
    $text = trim($text);
    $text = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
    $text = str_replace("--", '-', $text);
    $text = str_replace("--", '-', $text);
    return strtolower($text);
}

function getImgSize($image) {
    $size = filesize($image);
    return intval($size / 1024);
}

function currentURL() {
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $proto = strtolower($_SERVER["SERVER_PROTOCOL"]);
    $protocol = substr($proto, 0, strpos($proto, "/")) . $s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":" . $_SERVER["SERVER_PORT"]);
    return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
}

function makeExternalUrl($url) {
    if (strpos($url, 'http') === false) {
        $url = 'http://' . $url;
    }
    return $url;
}

function remove_file_from_directry($id, $table_name) {
    global $CI;
    $ary = $CI->master->getRow($table_name, array('id' => $id));
    unlink('./assets/site-content/images/' . $ary->img);
    unlink('./assets/site-content/images/thumb/' . $ary->img);
    return;
}
function send_email($post) {
    global $CI;
    if ($vals = $post) {
        $email_to = implode(',', array($CI->data['admin_row']['site_email']));
        $msg = "Name:" . $vals['name'];
        $msg .= "Phone:" . $vals['phone'];
        $msg .= "Email:" . $vals['email'];
        $msg .= "Message:" . $vals['message'];
        $sub = "Newsletter Email";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: ".stripslashes($vals['name'])." <no-reply@rectifycoaching.com>"."\r\n";
        
        if (mail($email_to, $sub, $msg, $headers)) {
            setMsg('success', 'Message send sucessfully');
        } else {
            setMsg('error', 'Error Occured');
        }
    }
    redirect(currentURL());
}

function doEncode($string, $key = 'oscer') {
    $string = base64_encode($string);
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string, $i, 1));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
    }
    return ($hash);
}

function doDecode($string, $key = 'oscer') {
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i+=2) {
        $ordStr = hexdec(base_convert(strrev(substr($string, $i, 2)), 36, 16));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    $hash = base64_decode($hash);
    return ($hash);
}

function recurseMember($referId, $level=0){
    global $CI;
    /*if ($level == 2) {
        die("SELECT referId,fullname FROM tbl_members WHERE parent_referId=$referId");
    }*/
    $arys = $CI->master->query("SELECT referId,fullname FROM tbl_members WHERE parent_referId=$referId");
    foreach ($arys as $ary) {
        $refid=$ary->referId;
        $fullname=$ary->fullname;
        $v = '';
        $s = '';
        for ($i=0; $i<=$level; $i++) {
            $s .= '&nbsp;&nbsp;';
            $v .= ' -> ';
        }
        echo '|'.$s.$v.ucwords($fullname)."<br>";

        $arr = $CI->master->query("SELECT referId,fullname FROM tbl_members WHERE parent_referId=$refid");
        if (count($arr) > 0) {
            recurseMember($refid, $level + 1);
        }
    }

    
}

function recurseMemberTable($referId, $level=0){
    global $CI;
    /*if ($level == 2) {
        die("SELECT referId,fullname FROM tbl_members WHERE parent_referId=$referId");
    }*/
    $arys = $CI->master->query("SELECT referId,fullname FROM tbl_members WHERE parent_referId=$referId");
    foreach ($arys as $ary) {
        $refid=$ary->referId;
        $fullname=$ary->fullname;
        $v = '';
        $s = '';
        for ($i=0; $i<=$level; $i++) {
            $s .= '&nbsp;&nbsp;';
            $v .= ' -> ';
        }
        echo '|'.$s.$v.ucwords($fullname)."<br>";

        $arr = $CI->master->query("SELECT referId,fullname FROM tbl_members WHERE parent_referId=$refid");
        if (count($arr) > 0) {
            recurseMember($refid, $level + 1);
        }
    } 
}

function getMembers() {
    global $CI;
    $ary = $CI->master->getRows('members', array('status' => 1, 'block' => 1));
    return $ary;
}

function getPackages() {
    global $CI;
    $ary = $CI->master->getRows('package', array('status' => 1));
    return $ary;
}

function singleMember($id){
    global $CI;
    $ary = $CI->master->getRow('members', array('id' => $id));
    return $ary;
}

function singlePackage($id){
    global $CI;
    $ary = $CI->master->getRow('package', array('id' => $id));
    return $ary;
}

function memberGrandTotal($id){
    global $CI;
    $ary = $CI->master->query("SELECT sum(amount_usd) as total from tbl_transactions where mem_id =  ".$id);
    return $ary;
}

function getPersonalShare($member_id){
	global $CI;
    $ary = $CI->master->getRow('user_shares', array('member_id' => $member_id));
	//print_r($ary);
	if($ary->shares_count==""){
		return 0;
	}else{
		return $ary->shares_count;
	}
}

function getTeamShare($member_id){
	global $CI;
	$members = $CI->master->getRow('members', array('id' => $member_id));
	$personal_count = $CI->master->getRow('user_shares', array('member_id' => $member_id));
	$cnt = $personal_count->shares_count;
	
	$getChilds = $CI->master->getRows('members', array('parent_referId' => $members->referId));
	if(count($getChilds)>0){

	foreach($getChilds as $childs){
		 $ary = $CI->master->getRow('user_shares', array('member_id' => $childs->id));
		$finalcount +=  $ary->shares_count;
	}
	return $finalcount+$cnt;
	}else{
		return 0;
	}
 	//print_r($ary);
	if($ary->shares_count==""){
		//return 0;
	}else{
		//return $ary->shares_count;
	}
}

function getRankAchivement($member_id,$personalshare,$teamshare){
	 global $CI;
	 // $ary = $CI->master->getRow('rank', array('personal_share' => $childs->id));
	 $ary = $CI->db->query("select * from tbl_rank where personal_share <= ".$personalshare." OR team_share <= ".$teamshare." ORDER by id DESC");
	 $res = $ary->row();
	 return $res->achievement_award;

}

function getRank($member_id,$personalshare,$teamshare){
	 global $CI;
	 // $ary = $CI->master->getRow('rank', array('personal_share' => $childs->id));
	 $ary = $CI->db->query("select * from tbl_rank where personal_share <= ".$personalshare." AND team_share <= ".$teamshare." ORDER by id DESC");
	 $res = $ary->row();
	 return $res->rank_name;

}

function forgetPasswordEmail($email,$mem_id) {
    global $CI;

    $config = array(
        'protocol'  => 'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_port' => '465',
        'smtp_user' => 'siamsaveera@gmail.com',
        'smtp_pass' => 'Haha1122',
        'mailtype'  => 'html', 
        'charset'   => 'iso-8859-1'
    );
    $CI->load->library('email', $config);
    $CI->email->set_newline("\r\n");
    $CI->email->set_mailtype("html");

    $url = base_url().'user/resetPassword/'.$mem_id;

    $msg = '
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml" style="font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                <head>
                    <meta name="viewport" content="width=device-width" />
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                    <title>Email Verify</title>
                    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800" rel="stylesheet">
                </head>
        <body style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: none; width: 100% !important; height: 100%; line-height: 1.6em; background-color: #f8f8f8; margin: 0;">

        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; background-color: #f4f8fb; font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 15px;" bgcolor="#f8f8f8">
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="width:600; background-color: #ffffff; color: #514d6a; padding: 40px; margin-top: 40px; line-height: 28px;" bgcolor="#ffffff">
                        <tr>
                            <td style="text-align: center; vertical-align: top;">
                                <img src="'.base_url('assets').'/demo/logo-email.png" alt="Oscar Admin Template" style="border:none; display:inline-block;" height="45" width="117">
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center; padding-top: 60px; font-weight: 300; line-height: 48px; font-size: 42px; font-family: "Open Sans",Helvetica,Arial,sans-serif; color: #111; letter-spacing: -1px;">
                                Change Password
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center; padding-top: 20px; font-weight: 300; line-height: 36px; font-size: 24px; font-family: "Open Sans",Helvetica,Arial,sans-serif; color: #999; letter-spacing: -1px;">
                                To change your password click the button blow.
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center; padding-top: 20px; vertical-align: top;">
                                <img src="'.base_url('assets').'/demo/icon-register.png" alt="" style="border:none; display:inline-block;" height="128" width="128">
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center; padding-top: 30px; padding-bottom: 60px;">
                                <a href="'.$url.'" style="letter-spacing: -1px; font-family: "Open Sans",Helvetica,Arial,sans-serif; text-decoration: none; display: inline-block; line-height: 70px; padding-left: 30px; padding-right: 30px; border-radius: 3px; font-size: 24px; color: #fff; background-color: #27cbcc;" target="_blank">
                                    Change Your Password
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center; padding-top: 30px; border-top: 1px solid #ddd;">
                                <a href="javascript: void(0);" target="_blank" style="text-decoration: none; margin-right: 20px;">
                                    <img src="'.base_url('assets').'/demo/icon-twitter.png" alt="" style="border:none; display:inline-block;" height="16" width="16">
                                </a>

                                <a href="javascript: void(0);" target="_blank" style="text-decoration: none; margin-right: 20px;">
                                    <img src="'.base_url('assets').'/demo/icon-facebook.png" alt="" style="border:none; display:inline-block;" height="16" width="16">
                                </a>

                                <a href="javascript: void(0);" target="_blank" style="text-decoration: none;">
                                    <img src="'.base_url('assets').'/demo/icon-dribbble.png" alt="" style="border:none; display:inline-block;" height="16" width="16">
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
        </table>
        </body>
        </html>
        ';


        $subject="Change Password";
        $message=$msg;
        $CI->email->from('shahzadtariq970@gmail.com', 'Change Password');
        $CI->email->to($email);
        $CI->email->subject($subject);
        $CI->email->message($message);
        if(!$CI->email->send())
        {
            echo $CI->email->print_debugger();
        }else{
            $msg = array('msg' => 'To Change Your Password Email Has Been Sent!', 'class' => 'alert alert-success');
            $CI->session->set_flashdata('pswd', $msg);
            redirect(currentURL());
        }
}



?>