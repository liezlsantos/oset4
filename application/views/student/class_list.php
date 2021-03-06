<?php include('check.php'); ?>
	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
			<h2>List of Classes</h2>
		
			<?php
			if(isset($_SESSION['msg'])) {echo "<center><font color=green>".$_SESSION['msg']."</font><br/><br/></center>"; unset($_SESSION['msg']);}
			?>
			
			<table class = "records">
				<tr>
					<th>Subject</th>
					<th>Section</th>
					<th>Instructor</th>
					<th></th>
				</tr>
				<?php 
					$i = 0;
					foreach ($records['subject'] as $subject)
					{
						echo 
						"<tr>
							<td>".$records['subject'][$i]."</td>
							<td>".$records['section'][$i]."</td>
							<td>".ucwords(strtolower($records['instructor'][$i]))."</td>
							<td>";
						if($records['evaluated'][$i])	
							echo "<font color='green'>Evaluated</font>";
						else
						{
							if($records['open'][$i] == 0)
								echo "Evaluation for this class is <i>not yet opened</i>.";
							elseif($records['open'][$i] == 2) 
								echo "Evaluation for this class is already <i>closed</i>.";
							else 
								echo "<a href='".
								base_url('index.php/student/set/'.$records['controller_name'][$i].'/evaluate/'.$records['oset_class_id'][$i])
								."'>Evaluate</a>";
						}
							
						echo "</td>
						</tr>";
						$i++;
					}
				?>
			</table>
		</div>
		</div>
	</body>