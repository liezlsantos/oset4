<html>
<header>
	<link href='<?=base_url('css/style.css')?>' rel="stylesheet" type="text/css">
	<style>body{background-color: none;}</style>
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
		&nbsp; &nbsp; 0 - [No Response] &nbsp; &nbsp; 1 - [Very much] &nbsp; &nbsp; 2 - [Much] &nbsp;&nbsp; 3 - [Moderately] &nbsp;&nbsp; 4 - [Little] &nbsp;&nbsp; 5 - [Not at all]
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
			<td width="2%">1.</td>
			<td width="52%">How actively did you participate in class discussions and activities?</td>
			<td width="6%"><?php echo $part1_1[0]; ?></td>
			<td width="6%"><?php $sum = 0; $count = 0; echo $part1_1['1']; $sum+= $part1_1['1']; $count+=$part1_1['1']; ?></td>
			<td width="6%"><?php echo $part1_1['2']; $sum+= $part1_1['2']*2; $count+=$part1_1['2'];?></td>
			<td width="6%"><?php echo $part1_1['3']; $sum+= $part1_1['3']*3; $count+=$part1_1['3'];?></td>
			<td width="6%"><?php echo $part1_1['4']; $sum+= $part1_1['4']*4; $count+=$part1_1['4'];?></td>
			<td width="6%"><?php echo $part1_1['5']; $sum+= $part1_1['5']*5; $count+=$part1_1['5'];?></td>
			<td width="10%"><?php  if($count != 0) echo round($ave1[1] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Did you learn new ideas from your interactions with your teacher and classmates?</td>
			<td><?php echo $part1_2[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_2['1']; $sum+= $part1_2['1']; $count+=$part1_2['1']; ?></td>
			<td><?php echo $part1_2['2']; $sum+= $part1_2['2']*2; $count+=$part1_2['2'];?></td>
			<td><?php echo $part1_2['3']; $sum+= $part1_2['3']*3; $count+=$part1_2['3'];?></td>
			<td><?php echo $part1_2['4']; $sum+= $part1_2['4']*4; $count+=$part1_2['4'];?></td>
			<td><?php echo $part1_2['5']; $sum+= $part1_2['5']*5; $count+=$part1_2['5'];?></td>
			<td><?php  if($count != 0) echo round($ave1[2] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>How receptive were you to new ideas presented by your teacher and classmates?</td>
			<td><?php echo $part1_3[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_3['1']; $sum+= $part1_3['1']; $count+=$part1_3['1']; ?></td>
			<td><?php echo $part1_3['2']; $sum+= $part1_3['2']*2; $count+=$part1_3['2'];?></td>
			<td><?php echo $part1_3['3']; $sum+= $part1_3['3']*3; $count+=$part1_3['3'];?></td>
			<td><?php echo $part1_3['4']; $sum+= $part1_3['4']*4; $count+=$part1_3['4'];?></td>
			<td><?php echo $part1_3['5']; $sum+= $part1_3['5']*5; $count+=$part1_3['5'];?></td>
			<td><?php  if($count != 0) echo round($ave1[3] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>How much effort did you give to meeting the requirements in this course? (eg. term papers, reports, assigned readings)</td>
			<td><?php echo $part1_4[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_4['1']; $sum+= $part1_4['1']; $count+=$part1_4['1']; ?></td>
			<td><?php echo $part1_4['2']; $sum+= $part1_4['2']*2; $count+=$part1_4['2'];?></td>
			<td><?php echo $part1_4['3']; $sum+= $part1_4['3']*3; $count+=$part1_4['3'];?></td>
			<td><?php echo $part1_4['4']; $sum+= $part1_4['4']*4; $count+=$part1_4['4'];?></td>
			<td><?php echo $part1_4['5']; $sum+= $part1_4['5']*5; $count+=$part1_4['5'];?></td>
			<td><?php  if($count != 0) echo round($ave1[4] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td>Do you feel that you have performed well in this course?</td>
			<td><?php echo $part1_5[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_5['1']; $sum+= $part1_5['1']; $count+=$part1_5['1']; ?></td>
			<td><?php echo $part1_5['2']; $sum+= $part1_5['2']*2; $count+=$part1_5['2'];?></td>
			<td><?php echo $part1_5['3']; $sum+= $part1_5['3']*3; $count+=$part1_5['3'];?></td>
			<td><?php echo $part1_5['4']; $sum+= $part1_5['4']*4; $count+=$part1_5['4'];?></td>
			<td><?php echo $part1_5['5']; $sum+= $part1_5['5']*5; $count+=$part1_5['5'];?></td>
			<td><?php  if($count != 0) echo round($ave1[5] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td>Have your expectations of this course been met?</td>
			<td><?php echo $part1_6[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_6['1']; $sum+= $part1_6['1']; $count+=$part1_6['1']; ?></td>
			<td><?php echo $part1_6['2']; $sum+= $part1_6['2']*2; $count+=$part1_6['2'];?></td>
			<td><?php echo $part1_6['3']; $sum+= $part1_6['3']*3; $count+=$part1_6['3'];?></td>
			<td><?php echo $part1_6['4']; $sum+= $part1_6['4']*4; $count+=$part1_6['4'];?></td>
			<td><?php echo $part1_6['5']; $sum+= $part1_6['5']*5; $count+=$part1_6['5'];?></td>
			<td><?php  if($count != 0) echo round($ave1[6] = $sum/$count, 4); else echo 0;?></td>
		</tr>	
	
		<tr>
		<td colspan="9"><br/>
		&nbsp; &nbsp; 0 - [No Response] &nbsp; &nbsp; 1 - [0] &nbsp; &nbsp; 2 - [1] &nbsp;&nbsp; 3 - [2 to 3] &nbsp;&nbsp; 4 - [4 to 5] &nbsp;&nbsp; 5 - [6]
		<br/><br/>
		</td>
		</tr>

		<tr>
			<td>7.</td>
			<td>Have many times have you been late?</td>
			<td><?php echo $part1_7['NR']; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_7['0']; $sum+= $part1_7['0']; $count+=$part1_7['0']; ?></td>
			<td><?php echo $part1_7['1']; $sum+= $part1_7['1']*2; $count+=$part1_7['1'];?></td>
			<td><?php echo $part1_7['2-3']; $sum+= $part1_7['2-3']*3; $count+=$part1_7['2-3'];?></td>
			<td><?php echo $part1_7['4-5']; $sum+= $part1_7['4-5']*4; $count+=$part1_7['4-5'];?></td>
			<td><?php echo $part1_7['6']; $sum+= $part1_7['6']*5; $count+=$part1_7['6'];?></td>
			<td><?php  if($count != 0) echo round($ave1[7] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td>How many class meetings have you missed?</td>
			<td><?php echo $part1_8['NR']; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_8['0']; $sum+= $part1_8['0']; $count+=$part1_8['0']; ?></td>
			<td><?php echo $part1_8['1']; $sum+= $part1_8['1']*2; $count+=$part1_8['1'];?></td>
			<td><?php echo $part1_8['2-3']; $sum+= $part1_8['2-3']*3; $count+=$part1_8['2-3'];?></td>
			<td><?php echo $part1_8['4-5']; $sum+= $part1_8['4-5']*4; $count+=$part1_8['4-5'];?></td>
			<td><?php echo $part1_8['6']; $sum+= $part1_8['6']*5; $count+=$part1_8['6'];?></td>
			<td><?php  if($count != 0) echo round($ave1[8] = $sum/$count, 4); else echo 0;?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="12">9. What final grade will you give yourself in this course?</td>
		</tr>
		<tr>
			<td>NR</td>
			<td>1.00</td>
			<td>1.25</td>
			<td>1.50</td>
			<td>1.75</td>
			<td>2.00</td>
			<td>2.25</td>
			<td>2.50</td>
			<td>2.75</td>
			<td>3.00</td>
			<td>INC</td>
			<td>AVE</td>
		</tr>		
		<tr>
			<td><?php echo $part1_9['NR']; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part1_9['1.0']; $sum+= $part1_9['1.0']; $count+=$part1_9['1.0']; ?></td>
			<td><?php echo $part1_9['1.25']; $sum+= $part1_9['1.25']*1.25; $count+=$part1_9['1.25'];?></td>
			<td><?php echo $part1_9['1.5']; $sum+= $part1_9['1.5']*1.5; $count+=$part1_9['1.5'];?></td>
			<td><?php echo $part1_9['1.75']; $sum+= $part1_9['1.75']*1.75; $count+=$part1_9['1.75'];?></td>
			<td><?php echo $part1_9['2.0']; $sum+= $part1_9['2.0']*2.0; $count+=$part1_9['2.0'];?></td>
			<td><?php echo $part1_9['2.25']; $sum+= $part1_9['2.25']*2.25; $count+=$part1_9['2.25'];?></td>
			<td><?php echo $part1_9['2.5']; $sum+= $part1_9['2.5']*2.5; $count+=$part1_9['2.5'];?></td>
			<td><?php echo $part1_9['2.75']; $sum+= $part1_9['2.75']*2.75; $count+=$part1_9['2.75'];?></td>
			<td><?php echo $part1_9['3.0']; $sum+= $part1_9['3.0']*3.0; $count+=$part1_9['3.0'];?></td>
			<td><?php echo $part1_9['INC']; $sum+= $part1_9['INC']*4.0; $count+=$part1_9['INC'];?></td>
			<td><?php  if($count != 0) echo round($ave1[9] = $sum/$count, 4); else echo 0;?></td>
		</tr>		
	</table>
	<br/>
	<div align="right">Weighted Average (Part I): <?php if(isset($ave1)){if($sum = array_sum($ave1)) echo round($sum/count($ave1), 4); else echo 0;} else echo 0; ?></div> 
	<br/><br/>

	<b>PART II-A. THE COURSE</b>
	
	<br/><br/>
	<table class="records">
		<tr>
		<td colspan="8"><br/>
		&nbsp; &nbsp; 0 - [No Response] &nbsp; &nbsp; 1 - [Strongly Agree] &nbsp; &nbsp; 2 - [Agree] &nbsp;&nbsp; 3 - [Disagree] &nbsp;&nbsp; 4 - [Strongly Disagree]
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
			<td>This course stimulates me to study beyond the lessons assigned.</td>
			<td width="5%"><?php echo $part2a_1[0]; ?></td>
			<td width="5%"><?php $sum = 0; $count = 0; echo $part2a_1['1']; $sum+= $part2a_1['1']; $count+=$part2a_1['1']; ?></td>
			<td width="5%"><?php echo $part2a_1['2']; $sum+= $part2a_1['2']*2; $count+=$part2a_1['2'];?></td>
			<td width="5%"><?php echo $part2a_1['3']; $sum+= $part2a_1['3']*3; $count+=$part2a_1['3'];?></td>
			<td width="5%"><?php echo $part2a_1['4']; $sum+= $part2a_1['4']*4; $count+=$part2a_1['4'];?></td>
			<td width="10%"><?php  if($count != 0) echo round($ave2[1] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>2.</td>
			<td>This course has developed in me a greater sense of responsibility (i.e. self-reliance, self discipline, independent study)</td>
			<td><?php echo $part2a_2[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part2a_2['1']; $sum+= $part2a_2['1']; $count+=$part2a_2['1']; ?></td>
			<td><?php echo $part2a_2['2']; $sum+= $part2a_2['2']*2; $count+=$part2a_2['2'];?></td>
			<td><?php echo $part2a_2['3']; $sum+= $part2a_2['3']*3; $count+=$part2a_2['3'];?></td>
			<td><?php echo $part2a_2['4']; $sum+= $part2a_2['4']*4; $count+=$part2a_2['4'];?></td>
			<td><?php  if($count != 0) echo round($ave2[2] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>3.</td>
			<td>I have worked more conscientiously in this course more than in most other courses.</td>
			<td><?php echo $part2a_3[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part2a_3['1']; $sum+= $part2a_3['1']; $count+=$part2a_3['1']; ?></td>
			<td><?php echo $part2a_3['2']; $sum+= $part2a_3['2']*2; $count+=$part2a_3['2'];?></td>
			<td><?php echo $part2a_3['3']; $sum+= $part2a_3['3']*3; $count+=$part2a_3['3'];?></td>
			<td><?php echo $part2a_3['4']; $sum+= $part2a_3['4']*4; $count+=$part2a_3['4'];?></td>
			<td><?php  if($count != 0) echo round($ave2[3] = $sum/$count, 4); else echo 0;?></td>
		</tr>	
			
		<tr>
			<td>4.</td>
			<td>Even if this course were not required, it would still be worthwhile taking it.</td>
			<td><?php echo $part2a_4[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part2a_4['1']; $sum+= $part2a_4['1']; $count+=$part2a_4['1']; ?></td>
			<td><?php echo $part2a_4['2']; $sum+= $part2a_4['2']*2; $count+=$part2a_4['2'];?></td>
			<td><?php echo $part2a_4['3']; $sum+= $part2a_4['3']*3; $count+=$part2a_4['3'];?></td>
			<td><?php echo $part2a_4['4']; $sum+= $part2a_4['4']*4; $count+=$part2a_4['4'];?></td>
			<td><?php  if($count != 0) echo round($ave2[4] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>5.</td>
			<td>I am fully satisfied with the way this course was handled/conducted.</td>
			<td><?php echo $part2a_5[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part2a_5['1']; $sum+= $part2a_5['1']; $count+=$part2a_5['1']; ?></td>
			<td><?php echo $part2a_5['2']; $sum+= $part2a_5['2']*2; $count+=$part2a_5['2'];?></td>
			<td><?php echo $part2a_5['3']; $sum+= $part2a_5['3']*3; $count+=$part2a_5['3'];?></td>
			<td><?php echo $part2a_5['4']; $sum+= $part2a_5['4']*4; $count+=$part2a_5['4'];?></td>
			<td><?php  if($count != 0) echo round($ave2[5] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>6.</td>
			<td>This course stimulates me to think creatively.</td>
			<td><?php echo $part2a_6[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part2a_6['1']; $sum+= $part2a_6['1']; $count+=$part2a_6['1']; ?></td>
			<td><?php echo $part2a_6['2']; $sum+= $part2a_6['2']*2; $count+=$part2a_6['2'];?></td>
			<td><?php echo $part2a_6['3']; $sum+= $part2a_6['3']*3; $count+=$part2a_6['3'];?></td>
			<td><?php echo $part2a_6['4']; $sum+= $part2a_6['4']*4; $count+=$part2a_6['4'];?></td>
			<td><?php  if($count != 0) echo round($ave2[6] = $sum/$count, 4); else echo 0;?></td>
		</tr>
		
		<tr>
			<td>7.</td>
			<td>This course develops critical thinking.</td>
			<td><?php echo $part2a_7[0]; ?></td>
			<td><?php $sum = 0; $count = 0; echo $part2a_7['1']; $sum+= $part2a_7['1']; $count+=$part2a_7['1']; ?></td>
			<td><?php echo $part2a_7['2']; $sum+= $part2a_7['2']*2; $count+=$part2a_7['2'];?></td>
			<td><?php echo $part2a_7['3']; $sum+= $part2a_7['3']*3; $count+=$part2a_7['3'];?></td>
			<td><?php echo $part2a_7['4']; $sum+= $part2a_7['4']*4; $count+=$part2a_7['4'];?></td>
			<td><?php  if($count != 0) echo round($ave2[7] = $sum/$count, 4); else echo 0;?></td>
		</tr>
	</table>
	
	<br/>
	<div align="right">Weighted Average (Part II-A):  <?php if(isset($ave2)){if($sum = array_sum($ave2)) echo round($sum/count($ave2), 4); else echo 0;} else echo 0; ?></div> 
	<br/><br/>
	
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
		&nbsp; &nbsp; 0 - [Not Applicable] &nbsp; &nbsp; 1 - [Strongly Agree] &nbsp;&nbsp; 2 - [Agree] &nbsp;&nbsp; 3 - [Disagree] &nbsp;&nbsp; 4 - [Strongly Disagree]
		<br/><br/>
		&nbsp; &nbsp;<span style="font-size: 12px">Reverse encoding for negatively oriented questions</span>
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
			<td>Explains the course objectives, expectations and requirements of the course</td>
			<td width="5%"><?php echo $part3a_1[0]; $sum = 0; ?></td>
			<td width="5%"><?php echo $part3a_1['1']; $sum+= $part3a_1['1']; ?></td>
			<td width="5%"><?php echo $part3a_1['2']; $sum+= $part3a_1['2']*2; ?></td>
			<td width="5%"><?php echo $part3a_1['3']; $sum+= $part3a_1['3']*3; ?></td>
			<td width="5%"><?php echo $part3a_1['4']; $sum+= $part3a_1['4']*4; ?></td>
			<td width="10%"><?php  if($no_of_respondents != 0) echo round($ave[1] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Comes to class unprepared for the lesson.</td>
			<td><?php echo $part3a_2[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_2['1']; $sum+= $part3a_2['1']; ?></td>
			<td><?php echo $part3a_2['2']; $sum+= $part3a_2['2']*2; ?></td>
			<td><?php echo $part3a_2['3']; $sum+= $part3a_2['3']*3; ?></td>
			<td><?php echo $part3a_2['4']; $sum+= $part3a_2['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[2] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>Presents the subject matter clearly and systematically.</td>
			<td><?php echo $part3a_3[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_3['1']; $sum+= $part3a_3['1']; ?></td>
			<td><?php echo $part3a_3['2']; $sum+= $part3a_3['2']*2; ?></td>
			<td><?php echo $part3a_3['3']; $sum+= $part3a_3['3']*3; ?></td>
			<td><?php echo $part3a_3['4']; $sum+= $part3a_3['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[3] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>Relates the course to other fields and current issues/concerns.</td>
			<td><?php echo $part3a_4[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_4['1']; $sum+= $part3a_4['1']; ?></td>
			<td><?php echo $part3a_4['2']; $sum+= $part3a_4['2']*2; ?></td>
			<td><?php echo $part3a_4['3']; $sum+= $part3a_4['3']*3; ?></td>
			<td><?php echo $part3a_4['4']; $sum+= $part3a_4['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[4] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td>Fosters a stimulating atmosphere which encourages students to participate in class discussions/activities.</td>
			<td><?php echo $part3a_5[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_5['1']; $sum+= $part3a_5['1']; ?></td>
			<td><?php echo $part3a_5['2']; $sum+= $part3a_5['2']*2; ?></td>
			<td><?php echo $part3a_5['3']; $sum+= $part3a_5['3']*3; ?></td>
			<td><?php echo $part3a_5['4']; $sum+= $part3a_5['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[5] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td>Stimulates the students to study more about the subject.</td>
			<td><?php echo $part3a_6[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_6['1']; $sum+= $part3a_6['1']; ?></td>
			<td><?php echo $part3a_6['2']; $sum+= $part3a_6['2']*2; ?></td>
			<td><?php echo $part3a_6['3']; $sum+= $part3a_6['3']*3; ?></td>
			<td><?php echo $part3a_6['4']; $sum+= $part3a_6['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[6] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>7.</td>
			<td>Does not encourage studetns to do their best.</td>
			<td><?php echo $part3a_7[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_7['1']; $sum+= $part3a_7['1']; ?></td>
			<td><?php echo $part3a_7['2']; $sum+= $part3a_7['2']*2; ?></td>
			<td><?php echo $part3a_7['3']; $sum+= $part3a_7['3']*3; ?></td>
			<td><?php echo $part3a_7['4']; $sum+= $part3a_7['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[7] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td>Speaks clearly and audibly.</td>
			<td><?php echo $part3a_8[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_8['1']; $sum+= $part3a_8['1']; ?></td>
			<td><?php echo $part3a_8['2']; $sum+= $part3a_8['2']*2; ?></td>
			<td><?php echo $part3a_8['3']; $sum+= $part3a_8['3']*3; ?></td>
			<td><?php echo $part3a_8['4']; $sum+= $part3a_8['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[8] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>9.</td>
			<td>Uses appropriate teaching techniques and instructional materials.</td>
			<td><?php echo $part3a_9[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_9['1']; $sum+= $part3a_9['1']; ?></td>
			<td><?php echo $part3a_9['2']; $sum+= $part3a_9['2']*2; ?></td>
			<td><?php echo $part3a_9['3']; $sum+= $part3a_9['3']*3; ?></td>
			<td><?php echo $part3a_9['4']; $sum+= $part3a_9['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[9] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>10.</td>
			<td>Does not respect students' ideas and viewpoints.</td>
			<td><?php echo $part3a_10[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_10['1']; $sum+= $part3a_10['1']; ?></td>
			<td><?php echo $part3a_10['2']; $sum+= $part3a_10['2']*2; ?></td>
			<td><?php echo $part3a_10['3']; $sum+= $part3a_10['3']*3; ?></td>
			<td><?php echo $part3a_10['4']; $sum+= $part3a_10['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[10] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>11.</td>
			<td>Explains concepts again when he/she notes that the concept is not well understood.</td>
			<td><?php echo $part3a_11[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_11['1']; $sum+= $part3a_11['1']; ?></td>
			<td><?php echo $part3a_11['2']; $sum+= $part3a_11['2']*2; ?></td>
			<td><?php echo $part3a_11['3']; $sum+= $part3a_11['3']*3; ?></td>
			<td><?php echo $part3a_11['4']; $sum+= $part3a_11['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[11] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>12.</td>
			<td>Identifies and stresses important points.</td>
			<td><?php echo $part3a_12[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_12['1']; $sum+= $part3a_12['1']; ?></td>
			<td><?php echo $part3a_12['2']; $sum+= $part3a_12['2']*2; ?></td>
			<td><?php echo $part3a_12['3']; $sum+= $part3a_12['3']*3; ?></td>
			<td><?php echo $part3a_12['4']; $sum+= $part3a_12['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[12] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>13.</td>
			<td>Demonstrates thorough and broad knowledge of the subject of the course.</td>
			<td><?php echo $part3a_13[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_13['1']; $sum+= $part3a_13['1']; ?></td>
			<td><?php echo $part3a_13['2']; $sum+= $part3a_13['2']*2; ?></td>
			<td><?php echo $part3a_13['3']; $sum+= $part3a_13['3']*3; ?></td>
			<td><?php echo $part3a_13['4']; $sum+= $part3a_13['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[13] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>14.</td>
			<td>Uses evaluation measures and tests which adequately sample what was covered in the course.</td>
			<td><?php echo $part3a_14[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_14['1']; $sum+= $part3a_14['1']; ?></td>
			<td><?php echo $part3a_14['2']; $sum+= $part3a_14['2']*2; ?></td>
			<td><?php echo $part3a_14['3']; $sum+= $part3a_14['3']*3; ?></td>
			<td><?php echo $part3a_14['4']; $sum+= $part3a_14['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[14] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td>15.</td>
			<td>Gives constructive criticism of students' works.</td>
			<td><?php echo $part3a_15[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_15['1']; $sum+= $part3a_15['1']; ?></td>
			<td><?php echo $part3a_15['2']; $sum+= $part3a_15['2']*2; ?></td>
			<td><?php echo $part3a_15['3']; $sum+= $part3a_15['3']*3; ?></td>
			<td><?php echo $part3a_15['4']; $sum+= $part3a_15['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[15] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">16.</td>
			<td width="62%">Is firm and consistent; strict but reasonable in disciplining students.</td>
			<td><?php echo $part3a_16[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_16['1']; $sum+= $part3a_16['1']; ?></td>
			<td><?php echo $part3a_16['2']; $sum+= $part3a_16['2']*2; ?></td>
			<td><?php echo $part3a_16['3']; $sum+= $part3a_16['3']*3; ?></td>
			<td><?php echo $part3a_16['4']; $sum+= $part3a_16['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[16] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">17.</td>
			<td width="62%">Does not invite questions from students.</td>
			<td><?php echo $part3a_17[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_17['1']; $sum+= $part3a_17['1']; ?></td>
			<td><?php echo $part3a_17['2']; $sum+= $part3a_17['2']*2; ?></td>
			<td><?php echo $part3a_17['3']; $sum+= $part3a_17['3']*3; ?></td>
			<td><?php echo $part3a_17['4']; $sum+= $part3a_17['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[17] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">18.</td>
			<td width="62%">Explains the grading procedure ans standards clearly and applies them.</td>
			<td><?php echo $part3a_18[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_18['1']; $sum+= $part3a_18['1']; ?></td>
			<td><?php echo $part3a_18['2']; $sum+= $part3a_18['2']*2; ?></td>
			<td><?php echo $part3a_18['3']; $sum+= $part3a_18['3']*3; ?></td>
			<td><?php echo $part3a_18['4']; $sum+= $part3a_18['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[18] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">19.</td>
			<td width="62%">Does not invite through behaviour and general appearance.</td>
			<td><?php echo $part3a_19[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_19['1']; $sum+= $part3a_19['1']; ?></td>
			<td><?php echo $part3a_19['2']; $sum+= $part3a_19['2']*2; ?></td>
			<td><?php echo $part3a_19['3']; $sum+= $part3a_19['3']*3; ?></td>
			<td><?php echo $part3a_19['4']; $sum+= $part3a_19['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[19] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">20.</td>
			<td width="62%">Explains the grading procedure ans standards clearly and applies them.</td>
			<td><?php echo $part3a_20[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_20['1']; $sum+= $part3a_20['1']; ?></td>
			<td><?php echo $part3a_20['2']; $sum+= $part3a_20['2']*2; ?></td>
			<td><?php echo $part3a_20['3']; $sum+= $part3a_20['3']*3; ?></td>
			<td><?php echo $part3a_20['4']; $sum+= $part3a_20['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[20] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">21.</td>
			<td width="62%">Admits errors in the presentation of subject matter, and in evaluation.</td>
			<td><?php echo $part3a_21[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_21['1']; $sum+= $part3a_21['1']; ?></td>
			<td><?php echo $part3a_21['2']; $sum+= $part3a_21['2']*2; ?></td>
			<td><?php echo $part3a_21['3']; $sum+= $part3a_21['3']*3; ?></td>
			<td><?php echo $part3a_21['4']; $sum+= $part3a_21['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[21] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">22.</td>
			<td width="62%">Answers students' questions adequately.</td>
			<td><?php echo $part3a_22[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_22['1']; $sum+= $part3a_22['1']; ?></td>
			<td><?php echo $part3a_22['2']; $sum+= $part3a_22['2']*2; ?></td>
			<td><?php echo $part3a_22['3']; $sum+= $part3a_22['3']*3; ?></td>
			<td><?php echo $part3a_22['4']; $sum+= $part3a_22['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[22] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">23.</td>
			<td width="62%">Is not available for consultation.</td>
			<td><?php echo $part3a_23[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_23['1']; $sum+= $part3a_23['1']; ?></td>
			<td><?php echo $part3a_23['2']; $sum+= $part3a_23['2']*2; ?></td>
			<td><?php echo $part3a_23['3']; $sum+= $part3a_23['3']*3; ?></td>
			<td><?php echo $part3a_23['4']; $sum+= $part3a_23['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[23] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">24.</td>
			<td width="62%">Is able to make students comprehend and appreciate complex ideas.</td>
			<td><?php echo $part3a_24[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_24['1']; $sum+= $part3a_24['1']; ?></td>
			<td><?php echo $part3a_24['2']; $sum+= $part3a_24['2']*2; ?></td>
			<td><?php echo $part3a_24['3']; $sum+= $part3a_24['3']*3; ?></td>
			<td><?php echo $part3a_24['4']; $sum+= $part3a_24['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[24] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">25.</td>
			<td width="62%">Gives unreasonable course requirements and assignments.</td>
			<td><?php echo $part3a_25[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_25['1']; $sum+= $part3a_25['1']; ?></td>
			<td><?php echo $part3a_25['2']; $sum+= $part3a_25['2']*2; ?></td>
			<td><?php echo $part3a_25['3']; $sum+= $part3a_25['3']*3; ?></td>
			<td><?php echo $part3a_25['4']; $sum+= $part3a_25['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[25] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
		<tr>
			<td width="2%">26.</td>
			<td>Uses comprehensive, up-to-date and relevant reading list.</td>
			<td><?php echo $part3a_26[0]; $sum = 0; ?></td>
			<td><?php echo $part3a_26['1']; $sum+= $part3a_26['1']; ?></td>
			<td><?php echo $part3a_26['2']; $sum+= $part3a_26['2']*2; ?></td>
			<td><?php echo $part3a_26['3']; $sum+= $part3a_26['3']*3; ?></td>
			<td><?php echo $part3a_26['4']; $sum+= $part3a_26['4']*4; ?></td>
			<td><?php  if($no_of_respondents != 0) echo round($ave[26] = $sum/$no_of_respondents, 4); else echo 0;?></td>
		</tr>
	</table>
	<br/>
	<div align="right">Weighted Average (Part III-A): <?php if(isset($ave)){if($sum = array_sum($ave)) echo round($sum/count($ave), 4); else echo 0;} else echo 0; ?></div> 
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
			<td>Too early</td>
			<td>On time</td>
			<td>Late</td>
			<td>Very Late</td>
		</tr>
		<tr>
			<td width="2%">3.</td>
			<td>The teacher generally dismissed the class</td>
			<td width="8%"><?php echo $part3b_3['Too early']; ?></td>
			<td width="8%"><?php echo $part3b_3['On time']; ?></td>
			<td width="8%"><?php echo $part3b_3['Late']; ?></td>
			<td width="8%"><?php echo $part3b_3['Very late']; ?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td rowspan="7" valign="top">4. What are the bases used by teacher for grading?</td>
			<td>Recitation</td>
			<td width="10%"><?php echo $part3b_4['recitation']; ?></td>
		</tr>
		<tr>
			<td>Quizzes</td>
			<td><?php echo $part3b_4['quizzes']; ?></td>
		</tr>
		<tr>
			<td>Midterm exams</td>
			<td><?php echo $part3b_4['midterms']; ?></td>
		</tr>
		<tr>
			<td>Final exams</td>
			<td><?php echo $part3b_4['finals']; ?></td>
		</tr>
		<tr>
			<td>Reports</td>
			<td><?php echo $part3b_4['reports']; ?></td>
		</tr>
		<tr>
			<td>Papers</td>
			<td><?php echo $part3b_4['papers']; ?></td>
		</tr>
		<tr>
			<td>Others</td>
			<td><?php echo $part3b_4['others']; ?></td>
		</tr>
	</table>
	
	<br/><br/>
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
			<td width="2%">5.</td>
			<td>How soon does the teacher post results or return corrected assignments, quizzes, exams, papers, etc.?</td>
			<td><?php echo $part3b_5['One week']; ?></td>
			<td><?php echo $part3b_5['Two weeks']; ?></td>
			<td><?php echo $part3b_5['One month']; ?></td>
			<td><?php echo $part3b_5['More than one month']; ?></td>
			<td><?php echo $part3b_5['Never']; ?></td>
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
			<td width="2%">6.</td>
			<td>Is the teacher fair in giving grades?</td>
			<td><?php echo $part3b_6_1['Always']; ?></td>
			<td><?php echo $part3b_6_1['Usually']; ?></td>
			<td><?php echo $part3b_6_1['Sometimes']; ?></td>
			<td><?php echo $part3b_6_1['Rarely']; ?></td>
			<td><?php echo $part3b_6_1['Never']; ?></td>
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
			<td width="2%">7.</td>
			<td>Among the teachers you have had, how would you rate this teacher?</td>
			<td><?php echo $part3b_7['The best']; ?></td>
			<td><?php echo $part3b_7['Among the best']; ?></td>
			<td><?php echo $part3b_7['Average']; ?></td>
			<td><?php echo $part3b_7['Among the worst']; ?></td>
			<td><?php echo $part3b_7['The worst']; ?></td>
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
	
	
</body>
</html>