<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportmanagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SET_model');
		$this->load->model('classes');
		$this->load->model('college');
	}
	
	public function searchreportperclass()
	{
		$data = $this->session->userdata('logged_in');
		
		$data['records'] = $this->classes->getClassesForReport($data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['search'] = $this->input->post();
		$_SESSION['subject_keyword_report'] = $this->input->post('subject');
		$_SESSION['department_keyword_report'] = $this->input->post('department');
		
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/report_per_class', $data);	
	}
	
	public function reportperclass()
	{
		$data = $this->session->userdata('logged_in');
		$data['records'] = $this->classes->getClassesForReport($data['user_college_code'], '', '');
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['SET']=$this->SET_model->getRecords();
		unset($_SESSION['subject_keyword_report']);
		unset($_SESSION['department_keyword_report']);
		$this->load->view('clerk/report_per_class', $data);	
	}
	
	public function reportperfaculty()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/report_per_faculty', $data);	
	}

}