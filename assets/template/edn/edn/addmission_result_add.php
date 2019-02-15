<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
 ?>

<div class="col-sm-12">
<?php echo $school;?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Admission Test Result Sheet Add</h2>
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
						<form class="form-horizontal" role="form" action="addmission_result_add_code.php" method="post" id="frmadd">
							<div class="form-group">
								<label for="session">Session:</label>
								<select class="form-control" id="session" name="session"><?php 
									$session=date(Y);
									echo combox("SELECT `session_name` FROM `list_session` ORDER BY `session_name`",$session); ?>
								</select>						
							</div>
							<div class="form-group">
								<label for="admittedclass">Class:</label>
								<select class="form-control" id="admittedclass" name="admittedclass"><?php 
									echo combox1("SELECT `class_id`, `class_name` FROM `list_class`",1); ?>
								</select>						
							</div>	
							
							<div class="form-group">
								<label for="stdname">Student Name:</label>
								<INPUT type="text" class="form-control" id="stdname" name="stdname" value=""  placeholder="Maximum 30 digit"  maxlength="30">						
							</div>
							<div class="form-group">
								<label for="fname">Fathers Name:</label>
								<INPUT type="text" class="form-control" id="fname" name="fname" value=""  placeholder="Maximum 30 digit"  maxlength="30">						
							</div>
							<table width="100%">
								<tr>
									<td><strong>Written</strong></td>
									<td><strong>Practical</strong></td>	
									<td><strong>Oral</strong></td>
									<td><strong>Other</strong></td>									
								</tr>
								<tr>
									<td>
										<INPUT type="text" class="form-control" id="written" name="written" value=""  placeholder="Max 3 digit"  maxlength="3">						
									</td>
									<td>
										<INPUT type="text" class="form-control" id="Practical" name="Practical" value=""  placeholder="Max 3 digit"  maxlength="3">						
									</td>	
									<td>
										<INPUT type="text" class="form-control" id="Oral" name="Oral" value=""  placeholder="Max 3 digit"  maxlength="3">						
									</td>
									<td>
										<INPUT type="text" class="form-control" id="Other" name="Other" value=""  placeholder="Max3 digit"  maxlength="3">						
									</td>									
								</tr>										
							</table>
						</form>
					</div>	
				</div>
				<div  class="panel-footer">
					<a class="btn btn-default" href="#" id="cmdsave">Save</a>
					<a class="btn btn-default" href="addmission_result_views.php">Cancel</a>					
				</div>				
			</div>		
</div>
<script>
$(document).ready(function(){
	$("#cmdsave" ).click(function(){
	//----------------------------------------	
		if($("#stdname").val() == ""){alert("Please write student name"); return false;};
		if($("#fname").val() == ""){alert("Please write student fathers name"); return false;};	
		
		if($("#written").val() == ""){alert("Please write written value"); return false;};	
		if($.isNumeric($("#written").val())== false){alert("Please write written value in numeric."); return false;};
		
		if($("#Practical").val() == ""){alert("Please write practical value"); return false;};	
		if($.isNumeric($("#Practical").val())== false){alert("Please write practical value in numeric."); return false;};
	
		if($("#Oral").val() == ""){alert("Please write oral value"); return false;};	
		if($.isNumeric($("#Oral").val())== false){alert("Please write oral value in numeric."); return false;};
	
		if($("#Other").val() == ""){alert("Please write other value"); return false;};	
		if($.isNumeric($("#Other").val())== false){alert("Please write other value in numeric."); return false;};

		
		if (confirm("Are u sure?")==true){
			$("#frmadd").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>