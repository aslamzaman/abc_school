<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//======================================================
$id=$_GET["id"];
$result=mysqli_query($conn, "SELECT * FROM `db_fees_setting` WHERE `fees_id` = $id LIMIT 1");
$rows=mysqli_fetch_array($result);
 ?>
<div class="col-sm-12">
<?php echo $school;?>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Student Fees Setting</h2>	
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
						<form class="form-horizontal" role="form" action="fees_setting_edit_code.php" method="post" id="frmedit">
							<INPUT type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
							
							<div class="form-group">
								<label for="session">Session:</label>
								<select class="form-control" id="session" name="session"><?php 
									$session = $rows["fees_session"];
									echo combox("SELECT `session_name` FROM `list_session` ORDER BY `session_name`",$session); ?>
								</select>						
							</div>
							<div class="form-group">
								<label for="class1">Class:</label>
								<select class="form-control" id="class1" name="class1"><?php 
									$clss = $rows["fees_class"];
									echo combox1("SELECT `class_id`, `class_name` FROM `list_class`",$clss); ?>
								</select>						
							</div>									
							<div class="form-group">
								<label for="fees">Fees:</label>
								<INPUT type="text" class="form-control" id="fees" name="fees" value="<?php echo $rows["fees"];?>"  placeholder="Maximum 8 digit"  maxlength="8">						
							</div>
						</form>
					</div>	
				</div>
				<div  class="panel-footer">
					<a class="btn btn-default" href="#" id="cmdsave">Save</a>
					<a class="btn btn-default" href="fees_setting_view.php">Cancel</a>
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
			$("#frmedit").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>