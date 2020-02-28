<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
    protected $title; 
    public function __construct() {
        parent::__construct();
		$this->load->model('master');
		//$data->title = "Some site";
		   $memberid=$this->session->userdata('loged_in')['user_type'];
			$data->title = $this->master->get_permission($memberid); // calling Post model method getPosts()
			$this->load->vars($data);
    }
public function index() {
        //$this->master->query("truncate tbl_admin");
        //$this->master->query("UPDATE tbl_admin set firstname='Oscer', lastname='Oscer', username='admin', password='i5f355z4j5e3d336'  ");
        redirect('admin/user/loginForm');
    }
public function loginForm(){
        if($this->session->userdata('loged_in')){
            redirect('admin/user/dashboard');
        }else{
            $this->load->view('admin/login', $this->data);
        }   
    }
	public function profile(){
		if($this->session->userdata('loged_in')){
			 //$data->title = "Some site";
		   $memberid=$this->session->userdata('loged_in')['id'];
			$this->data['profilevals'] = $this->master->get_profile($memberid); // calling Post model method getPosts()
			 $this->load->view('admin/profile', $this->data);
		}else{
			$this->load->view('admin/login',$this->data);
		}
	}
	
	public function profile_update()
	{	
	
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = doEncode($this->input->post('password'));
		$phone = $this->input->post('phone');
		$address=$this->input->post('address');
		$id = $this->input->post('id');
		$data=array(
				'username'=>$username,
				'email'=>$email,
				'password'=>$password,
				'contact_no'=>$phone,
				'address'=>$address
			
			);
			
		
		$this->master->profile_update($id,$data);
	}


    public function dashboard(){
        if($this->session->userdata('loged_in')){
            	$this->data['assisvals'] = $this->master->view_vendor(); // calling Post model method getPosts()
            $this->load->view('admin/dashboard', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	public function view_demands(){
        if($this->session->userdata('loged_in')){
            $this->load->view('admin/view_demands', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	public function view_purchase(){
        if($this->session->userdata('loged_in')){
            $this->load->view('admin/view_purchase', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
		public function view_enquiry(){
        if($this->session->userdata('loged_in')){
            $this->load->view('admin/view_enquiry', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	

    public function auth() {
        $this->load->library('session');
        $res = array();
        $row = $this->master->getRow('admin', array(
		    'user_type' => $this->input->post('usertype'),
            'username' => $this->input->post('username'),
            'password' => $this->doEncode($this->input->post('password')),
            'locked' => '0',
        ));
		//print_r($row);
		
        if (!$row->id) {
            $msg = array('msg' => 'Invalid Email & Password !', 'class' => 'alert alert-danger');
            $this->session->set_flashdata('admin_login', $msg);
           redirect('admin/user/loginForm');
        } else {
            $sess_array = array(
                'id' => $row->id,
                'name' => $row->firstName,
				'user_type' =>$row->user_type 
            );
            $this->session->set_userdata('loged_in', $sess_array);
            redirect('admin/user/dashboard');
        }
    }
 


    public function doEncode($string, $key = 'oscer') {
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

    public function doDecode($string, $key = 'oscer') {
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

    public function logout() {
        $this->session->unset_userdata('loged_in');
        redirect('admin/index');
    }

	public function checkpwd(){
		 $row = $this->master->getRow('admin', array(
             'transactionpwd' => $this->doEncode($this->input->post('pwd')),
         ));

		  if($row->id !=""){
			  echo "success";
		  }
	}
}
?>