<?php include('check.php'); ?>
	<header>
		<title>OSET 4.0</title>
		<link href='<?=str_replace('http', 'https', base_url('css/style.css'));?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class ='main-content-body loginbox'>			
			<center>
				<img src="<?=base_url('css/images/logo.jpg');?>"
							width="100px" align="middle"></img>
				<font style="font-family:Georgia;font-size:20px">Online Student Evaluation of Teachers</font>
				<?php echo str_replace('http', 'https', form_open('login/submit', array('onSubmit'=>true))); ?> 
				<table cellpadding="3">
					<tr><td colspan="2" align="center"><font color = red><?php echo validation_errors(); ?>&nbsp;</font></td></tr>
					<tr><td colspan="2">For student use your student number (20xx-xxx) as username</td></tr>
					<tr><td>&nbsp;</td></tr>
					<tr><td>Username <td><input type="text" name="username" size=25 required/> <br/>
					<tr><td><br/></td></tr>
					</tr>
					<tr><td>Password <td><input type="password" name="password" size=25 required/> <br/></tr>
					<tr>
						<td colspan=2 align="center"><br/><br/><input type="submit" class="button" name="submit" value="Login" />
					</tr>
				</table>
				<?php echo form_close();?>
			</center>
		</div>	
	</body>