<?php
class Login extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getUser($user,$pass){
        $this->db->where('email',$user);
        $this->db->where('contraseña',$pass);
        $get= $this->db->get('Login');
        if($get->num_rows()>0){
            return true;
        }else{
            return false;
        }

    }
}