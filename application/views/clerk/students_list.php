<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
		
		<h2> List of Students <?php echo "(".$user_college_name.")"; ?></h2>
		
		<?php 
			if(!isset($name))
					$name = "";
			echo form_open('clerk/studentaccount/search', array('onSubmit'=>true)); 
			echo 
			"<table>
					<tr>
						<td>Student's name: 
						<td><input type='text' name='name' value='".$name."'>
						<td><input type='submit' value='Search'>
					</tr>
			</table>";
			echo form_close();
		?>	
		
		<?php
			if(isset($records))
			{
				echo 
				'<table class="records">
				<tr>
				<th>Name</th>
				<th>Student Number</th>
				<th></th>
				</tr>';
				
				for($i=0; $i<count($records['student_id']); $i++) {
						echo "<tr>
								<td>".$records['name'][$i]."</td>
								<td>".substr_replace($records['student_id'][$i], '-', 4, 0)."</td>
								<td><a href='".base_url('index.php/clerk/studentaccount/viewclasses/'.$records['student_id'][$i])."'>View classes</a></td>
							 </tr>";
					}
				echo "</table>";
			}
			else
			{
				if($name == "")
					echo "Student accounts for the ".$user_college_name." have not yet been generated.";
				else
					echo "No record found.";
			}
			
			if($name)
				echo "<br/><br/><a href='studentaccount'>Back to all students</a>"
		?>
	
	</div>
	</div>
	</body>