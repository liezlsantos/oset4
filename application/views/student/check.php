<?php
	if(strpos($_SERVER["PHP_SELF"],"index.php/admin"))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/clerk"))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/infoanalyst"))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/student") && !isset($student_id))
		header('location:'.base_url('index.php/home'));
?>