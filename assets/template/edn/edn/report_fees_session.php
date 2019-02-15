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
									<label for="session">Session:</label>
									<select class="form-control" id="session" name="session"><?php 
										$session = '2015';
										echo combox("SELECT `session_name` FROM `list_session` ORDER BY `session_name`",$session); ?>
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
	$("#session" ).change(function(){
	//----------------------------------------
		var sessionx= $("#session").val();
		$.ajax({
		type: "POST",
		url: "report_fees_session_code.php",
		data: {session:sessionx}
		})
		.done(function(msg) {
			$("#display").html(msg);			

		});

	//-----------------------------------	
	});			
}); 
</script>
<?php include "footer.php"; ?>