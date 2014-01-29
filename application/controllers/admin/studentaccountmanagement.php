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
		redirect('admin/studentaccountmanagement', 'refresh');
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
	 
		$pdf_data = create_pdf($rows, '', false);
		write_file('./pdf/students_passwords.pdf', $pdf_data); 
		 
		$this->student->updateFlagsAfterGeneratingPasswords();
		
		redirect('admin/studentaccountmanagement', 'refresh');
	}
	
}