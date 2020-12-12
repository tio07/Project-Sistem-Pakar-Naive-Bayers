<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
 	
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
		$data['title'] = "Dashboard";
		$this->template->admin('administrator/home', $data);
	}

	function cek_login(){
		if(!$this->session->userdata('admin')){
			redirect('login');
		}
	}
}
