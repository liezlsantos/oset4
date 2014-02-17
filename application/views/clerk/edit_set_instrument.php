<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
	
		<h2>Edit SET Instrument <?php echo "(".$class['subject']." - ".$class['section'].")"; ?></h2>
		
		<form method="POST" action="<?php echo base_url('index.php/clerk/setinstrumentassignment/update/'.$class["oset_class_id"])?>">
			
		<table>
			<tr>
				<td width="120px;">SET Instrument: <font color='red'>*</font>
				<td>
					<select name="set_instrument">
						<?php 
							$i = 0;
							foreach ($set['set_instrument_id'] as $id)
							{
								echo "<option";
								if($id == $class['set_instrument_id'])
									echo " selected";
								echo " value=".$id.">".$set['name'][$i]."</option>";
								$i++;	
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' value="Save"><a href="<?php echo base_url('index.php/clerk/setinstrumentassignment/');?>"><input type="button" value="Cancel"></a> </td>
			</tr>
		</table>
		
		</form>
		
		</div>
		</div>
	</body>