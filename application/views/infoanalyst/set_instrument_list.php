<?php include('check.php'); ?>	
	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
	<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
			<h2> Archive Tables </h2>
			
			<?php
			if(count($records['name']))
			{
					echo'
					<table class="records">
					<tr>
						<th width="120px">SET Instrument ID</th>
						<th>SET Instrument Name</th>
						<th>Archive Table</th>
						<th></th>
					</tr>';
				
					for ($i = 0; $i <count($records['name']); $i++) {
							$table = $records['table_name'][$i]."_archive";
							echo "<tr>
									<td align='center'>".$records['set_instrument_id'][$i]."</td>
									<td>".$records['name'][$i]."</td>
									<td>".$table."</td>
									<td><a href='".base_url('index.php/infoanalyst/exportdata/search/'.$records['set_instrument_id'][$i])."'>Export data from this table</a></td>";
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