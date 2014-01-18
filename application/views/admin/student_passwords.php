<header>
	<style>
		body, th, td{
			font-family: Arial, Helvetica, sans-serif;
			font-size: 13px;
		}
	</style>
</header>

<body>
	
	<h4>Student Evaluation of Teachers</h4>
	
	<table border="1" cellpadding="2" cellspacing="0" style="width:100%; font:13px">
		<tr>
			<th></th>
			<th>Student Number</th>
			<th>Name</th>
			<th>College</th>
			<th>Program</th>
			<th>Password</th>
		</tr>
		
		<?php
			$i = 0;
			foreach ($students as $student)
			{
				$j = $i+1;
				echo '<tr>
					<td>'.$j.'.</td>
					<td>'.substr_replace($id, '-', 4, 0).'</td>
					<td>'.$student['name'].'</td>
					<td>'.$student['college'].'</td>
					<td>'.$student['program'].'</td>
					<td>'.$student['pass'].'</td>
			      </tr>';		
				$i++;
			}
		?>
	</table>
</body>