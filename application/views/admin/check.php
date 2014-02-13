<?php
	if(strpos($_SERVER["PHP_SELF"],"index.php/admin") && !isset($isAdmin))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/clerk") && !isset($isClerk))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/infoanalyst") && !isset($isAnalyst))
		header('location:'.base_url('index.php/home'));
	elseif(strpos($_SERVER["PHP_SELF"],"index.php/student"))
		header('location:'.base_url('index.php/home'));
	
	$url = "http" . (($_SERVER['SERVER_PORT']==443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
	if($url == base_url('index.php/admin/studentaccountmanagement/changepassword') || 
       $url == base_url('index.php/admin/account/add') || 
	   ($url == base_url('index.php/admin/studentaccountmanagement') && !$SET['accounts_generated']))
	{
		if(substr($url, 0, 4) == 'http')
		{
			$url = str_replace('http', 'https', $url);	
			header('location:'.$url);
		}
	}
	
?>