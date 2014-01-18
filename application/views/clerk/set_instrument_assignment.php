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
		
		<br/>
		<?php
			if(isset($records))
			{
				echo 
				'<table class="records">
				<tr>
				<th>Subject</th>
				<th>Section</th>
				<th>Instructor</th>
				<th>SET Instument</th>
				<th></th>
				</tr>';
				for($i=0; $i<count($records['subject']); $i++) {
					echo "<tr>
							<td>".$records['subject'][$i]."</td>
							<td>".$records['section'][$i]."</td>
							<td>".$records['instructor'][$i]."</td>
							<td>".$records['set_instrument'][$i]."</td>";
					echo	"<td><a href='".base_url('index.php/clerk/setinstrumentassignment/edit/'.$records['oset_class_id'][$i])."'>Change SET instrument </a></td>
						 </tr>";
				}
				echo "</table>";
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