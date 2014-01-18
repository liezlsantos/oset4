<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		<script>
			function checkCode()
		 	{
			 	document.getElementById('warning').style.display="none";	    
			 	var code = document.getElementById('instructor').value.toUpperCase();
			 	var instructor_codes = <?php echo json_encode($faculty['instructor_code']); ?>;
			   
			    for (var i = 0; i<instructor_codes.length; i++)
			    {
			    	if(instructor_codes[i] == code)
			    	{
			    		document.getElementById('warning').style.display="block";
			    		return false;
			    	}
			    }
			    
			    document.getElementById('instructor').value = code;
			    return true;
		 	}
		</script>
	
		<div class = "right">
	
		<h2>Add New Faculty Member </h2>
		
		<form method="POST" action="<?php echo base_url('index.php/clerk/classmanagement/addNewInstructorSubmit/'.$class['class_id']);?>" onSubmit='return checkCode()'>
			
		<table>
			<tr>
				<td colspan="2"><span id="warning" style="color:red; display:none;">Instructor Code already exists.</span><br/></td>
			</tr>
			<tr>
				<td>Instructor's name: <font color='red'>*</font>
				<td>
					<input name="name" size="30" type="text" required></input>
				</td>
			</tr>
			<tr>
				<td>Instructor's code: <font color='red'>*</font>
				<td>
					<input name="code" id="instructor" size="30" type="text" required></input>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input name="addToClass" size="30" type="checkbox">Add this instructor to <?php echo $class['subject']." - ".$class['section']; ?></input></td>
			</tr>
			<tr>
				<td></td>
				<td><br/><input type='submit' value="Add"><a href="<?php echo base_url('index.php/clerk/classmanagement/addInstructor/'.$class["class_id"]); ?>"><input type="button" value="Cancel"></a> </td>
			</tr>
		</table>
		
		</form>
		
		</div>

	</body>