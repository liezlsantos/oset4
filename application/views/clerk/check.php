<?php
	if(strpos($_SERVER["PHP_SELF"],"index.php/admin") && !isset($isAdmin))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/clerk") && !isset($isClerk))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/infoanalyst") && !isset($isAnalyst))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/student"))
		header('location:'.base_url('index.php/home'));
?>