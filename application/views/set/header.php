<?php include('check.php'); ?>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		
	<script src="<?php echo base_url('js/jquery-1.9.1.js');?>"></script>
	<script src="<?php echo base_url('js/jquery-ui.js');?>"></script>
	<script>
		$(document).ready(function() {
			$( "#accordion" ).accordion({active: 0, heightStyle: "content"});
		});
	</script>
	
	<div class="header">
		&nbsp; &nbsp; 
		<img height="109px" style="margin-top: 5px;" src="<?php echo base_url('css/images/logo.png'); ?>" align="middle"></img>
		&nbsp; &nbsp; 
		<font class="title">Online Student Evaluation of Teachers</font>
		<div class="subtitle">
			University of the Philippines Manila</div>
		<div class="loginbar">
		<?php
			if($preview)
				echo "Welcome ".$first_name;
			else
				echo "Welcome ".ucwords(strtolower(substr($name, strpos($name, ",")+2)));
		?>
		<a href="<?php echo base_url('/index.php/login/logout');?>">Logout</a> &nbsp;</div>
	</div>
		
	<div class="left">
		<div id="accordion">
			<?php 
			if(isset($isAdmin))
			{
				echo '
				<div class="module-div2">
					<h1>Administration</h1>
				</div>
				
				<div>
					<div class="module-div" class="current">
						<h1>Account Management</h1>
						<a href="'.base_url('/index.php/admin/account').'"'; if(strpos($_SERVER["PHP_SELF"],"admin/account")) echo 'class="current"'; echo'> View User Accounts</a>	
						<a href="'.base_url('/index.php/admin/studentaccountmanagement').'"'; if(strpos($_SERVER["PHP_SELF"],"admin/studentaccountmanagement") && !strpos($_SERVER["PHP_SELF"],"admin/studentaccountmanagement/changepassword")) echo 'class="current"'; echo'">Generate Student Accounts</a>
						<a href="'.base_url('/index.php/admin/studentaccountmanagement/changepassword').'"'; if(strpos($_SERVER["PHP_SELF"],"admin/studentaccountmanagement/changepassword")) echo 'class="current"'; 
						echo '">Change Student\'s Password</a>
					</div>

					<div class="module-div">
						<h1>Class Management</h1>
						<a href="'.base_url('/index.php/admin/classmanagement').'"'; if(strpos($_SERVER["PHP_SELF"],"admin/classmanagement")) echo 'class="current"'; echo'>Download Classes</a>
					</div>
					
					<div class="module-div">
						<h1>SET </h1>
						<a href="'.base_url('/index.php/admin/SET').'"'; if(strpos($_SERVER["PHP_SELF"],"admin/SET")) echo 'class="current"'; echo'"> Setup</a>
						<a href="'.base_url('/index.php/admin/setinstrumentmanagement').'"'; if(strpos($_SERVER["PHP_SELF"],"admin/setinstrument")) echo 'class="current"'; echo'"> SET Instrument Management</a>
					</div>
				</div>';		
			}			
			if($preview)
			{
				echo '
				<div class="module-div2">
					<h1>Account Management</h1>
				</div>
		
				<div>
					<div class="module-div">
						<a href="'.base_url('/index.php/changepassword').'"';
						if(strpos($_SERVER["PHP_SELF"],"changepassword")) 
							echo 'class="current"';
						echo '> Change password</a>
					</div>
				<div class="module-div">
					<a href="'.base_url('/index.php/login/logout').'">Logout</a>
					</div>
				</div>';
			}
			else
			{
				echo '
				<div class="module-div2">
					<h1>Student Panel</h1>
				</div>
		
				<div>
					<div class="module-div">
						<a href="'.base_url('/index.php/student/home').'" class="current">View Classes</a>
						<a href="'.base_url('/index.php/login/logout').'">Logout</a>
					</div>
				</div>';
			}
			?>
		</div>
	</div>