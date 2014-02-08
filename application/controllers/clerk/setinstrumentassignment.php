<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setinstrumentassignment extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('classes');
		$this->load->model('SET_model');
		$this->load->model('college');
		$this->load->model('set_instrument');
	}
	
	public function index()
	{
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getActivatedClasses($data['user_college_code'], "", "");
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['instruments'] = $this->set_instrument->getRecords();
		unset($_SESSION['subject_keyword_setassign']);
		unset($_SESSION['department_keyword_setassign']);
		$this->load->view('clerk/set_instrument_assignment', $data);	
	}
	
	public function submit()
	{
		$post = array();
		foreach ($_POST as $key => $value)
		{
		    if($this->input->post($key) AND $key != "set_instrument");
			{
				$oset_class_id = $key;
				$data['set_instrument_id'] = $this->input->post('set_instrument');
				$this->classes->update($oset_class_id, $data);
			}
		}
		
		$_SESSION['msg'] = "SET instrument assignment saved.";
		redirect('clerk/setinstrumentassignment/search', 'refresh');
	}
	
	public function search()
	{	
		$data = $this->session->userdata('logged_in'); 
		
		if(!empty($_POST))
		{
			$data['records'] = $this->classes->getActivatedClasses($data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
			$data['search'] = $this->input->post();
			$_SESSION['subject_keyword_setassign'] = $this->input->post('subject');
			$_SESSION['department_keyword_setassign'] = $this->input->post('department');
		}
		else
		{
			$data['records'] = $this->classes->getActivatedClasses($data['user_college_code'], $_SESSION['subject_keyword_setassign'], $_SESSION['department_keyword_setassign']);
			$data['search']['subject'] = $_SESSION['subject_keyword_setassign']; 
			$data['search']['department'] = $_SESSION['department_keyword_setassign'];
		}
		
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['instruments'] = $this->set_instrument->getRecords();
		$this->load->view('clerk/set_instrument_assignment', $data);	
	}
}