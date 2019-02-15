<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";

$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================

$id = $_POST["id"];

$session = $_POST["session"];
$admittedclass = $_POST["admittedclass"];
$stdname = $_POST["stdname"];
$fname = $_POST["fname"];

$written = $_POST["written"];
$Practical = $_POST["Practical"];
$Oral = $_POST["Oral"];
$Other= $_POST["Other"];
$total = intval($written) + intval($Practical) + intval($Oral) + intval($Other);

$str="";
		$sql = "UPDATE admission_result SET ".
		"`admission_result_session` = $session, ".		
		"`admission_result_class`= $admittedclass, ".
		"`admission_result_std_name`= '$stdname', ".
		"`admission_result_std_fname` = '$fname', ".
		"`admission_result_written`= $written, ".
		"`admission_result_practical` = $Practical, ".
		"`admission_result_oral`= $Oral, ".
		"`admission_result_other`= $Other, ".
		"`admission_result_total`= $total WHERE ".
		"`admission_result_id` = $id";
			
			if (mysqli_query($conn, $sql))
			{
					$str="Save Successfully";
			}
			else
			{
					$str= "Save Error !!";
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