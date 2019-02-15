<?php 
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
	$dt = $_POST['dt'];	
	$sess = $_POST['sess'];	
	$clas1 = $_POST['clas1'];	
	$k = $_POST['k'];

$str="";
$sql_check =   "SELECT * FROM `db_student_attendance` WHERE `session` = $sess AND `class_id_pres` = $clas1 AND `atd_date` = '$dt' AND `user_id`= $user_id";
$check_field = fieldcount($sql_check);
if($check_field > 0)
{
	$sql_delete= "DELETE FROM `db_student_attendance` WHERE `session` = $sess AND `class_id_pres` = $clas1 AND `atd_date` = '$dt' AND `user_id`= $user_id";	
	mysqli_query($conn, $sql_delete);
}
	if(isset($k))
	{
		$N_k = count($k);
		for($l=0; $l < $N_k; $l++)
		{
			$f_k= $k[$l];
			$sql_i="INSERT INTO db_student_attendance ".
			"(`attendance_id`, `student_id`, `atd_date`, `class_id_pres`, `session`, `user_id`, `attendance`) ".
			      "VALUES ('',         $f_k,      '$dt',          $clas1,     $sess,  $user_id,   1)";
			mysqli_query($conn, $sql_i);
		}
	}		

	$str="Operations success insert!";

?> 
<div class="col-sm-12" id="divhead">
<?php echo $school;?>
<h3 class="text-center">Student Attendance</h3>
</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="well text-center">
					<p class="lead"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>