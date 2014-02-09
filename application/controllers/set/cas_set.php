<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cas_set extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('classes');	
		$this->load->model('set/cas_set_model');	
	}

	public function index() 
	{
	}	
	
	public function preview()
	{
		$data = $this->session->userdata('logged_in');
		$this->load->model('SET_model'); 
		$data['SET'] = $this->SET_model->getRecords(); 
		$data['preview'] = true;
		$this->load->view('set/CAS_SET_view', $data);	
	}
	
	public function evaluate($oset_class_id)
	{
		$data = $this->session->userdata('logged_in');
		$data['preview'] = false;
		$data['class'] = $this->classes->getInformation($oset_class_id);
		$this->load->view('set/CAS_SET_view', $data);	
	}
	
	public function submit($oset_class_id)
	{
		//default fields
		$user_data = $this->session->userdata('logged_in');
		
		//other fields
		$data['student_id'] = $user_data['student_id'];
		$data['oset_class_id'] = $oset_class_id;
		
		if(!$this->cas_set_model->checkIfEvaluated($oset_class_id, $data['student_id']))
		{	
			//answer
			foreach($this->input->post() as $key => $val)
				$data[$key] = $val;
		
			$data['part2_5'] = $this->input->post('part2_5');
			$data['part2_6'] = $this->input->post('part2_6');
			$data['part2_7'] = $this->input->post('part2_7');
			$data['part2_8'] = $this->input->post('part2_8');
			
			for($i = 1; $i <= 39; $i++)
			{
				$data['part3_'.$i] = $this->input->post('part3_'.$i);
			}
			
			//insert to set table
			$this->cas_set_model->saveResponse($data);
			
			//compute score
			$score = 0;
			$countNR = 0;
			for ($i = 1; $i <= 39; $i++)
			{
				if($data['part3_'.$i] == 0) 
					$countNR++; 
				$score += $data['part3_'.$i]; 
			}
			$score /= (39 - $countNR);
			
			//save score
			$data2['student_id'] = $user_data['student_id'];
			$data2['score'] = $score;
			$data2['oset_class_id'] = $oset_class_id;
			$this->cas_set_model->saveScore($data2);
			
			$data3['evaluated'] = 1;
			$this->cas_set_model->updateEvalStatus($oset_class_id, $user_data['student_id'], $data3);
		}
		redirect("student/home", "refresh");	
	}
	
	public function createTable()
	{
		$this->cas_set_model->createTable();
		redirect('admin/setinstrumentmanagement', 'refresh');
	}
	
	public function generateReportPerClass($oset_class_id)
	{
		$this->load->helper('file');
		
		$class = $this->classes->getInformation($oset_class_id);
		$filename = './pdf/report_per_class/'.$class['instructor_code'].'-'.$class['class_id'].'.pdf';
		
		//if(!file_exists($filename))
		{
			//pdf		
			$this->load->helper(array('dompdf', 'file'));
			//pdf header
			$data = $this->cas_set_model->getReportPerClassData($class['oset_class_id']);
			$data['instructor'] = $class['instructor'];
			$data['subject'] = $class['subject'].'-'.$class['section'];
			$data['no_of_respondents'] = $class['no_of_respondents'];	
			$sem = substr($class['class_id'], 0, 4);
			$sem2 = $sem+1;
			$data['sem_ay'] = substr($class['class_id'], 4, 1).' / '.$sem.'-'.$sem2;		
				
			//archive report
			$html = $this->load->view('set/casset_detailedreport_view', $data, TRUE);
			//echo $html;
			$pdf_data = pdf_create($html, '' , FALSE);  
			write_file($filename, $pdf_data);
			
			//save to db	
			$data = array('course' =>	$class['subject'].'-'.$class['section'],
						  'sem_ay' => substr($class['class_id'], 0, 5), 
						  'instructor' => $class['instructor_code'], 
						  'pdf' => $filename);
			
			//$this->cas_set_model->saveReportPerClass($data);
		}
		//redirect(base_url($filename), 'refresh');
	}
	
}