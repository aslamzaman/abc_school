<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$idcard="";
		$grx = myfield("SELECT `idcard` FROM `db_student` WHERE `user_id` = $user_id order by `idcard` desc");	
	
		if ($grx == "")
		{
			$idcard=1001;
		}
		else
		{
			$idcard=$grx +1;
		};
 ?>

<div class="col-sm-12">
<?php echo $school;?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Student Enrollment</h2>
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
						<form class="form-horizontal" role="form" action="enrollcode.php" method="post" id="frmadd">
							<div class="form-group">
								<label for="idcard">Student Id (Auto):</label>
								<INPUT type="text" class="form-control" id="idcard" name="idcard" value="<?php echo $idcard;?>"  placeholder="Maximum 30 digit"  maxlength="30" readonly>						
							</div>								
							<div class="form-group">
								<label for="session">Session:</label>
								<select class="form-control" id="session" name="session"><?php 
									$session=date(Y);
									echo combox("SELECT `session_name` FROM `list_session` ORDER BY `session_name`",$session); ?>
								</select>						
							</div>
							<div class="form-group">
								<label for="stdname">Student Name:</label>
								<INPUT type="text" class="form-control" id="stdname" name="stdname" value=""  placeholder="Maximum 30 digit"  maxlength="30">						
							</div>
							<div class="form-group">
								<label for="fname">Fathers Name:</label>
								<INPUT type="text" class="form-control" id="fname" name="fname" value=""  placeholder="Maximum 30 digit"  maxlength="30">						
							</div>
							<div class="form-group">
								<label for="income">Fathers Income:</label>
								<INPUT type="text" class="form-control" id="income" name="income" value=""  placeholder="Maximum 30 digit"  maxlength="30">						
							</div>
							<div class="form-group">
								<label for="address">Present Address:</label>
								<INPUT type="text" class="form-control" id="address" name="address" value=""  placeholder="Maximum 50 digit"  maxlength="50">						
							</div>
							<div class="form-group">
								<label for="mobile">Mobile:</label>
								<INPUT type="text" class="form-control" id="mobile" name="mobile" value=""  placeholder="Maximum 15 digit"  maxlength="15">						
							</div>				
							<div class="form-group">
								<label for="d1">Birth Date:</label>
								<?php $dttoday=date("Y-m-d"); echo datepickerA($dttoday);?>		
							</div>							
							<div class="form-group">
								<label for="sex">Sex:</label>
								<select class="form-control" id="sex" name="sex"><?php 
									echo combox1("SELECT `sex_id`, `sex_name` FROM `list_sex` ORDER BY `sex_name`",1); ?>
								</select>						
							</div>
						
							<div class="form-group">
								<label for="occupation">Fathers Occupation:</label>
								<select class="form-control" id="occupation" name="occupation"><?php 
									echo combox1("SELECT `occupation_id`, `occupation_name` FROM `list_occupation` ORDER BY `occupation_name`",1); ?>
								</select>						
							</div>	
							<div class="form-group">
								<label for="situationtype">Physical Type:</label>
								<select class="form-control" id="situationtype" name="situationtype"><?php 
									echo combox1("SELECT `situationtype_id`, `situationtype` FROM `list_situationtype` ORDER BY `situationtype`",1); ?>
								</select>						
							</div>
							<div class="form-group">
								<label for="admittedclass">Admitted Class:</label>
								<select class="form-control" id="admittedclass" name="admittedclass"><?php 
									echo combox1("SELECT `class_id`, `class_name` FROM `list_class`",1); ?>
								</select>						
							</div>		
							<div class="form-group">
								<label for="remarks">Remarks:</label>
								<INPUT type="text" class="form-control" id="remarks" name="remarks" value=""  placeholder="Maximum 100 digit"  maxlength="100">						
							</div>							
						</form>
					</div>	
				</div>
				<div  class="panel-footer">
					<a class="btn btn-default" href="#" id="cmdsave">Save</a>
					<a class="btn btn-default" href="enrollview.php">Cancel</a>					
				</div>				
			</div>		
</div>
<script>
$(document).ready(function(){
	$("#cmdsave" ).click(function(){
	//----------------------------------------	
		if($("#stdname").val() == ""){alert("Please write student name"); return false;};
		if($("#fname").val() == ""){alert("Please write student fathers name"); return false;};	
		
		if($("#income").val() == ""){alert("Please write fathers income"); return false;};	
		if($.isNumeric($("#income").val())== false){alert("Please write fathers income in numeric."); return false;};
		
	
		if($("#address").val() == ""){alert("Please write address name"); return false;};
		if($("#mobile").val() == ""){alert("Please write mobile number"); return false;};

		
		if (confirm("Are u sure?")==true){
			$("#frmadd").submit();
		};
	//-----------------------------------	
	});
}); 
</script>
<?php include "footer.php"; ?>