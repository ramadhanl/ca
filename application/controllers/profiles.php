<?php
class Profiles extends CI_Controller {
	public function index()
	{
		$this->load->model("user");
		$this->load->database();
		$result = $this->user->get_info($this->session->userdata('username'));
		$data['nama'] =  $result->nama;
		$data['password'] =  $result->password;
		$data['error'] =  "";
		$this->load->view('profiles',$data);
	}
	public function update()
	{
		$this->load->model("user");
		$data = array(
			"nama" => $this->input->post('nama'),
			"password" => $this->input->post('password')
			);
		$this->load->database();
		$this->user->update_user($data);
		$config['upload_path'] = 'C:/xampp/htdocs/quiz/assets/img/profile_pict/';
		$config['allowed_types'] = 'jpg';
		$config['max_size']	= '300';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite']  = TRUE;
		$file = $_FILES['userfile']['name'];
		$ext = substr(strrchr($file, '.'), 1);
		$new_name = $this->session->userdata('username').".$ext";
		$config['file_name'] = $new_name;
		$config['convert_dots'] = FALSE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload()){
			$this->load->model("user");
			$this->load->database();
			$result = $this->user->get_info($this->session->userdata('username'));
			$data['nama'] =  $result->nama;
			$data['password'] =  $result->password;
			$data['error'] =  $this->upload->display_errors();
			$this->load->view('profiles',$data);
		}
		else{
			$file_data = $this->upload->data();
			$data['img'] = base_url().'images/'.$file_data['file_name'];
			$this->load->model("user");
			$this->load->database();
			$result = $this->user->get_info($this->session->userdata('username'));
			$data['nama'] =  $result->nama;
			$data['password'] =  $result->password;
			$data['error'] =  "Uploaded";
			$this->load->view('profiles',$data);
		}
		//$this->session->userdata('nama');
       $sess_array = array(
         'username' => $this->session->userdata('username'),
         'nama' => $this->input->post('nama'),
         'password' => $this->input->post('password')
       );
       $this->session->set_userdata($sess_array);
		
		redirect(base_url("profiles"));
	}
	public function upload()
	{
		$config['upload_path'] = 'C:/xampp/htdocs/quiz/images/';
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
		$new_name = $this->session->userdata('username');
		echo $new_name;
		//$config['file_name'] = $new_name;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload()){
			$error = array('error'=>$this->upload->display_errors());
			//$this->load->view('main_view',$error);
		}
		else{
			$file_data = $this->upload->data();
			$data['img'] = base_url().'images/'.$file_data['file_name'];
			//$this->load->view('success_msg',$data);
		}
		redirect(base_url("profiles"));
	}
}
