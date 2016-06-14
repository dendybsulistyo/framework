<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud_inbox extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function load_sesi() {
		// data variable
		$data['session_id'] 			= $this->session->userdata('id');
		$data['session_nama'] 			= $this->session->userdata('nama');
		$data['session_nama_aplikasi'] 	= $this->session->userdata('nama_aplikasi');
		$data['username']		 		= $this->session->userdata('username');

		return $data;

	}


	// halaman index dashbooard
	function kirim()
	{

		$data = $this->load_sesi();

		// transaksi
		
		$id_user_dari 		= $this->session->userdata('id');
		$id_user_tujuan 	= $this->input->post('id_user_tujuan');
		$judul 				= $this->input->post('judul');
		$pesan 				= $this->input->post('pesan');

		// kirim pesan
		$this->load->model('m_crud_inbox');
		$this->m_crud_inbox->create_inbox($id_user_dari, $id_user_tujuan, $judul, $pesan);
		///////// akhir transaksi

		// menu user
		$this->load->model('m_user');
		$data['r'] = $this->m_user->menu_user($data['username']);

		// load user yang akan dikirimi pesan
		$data['list_all_user'] = $this->m_user->list_all_user();
		
		//list inbox
		$this->load->model('m_crud_inbox');
		$data['list_all_inbox'] = $this->m_crud_inbox->list_all_inbox($this->session->userdata('session_id'));

		// warning
		$data['update_berhasil'] = $this->session->set_flashdata('message', 'Pesan Berhasil Dikirim');
				
		// load dashboard
		$this->load->view('statis/header_dashboard', $data);
		$this->load->view('statis/nav', $data);
		$this->load->view('dashboard/inbox',$data);
		$this->load->view('statis/footer_dashboard');

	}











}
