<?php
class Login extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getUser(){
        $query= $this->db->get('Login');
        return $query->row();
    }
}
        
            