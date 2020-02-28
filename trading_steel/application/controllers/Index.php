<?php
class Index extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    function index() {
    	if($this->session->userdata('userData')){
        	redirect('user/dashboard');
        }else{
            redirect('user/loginForm');
        }
		
    }
	
	

}


?>