<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rule extends CI_Controller {
 	
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

		$data['data'] = $this->aksiadmin->join3table();

		$data['title'] = "Rule";
		$this->template->admin('administrator/rule', $data);
	}

	public function tambah()
	{
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;

		if($this->input->post('submit', TRUE) == 'submit')
		{
			$this->form_validation->set_rules('id_penyakit', 'ID Penyakit', 'required');
			$this->form_validation->set_rules('id_gejala', 'ID Gejala', 'required');
			$this->form_validation->set_rules('prob', 'Probabilitas', 'required');

			if ($this->form_validation->run() == TRUE)
			{
				$rule = array(
					'id_penyakit' => $this->input->post('id_penyakit', TRUE),
					'id_gejala' => $this->input->post('id_gejala', TRUE),
					'prob' => $this->input->post('prob', TRUE),
				);

				$this->aksiadmin->insert('y_rule', $rule);

				redirect('rule');
			}
		}

		$data['id_penyakit'] = $this->input->post('id_penyakit', TRUE);
		$data['id_gejala'] = $this->input->post('id_gejala', TRUE);
		$data['prob'] = $this->input->post('prob', TRUE);

		$data['title'] = "Rule";

		$data['penyakit'] = $this->aksiadmin->get_all('y_penyakit');		
		$data['gejala'] = $this->aksiadmin->get_all('y_gejala');
		$data['header'] = "Tambah Rule";
		$this->template->admin('administrator/rule_form', $data);
	}

	public function edit(){
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;
		$id_rule = $this->uri->segment(3);

		if($this->input->post('submit', TRUE) == 'submit'){
			$this->form_validation->set_rules('id_penyakit', 'ID Penyakit', 'required');
			$this->form_validation->set_rules('id_gejala', 'ID Gejala', 'required');
			$this->form_validation->set_rules('prob', 'ID Gejala', 'required');

			if($this->form_validation->run() == TRUE){

				$rule = array(
					'id_penyakit' => $this->input->post('id_penyakit', TRUE),
					'id_gejala' => $this->input->post('id_gejala', TRUE),
					'prob' => $this->input->post('prob', TRUE),
				);

				$this->aksiadmin->update('y_rule', $rule, array('id_rule' => $id_rule));

				redirect('rule');		
			}
		}

		$rule = $this->aksiadmin->get_where('y_rule', array('id_rule' => $id_rule));

		foreach ($rule->result() as $key) {
			$data['id_penyakit'] = $key->id_penyakit;
			$data['id_gejala'] = $key->id_gejala;
			$data['prob'] = $key->prob;
		}

		$data['title'] = "Rule Penyakit";
 		$data['header'] = "Edit Data Rule";

 		$data['penyakit'] = $this->aksiadmin->get_all('y_penyakit');		
		$data['gejala'] = $this->aksiadmin->get_all('y_gejala');
		$this->template->admin('administrator/rule_form', $data);
	}

	public function hapus(){
 		if(!is_numeric($this->uri->segment(3))){
 			redirect('rule');
 		}

 		$this->aksiadmin->delete(['y_rule'], ['id_rule' => $this->uri->segment(3)]);

 		redirect('rule');
 	}

 	function cek_login(){
		if(!$this->session->userdata('admin')){
			redirect('login');
		}
	}
}
