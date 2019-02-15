<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$dt=date("Y-m-d H:i:s");
$comments=$_POST['comment'];
$ip = $_SERVER['REMOTE_ADDR'];
$str="";
$sqlcomments="INSERT INTO comments (`comments_id`, `comments`, `comments_ip`, `comments_dt_time`) VALUES('','$comments','$ip','$dt')";
			if (mysqli_query($conn, $sqlcomments))
			{
					$str="Comments has been sent Successfully";
			}
			else
			{
					$str= "Comments sending error !!";
			};

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