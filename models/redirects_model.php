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
    
    function add_link($data)
    {
 		$data['created_at'] = unix_to_mysql(now());
		$data['updated_at'] = unix_to_mysql(now());

		$insert 	= $this->db->insert('data', $data);
		$data_id 	= $this->db->insert_id();
		return $this->db->get_where('data', array('data_id' => $data_id))->row();
    }

}