<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		<div class = "right">
		
		<h2>Student Evaluation Status <?php echo "(".$user_college_name.")"; ?></h2>
		<div class="tabs">
		<table cellpadding="3">
			<tr>
			<td align = "center"><a href = "<?php echo base_url('index.php/clerk/evaluationmanagement/status');?>"><div class = "tabH">Class Evaluation Status</div></a>
			<td align = "center"><a href = "#"><div class = "selectedtabH">Student Evaluation Status</div></a>
			</tr>
		</table>
		</div><br/>
		<a href="<?php echo base_url('/index.php/clerk/evaluationmanagement/updatePDFStudentStatus')?>">
			Update list
		</a><br/><br/>
		
		<iframe src='<?php echo base_url('/reports/students_with_unevaluated_classes_'.$user_college_code.'.pdf');?>' width="100%" height="1000px;"  />
		</div>
		</div>
	</body>