<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportmanagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SET_model');
		$this->load->model('classes');
		$this->load->model('college');
		$this->load->model('report_per_class');
	}
	
	public function reportperclass()
	{
		$data = $this->session->userdata('logged_in');
		$data['records'] = $this->classes->getClassesForReport($data['user_college_code'], '', '');
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/report_per_class', $data);	
	}
	
	public function searchreportperclass()
	{
		$data = $this->session->userdata('logged_in');	
		$data['records'] = $this->classes->getClassesForReport($data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['search'] = $this->input->post();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/report_per_class', $data);	
	}
	
	public function reportperclassarchive()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$data['sem_ay'] = $this->report_per_class->getDistinctSemAY($data['user_college_code']);
		$data['records'] = $this->report_per_class->getRecords($data['user_college_code'], $data['SET']['semester'], '', '');
		$data['search']['sem_ay'] = $data['SET']['semester']; 
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$this->load->view('clerk/report_per_class_archive', $data);	
	}
	
	public function searchreportperclassarchive()
	{
		$data = $this->session->userdata('logged_in');	
		$data['SET']=$this->SET_model->getRecords();
		$data['records'] = $this->report_per_class->getRecords($data['user_college_code'], $this->input->post('sem_ay'), $this->input->post('subject'), $this->input->post('department'));
		$data['sem_ay'] = $this->report_per_class->getDistinctSemAY($data['user_college_code']);
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['search'] = $this->input->post();
		$this->load->view('clerk/report_per_class_archive', $data);	
	}
	
	public function reportperfaculty()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/report_per_faculty', $data);	
	}

}