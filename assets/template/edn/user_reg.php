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
<body>
    <div class="container-fluid">
		<div class="row" style="margin-top:50px;">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<h1 class="text-center"><small><u>FREE STUDENT ENROLLMENT</u></small></h1>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Registrations</h2>	
					</div>	
					<div  class="panel-body">
						<div class="col-sm-12">
							<form class="form-horizontal" role="form" action="user_reg_code.php" method="post" id="frmadd">
								<div class="form-group">
									<label for="school">School Name:</label>
									<INPUT type="text" class="form-control" id="school" name="school" value=""  placeholder="Maximum 50 digit"  maxlength="50">						
								</div>
								<div class="form-group">
									<label for="address">School Address:</label>
									<INPUT type="text" class="form-control" id="address" name="address" value=""  placeholder="Maximum 100 digit"  maxlength="100">						
								</div>							
		
								<div class="form-group">
									<label for="mobile">Mobile Or Email:</label>
									<INPUT type="text" class="form-control" id="mobile" name="mobile" value=""  placeholder="Mobile Or Email"  maxlength="30">						
								</div>
								<div class="form-group">
									<label for="pw">Password:</label>
									<INPUT type="password" class="form-control" id="pw" name="pw" value=""  placeholder="Password"  maxlength="30">						
								</div>
							</form>
						</div>
					</div>		
					<div  class="panel-footer">
						<a class="btn btn-default" href="#" id="cmdsave">Save</a>
						<a class="btn btn-default" href="index.php">Cancel</a>					
					</div>	
				</div><!-- Panel -->				
			</div><!-- col-2 -->	
			<div class="col-sm-3"></div><!-- col-3 -->				
		</div><!-- Row -->
	</div> <!-- Container -->>
<script>
$(document).ready(function(){
	$("#cmdsave" ).click(function(){
	//----------------------------------------	
		if($("#school").val() == ""){alert("Please write school name"); return false;};
		if($("#address").val() == ""){alert("Please write address name"); return false;};
		if($("#mobile").val() == ""){alert("Please write mobile number"); return false;};
		if($("#pw").val() == ""){alert("Please write password"); return false;};	
		
		if (confirm("Are u sure?")==true){
			$("#frmadd").submit();
		};
	//-----------------------------------	
	});
}); 
</script>	
</body>
</html>