<?php
	
class CAS_SET_model extends CI_Model
{
	public function createTable()
	{
		$query =
			"CREATE TABLE IF NOT EXISTS `cas_set` (
			  `response_id` int(11) NOT NULL AUTO_INCREMENT,
			  `student_id` varchar(20) NOT NULL,
			  `oset_class_id` int(11) NOT NULL,
			  `part1_1` varchar(30) NOT NULL,
			  `part1_2` varchar(10) NOT NULL,
			  `part1_3` varchar(10) NOT NULL,
			  `part2_1` varchar(20) NOT NULL,
			  `part2_2` varchar(20) NOT NULL,
			  `part2_3` varchar(20) NOT NULL,
			  `part2_4` varchar(20) NOT NULL,
			  `part2_5` int(11) NOT NULL,
			  `part2_6` int(11) NOT NULL,
			  `part2_7` int(11) NOT NULL,
			  `part2_8` int(11) NOT NULL,
			  `part2_9` varchar(20) NOT NULL,
			  `part3_1` int(11) NOT NULL,
			  `part3_2` int(11) NOT NULL,
			  `part3_3` int(11) NOT NULL,
			  `part3_4` int(11) NOT NULL,
			  `part3_5` int(11) NOT NULL,
			  `part3_6` int(11) NOT NULL,
			  `part3_7` int(11) NOT NULL,
			  `part3_8` int(11) NOT NULL,
			  `part3_9` int(11) NOT NULL,
			  `part3_10` int(11) NOT NULL,
			  `part3_11` int(11) NOT NULL,
			  `part3_12` int(11) NOT NULL,
			  `part3_13` int(11) NOT NULL,
			  `part3_14` int(11) NOT NULL,
			  `part3_15` int(11) NOT NULL,
			  `part3_16` int(11) NOT NULL,
			  `part3_17` int(11) NOT NULL,
			  `part3_18` int(11) NOT NULL,
			  `part3_19` int(11) NOT NULL,
			  `part3_20` int(11) NOT NULL,
			  `part3_21` int(11) NOT NULL,
			  `part3_22` int(11) NOT NULL,
			  `part3_23` int(11) NOT NULL,
			  `part3_24` int(11) NOT NULL,
			  `part3_25` int(11) NOT NULL,
			  `part3_26` int(11) NOT NULL,
			  `part3_27` int(11) NOT NULL,
			  `part3_28` int(11) NOT NULL,
			  `part3_29` int(11) NOT NULL,
			  `part3_30` int(11) NOT NULL,
			  `part3_31` int(11) NOT NULL,
			  `part3_32` int(11) NOT NULL,
			  `part3_33` int(11) NOT NULL,
			  `part3_34` int(11) NOT NULL,
			  `part3_35` int(11) NOT NULL,
			  `part3_36` int(11) NOT NULL,
			  `part3_37` int(11) NOT NULL,
			  `part3_38` int(11) NOT NULL,
			  `part3_39` int(11) NOT NULL,
			  `part3_40` varchar(200) NOT NULL,
			  `part3_41` varchar(200) NOT NULL,
			  `part3_42` varchar(30) NOT NULL,
			  PRIMARY KEY (`response_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
			
		$this->db->query($query);
	}
	
	public function saveResponse($data)
	{
		$this->db->insert('cas_set',$data);
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
	
	public function checkIfEvaluated($oset_class_id, $student_id)
	{
		$sql = $this->db->query("SELECT evaluated FROM classlist WHERE oset_class_id = '$oset_class_id' AND student_id='$student_id'");
		return $sql->row()->evaluated;
	}
	
	//for reports
	public function getReportPerClassData($oset_class_id)
	{
		$data['part1_1'] = array('NR'=> 0, 'very active'=>0, 'somewhat active'=>0, 'not active'=>0, 'did not participate at all'=>0);	
		$data['part1_2'] = array('NR'=> 0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part1_3'] = array('NR'=> 0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		
		$data['part2_1'] = array('NR'=> 0, '2'=>0, '1'=>0, 'more than 2'=>0);	
		$data['part2_2'] = array('NR'=> 0, 'early morning'=>0, 'mid-morning'=>0, 'early afternoon'=>0, 'late afternoon'=>0);	
		$data['part2_3'] = array('NR'=> 0, '1.5'=>0, '3 or more'=>0);	
		$data['part2_4'] = array('NR'=> 0, 'lec'=>0, 'lab'=>0, 'combined'=>0, 'PE'=>0);	
		for($i = 5; $i <= 8; $i++)
			$data['part2_'.$i] = array(0=> 0, 1=>0, 2=>0, 3=>0, 4=>0);	
		$data['part2_9'] = array('NR'=> 0, '1'=>0, '2'=>0, '3 or more'=>0);	
		
		for($i = 1; $i <= 39; $i++)
			$data['part3_'.$i] = array(0=> 0, 1=>0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0);	
		$data['part3_40'] = "<br/>";
		$data['part3_41'] = "<br/>";
		$data['part3_42'] = array('NR'=>0, 'Knowledge about the subject'=>0, 'Style of teaching'=>0, 
									'Class management skills'=>0, 'Relationship with students'=>0, 'Personality of the teacher'=>0,
									'Impact of teaching on students'=>0);	
			
		$sql = $this->db->query("SELECT * FROM cas_set WHERE oset_class_id ='$oset_class_id'");
		
		foreach ($sql->result() as $row)
		{
			for($i = 1; $i <= 3; $i++)
			{
				$part="part1_".$i;
				$data[$part][$row->$part]++; 
			}
			
			for($i = 1; $i <= 9; $i++)
			{
				$part="part2_".$i;
				$data[$part][$row->$part]++; 
			}
			
			for($i = 1; $i <= 39; $i++)
			{
				$part="part3_".$i;
				$data[$part][$row->$part]++; 
			}
			
			if($row->part3_40)
				$data['part3_40'] .= $row->part3_40.'<br/>';
			if($row->part3_41)
				$data['part3_41'] .= $row->part3_41.'<br/>';
			
			$part="part3_42";
			$data['part3_42'][$row->$part]++; 
		}
		return $data;
	}
	
	public function saveReportPerClass($data)
	{
		$this->db->insert('report_per_class', $data);
	}
}
?>

