<?php
	
class Faculty extends CI_Model
{
	public function saveToDatabase($data)
	{
		$result = $this->db->insert('faculty',$data);
		
		if($result){
			return $this->db->insert_id();
		}

		return false;
	}
	
	public function getRecords()
	{
		$sql = $this->db->query("SELECT name, instructor_code FROM faculty ORDER BY name ASC ");
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		$i = 0;
		foreach ($sql->result() as $row){
			$results['instructor_code'][] = $row->instructor_code;
			$results['name'][] = $row->name;
		}
		return $results;
	}
	
	public function deleteAll()
	{
		$sql = $this->db->query("TRUNCATE faculty");
	}
	
	public function delete($instructor_code)
	{
		$sql = $this->db->query("DELETE FROM faculty WHERE instructor_code = '$instructor_code'");
	}
	
	/*public function import()
	{
		$this->db_crs = $this->load->database('crs', TRUE);
													
		$sql = $this->db_crs->query('SELECT instructorcode, employeeid, firstname, lastname from osetuser_employees_view');
		
		foreach ($sql->result() as $row){
			
			if($row->instructorcode)
			{
				$code = $row->instructorcode;
				$sql2 = $this->db->query("SELECT * from faculty WHERE instructor_code = '$code'");	
				if($sql2->num_rows() == 0)
				{
					$data = array(
						'name' 			   => strtoupper($row->firstname). Chr(32) .strtoupper($row->lastname),
						'instructor_code'  => str_replace(chr(32),'',$row->instructorcode)
						);
					$this->db->insert('faculty', $data);
				}
			}
		}		
	}*/
	
}
?>

