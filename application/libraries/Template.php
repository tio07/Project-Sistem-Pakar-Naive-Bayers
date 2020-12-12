<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template{

	function __construct(){
		$this->ci =&get_instance();
	}

	function admin($template, $data=''){
		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		$data['nav'] = $this->ci->load->view('administrator/nav', $data, TRUE);
		
		$this->ci->load->view('administrator/dashboard', $data);	
	}

	function user($template, $data=''){

		$data['content'] = $this->ci->load->view($template, $data, TRUE);
		
		$this->ci->load->view('index', $data);	
	}

}