<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudentAccountManagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('student');
		$this->load->model('SET_model');
	}

	public function index() 
	{
		 $data = $this->session->userdata('logged_in');
		 $data['SET']=$this->SET_model->getRecords();
		 $this->load->view('admin/student_accounts', $data);	
	}	
	
	public function download()
	{
		$this->student->importClasslist();	
		$this->student->importStudents();
		redirect('admin/studentaccountmanagement/generatePassword');
	}
	
	public function changePassword()
	{
		 $data = $this->session->userdata('logged_in');
		 $data['SET']=$this->SET_model->getRecords();
		 $this->load->view('admin/student_change_password', $data);	
	}
	
	public function changePasswordSubmit()
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		
		if($this->input->post('password1')!= $this->input->post('password2'))
		{
			$data['student_number'] = $this->input->post('student_number');
			$data['msg'] = "Passwords do not match.";
		}
		else
		{
			$student_number = str_replace("-", "", $this->input->post('student_number'));
				
			if(!($row = $this->student->getInfo($student_number)))
			{
				$data['student_number'] = $this->input->post('student_number');
				$data['msg'] = "Invalid student number.";
			}
			else
			{
				$salt = $row->salt;
				$data2 = array('password' => MD5($this->input->post('password1').$salt));	
				$this->student->update($data2, $student_number);
				$data['msg'] = "Password changed.";
			}				
		}
		$this->load->view('admin/student_change_password', $data);
	}
	
	public function generatePassword()
	{
		$res = $this->student->getRecords("", "");
		
		$i = 0;
		foreach ($res['student_id'] as $student_id)
		{
			$students[$i]['name'] = $res['name'][$i];
			$students[$i]['student_id'] = $student_id;
			$students[$i]['college'] = $res['college_code'][$i];
			$pass = substr(MD5(uniqid(rand(), true)), 0, 8);
			$students[$i]['pass'] = $pass;
			$salt = substr(MD5(uniqid(rand(), true)), 0, 6);
			$hashedPass = MD5($pass.$salt);
			
			$data = array(
					'password' => $hashedPass,
					'salt' => $salt
					);
					
			$this->student->update($data, $student_id);
		
			$i++;
		}
		
		$this->load->helper(array('dompdf', 'file'));
		$this->load->helper('file');
		
       	$college = $students[0]['college'];

		$rows[] = "UNIVERSITY OF THE PHILIPPINES MANILA";
		$rows[] = "STUDENT EVALUATION OF TEACHERS";
		$rows[] = " ";
		$rows[] = " ";
		$rows[] = "COLLEGE: ".strtoupper($college);
		$rows[] = " ";
	
		foreach ($students as $student)
		{
			if($student['college'] != $college)
			{
				$college = $student['college'];
				$rows[] = " ";
				$rows[] = "College: ".$college;
				$rows[] = " ";
			}
			$rows[] = $student['name'];
			$rows[] = "Username: ".str_pad(substr_replace($student['student_id'], '-', 4, 0), 20). "Password: ".$student['pass'];
			$rows[] = "______________________________________________________________________________________";
		}
	
		$this->student->updateFlagsAfterGeneratingPasswords();
		$pdf_data = create_pdf($rows, 'students_passwords', true);		
	}
	
}