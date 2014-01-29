<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportmanagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SET_model');
	}
	
	public function index()
	{
	
	 $this->load->view('set/upset_detailedreport_view');
	}
	
	public function generate()
	{
		$this->load->helper(array('dompdf', 'file'));
		$this->load->helper('file');
		
		$html = $this->load->view('set/upset_detailedreport_view', '', TRUE);
		echo $html;
		
		$pdf_data = pdf_create($html, '' , FALSE);  
		write_file('./pdf/detailedreport.pdf', $pdf_data);
	}
	
}