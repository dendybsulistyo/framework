<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class authen extends CI_Controller {

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


	public function login()
	{
		// input entry login
		$username 		= $this->input->post('username');
		$password 		= md5($this->input->post('password'));

		//load seting untuk ambil nama aplikasi 
		$this->load->model('m_seting');
		$r = $this->m_seting->seting();
		$nama_aplikasi = $r->nama_aplikasi;

		// load model dan autentikasi berdasar username dan password
		$this->load->model('m_user');
		$r = $this->m_user->cek_auth($username, $password);
		
		// pastikan login hanya 1 orang saja
		$j_id		 	= $r->j_id;
		$id 			= $r->id;
		$nama 			= $r->nama;
		$username		= $r->username;

		// proses jika ketemu 1 login
		if($j_id=="1") {
						
						// simpan data ke session
						$newdata = array(
						'id'			=> "$id",
						'nama'			=> "$nama",
						'username'		=> "$username",
						'nama_aplikasi' => "$nama_aplikasi"
 						);

						// seting session
						$this->session->set_userdata($newdata);

						// data variable
						$session_id			 		= $this->session->userdata('id');
						$data['session_id'] 		= $this->session->userdata('id');
						$data['session_nama'] 		= $this->session->userdata('nama');
						$data['session_username'] 	= $this->session->userdata('username');
						
						

						// load model untuk member
						$this->load->model('m_user');
						$r 	= $this->m_user->dashboard_user($session_id);
						
						if(!$r){ 

									} 
						else {	
								//simpan data ke array untuk ditampilkan di dashboard		
	
								$data['session_nama'] 			= $this->session->userdata('nama');
								$data['session_nama_aplikasi'] 	= $this->session->userdata('nama_aplikasi');

								// seting session
								$this->session->set_userdata($data);
									}

					
						// level menu user
						$data['r'] = $this->m_user->menu_user($username);
				
						// load dashboard

						$this->load->view('statis/header_dashboard', $data);
						$this->load->view('statis/nav', $data);
						$this->load->view('dashboard/index',$data);
						$this->load->view('statis/footer_dashboard');

					} 

		// jika $j_id gak ketemu
					else {
						$data['gagal'] = $this->session->set_flashdata('message', 'Login Gagal');
						redirect('authen/', 'refresh');
							} 


	} // akhir auth



	public function logout() 
	{

		// removing session
		$this->session->unset_userdata('newdata');
		redirect('authen/index','refresh');
	
	} // akhir logout



}
