<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_crud_inbox extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}


	function create_inbox($id_user_dari,$id_user_tujuan, $judul, $pesan) {
		$this->db->query("insert into inbox (id_user_dari, judul, pesan, id_user_tujuan, status, created)
							values ('$id_user_dari', '$judul', '$pesan', '$id_user_tujuan', '0', now()) ");

	}	

		// list_all_inbox
	function list_all_inbox($session_id) {
		$list_all_inbox = $this->db->query("select id_user_dari as dari, nama, judul, pesan, id_user_tujuan as 									tujuan, status, inbox.created
											from inbox
											join `user_detail` on inbox.id_user_dari = user_detail.id 
											where 
											inbox.id_user_dari != '$session_id' ");

		return $list_all_inbox;
		
		}	






}
