<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('college','',TRUE);
	}

	public function index() 
	{
		if(file_exists('./install'))
			header('Location: '.base_url('install'));
			//redirect("install", "refresh");
		else {
			if($this->session->userdata('logged_in'))
				redirect('home', 'refresh');
			else
			{
				session_destroy();
				$this->load->view('login_view');	
			}
		}
	}	
	
	public function submit()
	{
		$this->load->library('session');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		if($this->form_validation->run() == FALSE)
			$this->load->view('login_view');
		else{
			$userdata = $this->session->userdata('logged_in');
			if(isset($userdata['username']))
				redirect('home', 'refresh');
			else
				redirect('student/home', 'refresh');
		}
	}
	
	public function check_database($password)
	{
		$username = $this->input->post('username');
		$row = $this->user->login($username, $password);

		if($row)
		{
			$sess_array = array();
			if(isset($row->user_type))
			{
				$sess_array = array(
							  'username' => $row->username,
							  'first_name' => $row->first_name,
							  'last_name' => $row->last_name,
							  'password' => $row->password,
							  'salt' => $row->salt
				);
							
				if(strpos($row->user_type, '1') !== false)
					$sess_array['isAdmin'] = true;
				if(strpos($row->user_type, '2') !== false)
				{
					$sess_array['isClerk'] = true;
					$sess_array['user_college_code'] = $row->college_code;
					$sess_array['user_college_name'] = $this->college->getInfo($row->college_code)->college_name;
				}
				if(strpos($row->user_type, '3') !== false)
					$sess_array['isAnalyst'] = true;
			}
			//student
			else
			{
				$sess_array = array(
							  'name' => $row->name,
							  'student_id' => $row->student_id,
							  'password' => $row->password,
							  'salt' => $row->salt
				);
			}	
			$this->session->set_userdata('logged_in', $sess_array);
			$this->load->model('audit_trail');
			$this->audit_trail->saveToDatabase("Logged in");
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect('home/logout', 'refresh');
	}
}