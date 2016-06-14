<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}


	// cek login
	function cek_auth($username, $password) 
	{
		$r = $this->db->query("select count(user.id) as j_id, 
								user.id as id,
								user.username as username,
								user_detail.nama as nama 
								from user
								join user_detail on user.id = user_detail.id
								where 
								user.username='$username' and 
								user.password='$password'
			
								");

		//user.id = user_detail.id 								
		return $r->row();

		}	


	// detail menu yang tampil sesuai level	
	function menu_user($username) 
	{	
		$r = $this->db->query("select 
								user_level.nama_level as nama_level

								from user
								join user_level_detail on user.id = user_level_detail.id_user
								join user_level on user_level_detail.id_level = user_level.id
								join user_detail on user.id = user_detail.id
								where 
								user.username='$username' 
			
								");
						
		return $r;

		}	


	// ketemu 1 atau tidak
	function cek_member($session_id) {
		$r = $this->db->query("select count(id) as id from member where id='$session_id' ");

		return $r->row();
		
		}	

	// list_all_user id dan nama
	function list_all_user() {
		$list_all_user = $this->db->query("select id,nama from user_detail order by nama asc ");

		return $list_all_user;
		
		}	


	function dashboard_user($session_id) {
		$r = $this->db->query("select id
								 from user 
								 where 
								 id='$session_id' ");


		return $r->row();
	}	



}
