<?php
session_start();
include "conn.php";
$unit_id = $_SESSION["unit_id"];
$project_id = $_SESSION["project_id"];
//$restricted = $_SESSION["restricted"];
//$prjname=myfield("SELECT project_name FROM list_project WHERE project_id = $project_id");
//$untname=myfield("SELECT unit_name FROM list_unit WHERE unit_id = $unit_id");
//================================================================
$schoolname = $_POST["schoolname"];
$address= $_POST["address"];

$str="";
		$sql = "INSERT INTO list_school ".
		"(`school_id`, `unit_id`, `project_id`, `name`, `address`) ".
		 "VALUES ('' ,$unit_id  , $project_id  , '$schoolname','$address')";
			
			if (mysqli_query($conn, $sql))
			{
					$str="Save Successfully";
			}
			else
			{
					$str= "Save Error !!";
			};

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="pic/logo.ico"> 
	<title>Enrollment Disabled Students</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
		<div class="row" style="margin-top:50px;">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="well text-center">
					<p class="lead"><?php echo $str; ?></p>
					<div class="btn-group">
						<a href="schoolview.php"  class="btn btn-default">Close</a>
					</div>
				</div>
			</div><!-- col-2 -->	
			<div class="col-sm-4"></div><!-- col-3 -->				
		</div><!-- Row -->
	</div> <!-- Container -->
</body>
</html>