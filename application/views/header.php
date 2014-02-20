	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<script src="<?php if(strpos($_SERVER["PHP_SELF"],"changepassword")) echo str_replace('http', 'https', base_url('js/jquery-1.9.1.js')); else echo base_url('js/jquery-1.9.1.js');?>"></script>
	<script src="<?php if(strpos($_SERVER["PHP_SELF"],"changepassword")) echo str_replace('http', 'https', base_url('js/jquery-ui.js')); else echo base_url('js/jquery-ui.js');?>"></script>
	<script>
		<?php 
			$index = 0;
			if(isset($isAdmin)) $index++; 
			if(isset($isClerk)) $index++;
			if(isset($isAnalyst)) $index++;
			if(strpos($_SERVER["PHP_SELF"],"changepassword") === false)
				$index = 0; 
		?>
		$(document).ready(function() {
			$( "#accordion" ).accordion({active:<?php echo $index; ?>, heightStyle: "content"});
		});	
	</script>
	
	<div class="header">
		&nbsp; &nbsp; 
		<img height="109px" style="margin-top: 5px;" src="<?php echo base_url('css/images/logo.png'); ?>" align="middle"></img>
		&nbsp; &nbsp; 
		<font class="title">Online Student Evaluation of Teachers</font>
		<div class="subtitle">
			University of the Philippines Manila</div>
		<div class="loginbar">Welcome <?php echo $first_name; ?>. <a href="<?php echo base_url('/index.php/login/logout');?>">Logout</a> &nbsp;</div>
	</div>
		
	<div class="left">
		<div id="accordion">
			<?php 
			if(isset($isAdmin))
			{
				echo '
				<div class="module-div2">
					<a href="" class="no-style"><h1>Administration</h1></a>
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
			if(isset($isClerk))
			{
				echo '
				<div class="module-div2">
					<a href="" class="no-style"><h1>Clerk Utilities</h1></a>
				</div>
				
				<div>
					<div class="module-div">
						<h1>Class Management</h1>
						<a href="'.base_url('/index.php/clerk/classmanagement').'"'; 
						if(strpos($_SERVER["PHP_SELF"],"clerk/classmanagement") 
						&& !strpos($_SERVER["PHP_SELF"],"clerk/classmanagement/view")) 
							echo 'class="current"'; echo '">Classes-Faculty Selection</a>
						<a href="'.base_url('/index.php/clerk/studentaccount').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/studentaccount")) echo 'class="current"'; echo'">List of Students</a>
						<a href="'.base_url('/index.php/clerk/setinstrumentassignment').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/setinstrumentassignment") && strpos($_SERVER["PHP_SELF"],"set")) echo 'class="current"'; echo '">SET Instrument Assignment</a>';
		 			echo '</div>';
				
				if($SET['accounts_generated'])
				{
				echo '
					<div class="module-div">
						<h1>Evaluation Management</h1>			
						<a href="'.base_url('/index.php/clerk/evaluationmanagement/open').'"'; if(strpos($_SERVER["PHP_SELF"],"open") || strpos($_SERVER["PHP_SELF"],"close")) echo 'class="current"'; echo'">Evaluation Mode</a>
						<a href="'.base_url('/index.php/clerk/evaluationmanagement/status').'"'; if(strpos($_SERVER["PHP_SELF"],"status")) echo 'class="current"'; echo'">Evaluation Status</a>
					</div>					
				';
				}
				echo '
					<div class="module-div">
						<h1>Report Management </h1>
						<a href="'.base_url('/index.php/clerk/reportmanagement/reportperclass').'"'; if(strpos($_SERVER["PHP_SELF"],"reportperclass")) echo 'class="current"'; echo'">Class Detailed Report</a>
						<a href="'.base_url('/index.php/clerk/reportmanagement/facultysummarizedreport').'"'; if(strpos($_SERVER["PHP_SELF"],"faculty")) echo 'class="current"'; echo'">Faculty Summarized Report</a>
					</div>
				</div>';
			}
			if(isset($isAnalyst))
			{
				echo '
				<div class="module-div2">
					<a class="no-style" href=""><h1>Info Security Analyst</h1></a>
				</div>
				<div>				
					<div class="module-div">
						<h1>Export Data</h1>			
						<a href="'.base_url('/index.php/infoanalyst/exportdata').'"';  if(strpos($_SERVER["PHP_SELF"],"export")) echo 'class="current"'; echo'>Archive Tables</a>
					</div>
				</div>
				';
			}
		?>
			<div class="module-div2">
				<a class="no-style" href=""><h1>Account Management</h1></a>
			</div>
			<div>
				<div class="module-div">
					<a href="<?=base_url('/index.php/changepassword')?>" <?php if(strpos($_SERVER["PHP_SELF"],"changepassword")) echo 'class="current"'?>> Change password</a>
					<a href="<?=base_url('/index.php/login/logout')?>">Logout</a>
				</div>
			</div>
		</div>
	</div>