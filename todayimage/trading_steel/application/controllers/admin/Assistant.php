<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assistant extends MY_Controller {

 //Class-wide variable to store stats line
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

	 public function add_role(){
        if($this->session->userdata('loged_in')){
            $this->load->view('admin/add_user_role', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	
	 public function manage_role(){
        if($this->session->userdata('loged_in')){
			
			 $this->data['rolevals'] = $this->master->view_assist_type(); // calling Post model method getPosts()
            $this->load->view('admin/manage_role', $this->data);
		
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	
	
	
		function delete_assist_type($id) 
{ $this -> db -> where('id', $id);
$this -> db -> delete('tbl_assist_type');
 redirect('admin/Assistant/manage_role');
} 
	
	 public function edit_assist_type($id){
        if($this->session->userdata('loged_in')){
			    $this->data['edit_data'] = $this->master->edit_assist_type($id); // calling Post model method getPosts()
				
				
            $this->load->view('admin/add_user_role', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	 public function create_assistant(){
        if($this->session->userdata('loged_in')){
			$this->data['getvals'] = $this->master->view_assist_type(); // calling Post model method getPosts()
            $this->load->view('admin/create_assistant', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	 public function manage_assistant(){
		  
        if($this->session->userdata('loged_in')){
			 $memberid=$this->session->userdata('loged_in')['id'];
			 $this->data['assisvals'] = $this->master->view_assistant($memberid); // calling Post model method getPosts()
            $this->load->view('admin/manage_assistant', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	function delete_assistant($id) 
{ $this -> db -> where('id', $id);
$this -> db -> delete('tbl_admin');
 redirect('admin/Assistant/manage_assistant');
} 
	
	public function edit_assistant($id){
        if($this->session->userdata('loged_in')){
			    $this->data['edit_data'] = $this->master->edit_assistant($id); // calling Post model method getPosts()
				$this->data['getvals'] = $this->master->view_assist_type(); // calling Post model method getPosts()
				$this->load->view('admin/create_assistant', $this->data);
				
				
            //$this->load->view('admin/create_assistant', $this->data1);
				
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	
	 /*public function get_assist_type(){
        if($this->session->userdata('loged_in')){
			$this->data['getvals'] = $this->master->getv_assist_type(); // calling Post model method getPosts()
            $this->load->view('admin/create_assistant', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }*/

	
	
	
	
	public function addrole()
	{	
	
		$role = $this->input->post('role');
	     $createdate=date('d/m/Y');
		$data=array(
				'assist_type'=>$role,
				'createdate'=>$createdate,
			);
			
		
		$this->master->add_role($data);
	}
	
		public function updaterole()
	{	
	
		$role = $this->input->post('role');
		$id = $this->input->post('id');
	      $createdate=date('d/m/Y');
		$data=array(
				'assist_type'=>$role,
				'createdate'=>$createdate,
				
			);
			
		
		$this->master->update_role($id,$data);
	}
  
  
  public function add_assistant()
	{	
	
		$usertype = $this->input->post('usertype');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = doEncode($this->input->post('password'));
		$contactno = $this->input->post('contactno');
		$address=$this->input->post('address');
	     $createdate=date('d/m/Y');
		$data=array(
				'user_type'=>$usertype,
				'username'=>$username,
				'email'=>$email,
				'password'=>$password,
				'contact_no'=>$contactno,
				'address'=>$address,
				'createdate'=>$createdate,
			);
			
		
		$this->master->add_assistant($data);
	}
  /*public function view_role() {
   $this->data['rolevals'] = $this->Master->view_assist_type(); // calling Post model method getPosts()
   $this->load->view('admin/manage_role', $this->data); // load the view file , we are passing $data array to view file
 }
   /* public function member($id) {
        if($this->session->userdata('loged_in')){
            if (count($this->input->post()) > 0) {
                $vals = $this->input->post();
                if (isset($_FILES["pic"]["name"]) && $_FILES["pic"]["name"] != "") {
                    $image = $this->upload_image(UPLOAD_IMAGES, 'pic', 200, 200);
                    if (!empty($image['file_name'])) {
                        $vals['image'] = $image['file_name'];
                    } else {
                        echo 'Please upload a valid image file >> ' . strip_tags($image['error']);
                    }
                }
                $this->master->save('members', $vals, 'id', $id);
                $msg = array('msg' => 'Profile is updated successfully !', 'class' => 'alert alert-success');
                $this->session->set_flashdata('profile', $msg);
            } else {
                $this->data['post_row'] = $this->master->getRow('members', array('id' => $id));
                $this->load->view('admin/profile', $this->data);
            }
        }else{
            redirect('admin/user/loginForm');
        }   
    }*/

    public function block_assistant($id,$locked,$page) {
		//echo $locked;
        if($this->session->userdata('loged_in')){
			$vals['locked'] = ($locked == 'Approve') ? 1 : 0;
			
            $alert = ($locked == 'Approve') ? 'alert alert-success' : 'alert alert-danger';
            $this->master->block_assistant('tbl_admin', $vals['locked'], 'id', $id);
            $msg = array('msg' => '1 Assistant is '.$locked.' !', 'class' => $alert);
            $this->session->set_flashdata('mem', $msg);
            //$this->load->view('login', $this->data);
            redirect('admin/assistant/'.$page);
        }else{
            redirect('admin/user/loginForm');
        }   
    }
	
	public function update_assistant()
	{	
	
		$usertype = $this->input->post('usertype');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = doEncode($this->input->post('password'));
		$contactno = $this->input->post('contactno');
		$address=$this->input->post('address');
		$id = $this->input->post('id');
	    
		$data=array(
				'user_type'=>$usertype,
				'username'=>$username,
				'email'=>$email,
				'password'=>$password,
				'contact_no'=>$contactno,
				'address'=>$address,
			
			);
			
		
		$this->master->update_assistant($id,$data);
	}

    public function delete_member($id,$page) {
        if($this->session->userdata('loged_in')){
            $this->master->delete('members', 'id', $id);
            $msg = array('msg' => '1 Member is deleted !', 'class' => 'alert alert-danger');
            $this->session->set_flashdata('mem', $msg);
            $this->load->view('login', $this->data);
            redirect('admin/members/'.$page);
        }else{
            redirect('admin/user/loginForm');
        }   
    }

	
	public function set_permission(){
        if($this->session->userdata('loged_in')){
			$this->data['getvals'] = $this->master->view_assist_type();
          
			// calling Post model method getPosts()
			 $memberid=$this->session->userdata('loged_in')['user_type'];
			$this->data['get_data'] = $this->master->get_permission($memberid); // calling Post model method getPosts()
			
            $this->load->view('admin/set_permission', $this->data);
        }else{
            redirect('admin/user/loginForm');
        }
    }
	
	/*public function get_permission(){
        if($this->session->userdata('loged_in')){
			       //$usertype = $this->input->post('usertype');
				  // echo $usertype;
				// $memberid=$this->session->userdata('loged_in')['id'];
				 $memberid=$this->session->userdata('loged_in')['user_type'];
			    $this->data['edit_data'] = $this->master->get_permission_data($memberid); // calling Post model method getPosts()
				//$this->load->view('admin/includes/sidebar', $this->data);
				//$this->data['getvals'] = $this->master->view_assist_type(); // calling Post model method getPosts()
				$this->load->view('admin/includes/sidebar', $this->data);
				
				
            //$this->load->view('admin/create_assistant', $this->data1);
				
        }else{
            redirect('admin/user/loginForm');
        }
    }*/
	
	
	public function add_permission()
	{	
	
		$usertype = $this->input->post('usertype');
		$create_role = $this->input->post('create_role');
		$manage_role = $this->input->post('manage_role');
		$create_assistant = $this->input->post('create_assistant');
		$manage_assistant = $this->input->post('manage_assistant');
		$set_permission=$this->input->post('set_permission');
		
		$role_edit=$this->input->post('role_edit');
		$role_delete=$this->input->post('role_delete');
		$assistant_approve=$this->input->post('assistant_approve');
		$assistant_edit=$this->input->post('assistant_edit');
		
		$assistant_delete=$this->input->post('assistant_delete');
		$product_category=$this->input->post('product_category');
		$manage_category=$this->input->post('manage_category');
		$add_vendor=$this->input->post('add_vendor');
		
		$manage_vendor=$this->input->post('manage_vendor');
		$category_edit=$this->input->post('category_edit');
		$category_delete=$this->input->post('category_delete');
		$vendor_approve=$this->input->post('vendor_approve');
		
		$vendor_edit=$this->input->post('vendor_edit');
		$vendor_delete=$this->input->post('vendor_delete');
		$view_demands=$this->input->post('view_demands');
		$demands_approve=$this->input->post('demands_approve');
		
		$demands_delete=$this->input->post('demands_delete');
		$view_purchases=$this->input->post('view_purchases');
		$purchase_approve=$this->input->post('purchase_approve');
		$purchase_delete=$this->input->post('purchase_delete');
		
		$enquiry=$this->input->post('enquiry');
		$view_statistics=$this->input->post('view_statistics');
	
	     $createdate=date('d/m/Y');
		$data=array(
				'assist_id'=>$usertype,
				'create_role'=>$create_role,
				'manage_role'=>$manage_role,
				'create_assistant'=>$create_assistant,
				'manage_assist'=>$manage_assistant,
				'set_permission'=>$set_permission,
				'add_product_category'=>$product_category,
				'manage_category'=>$manage_category,
				'add_new_vendor'=>$add_vendor,
				'manage_vendor'=>$manage_vendor,
				'view_demands'=>$view_demands,
				'view_purchase'=>$view_purchases,
				'view_enquiry'=>$enquiry,
				'view_statistics'=>$view_statistics,
				'role_edit'=>$role_edit,
				'role_delete'=>$role_delete,
				'assistant_approve'=>$assistant_approve,
				'assistant_delete'=>$assistant_delete,
				'assistant_edit'=>$assistant_edit,
				
				'category_edit'=>$category_edit,
				'category_delete'=>$category_delete,
				'vendor_edit'=>$vendor_edit,
				'vendor_approve'=>$vendor_approve,
				'vendor_delete'=>$vendor_delete,
				
				'demands_approve'=>$demands_approve,
				'demands_delete'=>$demands_delete,
				
				
				'purchase_approve'=>$purchase_approve,
				'purchase_delete'=>$purchase_delete,
				
				
				'createdate'=>$createdate,
			);
			
		
		$this->master->add_permission($data);
	}
	
	
	
    public function addField(){
        //$sql = "ALTER TABLE tbl_members ADD block int(11) NOT NULL DEFAULT '1' AFTER status";
        //$this->master->query($sql);
    }
	

}

?>