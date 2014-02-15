<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SET extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SET_model');
		$this->load->model('classes');
		$this->load->model('college');
		$this->load->model('student');
		$this->load->model('faculty');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('admin/SET', $data);	
	}	
		
	public function submit() 
	{
		$data['sem_ay'] = $this->input->post('academic_year').$this->input->post('semester');
		$this->SET_model->updateSETstatus($data);
		
		$this->classes->deleteAll();
		$this->faculty->deleteAll();
		$this->college->resetDownloadStatus();
		$this->student->deleteAll();
		$this->SET_model->resetSET();
		
		redirect('admin/SET', 'refresh');
	}	
}