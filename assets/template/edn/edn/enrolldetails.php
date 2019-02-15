<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$id = $_GET["id"];

$result=mysqli_query($conn, "SELECT * FROM `db_student` WHERE `student_id` = $id LIMIT 1");
$rows=mysqli_fetch_array($result);

?>
<div class="col-sm-12">
<?php echo $school;?>


					<ul class="pager">
						<li class="previous"><a href="enrollview.php">Cancel</a></li>					
						<li class="next"><a href="#" id="cmdPrint">Print</a></li>
					</ul>
			<div class="panel panel-default" id="prnt">
				<div class="panel-heading"></div>	
				<div  class="panel-body">
					<h3 id="top1" class="text-center"><i><u>Student Details</u></i></h3>
					<p>&nbsp;</p>
					<h4 id="top2" class="text-center"><?php echo $rows["idcard"].": ".$rows["student_name"];?></h4>
					<div  class="table-responsive" id="tbl">						
							<table class="table table-condensed">
								<tbody>
									<tr>
										<td id="wdth40">Fathers Name</td><td id="wdth60"><?php echo $rows["father_name"];?></td>
									</tr>
									<tr>
										<td id="wdth40">Sex</td><td id="wdth60"><?php
											$psex = myfield("SELECT `sex_name` FROM `list_sex` WHERE `sex_id` = " . $rows["sex_id"]); echo $psex;
											?>
										</td>
									</tr>
									<tr>
										<td id="wdth40">Birth Date</td><td id="wdth60"><?php echo my_date_dot($rows["bdate"]);?></td>
									</tr>									
									<tr>
										<td id="wdth40">Mobile</td><td id="wdth60"><?php echo $rows["mobile"];?></td>
									</tr>
									<tr>
										<td id="wdth40">Situation Type</td><td id="wdth60"><?php
											$situationtype=myfield("SELECT `situationtype` FROM `list_situationtype` WHERE `situationtype_id` = " . $rows["situationtype_id"]); echo $situationtype;
											?>
										</td>
									</tr>							
								
									<tr>
										<td id="wdth40">Fathers Income</td><td id="wdth60"><?php echo $rows["income"];?></td>
									</tr>
								
									<tr>
										<td id="wdth40">Fathers Occupation</td><td id="wdth60"><?php
											$occupation=myfield("SELECT `occupation_name` FROM `list_occupation` WHERE `occupation_id` = " . $rows["occupation_id"]); echo $occupation;
											?>
										</td>
									</tr>
									<tr>
										<td id="wdth40">Address</td><td id="wdth60"><?php echo $rows["address"];?></td>
									</tr>
									<tr>
										<td id="wdth40">Admited Class</td><td id="wdth60"><?php
											$location=myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = " . $rows["class_id_pres"]); echo $location;
											?>
										</td>
									</tr>
									<tr>
										<td id="wdth40">Session</td><td id="wdth60"><?php echo $rows["session"];?></td>
									</tr>
									<tr>
										<td id="wdth40">Remarks</td><td id="wdth60"><?php echo $rows["remarks"];?></td>
									</tr>
								</tbody>
							</table>
					</div>
				</div>
				<div  class="panel-footer"></div>				
			</div>		
</div>
<script>
$(document).ready(function(){						
	$("#cmdPrint").click(function() {
		var divhead= "<?php echo $school;?><hr>";
		var divtop = $("#tbl").html();	
	
			var printWindow = window.open('', '', 'height=400,width=800');		
            printWindow.document.write("<!DOCTYPE html><html><head><title>Student Enrollment</title>");
			
			printWindow.document.write('<style>');			
			printWindow.document.write('table{width:100%;}table, th,td{border: 1px solid #cccccc;border-collapse: collapse;}');			
			printWindow.document.write('#x{margin-top:50px;margin-left:50px;margin-right:15px;}#cntr{text-align:center;}#wdth40{width:40%;}#wdth60{width:60%;}');
			
			printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
			printWindow.document.write('<div id=x>');
			printWindow.document.write(divhead);
			printWindow.document.write("<h4 id='cntr'><u>Student Informations</u><br><small><?php echo "Print Date: ". my_date_dot(date("Y-m-d"));?></small></h4>");
			printWindow.document.write("<h4><?php echo $rows["idcard"].": ".$rows["student_name"];?></h4>");			
			printWindow.document.write(divtop);
			
			printWindow.document.write('</div>');
            printWindow.document.write('</body></html>');
			printWindow.document.close();
            printWindow.focus();
            printWindow.print();
			printWindow.close();
		
			
	});
}); 
</script>
<?php include "footer.php"; ?>