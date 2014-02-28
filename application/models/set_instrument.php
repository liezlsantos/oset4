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
			$results['model_name'][] = $row->model_name;
			$results['table_name'][] = $row->table_name;
			$results['set_as_default'][] = $row->set_as_default;
		}
		return $results;
	}
	
	public function getFields($table)
	{
		$sql = $this->db->query("SHOW COLUMNS FROM $table WHERE Field NOT IN ('response_id', 'student_id', 'oset_class_id')");
		return $sql->result();
	}
		
	public function getInfo($id)
	{
		$sql = $this->db->query("SELECT * FROM set_instrument WHERE set_instrument_id = '$id'");
		return $sql->row();
	}
	
	public function getNextSetID()
	{
		$sql = $this->db->query("SELECT COUNT(*) count FROM set_instrument");
		return $sql->row()->count+1;
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
	}
	
	public function checkTableName($table_name)
	{
		$sql = $this->db->query("SELECT * FROM set_instrument WHERE table_name = '$table_name'");
		if($sql->num_rows() == 0)
			return TRUE;
		else 
			return FALSE;
	}
	
	public function isEmpty()
	{
		$sql = $this->db->query("SELECT * FROM set_instrument");
		if($sql->num_rows() == 0)
			return TRUE;
		else 
			return FALSE;
	}
	
	public function createTables($model)
	{
		$this->load->model('set/'.$model);
		$this->$model->createTable();	 
	}
	
	/*public function createTables($model, $table)
	{
		$this->load->model('set/'.$model);
		$this->$model->createTable();
		//create another table for archive
		$table_archive = $table.'_archive';
		$this->db->query("CREATE TABLE $table_archive LIKE $table");
		$this->db->query("ALTER TABLE `$table_archive` 
						  ADD  `sem_ay` VARCHAR(5) NOT NULL AFTER  `response_id` ,
						  ADD  `name` VARCHAR( 80 ) NOT NULL AFTER  `student_id` ,
						  ADD  `yearlevel` TINYINT NOT NULL AFTER  `name` ,
						  ADD  `program` VARCHAR( 30 ) NOT NULL AFTER  `yearlevel` ,
						  ADD  `section` VARCHAR( 10 ) NOT NULL AFTER  `oset_class_id` ,
						  ADD  `subject` VARCHAR( 20 ) NOT NULL AFTER  `section` ,
						  ADD  `instructor` VARCHAR( 50 ) NOT NULL AFTER  `subject`,
						  ADD  `department_code` VARCHAR( 10 ) NOT NULL AFTER  `instructor` ,
						  ADD  `college_code` VARCHAR( 10 ) NOT NULL AFTER  `department_code`");
		 
		 
	}*/
}