<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 	
 	function __construct()
 	{
		parent::__construct();
 		$this->load->library(array('template', 'form_validation'));
 		$this->load->model('aksiuser');
 		$this->load->helper('tgl_indo');
 		
 	}

	public function index()
	{
		$this->template->user('home');
	}

	public function penyakit()
	{
		$this->template->user('penyakit');
	}

	public function riwayat()
	{
		if(!$this->session->userdata('user_login')){
			redirect('home/login');
		}
		$where = array(			
			'id_petani' => $this->session->userdata('user_id')
		);

		$data['get'] = $this->aksiuser->get_where_join('y_konsultasi', $where);

		$this->template->user('riwayat', $data);
	}

	public function panduan()
	{
		$this->template->user('panduan');
	}

	public function cetak()
	{
		if(!$this->session->userdata('user_login')){
			redirect('home/login');
		}

		$get = $this->aksiuser->get_where('y_petani', array('id_petani' => $this->session->userdata('user_login')))->row();

		$data['fullname'] = $get->fullname;
		$data['alamat'] = $get->alamat;
		$data['jk'] = $get->jk;

		$id_konsul = $this->uri->segment(3);
		$sakit1 = $this->aksiuser->get_penyakit(array('id_konsul' => $id_konsul));
		foreach ($sakit1->result() as $key) {
			$data['id_penyakit'] = $key->id_penyakit;
			$data['id_konsul'] = $key->id_konsul;
			$data['nm_penyakit'] = $key->nm_penyakit;
			$data['solusi'] = $key->solusi;
			$data['ket_penyakit'] = $key->ket_penyakit;
			$data['tgl_konsul'] = $key->tgl_konsul;
			$data['hasil'] = $key->hasil;
		}
		$this->load->view('cetak_riwayat', $data);
	}

	public function register()
	{
		if($this->input->post('submit', TRUE) == 'submit')
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('fullname', 'Nama Lengkap', "required|trim|min_length[3]|regex_match[/^[a-z A-Z.']+$/]");
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|regex_match[/^[a-zA-Z0-9]+$/]|is_unique[y_petani.username]',
			['is_unique' => 'This Already Exist.'
			]);
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");
			$this->form_validation->set_rules('pass1', 'Password', "required|min_length[5]");
			$this->form_validation->set_rules('pass2', 'Ketik Ulang Password', "required|matches[pass1]");
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', "required");
			$this->form_validation->set_rules('telp', 'Telp', "required|min_length[8]|numeric");
			$this->form_validation->set_rules('alamat', 'Alamat', "required|min_length[5]");

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'fullname' => $this->input->post('fullname', TRUE),
					'email' => $this->input->post('email', TRUE),
					'password' => password_hash($this->input->post('pass1', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
					'jk' => $this->input->post('jk', TRUE),
					'telp' => $this->input->post('telp', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'status' => 1
				);

				if ($this->aksiuser->insert('y_petani', $data)){
					$this->template->user('register');
				}else{
					echo '<script type="text/javascript">alert("Username / Email Tidak Tersedia");</script>';
				}
			}
		}

		if($this->session->userdata('user_login') == TRUE){
			redirect('home');
		}

		$data = array(
			'username' => $this->input->post('username', TRUE),
			'fullname' => $this->input->post('fullname', TRUE),
			'email' => $this->input->post('email', TRUE),
			'jk' => $this->input->post('jk', TRUE),
			'telp' => $this->input->post('telp', TRUE),
			'alamat' => $this->input->post('alamat', TRUE),
		);

		$this->template->user('register');
	}

	public function login(){
		if($this->input->post('submit') == 'submit'){
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			$cek = $this->aksiuser->get_where('y_petani', "username = '$username' && status = 1 || email = '$username' && status = 1");

			if($cek->num_rows() > 0){
				$data = $cek->row();

				if(password_verify($password, $data->password)){
					$datauser = array(
						'user_id' => $data->id_petani,
						'fullname' => $data->fullname,
						'alamat' => $data->alamat,
						'telp' => $data->telp,
						'email' => $data->email,
						'user_login' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('home');
				}else{
					$this->session->set_flashdata('alert', "Password Di Tolak");
				}
			}else{
				$this->session->set_flashdata('alert', "Username Tidak Dikenal");
			}
		}

		if($this->session->userdata('user_login') == TRUE){
			redirect('home');
		}

		$this->template->user('login');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}

}
