<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_seting extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}

	function seting()
	{
		$r = $this->db->query("select nama_aplikasi from set_app");

		return $r->row();

		}	



}
