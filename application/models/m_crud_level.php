<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_crud_level extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}


	// list_all_level
	function list_all_level() {
		$list_all_level = $this->db->query("select * from user_level");

		return $list_all_level;
		
		}	




}
