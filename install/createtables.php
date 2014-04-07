<?php 
	session_start();
	$db_con = mysql_connect($_SESSION['host'], $_SESSION['username'], $_SESSION['password']) or die("Could not establish MySQL connection");
	$connection_string = mysql_select_db($_SESSION['dbname']);
	mysql_query("CREATE TABLE IF NOT EXISTS `audit_trail` (
					  `audit_id` int(11) NOT NULL AUTO_INCREMENT,
					  `action` varchar(50) NOT NULL,
					  `username` varchar(20) NOT NULL,
					  `name` varchar(50) NOT NULL,
					  `date_time` datetime NOT NULL,
					  PRIMARY KEY (`audit_id`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
				");
	mysql_query("
					CREATE TABLE IF NOT EXISTS `class` (
					  `oset_class_id` int(11) NOT NULL AUTO_INCREMENT,
					  `class_id` int(11) NOT NULL,
					  `subject` varchar(20) NOT NULL,
					  `credits` tinyint(4) NOT NULL,
					  `section` varchar(20) NOT NULL,
					  `activated` tinyint(1) NOT NULL DEFAULT '0',
					  `department_code` varchar(10) NOT NULL,
					  `instructor` varchar(100) NOT NULL,
					  `college_code` varchar(10) NOT NULL,
					  `set_instrument_id` int(11) NOT NULL,
					  `open` int(11) NOT NULL,
					  `no_of_students` int(11) NOT NULL,
					  `no_of_respondents` int(11) NOT NULL,
					  `score` double NOT NULL,
					  PRIMARY KEY (`oset_class_id`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
					");
	
	mysql_query("     CREATE TABLE IF NOT EXISTS `classlist` (
					  `oset_class_id` int(15) NOT NULL,
					  `student_id` varchar(10) NOT NULL,
					  `evaluated` tinyint(4) NOT NULL,
					  PRIMARY KEY (`oset_class_id`,`student_id`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;
				");	
					
					
	mysql_query("	CREATE TABLE IF NOT EXISTS `college` (
					  `college_name` varchar(80) NOT NULL,
					  `college_code` varchar(10) NOT NULL,
					  `downloaded` tinyint(4) NOT NULL,
					  PRIMARY KEY (`college_code`),
					  UNIQUE KEY `College_Name` (`college_name`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
					
	mysql_query("				
					INSERT INTO `college` (`college_name`, `college_code`, `downloaded`) VALUES
					('College of Allied Medical Professions', 'CAMP', 0),
					('College of Arts and Sciences', 'CAS', 0),
					('College of Dentistry', 'CD', 0),
					('College of Medicine', 'CM', 0),
					('College of Nursing', 'CN', 0),
					('College of Pharmacy', 'CP', 0),
					('College of Public Health', 'CPH', 0),
					('National Teachers Training Center for Health Profession', 'NTTCHP', 0);
					");

mysql_query("
					CREATE TABLE IF NOT EXISTS `department` (
					  `department_name` varchar(80) NOT NULL,
					  `department_code` varchar(10) NOT NULL DEFAULT '',
					  `college_code` varchar(10) NOT NULL,
					  PRIMARY KEY (`department_code`),
					  UNIQUE KEY `Department_Name` (`department_name`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
				
mysql_query("	
					INSERT INTO `department` (`department_name`, `department_code`, `college_code`) VALUES
					('Department of Arts and Communication', 'DAC', 'CAS'),
					('Allied Medical Professions Department', 'DAMP', 'CAMP'),
					('Department of Biology', 'DB', 'CAS'),
					('Department of Behavioral Science', 'DBS', 'CAS'),
					('Dentistry Department', 'DD', 'CD'),
					('Medicine Department', 'DM', 'CM'),
					('Nursing Undergraduate Department', 'DN', 'CN'),
					('National Teacher Training Center', 'DNTTC', 'NTTCHP'),
					('Pharmacy Department', 'DP', 'CP'),
					('Department of Physical Education', 'DPE', 'CAS'),
					('Public Health Department', 'DPH', 'CPH'),
					('Department of Physical Sciences and Mathematics', 'DPSM', 'CAS'),
					('Department of Social Sciences', 'DSS', 'CAS'),
					('Graduate Studies Department - CAMP', 'GDCAMP', 'CAMP'),
					('Graduate Studies Department - CAS', 'GDCAS', 'CAS'),
					('Graduate Studies Department - CD', 'GDCD', 'CD'),
					('Graduate Studies Department - CM', 'GDCM', 'CM'),
					('Graduate Studies Department - CN', 'GDCN', 'CN'),
					('Graduate Studies Department - CP', 'GDCP', 'CP'),
					('Graduate Studies Department - CPH', 'GDCPH', 'CPH');
					");

mysql_query("					
					CREATE TABLE IF NOT EXISTS `faculty` (
					  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
					  `name` varchar(100) DEFAULT NULL,
					  `instructor_code` varchar(40) NOT NULL DEFAULT '',
					  PRIMARY KEY (`faculty_id`)
					) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

mysql_query("
					CREATE TABLE IF NOT EXISTS `faculty_summarized_report` (
					  `sem_ay` varchar(20) NOT NULL,
					  `college` varchar(20) NOT NULL,
					  `path` varchar(200) NOT NULL,
					  PRIMARY KEY (`sem_ay`,`college`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
					
mysql_query("
					CREATE TABLE IF NOT EXISTS `lab_set` (
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
					) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
					
mysql_query("
					CREATE TABLE IF NOT EXISTS `report_per_class` (
					  `college` varchar(20) NOT NULL,
					  `department` varchar(20) NOT NULL,
					  `course` varchar(50) NOT NULL,
					  `sem_ay` varchar(20) NOT NULL,
					  `instructor` varchar(100) NOT NULL,
					  `path` varchar(200) NOT NULL,
					  PRIMARY KEY (`path`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
					
	mysql_query("
					CREATE TABLE IF NOT EXISTS `score_per_respondent` (
					  `student_id` int(11) NOT NULL,
					  `oset_class_id` int(11) NOT NULL,
					  `score` double NOT NULL,
					  PRIMARY KEY (`student_id`,`oset_class_id`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
					
					
	mysql_query("
					CREATE TABLE IF NOT EXISTS `set_instrument` (
					  `set_instrument_id` int(11) NOT NULL AUTO_INCREMENT,
					  `name` varchar(50) NOT NULL,
					  `set_as_default` tinyint(4) NOT NULL,
					  `controller_name` varchar(50) NOT NULL,
					  `table_name` varchar(50) NOT NULL,
					  `model_name` varchar(50) NOT NULL,
					  PRIMARY KEY (`set_instrument_id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;");
	mysql_query("				
					INSERT INTO `set_instrument` (`set_instrument_id`, `name`, `set_as_default`, `controller_name`, `table_name`, `model_name`) VALUES
					(1, 'Diliman SET', 1, 'upset', 'up_set', 'upset_model'),
					(2, 'Laboratory SET', 0, 'lab_set', 'lab_set', 'lab_set_model');");
mysql_query("
					CREATE TABLE IF NOT EXISTS `set_status` (
					  `sem_ay` varchar(11) NOT NULL,
					  `accounts_generated` tinyint(1) NOT NULL,
					  PRIMARY KEY (`sem_ay`),
					  UNIQUE KEY `Flag_Name` (`accounts_generated`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;");
		mysql_query("							
					INSERT INTO `set_status` (`sem_ay`, `accounts_generated`) VALUES
					('20131', 0);");
					
		mysql_query("			
					CREATE TABLE IF NOT EXISTS `student` (
					  `student_id` varchar(10) NOT NULL,
					  `name` varchar(150) NOT NULL,
					  `college_code` varchar(50) NOT NULL,
					  `program` varchar(30) NOT NULL,
					  `password` varchar(50) NOT NULL,
					  `salt` varchar(10) NOT NULL,
					  PRIMARY KEY (`student_id`)
					) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
					
		mysql_query("			
					CREATE TABLE IF NOT EXISTS `up_set` (
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
					) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
	mysql_query("				
					CREATE TABLE IF NOT EXISTS `users` (
					  `username` varchar(50) NOT NULL,
					  `password` varchar(50) NOT NULL,
					  `salt` varchar(10) NOT NULL,
					  `user_type` enum('1','2','3','12','13','23','123') NOT NULL,
					  `first_name` varchar(50) NOT NULL,
					  `last_name` varchar(50) NOT NULL,
					  `college_code` varchar(50) NOT NULL,
					  PRIMARY KEY (`username`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1;
					");
					
	$_SESSION['proceedToStep5'] = TRUE;
	header('location: stepfour.php');
?>