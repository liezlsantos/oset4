<?php include('check.php'); ?>
	<header>
		<title>OSET 4.0</title>
		<link href='<?=str_replace('http', 'https', base_url('css/style.css'));?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
			<div class="header">
				&nbsp; &nbsp; 
				<img height="109px" style="margin-top: 5px;" src="<?php echo base_url('css/images/logo.png'); ?>" align="middle"></img>
				&nbsp; &nbsp; 
				<font class="title">Online Student Evaluation of Teachers</font>
				<div class="subtitle">
					University of the Philippines Manila</div>
				<div class="loginbar">Not logged in &nbsp;</div>
			</div>
			
			<div class="left2">
			<div class="loginform">LOGIN FORM</div>
					
			<div class ='loginbox'>			
				<center>
					<?php echo str_replace('http', 'https', form_open('login/submit', array('onSubmit'=>true))); ?> 
					<table cellpadding="3">
						<tr><tdalign="center"><font color = red><?php if(validation_errors()) echo validation_errors(); else echo "<br/>"; ?>&nbsp;</font></td></tr>
						<tr></td></tr>
						<tr><td>Username</tr>
						<tr><td><input type="text" name="username" size=25 required/> <br/></tr>
						<tr><td><br/></td></tr>
						</tr>
						<tr><td>Password</tr> 
						<tr><td><input type="password" name="password" size=25 required/> <br/></tr>
						<tr>
							<td colspan=2 align="center"><br/><br/><input type="submit" class="button" name="submit" value="Login" />
						</tr>
					</table>
					<?php echo form_close();?>
				</center>
			</div>
			</div>
			<div class="right2">
				
				<span style="font-family: Georgia; font-weight: normal; font-size: 23px; color: maroon">Student Evaluation of Teachers (SET)</span>
				<br/><br/>
				<div style="font-size: 13px; line-height: 1.6; width: 95%;">
				<p>
					Please login using your student number (e.g. 2010-99999) as username and password given to you.
				</p>
				<span style="font-size: 15px;">About SET</span>
				<p>
				Students of the University of the Philippines Manila are requested to evaluate the teaching 
				performance of their respective classes near the end of the semester. 
				</p>
				<p>
				The main purpose of the Student Evaluation of Teaching Performance
				(SET) is for the students to share their thoughts, feelings and suggestions on how to improve 
				the particular class as well as the performance of the faculty being evaluated so that the 
				degree programs of different colleges can be enhanced and the benefits that the students get from 
				their classes can be maximized.
				</p>
				</div>		
			</div>
		</div>	
	</body>