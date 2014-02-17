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

	<body onLoad="show('passwordDiv', 'changePassword'), show('collegeDiv','isClerk');">
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
		
			<h2> Edit User </h2>
			
			<div id="formcss">
				<span class="error_msg"><?php if(isset($error_msg)) echo $error_msg; ?></span><br/><br/>
				<?php 
					if(!isset($error_msg)) 
					{
						$user['first_name'] = $info->first_name;
						$user['last_name'] = $info->last_name;
						$user['user_type'] = $info->user_type;
						$user['username'] = $info->username;
						$user['user_type'] = $info->user_type;
						$user['college_code'] = $info->college_code;
					}
					echo form_open('admin/account/update/'.$user['username'], array('onSubmit'=>true)); ?> 
				<table>
					<tr>
					<td>Username :</td>
					<td class="element"><input type="text" name="username" id="username" value="<?php echo $user['username'];?>" disabled required></td>
					</tr>
					
					<tr>
					<td>First name : <font color="red">*</font></td>
					<td class="element"><input type="text" name="first_name" id="first_name" value="<?php echo $user['first_name'];?>" required></td></tr>
					
					<tr>
					<td>Last name : <font color="red">*</font></td>
					<td class="element"><input type="text" name="last_name" id="last_name" value="<?php echo $user['last_name'];?>" required></td>
					</tr>
					
					<tr>
					<td>User role : <font color="red">*</font></td>
					<td class="element">
						<br/>
						<input type="checkbox" value=1 name="isAdmin" <?php if(strpos($user['user_type'], '1') !== false) echo "checked";?>>administrator<br/>
						<input type="checkbox" value=2 name="isClerk" id="isClerk" <?php if(strpos($user['user_type'], '2') !== false) echo "checked";?> onClick="show('collegeDiv','isClerk')">clerk<br/>
						<input type="checkbox" value=3 name="isAnalyst" <?php if(strpos($user['user_type'], '3') !== false) echo "checked";?>>information security analyst
						<br/><br/>
					</tr>
					
					<tr>
						<td><div name="collegeDiv" style="display:none;">College : <font color="red">*</font></div></td>
						<td class="element">
							<div name="collegeDiv" style="display:none;">
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
							<br/>
						</td>
					</tr>
					
					<tr>
						<td>Change password : <font color="red">*</font> 
						<td><input type="radio" id="changePassword" name="changePassword" onClick="show('passwordDiv', 'changePassword');" value="yes" <?php if(isset($error_msg)) echo "checked"?>> Yes
							<input type="radio" name="changePassword" onClick="show('passwordDiv', 'changePassword');" value="no" <?php if(!isset($error_msg)) echo "checked"?>> No
					</tr>
					
					<tr>
						<td><div name="passwordDiv" style="display:none;">New password : <font color="red">*</font></div>
						<td><div name="passwordDiv" style="display:none;"><input type="password" name="password"></input></div>
					</tr>
					<tr>
						<td><div name="passwordDiv" style="display:none;">Confirm password : <font color="red">*</font></div>
						<td><div name="passwordDiv" style="display:none;"><input type="password" name="password2"></input></div>
					</tr>
					<tr>
						<td><td><br/><input type="submit" value="Save"><a href="<?php echo base_url("/index.php/admin/account") ?>"><input type="button" value="Cancel"></a> 
					</tr>
				</table>
				<?php form_close();?>
			</div>
		</div>
		</div>
	</body>