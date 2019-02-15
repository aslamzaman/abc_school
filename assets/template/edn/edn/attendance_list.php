<?php 
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
?>
<div class="col-sm-12" id="divhead">
<?php echo $school;?>
<h3 class="text-center">Student Attendance</h3>
</div>
<div class="col-sm-12">
			<div class="panel panel-default" id="prnt">
				<div class="panel-heading">
						<table width="100%">
							<tr>
								<td id="wdth60">
									<div class="form-group">
									    <label for="d1">Date:</label>
										<?php $dttoday=date("Y-m-d"); echo datepickerA($dttoday);?>							
									</div>
								</td>	
								
								<td id="wdth40">
									<div class="form-group">
									    <label for="session">Session:</label>									
										<select class="form-control" id="session" name="session"><?php 
											echo combox("SELECT `session_name` FROM `list_session` ORDER BY `session_name`",'2025'); ?>
										</select>						
									</div>
								</td>	
							</tr>
							<tr>
								<td id="wdth60">
									<div class="form-group">
									    <label for="class1">Class:</label>										
										<select class="form-control" id="class1" name="class1"><?php 
											echo combox1("SELECT `class_id`, `class_name` FROM `list_class` ORDER BY `class_name`",'1'); ?>
										</select>						
									</div>								
								</td>
								<td id="wdth40">
									<div class="form-group">
									    <label for="class2">&nbsp;</label>											
										<a class="btn btn-default btn-block" href="#" id="show">Show</a>
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
	$("#show" ).click(function(){
	//----------------------------------------
		var session= $("#session").val();
		var class1= $("#class1").val();	
		var dt1= $("#y1").val() + "-" + $("#m1").val() + "-" + $("#d1").val();			
		
		$.ajax({
		type: "POST",
		url: "attendance_list_ajax.php",
		data: {session1:session,clas:class1,dt:dt1}
		})
		.done(function(msg) {
			$("#display").html(msg);			

		});
	//-----------------------------------	
	});
	
}); 
</script>

<?php include "footer.php"; ?>





