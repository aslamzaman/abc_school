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
$class1 = $_POST["class1"];
$fees= $_POST["fees"];

$str="";
		$sql = "UPDATE db_fees_setting SET ".
		"`fees_session` = $session, ".
		"`fees_class` = $class1, ".		
		"`fees`= $fees WHERE ".
		"`fees_id` = $id";
			
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
						<li class="next"><a href="fees_setting_view.php">Cancel</a></li>
					</ul>					
					<p class="lead"><?php echo $str; ?></p>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
<?php include "footer.php"; ?>