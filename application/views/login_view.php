<?php include('check.php'); ?>
	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class ='main-content-body loginbox'>			
			<center>  
				<br/><br/>
				<font color = red><?php echo validation_errors(); ?><br/></font>
				<?php echo form_open('login/submit', array('onSubmit'=>true)); ?> 
				<table width="90%">
					<tr><td>Username</tr> 
					<tr><td><input type="text" name="username" size=25 required/> <br/><br/></tr>
					<tr><td>Password</tr> 
					<tr><td><input type="password" name="password" size=25 required/> <br/></tr>
					<tr>
						<td colspan=2 align="center"><br/><br/><input type="submit" class="button" name="submit" value="Log In" />
					</tr>
				</table>
				<?php form_close();?>
			</center>
		</div>	
	</body>