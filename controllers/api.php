<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Links : API Controller
* Author: 		Localhost
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the Links API Controller class
*/
class Api extends Oauth_Controller
{
    function __construct()
    {
        parent::__construct();
	}

    /* Install App */
	function install_get()
	{
		// Load
		$this->load->library('installer');
		$this->load->config('install');
		$this->load->dbforge();

		// Create Links Table
		if (!$this->db->table_exists('links'))
		{
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(config_item('database_links_links_table'));
			$this->dbforge->create_table('links');
		}

		// Create Redirect Table
		if (!$this->db->table_exists('redirects'))
		{
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->add_field(config_item('database_links_redirects_table'));
			$this->dbforge->create_table('redirects');
		}

		// Settings & Create Folders
		$settings = $this->installer->install_settings('links', config_item('links_settings'));

		if ($settings == TRUE)
		{
            $message = array('status' => 'success', 'message' => 'Yay, the Links App was installed');
        }
        else
        {
            $message = array('status' => 'error', 'message' => 'Dang Links App could not be installed');
        }		
		
		$this->response($message, 200);
	} 

    function shorten_link_authd_post()
    {
    	$this->load->model('links_model');
    	$short_url = $this->links_model->add_link($this->input->post('url'), $this->oauth_user_id);

		// Add Data
		if ($short_url)
		{
			$output_url = config_item('links_short_url').$short_url;

        	$message = array('status' => 'success', 'message' => 'Short link successfully created', 'data' => $output_url);
        }
        else
        {
	        $message = array('status' => 'error', 'message' => 'Oops unable to create shortened link');
        }

        $this->response($message, 200);
    }
  

}