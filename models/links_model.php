<?php

class Links_model extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }
    
    function get_link($link_id)
    {
 		$this->db->select('*');
 		$this->db->from('links');    
 		$this->db->where('id', $link_id);
 		$this->db->order_by('created_at', 'desc'); 
		$this->db->limit(1);    
 		$result = $this->db->get()->row();	
 		return $result;	      
    }

    function get_links()
    {
 		$this->db->select('*');
 		$this->db->from('links');    
 		$this->db->order_by('created', 'desc'); 
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