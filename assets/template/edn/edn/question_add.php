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
					<h2>Question Bank</h2>
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
						<form class="form-horizontal" role="form" action="question_code.php" method="post" id="frmadd">
							<div class="form-group">
								<label for="clas">Class:</label>
								<select class="form-control" id="clas" name="clas"><?php 
									echo combox1("SELECT `class_id`, `class_name` FROM `list_class`",1); ?>
								</select>						
							</div>		
							<div class="form-group">
								<label for="subj">Subject:</label>
								<select class="form-control" id="subj" name="subj"><?php 
									echo combox1("SELECT `subject_id`, `subject_name` FROM list_subject",1); ?>
								</select>						
							</div>		
							
							<div class="form-group">
								<label for="quest">Question:</label>
								<INPUT type="text" class="form-control" id="quest" name="quest" value=""  placeholder="Maximum 100 digit"  maxlength="100">						
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
			$("#frmadd").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>