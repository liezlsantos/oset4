<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		
		<script>
			function warning(){ 
				return confirm('Are you sure you want to delete this record?'); 
			}
		</script>
	
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		
		<div class = "right">
		
		<h2> Download Classes </h2>
		
		<?php
		if(!$SET['accounts_generated'])
		{
			echo 
			'<table class="records">
			 <tr>
				<th>College Name</th>
				<th>College Code</th>
				<th>Classes Downloaded</th>
			</tr>
			';
			
			for($i=0; $i<count($records['college_code']); $i++) {
					echo "<tr>
							<td>".$records['college_name'][$i]."</td>
							<td>".$records['college_code'][$i]."</td>
							<td>";
							if($records['downloaded'][$i])
								echo "Classes downloaded. <a href='classmanagement/downloadClasses/".$records['college_code'][$i]."'>Redownload classes</a>";
							else 
								echo "<a href='classmanagement/downloadClasses/".$records['college_code'][$i]."'>Download classes</a>";
							echo "</td>
						 </tr>";
			}
			echo '</table>';
		}
		else {
			echo "Downloading of classes has been disabled because students accounts have already been generated.";
		}
		?>
			
	</div>

	</body>