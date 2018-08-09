<?php

header('Content-type:application/json;charset=utf-8');
header('Acces-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: GET, POST, OPTIONS');


class Welcome extends CI_Controller {


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
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function getuser(){

		header('Access-Control-Allow-Origin: *'); 
		$this->load->model('Login');
		$data = $this->Login->getUser();
		
		echo json_encode($data);
	}
}
