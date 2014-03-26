<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=str_replace('http', 'https', base_url('css/style.css'))?>' rel='stylesheet' type='text/css'>
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

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
		
			<h2> Add New User </h2>
			
			<div id="formcss">
				<span class="error_msg"><?php if(isset($error_msg)) echo $error_msg."<br/>"; ?><br/></span>
				<?php echo str_replace('http', 'https', form_open('admin/account/submit', array('onSubmit'=>true))); ?> 
				<table>
					<tr>
					<td>Username : <font color="red">*</font></td>
					<td class="element"><input type="text" name="username" id="username" value="<?php if(isset($user['username'])) echo $user['username']; ?>" required></td>
					</tr>
					
					<tr>
					<td>First name : <font color="red">*</font></td>
					<td class="element"><input type="text" name="first_name" id="first_name" value="<?php if(isset($user['first_name'])) echo $user['first_name']; ?>" required></td></tr>
					
					<tr>
					<td>Last name : <font color="red">*</font></td>
					<td class="element"><input type="text" name="last_name" id="last_name" value="<?php if(isset($user['last_name'])) echo $user['last_name']; ?>" required></td>
					</tr>
					
					<tr>
					<td>User role : <font color="red">*</font></td>
					<td class="element">
							<?php
								$user_type = 0;
								if(isset($user['user_type']))
									$user_type = $user['user_type'];
							?>
							<br/>
							<input type="checkbox" value=1 name="isAdmin" <?php if(strpos($user_type, '1') !== false) echo "checked";?>>administrator<br/>
							<input type="checkbox" value=2 name="isClerk" id="isClerk" <?php if(strpos($user_type, '2') !== false) echo "checked";?> onClick="show('collegeDiv', 'isClerk');">clerk<br/>
							<input type="checkbox" value=3 name="isAnalyst" <?php if(strpos($user_type, '3') !== false) echo "checked";?>>information security analyst
							<br/><br/>
					</tr>
					
					<tr>
						<td><div name="collegeDiv" <?php if(strpos($user_type, '2') === false || $user_type == 0) echo 'style="display:none;"';?> >College : <font color="red">*</font></div></td>
						<td class="element">
							<div name="collegeDiv" <?php if(strpos($user_type, '2') === false || $user_type == 0) echo 'style="display:none;"';?>>
							<?php if(!isset($user['college_code'])) $user['college_code'] = "CAMP";?>
							<select name="college_code" id="college_code">
								<?php
									for ($i = 0; $i < count($colleges['college_code']); $i++)
									{
										echo '<option value="'.$colleges['college_code'][$i].'"';
										if($user['college_code'] == $colleges['college_code'][$i]) 
											echo " selected";
										echo '>'.$colleges['college_name'][$i].'</option>';
									}
								?>	
							</select>
							</div>
						</td>
					</tr>
					
					<tr>
					<td>Password : <font color="red">*</font></td>
					<td class="element"><input type="password" name="password" id="password" value="" required></td>
					</tr>
					
					<tr>
					<td>Confirm password : <font color="red">*</font></td>
					<td class="element"><input type="password" name="password2" id="password2" value="" required></td>
					</tr>
					
					<tr>
						<td><td><br/><input type="submit" value="Add"><a href="<?php echo base_url('index.php/admin/account')?>"><input type="button" value="Cancel"></a> 
					</tr>
				</table>
				<?php echo form_close();?>
			</div>
		</div>
		</div>
	</body>