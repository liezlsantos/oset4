<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		<div class = "right">
		
		<h2> Assignment of SET Instrument <?php echo "(".$user_college_name.")"; ?></h2>
		
		<?php echo form_open('clerk/setinstrumentassignment/search', array('onSubmit'=>true)); ?>
		
		<table>
			<tr>
				<td>Subject:</td>
				<td width="180"><input type="text" name="subject" <?php if(isset($search['subject'])) echo "value=".$search['subject']; ?> ></td>
				<td>Department: </td>
				<td width="220">
					<select name="department">
						<option value = "">All departments</option>
						<?php
							if(!isset($search['department']))
								$search['department'] = "";
							for ($i = 0; $i < count($departments['department_code']); $i++)
							{
								echo '<option value="'.$departments['department_code'][$i].'"';
								if($search['department'] == $departments['department_code'][$i]) 
									echo " selected";
								echo '>'.$departments['department_name'][$i].'</option>';
							}
						?>	
					</select>
				</td>
				<td></td>
				<td><input type="submit" value="Search"></td>
			</tr>
		</table>
		<?php echo form_close(); ?>
		
		<table width="100%">
		<tr>
			<td align="center"><font color="green"><?php if(isset($_SESSION['msg'])) {echo $_SESSION['msg']; unset($_SESSION['msg']);}?></font></td>
		</tr>
		</table>
		<br/>
		<?php
			if(isset($records))
			{
				echo form_open('clerk/setinstrumentassignment/submit/', array('onSubmit'=>true)); 
				echo 
				'<table class="records">
				<tr>
				<th>Subject</th>
				<th>Section</th>
				<th>Instructor</th>
				<th>SET Instument</th>
				<th align="left"><input type="checkbox" id="checkAll"></th>
				</tr>';
				for($i=0; $i<count($records['subject']); $i++) {
					echo "<tr>
							<td>".$records['subject'][$i]."</td>
							<td>".$records['section'][$i]."</td>
							<td>".$records['instructor'][$i]."</td>
							<td>".$records['set_instrument'][$i]."</td>";
					echo	"<td><input type='checkbox' name=".$records['oset_class_id'][$i]."></th>
						 </tr>";
				}
				echo "</table>";
				
				echo "<br/>
					  <table>
						<tr>
							<td width='270px'>Choose SET instrument for selected classes: </td>
							<td>
								<select name='set_instrument'>";
									for ($i = 0; $i < count($instruments['set_instrument_id']); $i++)
									{
										echo '<option value="'.$instruments['set_instrument_id'][$i].'">'
										.$instruments['name'][$i].'</option>';
									}
	
								echo "
								</select>
							</td>
							<td><input type = 'submit' value = 'Submit'></td>
						</tr>
					  </table>";
				
			}
			else
			{
				echo "No record found.";
			}
			
			if(isset($search['subject']))
				echo '<br/><br/><a href="setinstrumentassignment">Back to all classes </a>';
		
		?>
			
	</div>

	</body>