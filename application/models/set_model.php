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
		$this->load->helper('file');
		if($sql->num_rows() > 0)
		{
			foreach ($sql->result() as $row)
			{		
				$this->db->query('TRUNCATE '.$row->table_name);
				$this->writeCSV($row->table_name);
			}
		}
	}
	
	public function writeCSV($table_name)
	{
		$this->load->model('set_instrument');
		//create file
		$file = './csv/'.$table_name.'.csv';
		$fp = fopen($file, 'w');
		//write column header
		$header = '"student_number","student_name","student_program","subject","section","instructor","department_code","college_code",';
		$fields = $this->set_instrument->getFields($table_name);
		
		foreach ($fields as $row)
			$header .= '"'.$row->Field.'",';
		$header = rtrim($header, ",");
		
		fwrite($fp, $header);
		fclose($fp);
	}
}