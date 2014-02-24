<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Audittrail extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('audit_trail');
		$this->load->model('SET_model');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['SET'] = $this->SET_model->getRecords();
		$data['audit_trail'] = $this->audit_trail->getRecords("", "", "");
		$this->load->view('admin/audit_trail', $data);	
	}	
		
	public function submit() 
	{
		foreach ($this->input->post() as $key => $val)
			$this->audit_trail->deleteRecord($key);
		$_SESSION['msg'] = "Selected records deleted.";
		redirect('admin/audittrail', 'refresh');
	}
	
	public function search()	
	{
		$data = $this->session->userdata('logged_in');
		$data['SET'] = $this->SET_model->getRecords();
		$data['audit_trail'] = $this->audit_trail->getRecords($this->input->post('keyword'), $this->input->post('date1'), $this->input->post('date2'));
		$data['search'] = $this->input->post();
		$this->load->view('admin/audit_trail', $data);	
	}
}