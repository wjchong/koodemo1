<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
    {
    	parent::__construct();
		$this->load->model('Dbconnection_client');
    }
	public function index()
	{
		$array = array('view'=>'dashboard');
		$this->load->view('client/template',$array);
	}

	public function shop()
	{	
		$row = $this->Dbconnection_client->select('package',1);
		$array = array('view'=>'shop','data'=>$row);
		$this->load->view('client/template',$array);
	}
	public function wallet()
	{	
		
		$array = array('view'=>'wallet');
		$this->load->view('client/template',$array);
	}
	
}
