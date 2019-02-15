<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id = $_SESSION["user_id"];
$school = $_SESSION["school_name"];
//======================================================
$result=mysqli_query($conn, "SELECT * FROM `pw_user` WHERE `user_id` = $user_id LIMIT 1");
$rows=mysqli_fetch_array($result);
 ?>
<div class="col-sm-12">
<?php echo $school;?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Student List Edit</h2>	
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
						<form class="form-horizontal" role="form" action="user_editcode.php" method="post" id="frmedit">
								<div class="form-group">
									<label for="school1">School Name:</label>
									<INPUT type="text" class="form-control" id="school1" name="school1" value="<?php echo $rows["school_name"];?>"  placeholder="Maximum 50 digit"  maxlength="50">						
								</div>
								<div class="form-group">
									<label for="address">School Address:</label>
									<INPUT type="text" class="form-control" id="address" name="address" value="<?php echo $rows["address"];?>"  placeholder="Maximum 100 digit"  maxlength="100">						
								</div>							
		
								<div class="form-group">
									<label for="mobile">Mobile Or Email:</label>
									<INPUT type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $rows["user"];?>"  placeholder="Mobile Or Email"  maxlength="30">						
								</div>
								<div class="form-group">
									<label for="pw">Existing Password:</label>
									<INPUT type="password" class="form-control" id="pw" name="pw" value=""  placeholder="Password"  maxlength="30">						
								</div>
								<div class="form-group">
									<label for="npw">New Password:</label>
									<INPUT type="password" class="form-control" id="npw" name="npw" value=""  placeholder="Password"  maxlength="30">						
								</div>								
						</form>
					</div>	
				</div>
				<div  class="panel-footer">
					<a class="btn btn-default" href="#" id="cmdsave">Save</a>
					<a class="btn btn-default" href="enrollview.php">Cancel</a>						
				</div>
			
			</div>		
</div>
<script>
$(document).ready(function(){
	$("#cmdsave" ).click(function(){
	//----------------------------------------		

		if($("#school").val() == ""){alert("Please write school name"); return false;};
		if($("#address").val() == ""){alert("Please write school address"); return false;};			
		if($("#mobile").val() == ""){alert("Please write user name mobile or email"); return false;};	
		if($("#pw").val() == ""){alert("Please write password"); return false;};
		if($("#npw").val() == ""){alert("Please write new password"); return false;};
		
		if (confirm("Are u sure?")==true){
			$("#frmedit").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>