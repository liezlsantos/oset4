	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); 
			function convertToString($sem_ay)
			{ 
				$sem = substr($sem_ay, 4, 1);
				if($sem == 1)
					$sem = "1st semester, A.Y. ";
				else {
					$sem = "2nd semester, A.Y. ";
				}
				$year = substr($sem_ay, 0, 4);
				$year2 = $year+1;
				
				return ' '.$sem.' '.$year.'-'.$year2;
			}
		?>
		
		<div class = "right">
		<h2>Faculty Summarized Report <?php echo "(".$user_college_name.")"; ?></h2>
		
		<div class="tabs">
		<table cellpadding="3">
			<tr>
			<td align = "center"><a href = "<?php echo base_url('index.php/clerk/reportmanagement/facultysummarizedreport');?>"><div class = "tabH">View Report</div></a>
			<td align = "center"><a href = "#"><div class = "selectedtabH">Search Report Archive</div></a>
			</tr>
		</table>
		</div>
		<br/>
		<?php echo form_open('clerk/reportmanagement/searchfacultysummarizedreportarchive', array('onSubmit'=>true)); ?>
		<table>
			<tr>
				<td>A.Y. Sem: </td>
				<td>
					<select name="sem_ay">
						<option></option>
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
					</select>&nbsp; &nbsp;
				</td>
				<td>&nbsp;<input type="submit" value="Search"></td>
			</tr>
		</table>
		<?php echo form_close(); ?>
		
		<?php 
		   	if($records)
			{
			    echo '
			    <table class="records">
			    	<tr>
			    	<th>A.Y. Semester</th>
			    	<th>College</th>
			    	<th>College Code</th>
			    	<th width="10%"></th>
			    	</tr>';
				    	 
			    	$i = 0;
			    	foreach ($records['path'] as $link)
					{
						echo 
							"<tr>
								<td>".convertToString($records['sem_ay'][$i])."</td>
								<td align='center'>".$records['college_name'][$i]."</td>
								<td align='center'>".$records['college_code'][$i]."</td>
								<td align='center'>
								<a href='".base_url($link).".doc'>
									Download</a></td>
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

	</body>