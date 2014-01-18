<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		<div class = "right">
		
		<h2> Classes Selection <?php echo "(".$user_college_name.")"; ?></h2>
		
		<?php echo form_open('clerk/classmanagement/search', array('onSubmit'=>true)); ?>
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
		
		<?php if(!$SET['accounts_generated']) echo '<div align="right"><input type="checkbox" id="checkAll">Check All</div>'; ?>
		<br/>
		<?php
			if(isset($records))
			{
				echo 
				'<table class="records">
				<tr>
				<th>Subject</th>
				<th>Section</th>
				<th>Instructors</th>
				<th>Activated</th>
				<th></th>
				</tr>';
				echo form_open('clerk/classmanagement/saveSelection/'.$user_college_code, array('onSubmit'=>true)); 
				for($i=0; $i<count($records['subject']); $i++) {
					$class_id = $records['class_id'][$i];
						echo "<tr>
								<td>".$records['subject'][$i]."</td>
								<td>".$records['section'][$i]."</td>
								<td>";
					
						foreach ($records['instructors'][$class_id] as $instructor)
								echo $instructor."<br/>";
						
						echo "<td>";
						
						$j = 0;
						foreach ($records['activated'][$class_id] as $activated)
						{					
							echo "<input type='checkbox' name='".$records['class_id'][$i].$records['faculty_id'][$class_id][$j]."'";
								if($activated)
									echo " checked ";
								if($SET['accounts_generated'])
									echo " disabled";
								echo "><br/>";
							$j++;
						}
						
								
						echo	"<td><a href='".base_url('index.php/clerk/classmanagement/edit/'.$records['class_id'][$i])."'>Edit</a></td>
							 </tr>";
					}
				echo "</table>";
				echo "</table>";
				if(!$SET['accounts_generated'])
					echo "<table><tr><td><br><input type = 'submit' value = 'Save Activation Status'</tr></table>";
				echo form_close();
			}
			else
			{
				if(!isset($search['subject']))
					$search['subject'] = "";
				if($search['subject'] == "" && $search['department'] == "")
					echo "Classes for the ".$user_college_name." have not yet been downloaded.";
				else
					echo "No record found.";
			}
			
			if(isset($search['subject']))
				echo '<br/><br/><a href="classmanagement">Back to all classes </a>';
		
		?>
			
	</div>

	</body>