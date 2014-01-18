<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepassword extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user','',TRUE);
		$this->load->model('SET_model');
	}

	public function index() 
	{
		if($this->session->userdata('logged_in'))
		{
			$data = $this->session->userdata('logged_in'); 
			$data['SET']=$this->SET_model->getRecords();
			$this->load->view('change_password', $data);	
		}
		else {
			redirect('home', 'refresh');
		}
	}	
	
	public function submit()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_array = $this->session->userdata('logged_in');
			if($this->input->post('password1')!= $this->input->post('password2'))
			{
				$data = $this->session->userdata('logged_in');
				$data['msg'] = "Passwords do not match.";	
				$this->load->view('change_password', $data);
			}
			else 
			{
				if(MD5($this->input->post('password').$session_array['salt'])!= $session_array['password'])
				{
					$data = $this->session->userdata('logged_in');
					$data['msg'] = "Invalid password.";	
					$this->load->view('change_password', $data);
				}
				else
				{
					$data= array(
					'password' => MD5($this->input->post('password1').$session_array['salt'])
					);
						
					$this->user->updateRecord($data, $session_array['username']);
					$data = $this->session->userdata('logged_in');
					$data['msg'] = "Password changed.";	
					$this->load->view('change_password', $data);
				
				}
			}
		}
		else
			redirect('home', 'refresh');				
	}
}