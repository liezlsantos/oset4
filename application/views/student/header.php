	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
		
	<script src="<?php echo base_url('javascript/jquery-1.9.1.js');?>"></script>
	<script src="<?php echo base_url('javascript/jquery-ui.js');?>"></script>
	<script>
		$(document).ready(function() {
			$( "#accordion" ).accordion({active: 0});
		});	
	</script>
	
	<div class="header">
		<img alt="OSET header" class="banner" src="<?php echo base_url('css/images/oset.jpg');?>">
		<div class="loginbar">Welcome <?php echo substr(ucwords(strtolower($name)), strpos($name, ",")+2) ?>. <a href="<?php echo base_url('/index.php/login/logout');?>">Logout</a></div>
	</div>
		
	<div class="left">
		<div id="accordion">
			<div class="module-div2">
				<h1>Student Panel</h1>
			</div>
		
			<div>
				<div class="module-div">
					<a href="<?=base_url('/index.php/student/home')?>" class="current">View Classes</a>
				</div>
				<div class="module-div">
					<a href="<?=base_url('/index.php/login/logout')?>">Logout</a>
				</div>
			</div>
		</div>
	</div>