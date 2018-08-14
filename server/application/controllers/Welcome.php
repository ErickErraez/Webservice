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

	public function getmuseo(){
		header('Access-Control-Allow-Origin: *');
		header('Content-type:application/json;charset=utf-8');
		header('Access-Control-Allow-Methods: GET,POST,OPTIONS*'); 
		$this->load->model('Museos');
		$data = $this->Museos->getMuseos();
		
		echo json_encode($data);
	}

	public function getuser(){

		header('Access-Control-Allow-Origin: *');
		header('Content-type:application/json;charset=utf-8');
		header('Access-Control-Allow-Methods: GET,POST,OPTIONS*');
		$data = json_decode(file_get_contents('php://input'),true);
		$email=$data['email'];
		$pass=$data['contrasena'];

        $login=array(
            "email"=>$email,
            "contraseña"=>$pass
		);
		
		if(isset($pass)){
			$this->load->model('Login');
			if($this->Login->getUser($email,$pass)){
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	public function guardar(){		
		header('Access-Control-Allow-Origin: *');
		header('Content-type:application/json;charset=utf-8');
        $this->load->model("Guardar");
		$data = json_decode(file_get_contents('php://input'),true);

		$nombre=$data['nombre'];
		$apellido=$data['apellido'];
		$email=$data['email'];
        $pass=$data['contrasena'];

        $datos=array(
            "nombre"=>$nombre,
            "apellido"=>$apellido,
            "email"=>$email,
            "contraseña"=>$pass
		);
		if($this->Guardar->review($email)){
			echo json_encode("Error el correo ya existe");
		}else{
			echo json_encode("Guardado");
			$this->Guardar->save($datos);
		}
	
    }

}
