<?php
	session_start();
	if(isset($_SESSION['proceedToStep5']))
	{
		if(!$_SESSION['proceedToStep5'])
			header('location: stepfour.php');
		if(isset($_SESSION['done']))
			header('location: end.php');
	}
	else {
		header('location: stepfour.php');
	}
		
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if($_POST['password'] != $_POST['password2'])
		{
			echo '<script language = "javascript">alert("Passwords do not match.");</script>';
			$_SESSION['admin'] = $_POST['username'];			
			$_SESSION['firstname'] = $_POST['firstname'];
			$_SESSION['lastname'] = $_POST['lastname'];
		}
		else
		{
			$username = $_POST['username'];			
			$fname = $_POST['firstname'];
			$lname = $_POST['lastname'];
			$salt = substr(MD5(uniqid(rand(), true)), 0, 6);
			$password = $_POST['password'].$salt;
		
			$db_con = mysql_connect($_SESSION['host'], $_SESSION['username'], $_SESSION['password']) or die("Could not establish MySQL connection");
			$connection_string = mysql_select_db($_SESSION['dbname']);
			
			
			mysql_query("INSERT INTO users (username, first_name, last_name, user_type, salt, password) 
				VALUES('$username', '$fname', '$lname', '1', '$salt', MD5('$password'))");
			
			header('Location: end.php');					
		}
	}	
?>	
	
	<header>
		<title>OSET 4.0</title>
		<link href='../css/style.css' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
			<div class="header">
				&nbsp; &nbsp; 
				<img height="109px" style="margin-top: 5px;" src="../css/images/logo.png" align="middle"></img>
				&nbsp; &nbsp; 
				<font class="title">Online Student Evaluation of Teachers</font>
				<div class="subtitle">
					University of the Philippines Manila</div>
				<div class="loginbar"> &nbsp; </div>
			</div>
			
			<div class="left">
				<div class="module-div">
						<b><a href="index.php"> Install OSET</a></b>
				</div>
				<div class="module-div">
						<a href="stepone.php" <?php if(strpos($_SERVER["PHP_SELF"],"stepone")) echo 'class="current"'?>> STEP 1 - System Requirements</a>
				</div>
				<div class="module-div">
						<a href="steptwo.php" <?php if(strpos($_SERVER["PHP_SELF"],"steptwo")) echo 'class="current"'?>> STEP 2 - OSET Database Setup</a>
				</div>
				<div class="module-div">
						<a href="stepthree.php" <?php if(strpos($_SERVER["PHP_SELF"],"stepthree")) echo 'class="current"'?>> STEP 3 - CRS Database Setup</a>
				</div>
				<div class="module-div">
						<a href="stepfour.php" <?php if(strpos($_SERVER["PHP_SELF"],"stepfour")) echo 'class="current"'?>> STEP 4 - Create Tables </a>
				</div>
				<div class="module-div">
						<a href="stepfive.php" <?php if(strpos($_SERVER["PHP_SELF"],"stepfive")) echo 'class="current"'?>> STEP 5 - Create Administrator</a>
				</div>
				<div class="module-div">
						<a href="end.php" <?php if(strpos($_SERVER["PHP_SELF"],"end")) echo 'class="current"'?>> END of Installation</a>
				</div>
			</div>
	
			<div class="right">
				<h2>Step 5 - Create Administrator </h2>
				<form action="stepfive.php" method=POST>
				<table>
					<tr><td><div id ="divpass"></div></td></tr>
					<tr><td width="200px">Username: <font color = red>*</font></td>
						<td><input type="text" name="username" value="<?php if(isset($_SESSION['admin'])) echo $_SESSION['admin']; ?>" required></td>
					</tr>
					<tr><td>First name: <font color = red>*</font></td>
						<td><input type="text" name="firstname" value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>" required></td>
					</tr>
					<tr><td>Last name: <font color = red>*</font></td>
						<td><input type="text" name="lastname" value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>" required></td>
					</tr>
					<tr><td>Password: <font color = red>*</font></td>
						<td><input type="password" name="password" required></td>
					</tr>
					<tr><td>Confirm Password: <font color = red>*</font></td>
						<td><input type="password" name="password2" required></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="Save and Finish Installation"></td>
					</tr>
				</table>
				
				</form>
			</div>
		</div>	
	</body>