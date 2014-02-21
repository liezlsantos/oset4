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
		$this->load->helper('file');
		
		//check if there's a zip file
		if(!$_FILES['zipFile']['name'])
		{
			$data = $this->session->userdata('logged_in');
			$data['SET']=$this->SET_model->getRecords();
			$data['set_id']=$this->set_instrument->getNextSetID();
			$data['SET_name'] = $this->input->post('name');
			$data['table_name'] = $this->input->post('table_name');
			$data['error_msg'] = "No zip file selected.";
			$this->load->view('admin/add_set_instrument', $data);	
			return;
		}
		
		$config['allowed_types'] = 'zip';
		$config['max_size']	= '5000';
				
		//upload zip file
		$config['upload_path'] = './set';
		$config['file_name'] = $_FILES['zipFile']['name']; 
		$this->load->library('upload', $config);
		$this->upload->initialize($config); 
		$this->upload->do_upload('zipFile');
		$this->unzip('./set/'.$_FILES['zipFile']['name'], './set');	
				
		//check config file
		if(file_exists('./set/config.php') === false)		
		{
			//deletes zip file
			unlink('./set/'.$_FILES['zipFile']['name']);	
			foreach (glob("./set/*.php") as $file) {
				unlink($file);
			}
					
			$data = $this->session->userdata('logged_in');
			$data['SET']=$this->SET_model->getRecords();
			$data['set_id']=$this->set_instrument->getNextSetID();
			$data['SET_name'] = $this->input->post('name');
			$data['error_msg'] = "No config file uploaded";
			$this->load->view('admin/add_set_instrument', $data);	
			return;
		}		
		include('./set/config.php');
			
		//checks duplicate files		
		if($error_msg = $this->duplicateFiles())
		{
			//deletes zip file
			unlink('./set/'.$_FILES['zipFile']['name']);	
			foreach (glob("./set/*.*") as $file) {
				unlink($file);
			}
					
			$data = $this->session->userdata('logged_in');
			$data['SET']=$this->SET_model->getRecords();
			$data['set_id']=$this->set_instrument->getNextSetID();
			$data['SET_name'] = $this->input->post('name');
			$data['error_msg'] = $error_msg;
			$this->load->view('admin/add_set_instrument', $data);	
			return;
		}
		
		//check duplicate tables
		if(!$this->set_instrument->checkTableName($table_name))
		{
			//deletes zip file
			unlink('./set/'.$_FILES['zipFile']['name']);	
			foreach (glob("./set/*.*") as $file) {
				unlink($file);
			}
			
			$data = $this->session->userdata('logged_in');
			$data['SET']=$this->SET_model->getRecords();
			$data['set_id']=$this->set_instrument->getNextSetID();
			$data['SET_name'] = $this->input->post('name');
			$data['error_msg'] = "Table name already exists.";
			$this->load->view('admin/add_set_instrument', $data);	
			return;
		}
		
		//move to respective folder
		//get filenames of php
		foreach (glob("./set/*.php") as $file) {
			 $filename = substr($file, 6);	
			 if($filename == $controller_name.'.php')
			 {
			 	$data['controller_name'] = $controller_name; 
			 	rename($file, './application/controllers/set/'.$filename);
			 }
			 elseif($filename == $model_name.'.php')
			 {
			 	$data['model_name'] = $model_name;
			 	rename($file, './application/models/set/'.$filename);
			 }
			 elseif($filename != 'config.php')
			 	rename($file, './application/views/set/'.$filename);
		}
		//deletes zip file
		unlink('./set/'.$_FILES['zipFile']['name']);
		unlink('./set/config.php');			
		//save to set_instrument table
		if($this->set_instrument->isEmpty())
			$data['set_as_default'] = 1;
		$data['name'] = $this->input->post("name");
		$data['set_instrument_id'] = $this->input->post("id");
		$data['table_name'] = $table_name;
		$this->set_instrument->saveToDatabase($data);
	
		$this->set_instrument->createTables($data['model_name']);
		redirect("admin/setinstrumentmanagement", "refresh");
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
	
	public function duplicateFiles()
	{
		$duplicateView = false;
		$duplicateModel = false;
		$duplicateController = false;
		
		foreach (glob("./set/*.php") as $file) {
   			 $filename = substr($file, 6);	
			 if(strpos($file, "view"))	
			 {
			 	if(file_exists('./application/views/set/'.$filename))
					$duplicateView = true;
			 }
			 elseif(strpos($file, "model"))
			 {
			 	if(file_exists('./application/models/set/'.$filename))
					$duplicateModel = true;
			 }
			 else
			 {
			 	if(file_exists('./application/controllers/set/'.$filename))
					$duplicateController = true;
			 }
  		}
		$error_msg = false;
		if($duplicateController || $duplicateModel || $duplicateView)
		{
			$error_msg = "Duplicate files: Please rename the ";
			if($duplicateController && $duplicateModel && $duplicateView)
				$error_msg .= "controller, model and view files.";
			elseif($duplicateModel && $duplicateView)
				$error_msg .= "model and view files.";
			elseif($duplicateModel && $duplicateController)
				$error_msg .= "controller and model files.";
			elseif($duplicateController && $duplicateView)
				$error_msg .= "controller and view files.";
			elseif($duplicateController)
				$error_msg .= "controller file.";
			elseif($duplicateModel)
				$error_msg .= "model file.";
			elseif($duplicateView)
				$error_msg .= "view file.";
			$error_msg .= " Make necessary changes inside the php files as well.";
		}
		return $error_msg;
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