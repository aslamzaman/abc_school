<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";

$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$dt=$_POST["y1"]."-".$_POST["m1"]."-".$_POST["d1"];

$id = $_POST["id"];

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
		$sql = "UPDATE db_student SET ".
		"`idcard` = $idcard, ".
		"`student_name` = '$stdname', ".		
		"`father_name`= '$fname', ".
		"`address`='$address', ".
		"`mobile` = '$mobile', ".
		"`bdate`= '$dt', ".
		"`sex_id` = $sex, ".
		"`situationtype_id`= $situationtype, ".
		"`income`= $income, ".
		"`occupation_id`= $occupation, ".
		"`class_id_pres`=  $admittedclass, ".
		"`pic` = '$pic', ".		
		"`remarks`='$remarks' WHERE ".
		"`student_id` = $id";
			
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
						<li class="next"><a href="enrollview.php">Cancel</a></li>
					</ul>				
					<p class="lead"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>