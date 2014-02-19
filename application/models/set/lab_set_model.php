<?php
	
class LAB_SET_model extends CI_Model
{
	public function createTable()
	{
		$query =
			"CREATE TABLE IF NOT EXISTS `lab_set` (
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
			  `part3b_1` varchar(5) NOT NULL,
			  `part3b_2` varchar(5) NOT NULL,
			  `part3b_3` varchar(10) NOT NULL,
			  `part3b_4` varchar(20) NOT NULL,
			  `part3b_5_1` varchar(20) NOT NULL,
			  `part3b_5_2` varchar(200) NOT NULL,
			  `part3b_6` varchar(20) NOT NULL,
			  `part3c` varchar(200) NOT NULL,
			  PRIMARY KEY (`response_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";
			
		$this->db->query($query);
	}
	
	public function saveResponse($data)
	{
		$this->db->insert('lab_set',$data);
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
		$sql = $this->db->query("SELECT subject, section, instructor, college_code, department_code,
		 class_id, no_of_respondents
		 FROM class WHERE oset_class_id = '$oset_class_id'");
		
		$data['section'] = $sql->row()->section;
		$data['department_code'] = $sql->row()->department_code;
		$data['college_code'] = $sql->row()->college_code;
		$data['instructor'] = $sql->row()->instructor;
		$data['subject'] = $sql->row()->subject.'-'.$sql->row()->section;
		$data['no_of_respondents'] = $sql->row()->no_of_respondents;	
		$data['class_id'] = $sql->row()->class_id;
		$sem = substr($sql->row()->class_id, 0, 4);
		$sem2 = $sem+1;
		$data['sem_ay'] = substr($sql->row()->class_id, 4, 1).' / '.$sem.'-'.$sem2;		
		$data['filename'] = $filename = './reports/report_per_class/'.$sql->row()->instructor.'-'.$sql->row()->class_id.'.pdf';		
		
		for($i = 1; $i <= 6; $i++)
			$data['part1_'.$i] = array(0=> 0, 1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
	
		$data['part1_7'] = array('NR'=> 0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part1_8'] = array('NR'=> 0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part1_9'] = array('NR'=> 0, '1.0'=>0, '1.25'=>0, '1.5'=>0, '1.75'=>0, '2.0'=>0, '2.25'=>0, '2.5'=>0, '2.75'=>0, '3.0'=>0, 'INC'=>0);	
		
		for($i = 1; $i <= 5; $i++)
			$data['part2a_'.$i] = array(0=> 0, 1=>0, 2=>0, 3=>0, 4=>0);	
		
		$data['part2b_1'] = array('yes'=>0, 'no'=>0);
		$data['part2b_1_1'] = array('yes'=>0, 'no'=>0);
		$data['part2b_1_1_2'] = array('yes'=>0, 'no'=>0);
		$data['part2b_2'] = array('NR'=>0, 'Too fast'=>0, 'Fast'=>0, 'Just right'=>0, 'Slow'=>0, 'Too slow'=>0, 'Others'=>0);
		$data['part2b_3'] = array('NR'=>0, 'Very much'=>0, 'Much'=>0, 'Some'=>0, 'Very little'=>0, 'Nothing'=>0);
		$data['part2b_4'] = array('NR'=>0, 'Very much'=>0, 'Much'=>0, 'Moderately'=>0, 'Slightly'=>0, 'Not at all'=>0);
		$data['part2b_5'] = "<br/>";
		$data['part2b_6'] = "<br/>";

		for($i = 1; $i <= 16; $i++)
			$data['part3a_'.$i] = array(0=> 0, 1=>0, 2=>0, 3=>0, 4=>0);	
	
		$data['part3b_1'] = array('NR'=>0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part3b_2'] = array('NR'=>0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);
		$data['part3b_3'] = array('NR'=>0, 'On time'=>0, 'Early'=>0, 'Late'=>0);
		$data['part3b_4'] = array('NR'=>0, 'One week'=>0, 'Two weeks'=>0, 'One month'=>0, 'More than one month'=>0, 'Never'=>0);
		$data['part3b_5_1'] = array('NR'=>0, 'Always'=>0, 'Usually'=>0, 'Sometimes'=>0, 'Rarely'=>0, 'Never'=>0);	
		$data['part3b_6'] =  array('NR'=>0, 'The best'=>0, 'Among the best'=>0, 'Average'=>0, 'Among the worst'=>0, 'The worst'=>0);	
		$data['part3c'] = "<br/>";
		
		$sql = $this->db->query("SELECT * FROM lab_set WHERE oset_class_id ='$oset_class_id'");
		
		foreach ($sql->result() as $row)
		{
			for($i = 1; $i <= 9; $i++)
			{
				$part="part1_".$i;
				$data[$part][$row->$part]++; 
			}
			
			for($i = 1; $i <= 5; $i++)
			{
				$part="part2a_".$i;
				$data[$part][$row->$part]++; 
			}
			
			for($i = 2; $i <= 4; $i++)
			{
				$part="part2b_".$i;
				$data[$part][$row->$part]++; 
			}
			
			if($row->part2b_1)
				$data['part2b_1'][$row->part2b_1]++; 
			if($row->part2b_1_1)
				$data['part2b_1_1'][$row->part2b_1_1]++; 
			if($row->part2b_1_1_2)
				$data['part2b_1_1_2'][$row->part2b_1_1_2]++; 
			
			if($row->part2b_5)
				$data['part2b_5'] .= $row->part2b_5.'<br/>';
			if($row->part2b_6)
				$data['part2b_6'] .= $row->part2b_6.'<br/>';
			
			for($i = 1; $i <= 16; $i++)
			{
				$part="part3a_".$i;
				$data[$part][$row->$part]++; 
			}
			
			for($i = 1; $i <= 6; $i++)
			{
				$part="part3b_".$i;
				if($i == 5)
					$part="part3b_5_1";
				$data[$part][$row->$part]++; 
			}
			
			if($row->part3c)
				$data['part3c'] .= $row->part3c.'<br/>';
		}
		return $data;
	}

	public function generateReportPerClass($oset_class_id)
	{
		$this->load->helper('file');
		$this->load->model('report_per_class');
		//pdf		
		$this->load->helper(array('dompdf', 'file'));
		$data = $this->getReportPerClassData($oset_class_id);
		//archive report
		$html = $this->load->view('set/labset_detailedreport_view', $data, TRUE);
		$pdf_data = pdf_create($html, '' , FALSE);  
		write_file($data['filename'], $pdf_data);
		//save link to db	
		$data = array('course' =>	$data['subject'],
					  'sem_ay' => substr($data['class_id'], 0, 5), 
					  'instructor' => $data['instructor'], 
					  'path' => $data['filename'],
					  'college' => $data['college_code'],
					  'department' => $data['department_code']);
			
		$this->report_per_class->saveToDatabase($data);
	}
}
?>

