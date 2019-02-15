<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$dt=$_POST["y1"]."-".$_POST["m1"]."-".$_POST["d1"];
$stdid = $_POST["stdid"];
$fees= $_POST["fees"];

$str="";
		$sql = "INSERT INTO db_fees ".
		"(`fees_id`, `student_id`,   `fees`, `fees_dt`, `user_id`) ".
	  "VALUES (''  ,       $stdid,    $fees,     '$dt',  $user_id)";
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
				<div class="well">
					<ul class="pager">
						<li class="next"><a href="fees_views.php">Cancel</a></li>
					</ul>				
					<p class="lead text-center"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>