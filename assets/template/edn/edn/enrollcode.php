<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$dt=$_POST["y1"]."-".$_POST["m1"]."-".$_POST["d1"];

$idcard = $_POST["idcard"];
$session = $_POST["session"];
$stdname = $_POST["stdname"];
$fname= $_POST["fname"];

$income = $_POST["income"];
$address = $_POST["address"];
$mobile = $_POST["mobile"];
$sex= $_POST["sex"];

$occupation= $_POST["occupation"];
$situationtype= $_POST["situationtype"];
$admittedclass = $_POST["admittedclass"];
$remarks= $_POST["remarks"];

$pic=$idcard.".jpg";
$str="";
		$sql = "INSERT INTO db_student ".
		"(`student_id`, `idcard`, `student_name`, `father_name`, `address`, `mobile`, `bdate`, `sex_id`, `situationtype_id`, `occupation_id`, `income`, `class_id_pres`, `remarks`, `session`, `pic`, `user_id`) ".
		 "VALUES (''  ,  $idcard,    '$stdname',      '$fname', '$address','$mobile',   '$dt',     $sex,     $situationtype,    $occupation,   $income,  $admittedclass, '$remarks', $session, '$pic',  $user_id)";
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
						<li class="next"><a href="enrollview.php">Cancel</a></li>
					</ul>				
					<p class="lead"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>