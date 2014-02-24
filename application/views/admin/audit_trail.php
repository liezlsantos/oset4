<?php include('check.php');?>

	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		<script>
			function warning(){ 
				return confirm('Are you sure you want to delete selected record(s)?'); 
			}
		</script>
	
	</header>

	<body>
		<div class="wrapper">
		<?php include('header.php'); ?>
		<script>
			$(function() {
			    $("#from").datepicker({
			      dateFormat: 'yy-mm-dd',
			      showAnim: 'slideDown',
			      changeYear: true,
			      changeMonth: true,
			      onClose: function( selectedDate ) {
			        $( "#to" ).datepicker( "option", "minDate", selectedDate );
			      }
			    });
			    $("#to").datepicker({
			      dateFormat: 'yy-mm-dd',
			      showAnim: 'slideDown',
			      changeYear: true,
			      changeMonth: true,
			      onClose: function( selectedDate ) {
			        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
			      }
			    });
			    $("#checkAll").click(function(){
			    $('input:checkbox').not(this).prop('checked', this.checked);
				});
			});
		</script>
		<div class = "right">
		
		<h2> Audit Trail</h2>
		
		<div id="formcss">
			<?php echo form_open('admin/audittrail/search', array('onSubmit'=>true)); ?>		 
			<table>
				<tr>
				<td>Search:</td>
				<td><input type="text" name="keyword" value="<?php if(isset($search['keyword'])) echo $search['keyword'];?>"></td>
				<td>&nbsp; &nbsp; From <input id="from" class="date_picker" name="date1" value="<?php if(isset($search['date1'])) echo $search['date1'];?>"></input></td>
				<td>&nbsp; &nbsp; To <input id="to" class="date_picker" name="date2" value="<?php if(isset($search['date2'])) echo $search['date2'];?>" ></input></td>
				<td>&nbsp; &nbsp; <input type="submit" name="Search" value="Search"></td>
				</tr>
			</table>
			</form>		
		</div>
		<br/>
		<?php if(isset($_SESSION['msg'])) echo '<div align="center" style="color:green">'.$_SESSION['msg'].'</div><br/>'; unset($_SESSION['msg']); ?>
		<?php
			if($audit_trail)
				{
					echo'
					<form action="'.base_url('index.php/admin/audittrail/submit').'" method="POST" onSubmit="return warning();">
					<table class="records">
					<tr>
						<th>Name</th>
						<th>Username</th>
						<th>Action</th>
						<th>Date/Time</th>
						<th align="left"><input type="checkbox" id="checkAll"></input></th>
					</tr>';
					
					foreach ($audit_trail as $record) {
						echo "<tr>
								<td>".$record->name."</td>
								<td>".$record->username."</td>
								<td>".$record->action."</td>
								<td>".$record->date_time."</td>
								<td><input type='checkbox' name='".$record->audit_id."'></input></td>
							 </tr>";
					}
					echo "</table>
					<br/>
					<input type='submit' value='Delete'></input>
					</form>
					";
					
				}
				else
					echo "No record found.<br/><br/>";
			?>
		
		<?php 
			if(isset($search['keyword']))
				echo '<a href="'.base_url('index.php/admin/audittrail').'">Back</a>';
		?>	
	
	</div>
	</div>
	</body>