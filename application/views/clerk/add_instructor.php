<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body>
		<div class="wrapper">
		<span class="nostyle">
		<?php include('header.php'); ?>
		</span>
		
		<script>
		  $(function() {
		    var instructors = <?php echo json_encode($faculty['name']); ?>;
		    
		    $("#instructor").autocomplete({
		      source: instructors
		    });
		  });
		  
		 function convertToCode()
		 {
		 	document.getElementById('warning').style.display="none";	    
		 	var name = document.getElementById('instructor').value;
		 	var instructor_codes = <?php echo json_encode($faculty['instructor_code']); ?>;
		    var instructors = <?php echo json_encode($faculty['name']); ?>;
		    
		    for (var i = 0; i<instructors.length; i++)
		    {
		    	if(instructors[i] == name)
		    	{
		    		document.getElementById('instructor').value = instructor_codes[i];
		    		return true;
		    	}
		    }
		    
		    document.getElementById('warning').style.display="block";
		    return false;
		 }
  		</script>
		
		<link href='<?=base_url('css/autocomplete.css')?>' rel='stylesheet' type='text/css'>

		<div class = "right">
	
		<h2>Add Instructor <?php echo "(".$class['subject']." - ".$class['section'].")"; ?></h2>
		
		<form method="POST" action="<?php echo base_url('index.php/clerk/classmanagement/submit/'.$class["class_id"])?>" onSubmit='return convertToCode()'>
			
		<table>
			<tr>
				<td colspan="2"><span id="warning" style="color:red; display:none;">This name is not a member of the faculty. Click <a href="<?php echo base_url("index.php/clerk/classmanagement/addNewInstructor/".$class['class_id'])?>">here</a> to add a new faculty member.</span><br/></td>
			</tr>
			<tr>
				<td width="120px;">Instructor's name: <font color='red'>*</font>
				<td>
					<input name="instructor_code" size="30" type="text" id="instructor" required></input>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type='submit' value="Add"><a href="<?php echo base_url('index.php/clerk/classmanagement/edit/'.$class["class_id"]); ?>"><input type="button" value="Cancel"></a> </td>
			</tr>
		</table>
		
		</form>
		
		</div>
		</div>
	</body>