<?php
	session_start();
	if(isset($_SESSION['proceedToStep3']))
	{
		if(!$_SESSION['proceedToStep3'])
			header('location: steptwo.php');
		if(isset($_SESSION['done']))
			header('location: end.php');
	}
	else {
		header('location: steptwo.php');
	}
	
	$next_flag = FALSE;
	if(isset($_SESSION['proceedToStep4']))
		if($_SESSION['proceedToStep4'])
			$next_flag = TRUE;
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
				<h2>Step 3 - CRS Database Setup</h2>
				<form action="checkcrsdb.php" method=POST>
				<br/>
				<?php 
				if(isset($_SESSION['proceedToStep4']))
				{
					if($_SESSION['proceedToStep4'])
						echo "<font color = green>Connection to database successful</font><br/><br/>";
					else
						echo "<font color=red>Cannot connect to database<br/><br/>";
				}
				
				?>
				<table>
					<tr><td>IP Address/Hostname:</td>
						<td><input type="text" name="hostcrs" value="<?php if(isset($_SESSION['hostcrs'])) echo $_SESSION['hostcrs']; ?>"></td>
					</tr>
					<tr><td>Port Number:</td>
						<td><input type="text" name="portcrs" value="<?php if(isset($_SESSION['portcrs'])) echo $_SESSION['portcrs'];?>"></td>
					</tr>
					<tr><td>Database Name:</td>
						<td><input type="text" name="dbnamecrs" value="<?php if(isset($_SESSION['dbnamecrs'])) echo $_SESSION['dbnamecrs'];?>"></td>
					</tr>
					<tr><td>Username:</td>
						<td><input type="text" name="usernamecrs" value="<?php if(isset($_SESSION['usernamecrs'])) echo $_SESSION['usernamecrs']; ?>"></td>
					</tr>
					<tr><td>Password:</td>
						<td><input type="password" name="passwordcrs" value="<?php if(isset($_SESSION['passwordcrs'])) echo $_SESSION['passwordcrs']; ?>"></td>
					</tr>
					<tr><td></td><td><input type="submit" value="Check">
				</td></tr>
				</table>
				</form>
				<br/><br/>
				<form action="stepfour.php" method=POST>
				<input type="submit" value="Next Step" <?php if(!$next_flag) echo "disabled";?>></a>
				</form>
			</div>
		</div>	
	</body>