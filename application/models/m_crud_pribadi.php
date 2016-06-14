<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_crud_pribadi extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}


	function update_pribadi($id,$nama) {
		$this->db->query("update user_detail 
							set nama='$nama'
							where id='$id' ");


	}	






}
