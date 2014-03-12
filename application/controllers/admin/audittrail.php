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
		unset($_SESSION['keyword']);
		unset($_SESSION['date1']);
		unset($_SESSION['date2']);
		$data['audit_trail'] = $this->audit_trail->getRecords("", "", "");
		$this->load->view('admin/audit_trail', $data);	
	}	
		
	public function submit() 
	{
		foreach ($this->input->post() as $key => $val)
			$this->audit_trail->deleteRecord($key);
		$_SESSION['msg'] = "Selected records deleted.";
		if(!isset($_SESSION['date1']))
			$_SESSION['date1'] = "";
		if(!isset($_SESSION['date2']))
			$_SESSION['date2'] = "";
		if(!isset($_SESSION['keyword']))
			$_SESSION['keyword'] = "";
		redirect('admin/audittrail/search', 'refresh');
	}
	
	public function search()	
	{
		$data = $this->session->userdata('logged_in');
		$data['SET'] = $this->SET_model->getRecords();
		if(empty($_POST))
		{
			$data['audit_trail'] = $this->audit_trail->getRecords($_SESSION['keyword'], $_SESSION['date1'], $_SESSION['date2']);
			$data['search']['keyword'] = $_SESSION['keyword'];
			$data['search']['date1'] = $_SESSION['date1'];
			$data['search']['date2'] = $_SESSION['date2'];
		}
		else
		{
			$data['audit_trail'] = $this->audit_trail->getRecords($this->input->post('keyword'), $this->input->post('date1'), $this->input->post('date2'));
			$_SESSION['keyword'] = $this->input->post("keyword");
			$_SESSION['date1'] = $this->input->post("date1");
			$_SESSION['date2'] = $this->input->post("date2");
			$data['search'] = $this->input->post();
		}
		$this->load->view('admin/audit_trail', $data);	
	}
}