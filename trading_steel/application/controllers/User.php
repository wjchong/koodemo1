<?php

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //error_reporting(E_ALL); 
        //ini_set('display_errors', 1);
        $config = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_user' => 'siamsaveera@gmail.com',
            'smtp_pass' => 'Haha1122',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
       // $this->load->library('email', $config);
       // $this->email->set_newline("\r\n");
       // $this->email->set_mailtype("html");

        $this->load->library('cp/CoinPaymentsAPI');
        $this->coinpaymentsapi->Setup('a88942Deed721F58a831A11385e2B8b98426893bCf32cFbBaA914c09d995e0a1', '98a756a69a618f2dea6c458c79065c4b4935a0097e552ed5d810484f9fd73346');
    }

    public function index() {
        redirect('user/loginForm');
    }

    public function loginForm(){
		 
        if($this->session->userdata('userData')){
            redirect('user/dashboard');
        }else{
            $this->load->view('login', $this->data);
        }   
    }

    public function registerForm($referId = ''){
        if($this->session->userdata('userData')){
            redirect('user/dashboard');
        }else{
            $this->data['referId'] = $referId;
            $this->load->view('register', $this->data);
        }
    }

    public function forgetPasswordForm(){
        if($this->session->userdata('userData')){
            redirect('user/dashboard');
        }else{
            if (($arr = $this->input->post()) && (count($this->input->post()) > 0)) {
                $row = $this->master->getRow('members', array('email' => $arr['email'] ));
                if ($row->id) {
                    forgetPasswordEmail($arr['email'],$row->id);
                }else{
                    $msg = array('msg' => 'This email is not registered in the system!', 'class' => 'alert alert-danger');
                    $this->session->set_flashdata('pswd', $msg);
                }
            }
            $this->load->view('forgetPassword', $this->data);
        }
    }

    public function resetPassword($id){
        if($this->session->userdata('userData')){
            redirect('user/dashboard');
        }else{
            $this->data['member_row'] = $this->master->getRow('members', array('id' => $id ));
            if ($this->data['member_row']->id) {
                if (($arr = $this->input->post()) && (count($this->input->post()) > 0)) {
                    $vals['pswd'] = doEncode($arr['password']);
                    $this->master->save('members', $vals, 'id', $id);
                    $msg = array('msg' => 'Your password has been changes. Now login with your new password', 'class' => 'alert alert-success');
                    $this->session->set_flashdata('member', $msg);
                    redirect('user/loginForm');
                }
                $this->load->view('resetPassword', $this->data);
            }else{
                redirect('user/registerForm');
            }
        }
    }

    public function settings(){
        if($this->session->userdata('userData')){
            if (($arr = $this->input->post()) && (count($this->input->post()) > 0)) {
                if ($arr['cmd'] == 'updateProfile') {
                    unset($arr['cmd']);
                    if ($this->master->save('members', $arr, 'id', $this->session->userdata('userData')['id'])) {
                        $msg = array('msg' => 'Your profile is updated !', 'class' => 'alert alert-success');
                        $this->session->set_flashdata('setting', $msg);
                        redirect('user/settings');
                    }
                }
                if ($arr['cmd'] == 'updatePassword') {
                    $arr['pswd'] = doEncode($arr['password']);
                    unset($arr['cmd'],$arr['oldPswd'],$arr['oldPassword'],$arr['cpassword'],$arr['password']);
                    if ($this->master->save('members', $arr, 'id', $this->session->userdata('userData')['id'])) {
                        $msg = array('msg' => 'Your password is updated !', 'class' => 'alert alert-success');
                        $this->session->set_flashdata('setting', $msg);
                        redirect('user/settings');
                    }
                }
            }
            $this->data['member_row'] = $this->master->getRow('members', array('id' => $this->session->userdata('userData')['id'] ));
            $this->load->view('settings', $this->data);
        }else{
            redirect('user/registerForm');
        }
    }

    public function dashboard(){
        if($this->session->userdata('userData')){
			$this->load->model('Master');
			$id=$this->session->userdata('userData');
			$id = $id['id'];
			$data['orderhistory'] = $this->Master->GetOrderHistory($id);
			
            $this->load->view('dashboard',$data);
        }else{
            redirect('user/registerForm');
        }
    }

    public function auth() {
        $this->load->library('session');
        $res = array();
        $row = $this->master->getRow('members', array(
            'email' => $this->input->post('lemail'),
            'pswd' => doEncode($this->input->post('lpassword')),
            'status' => 1,
            'block' => 1
        ));
		
        if (!$row->id) {
            $msg = array('msg' => 'Invalid Email & Password !', 'class' => 'alert alert-danger');
            $this->session->set_flashdata('member', $msg);
            $this->load->view('login', $this->data);
        } else {
            $sess_array = array(
                'id' => $row->id,
                'name' => $row->fullname,
                'referId' => $row->referId,
                'image' => $row->image
            );
            $this->session->set_userdata('userData', $sess_array);
            redirect('user/dashboard');
        }
    }

    public function register() {
        $this->load->helper('security');
        $this->load->library('form_validation');
        if (($arr = $this->input->post()) && (count($this->input->post()) > 0)) {
            $row = $this->master->getRow('members', array('email' => $arr['email'] ));
            if ($row->id) {
                $msg = array('msg' => 'Email Already Exist !', 'class' => 'alert alert-danger');
                $this->session->set_flashdata('member', $msg);
                $this->load->view('register', $this->data);
            } else {
                $referRow = $this->master->getRow('members', array('referId' => $arr['referId'] ));
                if ($referRow->id) {
                    $arr['parent_referId'] = $arr['referId'];
                    $arr['referId'] = time();
                    $arr['account_date'] = date('Y-m-d h:i:sa');
                    $arr['IP'] = $_SERVER['REMOTE_ADDR'];
                    $arr['pswd'] = doEncode($arr['pswd']);
                    unset($arr['g-recaptcha-response'],$arr['cpswd']);
					  //print_r($arr);
					  
                    $this->master->save('members', $arr);
                    $lId = $this->master->last_id();
                    $this->sendMail($arr['email'],$lId);
                }else{
                    $msg = array('msg' => 'Refer.ID not registered in our system !', 'class' => 'alert alert-danger');
                    $this->session->set_flashdata('member', $msg);
                    $this->load->view('register', $this->data);
                }
            }
        } else {
            $msg = array('msg' => 'Oops !', 'class' => 'alert alert-danger');
            $this->session->set_flashdata('member', $msg);
            redirect('user/registerForm');
        }
    }

    public function shop_share(){
        if($this->session->userdata('userData')){
			$id=$this->session->userdata('userData');
			$id = $id['id'];
			$this->load->model('Master');
		    $blance = $this->Master->GetBalance($id);
			$share = intval($blance/50);
			$remainbal = $blance - $share * 50;
			$needpay = $share * 50;
			$data['data1'] = $blance;
			$data['data2'] = $share;
			$data['data3'] = $remainbal;
			$data['data4'] = $needpay;
			$this->load->view('shop_share',$data);
        }else{
            redirect('user/registerForm');
        }
    }
	public function shop(){
        if($this->session->userdata('userData')){
           $this->data['shops'] = $this->master->getRows('package', array('status' => 1));
            $this->load->view('shop', $this->data);
        }else{
            redirect('user/registerForm');
        }
    }
	public function ShareWithdraw(){
        if($this->session->userdata('userData')){
            
			$id=$this->session->userdata('userData');
			$id = $id['id'];
			$this->load->model('Master');
			$datanew['user_id'] = $id;
		    $datanew['withdraw_balance'] = $this->input->post('temp1');
			$datanew['way'] = "mywallet";
			$datanew['btc_address'] = "mywallet";
			
			$result=$this->master->AddShareWithdraw($datanew);
			if($result > 0)
			{
				$msg = array('msg' => 'Share Withdraw'.$this->data['alert'].' successfully !', 'class' => 'alert alert-success');
				$this->session->set_flashdata('with', $msg);
				redirect('User/shop_share');
			}
           
        }else{
            redirect('user/registerForm');
        }
    }

    public function packageDetail($id){
        if($this->session->userdata('userData')){
            $this->data['detail'] = $this->master->getRow('package', array('id' => $id ));
            $result = $this->coinpaymentsapi->GetRates();
            $this->data['btcPrice'] = $result['result']['USD']['rate_btc'] * ($this->data['detail']->pack_cost + $this->data['detail']->cry_fees);
            $this->data['ltcPrice'] = $result['result']['LTC']['rate_btc'] * ($this->data['detail']->pack_cost + $this->data['detail']->cry_fees);
            $this->data['ethPrice'] = $result['result']['ETH']['rate_btc'] * ($this->data['detail']->pack_cost + $this->data['detail']->cry_fees);
			
			$this->data['total_cost'] = $this->input->post('temp1');
			$this->data['total_share']= $this->input->post('quantity');
		
			
			
            $this->load->view('packageDetail', $this->data);
        }else{
            redirect('user/registerForm');
        }
    }
	
    public function buyPackage($id,$price,$cur,$total_share){
        if($this->session->userdata('userData')){
            $req = array(
                'amount' => $price,
                'currency1' => 'USD',
                'currency2' => $cur,
                'address' => '',
                'item_name' => 'Mining Pool Shares'
            );
            $result = $this->coinpaymentsapi->CreateTransaction($req);
            if ($result['error'] == 'ok') {
                $vals['mem_id'] = $this->session->userdata('userData')['id'];
                $vals['package_id'] = $id;
                $vals['currency'] = $cur;
				$vals['totalshare'] = $total_share;
                $vals['qrcode_url'] = $result['result']['qrcode_url'];
                $vals['address'] = $result['result']['address'];
                $vals['amount_usd'] = $price;
                $vals['amount'] = $result['result']['amount'];
                $vals['txn_id'] = $result['result']['txn_id'];
                $vals['status_url'] = $result['result']['status_url'];
                $vals['timeout'] = $result['result']['timeout'];
                $vals['created_date'] = date('Y-m-d h:i:sa');
                $this->master->save('transactions', $vals);
                $lId = $this->master->last_id();
                redirect('user/viewBuyPackage/'.$lId);
                //$this->viewBuyPackage($lId);
            }
        }else{
            redirect('user/registerForm');
        }
    }

    public function viewBuyPackage($id){
        if($this->session->userdata('userData')){
            $this->data['detail'] = $this->master->getRow('transactions', array('id' => $id ));
            $this->load->view('buyPackage', $this->data);
        }else{
            redirect('user/registerForm');
        }
    }

    public function checkPackageStatus(){
        $txn_id = $_POST['txn_id'];
        if($this->session->userdata('userData')){
            $req = array(
                'txid' => $txn_id
            );
            $result = $this->coinpaymentsapi->TransactionStatus($req);
            if (count($result) > 0) {
                $vals['status'] = 1;
                if ($result['result']['status'] > 0) {
                    $this->master->save('transactions', $vals, 'txn_id', $txn_id);

					$trans = $this->master->getRow('transactions', array('id' => $txn_id ));
					$shares = $this->master->getRow('user_shares', array('member_id' => $this->session->userdata('userData')['id']));
					$ary = $this->master->getRow('package', array('id' => $trans->package_id));

					 //print_r($ary);
					  
					if(count($shares)>0){ // checking if wallet amount exists
						$sharecount['shares_count'] =  $shares->shares_count+$ary->no_share;
						 $this->db->query("update tbl_user_shares set shares_count ='".$sharecount['shares_count']."' where member_id = ".$this->session->userdata('userData')['id']);
					}else{
						 $sharecount['shares_count'] =  $ary->no_share;
						 $sharecount['member_id'] =  $this->session->userdata('userData')['id'];
						  $this->master->save('user_shares', $sharecount);
					}

					/**********Insertion of commissions into wallets**********/
				$member_id = $this->session->userdata('userData')['id'];
				$data = $this->master->getRow('tbl_members', array('id' => $member_id));
			

			//start of getting parents
 				$obj_userstree = new $this->userstree;
				// set the database table with the parent child related data
				$obj_userstree->db_table="tbl_members";	
				// set the child element field
				$obj_userstree->item_identifier_field_name="parent_referId";
				// set the parent element field
				$obj_userstree->parent_identifier_field_name="referId";
				// set the field list identifier field
				$obj_userstree->item_list_field_name="fullname"; 
				$obj_userstree->level_identifier="&nbsp;&nbsp;&nbsp;";
				$obj_userstree->item_pointer="|-";
				$obj_userstree->order_by_phrase = " ORDER BY fullname";
				 $parent_referId = intval($data->parent_referId); 
				// just setting a default value
				if ($parent_referId == 0 ) {
					$parent_referId = 0;
				}
				 $all_parents = $obj_userstree->getAllParents($parent_referId,"",true,$parent_referId);

				/// end of getting all parents


 					$level=1;
				 foreach($all_parents as $parents){

					 // get comission level
 					 $comission_level = $this->master->getRow('comission_levels', array('comission_level' => $level));

 					  $comissionamt = ($this->input->post('amount_usd') / 100) * $comission_level->comission_percent; // calculating comission amount

					  //preparing comission insert data
					  $comis['comission_amount'] =  $comissionamt;
					  $comis['comission_percentage'] =  $comission_level->comission_percent;
					  $comis['level'] =  $level;
					  $comis['member_id'] =  $parents['id'];
					  $comis['referId'] =  $parent_referId;

					  $this->master->save('comissions', $comis); // inserting into comissions
						
						// getting wallet info
					 // $refDetails = $this->master->getRow('tbl_members', array('referId' => $parent_referId));
					 // $walletamt = $this->master->getRow('wallet', array('member_id' => $parents['id']));
					  $wallet['user_id'] =  $parents['id'];
					  
					//if(count($walletamt)>0){ // checking if wallet amount exists
 					//	$wallet['wallet_amount'] =  $walletamt->wallet_amount+$comissionamt;
					//	 $this->db->query("update tbl_wallet set wallet_amount ='".$wallet['wallet_amount']."' where member_id = ".$parents['id']);
					//}else{
						 $wallet['balance'] =  $comissionamt;
						 $wallet['comments'] =  "From Comission of ReferId".$parent_referId;
						 $this->master->save('user_wallet_blnc', $wallet);
					//}
					 


					 $level++;
				 }
				//exit;

			

			/*********************************************************/
                    echo $result['result']['status_text'];
                }else{
                    echo $result['result']['status_text'];
                }
            }else{
                echo 'error';
            }
            exit();
        }else{
            redirect('user/registerForm');
        }
    }

    public function sendMail($email,$lastId){
        $url = base_url().'user/verify_email/'.$lastId;
        $subject="Account Verification";
        $message=$this->confirmEmailTemplate($url);
        $this->email->from('shahzadtariq970@gmail.com', 'Email Verify');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        if(!$this->email->send())
        {
            echo $this->email->print_debugger();
        }else{
            $msg = array('msg' => 'Check Your Email And Confirm Your Account !', 'class' => 'alert alert-success');
            $this->session->set_flashdata('member', $msg);
            $this->load->view('login', $this->data);
        }
    } 

    public function verify_email($id){
        $vals['status'] = 1;
        $this->master->save('members', $vals, 'id', $id);
        $msg = array('msg' => 'Your account is verified !', 'class' => 'alert alert-success');
        $this->session->set_flashdata('member', $msg);
        $this->load->view('login', $this->data);
    }

    public function allMembers(){
        $this->data['members'] = $this->master->getRows('members', array());
        print_r($this->data['members']);
        exit();
    }

    public function logout() {
        $this->session->unset_userdata('userData');
        redirect('index');
    }

    public function confirmEmailTemplate($url){
        $confirm_email = '
        
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
                                Just one more step
                            </td>
                        </tr>

                        <tr>
                            <td style="text-align: center; padding-top: 20px; font-weight: 300; line-height: 36px; font-size: 24px; font-family: "Open Sans",Helvetica,Arial,sans-serif; color: #999; letter-spacing: -1px;">
                                Enjoy unlimited access to our app content by confirming your subscription.
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
                                    Confirm Account
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
        return $confirm_email;
    }

    public function create_table(){
        /*$sql = "CREATE TABLE `tbl_transactions` (
          `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
          `mem_id` int(20) NOT NULL,
          `package_id` int(20) NOT NULL,
          `currency` varchar(255) NOT NULL,
          `qrcode_url` text NOT NULL,
          `address` text NOT NULL,
          `amount` varchar(255) NOT NULL,
          `txn_id` text NOT NULL,
          `status_url` text NOT NULL,
          `timeout` int(200) NOT NULL,
          `status` int(20) NOT NULL DEFAULT '0',
          `created_date` datetime NOT NULL
        )";
        $this->master->query($sql);
        //$this->master->query("truncate tbl_members");
        //$this->master->query("ALTER TABLE tbl_member CHANGE id INT(11) NOT NULL AUTO_INCREMENT");
        //echo "Here";
        //exit();
        */
    }

    public function create_column(){
        /*
        $sql = "ALTER TABLE tbl_members ADD parent_referId int(20) NOT NULL AFTER IP";
        $this->master->query($sql);
        */
    }

    public function memberTable(){
        $this->load->view('members_table', $this->data);
    }
    /*
    public function update_row($id){
        $vals['status'] = 1;
        $vals['block'] = 1;
        $this->master->save('members', $vals, 'id', $id);
    }
    */




}

?>