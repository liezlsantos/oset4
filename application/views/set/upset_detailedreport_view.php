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
		<td colspan="8"><br/>
		&nbsp; &nbsp; 1 - [Very much] &nbsp; &nbsp; 2 - [Much] &nbsp;&nbsp; 3 - [Moderately] &nbsp;&nbsp; 4 - [Little] &nbsp;&nbsp; 5 - [Not at all]
		<br/><br/>
		</td>
		</tr>
		<tr>
			<td colspan="2"></td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>AVE</td>
		</tr>
		<tr>
			<td width="2%">1.</td>
			<td width="58%">How actively did you participate in class discussions and activities?</td>
			<td width="6%"><?php $sum = 0; $count = 0; echo $part1_1['1']; $sum+= $part1_1['1']; $count+=$part1_1['1']; ?></td>
			<td width="6%"><?php echo $part1_1['2']; $sum+= $part1_1['2']*2; $count+=$part1_1['2'];?></td>
			<td width="6%"><?php echo $part1_1['3']; $sum+= $part1_1['3']*3; $count+=$part1_1['3'];?></td>
			<td width="6%"><?php echo $part1_1['4']; $sum+= $part1_1['4']*4; $count+=$part1_1['4'];?></td>
			<td width="6%"><?php echo $part1_1['5']; $sum+= $part1_1['5']*5; $count+=$part1_1['5'];?></td>
			<td width="10%"><?php  if($count != 0) echo $ave1 = $sum/$count; else echo $ave1 = 0;?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>Did you learn new ideas from your interactions with your teacher and classmates?</td>
			<td><?php $sum = 0; $count = 0; echo $part1_2['1']; $sum+= $part1_2['1']; $count+=$part1_2['1']; ?></td>
			<td><?php echo $part1_2['2']; $sum+= $part1_2['2']*2; $count+=$part1_2['2'];?></td>
			<td><?php echo $part1_2['3']; $sum+= $part1_2['3']*3; $count+=$part1_2['3'];?></td>
			<td><?php echo $part1_2['4']; $sum+= $part1_2['4']*4; $count+=$part1_2['4'];?></td>
			<td><?php echo $part1_2['5']; $sum+= $part1_2['5']*5; $count+=$part1_2['5'];?></td>
			<td><?php  if($count != 0) echo $ave2 = $sum/$count; else echo $ave2 = 0;?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td>How receptive were you to new ideas presented by your teacher and classmates?</td>
			<td><?php $sum = 0; $count = 0; echo $part1_3['1']; $sum+= $part1_3['1']; $count+=$part1_3['1']; ?></td>
			<td><?php echo $part1_3['2']; $sum+= $part1_3['2']*2; $count+=$part1_3['2'];?></td>
			<td><?php echo $part1_3['3']; $sum+= $part1_3['3']*3; $count+=$part1_3['3'];?></td>
			<td><?php echo $part1_3['4']; $sum+= $part1_3['4']*4; $count+=$part1_3['4'];?></td>
			<td><?php echo $part1_3['5']; $sum+= $part1_3['5']*5; $count+=$part1_3['5'];?></td>
			<td><?php  if($count != 0) echo $ave3 = $sum/$count; else echo $ave3 = 0;?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td>How much effort did you give to meeting the requirements in this course? (eg. term papers, reports, assigned readings)</td>
			<td><?php $sum = 0; $count = 0; echo $part1_4['1']; $sum+= $part1_4['1']; $count+=$part1_4['1']; ?></td>
			<td><?php echo $part1_4['2']; $sum+= $part1_4['2']*2; $count+=$part1_4['2'];?></td>
			<td><?php echo $part1_4['3']; $sum+= $part1_4['3']*3; $count+=$part1_4['3'];?></td>
			<td><?php echo $part1_4['4']; $sum+= $part1_4['4']*4; $count+=$part1_4['4'];?></td>
			<td><?php echo $part1_4['5']; $sum+= $part1_4['5']*5; $count+=$part1_4['5'];?></td>
			<td><?php  if($count != 0) echo $ave4 = $sum/$count; else echo $ave4 = 0;?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td>Do you feel that you have performed well in this course?</td>
			<td><?php $sum = 0; $count = 0; echo $part1_5['1']; $sum+= $part1_5['1']; $count+=$part1_5['1']; ?></td>
			<td><?php echo $part1_5['2']; $sum+= $part1_5['2']*2; $count+=$part1_5['2'];?></td>
			<td><?php echo $part1_5['3']; $sum+= $part1_5['3']*3; $count+=$part1_5['3'];?></td>
			<td><?php echo $part1_5['4']; $sum+= $part1_5['4']*4; $count+=$part1_5['4'];?></td>
			<td><?php echo $part1_5['5']; $sum+= $part1_5['5']*5; $count+=$part1_5['5'];?></td>
			<td><?php  if($count != 0) echo $ave5 = $sum/$count; else echo $ave5 = 0;?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td>Have your expectations of this course been met?</td>
			<td><?php $sum = 0; $count = 0; echo $part1_6['1']; $sum+= $part1_6['1']; $count+=$part1_6['1']; ?></td>
			<td><?php echo $part1_6['2']; $sum+= $part1_6['2']*2; $count+=$part1_6['2'];?></td>
			<td><?php echo $part1_6['3']; $sum+= $part1_6['3']*3; $count+=$part1_6['3'];?></td>
			<td><?php echo $part1_6['4']; $sum+= $part1_6['4']*4; $count+=$part1_6['4'];?></td>
			<td><?php echo $part1_6['5']; $sum+= $part1_6['5']*5; $count+=$part1_6['5'];?></td>
			<td><?php  if($count != 0) echo $ave6 = $sum/$count; else echo $ave6 = 0;?></td>
		</tr>	
	
		<tr>
		<td colspan="8"><br/>
		&nbsp; &nbsp; 1 - [0] &nbsp; &nbsp; 2 - [1] &nbsp;&nbsp; 3 - [2 to 3] &nbsp;&nbsp; 4 - [4 to 5] &nbsp;&nbsp; 5 - [6]
		<br/><br/>
		</td>
		</tr>

		<tr>
			<td>7.</td>
			<td>Have many times have you been late?</td>
			<td><?php $sum = 0; $count = 0; echo $part1_7['0']; $sum+= $part1_7['0']; $count+=$part1_7['0']; ?></td>
			<td><?php echo $part1_7['1']; $sum+= $part1_7['1']*2; $count+=$part1_7['1'];?></td>
			<td><?php echo $part1_7['2-3']; $sum+= $part1_7['2-3']*3; $count+=$part1_7['2-3'];?></td>
			<td><?php echo $part1_7['4-5']; $sum+= $part1_7['4-5']*4; $count+=$part1_7['4-5'];?></td>
			<td><?php echo $part1_7['6']; $sum+= $part1_7['6']*5; $count+=$part1_7['6'];?></td>
			<td><?php  if($count != 0) echo $ave7 = $sum/$count; else echo $ave7 = 0;?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td>How many class meetings have you missed?</td>
			<td><?php $sum = 0; $count = 0; echo $part1_8['0']; $sum+= $part1_8['0']; $count+=$part1_8['0']; ?></td>
			<td><?php echo $part1_8['1']; $sum+= $part1_8['1']*2; $count+=$part1_8['1'];?></td>
			<td><?php echo $part1_8['2-3']; $sum+= $part1_8['2-3']*3; $count+=$part1_8['2-3'];?></td>
			<td><?php echo $part1_8['4-5']; $sum+= $part1_8['4-5']*4; $count+=$part1_8['4-5'];?></td>
			<td><?php echo $part1_8['6']; $sum+= $part1_8['6']*5; $count+=$part1_8['6'];?></td>
			<td><?php  if($count != 0) echo $ave8 = $sum/$count; else echo $ave8 = 0;?></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="11">9. What final grade will you give yourself in this course?</td>
		</tr>
		<tr>
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
			<td><?php  if($count != 0) echo $ave9 = $sum/$count; else echo $ave9 = 0;?></td>
		</tr>		
	</table>
	<br/>
	<div align="right">Weighted Average (Part I):</div> 
	<br/><br/>

	<b>PART II-A. THE COURSE</b>
	
	<br/><br/>
	<table class="records">
		<tr>
		<td colspan="7"><br/>
		&nbsp; &nbsp; 1 - [Strongly Agree] &nbsp; &nbsp; 2 - [Agree] &nbsp;&nbsp; 3 - [Disagree] &nbsp;&nbsp; 4 - [Strongly Disagree]
		<br/><br/>
		</td>
		</tr>
		
		<tr>
			<td colspan="2"></td>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>AVE</td>
		</tr>
		
		<tr>
			<td width="2%">1.</td>
			<td width="68%">This course stimulates me to study beyond the lessons assigned.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		
		<tr>
			<td>2.</td>
			<td>This course has developed in me a greater sense of responsibility (i.e. self-reliance, self discipline, independent study)</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td>3.</td>
			<td>I have worked more conscientiously in this course more than in most other courses.</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td>4.</td>
			<td>Even if this course were not required, it would still be worthwhile taking it.</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td>5.</td>
			<td>I am fully satisfied with the way this course was handled/conducted.</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td>6.</td>
			<td>This course stimulates me to think creatively.</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td>7.</td>
			<td>This course develops critical thinking.</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	<br/>
	<div align="right">Weighted Average (Part II-A):</div> 
	<br/><br/>
	
	<b>PART II-B. THE COURSE</b>
	
	<br/><br/>
	<table class="records">
		<tr>
			<td></td>
			<td>Yes</td>
			<td>No</td>
		</tr>
		<tr>
			<td>1. Does the class has a syllabus or expanded outline for the course?</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>&nbsp; &nbsp; 1.1 Have there been departures from the syllabus?</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>&nbsp; &nbsp; &nbsp; &nbsp; 1.1.2 Do you think the departure(s) from the syllabus were necessary?.</td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td>Too Fast</td>
			<td>Fast</td>
			<td>Just right</td>
			<td>Slow</td>
			<td>Too slow</td>
			<td>Others</td>
		</tr>
		<tr>
			<td>2.</td>
			<td>How would you rate the overall pace of this course?</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td colspan="2"></td>
			<td width="10%">Very much</td>
			<td width="10%">Much</td>
			<td width="10%">Some</td>
			<td width="10%">Very Little</td>
			<td width="10%">Nothing</td>
		</tr>
		<tr>
			<td width="2%">3.</td>
			<td>How much have you learned from this course?</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
			<td colspan="6">answer</td>
		</tr>
		<tr>
			<td>6.</td>
			<td colspan="6">How can this course be further improved? </td>
		</tr>
		<tr>
			<td></td>
			<td colspan="6">answer</td>
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
			<td width="62%">Explains the course objectives, expectations and requirements of the course</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">2.</td>
			<td width="62%">Comes to class unprepared for the lesson.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">3.</td>
			<td width="62%">Presents the subject matter clearly and systematically.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">4.</td>
			<td width="62%">Relates the course to other fields and current issues/concerns.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">5.</td>
			<td width="62%">Fosters a stimulating atmosphere which encourages students to participate in class discussions/activities.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">6.</td>
			<td width="62%">Stimulates the students to study more about the subject.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">7.</td>
			<td width="62%">Does not encourage studetns to do their best.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">8.</td>
			<td width="62%">Speaks clearly and audibly.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">9.</td>
			<td width="62%">Uses appropriate teaching techniques and instructional materials.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">10.</td>
			<td width="62%">Does not respect students' ideas and viewpoints.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">11.</td>
			<td width="62%">Explains concepts again when he/she notes that the concept is not well understood.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">12.</td>
			<td width="62%">Identifies and stresses important points.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">13.</td>
			<td width="62%">Demonstrates thorough and broad knowledge of the subject of the course.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">14.</td>
			<td width="62%">Uses evaluation measures and tests which adequately sample what was covered in the course.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">15.</td>
			<td width="62%">Gives constructive criticism of students' works.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">16.</td>
			<td width="62%">Is firm and consistent; strict but reasonable in disciplining students.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">17.</td>
			<td width="62%">Does not invite questions from students.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">18.</td>
			<td width="62%">Explains the grading procedure ans standards clearly and applies them.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">19.</td>
			<td width="62%">Does not invite through behaviour and general appearance.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">20.</td>
			<td width="62%">Explains the grading procedure ans standards clearly and applies them.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">21.</td>
			<td width="62%">Admits errors in the presentation of subject matter, and in evaluation.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">22.</td>
			<td width="62%">Answers students' questions adequately.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">23.</td>
			<td width="62%">Is not available for consultation.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">24.</td>
			<td width="62%">Is able to make students comprehend and appreciate complex ideas.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">25.</td>
			<td width="62%">Gives unreasonable course requirements and assignments.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
		<tr>
			<td width="2%">26.</td>
			<td width="62%">Uses comprehensive, up-to-date and relevant reading list.</td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
			<td width="6%"></td>
		</tr>
	</table>
	<br/>
	<div align="right">Weighted Average (Part III-A):</div> 
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
			<td width="8%"></td>
			<td width="8%"></td>
			<td width="8%"></td>
			<td width="8%"></td>
			<td width="8%"></td>
		</tr>
		<tr>
			<td>2.</td>
			<td>How many class meetings has the teacher missed?</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	<br/>
	<table class="records">
		<tr>
			<td rowspan="7" valign="top">4. What are the bases used by teacher for grading?</td>
			<td>Recitation</td>
			<td width="10%"></td>
		</tr>
		<tr>
			<td>Quizzes</td>
			<td></td>
		</tr>
		<tr>
			<td>Midterm exams</td>
			<td></td>
		</tr>
		<tr>
			<td>Final exams</td>
			<td></td>
		</tr>
		<tr>
			<td>Reports</td>
			<td></td>
		</tr>
		<tr>
			<td>Papers</td>
			<td></td>
		</tr>
		<tr>
			<td>Others</td>
			<td></td>
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
			<td width="2%">5.</td>
			<td>How soon does the teacher post results or return corrected assignments, quizzes, exams, papers, etc.?</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
			<td colspan="6">answer</td>
		</tr>
	</table>
	
	
</body>
</html>