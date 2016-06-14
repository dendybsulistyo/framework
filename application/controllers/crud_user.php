<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class crud_user extends CI_Controller {

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
	function create_user()
	{

		$data = $this->load_sesi();

		// transaksi
		$nama 			= $this->input->post('nama');
		$email 			= $this->input->post('email');
		$hp 			= $this->input->post('hp');
		$id_user_level 	= $this->input->post('id_user_level');

		// update nama
		$this->load->model('m_crud_user');
		$this->m_crud_user->create_user($nama, $email, $hp, $id_user_level);

		///////// akhir transaksi

		//list inbox
		$this->load->model('m_crud_level');
		$data['list_all_level'] = $this->m_crud_level->list_all_level();

		// menu user
		$this->load->model('m_user');
		$data['r'] = $this->m_user->menu_user($data['username']);

		//list all user
		$this->load->model('m_crud_user');
		$data['list_all_user'] = $this->m_crud_user->list_all_user();

		// warning
		$data['update_berhasil'] = $this->session->set_flashdata('message', 'Update Berhasil');
				
		// load dashboard
		$this->load->view('statis/header_dashboard', $data);
		$this->load->view('statis/nav', $data);
		$this->load->view('dashboard/user',$data);
		$this->load->view('statis/footer_dashboard');

	}











}
