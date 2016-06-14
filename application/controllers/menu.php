<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller {

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
		$data['session_id']		 		= $this->session->userdata('id');

		return $data;

	}



	// halaman manajemen user
	function user()
	{
		// load sesi
		$data = $this->load_sesi();

		// menu user
		$this->load->model('m_user');
		$data['r'] = $this->m_user->menu_user($data['username']);

		//list inbox
		$this->load->model('m_crud_level');
		$data['list_all_level'] = $this->m_crud_level->list_all_level();

		//list all user
		$this->load->model('m_crud_user');
		$data['list_all_user'] = $this->m_crud_user->list_all_user();


		// warning
		$data['update_berhasil'] = " ";

		// load dashboard
		$this->load->view('statis/header_dashboard',$data);
		$this->load->view('statis/nav', $data);
		$this->load->view('dashboard/user',$data);
		$this->load->view('statis/footer_dashboard');

	}

	// halaman manajemen login
	function user_login()
	{
		// load sesi
		$data = $this->load_sesi();

		// menu user
		$this->load->model('m_user');
		$data['r'] = $this->m_user->menu_user($data['username']);

		//list inbox
		$this->load->model('m_crud_level');
		$data['list_all_level'] = $this->m_crud_level->list_all_level();

		//list all user
		$this->load->model('m_crud_user');
		$data['list_all_login'] = $this->m_crud_user->list_all_login();


		// warning
		$data['update_berhasil'] = " ";

		// load dashboard
		$this->load->view('statis/header_dashboard',$data);
		$this->load->view('statis/nav', $data);
		$this->load->view('dashboard/user_login',$data);
		$this->load->view('statis/footer_dashboard');

	}










	// halaman index dashboard
	function inbox()
	{
		// load sesi
		$data = $this->load_sesi();

		// menu user
		$this->load->model('m_user');
		$data['r'] = $this->m_user->menu_user($data['username']);

		// load user yang akan dikirimi pesan
		$data['list_all_user'] = $this->m_user->list_all_user();
		
		//list inbox
		$this->load->model('m_crud_inbox');
		$data['list_all_inbox'] = $this->m_crud_inbox->list_all_inbox($this->session->userdata('session_id'));

		// load dashboard
		$this->load->view('statis/header_dashboard',$data);
		$this->load->view('statis/nav', $data);
		$this->load->view('dashboard/inbox',$data);
		$this->load->view('statis/footer_dashboard');

	}



	// halaman index dashboard
	function pribadi()
	{
		// load sesi
		$data = $this->load_sesi();

		// menu user
		$this->load->model('m_user');
		$data['r'] = $this->m_user->menu_user($data['username']);

		$data['update_berhasil'] = " ";
				
		// load dashboard
		$this->load->view('statis/header_dashboard',$data);
		$this->load->view('statis/nav', $data);
		$this->load->view('dashboard/pribadi',$data);
		$this->load->view('statis/footer_dashboard');

	}






}
