<?php
class Ticket extends MY_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('Master');
	}
	public function index() {
        if($this->session->userdata('userData')){
            $this->load->view('openTicket', $this->data);
        }else{
            redirect('user/registerForm');
        }
    }
	public function generateTicketId($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public function myTicket() {
        if($this->session->userdata('userData')){
			$userid = $this->session->userdata('userData');
			$userid = $userid['id'];
			$this->data['myticket'] = $this->Master->fatchTicket($userid);
            $this->load->view('myTickets', $this->data);
        }else{
            redirect('user/registerForm');
        }
    }
	
	public function viewTicket($ticketid)
	{	
		if($this->session->userdata('userData')){
			$this->data['rowdata'] = $this->Master->viewTicket($ticketid);
			$this->load->view('view_ticket',$this->data);
        }else{
            redirect('admin/user/loginForm');
        }
	}
	public function submitTicket() {
		$userid = $this->session->userdata('userData');
		$memberid = $userid['id'];
		$name = $userid['name'];
		$data=array();
        $config=array(
				array(
						'field' => 'tickettype',
						'label' => 'tickettype',
						'rules' => 'trim|required'
					  ),
				array(
						'field' => 'sub',
						'label' => 'sub',
						'rules' => 'trim|required'
					  ),
				array(
						'field' => 'message',
						'label' => 'message',
						'rules' => 'trim|required'
					  ),
				array(
						'field' => 'attachment',
						'label' => 'attachment',
						'rules' => 'trim|xss_clean'
					  )
				);
		$fields   = array("tickettype","sub","message","attachment");
		$attachment = ($_FILES['attachment']['name'] !='')?$_FILES['attachment']['name']:'';
		
		foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
		
			$this->file_uploader->set_default_upload_path("./assets/img/ticket-attachment/");
			$this->file_uploader->set_no_of_files_on_folder(50);
			$this->file_uploader->set_allowed_types("jpg|jpeg|png|");
			$attachment = $this->file_uploader->upload_image('attachment');
			
			$ticketId = $memberid.$this->generateTicketId();
			
			$datanew['ticketid']      = $ticketId;
			$datanew['uid']      = $memberid;
			$datanew['name']      = $name;
			$datanew['tickettype']      = $data['tickettype'];
			$datanew['sub']      = $data['sub'];
			$datanew['message']   = $data['message'];
			$datanewmsg['message']   = $data['message'];
			$datanewmsg['uid']      = $memberid;
			$datanewmsg['ticketid']      = $ticketId;
			
			if($attachment['status'] == 200)
			{
			  $string=$attachment['data'];
			  $attachment = preg_replace("@[^A-Za-z0-9\-_.\/]+@i","_",$string);
			  $datanew['attachment'] = $attachment;
			  
			}
		
		else 
		{
		  $msg = array('msg' => 'Attachment is not'.$this->data['alert'].' Valid !', 'class' => 'alert alert-success');
			$this->session->set_flashdata('ticket', $msg);
			redirect('Ticket');
		}
		
		$result=$this->master->ticketInsert($datanew, $datanewmsg);
		
		if($result > 0)
		{
			$msg = array('msg' => 'Ticket is Submitted'.$this->data['alert'].' Successfully !', 'class' => 'alert alert-success');
			$this->session->set_flashdata('ticket', $msg);
			redirect('Ticket');
		}
	}
	public function message() {
		$data=array();
        $config=array(
				array(
						'field' => 'message',
						'label' => 'message',
						'rules' => 'trim|required'
					  ),
				array(
						'field' => 'uid',
						'label' => 'uid',
						'rules' => 'trim'
					  ),
				);
		$fields   = array("message","uid","ticketid");
		//$attachment = ($_FILES['attachment']['name'] !='')?$_FILES['attachment']['name']:'';
		
		foreach($fields as $field)
        {
            $data[$field] = $this->input->post($field);
        }
		/*$this->file_uploader->set_default_upload_path("./assets/img/ticket-attachment/");
		$this->file_uploader->set_no_of_files_on_folder(50);
		$this->file_uploader->set_allowed_types("jpg|jpeg|png|");
		$attachment = $this->file_uploader->upload_image('attachment');*/
		
		$datanew['message']      = $data['message'];
		$datanew['uid']      = $data['uid'];
		$datanew['ticketid']      = $data['ticketid'];
		$ticketid = $data['ticketid'];
		/*if($attachment['status'] == 200)
		{
		  $string=$attachment['data'];
		  $attachment = preg_replace("@[^A-Za-z0-9\-_.\/]+@i","_",$string);
		  $datanew['attachment'] = $attachment;
		  
		}
		else 
		{
		  $msg = array('msg' => 'Attachment is not'.$this->data['alert'].' Valid !', 'class' => 'alert alert-success');
			$this->session->set_flashdata('ticket', $msg);
			redirect('Ticket');
		}*/
		
		$result=$this->master->addMsg($datanew);
		
		if($result > 0)
		{
			$msg = array('msg' => 'Ticket is Submitted'.$this->data['alert'].' Successfully !', 'class' => 'alert alert-success');
			$this->session->set_flashdata('ticket', $msg);
			redirect('Ticket/viewTicket/'.$ticketid);
		}
	}
}

     