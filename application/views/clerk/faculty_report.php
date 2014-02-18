	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
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
		<br/>
		<a href="<?php echo base_url('index.php/clerk/reportmanagement/facultysummarizedreportdownload/'.$user_college_code);?>">
				Download</a> this faculty summarized report for 
				<?php if(substr($SET['semester'], 4, 1)==1) echo '1st'; else echo '2nd'; ?> Semester, 
				Academic Year <?php $y = substr($SET['semester'], 0, 4); $y2 = $y+1; echo $y.'-'.$y2;?>
		
		<br/><br/>
				
		<?php echo form_open('clerk/reportmanagement/searchfacultysummarizedreport', array('onSubmit'=>true)); ?>
		<table>
			<tr>
				<td>Instructor's name: </td>
				<td><input type="text" size="15" name="instructor" <?php if(isset($search['instructor'])) echo "value='".$search['instructor']; ?>' ></td>
				<td>&nbsp;<input type="submit" value="Search"></td>
			</tr>
		</table>
		<?php echo form_close(); ?>
		<table class="records">
			<?php 
				if(isset($instructors))
				{
					echo '
						<tr>
							<th>Name</th>
							<th width="20%">Subject</td>
							<th width="6%">Units</td>
							<th style="white-space:nowrap;">No. of Students</td>
							<th style="white-space:nowrap;">No. of Respondents</td>
							<th width="8%">Score</td>
							<th>Total</td>
							<th>Rating</td>
						</tr>
					';
					$i = 0; $j = 0; 
					foreach ($instructors['name'] as $name)
					{
						$rows = $count[$j]+1;
						$totalunits = 0; $totalscore = 0;
						if($classes['score'][$i] >= 1)
							$totalunits += $classes['units'][$i];
						$totalscore += $classes['total'][$i];
						echo '
							<tr>
								<td align="center" valign="middle" rowspan='.$rows.'><b>'.$name.'</b></td>
								<td>'.$classes['subject'][$i].'</td>
								<td align="center">'.$classes['units'][$i].'</td>
								<td align="center">'.$classes['no_of_students'][$i].'</td>
								<td align="center">'.$classes['no_of_respondents'][$i].'</td>
								<td align="right">'.sprintf('%0.4f', round($classes['score'][$i],4)).'</td>
								<td align="right">'.sprintf('%0.4f', round($classes['total'][$i],4)).'</td>
								<td align="center">'.$classes['rating'][$i].'</td>
							</tr>';
						for ($k = 1, $i++; $k < $count[$j]; $i++)
						{
							if($classes['score'][$i] >= 1)
								$totalunits += $classes['units'][$i];
							$totalscore += $classes['total'][$i];
							echo '
							<tr>
								<td>'.$classes['subject'][$i].'</td>
								<td align="center">'.$classes['units'][$i].'</td>
								<td align="center">'.$classes['no_of_students'][$i].'</td>
								<td align="center">'.$classes['no_of_respondents'][$i].'</td>
								<td align="right">'.sprintf('%0.4f', round($classes['score'][$i],4)).'</td>
								<td align="right">'.sprintf('%0.4f', round($classes['total'][$i],4)).'</td>
								<td align="center">'.$classes['rating'][$i].'</td>
							</tr>
							';
							$k++;
						}
						if($totalunits >= 1)
							$ave =  round($totalscore/$totalunits, 4);
						else 
							$ave = 0;	
						echo '
							<tr>
								<td><b>TOTAL</b></td>
								<td align="center"><b>'.$totalunits.'</b></td>
								<td colspan = 3></td>
								<td align="right"><b>'.$ave.'</b></td>
								<td align="center"><b>'.getRating($ave).'</b></td>
							</tr>
						';
						$j++;
					}
				echo "</table>";
				}
				else
				{
					if(!isset($search))
						echo "There is no instructor whose all classes are already closed for evaluation.";
					else
						echo "No instructor found.";
				}
				if(isset($search))
					echo "<br/><br/><a href='".base_url('index.php/clerk/reportmanagement/facultysummarizedreport')."'>Back to all instructors </a>";
			?>		
		</div>
		</div>
	</body>