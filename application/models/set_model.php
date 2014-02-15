<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SET_model extends CI_Model
{
	public function updateSETstatus($data)
	{
		$this->db->update('set_status', $data);	
	}
	
	public function getRecords()
	{
		$sql = $this->db->query("SELECT * FROM set_status");
		if ($sql->num_rows() == 0){
			return null;
		}
		$results['accounts_generated'] = $sql->row()->accounts_generated;
		$results['semester'] = $sql->row()->sem_ay;
		return $results;
	}	
	
	public function resetSET()
	{
		$this->db->update('set_status', array('accounts_generated' => '0'));	
		$this->db->query('TRUNCATE score_per_respondent');
		$sql = $this->db->query('SELECT table_name FROM set_instrument');
		if($sql->num_rows() > 0)
		{
			foreach ($sql->result() as $row)
				$this->db->query('TRUNCATE '.$row->table_name);
		}
	}
}