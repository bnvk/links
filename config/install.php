<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Name:			Social Igniter : Links : Install
* Author: 		Social Igniter
* 		  		hi@brennannovak.com
*          
* Project:		http://social-igniter.com/
*
* Description: 	Installer values for Links for Social Igniter 
*/

/* Settings */
$config['links_settings']['widgets']			= 'TRUE';
$config['links_settings']['enabled']			= 'TRUE';
$config['links_settings']['short_url'] 			= '3';
$config['links_settings']['create_permission'] 	= '3';
$config['links_settings']['manage_permission']	= '2';


/* Data Table */
$config['database_links_links_table'] = array(
'id' => array(
	'type' 					=> 'INT',
	'constraint' 			=> 11,
	'unsigned' 				=> TRUE,
	'auto_increment'		=> TRUE
),
'user_id' => array(
	'type' 					=> 'INT',
	'constraint' 			=> 11,
	'unsigned' 				=> TRUE,
	'auto_increment'		=> TRUE
),
'alias' => array(
	'type' 					=> 'VARCHAR',
	'constraint' 			=> '6',
	'null'					=> TRUE
),
'url' => array(
	'type'					=> 'TEXT',
	'null'					=> TRUE
),
'created' => array(
	'type'					=> 'DATETIME',
	'default'				=> '9999-12-31 00:00:00'
));

$config['database_links_redirects_table'] = array(
'id' => array(
	'type' 					=> 'INT',
	'constraint' 			=> 11,
	'unsigned' 				=> TRUE,
	'auto_increment'		=> TRUE
),
'datetime' => array(
	'type'					=> 'DATETIME',
	'default'				=> '9999-12-31 00:00:00'
),
'ip_address' => array(
	'type' 					=> 'VARCHAR',
	'constraint' 			=> '20',
	'null'					=> TRUE
),
'browser_agent' => array(
	'type'					=> 'TEXT',
	'null'					=> TRUE
),
'url_string' => array(
	'type'					=> 'TEXT',
	'null'					=> TRUE
));