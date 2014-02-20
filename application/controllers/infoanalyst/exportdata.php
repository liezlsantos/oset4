<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportdata extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SET_model');
		$this->load->model('set_instrument');
		$this->load->model('archive_tables');
		$this->load->model('college');
		$this->load->model('department');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['SET'] = $this->SET_model->getRecords();
		$data['records'] = $this->set_instrument->getRecords();
		$this->load->view('infoanalyst/set_instrument_list', $data);	
	}	
	
	public function search($set_id)
	{
		$data = $this->session->userdata('logged_in');
		$data['SET'] = $this->SET_model->getRecords();
		$data['archive_table'] = $this->set_instrument->getInfo($set_id)->table_name."_archive"; 
		$data['sem_ay'] = $this->archive_tables->getDistinctSemAY($data['archive_table']);
		$data['colleges'] = $this->college->getRecords();
		$data['departments'] = $this->department->getRecords();
		$this->load->view('infoanalyst/search', $data);	
	}	
	
	public function submit($archive_table)
	{
		$data = $this->session->userdata('logged_in');
		$data['SET'] = $this->SET_model->getRecords();
		$data['archive_table'] = $archive_table; 
		$data['sem_ay'] = $this->archive_tables->getDistinctSemAY($data['archive_table']);
		$data['colleges'] = $this->college->getRecords();
		$data['departments'] = $this->department->getRecords();
		
		$data['records'] = $this->archive_tables->search($archive_table, $this->input->post('sem_ay'), $this->input->post('college'), 
												 $this->input->post('department'), $this->input->post('subject'));
		$data['search'] = $this->input->post();
		$this->load->view('infoanalyst/search', $data);												 
	}
}