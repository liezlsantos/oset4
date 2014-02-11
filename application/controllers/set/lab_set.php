<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lab_set extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('classes');
		$this->load->model('report_per_class');	
		$this->load->model('set/lab_set_model');	
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
		$this->load->view('set/LAB_SET_view', $data);	
	}
	
	public function evaluate($oset_class_id)
	{
		$data = $this->session->userdata('logged_in');
		$data['preview'] = false;
		$data['class'] = $this->classes->getInformation($oset_class_id);
		$this->load->view('set/LAB_SET_view', $data);	
	}
	
	public function submit($oset_class_id)
	{
		//default fields
		$user_data = $this->session->userdata('logged_in');
		
		//response
		$data['student_id'] = $user_data['student_id'];
		$data['oset_class_id'] = $oset_class_id;
		
		if(!$this->lab_set_model->checkIfEvaluated($oset_class_id, $data['student_id']))
		{
			//part 1
			$data['part1_1'] = $this->input->post('part1_1');
			$data['part1_2'] = $this->input->post('part1_2');
			$data['part1_3'] = $this->input->post('part1_3');
			$data['part1_4'] = $this->input->post('part1_4');
			$data['part1_5'] = $this->input->post('part1_5');
			$data['part1_6'] = $this->input->post('part1_6');
			$data['part1_9'] = $this->input->post('part1_9');
			
			if($this->input->post('part1_7'))
				$data['part1_7'] = $this->input->post('part1_7');
			else 
				$data['part1_7'] = 'NR';
			if($this->input->post('part1_8'))
				$data['part1_8'] = $this->input->post('part1_8');
			else 
				$data['part1_8'] = 'NR';
			
			//part 2-A
			$data['part2a_1'] = $this->input->post('part2a_1');
			$data['part2a_2'] = $this->input->post('part2a_2');
			$data['part2a_3'] = $this->input->post('part2a_3');
			$data['part2a_4'] = $this->input->post('part2a_4');
			$data['part2a_5'] = $this->input->post('part2a_5');
			
			//part 2-B
			$data['part2b_1'] = $this->input->post('part2b_1');
			if($data['part2b_1'] == "yes")
			{
				$data['part2b_1_1'] = $this->input->post('part2b_1_1');
				if($data['part2b_1_1'] == "yes")
				{
					$data['part2b_1_1_1'] = $this->input->post('part2b_1_1_1');	
					$data['part2b_1_1_2'] = $this->input->post('part2b_1_1_2');	
				}
			}
			$data['part2b_2'] = $this->input->post('part2b_2');
			if($data['part2b_2'] == 'Others')
				$data['part2b_2'] = $this->input->post('part2b_2Other');
			$data['part2b_3'] = $this->input->post('part2b_3');
			$data['part2b_4'] = $this->input->post('part2b_4');
			$data['part2b_5'] = $this->input->post('part2b_5');
			$data['part2b_6'] = $this->input->post('part2b_6');		
			
			//part 3-A
			$data['part3a_1'] = $this->input->post('part3a_1');		
			$data['part3a_2'] = $this->input->post('part3a_2');		
			$data['part3a_3'] = $this->input->post('part3a_3');		
			$data['part3a_4'] = $this->input->post('part3a_4');		
			$data['part3a_5'] = $this->input->post('part3a_5');		
			$data['part3a_6'] = $this->input->post('part3a_6');		
			$data['part3a_7'] = $this->input->post('part3a_7');		
			$data['part3a_8'] = $this->input->post('part3a_8');		
			$data['part3a_9'] = $this->input->post('part3a_9');	
			$data['part3a_10'] = $this->input->post('part3a_10');	
			$data['part3a_11'] = $this->input->post('part3a_11');		
			$data['part3a_12'] = $this->input->post('part3a_12');		
			$data['part3a_13'] = $this->input->post('part3a_13');		
			$data['part3a_14'] = $this->input->post('part3a_14');		
			$data['part3a_15'] = $this->input->post('part3a_15');		
			$data['part3a_16'] = $this->input->post('part3a_16');		
			
			//part 3-B
			$data['part3b_1'] = $this->input->post('part3b_1');		
			$data['part3b_2'] = $this->input->post('part3b_2');		
			$data['part3b_3'] = $this->input->post('part3b_3');		
			$data['part3b_4'] = $this->input->post('part3b_4');		
			$data['part3b_5_1'] = $this->input->post('part3b_5_1');		
			$data['part3b_5_2'] = $this->input->post('part3b_5_2');		
			$data['part3b_6'] = $this->input->post('part3b_6');		
			
			//part 3-C
			$data['part3c'] = $this->input->post('part3c');		
			
			//insert to set table
			$this->lab_set_model->saveResponse($data);
			
			//compute score
			$score = 0;
			$countNA = 0;
			for ($i = 1; $i <= 16; $i++)
			{
				if($data['part3a_'.$i] == 0) 
					$countNA++; 
				$score += $data['part3a_'.$i]; 
			}
			$score /= (16 - $countNA);
			
			$data2['student_id'] = $user_data['student_id'];
			$data2['score'] = $score;
			$data2['oset_class_id'] = $oset_class_id;
			
			$this->lab_set_model->saveScore($data2);
			
			$data3['evaluated'] = 1;
			$this->lab_set_model->updateEvalStatus($oset_class_id, $user_data['student_id'], $data3);
		}
		redirect("student/home", "refresh");	
	}
	
	public function createTable()
	{
		$this->lab_set_model->createTable();
		redirect('admin/setinstrumentmanagement', 'refresh');
	}
	
	public function generateReportPerClass($oset_class_id)
	{
		$this->load->helper('file');
		
		$class = $this->classes->getInformation($oset_class_id);
		$filename = './reports/report_per_class/'.$class['instructor_code'].'-'.$class['class_id'].'.pdf';
		
		if(!file_exists($filename))
		{
			//pdf		
			$this->load->helper(array('dompdf', 'file'));
			//pdf header
			$data = $this->lab_set_model->getReportPerClassData($class['oset_class_id']);
			$data['instructor'] = $class['instructor'];
			$data['subject'] = $class['subject'].'-'.$class['section'];
			$data['no_of_respondents'] = $class['no_of_respondents'];	
			$sem = substr($class['class_id'], 0, 4);
			$sem2 = $sem+1;
			$data['sem_ay'] = substr($class['class_id'], 4, 1).' / '.$sem.'-'.$sem2;		
				
			//archive report
			$html = $this->load->view('set/labset_detailedreport_view', $data, TRUE);
			$pdf_data = pdf_create($html, '' , FALSE);  
			write_file($filename, $pdf_data);
			
			//save link to db	
			$data = array('course' =>	$class['subject'].'-'.$class['section'],
						  'sem_ay' => substr($class['class_id'], 0, 5), 
						  'instructor' => $class['instructor_code'], 
						  'pdf' => $filename,
						  'college' => $class['college_code'],
						  'department' => $class['department_code']);
			
			$this->report_per_class->saveToDatabase($data);
		}
		redirect(base_url($filename), 'refresh');
	}
	
}