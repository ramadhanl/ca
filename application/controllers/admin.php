<?php

class Admin extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('nama')!= NULL)
			$this->load->view('admin_home');
		else
			redirect(base_url("home/login/"));
	}
	public function list_csr()
	{
		$this->load->view('admin_list_csr');

	}

	public function del_csr($id)
	{
		$mysqli = new mysqli('localhost','root','','ca');
	    $sql = "UPDATE csr SET status = 'aborted'  where id='$id'";
	    $mysqli->query($sql);
		$this->load->view('admin_list_csr');
	}

	public function acc_csr($id){
		include('include/File/X509.php');
		include('include/Crypt/RSA.php');
		$mysqli = new mysqli('localhost','root','','ca');
	    $sql = "SELECT * from csr where id='$id'";
	    $result = $mysqli->query($sql);
	    $row = $result->fetch_array(MYSQLI_BOTH);
	    // create private key for CA cert
		$CAPrivKey = new Crypt_RSA();
		extract($CAPrivKey->createKey());
		$CAPrivKey->loadKey($privatekey);

		$pubKey = new Crypt_RSA();
		$pubKey->loadKey($publickey);
		$pubKey->setPublicKey();
		//echo "the private key for the CA cert (can be discarded):\r\n\r\n";
		//echo $privatekey;
		//echo "\r\n\r\n";

		// create a self-signed cert that'll serve as the CA
		$subject = new File_X509();
		$subject->setDNProp('id-at-countryName', "Indonesia");
		$subject->setDNProp('id-at-organizationName', "Deni-Hafi-Iqbal-Didit");
		$subject->setDNProp('id-at-organizationalUnitName', "KIJ - Pak Bas");
		$subject->setDNProp('id-at-commonName', "Deni-Hafi-Iqbal-Didit");
		$subject->setPublicKey($pubKey);

		$issuer = new File_X509();
		$issuer->setPrivateKey($CAPrivKey);
		$issuer->setDN($CASubject = $subject->getDN());

		$x509 = new File_X509();
		$x509->makeCA();

		$result = $x509->sign($issuer, $subject);
		//echo "the CA cert to be imported into the browser is as follows:\r\n\r\n";
		//echo $x509->saveX509($result);
		$ca_cert = $x509->saveX509($result);
		/*$this->load->database();
		$this->load->model("csr");
		$data = array(
			"privkey" => $privatekey,
			"pubkey" => $publickey,
			"certificate" => $ca_cert,
			"status" => "signed");
		$this->load->database();
		$this->csr->sign_csr($data);*/

		$mysqli = new mysqli('localhost','root','','ca');
	    $sql = "UPDATE csr SET privkey='$privatekey',pubkey = '$publickey',certificate = '$ca_cert',status = 'signed'  where id='$id'";
	    $mysqli->query($sql);

		$this->load->helper('file');
		$data = $ca_cert;
		if(!write_file('data/certificate/'.$row['username'].'-'.$id.'.crt',$data)){
			echo 'Unable to write the file';
		}
		else{
			echo 'File written!';
		}
		redirect(base_url("admin"));

	}

	public function register()
	{
		$this->load->view('register');
	}
	public function register_proses()
	{
		$this->load->model("user");
		$data = array(
			"username" => $this->input->post('username'),
			"nama" => $this->input->post('nama'),
			"password" => $this->input->post('password')
			);
		$this->load->database();
		$this->user->add_user($data);
		redirect(base_url("home/login/"));
	}
	public function login()
	{
		$this->load->view('login');
	}
	public function login_proses()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->load->model("user");
		$this->load->database();
		$result = $this->user->login($username, $password);
 		if($result)
		   {
		     $sess_array = array();
		     foreach($result as $row)
		     {
		       $sess_array = array(
		         'username' => $row->username,
		         'nama' => $row->nama,
		         'password' => $row->password
		       );
		       $this->session->set_userdata($sess_array);
		     }
		     redirect(base_url(""));
		     return TRUE;
		   }
	   else
	   {
	     $this->form_validation->set_message('check_database', 'Invalid username or password');
	     redirect(base_url("home/login/"));
	     return false;
	   }
		
	}
	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('nama');
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
