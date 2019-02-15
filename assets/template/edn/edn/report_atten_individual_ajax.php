<?php
session_start();
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================
$dt=$_POST["dta"];
$dt1=$_POST["dtb"];
$std = $_POST["stdid"];
?> 
<form class="form-horizontal" role="form" action="attendance_code.php" method="post" id="addform">

<?php
			$sql_std = "SELECT student_id FROM `db_student` WHERE idcard = $std AND user_id = $user_id ORDER BY student_id ASC";
			$result_std=mysqli_query($conn,$sql_std);
			$Numrows_std=mysqli_num_rows($result_std);
			if ($Numrows_std > 0)
			{
			
			
					echo "<ul class='pager'>\n";
					echo "<li class='next'><a href='#' id='cmdPrint1'>Print</a></li>\n";
					echo "</ul>\n";
					echo "<div  class='table-responsive' id='tbl'>\n";	
					echo "<table class='table table-bordered'>\n";
					echo "<thead>\n";
					echo "<th class='text-center' id='cnter'>ID</th>\n";
					echo "<th>Student Name</th>\n";
					echo "<th class='text-center' id='cnter'>Attendance</th>\n";											
					echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";	

			
				while ($rows_std=mysqli_fetch_array($result_std))
				{
					//---------------------------------------------------------
					$stdid = $rows_std["student_id"];
					$sql = "SELECT * FROM `db_student_attendance` WHERE `student_id`= $stdid AND atd_date BETWEEN '$dt' AND '$dt1'";
					$result=mysqli_query($conn,$sql);
					$Numrows=mysqli_num_rows($result);
						if ($Numrows > 0)
						{
							$x="";
							while ($rows=mysqli_fetch_array($result))
							{
								$x = $x + intval($rows["attendance"]);
							}
						}
						else
						{
						$x =0;
						}
					$stdidcard=myfield("SELECT idcard FROM `db_student` WHERE student_id =$stdid");
					$stdname=myfield("SELECT student_name FROM `db_student` WHERE student_id =$stdid");
					echo "<tr>\n";
					echo "<td class='text-center' id='cntr'>$stdidcard</td>";
					echo "<td>$stdname</td>";
					echo "<td class='text-center' id='cntr'>$x</td>";					
					echo "</tr>\n";						
					
					
				}

			}				

?>
								</tbody>
							</table>
						</div> <!-- table responsive -->
<input type="hidden" id="dt" name="dt" value="<?php echo $dt; ?>">
<input type="hidden" id="sess" name="sess" value="<?php echo $session1; ?>">
<input type="hidden" id="clas1" name="clas1" value="<?php echo $clas; ?>">
</form>
<script>
$(document).ready(function(){						
	$("#cmdPrint1").click(function() {
		var divhead= "<?php echo $school;?><hr>";
		var divsub= "<p id='cntr'><?php echo "Date: ". my_date_dot($dt). " to " . my_date_dot($dt1);?></p>";		
		var divtop = $("#tbl").html();	
	
			var printWindow = window.open('', '', 'height=400,width=800');		
            printWindow.document.write("<!DOCTYPE html><html><head><title>Student Enrollment</title>");
			
			printWindow.document.write('<style>');			
			printWindow.document.write('table{width:100%;}table, th,td{border: 1px solid #cccccc;border-collapse: collapse;}');			
			printWindow.document.write('#x{margin-top:50px;margin-left:50px;margin-right:15px;}#cntr{text-align:center;}');
			
			printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
			printWindow.document.write('<div id=x>');
			printWindow.document.write(divhead);
			printWindow.document.write("<h4 id='cntr'><u>Attendance Reports</u></h4>");			
			printWindow.document.write(divsub);			
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




