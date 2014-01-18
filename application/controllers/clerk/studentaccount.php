<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudentAccount extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SET_model');
		$this->load->model('student');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['records'] = $this->student->getRecords($data['user_college_code'], "");
		$data['SET']=$this->SET_model->getRecords();
		$_SESSION['student_keyword'] = "";
		$this->load->view('clerk/students_list', $data);	
	}	
	
	public function search()
	{	
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->student->getRecords($data['user_college_code'], $this->input->post('name'));
		$data['name'] = $this->input->post('name');
		$data['SET']=$this->SET_model->getRecords();
		$_SESSION['student_keyword'] = $this->input->post('name');
		$this->load->view('clerk/students_list', $data);	
	}
	
	public function viewclasses($student_ID)
	{
		$data = $this->session->userdata('logged_in');
		$data['student'] = $this->student->getInfo($student_ID);
		$data['classes'] = $this->student->getClasses($student_ID);
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/student_classlist', $data);	
	}
	
}