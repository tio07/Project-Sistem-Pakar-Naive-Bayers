<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('aksiadmin');
	}

	public function index(){
		//echo password_hash('admin', PASSWORD_DEFAULT, ['cost' => 10]);
		if ($this->input->post('submit') == 'submit') {
			$user = $this->input->post('username', TRUE);
			$pass = $this->input->post('password', TRUE);

			$cek = $this->aksiadmin->get_where('y_admin', array('username' => $user));

			if ($cek->num_rows() > 0) {
				$data = $cek->row();

				if(password_verify($pass, $data->password)){
					$datauser = array(
						'admin' => $data->id_admin,
						'username' => $data->fullname,
						'level' => $data->level,
						'login' => TRUE
					);

					$this->session->set_userdata($datauser);

					redirect('admin');
				}else{
					$this->session->set_flashdata('alert', "Password Anda Salah");
				}
			}else{
				$this->session->set_flashdata('alert', "Username Ditolak");
			}
		}

		if($this->session->userdata('login') == TRUE){
			redirect('admin');
		}

		$this->load->view('administrator/login');
	}

	function logout(){
		$this->session->sess_destroy();

		redirect('login');
	}
}