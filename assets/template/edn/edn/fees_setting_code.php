<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================

$session = $_POST["session"];
$class1 = $_POST["class1"];
$fees= $_POST["fees"];

$str="";
		$sql = "INSERT INTO db_fees_setting ".
		"(`fees_id`, `fees_session`, `fees_class`, `fees`, `user_id`) ".
	  "VALUES (''  ,       $session,      $class1,  $fees, $user_id)";
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
						<li class="next"><a href="fees_setting_view.php">Cancel</a></li>
					</ul>				
					<p class="lead text-center"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>