<html>
<header>
	<link href='<?=base_url('css/style.css')?>' rel="stylesheet" type="text/css">
</header>

<body>
	<b>
		UNIVERSITY OF THE PHILIPPINES MANILA <br/>
		STUDENT EVALUATION OF TEACHERS
	</b>
	
	<br/><br/>
	<table width="100%">
		<tr>
			<td>Instructor: <?php echo $instructor;?></td>
		</tr>
		<tr>
			<td>Course: <?php echo $subject; ?></td>
			<td>Date: <?php date_default_timezone_set('Asia/Manila'); echo date("F j, Y, g:i a");  ?></td>
		</tr>
		<tr>
			<td>Sem/AY: <?php echo $sem_ay; ?></td>
			<td>No. of Respondents: <?php echo $no_of_respondents; ?></td>
		</tr>
	</table>
	<hr>
	<br/>
	
	<b>PART I. THE STUDENT</b>
	
	<br/><br/>
	<table class="records">
		<tr>
		<td colspan="9"><br/>
		&nbsp; &nbsp; 0 - [No Response] &nbsp; &nbsp; 1 - [Very active] &nbsp; &nbsp; 2 - [Somewhat active] &nbsp;&nbsp; 3 - [Not active] &nbsp;&nbsp; 4 - [Did not participate at all]
		<br/><br/>
		</td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td>0</td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>AVE</td>
		</tr>
		<tr>
			<td width="2%" valign="top">1.</td>
			<td>How active have you been participating in this class (eg. by way of recitation, reporting, class discussion, other class activities)</td>
			<td width="6%"><?php echo $part1_1['NR']; ?></td>
			<td width="6%"><?php $sum = 0; $count = 0; echo $part1_1['very active']; $sum+= $part1_1['very active']; $count+=$part1_1['very active']; ?></td>
			<td width="6%"><?php echo $part1_1['somewhat active']; $sum+= $part1_1['somewhat active']*2; $count+=$part1_1['somewhat active'];?></td>
			<td width="6%"><?php echo $part1_1['not active']; $sum+= $part1_1['not active']*3; $count+=$part1_1['not active'];?></td>
			<td width="6%"><?php echo $part1_1['did not participate at all']; $sum+= $part1_1['did not participate at all']*4; $count+=$part1_1['did not participate at all'];?></td>
			<td width="6%"></td>
			<td width="10%"><?php  if($count != 0) echo round($ave1[1] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
		<td colspan="9"><br/>
		&nbsp; &nbsp; 0 - [No Response] &nbsp; &nbsp; 1 - [0] &nbsp; &nbsp; 2 - [1] &nbsp; &nbsp; 3 - [2 to 3] &nbsp; &nbsp; 4 - [4 to 5] &nbsp; &nbsp; 5 - [6 or more]
		<br/><br/>
		</td>
		</tr>
		<tr>
			<td valign="top">2.</td>
			<td>Since the start of the semester, how many times have you been absent in this class?</td>
			<td><?php echo $part1_2['NR']; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_2['0']; $sum+= $part1_2['0']; $count+=$part1_2['0']; ?></td>
			<td><?php echo $part1_2['1']; $sum+= $part1_2['1']*2; $count+=$part1_2['1'];?></td>
			<td><?php echo $part1_2['2-3']; $sum+= $part1_2['2-3']*3; $count+=$part1_2['2-3'];?></td>
			<td><?php echo $part1_2['4-5']; $sum+= $part1_2['4-5']*4; $count+=$part1_2['4-5'];?></td>
			<td><?php echo $part1_2['6']; $sum+= $part1_2['6']*5; $count+=$part1_2['6'];?></td>
			<td><?php  if($count != 0) echo round($ave1[2] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td valign="top">3.</td>
			<td>Since the start of the semester, how many times have you been late in this class?</td>
			<td><?php echo $part1_3['NR']; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_3['0']; $sum+= $part1_3['0']; $count+=$part1_3['0']; ?></td>
			<td><?php echo $part1_3['1']; $sum+= $part1_3['1']*2; $count+=$part1_3['1'];?></td>
			<td><?php echo $part1_3['2-3']; $sum+= $part1_3['2-3']*3; $count+=$part1_3['2-3'];?></td>
			<td><?php echo $part1_3['4-5']; $sum+= $part1_3['4-5']*4; $count+=$part1_3['4-5'];?></td>
			<td><?php echo $part1_3['6']; $sum+= $part1_3['6']*5; $count+=$part1_3['6'];?></td>
			<td><?php  if($count != 0) echo round($ave1[3] = $sum/$count, 4); else echo 0;?></td>
		</tr>
	</table>
	
	<br/>
	<div align="right">Weighted Average (Part I):  <?php if(isset($ave1)){if($sum = array_sum($ave1)) echo round($sum/count($ave1), 4); else echo 0;} else echo 0; ?></div> 
	<br/><br/>

	<b>PART II. THE COURSE</b>
	
	<br/><br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="12%">2 days</td>
			<td width="12%">1 day</td>
			<td width="12%">> 2 days</td>
		</tr>
		<tr>
			<td width="2%">1.</td>
			<td>How many class days per week do you have?</td>
			<td><?php echo $part2_1['2'] ?></td>
			<td><?php echo $part2_1['1'] ?></td>
			<td><?php echo $part2_1['more than 2'] ?></td>
		</tr>
	</table>
	<br/><br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="15%">early morning</td>
			<td width="15%">mid-morning</td>
			<td width="15%">early afternoon</td>
			<td width="15%">late afternoon</td>
		</tr>
		<tr>
			<td width="2%">2.</td>
			<td>What time of the day is this class?</td>
			<td><?php echo $part2_2['early morning'] ?></td>
			<td><?php echo $part2_2['mid-morning'] ?></td>
			<td><?php echo $part2_2['early afternoon'] ?></td>
			<td><?php echo $part2_2['late afternoon'] ?></td>
		</tr>
	</table>
	<br/><br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="15%">1.5 hours</td>
			<td width="15%">3 hours or more</td>
		</tr>
		<tr>
			<td width="2%">3.</td>
			<td>How many hours do you spend per class session?</td>
			<td><?php echo $part2_3['1.5'] ?></td>
			<td><?php echo $part2_3['3 or more'] ?></td>
		</tr>
	</table>
	<br/><br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="12%">lec only</td>
			<td width="12%">lab only</td>
			<td width="12%">combined</td>
			<td width="12%">PE class</td>
		</tr>
		<tr>
			<td width="2%">4.</td>
			<td>What is the nature of your class?</td>
			<td><?php echo $part2_4['lec'] ?></td>
			<td><?php echo $part2_4['lab'] ?></td>
			<td><?php echo $part2_4['combined'] ?></td>
			<td><?php echo $part2_4['PE'] ?></td>
		</tr>
	</table>
	<br/><br/><br/><br/><br/><br/>
	<table class="records">
		<tr>
		<td colspan="8"><br/>
		&nbsp; &nbsp; 0 - [No Response] &nbsp; &nbsp; 1 - [Very interesting] &nbsp; &nbsp; 2 - [Quite interesting] &nbsp;&nbsp; 3 - [Quite uninteresting] &nbsp;&nbsp; 4 - [Very uninteresting]
		<br/><br/>
		</td>
		</tr>
		
		<tr>
			<td colspan="2"></td>
			<td>0</td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>AVE</td>
		</tr>
		
		<tr>
			<td width="2%">5.</td>
			<td>Before you enrolled in this subject, have you thought of it as...</td>
			<td width="5%"><?php echo $part2_5[0]; ?></td>
			<td width="5%"><?php $sum = 0; $count = 0; echo $part2_5['1']; $sum+= $part2_5['1']; $count+=$part2_5['1']; ?></td>
			<td width="5%"><?php echo $part2_5['2']; $sum+= $part2_5['2']*2; $count+=$part2_5['2'];?></td>
			<td width="5%"><?php echo $part2_5['3']; $sum+= $part2_5['3']*3; $count+=$part2_5['3'];?></td>
			<td width="5%"><?php echo $part2_5['4']; $sum+= $part2_5['4']*4; $count+=$part2_5['4'];?></td>
			<td width="10%"><?php if($count != 0) echo round($ave2[1] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>6.</td>
			<td>Now that you are taking this subject, do you regard it as...</td>
			<td width="5%"><?php echo $part2_6[0]; ?></td>
			<td width="5%"><?php $sum = 0; $count = 0; echo $part2_6['1']; $sum+= $part2_6['1']; $count+=$part2_6['1']; ?></td>
			<td width="5%"><?php echo $part2_6['2']; $sum+= $part2_6['2']*2; $count+=$part2_6['2'];?></td>
			<td width="5%"><?php echo $part2_6['3']; $sum+= $part2_6['3']*3; $count+=$part2_6['3'];?></td>
			<td width="5%"><?php echo $part2_6['4']; $sum+= $part2_6['4']*4; $count+=$part2_6['4'];?></td>
			<td width="10%"><?php  if($count != 0) echo round($ave2[2] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
		<td colspan="8"><br/>
		&nbsp; &nbsp; 0 - [No Response] &nbsp; &nbsp; 1 - [Very easy] &nbsp; &nbsp; 2 - [Quite easy] &nbsp;&nbsp; 3 - [Quite difficult] &nbsp;&nbsp; 4 - [Very difficult]
		<br/><br/>
		</td>
		</tr>
		
		<tr>
			<td width="2%">7.</td>
			<td>Before you enrolled in this subject, have you thought of it as...</td>
			<td width="5%"><?php echo $part2_7[0]; ?></td>
			<td width="5%"><?php $sum = 0; $count = 0; echo $part2_7['1']; $sum+= $part2_7['1']; $count+=$part2_7['1']; ?></td>
			<td width="5%"><?php echo $part2_7['2']; $sum+= $part2_7['2']*2; $count+=$part2_7['2'];?></td>
			<td width="5%"><?php echo $part2_7['3']; $sum+= $part2_7['3']*3; $count+=$part2_7['3'];?></td>
			<td width="5%"><?php echo $part2_7['4']; $sum+= $part2_7['4']*4; $count+=$part2_7['4'];?></td>
			<td width="10%"><?php  $ave = array(); if($count != 0) echo round($ave2[3] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>6.</td>
			<td>Now that you are taking this subject, do you regard it as...</td>
			<td width="5%"><?php echo $part2_8[0]; ?></td>
			<td width="5%"><?php $sum = 0; $count = 0; echo $part2_8['1']; $sum+= $part2_8['1']; $count+=$part2_8['1']; ?></td>
			<td width="5%"><?php echo $part2_8['2']; $sum+= $part2_8['2']*2; $count+=$part2_8['2'];?></td>
			<td width="5%"><?php echo $part2_8['3']; $sum+= $part2_8['3']*3; $count+=$part2_8['3'];?></td>
			<td width="5%"><?php echo $part2_8['4']; $sum+= $part2_8['4']*4; $count+=$part2_8['4'];?></td>
			<td width="10%"><?php  if($count != 0) echo round($ave2[4] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
	</table>
	<br/>
	<div align="right">Weighted Average (Part II): <?php if(isset($ave2)){if($sum = array_sum($ave2)) echo round($sum/count($ave2), 4); else echo 0;} else echo 0; ?></div> 
	<br/><br/>
	
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="10%">Once</td>
			<td width="10%">Twice</td>
			<td width="10%">3 or more</td>
		</tr>
		<tr>
			<td width="2%">9.</td>
			<td>How many times have you taken this course (either you failed or dropped the course in the past)?</td>
			<td><?php echo $part2_9['1']; ?></td>
			<td><?php echo $part2_9['2']; ?></td>
			<td><?php echo $part2_9['3 or more']; ?></td>
		</tr>
	</table>
	<br/><br/><br/>
	
	<b>PART III. THE TEACHER</b>
	
	<br/><br/>
	<table class="records">
		<tr>
		<td colspan="9"><br/>
			<table>
				<tr>
					<td> 1 - [Strongly Agree] </td>
					<td> 2 - [Moderately Agree] </td>
					<td> 3 - [Somewhat Agree] </td>
					<td> 4 - [Somewhat Disagree] </td>
					<td> 5 - [Moderately Disagree] </td>
					<td> 6 - [Strongly Disagree] </td>
				</tr>
			</table>
			<span style="font-size: 12px">Reverse encoding for negatively oriented questions</span>
			<br/><br/>
		</td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td width="4%">1</td>
			<td width="4%">2</td>
			<td width="4%">3</td>
			<td width="4%">4</td>
			<td width="4%">5</td>
			<td width="4%">6</td>
			<td width="10%">AVE</td>
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
			$ave = array();
			foreach ($questions as $question)
			{
				$str = "part3_".$i;
				$part = $$str;
				
				$count = 0;
				$count+= $part[1];
				$count+= $part[2];
				$count+= $part[3];
				$count+= $part[4];
				$count+= $part[5];
				$count+= $part[6];
				
				$sum = 0; 
				$sum+= $part[1];
				$sum+= $part[2]*2;
				$sum+= $part[3]*3;
				$sum+= $part[4]*4;
				$sum+= $part[5]*5;
				$sum+= $part[6]*6;
				
				if($count != 0) 
				{
					$average = $sum/$count; 
					if($i <= 6)
						$ave[] = $average*6;
					elseif($i <= 14)
						$ave[] = $average*3;
					elseif($i <= 21)
						$ave[] = $average*4;
					elseif($i <= 27)
						$ave[] = $average;
					elseif($i <= 33)
						$ave[] = $average*2;
					else
						$ave[] = $average*5;
				}
				else
				{
					$average = 0;
				}
				
				echo
				'<tr>
					 <td>'.$i.'.</td>
					 <td width="51%">'.$question.'</td>
					 <td>'.$part[1].'</td>
					 <td>'.$part[2].'</td>
					 <td>'.$part[3].'</td>
					 <td>'.$part[4].'</td>
					 <td>'.$part[5].'</td>
					 <td>'.$part[6].'</td>
					 <td>'.round($average, 4).'</td>
				</tr>'; 
				$i++;
			}
		?>		
	</table>
		<br/>
		<?php
			$wa = array_sum($ave)/136; 
		?>
		<div align="right">Weighted Average (Part III): <?php echo round($wa, 4) ?></div> 
		<br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<table class="records">
		<tr>
			<td colspan="6">40. What are the teacher's strong points?</td>
		</tr>
		<tr>
			<td colspan="6"><?php echo $part3_40; ?> &nbsp;</td>
		</tr>
		<tr>
			<td colspan="6">41. What are the teacher's weak points?</td>
		</tr>
		<tr>
			<td colspan="6"><?php echo $part3_41; ?> &nbsp;</td>
		</tr>
	</table>
	<br/>

	<table class="records">
		<tr>
			<td rowspan="6" valign="top">42. In what areas should the teacher make MUCH improvement?</td>
			<td width="30%">Knowledge about the subject</td>
			<td width="10%"><?php echo $part3_42['Knowledge about the subject']; ?></td>
		</tr>
		<tr>
			<td>Style of teaching</td>
			<td><?php echo $part3_42['Style of teaching']; ?></td>
		</tr>
		<tr>
			<td>Class management skills</td>
			<td><?php echo $part3_42['Class management skills']; ?></td>
		</tr>
		<tr>
			<td>Relationship with students</td>
			<td><?php echo $part3_42['Relationship with students']; ?></td>
		</tr>
		<tr>
			<td>Personality of the teacher</td>
			<td><?php echo $part3_42['Personality of the teacher']; ?></td>
		</tr>
		<tr>
			<td>Impact of teaching on students</td>
			<td><?php echo $part3_42['Impact of teaching on students']; ?></td>
		</tr>
	</table>
	<br/><br/>
	
</body>
</html>