<?php 
	function getRating($score)
	{
		$rating = "";
		if($score >= 1)
		{
			if ($score <= 1.24)
				$rating = "Outstanding";
			elseif ($score <= 1.75)
				$rating = "Very satisfactory";
			elseif ($score <= 2.25)
				$rating = "Satisfactory";
			elseif ($score <= 2.75)
				$rating = "Fair";
			else 
				$rating = "Needs improvement";
		}
		return $rating;
	}
?>
	
<html>
<header>
	
</header>
<style>
	table {font-size: 12px; border-collapse: collapse;}
	td {white-space: nowrap;
		padding: 0 3px;}
	body{font: 14px "proxima-nova", Helvetica, Arial, sans-serif;}
</style>

<body>
	<b>
		UNIVERSITY OF THE PHILIPPINES MANILA <br/>
		STUDENT EVALUATION OF TEACHERS
	</b>
	
	<br/><br/>
	<table width="100%">
		<tr>
			<td>College: <?php echo $user_college_code;?></td>
			<td>Date: <?php date_default_timezone_set('Asia/Manila'); echo date("F j, Y, g:i a");  ?></td>
		</tr>
		<tr>
			<td>Sem/AY: <?php echo $sem_ay; ?></td>
		</tr>
	</table>
	<hr>
	<br/>
	
	<table border='1'>
		<?php 
			if(isset($instructors))
			{
				echo '
					<tr>
						<th>Name</th>
						<th width="20%">Subject</td>
						<th width="8%">Units</td>
						<th width="11%">No. of Students</td>
						<th width="11%">No. of Students Evaluated</td>
						<th width="9%">Score</td>
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
							<th align="center" valign="middle" rowspan='.$rows.'>'.$name.'</th>
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
			}
			else
				echo "There is no instructor whose all classes are already closed for evaluation.";
		?>
	</table>	
</body>
</html>