	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		
		<div class = "right">
		<h2>Database Error</h2>
		
		The system cannot connect to crs database.
		
		<br/><br/>
		<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">Back</a>
		
		</div>

	</body>