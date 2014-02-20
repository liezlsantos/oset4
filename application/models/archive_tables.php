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
		$data['section'] = $class['section'];
		$data['subject'] = $class['subject'];
		$data['instructor'] = $class['instructor'];
		$data['department_code'] = $class['department_code'];
		$data['college_code'] = $class['college_code'];
		//get student info
		$this->load->model('student');
		$student = $this->student->getInfo($data['student_id']);
		$data['name'] = $student->name;
		$data['yearlevel'] = $student->yearlevel;
		$data['program'] = $student->program;
		
		$this->db->insert($table.'_archive', $data);
	}
	
	public function getDistinctSemAY($table)
	{
		$sql = $this->db->query("SELECT DISTINCT(sem_ay) FROM $table ORDER BY sem_ay DESC");
		if($sql->num_rows() == 0){
			return null;
		}
		foreach ($sql->result() as $row){
			$sem_ay[] = $row->sem_ay;
		}
		return $sem_ay;
	}
	
	public function search($table, $sem_ay, $college, $department, $subject)
	{
		$sql = $this->db->query("SELECT DISTINCT oset_class_id, instructor, subject, section FROM $table
				WHERE sem_ay = '$sem_ay' AND college_code = '$college' AND department_code LIKE '%$department%' AND
				subject LIKE '%$subject%' ORDER BY subject");
		if($sql->num_rows() == 0){
			return null;
		}
		foreach ($sql->result() as $row){
			$results['oset_class_id'][] = $row->oset_class_id;
			$results['subject'][] = $row->subject;
			$results['section'][] = $row->section;
			$results['instructor'][] = $row->instructor;
		}
		return $results;
	}
}