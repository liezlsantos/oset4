<?php 
	session_start();
	unset($_SESSION['proceedToStep4']);
	
	$db_con = pg_connect("host=".$_POST['hostcrs']." port=".$_POST['portcrs']." dbname=".$_POST['dbnamecrs']." user=".$_POST['usernamecrs']." password=".$_POST['passwordcrs']);
	
	if($db_con)
	{
		$content = $_SESSION['content'];
		$content .= "\n
					\$db['crs']['hostname'] = '".$_POST['hostcrs']."';
					\$db['crs']['username'] = '".$_POST['usernamecrs']."';
					\$db['crs']['password'] = '".$_POST['passwordcrs']."';
					\$db['crs']['database'] = '".$_POST['dbnamecrs']."';
					\$db['crs']['dbdriver'] = 'postgre';
					\$db['crs']['port'] = '".$_POST['portcrs']."';
					\$db['crs']['dbprefix'] = '';
					\$db['crs']['db_debug'] = TRUE;
					\$db['crs']['cache_on'] = FALSE;
					\$db['crs']['cachedir'] = '';
					\$db['crs']['char_set'] = 'utf8';
					\$db['crs']['dbcollat'] = 'utf8_general_ci';
					\$db['crs']['swap_pre'] = '';
					\$db['crs']['autoinit'] = TRUE;
					\$db['crs']['stricton'] = FALSE;
					\$db['crs']['pconnect'] = FALSE; ";
		
		$fh = fopen('../application/config/database.php', 'w');
		fwrite($fh, $content);
		fclose($fh);
		$_SESSION['hostcrs'] = $_POST['hostcrs'];
		$_SESSION['portcrs'] = $_POST['portcrs'];
		$_SESSION['usernamecrs'] = $_POST['usernamecrs'];
		$_SESSION['dbnamecrs'] = $_POST['dbnamecrs'];
		$_SESSION['passwordcrs'] = $_POST['passwordcrs'];
		$_SESSION['proceedToStep4'] = TRUE;
	}
	else
	{
		$_SESSION['proceedToStep4'] = FALSE;
		$_SESSION['hostcrs'] = $_POST['hostcrs'];
		$_SESSION['portcrs'] = $_POST['portcrs'];
		$_SESSION['usernamecrs'] = $_POST['usernamecrs'];
		$_SESSION['dbnamecrs'] = $_POST['dbnamecrs'];
		$_SESSION['passwordcrs'] = $_POST['passwordcrs'];
	}
	header('location: stepthree.php');
?>