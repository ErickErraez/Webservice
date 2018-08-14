<?php
class Guardar extends CI_Model{

    function save($x){

        $this->db->insert("Login",$x);
        
    }

    function review($user){
        $this->db->where('email',$user);
        $get= $this->db->get('Login');
        if($get->num_rows()>0){
            return true;
        }else{
            return false;
        }

    }

}                                                                                                           
        
