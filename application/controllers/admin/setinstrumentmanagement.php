<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setinstrumentmanagement extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('set_instrument');
		$this->load->model('SET_model');
	}

	public function index() 
	{
		$data = $this->session->userdata('logged_in');
		$data['records']=$this->set_instrument->getRecords();
		$data['SET']=$this->SET_model->getRecords();
		$this->load->view('admin/set_instrument', $data);	
	}	
		
	public function add() 
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$data['set_id']=$this->set_instrument->getNextSetID();
		$this->load->view('admin/add_set_instrument', $data);	
	}	
	
	public function edit($set_id) 
	{
		$data = $this->session->userdata('logged_in');
		$data['SET']=$this->SET_model->getRecords();
		$data['set'] = $this->set_instrument->getInfo($set_id);
		$this->load->view('admin/edit_set_instrument', $data);	
	}	
	
	public function submit()
	{
		$config['allowed_types'] = 'zip';
		$config['max_size']	= '5000';
		
		//upload zip file
		$config['upload_path'] = './set';
		$config['file_name'] = $_FILES['zipFile']['name']; 
		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
		$this->upload->do_upload('zipFile');
				
		$this->unzip('./set/'.$_FILES['zipFile']['name'], './set');	
		
		//move to respective folder
		//get filenames of php
		$this->load->helper('file');
		foreach (glob("./set/*.php") as $file) {
   			 $filename = substr($file, 6);	
			 if(strpos($file, "view"))	
			 	rename($file, './application/views/set/'.$filename);
			 elseif(strpos($file, "model"))
			 	rename($file, './application/models/set/'.$filename);
			 else
			 {
			 	$data['controller_name'] = str_replace(".php", "", $filename);
			 	rename($file, './application/controllers/set/'.$filename);
			 }
  		}
		//deletes zip file
		unlink('./set/'.$_FILES['zipFile']['name']);
		
		//save to set_instrument table
		if($this->set_instrument->isEmpty())
			$data['set_as_default'] = 1;
		$data['name'] = $this->input->post("name");
		$data['table_name'] = $this->input->post("table_name");
		$this->set_instrument->saveToDatabase($data);

		redirect('admin/set/'.$data['controller_name'].'/createTable', 'refresh');
	}

	public function unzip($source, $destination)
	{
	   if (file_exists($source) === true){
	   		$zip = new ZipArchive();
	   		if ($zip->open($source) === true){
	    		$zip->extractTo($destination);
	    	}
	    	return $zip->close();
	    }
	}
	
	public function update($set_id)
	{
		$data['name'] = $this->input->post("name");
		$this->set_instrument->updateRecord($data, $set_id);
		redirect('admin/setinstrumentmanagement', 'refresh');
	}
	
	public function setasdefault($set_id)
	{
		$this->set_instrument->setAsDefault($set_id);
		redirect('admin/setinstrumentmanagement', 'refresh');
	}
}