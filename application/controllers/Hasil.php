<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {
 	
 	function __construct()
 	{
		parent::__construct();
 		$this->load->library(array('template', 'form_validation'));
 		$this->load->model('aksiadmin');
 		$this->load->helper('tgl_indo');
 	}

	public function index()
	{
		$this->cek_login();
		$get = $this->aksiadmin->get_where('y_admin', array('id_admin' => $this->session->userdata('admin')))->row();

		$data['fullname'] = $get->fullname;

		$data['data'] = $this->aksiadmin->join_hasil();

		$data['title'] = "Hasil Konsultasi Petani";
		$this->template->admin('administrator/hasil_konsultasi.php', $data);
	}

	public function cetak()
	{
		$id_konsul = $this->uri->segment(3);
		$hasil = $this->aksiadmin->cetak(array('id_konsul' => $id_konsul));
		foreach ($hasil->result() as $key) {
			$data['id_penyakit'] = $key->id_penyakit;
			$data['id_konsul'] = $key->id_konsul;
			$data['nm_penyakit'] = $key->nm_penyakit;
			$data['solusi'] = $key->solusi;
			$data['ket_penyakit'] = $key->ket_penyakit;
			$data['tgl_konsul'] = $key->tgl_konsul;
			$data['hasil'] = $key->hasil;
			$data['fullname'] = $key->fullname;
			$data['alamat'] = $key->alamat;
			$data['jk'] = $key->jk;
		}
		$this->load->view('administrator/cetak', $data);
	}

 	function cek_login(){
		if(!$this->session->userdata('admin')){
			redirect('login');
		}
	}
}
