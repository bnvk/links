<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Links : Controller
* Author: 		Localhost
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the public Links Controller class
*/
class Links extends Site_Controller
{
    function __construct()
    {
        parent::__construct();       
	}
	
	function index()
	{
		$this->data['page_title'] = 'Links';
		$this->render();
	}

	function view() 
	{		
		$this->render();
	}
	
	/* Widgets */
	function widgets_recent_data($widget_data)
	{
		// Load Template Model
		$this->load->model('data_model');
	
		$widget_data['demo_data'] = $this->data_model->get_data_view();
		
		$this->load->view('widgets/recent_data', $widget_data);
	}	
	
}
