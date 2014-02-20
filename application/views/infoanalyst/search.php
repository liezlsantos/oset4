<?php include('check.php'); 
	  function convertToString($sem_ay)
	  { 
		 $sem = substr($sem_ay, 4, 1);
		 if($sem == 1)
		 	$sem = "1st,";
		 else 
			$sem = "2nd,";
		 $year = substr($sem_ay, 0, 4);
		 $year2 = $year+1;
   		 return ' '.$sem.' '.$year.'-'.$year2;
	  }
?>
	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		<script type='text/javascript' src='<?=base_url('js/dynamic_select.js')?>'></script>
		<script type='text/javascript'>
			 window.onload = function() {
			  	dynamicSelect('college', 'department');
			}
		</script>
	</header>

	<body>
	<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
			<h2> Search Classes (<font style="font-family: Courier; font-size: 18px;"><?php echo $archive_table; ?></font> table)</h2>
			<?php echo form_open('infoanalyst/exportdata/submit/'.$archive_table, array('onSubmit'=>true)); ?>
			<table>
				<tr>
					<td>College: 
					<td style="width:360px;"><select name="college" id="college">
							<?php
								if(!isset($search['college']))
									$search['college'] = "";
								for ($i = 0; $i < count($colleges['college_code']); $i++)
								{
									echo '<option value="'.$colleges['college_code'][$i].'"';
									if($search['college'] == $colleges['college_code'][$i]) 
										echo " selected";
									echo '>'.$colleges['college_name'][$i].'</option>';
								}
							?>	
						</select>&nbsp;
					</td>
					<td>A.Y. Sem: 
					<td><select name="sem_ay">
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
				</tr>
				<tr>
					<td>Department: 
					<td><select name="department" id="department">
							<?php
								foreach ($colleges['college_code'] as $college)
								{
									echo '<option value = "" class = '.$college.'>All departments &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </option>';
								}
								if(!isset($search['department']))
									$search['department'] = "";
								for ($i = 0; $i < count($departments['department_code']); $i++)
								{
									echo '<option value="'.$departments['department_code'][$i].'"';
									if($search['department'] == $departments['department_code'][$i]) 
										echo " selected";
									echo ' class = "'.$departments['college_code'][$i].'">'.$departments['department_name'][$i].'</option>';
								}
							?>	
						</select>&nbsp;
					</td>
					<td>Subject:
					<td><input type="text" size="15" name="subject" <?php if(isset($search['subject'])) echo "value='".$search['subject']; ?>' >&nbsp; </td>
					<td valign="bottom"><input type="submit" value="Search"></td>
				</tr>
			</table>
			<?php echo form_close(); ?>
			
			<?php 
		   	if(isset($records))
		   	{
			   	if(count($records['oset_class_id']) > 0)
				{
				    echo '
				    <table class="records">
				    	<tr>
				    	<th>Subject</th>
				    	<th>Section</th>
				    	<th>Instructor</th>
				    	<th></th>
				    	</tr>';
					    	 
				    	$i = 0;
				    	foreach ($records['oset_class_id'] as $id)
						{
							echo 
								"<tr>
									<td>".$records['subject'][$i]."</td>
									<td>".$records['section'][$i]."</td>
									<td>".$records['instructor'][$i]."</td>
									<td><a target='_blank' href='#'>Export data</a></td>
			  					 </tr>";
								$i++;
						}
						echo '</table>';
				}
				else 
				{
					echo 'No class found.';
				}
			}
			?>
		</div>
	</div>
	</body>