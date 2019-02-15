<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
?>
<div class="col-sm-12" id="divhead"><?php echo $school;?></div>
<div class="col-sm-12">
			<div class="panel panel-default" id="prnt">
				<div class="panel-heading">
					<h2 class="text-center">Question Bank</h2>
					<table width=100%>
						<tr>
							<td style="width:50%;">
								<div class="form-group">
									<label for="clss">Class:</label>
									<select class="form-control" id="clss" name="clss"><?php 
										echo combox1("SELECT `class_id`, `class_name` FROM `list_class`",'15'); ?>
									</select>						
								</div>
							</td>	
							<td style="width:50%;">							
								<div class="form-group">
									<label for="subj">Subject:</label>
									<select class="form-control" id="subj" name="subj"><?php 
										echo combox1("SELECT `subject_id`, `subject_name` FROM list_subject",4); ?>
									</select>						
								</div>		
							</td>							
						</tr>							
					</table>			
				</div>	
				<div  class="panel-body" id="display">
				
				</div>
				<div  class="panel-footer"></div>				
			</div>		

			
</div>

<script>
$(document).ready(function(){
//====================================================================
	$("#clss, #subj" ).change(function(){
	//----------------------------------------
		var subj= $("#subj").val();
		var clss= $("#clss").val();	
		$.ajax({
		type: "POST",
		url: "report_question_banks_code.php",
		data: {clss1:clss,subj1:subj}
		})
		.done(function(msg) {
			$("#display").html(msg);			

		});

	//-----------------------------------	
	});			
}); 
</script>
<?php include "footer.php"; ?>