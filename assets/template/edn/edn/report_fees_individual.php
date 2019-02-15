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
					<table width="100%">
						<tr>
							<td>
								<div class="form-group">
									<label for="stdid">Student:</label>
									<select class="form-control" id="stdid" name="stdid"><?php 
										echo combox3("SELECT `student_id`, `idcard`, `student_name`, `father_name` FROM `db_student` WHERE `user_id`= $user_id ORDER BY idcard",1001); ?>
										<option value='0' selected>Please select student...</option>
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
	$("#stdid" ).change(function(){
	//----------------------------------------
		var stdidx= $("#stdid").val();
		$.ajax({
		type: "POST",
		url: "report_fees_individual_code.php",
		data: {stdid:stdidx}
		})
		.done(function(msg) {
			$("#display").html(msg);			

		});

	//-----------------------------------	
	});			
}); 
</script>
<?php include "footer.php"; ?>