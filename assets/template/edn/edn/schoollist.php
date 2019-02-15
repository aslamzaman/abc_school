<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php"; ?>
<div class="col-sm-2"></div>
<div class="col-sm-8">

			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>School List</h2>
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
						<form class="form-horizontal" role="form" action="schoollistcode.php" method="post" id="frmadd">
							<div class="form-group">
								<label for="schoolname">School Name:</label>
								<INPUT type="text" class="form-control" id="schoolname" name="schoolname" value=""  placeholder="Maximum 30 digit"  maxlength="30">						
							</div>
							<div class="form-group">
								<label for="address">School Address:</label>
								<INPUT type="text" class="form-control" id="address" name="address" value=""  placeholder="Maximum 50 digit"  maxlength="50">						
							</div>
						</form>						
					</div>
					
				</div>
				<div  class="panel-footer"><a class="btn btn-default" href="#" id="cmdsave">Save</a></div>				
			</div>		
</div>
<div class="col-sm-2"></div>
<script>
$(document).ready(function(){
	$("#cmdsave" ).click(function(){
	//----------------------------------------		
		
		if($("#schoolname").val() == ""){alert("Please write school name"); return false;};
		if($("#address").val() == ""){alert("Please write address"); return false;};
		if (confirm("Are u sure?")==true){
			$("#frmadd").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>