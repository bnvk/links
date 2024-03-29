<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Links : Widgets
* Author: 		Localhost
* 		  		hi@brennannovak.com
*          
* Project:		http://social-igniter.com/
*
* Description: 	Installer values for Links for Social Igniter 
*/

$config['links_widgets'][] = array(
	'regions'	=> array('sidebar','content'),
	'widget'	=> array(
		'module'	=> 'links',
		'name'		=> 'Recent Data',
		'method'	=> 'run',
		'path'		=> 'widgets_recent_data',
		'multiple'	=> 'FALSE',
		'order'		=> '1',
		'title'		=> 'Recent Data',
		'content'	=> ''
	)
);