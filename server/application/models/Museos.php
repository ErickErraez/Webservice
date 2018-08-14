<?php
class Museos extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    function getMuseos(){
        $query= $this->db->get('Museos');
        return $query->result();
    }
}
        
            