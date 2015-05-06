<?php

class Home extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('nama')!= NULL)
			$this->load->view('home');
		else
			redirect(base_url("home/login/"));
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
