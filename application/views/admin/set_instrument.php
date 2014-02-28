<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>	
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
		
		<h2> SET Instrument Management </h2>
		
		<?php
			if(isset($_SESSION['msg'])) {echo "<center><font color=green>".$_SESSION['msg']."</font><br/><br/></center>"; unset($_SESSION['msg']);}
		
			if(count($records['name']))
			{
					echo'
					<table class="records">
					<tr>
						<th width="120px">SET Instrument ID</th>
						<th>SET Instrument Name</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>';
				
					for ($i = 0; $i <count($records['name']); $i++) {
							echo "<tr>
									<td align='center'>".$records['set_instrument_id'][$i]."</td>
									<td>".$records['name'][$i]."</td>
									<td><a href='".base_url('index.php/admin/set/'.$records['controller_name'][$i].'/preview')."'>Preview</a></td>
									<td><a href='".base_url('index.php/admin/setinstrumentmanagement/edit/'.$records['set_instrument_id'][$i])."'>Edit</a></td>";
									
							if($records['set_as_default'][$i])
								echo "<td>Currently default</td>";
							else 	
								echo "<td><a href='".base_url('index.php/admin/setinstrumentmanagement/setasdefault/'.$records['set_instrument_id'][$i])."'>Set as default</a></td>";
								
							echo "</tr>";
					}
					
					echo '</table>';
				}
				else
					echo "No SET instrument uploaded.";
			?>
			<br/><br/><a href="setinstrumentmanagement/add"><input type="button" value="Upload New SET Instrument" /></a>
	
	</div>
	</div>
	</body>