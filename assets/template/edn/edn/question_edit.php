<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//======================================================
$id=$_GET["id"];
$result=mysqli_query($conn, "SELECT * FROM `question_bank` WHERE `question_id` = $id LIMIT 1");
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
						<form class="form-horizontal" role="form" action="question_editcode.php" method="post" id="frmedit">
							<INPUT type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
							<div class="form-group">
								<label for="clas">Class:</label>
								<select class="form-control" id="clas" name="clas"><?php 
									$stclas=$rows["question_class"];
									echo combox1("SELECT `class_id`, `class_name` FROM `list_class`",$stclas); ?>
								</select>						
							</div>		
							<div class="form-group">
								<label for="subj">Subject:</label>
								<select class="form-control" id="subj" name="subj"><?php 
									$stsubject=$rows["question_subject"];									
									echo combox1("SELECT `subject_id`, `subject_name` FROM list_subject",$stsubject); ?>
								</select>						
							</div>		
							
							<div class="form-group">
								<label for="quest">Question:</label>
								<INPUT type="text" class="form-control" id="quest" name="quest" value="<?php echo $rows["question"];?>"  placeholder="Maximum 100 digit"  maxlength="100">						
							</div>	
						</form>
					</div>	
				</div>
				<div  class="panel-footer">
					<a class="btn btn-default" href="#" id="cmdsave">Save</a>
					<a class="btn btn-default" href="question_view.php">Cancel</a>						
				</div>
			
			</div>		
</div>
<script>
$(document).ready(function(){
	$("#cmdsave" ).click(function(){
	//----------------------------------------		
		if($("#quest").val() == ""){alert("Please write question"); return false;};
		if (confirm("Are u sure?")==true){
			$("#frmedit").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>