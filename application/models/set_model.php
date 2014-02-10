<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SET_model extends CI_Model
{
	public function updateRecord($data)
	{
		$data['value'] = 1;
		$this->db->where('flag_id', '1');
		$this->db->update('flags', $data); 	
		
		$val['value'] = 0;
		$this->db->where('flag_id', '2');
		$this->db->update('flags', $val);	
	}
	
	public function getRecords()
	{
		$sql = $this->db->query("SELECT * FROM flags");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results[$row->flag_name] = $row->value;
			if($row->flag_name == "semester")
				if($row->value)
					$results['semester'] = $row->extended_value;
		}
		return $results;
	}	
	
	public function resetSET()
	{
		$this->db->query('TRUNCATE score_per_respondent');
		$sql = $this->db->query('SELECT table_name FROM set_instrument');
		if($sql->num_rows() > 0)
		{
			foreach ($sql->result() as $row)
				$this->db->query('TRUNCATE '.$row->table_name);
		}
	}
}