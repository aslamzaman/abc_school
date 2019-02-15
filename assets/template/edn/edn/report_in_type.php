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
					<table width=100%>
						<tr>
							<td style="width:50%;">
								<div class="form-group">
									<label for="session">Session:</label>
									<select class="form-control" id="session" name="session"><?php 
										echo combox("SELECT `session_name` FROM `list_session` ORDER BY `session_name`",'2025'); ?>
									</select>						
								</div>
							</td>	
							<td style="width:50%;">							
								<div class="form-group">
									<label for="tpy">Physical Type:</label>
									<select class="form-control" id="tpy" name="tpy"><?php 
										echo combox1("SELECT `situationtype_id`, `situationtype` FROM `list_situationtype` ORDER BY `situationtype`",'4'); ?>
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
	$("#session, #tpy" ).change(function(){
	//----------------------------------------
		var session= $("#session").val();
		var tpy= $("#tpy").val();	
		$.ajax({
		type: "POST",
		url: "report_in_type_code.php",
		data: {session1:session,tpy1:tpy}
		})
		.done(function(msg) {
			$("#display").html(msg);			

		});

	//-----------------------------------	
	});			
}); 
</script>
<?php include "footer.php"; ?>