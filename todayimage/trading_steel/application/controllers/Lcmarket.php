<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lcmarket extends MY_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {
        if($this->session->userdata('userData')){
		
			$url = "https://api.coinmarketcap.com/v1/ticker/?limit=12";   
		   //  Initiate curl
		   $ch = curl_init();
		   // Disable SSL verification
		   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		   // Will return the response, if false it print the response
		   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		   // Set the url
		   curl_setopt($ch, CURLOPT_URL,$url);
		   // Execute
		   $result=curl_exec($ch);
		   // Closing
		   curl_close($ch);

		   // Will dump a beauty json :3
		   $data['market_data'] = json_decode($result, true);
			
            $this->load->view('lcmarket',$data);
        }else{
            redirect('user/loginForm');
        }   
    }
}