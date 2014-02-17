<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
		
			<h2> Edit SET Instrument </h2>
			
			<div id="formcss">
				<span class="error_msg"><?php if(isset($error_msg)) echo $error_msg; ?></span><br/><br/>
				<?php echo form_open('admin/setinstrumentmanagement/update/'.$set->set_instrument_id, array('onSubmit'=>true)); ?> 
				<table>
					<tr>
					<td>SET Name : <font color="red">*</font></td>
					<td class="element"><input type="text" name="name" value="<?php echo $set->name;?>" required></td>
					</tr>
					
					<tr>
						<td></td>
						<td><input type="submit" value="Save"></input><a href="<?php echo base_url('index.php/admin/setinstrumentmanagement');?>"><input type="button" value="Cancel"></input></a>
						</td>
					</tr>
				</table>
				<?php form_close();?>
			</div>
		</div>
		</div>
	</body>