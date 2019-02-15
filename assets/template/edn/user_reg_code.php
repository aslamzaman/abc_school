<?php
date_default_timezone_set("Asia/Dhaka");
$ip_address = $_SERVER['REMOTE_ADDR'] ; 
include "edn/conn.php";
include "edn/custom.php";

$dt=date("Y-m-d h:i:sa");
$school = $_POST["school"];
$address = $_POST["address"];
$mobile = $_POST["mobile"];
$pw = $_POST["pw"];

$str="";

$check= fieldcount("SELECT * FROM `pw_user` WHERE `user`= '$mobile' LIMIT 1");

if($check > 0)
{
	$str="Your user name already exist<br>Please try to another user name";
}
else
{
		$sql = "INSERT INTO pw_user ".
		"(`user_id`, `school_name`, `address`,   `user`, `password`, `restricted`, `user_ip`, `entry`) ".
		 "VALUES ('' ,  '$school', '$address','$mobile',      '$pw',            0,'$ip_address','$dt')";
			if (mysqli_query($conn, $sql))
			{
					$str="Save Successfully";
			}
			else
			{
					$str= "Saving Error !!";
			}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="pic/logo.ico"> 
	<title>Students Enrollment</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
h1 {
    font-size: 60px;
}
</style>
</head>
<body>
    <div class="container-fluid">
		<div class="row" style="margin-top:50px;">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Registrations</h2>	
					</div>	
					<div  class="panel-body">
						<div class="col-sm-12">
							<p class="lead text-center"><?php echo $str; ?></p>	
						</div>
					</div>		
					<div  class="panel-footer">
						<a class="btn btn-default" href="index.php">Cancel</a>					
					</div>	
				</div><!-- Panel -->				
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
		</div><!-- Row -->
	</div> <!-- Container -->>
</body>
</html>