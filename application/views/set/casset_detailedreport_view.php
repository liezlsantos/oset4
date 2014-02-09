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
			<td width="10%"><?php  if($count != 0) echo round($ave[1] = $sum/$count, 4); else echo 0;?></td>
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
			<td><?php  if($count != 0) echo round($ave[2] = $sum/$count, 4); else echo 0;?></td>
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
			<td><?php  if($count != 0) echo round($ave[3] = $sum/$count, 4); else echo 0;?></td>
		</tr>
	</table>
	
	<br/>
	<div align="right">Weighted Average (Part I): <?php echo round(array_sum($ave)/3,4); ?></div> 
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
	<br/>
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
	<br/>
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
	<br/>
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
			<td width="10%"><?php  $ave = array(); if($count != 0) echo round($ave[1] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>6.</td>
			<td>Now that you are taking this subject, do you regard it as...</td>
			<td width="5%"><?php echo $part2_6[0]; ?></td>
			<td width="5%"><?php $sum = 0; $count = 0; echo $part2_6['1']; $sum+= $part2_6['1']; $count+=$part2_6['1']; ?></td>
			<td width="5%"><?php echo $part2_6['2']; $sum+= $part2_6['2']*2; $count+=$part2_6['2'];?></td>
			<td width="5%"><?php echo $part2_6['3']; $sum+= $part2_6['3']*3; $count+=$part2_6['3'];?></td>
			<td width="5%"><?php echo $part2_6['4']; $sum+= $part2_6['4']*4; $count+=$part2_6['4'];?></td>
			<td width="10%"><?php  if($count != 0) echo round($ave[2] = $sum/$count, 4); else echo 0;?></td>
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
			<td width="10%"><?php  $ave = array(); if($count != 0) echo round($ave[3] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>6.</td>
			<td>Now that you are taking this subject, do you regard it as...</td>
			<td width="5%"><?php echo $part2_8[0]; ?></td>
			<td width="5%"><?php $sum = 0; $count = 0; echo $part2_8['1']; $sum+= $part2_8['1']; $count+=$part2_8['1']; ?></td>
			<td width="5%"><?php echo $part2_8['2']; $sum+= $part2_8['2']*2; $count+=$part2_8['2'];?></td>
			<td width="5%"><?php echo $part2_8['3']; $sum+= $part2_8['3']*3; $count+=$part2_8['3'];?></td>
			<td width="5%"><?php echo $part2_8['4']; $sum+= $part2_8['4']*4; $count+=$part2_8['4'];?></td>
			<td width="10%"><?php  if($count != 0) echo round($ave[4] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
	</table>
	<br/>
	<div align="right">Weighted Average (Part II):  <?php echo round(array_sum($ave)/5, 4); ?> </div> 
	<br/><br/>
	
	<table>
		<tr>
			<td colspan="2"></td>
			<td>Once</td>
			<td>Twice</td>
			<td>3 or more times</td>
		</tr>
		<tr>
			<td width="2%">9.</td>
			<td>How many times have you taken this course (either you failed or dropped the course in the past)?</td>
			<td><?php echo $part2_9['1']; ?></td>
			<td><?php echo $part2_9['2']; ?></td>
			<td><?php echo $part2_9['3 or more']; ?></td>
		</tr>
	</table>
	
	<!--
	<b>PART II-B. </b>
	
	<br/><br/>
	<table class="records">
		<tr>
			<td></td>
			<td>Yes</td>
			<td>No</td>
		</tr>
		<tr>
			<td>1. Does the class has a syllabus or expanded outline for the course?</td>
			<td width="6%"><?php echo $part2b_1['yes'];?></td>
			<td width="6%"><?php echo $part2b_1['no'];?></td>
		</tr>
		<tr>
			<td>&nbsp; &nbsp; 1.1 Have there been departures from the syllabus?</td>
			<td><?php echo $part2b_1_1['yes'];?></td>
			<td><?php echo $part2b_1_1['no'];?></td>
		</tr>
		<tr>
			<td>&nbsp; &nbsp; &nbsp; &nbsp; 1.1.2 Do you think the departure(s) from the syllabus were necessary?</td>
			<td><?php echo $part2b_1_1_2['yes'];?></td>
			<td><?php echo $part2b_1_1_2['no'];?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td>Too fast</td>
			<td>Fast</td>
			<td>Just right</td>
			<td>Slow</td>
			<td>Too slow</td>
			<td>Others</td>
		</tr>
		<tr>
			<td width="2%">2.</td>
			<td width="45%">How would you rate the overall pace of this course?</td>
			<td><?php echo $part2b_2['Too fast'];?></td>
			<td><?php echo $part2b_2['Fast'];?></td>
			<td><?php echo $part2b_2['Just right'];?></td>
			<td><?php echo $part2b_2['Slow'];?></td>
			<td><?php echo $part2b_2['Too slow'];?></td>
			<td><?php echo $part2b_2['Others']; ?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="10%">Very much</td>
			<td width="10%">Much</td>
			<td width="10%">Some</td>
			<td width="10%">Very little</td>
			<td width="10%">Nothing</td>
		</tr>
		<tr>
			<td width="2%">3.</td>
			<td>How much have you learned from this course?</td>
			<td><?php echo $part2b_3['Very much']; ?></td>
			<td><?php echo $part2b_3['Much']; ?></td>
			<td><?php echo $part2b_3['Some']; ?></td>
			<td><?php echo $part2b_3['Very little']; ?></td>
			<td><?php echo $part2b_3['Nothing']; ?></td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td>Very much</td>
			<td>Much</td>
			<td>Moderately</td>
			<td>Slightly</td>
			<td>Not at all</td>
		</tr>
		<tr>
			<td>4.</td>
			<td>To what extent, have the objectives of this course been attained?</td>
			<td><?php echo $part2b_4['Very much']; ?></td>
			<td><?php echo $part2b_4['Much']; ?></td>
			<td><?php echo $part2b_4['Moderately']; ?></td>
			<td><?php echo $part2b_4['Slightly']; ?></td>
			<td><?php echo $part2b_4['Not at all']; ?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td width="2%">5.</td>
			<td colspan="6">Other objectives recommended for inclusion in this course</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="6"><?php echo $part2b_5; ?> &nbsp;</td>
		</tr>
		<tr>
			<td>6.</td>
			<td colspan="6">How can this course be further improved? </td>
		</tr>
		<tr>
			<td></td>
			<td colspan="6"><?php echo $part2b_6; ?> &nbsp; </td>
		</tr>
	</table>
	<br/><br/>
	
	<b>PART III-A. THE TEACHER</b>
	
	<br/><br/>
	<table class="records">
		<tr>
		<td colspan="8"><br/>
		&nbsp; &nbsp; 0 - [NA/No Response] &nbsp; &nbsp; 1 - [Strongly Agree] &nbsp;&nbsp; 2 - [Agree] &nbsp;&nbsp; 3 - [Disagree] &nbsp;&nbsp; 4 - [Strongly Disagree]
		<br/><br/>
		&nbsp; &nbsp; <span style="font-size: 12px">Reverse encoding for negatively oriented questions</span>
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
			<td width="2%">1.</td>
			<td>Explains the course objectives, grading system and policies</td>
			<td width="6%"><?php echo $part3a_1[0]; ?></td>
			<td width="6%"><?php $sum = 0; $count = 0; echo $part3a_1['1']; $sum+= $part3a_1['1']; $count+=$part3a_1['1']; ?></td>
			<td width="6%"><?php echo $part3a_1['2']; $sum+= $part3a_1['2']*2; $count+=$part3a_1['2'];?></td>
			<td width="6%"><?php echo $part3a_1['3']; $sum+= $part3a_1['3']*3; $count+=$part3a_1['3'];?></td>
			<td width="6%"><?php echo $part3a_1['4']; $sum+= $part3a_1['4']*4; $count+=$part3a_1['4'];?></td>
			<td width="10%"><?php  if($count != 0) echo round($ave[1] = $sum/$count, 4); else echo $ave[1] = 0;?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Gives preliminary instructions and precautions when necessary</td>
			<td><?php echo $part3a_2[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_2['1']; $sum+= $part3a_2['1']; $count+=$part3a_2['1']; ?></td>
			<td><?php echo $part3a_2['2']; $sum+= $part3a_2['2']*2; $count+=$part3a_2['2'];?></td>
			<td><?php echo $part3a_2['3']; $sum+= $part3a_2['3']*3; $count+=$part3a_2['3'];?></td>
			<td><?php echo $part3a_2['4']; $sum+= $part3a_2['4']*4; $count+=$part3a_2['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[2] = $sum/$count, 4); else echo $ave[2] = 0;?></td>
		
		</tr>
		<tr>
			<td>3.</td>
			<td>Checks student preparation for the laboratory activity</td>
			<td><?php echo $part3a_3[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_3['1']; $sum+= $part3a_3['1']; $count+=$part3a_3['1']; ?></td>
			<td><?php echo $part3a_3['2']; $sum+= $part3a_3['2']*2; $count+=$part3a_3['2'];?></td>
			<td><?php echo $part3a_3['3']; $sum+= $part3a_3['3']*3; $count+=$part3a_3['3'];?></td>
			<td><?php echo $part3a_3['4']; $sum+= $part3a_3['4']*4; $count+=$part3a_3['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[3] = $sum/$count, 4); else echo $ave[3] = 0;?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>Explains the proper use of the apparatus to students</td>
			<td><?php echo $part3a_4[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_4['1']; $sum+= $part3a_4['1']; $count+=$part3a_4['1']; ?></td>
			<td><?php echo $part3a_4['2']; $sum+= $part3a_4['2']*2; $count+=$part3a_4['2'];?></td>
			<td><?php echo $part3a_4['3']; $sum+= $part3a_4['3']*3; $count+=$part3a_4['3'];?></td>
			<td><?php echo $part3a_4['4']; $sum+= $part3a_4['4']*4; $count+=$part3a_4['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[4] = $sum/$count, 4); else echo $ave[4] = 0;?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td>Supervises students' activities</td>
			<td><?php echo $part3a_5[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_5['1']; $sum+= $part3a_5['1']; $count+=$part3a_5['1']; ?></td>
			<td><?php echo $part3a_5['2']; $sum+= $part3a_5['2']*2; $count+=$part3a_5['2'];?></td>
			<td><?php echo $part3a_5['3']; $sum+= $part3a_5['3']*3; $count+=$part3a_5['3'];?></td>
			<td><?php echo $part3a_5['4']; $sum+= $part3a_5['4']*4; $count+=$part3a_5['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[5] = $sum/$count, 4); else echo $ave[5] = 0;?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td>Utilizes laboratory time for the maximum</td>
			<td><?php echo $part3a_6[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_6['1']; $sum+= $part3a_6['1']; $count+=$part3a_6['1']; ?></td>
			<td><?php echo $part3a_6['2']; $sum+= $part3a_6['2']*2; $count+=$part3a_6['2'];?></td>
			<td><?php echo $part3a_6['3']; $sum+= $part3a_6['3']*3; $count+=$part3a_6['3'];?></td>
			<td><?php echo $part3a_6['4']; $sum+= $part3a_6['4']*4; $count+=$part3a_6['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[6] = $sum/$count, 4); else echo $ave[6] = 0;?></td>
		
		</tr>
		<tr>
			<td>7.</td>
			<td>Devotes enough time to each experiment</td>
			<td><?php echo $part3a_7[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_7['1']; $sum+= $part3a_7['1']; $count+=$part3a_7['1']; ?></td>
			<td><?php echo $part3a_7['2']; $sum+= $part3a_7['2']*2; $count+=$part3a_7['2'];?></td>
			<td><?php echo $part3a_7['3']; $sum+= $part3a_7['3']*3; $count+=$part3a_7['3'];?></td>
			<td><?php echo $part3a_7['4']; $sum+= $part3a_7['4']*4; $count+=$part3a_7['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[7] = $sum/$count, 4); else echo $ave[7] = 0;?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td>Sees to it that students leave their areas in good order</td>
			<td><?php echo $part3a_8[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_8['1']; $sum+= $part3a_8['1']; $count+=$part3a_8['1']; ?></td>
			<td><?php echo $part3a_8['2']; $sum+= $part3a_8['2']*2; $count+=$part3a_8['2'];?></td>
			<td><?php echo $part3a_8['3']; $sum+= $part3a_8['3']*3; $count+=$part3a_8['3'];?></td>
			<td><?php echo $part3a_8['4']; $sum+= $part3a_8['4']*4; $count+=$part3a_8['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[8] = $sum/$count, 4); else echo $ave[8] = 0;?></td>
		</tr>
		<tr>
			<td>9.</td>
			<td>Clarifies and reinforces discussions during oral reports</td>
			<td><?php echo $part3a_9[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_9['1']; $sum+= $part3a_9['1']; $count+=$part3a_9['1']; ?></td>
			<td><?php echo $part3a_9['2']; $sum+= $part3a_9['2']*2; $count+=$part3a_9['2'];?></td>
			<td><?php echo $part3a_9['3']; $sum+= $part3a_9['3']*3; $count+=$part3a_9['3'];?></td>
			<td><?php echo $part3a_9['4']; $sum+= $part3a_9['4']*4; $count+=$part3a_9['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[9] = $sum/$count, 4); else echo $ave[9] = 0;?></td>
		</tr>
		<tr>
			<td>10.</td>
			<td>Asks relevant questions during examination</td>
			<td><?php echo $part3a_10[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_10['1']; $sum+= $part3a_10['1']; $count+=$part3a_10['1']; ?></td>
			<td><?php echo $part3a_10['2']; $sum+= $part3a_10['2']*2; $count+=$part3a_10['2'];?></td>
			<td><?php echo $part3a_10['3']; $sum+= $part3a_10['3']*3; $count+=$part3a_10['3'];?></td>
			<td><?php echo $part3a_10['4']; $sum+= $part3a_10['4']*4; $count+=$part3a_10['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[10] = $sum/$count, 4); else echo $ave[10] = 0;?></td>
		</tr>
		<tr>
			<td>11.</td>
			<td>Treats students tactfully, does not embarrass them</td>
			<td><?php echo $part3a_11[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_11['1']; $sum+= $part3a_11['1']; $count+=$part3a_11['1']; ?></td>
			<td><?php echo $part3a_11['2']; $sum+= $part3a_11['2']*2; $count+=$part3a_11['2'];?></td>
			<td><?php echo $part3a_11['3']; $sum+= $part3a_11['3']*3; $count+=$part3a_11['3'];?></td>
			<td><?php echo $part3a_11['4']; $sum+= $part3a_11['4']*4; $count+=$part3a_11['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[11] = $sum/$count, 4); else echo $ave[11] = 0;?></td>
		</tr>
		<tr>
			<td>12.</td>
			<td>Invites respect thought behavior and general appearance</td>
			<td><?php echo $part3a_12[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_12['1']; $sum+= $part3a_12['1']; $count+=$part3a_12['1']; ?></td>
			<td><?php echo $part3a_12['2']; $sum+= $part3a_12['2']*2; $count+=$part3a_12['2'];?></td>
			<td><?php echo $part3a_12['3']; $sum+= $part3a_12['3']*3; $count+=$part3a_12['3'];?></td>
			<td><?php echo $part3a_12['4']; $sum+= $part3a_12['4']*4; $count+=$part3a_12['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[12] = $sum/$count, 4); else echo $ave[12] = 0;?></td>
		</tr>
		<tr>
			<td>13.</td>
			<td>Maintains an orderly atmosphere in the laboratory</td>
			<td><?php echo $part3a_13[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_13['1']; $sum+= $part3a_13['1']; $count+=$part3a_13['1']; ?></td>
			<td><?php echo $part3a_13['2']; $sum+= $part3a_13['2']*2; $count+=$part3a_13['2'];?></td>
			<td><?php echo $part3a_13['3']; $sum+= $part3a_13['3']*3; $count+=$part3a_13['3'];?></td>
			<td><?php echo $part3a_13['4']; $sum+= $part3a_13['4']*4; $count+=$part3a_13['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[13] = $sum/$count, 4); else echo $ave[13] = 0;?></td>
		</tr>
		<tr>
			<td>14.</td>
			<td>Is firm and consistent; strict but reasonable in disciplining students</td>
			<td><?php echo $part3a_14[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_14['1']; $sum+= $part3a_14['1']; $count+=$part3a_14['1']; ?></td>
			<td><?php echo $part3a_14['2']; $sum+= $part3a_14['2']*2; $count+=$part3a_14['2'];?></td>
			<td><?php echo $part3a_14['3']; $sum+= $part3a_14['3']*3; $count+=$part3a_14['3'];?></td>
			<td><?php echo $part3a_14['4']; $sum+= $part3a_14['4']*4; $count+=$part3a_14['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[14] = $sum/$count, 4); else echo $ave[14] = 0;?></td>
		</tr>
		<tr>
			<td>15.</td>
			<td>Motivates the student to think critically</td>
			<td><?php echo $part3a_15[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_15['1']; $sum+= $part3a_15['1']; $count+=$part3a_15['1']; ?></td>
			<td><?php echo $part3a_15['2']; $sum+= $part3a_15['2']*2; $count+=$part3a_15['2'];?></td>
			<td><?php echo $part3a_15['3']; $sum+= $part3a_15['3']*3; $count+=$part3a_15['3'];?></td>
			<td><?php echo $part3a_15['4']; $sum+= $part3a_15['4']*4; $count+=$part3a_15['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[15] = $sum/$count, 4); else echo $ave[15] = 0;?></td>
		</tr>
		<tr>
			<td width="2%">16.</td>
			<td width="62%">Is able to communicate effectively</td>
			<td><?php echo $part3a_16[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part3a_16['1']; $sum+= $part3a_16['1']; $count+=$part3a_16['1']; ?></td>
			<td><?php echo $part3a_16['2']; $sum+= $part3a_16['2']*2; $count+=$part3a_16['2'];?></td>
			<td><?php echo $part3a_16['3']; $sum+= $part3a_16['3']*3; $count+=$part3a_16['3'];?></td>
			<td><?php echo $part3a_16['4']; $sum+= $part3a_16['4']*4; $count+=$part3a_16['4'];?></td>
			<td><?php  if($count != 0) echo round($ave[16] = $sum/$count, 4); else echo $ave[16] = 0;?></td>
		</tr>

	</table>
	<br/>
	<div align="right">Weighted Average (Part III-A): <?php echo round(array_sum($ave)/16,4); ?> </div> 
	<br/><br/>
	
	<b>PART III-B</b>
	<br/><br/>
	
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td>0</td>
			<td>1</td>
			<td>2-3</td>
			<td>4-5</td>
			<td>6</td>
		</tr>
		<tr>
			<td width="2%">1.</td>
			<td>How many times has the teacher been late?</td>
			<td width="8%"><?php echo $part3b_1['0']; ?></td>
			<td width="8%"><?php echo $part3b_1['1']; ?></td>
			<td width="8%"><?php echo $part3b_1['2-3']; ?></td>
			<td width="8%"><?php echo $part3b_1['4-5']; ?></td>
			<td width="8%"><?php echo $part3b_1['6']; ?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>How many class meetings has the teacher missed?</td>
			<td width="8%"><?php echo $part3b_2['0']; ?></td>
			<td width="8%"><?php echo $part3b_2['1']; ?></td>
			<td width="8%"><?php echo $part3b_2['2-3']; ?></td>
			<td width="8%"><?php echo $part3b_2['4-5']; ?></td>
			<td width="8%"><?php echo $part3b_2['6']; ?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td>On time</td>
			<td>Early</td>
			<td>Late</td>
		</tr>
		<tr>
			<td width="2%">3.</td>
			<td>The teacher generally dismissed the class</td>
			<td width="8%"><?php echo $part3b_3['On time']; ?></td>
			<td width="8%"><?php echo $part3b_3['Early']; ?></td>
			<td width="8%"><?php echo $part3b_3['Late']; ?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="10%">1 Week</td>
			<td width="10%">2 Weeks</td>
			<td width="10%">1 Month</td>
			<td width="10%">>1 Month</td>
			<td width="10%">Never</td>
		</tr>
		<tr>
			<td width="2%">4.</td>
			<td>How soon does the teacher post results or return corrected assignments, quizzes, exams, papers, etc.?</td>
			<td><?php echo $part3b_4['One week']; ?></td>
			<td><?php echo $part3b_4['Two weeks']; ?></td>
			<td><?php echo $part3b_4['One month']; ?></td>
			<td><?php echo $part3b_4['More than one month']; ?></td>
			<td><?php echo $part3b_4['Never']; ?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="10%">Always</td>
			<td width="10%">Usually</td>
			<td width="10%">Sometimes</td>
			<td width="10%">Rarely</td>
			<td width="10%">Never</td>
		</tr>
		<tr>
			<td width="2%">5.</td>
			<td>Is the teacher fair in giving grades?</td>
			<td><?php echo $part3b_5_1['Always']; ?></td>
			<td><?php echo $part3b_5_1['Usually']; ?></td>
			<td><?php echo $part3b_5_1['Sometimes']; ?></td>
			<td><?php echo $part3b_5_1['Rarely']; ?></td>
			<td><?php echo $part3b_5_1['Never']; ?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="10%">The best</td>
			<td width="10%">Among best</td>
			<td width="10%">Average</td>
			<td width="10%">Among worst</td>
			<td width="10%">Worst</td>
		</tr>
		<tr>
			<td width="2%">6.</td>
			<td>Among the teachers you have had, how would you rate this teacher?</td>
			<td><?php echo $part3b_6['The best']; ?></td>
			<td><?php echo $part3b_6['Among the best']; ?></td>
			<td><?php echo $part3b_6['Average']; ?></td>
			<td><?php echo $part3b_6['Among the worst']; ?></td>
			<td><?php echo $part3b_6['The worst']; ?></td>
		</tr>
	</table>
	<br/><br/>
	
	<b>PART IV</b>
	<br/><br/>
	
	<table class="records">
		<tr>
			<td colspan="6">What are the faculty's strong points? Areas for improvement?</td>
		</tr>
		<tr>
			<td colspan="6"><?php echo $part3c; ?> &nbsp;</td>
		</tr>
	</table>
	
	-->
</body>
</html>