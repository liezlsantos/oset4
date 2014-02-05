<?php
	
class UPSET_model extends CI_Model
{
	public function createTable()
	{
		$query =
			"CREATE TABLE IF NOT EXISTS `up_set` (
			  `response_id` int(11) NOT NULL AUTO_INCREMENT,
			  `student_id` varchar(20) NOT NULL,
			  `oset_class_id` int(11) NOT NULL,
			  `part1_1` int(11) NOT NULL,
			  `part1_2` int(11) NOT NULL,
			  `part1_3` int(11) NOT NULL,
			  `part1_4` int(11) NOT NULL,
			  `part1_5` int(11) NOT NULL,
			  `part1_6` int(11) NOT NULL,
			  `part1_7` varchar(5) NOT NULL,
			  `part1_8` varchar(5) NOT NULL,
			  `part1_9` varchar(5) NOT NULL,
			  `part2a_1` int(11) NOT NULL,
			  `part2a_2` int(11) NOT NULL,
			  `part2a_3` int(11) NOT NULL,
			  `part2a_4` int(11) NOT NULL,
			  `part2a_5` int(11) NOT NULL,
			  `part2a_6` int(11) NOT NULL,
			  `part2a_7` int(11) NOT NULL,
			  `part2b_1` varchar(5) NOT NULL,
			  `part2b_1_1` varchar(5) NOT NULL,
			  `part2b_1_1_1` varchar(300) NOT NULL,
			  `part2b_1_1_2` varchar(5) NOT NULL,
			  `part2b_2` varchar(20) NOT NULL,
			  `part2b_3` varchar(20) NOT NULL,
			  `part2b_4` varchar(10) NOT NULL,
			  `part2b_5` varchar(200) NOT NULL,
			  `part2b_6` varchar(200) NOT NULL,
			  `part3a_1` int(11) NOT NULL,
			  `part3a_2` int(11) NOT NULL,
			  `part3a_3` int(11) NOT NULL,
			  `part3a_4` int(11) NOT NULL,
			  `part3a_5` int(11) NOT NULL,
			  `part3a_6` int(11) NOT NULL,
			  `part3a_7` int(11) NOT NULL,
			  `part3a_8` int(11) NOT NULL,
			  `part3a_9` int(11) NOT NULL,
			  `part3a_10` int(11) NOT NULL,
			  `part3a_11` int(11) NOT NULL,
			  `part3a_12` int(11) NOT NULL,
			  `part3a_13` int(11) NOT NULL,
			  `part3a_14` int(11) NOT NULL,
			  `part3a_15` int(11) NOT NULL,
			  `part3a_16` int(11) NOT NULL,
			  `part3a_17` int(11) NOT NULL,
			  `part3a_18` int(11) NOT NULL,
			  `part3a_19` int(11) NOT NULL,
			  `part3a_20` int(11) NOT NULL,
			  `part3a_21` int(11) NOT NULL,
			  `part3a_22` int(11) NOT NULL,
			  `part3a_23` int(11) NOT NULL,
			  `part3a_24` int(11) NOT NULL,
			  `part3a_25` int(11) NOT NULL,
			  `part3a_26` int(11) NOT NULL,
			  `part3b_1` varchar(5) NOT NULL,
			  `part3b_2` varchar(5) NOT NULL,
			  `part3b_3` varchar(10) NOT NULL,
			  `part3b_4` varchar(100) NOT NULL,
			  `part3b_5` varchar(20) NOT NULL,
			  `part3b_6_1` varchar(20) NOT NULL,
			  `part3b_6_2` varchar(200) NOT NULL,
			  `part3b_7` varchar(20) NOT NULL,
			  `part3c` varchar(20) NOT NULL,
			  PRIMARY KEY (`response_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
			
		$this->db->query($query);
	}
	
	public function saveResponse($data)
	{
		$this->db->insert('up_set',$data);
	}
	
	public function saveScore($data)
	{
		$this->db->insert("score_per_respondent", $data);
	}
	
	public function updateEvalStatus($oset_class_id, $student_id, $data)
	{
		$this->db->where('oset_class_id', $oset_class_id);
		$this->db->where('student_id', $student_id);
		$this->db->update('classlist', $data); 
		
		$sql = $this->db->query("SELECT no_of_respondents FROM class WHERE oset_class_id = '$oset_class_id'");
		$count = $sql->row()->no_of_respondents + 1;
		$this->db->where('oset_class_id', $oset_class_id);
		$value['no_of_respondents'] = $count;
		$this->db->update('class', $value);
	}
	
	//for reports
	public function getClassesWithThisSET($college_code)
	{
		$sql = $this->db->query("SELECT oset_class_id, class_id, no_of_respondents, instructor, subject, section FROM class WHERE 
		set_instrument_id = '1' AND open = '2' AND college_code = '$college_code'");
		
		if($sql->num_rows() > 0)
		{
			foreach ($sql->result() as $row){
				$classes['id'][] = $row->oset_class_id;
				$classes['class_id'][] = $row->class_id;
				$classes['instructor'][] = $row->instructor;
				$classes['subject'][] = $row->subject;
				$classes['section'][] = $row->section;
				$classes['no_of_respondents'][] = $row->no_of_respondents;
			}
			return $classes;
		}
		else
			return null;
	}

	public function getReportPerClassData($oset_class_id)
	{
		$data['part1_1'] = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
		$data['part1_2'] = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
		$data['part1_3'] = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
		$data['part1_4'] = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
		$data['part1_5'] = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
		$data['part1_6'] = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
		$data['part1_7'] = array(0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part1_8'] = array(0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part1_9'] = array('1.0'=>0, '1.25'=>0, '1.5'=>0, '1.75'=>0, '2.0'=>0, '2.25'=>0, '2.5'=>0, '2.75'=>0, '3.0'=>0, 'INC'=>0);	
		
		/*
		$sql = $this->db->query("SELECT part1_1, COUNT(part1_1) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_1");
			foreach ($sql->result() as $row)
				$data['part1_1'][$row->part1_1] = $row->counter; 
		
		$sql = $this->db->query("SELECT part1_2, COUNT(part1_2) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_2");
			foreach ($sql->result() as $row)
				$data['part1_2'][$row->part1_2] = $row->counter;
				
		$sql = $this->db->query("SELECT part1_3, COUNT(part1_3) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_3");
			foreach ($sql->result() as $row)
				$data['part1_3'][$row->part1_3] = $row->counter;
		
		$sql = $this->db->query("SELECT part1_4, COUNT(part1_4) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_4");
			foreach ($sql->result() as $row)
				$data['part1_4'][$row->part1_4] = $row->counter;
		
		$sql = $this->db->query("SELECT part1_5, COUNT(part1_5) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_5");
			foreach ($sql->result() as $row)
				$data['part1_5'][$row->part1_5] = $row->counter;
		
		$sql = $this->db->query("SELECT part1_6, COUNT(part1_6) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_6");
			foreach ($sql->result() as $row)
				$data['part1_6'][$row->part1_6] = $row->counter;
		
		$sql = $this->db->query("SELECT part1_7, COUNT(part1_7) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_7");
			foreach ($sql->result() as $row)
				$data['part1_7'][$row->part1_7] = $row->counter;
			
		$sql = $this->db->query("SELECT part1_8, COUNT(part1_8) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_8");
			foreach ($sql->result() as $row)
				$data['part1_8'][$row->part1_8] = $row->counter;
		
		$sql = $this->db->query("SELECT part1_9, COUNT(part1_9) counter FROM up_set WHERE oset_class_id =
		 '$oset_class_id' GROUP BY part1_9");
			foreach ($sql->result() as $row)
				$data['part1_9'][$row->part1_9] = $row->counter;
		*/
		
		$sql = $this->db->query("SELECT * FROM up_set WHERE oset_class_id ='$oset_class_id'");
		
		foreach ($sql->result() as $row)
		{
			switch($row->part1_1){
				case '1': $data['part1_1'][1]++; break;
				case '2': $data['part1_1'][2]++; break;
				case '3': $data['part1_1'][3]++; break;
				case '4': $data['part1_1'][4]++; break;
				case '5': $data['part1_1'][5]++; break;
			}
			
			switch($row->part1_2){
				case '1': $data['part1_2'][1]++; break;
				case '2': $data['part1_2'][2]++; break;
				case '3': $data['part1_2'][3]++; break;
				case '4': $data['part1_2'][4]++; break;
				case '5': $data['part1_2'][5]++; break;
			}
			
			switch($row->part1_3){
				case '1': $data['part1_3'][1]++; break;
				case '2': $data['part1_3'][2]++; break;
				case '3': $data['part1_3'][3]++; break;
				case '4': $data['part1_3'][4]++; break;
				case '5': $data['part1_3'][5]++; break;
			}
			
			switch($row->part1_4){
				case '1': $data['part1_4'][1]++; break;
				case '2': $data['part1_4'][2]++; break;
				case '3': $data['part1_4'][3]++; break;
				case '4': $data['part1_4'][4]++; break;
				case '5': $data['part1_4'][5]++; break;
			}
			
			switch($row->part1_5){
				case '1': $data['part1_5'][1]++; break;
				case '2': $data['part1_5'][2]++; break;
				case '3': $data['part1_5'][3]++; break;
				case '4': $data['part1_5'][4]++; break;
				case '5': $data['part1_5'][5]++; break;
			}
			
			switch($row->part1_6){
				case '1': $data['part1_6'][1]++; break;
				case '2': $data['part1_6'][2]++; break;
				case '3': $data['part1_6'][3]++; break;
				case '4': $data['part1_6'][4]++; break;
				case '5': $data['part1_6'][5]++; break;
			}
			
			switch($row->part1_7){
				case '0': $data['part1_7'][0]++; break;
				case '1': $data['part1_7'][1]++; break;
				case '2-3': $data['part1_7']['2-3']++; break;
				case '4-5': $data['part1_7']['4-5']++; break;
				case '6': $data['part1_7'][6]++; break;
			}
			
			switch($row->part1_8){
				case '0': $data['part1_8'][0]++; break;
				case '1': $data['part1_8'][1]++; break;
				case '2-3': $data['part1_8']['2-3']++; break;
				case '4-5': $data['part1_8']['4-5']++; break;
				case '6': $data['part1_8'][6]++; break;
			}
			
			switch($row->part1_9){
				case '1.0': $data['part1_9']['1.0']++; break;
				case '1.25': $data['part1_9']['1.25']++; break;
				case '1.5': $data['part1_9']['1.5']++; break;
				case '1.75': $data['part1_9']['1.75']++; break;
				case '2.0': $data['part1_9']['2.0']++; break;
				case '2.25': $data['part1_9']['2.25']++; break;
				case '2.5': $data['part1_9']['2.5']++; break;
				case '2.75': $data['part1_9']['2.75']++; break;
				case '3.0': $data['part1_9']['3.0']++; break;
				case 'INC': $data['part1_9']['INC']++; break;
			}
			
		}
		
		return $data;
	}

	public function saveReportPerClass($data)
	{
		$this->db->insert('report_per_class', $data);
	}
	
}
?>

