<?php

class fwrite extends CI_Controller {
	public function index()
	{
		$this->load->helper('file');
		$data = 'Ramadhan Rosihadi';
		if(!write_file('data/certificate/test.crt',$data)){
			echo 'Unable to write the file';
		}
		else{
			echo 'File written!';
		}
	}
}
