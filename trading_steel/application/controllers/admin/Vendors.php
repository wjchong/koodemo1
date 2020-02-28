<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors extends MY_Controller {

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
        if($this->session->userdata('loged_in')){
            $this->data['rows'] = $this->master->getRows('members', array());
            $this->load->view('admin/members', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }   
    }

	 public function add_category(){
        if($this->session->userdata('loged_in')){
            $this->load->view('admin/add_category', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	
	 public function manage_category(){
        if($this->session->userdata('loged_in')){
			
			 $this->data['rolevals'] = $this->master->view_category(); // calling Post model method getPosts()
            $this->load->view('admin/manage_category', $this->data);
		
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	
		public function addcategory()
	{	
	
		$category = $this->input->post('category');
	     $createdate=date('d/m/Y');
		$data=array(
				'category'=>$category,
				'createdate'=>$createdate,
			);
			
		
		$this->master->add_category($data);
	}
	
		public function updatecategory()
	{	
	
		$category = $this->input->post('category');
		$id = $this->input->post('id');
	      $createdate=date('d/m/Y');
		$data=array(
				'category'=>$category,
				'createdate'=>$createdate,
				
			);
			
		
		$this->master->update_category($id,$data);
	}
  
	
	function delete_category($id) 
{ $this -> db -> where('id', $id);
$this -> db -> delete('tbl_category');
 redirect('admin/Vendors/manage_category');
} 
	
	 public function edit_category($id){
        if($this->session->userdata('loged_in')){
			    $this->data['edit_data'] = $this->master->edit_category($id); // calling Post model method getPosts()
				
				
            $this->load->view('admin/add_category', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	 public function create_vendor(){
        if($this->session->userdata('loged_in')){
					$this->data['getvals'] = $this->master->view_category(); // calling Post model method getPosts()
            $this->load->view('admin/create_vendor', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	 public function manage_vendor(){
        if($this->session->userdata('loged_in')){
			
			 $this->data['assisvals'] = $this->master->view_vendor(); // calling Post model method getPosts()
            $this->load->view('admin/manage_vendor', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	
	 public function add_vendor()
	{	
	
		$category = $this->input->post('category');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = doEncode($this->input->post('password'));
		$contactno = $this->input->post('contactno');
		$address=$this->input->post('address');
	     $createdate=date('d/m/Y');
		$data=array(
				'apply_category'=>$category,
				'username'=>$username,
				'email'=>$email,
				'password'=>$password,
				'contact_no'=>$contactno,
				'address'=>$address,
				'createdate'=>$createdate,
			);
			
		
		$this->master->add_vendor($data);
	}
	
	
	
  
   public function block_vendor($id,$locked,$page) {
		//echo $locked;
        if($this->session->userdata('loged_in')){
			$vals['locked'] = ($locked == 'Approve') ? 1 : 0;
			
            $alert = ($locked == 'Approve') ? 'alert alert-success' : 'alert alert-danger';
            $this->master->block_vendor('tbl_vendor', $vals['locked'], 'id', $id);
            $msg = array('msg' => '1 Vendor is '.$locked.' !', 'class' => $alert);
            $this->session->set_flashdata('mem', $msg);
            //$this->load->view('login', $this->data);
            redirect('admin/Vendors/'.$page);
        }else{
            redirect('admin/user/loginForm');
        }   
    }
	
	
	

   function delete_vendor($id) 
{ $this -> db -> where('id', $id);
$this -> db -> delete('tbl_vendor');
 redirect('admin/Vendors/manage_vendor');
} 

	public function edit_vendor($id){
        if($this->session->userdata('loged_in')){
			    $this->data['edit_data'] = $this->master->edit_vendor($id); // calling Post model method getPosts()
				$this->data['getvals'] = $this->master->view_category(); // calling Post model method getPosts()
				$this->load->view('admin/create_vendor', $this->data);
				
				
            //$this->load->view('admin/create_assistant', $this->data1);
				
        }else{
            redirect('admin/user/loginForm');
        }
    }

public function update_vendor()
	{	
	
		$category = $this->input->post('category');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = doEncode($this->input->post('password'));
		$contactno = $this->input->post('contactno');
		$address=$this->input->post('address');
		$id = $this->input->post('id');
	    
		$data=array(
				'apply_category'=>$category,
				'username'=>$username,
				'email'=>$email,
				'password'=>$password,
				'contact_no'=>$contactno,
				'address'=>$address,
			
			);
			
		
		$this->master->update_vendor($id,$data);
	}


    public function addField(){
        //$sql = "ALTER TABLE tbl_members ADD block int(11) NOT NULL DEFAULT '1' AFTER status";
        //$this->master->query($sql);
    }







}

?>