<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['records'] = $this->student->getClassesToEvaluate($data['student_id']);
		$this->load->view('student/class_list', $data);
	}	
		
}