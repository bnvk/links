<?php

class Redirects_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function get_redirects($url_string)
    {
 		$this->db->select('*');
 		$this->db->from('redirects'); 
 		$this->db->where('url_string', $url_string);   
 		$this->db->order_by('datetime', 'desc'); 
 		$result = $this->db->get();	
 		return $result->result();	      
    }

}