<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculty_summarized_report extends CI_Model
{
	public function getRecords($college, $sem_ay)
	{
		$sql = $this->db->query("SELECT sem_ay, college, path, college_name FROM faculty_summarized_report, 
		college WHERE college = '$college' AND college = college_code AND sem_ay LIKE '%$sem_ay%' ORDER BY sem_ay");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['sem_ay'][] = $row->sem_ay;
			$results['college_name'][] = $row->college_name;
			$results['college_code'][] = $row->college;
			$results['path'][] = $row->path;
		}
		return $results;
	}	

	public function saveToDatabase($data)
	{
		$result = $this->db->insert('faculty_summarized_report',$data);
	}
	
	public function getDistinctSemAY($college)
	{
		$sql = $this->db->query("SELECT DISTINCT(sem_ay) FROM faculty_summarized_report ORDER BY sem_ay DESC");
		if($sql->num_rows() == 0){
			return null;
		}
		foreach ($sql->result() as $row){
			$sem_ay[] = $row->sem_ay;
		}
		return $sem_ay;
	}

}