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
					<h2 class="text-center">Admission Test Result Sheet</h2>
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
									<label for="clss">Class:</label>
									<select class="form-control" id="clss" name="clss"><?php 
										echo combox1("SELECT `class_id`, `class_name` FROM `list_class`",'1'); ?>
									</select>						
								</div>
							</td>							
						</tr>							
					</table>
					<table width=100%>
						<tr>
							<td style="width:34%;">
								<div class="form-group">
									<label for="asct">Sorting:</label>
									<select class="form-control" id="asct" name="asct">
										<option value="DESC" selected>Descending</option>
										<option value="ASC">Ascending</option>										
									</select>						
								</div>
							</td>	
							<td style="width:34%;">							
								<div class="form-group">
									<label for="topt">Top:</label>
									<INPUT type="text" class="form-control" id="topt" name="topt" value="10"  placeholder="Maximum 3 digit"  maxlength="3">
								</div>
							</td>	
							<td style="width:32%;">							
								<div class="form-group">
									<label for="btn">&nbsp;</label>
									<a class="btn btn-default btn-block" href="#" id="cmdshow">Show</a>						
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
	$("#cmdshow" ).click(function(){
	//----------------------------------------
	
		if($("#topt").val() == ""){alert("Please write top value"); return false;};	
		if($.isNumeric($("#topt").val())== false){alert("Please write top value in numeric."); return false;};
	
		var session= $("#session").val();
		var clss= $("#clss").val();	
		var asct= $("#asct").val();	
		var topt= $("#topt").val();			
		$.ajax({
		type: "POST",
		url: "report_addmission_result_code.php",
		data: {session1:session,clss1:clss,asct1:asct,topt1:topt}
		})
		.done(function(msg) {
			$("#display").html(msg);			

		});

	//-----------------------------------	
	});			
}); 
</script>
<?php include "footer.php"; ?>