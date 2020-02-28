<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('master');
    }

    public function index() {
        if($this->session->userdata('userData')){
           $this->load->view('portfolio');
        }else{
            redirect('user/loginForm');
        }   
    }
}