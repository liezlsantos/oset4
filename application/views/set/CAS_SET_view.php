	<header>
		<title>OSET 4.0</title>
		<link href='<?=base_url('css/style.css')?>' rel='stylesheet' type='text/css'>
		<style>
			table.SET td, th{	
				border: 1px solid rgba(0, 0, 0, 0.5);	
				border-color: #bbb;
				padding: 8px 5px;
			}
			table.SET .narrow{
				width: 70px;
			}
			table.SET tr:hover{
				background-color: #CCCCFF;
			}
			table.SET #header:hover{
				background-color: #FFF;
			}
			table.SET {
				width:100%; 
			}
			table.SETnoborder td, table.SETnoborder th{
				border: 0;
				width:100%; 
			}
		</style>
		<script>
			function showPart(part){
				document.body.scrollTop = document.documentElement.scrollTop = 0;
				document.getElementById('part1').style.display = "none";
				document.getElementById('part2').style.display = "none";
				document.getElementById('part3').style.display = "none";
				document.getElementById(part).style.display = "block";	
			}
			function show(id){
				document.getElementById(id).style.display = "block";	
			}
			function hide(id){
				document.getElementById(id).style.display = "none";	
			}
			function showOther(value, id){
				document.getElementById(id).style.display = "none";
				if(value == "Others")	
					document.getElementById(id).style.display = "block";
				else if(value == "others")
					if(document.getElementById("others").checked)
						document.getElementById(id).style.display = "block";
			}	
		</script>
	</header>

	<body class="wrapper">
		
		<?php include('header.php'); ?>
		
		<div class = "right">
			<?php if($preview) 
						echo '<h2>Preview of SET Instrument (UP Manila CAS SET)</h2>';
				  else 
				  {
				  		echo '<h2>Evaluate '.$class['subject'].' - '.$class['instructor'].'</h2>';
				  		echo '<form method="POST" action="'.base_url('index.php/student/set/cas_set/submit/'.$class['oset_class_id']).'">';
				  }
			?>
			
			<div id="part1">
				<span style ="color:maroon;font-size:15pt;font-family:Times New Roman;font-weight:normal">
				<font color="grey">The Student</font><font color="grey"> | </font>  The Course  <font color="grey"> | </font>  The Teacher <font color="grey"> | </font>
				</span>     
				<hr>
				<br/>
				<table class="SET">
					<tr>
						<td>1. How active have you been participating in this class (eg. by way of recitation, reporting, class discussion, other class activities)
						&nbsp; &nbsp;
							<select name="part1_1">
								<option value="NR"></option>
								<option>very active</option>
								<option>somewhat active</option>
								<option>not active</option>
								<option>did not participate at all</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>2. Since the start of the semester, how many times have you been absent in this class?
						&nbsp; &nbsp;
							<select name="part1_2">
								<option value="NR"></option>
								<option>0</option>
								<option>1</option>
								<option>2-3</option>
								<option>4-5</option>
								<option>more than 5</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>3. Since the start of the semester, how many times have you been late* in this class?
						&nbsp; &nbsp;
							<select name="part1_3">
								<option value="NR"></option>
								<option>0</option>
								<option>1</option>
								<option>2-3</option>
								<option>4-5</option>
								<option>more than 5</option>
							</select>
						</td>
					</tr>
				</table>
				
				<br/>
				<span style="font-size:13px">*Per UP regulations, <i>late</i> is defined as arriving more than 10 minutes after the scheduled time.</span>
				
				<br/><br/>
				<input type="button" value="Next Part >" onClick="showPart('part2');"></input>
			</div>
		
			<div id="part2" style="display:none">
				<span style ="color:maroon;font-size:15pt;font-family:Times New Roman;font-weight:normal">
				The Student<font color="grey"> | </font> <font color="grey">The Course</font><font color="grey"> | </font>  The Teacher <font color="grey"> | </font>
				</span>     
				<hr>
				<br/>
				
				<table class="SET">
					<tr id="header">
						<th colspan="2" align="left">In this subject</th>
					</tr>
					<tr>
						<td>1. How many class days per week do you have?</td>
						<td>
							<select name="part2_1">
								<option value="NR"></option>
								<option value="2">2 days (e.g. M, Th)</option>
								<option value="1">1 day (e.g. W or S)</option>
								<option value="more than 2">more than 2 days a week</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>2. What time of the day is this class?</td>
						<td>
							<select name="part2_2">
								<option value="NR"></option>
								<option value="early morning">early morning (7-10 am)</option>
								<option value="mid-morning">mid-morning (10-12 am)</option>
								<option value="early afternoon">early afternoon (1-3 pm)</option>
								<option value="late afternoon">late afternoon (4-8:30 pm)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>3. How many hours do you spend per class session?</td>
						<td>
							<select name="part2_3">
								<option value="NR"></option>
								<option value="1.5">1.5 hours</option>
								<option value="3 or more">3 hours or more</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>4. What is the nature of your class?</td>
						<td><select name="part2_4">
								<option value="NR"></option>
								<option value="lec">lecture class only</option>
								<option value="lab">laboratory class</option>
								<option value="combined">combined lecture and laboratory (continuous under 1 teacher)</option>
								<option value="PE">PE class</option>
							</select>
						</td>
					</tr>
				</table>
				
				<br/><br/>
				<table class="SET">
					<tr id="header">
						<td colspan="2"></td>
						<th class="narrow">Very uninteresting</th>
						<th class="narrow">Quite uninteresting</th>
						<th class="narrow">Quite interesting</th>
						<th class="narrow">Very interesting</th>
					</tr>
					<tr>
						<td>5.</td> 
						<td>Before you enrolled in this subject, have you thought of it as...</td>
						<td align="center"><input type="radio" name="part2_5" value="4"></input></td>
						<td align="center"><input type="radio" name="part2_5" value="3"></input></td>	
						<td align="center"><input type="radio" name="part2_5" value="2"></input></td>
						<td align="center"><input type="radio" name="part2_5" value="1"></input></td>	
					</tr>
					<tr>
						<td>6.</td> 
						<td>Now that you are taking this subject, do you regard it as...</td>
						<td align="center"><input type="radio" name="part2_6" value="4"></input></td>
						<td align="center"><input type="radio" name="part2_6" value="3"></input></td>	
						<td align="center"><input type="radio" name="part2_6" value="2"></input></td>
						<td align="center"><input type="radio" name="part2_6" value="1"></input></td>	
					</tr>
					<tr id="header">
						<td colspan="2"></td>
						<th>Very difficult</th>
						<th>Quite difficult</th>
						<th>Quite easy</th>
						<th>Very easy</th>
					</tr>
					<tr>
						<td>7.</td> 
						<td>Before you enrolled in this subject, have you thought of it as...</td>
						<td align="center"><input type="radio" name="part2_7" value="4"></input></td>
						<td align="center"><input type="radio" name="part2_7" value="3"></input></td>	
						<td align="center"><input type="radio" name="part2_7" value="2"></input></td>
						<td align="center"><input type="radio" name="part2_7" value="1"></input></td>	
					</tr>
					<tr>
						<td>8.</td> 
						<td>Now that you are taking this subject, do you regard it as...</td>
						<td align="center"><input type="radio" name="part2_8" value="4"></input></td>
						<td align="center"><input type="radio" name="part2_8" value="3"></input></td>	
						<td align="center"><input type="radio" name="part2_8" value="2"></input></td>
						<td align="center"><input type="radio" name="part2_8" value="1"></input></td>	
					</tr>
					<tr>
						<td>9.</td>
						<td colspan="5">How many times have you taken this course (either you failed or dropped the course in the past)? &nbsp; &nbsp;
							<select name="part2_9">
								<option value="NR"></option>
								<option value="1">once, my first time</option>
								<option value="2">twice, my second time</option>
								<option value="3 or more">3 or more times</option>
							</select>
						</td>
					</tr>
				</table>	
					
				<br/><br/>
				<input type="button" value="< Previous Part" onClick="showPart('part1');"></input>
				<input type="button" value="Next Part >" onClick="showPart('part3');"></input>
			</div>
			
			<div id="part3" style="display:none">
				<span style ="color:maroon;font-size:15pt;font-family:Times New Roman;font-weight:normal">
				The Student<font color="grey"> | </font> The Course <font color="grey"> | </font> <font color="grey"> The Teacher </font> <font color="grey"> | </font>
				</span>     
				<hr>
				<br/>
				
				<table class="SET">
					<tr id="header">
						<th colspan="2" align="left">My teacher...</th>
						<th class="narrow">Strongly Agree</th>
						<th class="narrow">Moderately Agree</th>
						<th class="narrow">Somewhat Agree</th>
						<th class="narrow">Somewhat Disagree</th>
						<th class="narrow">Moderately Disagree</th>
						<th class="narrow">Strongly Disagree</th>
					</tr>
					<?php
						$questions = array(
									 "Shows broad and indepth knowledge of the subject.", 
									 "Provides a well-thought out syllabus or course outline.",
									 "Provides up-to-date information about the subject matter.",
									 "Can answer satisfactory questions from the students.",
									 "Has adequate knowledge about the about issues related to the subject matter.",
									 "Can explain very well a difficult subject matter to the students.",
									 "Consults students on matters related to the conduct of the course",
									 "Presents subject matter clearly and systematically.",
									 "Often comes to class unprepared for the lesson.",
									 "Explains again when he/she feels that the concept is not well understood by the students.",
									 "Uses evaluation measures or tests adequately sample what was covered in the course.",
									 "Explains the course objectives, expectations, and requirements.",
									 "Provides immediate feedback on student performance (e.g., giving back results of exams).",
									 "Makes use of other teaching techniques (e.g., film showing, group dynamics, slide/powerpoint presentations, field trips) aside from pure lectures, class reporting, and class discussions.",
									 "Presents clear rules to be followed by students in class (e.g., on tardiness, absences, use of cellphones, going out during class, etc.).",
									 "Is firm and consistent, strict but reasonable in disciplining students.",
									 "Fosters a stimulating atmosphere which encourages students to participate in class discussions and other class activities.",
									 "Is often not available for consultation.",
									 "Can manage students who are unruly, noisy and inattentive.",
									 "Is often absent in class (i.e., more than 5 absences since start of semester).",
									 "Is often late in class (i.e., at least once every week).",
									 "Does not respect students' ideas and viewpoints.",
									 "Gives constructive criticisms of students' work.",
									 "Is tactful and polite in dealing with students.",
									 "Attempts to understand students' needs and issues in life.",
									 "Can be easily approached by students.",
									 "Plays favoritism among his/her students.",
									 "Is clean, neat and well-groomed.",
									 "Often comes to class in proper (presentable, respectable) attire.",
									 "Commands respect; behaves properly in class.",
									 "Is pleasant, inspiring, and motivating.",
									 "Is psychologically or emotionally unpredictable (e.g., irrational emotional outbursts).",
									 "Has a clear and audible voice; fluent in her/his speech.",
									 "Stimulates me to study further.",
									 "Has developed in me a greater sense of responsibility.",
									 "Has developed in me critical and creative thinking.",
									 "Has inculcated in me more self-reliance and self-discipline.",
									 "Has helped me understand my own self, other people, society and the physical and biological environment.",
									 "Enlightened me with regard to my goals and direction in life."
									 );
						
						$i = 1;
						foreach ($questions as $question)
						{
							echo
							'<tr>
								<td>'.$i.'.</td>
								<td>'.$question.'</td>';
							if($i != 9 && $i != 18 && $i!=22 && $i!=21 && $i!=20 && $i!=27 && $i!=32)
							{
								echo'
								<td align="center"><input type="radio" name="part3_'.$i.'" value="1"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="2"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="3"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="4"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="5"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="6"></input></td>';
							}
							else
							{
								echo'
								<td align="center"><input type="radio" name="part3_'.$i.'" value="6"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="5"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="4"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="3"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="2"></input></td>
								<td align="center"><input type="radio" name="part3_'.$i.'" value="1"></input></td>';
							}
							echo 
							'</tr>'; 
							$i++;
						}
					?>
				</table>
				
				<br/><br/>
				<table class="SET">
					<tr>
						<td>40. What are the teacher's strong points? 
						<br/><br/>&nbsp;&nbsp;&nbsp;<textarea rows="4" cols="50" name="part3_40"></textarea>
						</td>
					</tr>
					<tr>	
						<td>41. What are the teacher's weak points? 
						<br/><br/>&nbsp;&nbsp;&nbsp;<textarea rows="4" cols="50" name="part3_41"></textarea>
						</td>
					</tr>
					<tr>	
						<td>42. In what areas should the teacher make MUCH improvement? &nbsp; &nbsp;
							<select name="part3_42">
								<option value="NR"></option>
								<option>Knowledge about the subject</option>
								<option>Style of teaching</option>
								<option>Class management skills</option>
								<option>Relationship with students</option>
								<option>Personality of the teacher</option>
								<option>Impact of teaching on students</option>
							</select>
						</td>
					</tr>
				</table>
					
				<br/><br/>
				<input type="button" value="< Previous Part" onClick="showPart('part2');"></input>
				<input type="submit"></input>
				<?php if(!$preview) echo form_close(); ?>
			</div>
		
		</div>
	
	</body>