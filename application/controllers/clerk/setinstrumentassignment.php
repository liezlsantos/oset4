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
		$this->load->view('clerk/set_instrument_assignment', $data);	
	}
	
	/*public function edit($oset_class_id)
	{
		$data = $this->session->userdata('logged_in');
		$data['class'] = $this->classes->getInformation($oset_class_id);
		$this->load->model('set_instrument');
		$data['set'] = $this->set_instrument->getRecords();
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/edit_set_instrument', $data);		
	}
	
	public function update($oset_class_id)
	{
		$data['set_instrument_id'] = $this->input->post('set_instrument');
		$this->classes->update($oset_class_id, $data);
		redirect('clerk/setinstrumentassignment', 'refresh');		
	}*/
	
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
		redirect('clerk/setinstrumentassignment', 'refresh');
	}
	
	public function search()
	{	
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getActivatedClasses($data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['search'] = $this->input->post();
		$data['instruments'] = $this->set_instrument->getRecords();
		$this->load->view('clerk/set_instrument_assignment', $data);	
	}
}