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
					<h2>Student Fees</h2>
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
						<form class="form-horizontal" role="form" action="fees_code.php" method="post" id="frmadd">
							<div class="form-group">
								<label for="d1">Date:</label>
								<?php $dttoday=date("Y-m-d"); echo datepickerA($dttoday);?>		
							</div>											
							<div class="form-group">
								<label for="stdid">Student:</label>
								<select class="form-control" id="stdid" name="stdid"><?php 
									echo combox3("SELECT `student_id`, `idcard`, `student_name`, `father_name` FROM `db_student` WHERE `user_id`= $user_id ORDER BY idcard",1001); ?>
								</select>						
							</div>
							<div class="form-group">
								<label for="fees">Fees:</label>
								<INPUT type="text" class="form-control" id="fees" name="fees" value=""  placeholder="Maximum 8 digit"  maxlength="8">						
							</div>
						</form>
					</div>	
				</div>
				<div  class="panel-footer">
					<a class="btn btn-default" href="#" id="cmdsave">Save</a>
					<a class="btn btn-default" href="fees_views.php">Cancel</a>
				</div>				
			</div>		
</div>
<script>
$(document).ready(function(){
	$("#cmdsave" ).click(function(){
	//----------------------------------------	
		if($("#fees").val() == ""){alert("Please write fees"); return false;};	
		if($.isNumeric($("#fees").val())== false){alert("Please write fees in numeric."); return false;};
		
		if (confirm("Are u sure?")==true){
			$("#frmadd").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>