<header>
	<style>
		body, th, td{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
		}
	</style>
</header>

<body>
	
	<h4>Student Evaluation of Teachers - <?php echo $user_college_name; ?></h4>
	
	The following students still have classes to be evaluated:
	<br/><br/>
	
	<table border="1" cellpadding="2" cellspacing="0" style="width:100%; font:13px">
		
		<?php
			if(isset($unevalStudents))
			{
				$i = 0;
				foreach ($unevalStudents['name'] as $name)
				{
					echo 
					'<tr>
						<td>'.$unevalStudents['name'][$i].'</td>
						<td>'.$unevalStudents['classes'][$i].'</td>
				      </tr>';		
					$i++;
				}
			}
			else
			{
				echo "<tr><td>No record found.</td></tr>";
			}
		?>
	</table>
</body>