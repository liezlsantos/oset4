<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evaluationmanagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('classes');
		$this->load->model('SET_model');
		$this->load->model('college');
	}
	
	public function open()
	{
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getClassesByStatus(0, $data['user_college_code'], "", "");
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$this->load->view('clerk/open_evaluation', $data);	
	}
	
	public function opensubmit($college_code)
	{
		$classes = $this->classes->getClassesByStatus(0, $college_code, "", "");
		
		$i = 0;
		foreach ($classes['oset_class_id'] as $oset_class_id)
		{
			if($this->input->post($oset_class_id)){
				$data['open'] = 1;
				$this->classes->update($oset_class_id, $data);
			}
			$i++;
		}
		
		$_SESSION['msg'] = "Evaluation for selected classes opened.";
		redirect('clerk/evaluationmanagement/searchopen', 'refresh');	
	}

	public function close()
	{
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getClassesByStatus(1, $data['user_college_code'], "", "");
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$this->load->view('clerk/close_evaluation', $data);	
	}
	
	public function closesubmit($college_code)
	{
		//compute score TO DO
		$classes = $this->classes->getClassesByStatus(1, $college_code, "", "");
		
		$i = 0;
		foreach ($classes['oset_class_id'] as $oset_class_id)
		{
			if($this->input->post($oset_class_id)){
				$data['open'] = 2;
				$data['score'] = $this->classes->getScore($oset_class_id);
				$this->classes->update($oset_class_id, $data);
			}
			$i++;
		}
		
		$_SESSION['msg'] = "Evaluation for selected classes closed.";
		redirect('clerk/evaluationmanagement/searchclose', 'refresh');	
	}
	
	public function status()
	{
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getClassesByStatus(2, $data['user_college_code'], "", "");
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$this->load->view('clerk/evaluation_status', $data);	
	}
	
	public function searchopen()
	{	
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getClassesByStatus(0, $data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['search'] = $this->input->post();
		$this->load->view('clerk/open_evaluation', $data);	
	}

	public function searchclose()
	{	
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getClassesByStatus(1, $data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['search'] = $this->input->post();
		$this->load->view('clerk/close_evaluation', $data);	
	}
	
	public function searchstatus()
	{	
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getClassesByStatus(2, $data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['search'] = $this->input->post();
		$this->load->view('clerk/evaluation_status', $data);	
	}

	public function studentstatus()
	{
		$data = $this->session->userdata('logged_in'); 
		$data['SET']=$this->SET_model->getRecords();

		if(!file_exists('./pdf/students_with_unevaluated_classes.pdf'))
			$this->updatePDFStudentStatus();
			
		$this->load->view('clerk/student_status', $data);
	}
	
	public function updatePDFStudentStatus()
	{
		$data = $this->session->userdata('logged_in'); 
		$this->load->model('student');
		$student = $this->student->getRecords($data['user_college_code'], "");
		
		//for pdf
		$rows[] = " ";
		$rows[] = " ";
		$rows[] = "Student Evaluation of Teachers - ".$data['user_college_name']; 
		$rows[] = "The following students still have classes to be evaluated:";
		$rows[] = " ";
	
		if($student)
		{
			$i = 0;
			foreach ($student['student_id'] as $student_id)
			{
				if($results = $this->student->getUnevaluatedClasses($student_id))
				{
					$rows[] = " ";	
					$rows[] = ucwords(strtolower($student['name'][$i]));
					$unevalStudents[]['classes'] = "";
					for($j = 0; $j < count($results['subject']); $j++)
					{
						$rows[] = $results['subject'][$j]." (".$results['section'][$j].") - ".$results['instructor'][$j];
					}
				}	
				$i++;
			}
		}
		$this->load->helper(array('dompdf', 'file'));
		$this->load->helper('file');
		
		$pdf_data = create_pdf($rows, '', false);  
		write_file('./pdf/students_with_unevaluated_classes.pdf', $pdf_data);
		
		redirect('clerk/evaluationmanagement/studentstatus', 'refresh');
	}
	
}