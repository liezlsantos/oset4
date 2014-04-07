<?php
	session_start();
	if(isset($_SESSION['proceedToStep4']))
	{
		if(!$_SESSION['proceedToStep4'])
			header('location: stepthree.php');
		if(isset($_SESSION['done']))
			header('location: end.php');
	}
	else {
		header('location: stepthree.php');
	}
	
	$next_flag = FALSE;
	if(isset($_SESSION['proceedToStep5']))
		if($_SESSION['proceedToStep5'])
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
				<h2>Step 4 - Create Tables </h2>
				<?php 
				if(isset($_SESSION['proceedToStep5']))
				{
					if($_SESSION['proceedToStep5'])
						echo "<font color = green>The following tables have been created.</font><br/>
						<ul>
							<li>audittraill
							<li>class
							<li>classlist
							<li>college
							<li>department
							<li>faculty
							<li>faculty_summarized_report
							<li>lab_set
							<li>report_per_class
							<li>score_per_respondent
							<li>set_instrument
							<li>set_status
							<li>student
							<li>up_set
							<li>users
						</ul>";
				}
				else
				{
					echo '
					<br/>
					Database configuration file has been well setup. <b><a href="createtables.php">Create tables</a></b> needed for the OSET.
					<br/><br/>
					';
				}
				?>
				<form action="stepfive.php" method=POST>
				<input type="submit" value="Next Step" <?php if(!$next_flag) echo "disabled";?>></a>
				</form>
			</div>
		</div>	
	</body>