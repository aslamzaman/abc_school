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
<style>
h1 {
    font-size: 60px;
}
</style>
</head>
<body)>
    <div class="container-fluid">
		<div class="row" style="margin-top:50px;">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
			<h1 class="text-center"><small><u>FREE STUDENT ENROLLMENT</u></small></h1>
				<div class="well" style="margin-top:70px;">
					<h3>Demo Instractions</h3>
					<p>
						<kbd>This websit is free whole session. Please registration and enjoy it.</kbd>
					</p>
<p>&nbsp;</p>				
					<p>If you interest to tracking without registration follow the instraction:
					</p>
					<p>
						- All of students data, phone numbers, address, etc. are use as fack only for tracking the demo page.
						<br>- session '2016', class 'play'.
						<br>- User name: 11 and password: 11
					</p>
<ul class="pager">
    <li class="next"><a href="index.php">Cancel</a></li>
</ul>
			
				</div><!-- well -->	
				
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
		</div><!-- Row -->
	</div> <!-- Container -->
<script>
$(document).ready(function(){
  $("#cmdsubmit").click(function(){
//---------------------------------------- 
	if ($("#user").val()==""){alert("Please write user id"); return false;};
	if ($("#pw").val()==""){alert("Please write password"); return false;};	
	$("#logform").submit();
//-----------------------------------	
  });

$('[data-toggle="popover"]').popover();   
  
}); 
</script>	
</body>
</html>