<?php 
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
$session=date("Y");

$totalstd = fieldcount("SELECT * FROM `db_student` WHERE `user_id`= $user_id AND `session`=$session");
$totalstdMale = fieldcount("SELECT * FROM `db_student` WHERE `user_id`= $user_id AND `session`=$session AND `sex_id`=1");
$totalstdFemale = fieldcount("SELECT * FROM `db_student` WHERE `user_id`= $user_id AND `session`=$session AND `sex_id`=2");
$totalstdOthers = fieldcount("SELECT * FROM `db_student` WHERE `user_id`= $user_id AND `session`=$session AND `sex_id`=3");
?>
<div class="col-sm-12">
<?php echo $school;?>
<h2>Home Page</h2>
	<a href="#" class="thumbnail">
	<img src="pic/dash_students.jpeg" alt="student" style="width:150px;height:150px">
		<ul class="list-group">
			<li class="list-group-item"><span class="badge"><?php echo $session;?></span>Session</li>		
			<li class="list-group-item"><span class="badge"><?php echo $totalstd;?></span>Total Student</li>
			<li class="list-group-item"><span class="badge"><?php echo $totalstdMale;?></span>Male</li>
			<li class="list-group-item"><span class="badge"><?php echo $totalstdFemale;?></span>Female</li>
			<li class="list-group-item"><span class="badge"><?php echo $totalstdOthers;?></span>Others</li>			
		</ul>
	</a>				
</div>
<?php include "footer.php"; ?>		
