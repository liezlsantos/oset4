<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index() 
	{
		if($this->session->userdata('logged_in'))
		{
			$data = $this->session->userdata('logged_in');
			if(isset($data['student_id']))
				redirect("student/home", "refresh");
			else
			{
				$this->load->model('SET_model');
				$data['SET']=$this->SET_model->getRecords();
				$this->load->view('home', $data);
			}
		}
		else
			redirect("login","refresh");
	}	
	
	public function errordatabase() 
	{
		$data = $this->session->userdata('logged_in');
		$this->load->model('SET_model');
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('admin/error_database', $data);
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('login', 'refresh');
	}
		
}