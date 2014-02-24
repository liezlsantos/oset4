<?php include('check.php'); ?>	
	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
	<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
			<h2> SET Instrument Tables </h2>
			
			<?php
			if(count($records['name']))
			{
					echo'
					<table class="records">
					<tr>
						<th width="120px">SET Instrument ID</th>
						<th>SET Instrument Name</th>
						<th>Table Name</th>
						<th></th>
					</tr>';
				
					for ($i = 0; $i <count($records['name']); $i++) {
							echo "<tr>
									<td align='center'>".$records['set_instrument_id'][$i]."</td>
									<td>".$records['name'][$i]."</td>
									<td>".$records['table_name'][$i]."</td>
									<td>";
							if(!$records['isEmpty'][$i])		
								echo "<a href='".base_url('index.php/infoanalyst/exportdata/downloadCSV/'.$records['table_name'][$i])."'>Export data from this table</a></td>";
							else 
								echo "This table is empty.";	
							echo "</tr>";
					}
					
					echo '</table>';
				}
				else
					echo "No SET instrument uploaded.";
			?>
		</div>
	</div>
	</body>