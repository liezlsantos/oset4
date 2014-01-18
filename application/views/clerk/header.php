	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		
	<script src="<?php echo base_url('javascript/jquery-1.9.1.js');?>"></script>
	<script src="<?php echo base_url('javascript/jquery-ui.js');?>"></script>
	<script>
		<?php 
			$index = 0;
			if(isset($isAdmin))
				$index = 1;
		?>
		$(document).ready(function() {
			$("#accordion").accordion({active: <?php echo $index; ?>});
			$("#checkAll").click(function(){
			    $('input:checkbox').not(this).prop('checked', this.checked);
			});
		});
	</script>
	
	<div class="header">
		<img alt="OSET header" class="banner" src="<?php echo base_url('css/images/oset.jpg');?>">
		<div class="loginbar">Welcome <?php echo $first_name; ?>. <a href="<?php echo base_url('/index.php/login/logout');?>">Logout</a></div>
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
						<a href="'.base_url('/index.php/admin/studentaccountmanagement').'"'; if(strpos($_SERVER["PHP_SELF"],"admin/studentaccountmanagement")) echo 'class="current"'; echo'">Generate Student Accounts</a>
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
					<h1>Clerk Utilities</h1>
				</div>
				
				<div>
					<div class="module-div">
						<h1>Class Management</h1>
						<a href="'.base_url('/index.php/clerk/classmanagement').'"'; 
						if(strpos($_SERVER["PHP_SELF"],"clerk/classmanagement") 
						&& !strpos($_SERVER["PHP_SELF"],"clerk/classmanagement/view")) 
							echo 'class="current"'; echo '">Classes-Faculty Selection</a>
						<a href="'.base_url('/index.php/clerk/studentaccount').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/studentaccount")) echo 'class="current"'; echo'">List of Students</a>';
				
						if($SET['accounts_generated'])
						{
							echo '<a href="'.base_url('/index.php/clerk/setinstrumentassignment').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/setinstrumentassignment") && strpos($_SERVER["PHP_SELF"],"set")) echo 'class="current"'; 
							echo '">Assignment of SET Instrument</a>';
						}
		 			echo '</div>';
				
				if($SET['accounts_generated'])
				{
				echo '
					<div class="module-div">
						<h1>Evaluation Management</h1>			
						<a href="'.base_url('/index.php/clerk/evaluationmanagement/open').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/evaluationmanagement/open")) echo 'class="current"'; echo'">Open Evaluation</a>
						<a href="'.base_url('/index.php/clerk/evaluationmanagement/close').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/evaluationmanagement/close")) echo 'class="current"'; echo'">Close Evaluation</a>
						<a href="'.base_url('/index.php/clerk/evaluationmanagement/status').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/evaluationmanagement/status")) echo 'class="current"'; echo'">Evaluation Status</a>
						<a href="'.base_url('/index.php/clerk/evaluationmanagement/studentstatus').'"'; if(strpos($_SERVER["PHP_SELF"],"clerk/evaluationmanagement/studentstatus")) echo 'class="current"'; echo'">Student Evaluation Status</a>
					</div>
				';
				}
				echo '</div>';
			}	
			if(isset($isAnalyst))
			{
				echo '
				<div class="module-div2">
					<h1>Information Security Analyst</h1>
				</div>
				
				<div>				
					<div class="module-div">
						<h1>SET</h1>			
						<a href="" ></a>
					</div>
				</div>
				';
			}
		?>
		
			<div class="module-div2">
				<h1>Account Management</h1>
			</div>
		
			<div>
				<div class="module-div">
					<a href="<?=base_url('/index.php/changepassword')?>" <?php if(strpos($_SERVER["PHP_SELF"],"changepassword")) echo 'class="current"'?>> Change password</a>
				</div>
				<div class="module-div">
					<a href="<?=base_url('/index.php/login/logout')?>">Logout</a>
				</div>
			</div>
		</div>
	</div>