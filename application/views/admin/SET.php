<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		<script>
			function warning(){ 
				return confirm('Save SET setup?'); 
			}
		</script>
	</header>

	<body class="wrapper">
		
	<?php include('header.php'); ?>
		
	<div class = "right">
		
		<h2>SET Setup</h2>

		The SET is currently set for <span style="color:maroon"> <?php if(substr($SET['semester'], 4, 4) == 1) echo '1st'; else echo '2nd';?> Semester </span> 
		Academic Year <span style="color:maroon"> <?php echo substr($SET['semester'], 0, 4).'-'; echo substr($SET['semester'], 0, 4)+1;?>.</span>
		
		</br></br>
		<?php echo form_open('admin/SET/submit', array('onSubmit'=>true)); ?> 
		
		<table>
		<tr>
			<td>Academic Year : <font color="red">*</font></td>
			<td class="element">		
			<select name="academic_year" id="Academic_Year">
				<?php 
				    $year = date("Y");
					for ($i = 4; $i >= 0; $i--)
					{
						$year1 = $year-$i;
						$year2 = $year-$i+1;
						echo '<option value="'.$year1.'"'; if (substr($SET['semester'], 0, 4) == $year1) echo "selected"; echo '>'.$year1.' - '.$year2.'</option>';
					}
				?>
			</select></td>
		</tr>
		
		<tr>
			<td>Semester : <font color="red">*</font></td>
			<td>
				<input type="radio" name="semester" id="Semester-1" value="1" <?php if(substr($SET['semester'], 4, 4) == 1) echo 'checked';?>>First</label><br /><label for="Semester-2">
				<input type="radio" name="semester" id="Semester-2" value="2" <?php if(substr($SET['semester'], 4, 4) == 2) echo 'checked';?>>Second</label></td>
		</tr>
		
		<tr> 
			<td><input type="submit" name="submit" id="submit" value="Save" User_ID="submitbutton" onCLick="return warning();"></td>
		</tr>
		<tr>
			<td colspan="2"><br/></r><i>Clicking save will delete all the records of the past SET setup.</i></td>
		</tr>
		
		</table>
		
		<?php form_close(); ?>
		
	
	
	</div>

	</body>