<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class classmanagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('classes');
		$this->load->model('SET_model');
		$this->load->model('college');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['records'] = $this->classes->getDistinctClass($data['user_college_code'], "", "");
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$_SESSION['subject_keyword'] = FALSE;
		$_SESSION['department_keyword'] = FALSE;
		$this->load->view('clerk/class_selection', $data);	
	}
	
	public function search()
	{	
		$data = $this->session->userdata('logged_in'); 
		$data['records'] = $this->classes->getDistinctClass($data['user_college_code'], $this->input->post('subject'), $this->input->post('department'));
		$data['SET']=$this->SET_model->getRecords();
		$_SESSION['subject_keyword'] = $this->input->post('subject');
		$_SESSION['department_keyword'] = $this->input->post('department');
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['search'] = $this->input->post();
		$this->load->view('clerk/class_selection', $data);	
	}
	
	public function edit($class_id) 
	{
		$data = $this->session->userdata('logged_in');
		$data['class'] = $this->classes->getInfo($class_id);
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/edit_class', $data);	
	}	
	
	public function addInstructor($class_id) 
	{
		$data = $this->session->userdata('logged_in');
		$data['class'] = $this->classes->getInfo($class_id);
		$this->load->model('faculty');
		$data['faculty'] = $this->faculty->getRecords();
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/add_instructor', $data);		
	}

	public function submit($class_id) 
	{
		if($this->classes->checkInstructorCode($class_id, $this->input->post('instructor_code')))
			$this->classes->addInstructor($class_id, $this->input->post('instructor_code'));
		redirect('clerk/classmanagement/edit/'.$class_id, 'refresh');
	}	
	
	public function deleteInstructor($id) 
	{
		$class_id = substr($id, 0, 10);
		$instructor = substr($id, 10, strlen($id));
		$this->classes->deleteInstructor($class_id, $instructor);
		redirect('clerk/classmanagement/edit/'.$class_id, 'refresh');
	}	
	
	public function saveSelection($college_code)
	{
		$this->load->model('set_instrument');	
		$default_set = $this->set_instrument->getDefaultSET();
		
		$classes = $this->classes->getDistinctClass($college_code, "", "");
		
		foreach ($classes['class_id'] as $class_id)
		{
			$i = 0;
			foreach ($classes['faculty_id'][$class_id] as $instructor)
			{
				$code = $class_id.$instructor;
				
				if($this->input->post($code))
				{
					$data['activated'] = 1;
					$data['set_instrument_id'] = $default_set;
					$this->classes->updateActivationStatus($class_id, $classes['instructors'][$class_id][$i], $data);
				}
				else
				{
					$data['activated'] = 0;
					$data['set_instrument_id'] = 0;
					$this->classes->updateActivationStatus($class_id, $classes['instructors'][$class_id][$i], $data);
				}
				$i++;
			}
		}
		
		$data = $this->session->userdata('logged_in');
		$data['records'] = $this->classes->getDistinctClass($data['user_college_code'], "", "");
		$data['SET']=$this->SET_model->getRecords();
		$data['departments'] = $this->college->getDepartments($data['user_college_code']);
		$data['msg'] = "Selection saved.";
		$_SESSION['subject_keyword'] = FALSE;
		$_SESSION['department_keyword'] = FALSE;
		$this->load->view('clerk/class_selection', $data);	
		
		//redirect('clerk/classmanagement', 'refresh');
	}
	
	public function addNewInstructor($class_id)
	{
		$data = $this->session->userdata('logged_in');
		$data['class'] = $this->classes->getInfo($class_id);
		$this->load->model('faculty');
		$data['faculty'] = $this->faculty->getRecords();
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('clerk/add_new_instructor', $data);		
	}
	
	public function addNewInstructorSubmit($class_id)
	{
		$this->load->model('faculty');
		$data = array(
				'name' => strtoupper($this->input->post('name')),
				'instructor_code' => $this->input->post('code'),
				);	
		$this->faculty->saveToDatabase($data);
		
		if($this->input->post('addToClass'))
			$this->classes->addInstructor($class_id, $this->input->post('code'));
			
		redirect('clerk/classmanagement/edit/'.$class_id, 'refresh');		 	
	}
}