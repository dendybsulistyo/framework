<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class welcome extends CI_Controller {

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


	public function index()
	{
		// load model 
		$this->load->model('m_seting');
		$r = $this->m_seting->seting();
		
		$nama_aplikasi = $r->nama_aplikasi;

 		$newdata = array(
						'nama_aplikasi'  		=> "$nama_aplikasi",
                   		);

		// seting session
		$this->session->set_userdata($newdata);

		// data session nama aplikasi
		$data['session_nama_aplikasi'] 	= $this->session->userdata('nama_aplikasi');

		// load view
		//$this->load->view('dashboard/header_dashboard',$data);
		$this->load->view('welcome_message',$data);
		$this->load->view('statis/footer_dashboard');

		
		}




}
