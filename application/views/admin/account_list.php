<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		
		<script>
			function warning(){ 
				return confirm('Are you sure you want to delete this record?'); 
			}
		</script>
	
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		
		<div class = "right">
		
		<h2> User Accounts </h2>
		
		<div id="formcss">
			<?php echo form_open('admin/account/search', array('onSubmit'=>true)); 
			 	  if (!isset($keyword)) $keyword = "";?>		 
			<table>
				<tr>
				<td id="Name-label">Search User:</td>
				<td class="element"><input type="text" name="keyword" value="<?php echo $keyword;?>"></td>
				<td class="element"></td><td class="element"><input type="submit" name="Search" id="Search" value="Search" Name="Searchbutton"></td>
				</tr>
			</table>
			</form>		
		</div>
		
		<br/><a href="<?=base_url('/index.php/admin/account/add')?>"> + Add new user</a><br/><br/>
			<?php
				if(count($records['username']))
				{
					echo'
					<table class="records">
					<tr>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Username</th>
						<th>User Role</th>
						<th>College</th>
						<th></th>
					</tr>';
					
					for($i=0; $i<count($records['username']); $i++) {
						echo "<tr>
								<td>".$records['last_name'][$i]."</td>
								<td>".$records['first_name'][$i]."</td>
								<td>".$records['username'][$i]."</td>
								<td>".$records['user_type'][$i]."</td>
								<td>".$records['college_code'][$i]."</td>
								<td><a href='".str_replace('http', 'https', base_url('index.php/admin/account/edit/'.$records['username'][$i]))."'>  Edit  &nbsp;</a>";
								if($username != $records['username'][$i])
									echo "<a href='".base_url('index.php/admin/account/delete/'.$records['username'][$i])."' onclick='return warning();'> Delete  </a>";
								echo "	
								</td>
							 </tr>";
					}
				}
				else
					echo "No record found.";
			?>
		</table>
		
		<?php 
			if($keyword)
				echo '<br/><a href="account">Back</a>';
		
		?>	
	
	</div>
	</div>
	</body>