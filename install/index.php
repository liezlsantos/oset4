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
				<h2>OSET Installation</h2>
				
				<br/>
				This will guide you in installing OSET through a step by step process.

				<br/><br/>
				<a href="stepone.php">Install OSET.</a>
			</div>
		</div>	
	</body>