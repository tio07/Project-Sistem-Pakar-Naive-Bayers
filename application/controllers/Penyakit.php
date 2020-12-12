<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyakit extends CI_Controller {
 	
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
		$data['data'] = $this->aksiadmin->get_all('y_penyakit');

		$data['title'] = "Penyakit";
		$this->template->admin('administrator/penyakit', $data);
	}

	public function tambah()
	{
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;
		if($this->input->post('submit', TRUE) == 'submit')
		{

			$this->form_validation->set_rules('id_penyakit', 'Kode Penyakit', 'required');
			$this->form_validation->set_rules('nm_penyakit', 'Nama Penyakit', 'required');
			$this->form_validation->set_rules('ket_penyakit', 'Keterangan Penyakit', 'required');
			$this->form_validation->set_rules('solusi', 'Solusi', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$penyakit = array(
					'id_penyakit' => $this->input->post('id_penyakit', TRUE),
					'nm_penyakit' => $this->input->post('nm_penyakit', TRUE),
					'ket_penyakit' => $this->input->post('ket_penyakit', TRUE),
					'solusi' => $this->input->post('solusi', TRUE),
				);

				$this->aksiadmin->insert('y_penyakit', $penyakit);

				redirect('penyakit');
			}
		}

		$data['id_penyakit'] = $this->input->post('id_penyakit', TRUE);
		$data['nm_penyakit'] = $this->input->post('nm_penyakit', TRUE);
		$data['ket_penyakit'] = $this->input->post('ket_penyakit', TRUE);
		$data['solusi'] = $this->input->post('solusi', TRUE);

		$data['title'] = "Penyakit";
		$data['header'] = "Tambah Penyakit";
		$this->template->admin('administrator/penyakit_form', $data);
	}

	public function edit(){
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;
		$id_penyakit = $this->uri->segment(3);

		if($this->input->post('submit', TRUE) == 'submit'){
			$this->form_validation->set_rules('id_penyakit', 'Kode Penyakit', 'required');
			$this->form_validation->set_rules('nm_penyakit', 'Nama Penyakit', 'required');
			$this->form_validation->set_rules('ket_penyakit', 'Keterangan Penyakit', 'required');
			$this->form_validation->set_rules('solusi', 'Solusi', 'required');

			if($this->form_validation->run() == TRUE){

				$penyakit = array(
					'id_penyakit' => $this->input->post('id_penyakit', TRUE),
					'nm_penyakit' => $this->input->post('nm_penyakit', TRUE),
					'ket_penyakit' => $this->input->post('ket_penyakit', TRUE),
					'solusi' => $this->input->post('solusi', TRUE),
				);

				$this->aksiadmin->update('y_penyakit', $penyakit, array('id_penyakit' => $id_penyakit));

				redirect('penyakit');		
			}
		}

		$penyakit = $this->aksiadmin->get_where('y_penyakit', array('id_penyakit' => $id_penyakit));

		foreach ($penyakit->result() as $key) {
			$data['id_penyakit'] = $key->id_penyakit;
			$data['nm_penyakit'] = $key->nm_penyakit;
			$data['ket_penyakit'] = $key->ket_penyakit;
			$data['solusi'] = $key->solusi;
		}

		$data['title'] = "Penyakit";
 		$data['header'] = "Edit Data Penyakit";

		$this->template->admin('administrator/penyakit_form', $data);
	}

	public function hapus(){
 		if(!is_numeric($this->uri->segment(3))){
 			redirect('penyakit');
 		}

 		$this->aksiadmin->delete(['y_penyakit'], ['id_penyakit' => $this->uri->segment(3)]);

 		redirect('penyakit');
 	}

 	function cek_login(){
		if(!$this->session->userdata('admin')){
			redirect('login');
		}
	}
}
