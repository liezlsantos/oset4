<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class classManagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('college');
		$this->load->model('classes');
		$this->load->model('SET_model');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['records']=$this->college->getRecords();
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('admin/download_classes', $data);	
	}	
	
	public function downloadClasses($college_code)
	{
		$this->classes->downloadClasses($college_code);
		redirect('admin/classmanagement', 'refresh');
	}
	
	public function redownloadClasses($college_code)
	{
		$this->classes->deleteByCollegeCode($college_code);
		$this->classes->downloadClasses($college_code);
		redirect('admin/classmanagement', 'refresh');
	}
	
}