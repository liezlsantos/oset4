<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		<div class = "right">
		
		<h2>Class Evaluation Status <?php echo "(".$user_college_name.")"; ?></h2>
		<div class="tabs">
		<table cellpadding="3">
			<tr>
			<td align = "center"><a href = "#"><div class = "selectedtabH">Class Evaluation Status</div></a>
			<td align = "center"><a href = "<?php echo base_url('index.php/clerk/evaluationmanagement/studentstatus');?>"><div class = "tabH">Student Evaluation Status</div></a>
			</tr>
		</table>
		</div><br/>
		<?php echo form_open('clerk/evaluationmanagement/searchstatus', array('onSubmit'=>true)); ?>
		
		<table>
			<tr>
				<td>Subject:</td>
				<td width="180"><input type="text" name="subject" <?php if(isset($search['subject'])) echo "value='".$search['subject']; ?>'></td>
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
				<th>Status</th>
				</tr>';
				echo form_open('clerk/evaluationmanagement/closesubmit/'.$user_college_code, array('onSubmit'=>true)); 
				for($i=0; $i<count($records['subject']); $i++) {
						echo "<tr>
								<td>".$records['subject'][$i]."</td>
								<td>".$records['section'][$i]."</td>
								<td>".$records['instructor'][$i]."</td>
								<td>".$records['no_of_respondents'][$i]."</td>
								<td>".$records['no_of_students'][$i]."</td>
								<td>";
							if($records['status'][$i] == 1)echo "Open";
							else echo "Closed";
							echo"</td>
							 </tr>";
					}
				echo "</table>";
				echo form_close();
			}
			else
			{
				echo "There are no class selected to undergo evaluation for the current semester.";
			}
			
			if(isset($search['subject']))
				echo '<br/><br/><a href="'.base_url('index.php/clerk/evaluationmanagement/status').'">Back to all classes </a>';
		
		?>
			
	</div>
	</div>
	</body>