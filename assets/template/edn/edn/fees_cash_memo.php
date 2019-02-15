<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$id = $_GET["id"];

$result=mysqli_query($conn, "SELECT * FROM `db_fees` WHERE `fees_id` = $id LIMIT 1");
$rows=mysqli_fetch_array($result);
$stid=$rows["student_id"];

$result_std=mysqli_query($conn, "SELECT * FROM `db_student` WHERE `student_id` = $stid LIMIT 1");
$rows_std=mysqli_fetch_array($result_std);

$sidcard= $rows_std["idcard"];
$sname= $rows_std["student_name"];
$sfathername= $rows_std["father_name"];
$sess= $rows_std["session"];

$sclass= $rows_std["class_id_pres"];
$sclass_name = myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = $sclass LIMIT 1");


$fs_dt = $rows["fees_dt"];
$fs_cash = $rows["fees"];
?>
<div class="col-sm-12">
<?php echo $school;?>


					<ul class="pager">
						<li class="previous"><a href="fees_views.php">Cancel</a></li>					
						<li class="next"><a href="#" id="cmdPrint">Print</a></li>
					</ul>
			<div class="panel panel-default" id="prnt">
				<div class="panel-heading"></div>	
				<div  class="panel-body">
					<h3 id="top1" class="text-center"><i><u>Cash Memo</u></i></h3>
					<p>&nbsp;</p>
					<p class="text-center" id="cntr"><?php echo "Session: $sess, Class: $sclass_name"; ?>
					<br><?php $dts=my_date_dot(date("Y-m-d")); echo "Date: $dts"; ?></p>
					
					<p id="lft"><strong><?php echo "$sidcard. $sname"; ?></strong>
					<br>Father Name: <?php echo "$sfathername"; ?></p>
					<div  class="table-responsive" id="tbl">						
					<table class="table table-condensed">
						<thead>
							<tr>
								<th id="wdth60">Date</th>								
								<th  id="wdth40">Cash</th>
							</tr>
						</thead>						
						<tbody>
							<tr>
								<td id="wdth60"><?php echo my_date_dot($fs_dt);?></td><td id="wdth40"><?php echo "$fs_cash";?></td>
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
		var divhead = "<?php echo $school;?><hr>";
		var divsubject1 = $("#prnt").html();
			var printWindow = window.open('', '', 'height=400,width=800');		
            printWindow.document.write("<!DOCTYPE html><html><head><title>Student Enrollment</title>");
			
			printWindow.document.write('<style>');			
			printWindow.document.write('table{width:100%;}table, th,td{border: 1px solid #cccccc;border-collapse: collapse;}');			
			printWindow.document.write('#x{margin-top:50px;margin-left:50px;margin-right:15px;}#cntr{text-align:center;}#top1{text-align:center;}#wdth40{text-align:center;}#wdth60{text-align:left;}');
			
			printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
			printWindow.document.write('<div id=x>');
			printWindow.document.write(divhead);
			printWindow.document.write(divsubject1);
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