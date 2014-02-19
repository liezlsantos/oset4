<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Archive_tables extends CI_Model
{
	public function saveResponse($data, $table)
	{
		//get sem_ay
		$this->load->model('SET_model');
		$SET = $this->SET_model->getRecords();
		$data['sem_ay'] = $SET['semester'];
		//get class info
		$this->load->model('classes');
		$class = $this->classes->getInformation($data['oset_class_id']);
		unset($data['oset_class_id']);
		$data['section'] = $class['section'];
		$data['subject'] = $class['subject'];
		$data['instructor'] = $class['instructor'];
		$data['college_code'] = $class['college_code'];
		//get student info
		$this->load->model('student');
		$student = $this->student->getInfo($data['student_id']);
		$data['name'] = $student->name;
		$data['yearlevel'] = $student->yearlevel;
		$data['program'] = $student->program;
		
		$this->db->insert($table.'_archive', $data);
	}
}