<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		
		<div class = "right">
		
		<h2> List of Classes <?php echo "(".$student->name.")"; ?></h2>
		
		<?php
			echo 
				'<table class="records">
				<tr>
				<th>Subject</th>
				<th>Section</th>
				<th>Department</th>
				<th>Instructor</th>
				</tr>';
				
			for($i=0; $i<count($classes['class_id']); $i++) {
				echo "<tr>
						<td>".$classes['subject'][$i]."</td>
						<td>".$classes['section'][$i]."</td>
						<td>".$classes['department_code'][$i]."</td>
						<td>".$classes['instructor'][$i]."</td>
					</tr>";
				}
			echo "</table>";
		?>
	
		<br/><br/>
		<?php
			if(($_SESSION['student_keyword']))
				echo '
				<form id="search_form" method="POST" action="'.base_url('/index.php/clerk/studentaccount/search').'">
					<input type="hidden" value="'.$_SESSION['student_keyword'].'" name="name">
					<a href="#" onclick="document.getElementById(\'search_form\').submit();">Back to search results</a>
				</form>
				';
			else 
				echo '<a href="'.base_url('/index.php/clerk/studentaccount/').'">Back to list of students </a>';
		?>
	</div>

	</body>