<?php

class list_csr extends CI_Controller {
	public function index()
	{
		$this->load->view('list_csr');

	}
	public function certificate($id)
	{
		$mysqli = new mysqli('localhost','root','','ca');
	    $sql = "SELECT * from csr";
	    $count = 0;
	    $result = $mysqli->query($sql);
	    $row = $result->fetch_array(MYSQLI_BOTH);
	    $data['certificate'] = $row['certificate'];
	    //echo $certificate;
		$this->load->view('certificate',$data);
	}
}

?>
