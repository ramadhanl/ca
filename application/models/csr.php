<?php
class csr extends CI_Model{
	function __construct() {
		parent::__construct();
	}
	
	public function add_csr($data){
		$this->db->insert("csr",$data);
	}
	public function sign_csr($data){
		$this->db->update("csr",$data);
	}

	public function list_csr($data){
		$this->load->database();
		$query = $this->db->get('csr');
		return $query->result();
	}
}