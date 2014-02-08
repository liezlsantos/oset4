<?php
	
class Student extends CI_Model
{
	public function getRecords($college_code, $keyword)
	{
		$sql = $this->db->query("SELECT * FROM student WHERE college_code LIKE '%$college_code%' AND name LIKE '%$keyword%' ORDER BY college_code, name ASC");
		
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results['name'][] = $row->name;
			$results['student_id'][] = $row->student_id;
			$results['college_code'][] = $row->college_code;
			$results['program'][] = $row->program;
		}
		return $results;
	}
		
	public function getInfo($student_id)
	{
		$sql = $this->db->query("SELECT * FROM student WHERE student_id = '$student_id'");
		return $sql->row();
	}
	
	public function getClasses($student_id)
	{
		$sql = $this->db->query("SELECT class.oset_class_id,subject, section, instructor, department_code
		 FROM classlist, class WHERE class.oset_class_id = classlist.oset_class_id AND student_id = '$student_id'");
		
		$i = 0;
		foreach ($sql->result() as $row)
		{
			$results['class_id'][$i] = $row->oset_class_id;
			$results['subject'][$i] = $row->subject;
			$results['section'][$i] = $row->section;
			$results['department_code'][$i] = $row->department_code;
			$results['instructor'][$i] = $row->instructor;
			$i++;
		}
		return $results;
	}
	
	public function getClassesToEvaluate($student_id)
	{
		$sql = $this->db->query("SELECT class.oset_class_id, subject, section, faculty.name, controller_name, open, evaluated  
			FROM class, classlist, faculty, set_instrument WHERE 
			class.oset_class_id = classlist.oset_class_id AND 
			instructor = instructor_code AND 
			set_instrument.set_instrument_id = class.set_instrument_id
			AND student_id = '$student_id' ORDER BY subject, name");
			
		foreach ($sql->result() as $row)
		{
			$results['oset_class_id'][] = $row->oset_class_id;
			$results['subject'][] = $row->subject;
			$results['section'][] = $row->section;
			$results['controller_name'][] = $row->controller_name;
			$results['instructor'][] = $row->name;
			$results['open'][] = $row->open;
			$results['evaluated'][] = $row->evaluated;
		}
		return $results;
	}
	
	public function getUnevaluatedClasses($student_id)
	{
		$sql = $this->db->query("SELECT subject, section, instructor FROM classlist, class
		WHERE student_id = '$student_id' AND classlist.oset_class_id = class.oset_class_id
		AND evaluated = '0'");
		
		if ($sql->num_rows() == 0){
			return false;
		}
		
		foreach ($sql->result() as $row){
			$results['subject'][] = $row->subject;
			$results['section'][] = $row->section;
			$results['instructor'][] = $row->instructor;
		}
	
		return $results;
	}
	
	public function deleteAll()
	{
		$sql = $this->db->query("TRUNCATE student");
	}
	
	public function update($data, $id)
	{
		$this->db->where('student_id', $id);
		$this->db->update('student', $data); 
	}
	
	public function importClasslist()
	{
		$sql = $this->db->query("SELECT * FROM flags");
		if ($sql->num_rows() == 0){
			return null;
		}
		
		foreach ($sql->result() as $row){
			$results[$row->flag_name] = $row->value;
			if($row->flag_name == "semester")
				$sem = $row->extended_value;
		}
		
		$this->db_crs = $this->load->database('crs', TRUE);
		
		//delete classlist, student
		$sql = $this->db->query("TRUNCATE classlist");
		$sql = $this->db->query("TRUNCATE student");
		
		$sql = $this->db->query("SELECT oset_class_id, class_id from class where activated = '1'");
		foreach ($sql->result() as $row){
			$activatedClasses['oset_class_id'][] = $row->oset_class_id;
			$activatedClasses['class_id'][] = $row->class_id;
		}
		
		$i = 0;
		$query = "INSERT INTO classlist (oset_class_id, student_id) VALUES ";
		foreach ($activatedClasses['class_id'] as $activatedClass)
		{			
			$sql = $this->db_crs->query("SELECT studentid, classid from osetuser_classlists_view where classid = '$activatedClass'");		
			foreach ($sql->result() as $row)
			{
				$query .= "('".$activatedClasses['oset_class_id'][$i]."', '".$row->studentid."'), ";
			}
			
			$i++;
			if(($i) % 100 == 0)
			{
				$query = substr($query, 0, strlen($query)-2);
				$sql = $this->db->query($query);
				$query = "INSERT INTO classlist (oset_class_id, student_id) VALUES ";
			}
		}
		if($i % 100 != 0)
		{
			$query = substr($query, 0, strlen($query)-2);
			$sql = $this->db->query($query);
		}
	}

	public function importStudents()
	{	
		//import students (based on classlist)
		$this->db_crs = $this->load->database('crs', TRUE);
		$sql = $this->db->query("SELECT DISTINCT student_id FROM classlist");
		foreach ($sql->result() as $row){
			$activatedStudents[] = $row->student_id;
		}
	
		$query = "INSERT INTO student (student_id, name, college_code, program, yearlevel) VALUES ";
		$i = 0;
		foreach ($activatedStudents as $activatedStudent)
		{
			$sql = $this->db_crs->query("SELECT s.studentid, unit, program, yearlevel, lastname, firstname from osetuser_students_view s, osetuser_studentterms_view st where s.studentid = st.studentid AND s.studentid = '$activatedStudent'");
			$row = $sql->row();
			
			$unit = $row->unit;
			if($row->unit == 'NTTC')
				$unit = 'NTTCHP';
		
			 $query .= '("'.$row->studentid.'", "'.$row->lastname . ', ' . $row->firstname.'",
			 			"'.$row->unit.'", "'.$row->program.'", "'.$row->yearlevel.'"), ';
				
			if($i % 50 == 0)
			{
				$query = substr($query, 0, strlen($query)-2);
				$sql = $this->db->query($query);
				$query = "INSERT INTO student (student_id, name, college_code, program, yearlevel) VALUES ";
			}
			$i++;			
		}
		
		if($i % 150 != 0)
		{
			$query = substr($query, 0, strlen($query)-2);
			$sql = $this->db->query($query);
		}
	}	

	public function updateFlagsAfterGeneratingPasswords()
	{
		$val['value'] = 1;
		$this->db->where('flag_id', '2');
		$this->db->update('flags', $val); 
	}

	public function accountGenerated()
	{
		$sql = $this->db->query("SELECT value FROM flags WHERE flag_id = '2'");
		if($sql->row()->value == 1)
			return true;
		else
			return false;
	}
}
?>

