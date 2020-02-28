<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payout extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		  $this->data['rows'] = $this->master->getRows('payout_history',  array('member_id' => $this->session->userdata("userData")["id"]));
          $this->load->view('payout', $this->data);

    }
	public function PayoutHistory()
	{
		 if($this->session->userdata('userData')){
			$this->load->model('Master');
			$id=$this->session->userdata('userData');
			$id = $id['id'];
			$data['payhistory'] = $this->Master->GetPayHistory($id);
			$data['comhistory'] = $this->Master->GetComHistory($id);
			$this->load->view('payout_history',$data);
		
		}else{
            redirect('user/registerForm');
        }
	}
	public function OrderHistory()
	{
		 if($this->session->userdata('userData')){
			$this->load->model('Master');
			$id=$this->session->userdata('userData');
			$id = $id['id'];
			$data['orderhistory'] = $this->Master->GetOrderHistory($id);
			
			$this->load->view('order_history',$data);
			//$this->load->view('dashboard',$data);
		
		}else{
            redirect('user/registerForm');
        }
	}
	
	
  }

?>