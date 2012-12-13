<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* Links Library
*
* @package		Social Igniter
* @subpackage	Links Library
* @author		Localhost
*
* Contains methods for Links App
*/

class Links_library
{
	function __construct()
	{
		// Global CodeIgniter instance
		$this->ci =& get_instance();

	}
	
	/* Interact with Data_Model */
	function my_custom_method($data_id)
	{
		return $this->ci->links_model->get_data($data_id);
	}

}