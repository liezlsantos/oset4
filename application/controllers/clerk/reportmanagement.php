<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportmanagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('SET_model');
		$this->load->model('classes');
		$this->load->model('college');
		$this->load->model('report_per_class');
		$this->load->model('faculty_summarized_report');
	}
	
	public function reportperclass()
	{
		$data = $this->session->userdata('logged_in');
		$data['records'] = $this->classes->getClassesForReport($data['user_college_code'], '', '');
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/report_per_class', $data);	
	}
	
	public function searchreportperclass()
	{
		$data = $this->session->userdata('logged_in');	
		$data['records'] = $this->classes->getClassesForReport($data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['search'] = $this->input->post();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/report_per_class', $data);	
	}
	
	public function reportperclassarchive()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$data['sem_ay'] = $this->report_per_class->getDistinctSemAY($data['user_college_code']);
		$data['records'] = $this->report_per_class->getRecords($data['user_college_code'], $data['SET']['semester'], '', '');
		$data['search']['sem_ay'] = $data['SET']['semester']; 
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$this->load->view('clerk/report_per_class_archive', $data);	
	}
	
	public function searchreportperclassarchive()
	{
		$data = $this->session->userdata('logged_in');	
		$data['SET']=$this->SET_model->getRecords();
		$data['records'] = $this->report_per_class->getRecords($data['user_college_code'], $this->input->post('sem_ay'), $this->input->post('subject'), $this->input->post('department'));
		$data['sem_ay'] = $this->report_per_class->getDistinctSemAY($data['user_college_code']);
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['search'] = $this->input->post();
		$this->load->view('clerk/report_per_class_archive', $data);	
	}

	public function facultysummarizedreport()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		
		$path = './reports/faculty_summarized_report/'.$data['user_college_code'].'-'.$data['SET']['semester'];

		if(!file_exists($path.'.doc'))
		{
			$data2 = array ('sem_ay' => $data['SET']['semester'],
							'college' => $data['user_college_code'],
							'path' => $path);
			$this->faculty_summarized_report->saveToDatabase($data2);
		}	
		$data['path'] = $path;
		$this->updateFacultyReport('');
		$this->load->view('clerk/faculty_report', $data);	
	}
	
	public function searchfacultysummarizedreport()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();	
		$data['path'] = './reports/faculty_summarized_report/'.$data['user_college_code'].'-'.$data['SET']['semester'];
		$this->updateFacultyReport($this->input->post('instructor'));
		$data['search'] = $this->input->post();
		$this->load->view('clerk/faculty_report', $data);	
	}

	public function updateFacultyReport($instructor)
	{
		$ins = $instructor;
		$data = $this->session->userdata('logged_in');
		$instructors = $this->classes->getFacultyWithAllClassesClosed($data['user_college_code'], $instructor);
		$data['instructors'] = $instructors;
		
		if($instructors)
		{
			foreach ($instructors['instructor'] as $instructor)
			{
				$classes = $this->classes->getClassesByInstructor($data['user_college_code'], $instructor);
				$data['count'][] = count($classes['subject']);
				
				for ($i = 0; $i < count($classes['subject']); $i++)
				{
					$data['classes']['subject'][] = $classes['subject'][$i];
					$data['classes']['units'][] = $classes['units'][$i];
					$data['classes']['score'][] = $classes['score'][$i];
					$data['classes']['total'][] = $classes['total'][$i];
					$data['classes']['rating'][] = $classes['rating'][$i];
					$data['classes']['no_of_students'][] = $classes['no_of_students'][$i];
					$data['classes']['no_of_respondents'][] = $classes['no_of_respondents'][$i];
				}
			}	
		}
		
		$SET = $this->SET_model->getRecords();
		$path = './reports/faculty_summarized_report/'.$data['user_college_code'].'-'.$SET['semester'];
		$sem = substr($SET['semester'], 0, 4);
		$sem2 = $sem+1;
		$data['sem_ay'] = substr($SET['semester'], 4, 1).' / '.$sem.'-'.$sem2;	
		
		//create file		
		$html = $this->load->view('clerk/summarized_faculty_report', $data, TRUE);
		$this->load->helper('file');
		if(!$ins)
		{
			//doc file
			write_file($path.'.doc', $html);
		}
	}
	
	public function facultysummarizedreportdownload($college)
	{
		$SET = $this->SET_model->getRecords();
		$path = './reports/faculty_summarized_report/'.$college.'-'.$SET['semester'].'.doc';
		
		$this->updateFacultyReport('');
		$this->load->helper('download');
		$data = file_get_contents($path); // Read the file's contents
		$name = str_replace('./reports/faculty_summarized_report/', "", $path);
		force_download($name, $data);
	}

	public function facultysummarizedreportarchive()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$data['records'] = $this->faculty_summarized_report->getRecords($data['user_college_code'], '');
		$this->load->view('clerk/faculty_report_archive', $data);	
	}

	public function searchfacultysummarizedreportarchive()
	{
		$data = $this->session->userdata('logged_in');	
		$data['SET']=$this->SET_model->getRecords();
		$data['records'] = $this->faculty_summarized_report->getRecords($data['user_college_code'], $this->input->post('sem_ay'));
		$data['sem_ay'] = $this->faculty_summarized_report->getDistinctSemAY($data['user_college_code']);
		$data['search'] = $this->input->post();
		$this->load->view('clerk/faculty_report_archive', $data);	
	}

}