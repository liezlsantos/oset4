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
	public function getReportPerClassData($oset_class_id)
	{
		for($i = 1; $i <= 6; $i++)
			$data['part1_'.$i] = array('NR'=> 0, 1=>0, 2=>0, 3=>0, 4=>0, 5=>0);	
	
		$data['part1_7'] = array('NR'=> 0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part1_8'] = array('NR'=> 0, 0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part1_9'] = array('NR'=> 0, '1.0'=>0, '1.25'=>0, '1.5'=>0, '1.75'=>0, '2.0'=>0, '2.25'=>0, '2.5'=>0, '2.75'=>0, '3.0'=>0, 'INC'=>0);	
		
		for($i = 1; $i <= 7; $i++)
			$data['part2a_'.$i] = array('NR'=> 0, 1=>0, 2=>0, 3=>0, 4=>0);	
		
		$data['part2b_1'] = array('yes'=>0, 'no'=>0);
		$data['part2b_1_1'] = array('yes'=>0, 'no'=>0);
		$data['part2b_1_1_2'] = array('yes'=>0, 'no'=>0);
		$data['part2b_2'] = array('Too fast'=>0, 'Fast'=>0, 'Just right'=>0, 'Slow'=>0, 'Too slow'=>0, 'Others'=>0);
		$data['part2b_3'] = array('Very much'=>0, 'Much'=>0, 'Some'=>0, 'Very little'=>0, 'Nothing'=>0);
		$data['part2b_4'] = array('Very much'=>0, 'Much'=>0, 'Moderately'=>0, 'Slightly'=>0, 'Not at all'=>0);
		$data['part2b_5'] = "<br/>";
		$data['part2b_6'] = "<br/>";

		for($i = 1; $i <= 26; $i++)
			$data['part3a_'.$i] = array('NR'=> 0, 1=>0, 2=>0, 3=>0, 4=>0);	
	
		$data['part3b_1'] = array(0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);	
		$data['part3b_2'] = array(0=>0, 1=>0, '2-3'=>0, '4-5'=>0, 6=>0);
		$data['part3b_3'] = array('Too early'=>0, 'Early'=>0, 'On time'=>0, 'Late'=>0, 'Very late'=>0);
		$data['part3b_4'] = array('recitation'=>0, 'quizzes'=>0, 'midterms'=>0, 'finals'=>0, 'reports'=>0, 'papers'=>0, 'others'=>0);
		$data['part3b_5'] = array('One week'=>0, 'Two weeks'=>0, 'One month'=>0, 'More than one month'=>0, 'Never'=>0);
		$data['part3b_6_1'] = array('Always'=>0, 'Usually'=>0, 'Sometimes'=>0, 'Rarely'=>0, 'Never'=>0);	
		$data['part3b_7'] =  array('The best'=>0, 'Among the best'=>0, 'Average'=>0, 'Among the worst'=>0, 'The worst'=>0);	
		$data['part3c'] = "<br/>";
		
		$sql = $this->db->query("SELECT * FROM up_set WHERE oset_class_id ='$oset_class_id'");
		
		foreach ($sql->result() as $row)
		{
			for($i = 1; $i <= 6; $i++)
			{
				$part="part1_".$i;
				switch($row->$part){
					case '0': $data['part1_'.$i]['NR']++; break;
					case '1': $data['part1_'.$i][1]++; break;
					case '2': $data['part1_'.$i][2]++; break;
					case '3': $data['part1_'.$i][3]++; break;
					case '4': $data['part1_'.$i][4]++; break;
					case '5': $data['part1_'.$i][5]++; break;
				}
			}
			
			switch($row->part1_7){
				case 'NR': $data['part1_7']['NR']++; break;
				case '0': $data['part1_7'][0]++; break;
				case '1': $data['part1_7'][1]++; break;
				case '2-3': $data['part1_7']['2-3']++; break;
				case '4-5': $data['part1_7']['4-5']++; break;
				case '6': $data['part1_7'][6]++; break;
			}
			
			switch($row->part1_8){
				case 'NR': $data['part1_8']['NR']++; break;
				case '0': $data['part1_8'][0]++; break;
				case '1': $data['part1_8'][1]++; break;
				case '2-3': $data['part1_8']['2-3']++; break;
				case '4-5': $data['part1_8']['4-5']++; break;
				case '6': $data['part1_8'][6]++; break;
			}
			
			switch($row->part1_9){
				case 'NR': $data['part1_8']['NR']++; break;
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

			for($i = 1; $i <= 7; $i++)
			{
				$part="part2a_".$i;
				switch($row->$part){
					case '0': $data['part2a_'.$i]['NR']++; break;
					case '1': $data['part2a_'.$i][1]++; break;
					case '2': $data['part2a_'.$i][2]++; break;
					case '3': $data['part2a_'.$i][3]++; break;
					case '4': $data['part2a_'.$i][4]++; break;
				}
			}
			
			switch($row->part2b_1){
				case 'yes': $data['part2b_1']['yes']++; break;
				case 'no': $data['part2b_1']['no']++; break;
			}
			
			switch($row->part2b_1_1){
				case 'yes': $data['part2b_1_1']['yes']++; break;
				case 'no': $data['part2b_1_1']['no']++; break;
			}
			
			switch($row->part2b_1_1_2){
				case 'yes': $data['part2b_1_1_2']['yes']++; break;
				case 'no': $data['part2b_1_1_2']['no']++; break;
			}

			switch($row->part2b_2){
				case 'Too fast': $data['part2b_2']['Too fast']++; break;
				case 'Fast': $data['part2b_2']['Fast']++; break;
				case 'Just right': $data['part2b_2']['Just right']++; break;
				case 'Slow': $data['part2b_2']['Slow']++; break;
				case 'Too slow': $data['part2b_2']['Too slow']++; break;
				default: $data['part2b_2']['Others']++; break;
			}
			
			switch($row->part2b_3){
				case 'Very much': $data['part2b_3']['Very much']++; break;
				case 'Much': $data['part2b_3']['Much']++; break;
				case 'Some': $data['part2b_3']['Some']++; break;
				case 'Very little': $data['part2b_3']['Very little']++; break;
				case 'Nothing': $data['part2b_3']['Nothing']++; break;
			}

			switch($row->part2b_4){
				case 'Very much': $data['part2b_4']['Very much']++; break;
				case 'Much': $data['part2b_4']['Much']++; break;
				case 'Moderately': $data['part2b_4']['Moderately']++; break;
				case 'Slightly': $data['part2b_4']['Slightly']++; break;
				case 'Not at all': $data['part2b_4']['Not at all']++; break;
			}

			if($row->part2b_5)
				$data['part2b_5'] .= $row->part2b_5.'<br/>';
			if($row->part2b_6)
				$data['part2b_6'] .= $row->part2b_6.'<br/>';
			
			for($i = 1; $i <= 26; $i++)
			{
				$part="part3a_".$i;
				switch($row->$part){
					case '0': $data['part3a_'.$i]['NR']++; break;
					case '1': $data['part3a_'.$i][1]++; break;
					case '2': $data['part3a_'.$i][2]++; break;
					case '3': $data['part3a_'.$i][3]++; break;
					case '4': $data['part3a_'.$i][4]++; break;
				}
			}
			
			switch($row->part3b_1){
				case '0': $data['part3b_1'][0]++; break;
				case '1': $data['part3b_1'][1]++; break;
				case '2-3': $data['part3b_1']['2-3']++; break;
				case '4-5': $data['part3b_1']['4-5']++; break;
				case '6': $data['part3b_1'][6]++; break;
			}
			
			switch($row->part3b_2){
				case '0': $data['part3b_2'][0]++; break;
				case '1': $data['part3b_2'][1]++; break;
				case '2-3': $data['part3b_2']['2-3']++; break;
				case '4-5': $data['part3b_2']['4-5']++; break;
				case '6': $data['part3b_2'][6]++; break;
			}
			
			switch($row->part3b_3){
				case 'Too early': $data['part3b_3']['Too early']++; break;
				case 'On time': $data['part3b_3']['On time']++; break;
				case 'Late': $data['part3b_3']['Late']++; break;
				case 'Very late': $data['part3b_3']['Very late']++; break;
			}

			$other = $row->part3b_4;
			if(strpos($row->part3b_4, 'recitation') !== FALSE) 
			{
				$data['part3b_4']['recitation']++;
				$other = str_replace("recitation", "", $other);
			}
			if(strpos($row->part3b_4, 'quizzes') !== FALSE) 
			{
				$data['part3b_4']['quizzes']++;
				$other = str_replace("quizzes", "", $other);
			}
			if(strpos($row->part3b_4, 'midterms') !== FALSE) 
			{
				$data['part3b_4']['midterms']++;
				$other = str_replace("midterms", "", $other);
			}
			if(strpos($row->part3b_4, 'finals') !== FALSE) 
			{
				$data['part3b_4']['finals']++;
				$other = str_replace("finals", "", $other);
			}
			if(strpos($row->part3b_4, 'reports') !== FALSE) 
			{
				$data['part3b_4']['reports']++;
				$other = str_replace("reports", "", $other);
			}
			if(strpos($row->part3b_4, 'papers') !== FALSE) 
			{
				$data['part3b_4']['papers']++;
				$other = str_replace("papers", "", $other);
			}
			if($other = trim(str_replace(";", "", $other)))
				$data['part3b_4']['others']++;
			
			switch($row->part3b_5){
				case 'One week': $data['part3b_5']['One week']++; break;
				case 'Two weeks': $data['part3b_5']['Two weeks']++; break;
				case 'One month': $data['part3b_5']['One month']++; break;
				case 'More than one month': $data['part3b_5']['More than one month']++; break;
				case 'Never': $data['part3b_5']['Never']++; break;
			}
			
			switch($row->part3b_6_1){
				case 'Always': $data['part3b_6_1']['Always']++; break;
				case 'Usually': $data['part3b_6_1']['Usually']++; break;
				case 'Sometimes': $data['part3b_6_1']['Sometimes']++; break;
				case 'Rarely': $data['part3b_6_1']['Rarely']++; break;
				case 'Never': $data['part3b_6_1']['Never']++; break;
			}
			
			switch($row->part3b_7){
				case 'The best': $data['part3b_7']['The best']++; break;
				case 'Among the best': $data['part3b_7']['Among the best']++; break;
				case 'Average': $data['part3b_7']['Average']++; break;
				case 'Among the worst': $data['part3b_7']['Among the worst']++; break;
				case 'The worst': $data['part3b_7']['The Worst']++; break;
			}
				
			if($row->part3c)
				$data['part3c'] .= $row->part3c.'<br/>';
			
		}
		return $data;
	}

	public function saveReportPerClass($data)
	{
		$this->db->insert('report_per_class', $data);
	}
	
}
?>

