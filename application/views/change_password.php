<?php include('check.php'); ?>	
	<header>
		<title>OSET 4.0</title>
		<link href='<?=str_replace('http', 'https', base_url('css/style.css'))?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
	<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
		
			<h2> Change Password </h2>
			
			<div id="formcss">
				<span class="error_msg"><?php if(isset($msg)) {if($msg == "Password changed.") echo "<font color='#019901'>".$msg."<br/></font>"; else echo $msg."<br/>"; }?></span><br/>
				<?php echo str_replace('http', 'https', form_open('changepassword/submit', array('onSubmit'=>true))); ?> 
				<table>
					<tr>
					<td>Old password : <font color="red">*</font></td>
					<td class="element"><input type="password" name="password" id="password" value="" required></td>
					</tr>
					
					<tr>
					<td>New password : <font color="red">*</font></td>
					<td class="element"><input type="password" name="password1" id="password" value="" required></td>
					</tr>
					
					<tr>
					<td>Confirm password : <font color="red">*</font></td>
					<td class="element"><input type="password" name="password2" id="password2" value="" required></td>
					</tr>
					
					<tr>
						<td><td><br/><input type="submit" value="Save"><a href="<?php echo base_url('index.php/home'); ?>"><input type="button" value="Cancel"></input></a>
					</tr>
				</table>
				<?php echo form_close();?>
			</div>
		</div>
	</div>
	</body>