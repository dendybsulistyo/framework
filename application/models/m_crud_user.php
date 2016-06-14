<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_crud_user extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}


	function create_user($nama, $email, $hp, $id_user_level) {
		$this->db->query("insert into user_detail(nama,email,hp,created,id_user_level) values 
							('$nama', '$email', '$hp', now(), '$id_user_level') ");

	}
	
	// list_all_user
	function list_all_user() {
		$list_all_user = $this->db->query("select nama, email, hp, id_user_level, nama_level
											from user_detail
											join user_level on user_detail.id_user_level = user_level.id
											order by nama
											");

		return $list_all_user;
		}	

	// list_all_login
	function list_all_login() {
		$list_all_login = $this->db->query("select nama, email, hp, id_user_level, nama_level, username
											from user_detail
											join user_level on user_detail.id_user_level = user_level.id
											left join user on user_detail.id = user.id
											order by nama
											");

		return $list_all_login;
		}	




}
