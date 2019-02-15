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
<h3 class="text-center">Attendance Individuals</h3>
</div>
<div class="col-sm-12">
			<div class="panel panel-default" id="prnt">
				<div class="panel-heading">
						<table width="100%">
							<tr>
								<td colspan="2" style="width:100%;">
									<div class="form-group">
									    <label for="d1">Date:</label>
										<?php $dttoday=date("2016-01-01"); $dttoday1=date("Y-m-d"); echo datepickerTo($dttoday,$dttoday1);?>							
									</div>
								</td>	
							</tr>						
							<tr>
								<td id="wdth60">
									<div class="form-group">
									    <label for="stdid">Student Id:</label>									
										<input type="text"  class="form-control" id="stdid" name="stdid" value="" placeholder="Student Id" maxlength="5">			
									</div>
								</td>								
								<td id="wdth40">
									<div class="form-group">
									    <label for="show">&nbsp;</label>											
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
		if($("#stdid").val() == ""){alert("Please write student id"); return false;};	
		if($.isNumeric($("#stdid").val())== false){alert("Please write student id n numeric."); return false;};
	
		var stdid= $("#stdid").val();
		var class1= $("#class1").val();	
		var dt1= $("#y1").val() + "-" + $("#m1").val() + "-" + $("#d1").val();			
		var dt2= $("#y2").val() + "-" + $("#m2").val() + "-" + $("#d2").val();			
		$.ajax({
		type: "POST",
		url: "report_atten_individual_ajax.php",
		data: {stdid:stdid,dta:dt1,dtb:dt2}
		})
		.done(function(msg) {
			$("#display").html(msg);			
		});
	//-----------------------------------	
	});
	
}); 
</script>

<?php include "footer.php"; ?>





