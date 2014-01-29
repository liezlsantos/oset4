<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SET_instrument extends CI_Model
{
	public function getRecords()
	{
		$sql = $this->db->query("SELECT * FROM set_instrument");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['set_instrument_id'][] = $row->set_instrument_id;
			$results['name'][] = $row->name;
			$results['controller_name'][] = $row->controller_name;
			$results['set_as_default'][] = $row->set_as_default;
		}
		return $results;
	}	
	
	public function getInfo($id)
	{
		$sql = $this->db->query("SELECT * FROM set_instrument WHERE set_instrument_id = '$id'");
		return $sql->row();
	}
	
	public function getDefaultSET()
	{
		$sql = $this->db->query("SELECT * FROM set_instrument WHERE set_as_default = '1'");
		return $sql->row()->set_instrument_id;
	}
	
	public function setAsDefault($set_id)
	{
		$sql = $this->db->query("UPDATE set_instrument SET set_as_default = '0'");
		$sql = $this->db->query("UPDATE set_instrument SET set_as_default = '1' WHERE set_instrument_id = '$set_id'");
	}
	
	public function updateRecord($data, $id)
	{
		$this->db->where('set_instrument_id', $id);
		$this->db->update('set_instrument', $data); 
	}
	
	public function saveToDatabase($data)
	{
		$result = $this->db->insert('set_instrument',$data);
		
		if($result){
			return $this->db->insert_id();
		}

		return false;
	}
	
	public function isEmpty()
	{
		$sql = $this->db->query("SELECT * FROM set_instrument");
		if($sql->num_rows() == 0)
			return TRUE;
		else 
			return FALSE;
	}		
}