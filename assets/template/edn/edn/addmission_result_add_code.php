<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$dt=date("Y-m-d h:i:sa");

$session = $_POST["session"];
$admittedclass = $_POST["admittedclass"];
$stdname = $_POST["stdname"];
$fname= $_POST["fname"];

$written = $_POST["written"];
$Practical = $_POST["Practical"];
$Oral = $_POST["Oral"];
$Other= $_POST["Other"];
$total = intval($written) + intval($Practical) + intval($Oral) + intval($Other);
$str="";
		$sql = "INSERT INTO admission_result ".
		"(`admission_result_id`, `admission_result_std_name`, `admission_result_std_fname`, `admission_result_user`, `admission_result_session`, `admission_result_class`, `admission_result_written`, `admission_result_practical`, `admission_result_oral`, `admission_result_other`, `admission_result_total`, `admission_result_dt`) ".
				"VALUES (''    ,                  '$stdname',                     '$fname', 			   $user_id,                   $session,           $admittedclass,                   $written,                   $Practical,                   $Oral,                   $Other,                   $total,                '$dt')";
		
			if (mysqli_query($conn, $sql))
			{
					$str="Save Successfully";
			}
			else
			{
					$str= "Saving Error !!";
			};

?>
<div class="col-sm-12"><?php echo $school;?></div>
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="well text-center">
					<ul class="pager">
						<li class="next"><a href="addmission_result_views.php">Cancel</a></li>
					</ul>				
					<p class="lead"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>