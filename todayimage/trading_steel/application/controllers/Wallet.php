<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Wallet extends MY_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('master');
		if($this->session->userdata('userData')){}else{  redirect('user/loginForm'); }
     }

    public function index() {
        $this->load->view('wallet');
    }

	public function requestpay()
	{
		$userid = $this->input->post('user_id');
		$withdr = $this->input->post('withdr');
		$btc = $this->input->post('btc');
		$addr = $this->input->post('addr');
		$data= array(
			'user_id'=>$userid,
			'withdraw_balance'=>$withdr,
			'way'=>'mywallet',
			'btc_address'=>$addr,
			'btc_price'=>$btc,
			);

		$this->master->save('user_wallet_withdraw',$data);
	}

	public function checktime(){
		$id = $this->input->post('user_id');
		$data = $this->master->getWithdrawltime($id);

		 
		$dateB = $data[0]['date_created']; 
		// your second date coming from a mysql database (date fields) 
		$dateA = date('Y-m-d h:i:s'); 

		$timediff = strtotime($dateA) - strtotime($dateB);

		if($timediff > 86400){ 
			echo 'success';
		}
		else
		{
		 echo 'fail';
		}
	}
	public function transaction(){
		//$user = $this->master->select('tbl_members','1',$id);
		$this->data['userdata'] = $this->master->getRow('tbl_members', array('id' => $this->session->userdata("userData")["id"]));
		$this->data['history'] = $this->master->GetWalletData($this->session->userdata("userData")["id"]);
		 $this->load->view('transaction', $this->data);

	}


}

?>