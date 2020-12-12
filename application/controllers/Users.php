<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
 	
 	function __construct()
 	{
		parent::__construct();
 		$this->load->library(array('template', 'form_validation'));
 		$this->load->model('aksiadmin');
 	}

	public function index(){
	}

	public function petani()
	{
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;

		$data['data'] = $this->aksiadmin->get_all('y_petani');

		$data['title'] = "Daftar Petani";
		$this->template->admin('administrator/petani', $data);
	}

	public function status(){
		$this->cek_login();

		if(!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4))){
			redirect('users/petani');
		}

		$this->aksiadmin->update('y_petani', ['status' => $this->uri->segment(3)], ['id_petani' => $this->uri->segment(4)]);

		redirect('users/petani'); 
	}

	public function hapus_petani(){
 		if(!is_numeric($this->uri->segment(3))){
 			redirect('users/petani');
 		}

 		$this->aksiadmin->delete(['y_petani'], ['id_petani' => $this->uri->segment(3)]);

 		redirect('users/petani');
 	}

 	public function admin()
	{
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;

		$data['data'] = $this->aksiadmin->get_all('y_admin');

		$data['title'] = "Daftar Admin";
		$this->template->admin('administrator/admin', $data);
	}

	public function status_admin(){
		$this->cek_login();

		if(!is_numeric($this->uri->segment(3)) || !is_numeric($this->uri->segment(4))){
			redirect('users/admin');
		}

		$this->aksiadmin->update('y_admin', ['level' => $this->uri->segment(3)], ['id_admin' => $this->uri->segment(4)]);

		redirect('users/admin'); 
	}

	public function tambah_admin(){
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;

		if($this->input->post('submit', TRUE) == 'submit')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[5]|regex_match[/^[a-zA-Z0-9]+$/]|is_unique[y_admin.username]',
			['is_unique' => 'This Already Exist.'
			]);
			$this->form_validation->set_rules('password', 'Password', "required|min_length[5]");
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', "required|trim|min_length[3]|regex_match[/^[a-z A-Z.']+$/]");
			$this->form_validation->set_rules('email', 'Email', "required|valid_email");

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'username' => $this->input->post('username', TRUE),
					'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT, ['cost' => 10]),
					'fullname' => $this->input->post('fullname', TRUE),	
					'level' => 1,
					'email' => $this->input->post('email', TRUE)
				);

				$this->aksiadmin->insert('y_admin', $data);
				redirect('users/admin');
			}
		}

		if($this->session->userdata('user_login') == TRUE){
			redirect('users/admin');
		}

		$data = array(
			'username' => $this->input->post('username', TRUE),
			'password' => $this->input->post('password', TRUE),
			'fullname' => $this->input->post('fullname', TRUE),
			'email' => $this->input->post('email', TRUE)
		);

		$data['title'] = "Daftar Admin";
		$data['header'] = "Tambah gejala";
		$this->template->admin('administrator/admin_form', $data);
	}

	public function hapus_admin(){
 		if(!is_numeric($this->uri->segment(3))){
 			redirect('users/admin');
 		}

 		$this->aksiadmin->delete(['y_petani'], ['id_petani' => $this->uri->segment(3)]);

 		redirect('users/admin');
 	}

 	function cek_login(){
		if(!$this->session->userdata('admin')){
			redirect('login');
		}
	}
}
