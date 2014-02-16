<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_per_class extends CI_Model
{
	public function getRecords($college, $sem_ay, $course, $department)
	{
		$sql = $this->db->query("SELECT * FROM report_per_class WHERE sem_ay = '$sem_ay' AND college='$college'
									AND department LIKE '%$department%' AND course LIKE '%$course%'");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['department'][] = $row->department;
			$results['course'][] = $row->course;
			$results['instructor'][] = $row->instructor;
			$results['path'][] = $row->path;
		}
		return $results;
	}	

	public function saveToDatabase($data)
	{
		$result = $this->db->insert('report_per_class',$data);
	}
	
	public function getDistinctSemAY($college)
	{
		$sql = $this->db->query("SELECT DISTINCT(sem_ay) FROM report_per_class ORDER BY sem_ay DESC");
		if($sql->num_rows() == 0){
			return null;
		}
		foreach ($sql->result() as $row){
			$sem_ay[] = $row->sem_ay;
		}
		return $sem_ay;
	}
}