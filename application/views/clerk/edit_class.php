<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		
		<script>
			function warning(){ 
				return confirm('Are you sure you want to delete this record?'); 
			}
		</script>
		
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
	
		<h2>Instructors <?php echo "(".$class['subject']." - ".$class['section'].")"; ?></h2>
		
		<a href="<?php echo base_url('/index.php/clerk/classmanagement/addInstructor')."/".$class['class_id']; ?>">+Add Instructor</a><br/><br/>
		
		<?php
			if(isset($class['names']))
			{
				echo 
				'<table class="records">
					<tr>
					<th>Instructor Name</a></th>
					<th>Instructor Code</a></th>
					<th></th>
					</tr>';
					
					for($i=0; $i<count($class['instructors']); $i++) 
					{
						echo "<tr>
								<td>".$class['names'][$i]."</td>
								<td>".$class['instructors'][$i]."</td>
								<td><a href='".base_url('/index.php/clerk/classmanagement/deleteInstructor')."/".$class['class_id'].$class['faculty_id'][$i]. "' onclick='return warning();'>Delete Instructor</a></td>
							 </tr>";
					}
				echo "</table>";
			}
			else
				echo "There are no instructors assigned to this class yet.";
		?>
		
		<br/><br/>
		<?php
			if(isset($_SESSION['subject_keyword']) || isset($_SESSION['department_keyword']))
				echo '<a href="'.base_url('/index.php/clerk/classmanagement/search').'">Back to search results</a>';
			else 
				echo '<a href="'.base_url('/index.php/clerk/classmanagement/').'">Back to list of classes </a>';
		?>
	</div>
	</div>
	</body>