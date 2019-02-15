<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="edn/pic/logo.ico"> 
	<title>Online student enrollment</title>
	<meta name="Description" content="Our student enrollment system database, allows you to manage all student informations, student attendance and student fees. It is accurate reporting and quick access to information. Everyone can free registration and access full session. Our motto every school use the database without design or any disturbance At first need a little bit registration - school name and address for database heading, user name and password to access database. All of the information can you print and collect as a hard copy. We do appreciate your valuable feedback very seriously. As your feedback we modify the database.">
	<meta name="Keywords" content="free, student, enrollment, student database, student information sheet, free online database, free online mysql database, mysql online database, high school story database">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
h1 {
    font-size: 60px;
}

bodyx { 
  background: url('pic/background.png') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>
<body>
<?php
date_default_timezone_set("Asia/Dhaka");
include 'edn/conn.php';
include "edn/custom.php";

$ip_address= $_SERVER['REMOTE_ADDR'] ; 
$dt=date("Y-m-d h:i:sa");

$sqlviews="INSERT INTO views (`views_id`,`views_address`,`views_dt_time`) VALUES('','$ip_address','$dt')";
mysqli_query($conn, $sqlviews);

$views_nom= myfield("SELECT * FROM `views` ORDER BY `views_id` DESC LIMIT 1");

$views_num ="Page Views: $views_nom";
//echo $views_num ;
//upload 24.02.2016; 04.32pm;
?>
    <div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
						<table align="right">
							<form class="form-horizontal" role="form" action="edn/log.php" method="post" id="logform">
								<tr>
									<td style="width:130px;">
										<input type="text" class="form-control" id="user" name="user" value="" placeholder="Mobile or email" maxlength="12">
									</td>
									<td style="width:100px;">
										<input type="password" class="form-control" id="pw" name="pw" value="" placeholder="Password" maxlength="12">
									</td>
									<td style="width:100px;">
										<input type="submit" class="btn btn-default btn-block" value="Submit">
									</td>
								</tr>
							</form>								
								<tr>
						
									<td colspan=2>
										<a  class="btn btn-link" href="user_reg.php">Create An Account</a>
									</td>
									<td>
										<a  class="btn btn-link" href="demo_instractions.php">Lunch Demo</a>
									</td>							
								</tr>								
						</table>
				</div>
			</div>
			<div class="row">			
				<div class="col-sm-3">
					<div class="well text-center">
						<H2>Have you need a database !</h2>
						<h3>Don't worried it is free</h3><h2><u>Online student enrollment database</u></h2>
						<p>Just have need a little registration and use it feel free</p> 
					</div>
				</div>
				<div class="col-sm-6" id="pic">
					<p class="text-center"> <img class="img-responsive" src="edn/pic/background.jpg" alt="school"> </p>
				</div>
				<div class="col-sm-3">
					<h3>Why use it ?</h3>
					<p>You must use it because it is free. You have not need a web based database designer, no need domain or hosting. Just brows, put your student informations and enjoy !</p>	
				</div>
			</div>				
		<!-- ==========================================================================   -->
			<div class="row">			
				<div class="col-sm-2">
				</div>	
				<div class="col-sm-8" id="divwdth">
					<iframe width="100%" height="300" src="https://www.youtube.com/embed/ed_jMtEoM-I" frameborder="0" allowfullscreen></iframe>
				</div>	
				<div class="col-sm-2">
				</div>
			</div>				
		<!-- ==========================================================================   -->
			<div class="row">			
				<div class="col-sm-12">
					<h2>Free Student Enrollment Database</h2>
					<h3>Free for all.</h3>
					<p>Our student enrollment system database, allows you to manage all student informations, student attendance and student fees. It is accurate reporting and quick access to information. Everyone can free registration and access full session. Our motto every school use the database without design or any disturbance </p>
					<p>At first need a little bit registration - school name and address for database heading, user name and password to access database. </p> 
					<p>All of the information can you print and collect as a hard copy. </p>
					<h4>We do appreciate your valuable feedback very seriously. As your feedback we modify the database.</h4>
				</div>
			</div><!-- Row -->
	</div> <!-- Container -->
<script>
$(document).ready(function(){
 
$('[data-toggle="popover"]').popover(); 
  
}); 
</script>	
</body>
</html>