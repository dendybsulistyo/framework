<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

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
		$data['session_nama'] 			= $this->session->userdata('nama');
		$data['session_nama_aplikasi'] 	= $this->session->userdata('nama_aplikasi');
		$data['username']		 		= $this->session->userdata('username');

		return $data;

	}

	// halaman index dashboard
	function index()
	{
		// load sesi
		$data = $this->load_sesi();

		// menu user
		$this->load->model('m_user');
		$data['r'] = $this->m_user->menu_user($data['username']);
				
		// load dashboard
		$this->load->view('statis/header_dashboard', $data);
		$this->load->view('statis/nav', $data);
		$this->load->view('dashboard/index',$data);
		$this->load->view('statis/footer_dashboard');

	}








}
