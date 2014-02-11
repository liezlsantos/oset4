<?php include('check.php');?>	
	
	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		
		<div class = "right">
		<h2>Faculty Summarized Report <?php echo "(".$user_college_name.")"; ?></h2>
		
		<div class="tabs">
		<table cellpadding="3">
			<tr>
			<td align = "center"><a href = "#"><div class = "selectedtabH">View Report</div></a>
			<td align = "center"><a href = "<?php echo base_url('index.php/clerk/reportmanagement/facultysummarizedreportarchive');?>"><div class = "tabH">Search Report Archive</div></a>
			</tr>
		</table>
		</div>
		
		<br/><br/>
		<a href="<?php echo base_url('/index.php/clerk/reportmanagement/updateFacultyReport')?>">
					Update report</a>
		&nbsp; &nbsp; <a href="<?php echo base_url($path.'.doc');?>">
				Download as doc file</a>
		
		<br/><br/>
		<iframe src='<?php echo base_url($path.'.pdf');?>' width="100%" height="1000px;"  />
		
		</div>

	</body>