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
		<div class="loginbar">Welcome <?php echo substr(ucwords(strtolower($name)), strpos($name, ",")+2) ?>. <a href="<?php echo base_url('/index.php/login/logout');?>">Logout</a> &nbsp;</div>
	</div>
		
	<div class="left">
		<div id="accordion">
			<div class="module-div2">
				<h1>Student Panel</h1>
			</div>
		
			<div>
				<div class="module-div">
					<a href="<?=base_url('/index.php/student/home')?>" class="current">View Classes</a>
					<a href="<?=base_url('/index.php/login/logout')?>">Logout</a>
				</div>
			</div>
		</div>
	</div>