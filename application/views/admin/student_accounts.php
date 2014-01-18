<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		<script>
			function show(div, id)
			{
				var divs = document.getElementsByName(div);
				
				if(document.getElementById(id).checked)
				{
					for(var i = 0; i < divs.length; i++)
						divs[i].style.display="block";
				}
				else
				{
					for(var i = 0; i < divs.length; i++)
						divs[i].style.display="none";
				}
			}
		</script>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		
		<div class = "right">
		
			<h2> Generate Student Accounts </h2>
			
			<?php if(!$SET['accounts_generated'])
						echo "Before generating students' accounts make sure that the college clerks have already selected all the classes that will undergo evaluation process.
						After the students' accounts have been generated, downloading and selection of classes will be disabled.<br/><br/><a href='studentaccountmanagement/download'>Generate student accounts</a>";
				  else
				  {
						echo "Students' accounts have already been generated.";
				  
				  		if($SET['accounts_generated'] == 2)
				  			echo '<br/><br/><iframe src='.base_url('/pdf/students_passwords.pdf').' width="100%" height="1000px;"  />';
						else
							echo ' Click <a href='.base_url('/index.php/admin/studentaccountmanagement/generatepassword').'>here</a> to generate passwords.';
				  }
			?>
		</div>

	</body>