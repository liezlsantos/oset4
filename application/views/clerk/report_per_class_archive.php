	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); 
			function convertToString($sem_ay)
			{ 
				$sem = substr($sem_ay, 4, 1);
				if($sem == 1)
					$sem = "1st,";
				else {
					$sem = "2nd,";
				}
				$year = substr($sem_ay, 0, 4);
				$year2 = $year+1;
				
				return ' '.$sem.' '.$year.'-'.$year2;
			}
		?>
		
		<div class = "right">
		<h2>Class Detailed Report <?php echo "(".$user_college_name.")"; ?></h2>
		
		<div class="tabs">
		<table cellpadding="3">
			<tr>
			<td align = "center"><a href = "<?php echo base_url('index.php/clerk/reportmanagement/reportperclass');?>"><div class = "tabH">View Report</div></a>
			<td align = "center"><a href = "#"><div class = "selectedtabH">Search Report Archive</div></a>
			</tr>
		</table>
		</div>
		<br/>
		<?php echo form_open('clerk/reportmanagement/searchreportperclassarchive', array('onSubmit'=>true)); ?>
		<table>
			<tr>
				<td>A.Y. Sem: 
					<select name="sem_ay">
						<?php
							if(!isset($search['sem_ay']))
								$search['sem_ay'] = "";
							if(isset($sem_ay))
							{
								foreach ($sem_ay as $s)
								{
									echo '<option value="'.$s.'"';
									if($search['sem_ay'] == $s) 
										echo " selected";
									echo '>'.convertToString($s).'</option>';
								}
							}
							else
								echo '<option value ='.$SET['semester'].'>'.convertToString($SET['semester']).'</option>'
						?>
					</select>&nbsp;
				</td>
				<td>Department: 
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
					</select>&nbsp;
				</td>
				<td>Subject: <input type="text" size="15" name="subject" <?php if(isset($search['subject'])) echo "value='".$search['subject']; ?>' >&nbsp; </td>
				<td valign="bottom"><input type="submit" value="Search"></td>
			</tr>
		</table>
		<?php echo form_close(); ?>
		
		<?php 
		   	if($records)
			{
			    echo '
			    <table class="records">
			    	<tr>
			    	<th>Course</th>
			    	<th>Instructor</th>
			    	<th>Department</th>
			    	<th></th>
			    	</tr>';
				    	 
			    	$i = 0;
			    	foreach ($records['path'] as $link)
					{
						echo 
							"<tr>
								<td>".$records['course'][$i]."</td>
								<td>".$records['instructor'][$i]."</td>
								<td>".$records['department'][$i]."</td>
								<td><a target='_blank' href='".base_url($link)."'>View report</a></td>
		  					 </tr>";
							$i++;
					}
					echo '</table>';
			}
			else 
			{
				echo 'No report found.';
			}	
		   ?>
		</div>
	
		<br/><br/>
		
		</div>
		</div>
	</body>