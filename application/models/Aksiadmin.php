<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aksiadmin extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function insert($table = '', $data = ''){
		$this->db->insert($table, $data);
	}

	function get_all($table){
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table=null, $where=null){
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function update($table=null, $data=null, $where=null){
		$this->db->update($table, $data, $where);
	}

	function delete($table=null, $where=null){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function join3table(){
      $this->db->select('*');
      $this->db->from('y_rule');
      $this->db->join('y_penyakit','y_rule.id_penyakit = y_penyakit.id_penyakit','LEFT');      
      $this->db->join('y_gejala','y_rule.id_gejala = y_gejala.id_gejala','LEFT');
      $query = $this->db->get();
      return $query;
   }

   function join_hasil(){
      $this->db->select('*');
      $this->db->from('y_konsultasi');
      $this->db->join('y_penyakit','y_konsultasi.id_penyakit = y_penyakit.id_penyakit','LEFT');      
      $this->db->join('y_petani','y_konsultasi.id_petani = y_petani.id_petani','LEFT');

      $query = $this->db->get();
      return $query;
   }

   function cetak($where = null){
      $this->db->select('*');
      $this->db->from('y_konsultasi');
      $this->db->join('y_penyakit','y_konsultasi.id_penyakit = y_penyakit.id_penyakit','LEFT');      
      $this->db->join('y_petani','y_konsultasi.id_petani = y_petani.id_petani','LEFT');
      $this->db->where($where);
      
      $query = $this->db->get();
      return $query;
   }

}