<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id = $_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================

$school1 = $_POST["school1"];
$address = $_POST["address"];
$mobile = $_POST["mobile"];
$pw = $_POST["pw"];
$npw= $_POST["npw"];

$str="";

$check = fieldcount("SELECT * FROM `pw_user` WHERE `user_id` = $user_id AND `password` = '$pw'");
if($check > 0)
{
		$sql = "UPDATE pw_user SET ".
		"`school_name` = '$school1', ".
		"`address` = '$address', ".		
		"`user`= '$mobile', ".
		"`password`='$npw' WHERE ".
		"`user_id` = $user_id";
			
			if (mysqli_query($conn, $sql))
			{
					$str="Updated Successfully";
			}
			else
			{
					$str= "Update Error !!";
			};
}
else
{
	$str= "Your existing password is not correct !";
}
?>
<div class="col-sm-12"><?php echo $school;?></div>
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="well text-center">
					<ul class="pager">
						<li class="next"><a href="home.php">Cancel</a></li>
					</ul>				
					<p class="lead"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>