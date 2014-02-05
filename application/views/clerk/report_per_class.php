	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		
		<script>
		  $(function() {
		    $( "#tabs" ).tabs();
		  });
  		</script>
		
		<div class = "right">
		<h2>Class Detailed Report <?php echo "(".$user_college_name.")"; ?></h2>
		
		<div id="tabs">
		  <div class="tabshead" width="100%">
			  <ul>
			    <li><a href="#tabs-1">Generate Report</a></li>
			    <li><a href="#tabs-2">Search Report</a></li>
			  </ul>
			  &nbsp;<br/>&nbsp;
			  
		  </div>
		  
		  <br/>
		  <div id="tabs-1" style="margin-left:-20px;">
		    <table class="records">
		    	<tr>
		    	<th>SET Instrument</th>
		    	<th></th>
		    	</tr>
		    	<?php 
		    		$i = 0;
		    		foreach ($set_instrument['controller_name'] as $controller)
					{
						echo 
						"<tr>
							<td>".$set_instrument['name'][$i]."</td>
							<td><a href='".base_url('index.php/clerk/set/'.$controller.'/generateReportPerClass')."'>Generate report</a></td>
  						 </tr>";
						$i++;
					}
		    	?>
		    </table>
		  </div>
		  
		  <div id="tabs-2">
		   
		   </div>
		</div>
		
		
		<br/><br/>
		
		</div>

	</body>