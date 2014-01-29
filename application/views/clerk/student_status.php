<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		<div class = "right">
		
		<h2>Student Evaluation Status <?php echo "(".$user_college_name.")"; ?></h2>
		
		<a href="<?php echo base_url('/index.php/clerk/evaluationmanagement/updatePDFStudentStatus')?>">
			Update list
		</a><br/><br/>
		
		<iframe src='<?php echo base_url('/pdf/students_with_unevaluated_classes.pdf');?>' width="100%" height="1000px;"  />
		</div>

	</body>