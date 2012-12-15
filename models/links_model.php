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

    /* Gets Links
     * @return Array object
     */
    function get_links()
    {
 		$this->db->select('*');
 		$this->db->from('links');    
 		$this->db->order_by('created', 'desc'); 
 		$result = $this->db->get();	
 		return $result->result();	      
    }

    /* Create shortened URLs from long urls
     * @param type $url String url you would like shortened
     * @return type String
     */
    function add_link($raw_url, $user_id)
    {
		$short_url = "";

		$url = prep_url($raw_url);

		$link_length = 3;

		// Check to see if this URL has an Alias
		$existing_alias = $this->alias_from_url($url);

		// Generate a new alias if needed
		if ($existing_alias == "")
		{
		    $alias = random_string('alnum', $link_length);

		    // Checks Alias Existing
		    while ($this->does_alias_exist($alias))
		    {
				$alias = random_string('alnum', $link_length);
		    }

		    $this->save_new_alias($url, $alias, $user_id);

		    $short_url = $alias;
		}
		else
		{
		    $short_url = $existing_alias;
		}

		// display the short url
		return $short_url;
    }



    /* Method to see if a generated Alias already exists in the table
     * @param type $alias String to check to see if it exists
     * @return Bool True or False
     */
    function does_alias_exist($alias)
    {
		$this->db->select('id');
	
		$query = $this->db->get_where('links', array('alias' => $alias), 1, 0);
	
		if ($query->num_rows() > 0)
		{
		    return true;
		}
		else
		{
		    return false;
		}
    }

    /* Save a new Alias to the table
     * @param type $url URL to shorten
     * @param type $alias  The new Alias for this URL
     */
    function save_new_alias($url, $alias, $user_id)
    {
		$data = array(
			'user_id'	=> $user_id,
		    'alias' 	=> $alias,
		    'url' 		=> $url,
		    'created'	=> date("Y-m-d H:i:s")
		);
	
		$this->db->insert('links', $data);
    }

    /* Return an existing Alias, if any
     * @param type $url String, the URL to check
     * @return type $lias String, the alias, if any
     */
    function alias_from_url($url)
    {
		$alias = "";
	
		$this->db->select('alias');
	
		$query = $this->db->get_where('links', array('url' => $url), 1, 0);
	
		if ($query->num_rows() > 0)
		{
		    foreach ($query->result() as $row)
		    {
				$alias = $row->alias;
		    }
		}
	
		return $alias;
    }

}