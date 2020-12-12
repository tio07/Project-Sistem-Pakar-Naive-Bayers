<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {

 	function __construct()
 	{
		parent::__construct();
 		$this->load->library(array('template', 'form_validation'));
 		$this->load->model('aksiuser');
 		$this->load->helper('tgl_indo');
 	}

	public function index()
	{
		if(!$this->session->userdata('user_login')){
			redirect('home/login');
		}

		$this->template->user('konsultasi');
	}

	public function pertanyaan(){
		if(!$this->session->userdata('user_login')){
			redirect('home/login');
		}

		if($this->input->post('submit', TRUE) == 'submit')
		{
			$gejala = $this->input->post('gejala[]');	

			$jml = count($gejala);
			for ($i=0;$i<$jml;$i++){
				$rule = array(
					'id_gejala' => $gejala[$i],
				);

				$this->aksiuser->insert('y_konsul', $rule);
				
			}
			redirect('konsultasi/hasil');
		}

		$data['data'] = $this->aksiuser->get_all('y_gejala');

		$this->template->user('pertanyaan', $data);	
	}

	public function hasil(){
		if(!$this->session->userdata('user_login')){
			redirect('home/login');
		}

		$gejala = $this->aksiuser->count('y_gejala');
		$penyakit = $this->aksiuser->count('y_penyakit');
		$n = 1/$penyakit;
		$sql= $this->aksiuser->join2table();
		$x1 = 0.2;
		$x2 = 0.2;
		$x3 = 0.2;
		$x4 = 0.2;
		$x5 = 0.2;
		while ($key = $sql->unbuffered_row()) {
			$prob = $key->prob;
			$id_penyakit = $key->id_penyakit;
			$id_gejala = $key->id_gejala;

			if($id_penyakit == "PKS1"){
				$data1 = ($prob+$gejala)*$n/(1+$gejala);
				$dat1 = round($data1,2);
				$x1 = $x1*$dat1;
			}

			if($id_penyakit == "PKS2"){
				$data2 = ($prob+$gejala)*$n/(1+$gejala);
				$dat2 = round($data2,2);
				$x2 = $x2*$dat2;
			}
			if($id_penyakit == "PKS3"){
				$data3 = ($prob+$gejala)*$n/(1+$gejala);
				$dat3 = round($data3,2);
				$x3 = $x3*$dat3;
			}
			if($id_penyakit == "PKS4"){
				$data4 = ($prob+$gejala)*$n/(1+$gejala);
				$dat4 = round($data4,2);
				$x4 = $x4*$dat4;
			}
			if($id_penyakit == "PKS5"){
				$data5 = ($prob+$gejala)*$n/(1+$gejala);
				$dat5 = round($data5,2);
				$x5 = $x5*$dat5;
			}
			
		}

		$x1 = $x1;
		$x2 = $x2;
		$x3 = $x3;
		$x4 = $x4;
		$x5 = $x5;

		$hasil = $x1;
		$id_penyakit = "PKS1";
		$nm_penyakit = "Penyakit Busuk Pangkal Batang";

		if ($x2 >= $x1 && $x2 >= $x3 && $x2 >= $x4 && $x2 >= $x5){
			$hasil = $x2;
			$id_penyakit = "PKS2";
			$nm_penyakit = "Penyakit Busuk Tandan";
		}

		if ($x3 >= $x1 && $x3 >= $x2 && $x3 >= $x4 && $x3 >= $x5){
			$hasil = $x3;
		
			$id_penyakit = "PKS3";
			$nm_penyakit = "Penyakit Akar Blast Disease";
		}
		if ($x4 >= $x1 && $x4 >= $x2 && $x4 >= $x3 && $x4 >= $x5){
			$hasil = $x4;
			$id_penyakit = "PKS4";
			$nm_penyakit = "Penyakit Batang Dry Basal Rot";
		}
		if ($x5 >= $x1 && $x5 >= $x2 && $x5 >= $x3 && $x5 >= $x4){
			$hasil = $x5;
			$id_penyakit = "PKS5";
			$nm_penyakit = "Penyakit Busuk Pupus";
		}
		
		//jika jawaban bernilai tidak semuanya
		if ($x1 == 0 && $x2 == 0 && $x3 == 0 && $x4 == 0 && $x5 == 0){
			$id_penyakit = "PKS0";
			$x1 *= 0;
			$x2 *= 0;
			$x3 *= 0;
			$x4 *= 0;
			$x5 *= 0;
			$nm_penyakit = "Tanaman Anda Negatif Penyakit";
		}

		$data['x1'] = $x1;
		$data['x2'] = $x2;
		$data['x3'] = $x3;
		$data['x4'] = $x4;
		$data['x5'] = $x5;
		$data['hasil'] = $hasil;

		$sakit = $this->aksiuser->get_where('y_penyakit', array('id_penyakit' => $id_penyakit));
		foreach ($sakit->result() as $key) {
			$data['id_penyakit'] = $key->id_penyakit;
			$data['nm_penyakit'] = $key->nm_penyakit;
			$data['solusi'] = $key->solusi;
			$data['ket_penyakit'] = $key->ket_penyakit;
		}

		$this->template->user('hasil', $data);
	}


	public function proses(){

		$id_petani = $this->input->post('id_petani', TRUE);
		$tgl_konsul = $this->input->post('tgl_konsul', TRUE);
		$hasil = $this->input->post('hasil', TRUE);
		$id_penyakit = $this->input->post('id_penyakit', TRUE);

		if($this->input->post('submit', TRUE) == 'submit')
		{
			$data = array(
				'id_petani' => $id_petani,
				'id_penyakit' => $id_penyakit,
				'hasil' => $hasil,
				'tgl_konsul' => $tgl_konsul,
			);
			$this->aksiuser->insert('y_konsultasi', $data);
			$this->aksiuser->delete(['y_konsul'], ['id_konsul']);
		}

		redirect('konsultasi/cetak_hasil');

	}

	public function cetak_hasil(){
		
		$sakit = $this->aksiuser->penyakit();
		foreach ($sakit->result() as $key) {
			$data['id_penyakit'] = $key->id_penyakit;
			$data['nm_penyakit'] = $key->nm_penyakit;
			$data['solusi'] = $key->solusi;
			$data['ket_penyakit'] = $key->ket_penyakit;
			$data['tgl_konsul'] = $key->tgl_konsul;
			$data['hasil'] = $key->hasil;
		}

		$this->load->view('cetak_hasil',$data);	
	}


}
