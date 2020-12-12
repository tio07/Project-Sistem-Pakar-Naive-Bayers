<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aksiuser extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function insert($table = '', $data= ''){
		return $this->db->insert($table, $data);
	}

	function get_all($table){
		$this->db->from($table);

		return $this->db->get();
	}

	function get_where($table = null, $where = null){
		$this->db->from($table);
		$this->db->where($where);

		return $this->db->get();
	}

	function get_solusi(){
		$this->db->from('y_penyakit');
		$this->db->where('solusi');

		return $this->db->get();
	}

	function update($table = null, $data = null, $where = null){
		$this->db->update($table, $data, $where);
	}

	function delete($table = null, $where = null){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function join2table(){
      $this->db->select('*');
      $this->db->from('y_konsul');
      $this->db->join('y_rule','y_rule.id_gejala = y_konsul.id_gejala','LEFT');
      $query = $this->db->get();
      return $query;
   }

   function test($id){
      $this->db->select('*');
      $this->db->from('y_test');
      $this->db->join('y_petani','y_test.id_petani = y_petani.id_petani','LEFT');
      $this->db->order_by('y_test.id_test', 'DESC' );
      $query = $this->db->get();
      return $query;
   }

   function get_where_join($table, $where){

      $this->db->join('y_penyakit', $table.'.id_penyakit=y_penyakit.id_penyakit');

      return $this->db->get_where($table, $where);
	}

	function count($table=''){
		return $this->db->count_all($table);
	}

	function penyakit(){
      $this->db->select('*');
      $this->db->from('y_konsultasi');
      $this->db->join('y_penyakit','y_penyakit.id_penyakit = y_konsultasi.id_penyakit','LEFT');
      $query = $this->db->get();
      return $query;
   }

   function get_penyakit($where = null){
      $this->db->select('*');
      $this->db->from('y_konsultasi');
      $this->db->join('y_penyakit','y_penyakit.id_penyakit = y_konsultasi.id_penyakit');
      $this->db->where($where);
      
      $query = $this->db->get();
      return $query;
   }

   function get_riwayat($where = null){
      $this->db->select('*');
      $this->db->from('y_konsultasi');
      $this->db->join('y_penyakit','y_penyakit.id_penyakit = y_konsultasi.id_penyakit', 'LEFT');
      $this->db->join('y_petani','y_petani.id_petani = y_konsultasi.id_petani', 'LEFT');
      $this->db->where($where);
      
      $query = $this->db->get();
      return $query;
   }
}