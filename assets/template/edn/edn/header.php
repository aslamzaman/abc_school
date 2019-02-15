<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="pic/logo.ico"> 
	<title>Student Enrollment</title>
	<meta name="Description" content="free student enrollment, student database, student information sheet">
	<meta name="Keywords" content="free student enrollment, student database, student information sheet, free online database, free online mysql database, mysql online database, high school story database">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
    padding:5px; 
} 
#wdth40{
width:40%;
}
#wdth60{
width:60%;
}
</style>
</head>
<body>
<div  class="container">
	<div class="row">
		<div class="col-sm-1"></div>
		<div class="col-sm-10">
			<div class="row">
			
				<div class="col-sm-12">		
					<img src="pic/banner.png" alt="school banner" class="img-responsive" width="100%">				
					<nav class="navbar navbar-inverse navbar-static-top marginBottom-0" role="navigation">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						  <a class="navbar-brand" href="home.php">Home</a>
						</div>
						
						<div class="collapse navbar-collapse" id="navbar-collapse-1">
							<ul class="nav navbar-nav">
								
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Database <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="enrollview.php">Students Enrollment</a></li>
										<li><a href="attendance_list.php">Students Attendance</a></li>
										<li><a href="fees_views.php">Students Fee</a></li>
										<li><a href="addmission_result_views.php">Admission Test Result</a></li>
										<li><a href="question_view.php">Question Bank</a></li>																																													       										
									</ul>
								</li>									
									
								<!-- xxxxxxxxxxxxxxxxxxxxxxxxx -->					
								<li class="dropdown" id="cmdreport"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="report_all_mf.php">Student Full Session</a></li>
										<li><a href="report_in_class.php">Student In Class</a></li>
										<li><a href="report_in_type.php">Student Physical Type</a></li>											
										<li class="divider"></li>	
										<li><a href="report_atten_in_class.php">Attendance In Class</a></li>
										<li><a href="report_atten_individual.php">Attendance Individual Student</a></li>
										<li class="divider"></li>
										<li><a href="report_fees_individual.php">Individual Fees</a></li>
										<li><a href="report_fees_session.php">Session Fees</a></li>
										<li class="divider"></li>
										<li><a href="report_addmission_result.php">Admission Test Result Sheet</a></li>
										<li class="divider"></li>
										<li><a href="report_question_banks.php">Question Banks</a></li>
										<li><a href="report_question_banks_all.php">Question Bank - All</a></li>										
									</ul>
								</li>					
								<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li id="accounts"><a href="use_edit.php">Accounts Settings</a></li>
										<li><a href="fees_setting_view.php">Fees Settings</a></li>										
									</ul>
								</li>
								<li><a href="comments.php">Comments</a></li>								
								<li><a href="../index.php">Logout</a></li>
							</ul>
						</div><!-- /.navbar-collapse -->
						<?php include "social.php"; ?>		
					</nav><!-- /.navbar -->
				</div>

<script>
$(document).ready(function(){
	$("#cmdreport" ).click(function(){
	//----------------------------------------	
	var rest = "<?php echo $_SESSION["restricted"] ?>";
		if(rest == 1){alert("Your session period had ended !"); return false;};
	});
	$("#accounts" ).click(function(){
	//----------------------------------------	
	var rest = "<?php echo $_SESSION["user_id"] ?>";
		if(rest == 1){alert("Demo page accounts protected !"); return false;};
	});
	
	
}); 
</script>