<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		<div class = "right">
		
		<h2>Close Evaluation <?php echo "(".$user_college_name.")"; ?></h2>
		
		<?php echo form_open('clerk/evaluationmanagement/searchclose', array('onSubmit'=>true)); ?>
		
		<table>
			<tr>
				<td>Subject:</td>
				<td width="180"><input type="text" name="subject" <?php if(isset($search['subject'])) echo "value=".$search['subject']; ?> ></td>
				<td>Department: </td>
				<td width="220">
					<select name="department">
						<option value = "">All departments</option>
						<?php
							if(!isset($search['department']))
								$search['department'] = "";
							for ($i = 0; $i < count($departments['department_code']); $i++)
							{
								echo '<option value="'.$departments['department_code'][$i].'"';
								if($search['department'] == $departments['department_code'][$i]) 
									echo " selected";
								echo '>'.$departments['department_name'][$i].'</option>';
							}
						?>	
					</select>
				</td>
				<td></td>
				<td><input type="submit" value="Search"></td>
			</tr>
		</table>
		<?php echo form_close(); ?>
		
		
		<?php if(isset($records)) echo '<div align="right"><input type="checkbox" id="checkAll">Check All</div>';?>
		<br/>
		<?php
			if(isset($records))
			{
				echo 
				'<table class="records">
				<tr>
				<th>Subject</th>
				<th>Section</th>
				<th>Instructor</th>
				<th>No. of Respondents</th>
				<th>No. of Students</th>
				<th></th>
				</tr>';
				echo form_open('clerk/evaluationmanagement/closesubmit/'.$user_college_code, array('onSubmit'=>true)); 
				for($i=0; $i<count($records['subject']); $i++) {
					$class_id = $records['oset_class_id'][$i];
						echo "<tr>
								<td>".$records['subject'][$i]."</td>
								<td>".$records['section'][$i]."</td>
								<td>".$records['instructor'][$i]."</td>
								<td>".$records['no_of_respondents'][$i]."</td>
								<td>".$records['no_of_students'][$i]."</td>
								<td><input type='checkbox' name='".$records['oset_class_id'][$i]."'></input></td>
							 </tr>";
					}
				echo "</table>";
				echo "<table><tr><td><br><input type = 'submit' value = 'Close evaluation mode'></tr></table>";
				echo form_close();
			}
			else
			{
				echo "No record found.";
			}
			
			if(isset($search['subject']))
				echo '<br/><br/><a href="'.base_url('index.php/clerk/evaluationmanagement/close').'">Back to all classes </a>';
		
		?>
			
	</div>

	</body>