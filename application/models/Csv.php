<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv extends CI_Model
{
	public function saveResponse($data, $table)
	{
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
		$data['program'] = $student->program;
		
		foreach ($data as $key => $val)
		{
			$data[$key] = '"'.$val.'"';
		}
		
		$data['student_id'] = substr_replace($data['student_id'], '-', 5, 0);
		$response = "\n".$data['student_id'].','.$data['name'].','.$data['program'].','.
		$data['subject'].','.$data['section'].','.$data['instructor'].','.
		$data['department_code'].','.$data['college_code'].',';
		
		$sql = $this->db->query("SHOW COLUMNS FROM $table WHERE Field NOT IN ('response_id', 'student_id', 'oset_class_id')");
		
		foreach ($sql->result() as $row)
		{
			if(!isset($data[$row->Field]))	
				$data[$row->Field] = '"NR"';
			$response .= $data[$row->Field].',';
		}
		$response = rtrim($response, ",");
		
		$fp = fopen('./csv/'.$table.'.csv', 'a');
		fwrite($fp, $response);
		fclose($fp);
	}
}