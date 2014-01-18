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

		The SET is currently set for <span style="color:maroon"> <?php if(substr($records['semester'], 4, 4) == 1) echo '1st'; else echo '2nd';?> Semester </span> 
		Academic Year <span style="color:maroon"> <?php echo substr($records['semester'], 0, 4).'-'; echo substr($records['semester'], 0, 4)+1;?>.</span>
		
		</br></br>
		<?php echo form_open('admin/SET/submit', array('onSubmit'=>true)); ?> 
		
		<table>
		<tr>
			<td>Academic Year : <font color="red">*</font></td>
			<td class="element">
			<select name="academic_year" id="Academic_Year">
				<option value="2010" <?php if (substr($records['semester'], 0, 4) == 2010) echo "selected";?>>2010 - 2011</option>
				<option value="2011" <?php if (substr($records['semester'], 0, 4) == 2011) echo "selected";?>>2011 - 2012</option>
				<option value="2012" <?php if (substr($records['semester'], 0, 4) == 2012) echo "selected";?>>2012 - 2013</option>
				<option value="2013" <?php if (substr($records['semester'], 0, 4) == 2013) echo "selected";?>>2013 - 2014</option>
				<option value="2014" <?php if (substr($records['semester'], 0, 4) == 2014) echo "selected";?>>2014 - 2015</option>
				<option value="2015" <?php if (substr($records['semester'], 0, 4) == 2015) echo "selected";?>>2015 - 2016</option>
			</select></td>
		</tr>
		
		<tr>
			<td>Semester : <font color="red">*</font></td>
			<td>
				<input type="radio" name="semester" id="Semester-1" value="1" <?php if(substr($records['semester'], 4, 4) == 1) echo 'checked';?>>First</label><br /><label for="Semester-2">
				<input type="radio" name="semester" id="Semester-2" value="2" <?php if(substr($records['semester'], 4, 4) == 2) echo 'checked';?>>Second</label></td>
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