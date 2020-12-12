<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gejala extends CI_Controller {
 	
 	function __construct()
 	{
		parent::__construct();
 		$this->load->library(array('template', 'form_validation'));
 		$this->load->model('aksiadmin');
 	}

	public function index()
	{
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;
		$data['data'] = $this->aksiadmin->get_all('y_gejala');

		$data['title'] = "Gejala Penyakit";
		$this->template->admin('administrator/gejala', $data);
	}

	public function tambah()
	{
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;
		if($this->input->post('submit', TRUE) == 'submit')
		{

			$this->form_validation->set_rules('id_gejala', 'Kode Gejala', 'required');
			$this->form_validation->set_rules('nm_gejala', 'Nama Gejala', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$gejala = array(
					'id_gejala' => $this->input->post('id_gejala', TRUE),
					'nm_gejala' => $this->input->post('nm_gejala', TRUE),
				);

				$this->aksiadmin->insert('y_gejala', $gejala);

				redirect('gejala');
			}
		}

		$data['id_gejala'] = $this->input->post('id_gejala', TRUE);
		$data['nm_gejala'] = $this->input->post('nm_gejala', TRUE);

		$data['title'] = "Gejala Penyakit";
		$data['header'] = "Tambah gejala";
		$this->template->admin('administrator/gejala_form', $data);
	}

	public function edit(){
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;
		$id_gejala = $this->uri->segment(3);

		if($this->input->post('submit', TRUE) == 'submit'){
			$this->form_validation->set_rules('id_gejala', 'Kode gejala', 'required');
			$this->form_validation->set_rules('nm_gejala', 'Nama gejala', 'required');

			if($this->form_validation->run() == TRUE){

				$gejala = array(
					'id_gejala' => $this->input->post('id_gejala', TRUE),
					'nm_gejala' => $this->input->post('nm_gejala', TRUE),
				);

				$this->aksiadmin->update('y_gejala', $gejala, array('id_gejala' => $id_gejala));

				redirect('gejala');		
			}
		}

		$gejala = $this->aksiadmin->get_where('y_gejala', array('id_gejala' => $id_gejala));

		foreach ($gejala->result() as $key) {
			$data['id_gejala'] = $key->id_gejala;
			$data['nm_gejala'] = $key->nm_gejala;
		}

		$data['title'] = "Gejala Penyakit";
 		$data['header'] = "Edit Data gejala";

		$this->template->admin('administrator/gejala_form', $data);
	}

	public function hapus(){
 		if(!is_numeric($this->uri->segment(3))){
 			redirect('gejala');
 		}

 		$this->aksiadmin->delete(['y_gejala'], ['id_gejala' => $this->uri->segment(3)]);

 		redirect('gejala');
 	}

 	function cek_login(){
		if(!$this->session->userdata('admin')){
			redirect('login');
		}
	}
}
