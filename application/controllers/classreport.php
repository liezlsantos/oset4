<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classreport extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('report_per_class');
		$this->load->model('classes');	
		$this->load->model('set_instrument');
	}

	public function index() 
	{
		$instruments = $this->set_instrument->getRecords();
		foreach ($instruments['model_name'] as $model)
			$this->load->model('set/'.$model);
		
		$classes = $this->classes->getAllClassesForReport();
		$i = 0;
		$ctr = 0; //number of pdf files created per run
		foreach ($classes['oset_class_id'] as $id)
		{
			$model = $classes['model_name'][$i];
			$filename = './reports/report_per_class/'.$classes['instructor_code'][$i].'-'.$classes['class_id'][$i].'.pdf';
			if(!file_exists($filename))
			{
				$this->$model->generateReportPerClass($id);
				$ctr++;
			}
			if($ctr > 10)
				break;
			$i++;
		}
		echo 'Generated '.$i.'/'.count($classes['oset_class_id']).' reports';
	}
	
}