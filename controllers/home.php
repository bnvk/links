<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Links : Home Controller
* Author: 		Localhost
* 		  		hi@brennannovak.com
* 
* Project:		http://social-igniter.com
* 
* Description: This file is for the Links Home Controller class
*/
class Home extends Dashboard_Controller
{
    function __construct()
    {
        parent::__construct();

		$this->load->config('links');
		$this->load->model('links_model');
		$this->load->model('redirects_model');

		$this->data['page_title'] = 'Links';
	}
	
	function index()
	{
		$this->data['sub_title'] = 'Custom';
		
		$this->data['links'] = $this->links_model->get_links();
	
		$this->render();
	}
}