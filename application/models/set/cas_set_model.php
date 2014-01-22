<?php
	
class CAS_SET_model extends CI_Model
{
	public function createTable()
	{
		$query =
			"CREATE TABLE IF NOT EXISTS `up_set` (
			  `response_id` int(11) NOT NULL AUTO_INCREMENT,
			  `student_ID` varchar(20) NOT NULL,
			  `set_class_id` int(11) NOT NULL,
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
	
}
?>

