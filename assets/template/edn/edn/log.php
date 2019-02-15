<?php
session_start();
include "conn.php";
include "custom.php";
$user = $_POST["user"];
$password =  $_POST["pw"];
$str="";

$sql="SELECT *FROM pw_user WHERE user ='$user' AND password  = '$password'";
$result=mysqli_query($conn, $sql);
$Numrows=mysqli_num_rows($result);
if ($Numrows > 0)
{
			$rows=mysqli_fetch_array($result);
			$schnm = $rows['school_name'];
			$schad = $rows['address'];
			$uid = $rows['user_id'];
			$res = $rows['restricted'];

			$str = "Loging...";
			$_SESSION["school_name"] = "<h2 class='text-center' id='cntr'>$schnm<br><small>$schad</small></h2>";
			$_SESSION["user_id"] = $uid;
			$_SESSION["restricted"] = $res;
			echo "<script> window.location='home.php'; </script>";

}
else
{
	$str = "Wrong user id or password !<br>Please try again.";
}		
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="pic/logo.ico"> 
	<title>Student Enrollment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
		<div class="row" style="margin-top:50px;">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Student Enrollment<br><small>Log In</small></h2>	
					</div>	
					<div  class="panel-body">
						<div class="col-sm-12">
							<p class="lead text-center"><?php echo $str; ?></p>	
						</div>
					</div>		
					<div  class="panel-footer">
						<a class="btn btn-default" href="../index.php">Cancel</a>					
					</div>	
				</div><!-- Panel -->				
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
		</div><!-- Row -->
	</div> <!-- Container -->>

</body>
</html>