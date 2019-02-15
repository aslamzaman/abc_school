<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$dt=date("Y-m-d h:i:sa");
$clas = $_POST["clas"];
$subj = $_POST["subj"];
$quest = $_POST["quest"];

$str="";
		$sql = "INSERT INTO question_bank ".
		"(`question_id`, `question_user`, `question_class`, `question_subject`, `question`, `question_dt`) ".
		 "VALUES (''  ,         $user_id,            $clas,              $subj,   '$quest',        '$dt')";
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
						<li class="next"><a href="question_view.php">Cancel</a></li>
					</ul>				
					<p class="lead"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>