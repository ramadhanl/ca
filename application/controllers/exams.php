<?php
class Exams extends CI_Controller {
	public function index()
	{
		$this->load->view('home');
	}
	public function available_exams()
	{
		$this->load->view('available_exams');
	}
	public function myresults()
	{
		$this->load->view('myresults');
	}
	public function statistics()
	{
		$this->load->view('statistics');
	}
	public function rangkings()
	{
		$this->load->view('rangkings');
	}
}
