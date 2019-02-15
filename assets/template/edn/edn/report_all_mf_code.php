<?php
session_start();
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$session = $_POST["session1"];

			$sqlsex="SELECT DISTINCT db_student.sex_id, list_sex.sex_name FROM db_student LEFT JOIN list_sex ON db_student.sex_id = list_sex.sex_id WHERE db_student.user_id = $user_id AND db_student.session= $session ORDER BY list_sex.sex_name";
			$resultsex=mysqli_query($conn,$sqlsex);
			$Numrowssex=mysqli_num_rows($resultsex);
			if ($Numrowssex > 0)
			{
					echo "<ul class='pager'>\n";
					echo "<li class='next'><a href='#' id='cmdPrint1'>Print</a></li>\n";
					echo "</ul>\n";
					echo "<div  class='table-responsive' id='tbl'>\n";	
					echo "<table class='table table-bordered'>\n";
					echo "<thead>\n";
					echo "<tr>\n";
					echo "<th></th>\n";
					echo "<th>ID</th>\n";
					echo "<th>Student Name</th>\n";
					echo "<th>Fathers Name</th>\n";											
					echo "<th>Address</th>\n";
					echo "<th>Mobile</th>\n";
					echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";				
			
			
				$gtotal="";				
				while ($rowssex=mysqli_fetch_array($resultsex))
				{
					$sexid =  $rowssex[0];
					echo "<tr>\n";
					echo "<td colspan=6><strong>". $rowssex[1]."</strong></td>";
					echo "</tr>\n";		
					//---------------------------------------------------------
					$sql = "SELECT * FROM `db_student` WHERE `user_id` = $user_id AND `sex_id` = $sexid AND session= $session ";
					$result=mysqli_query($conn,$sql);
					$Numrows=mysqli_num_rows($result);
					if ($Numrows > 0)
					{
						$itotal="";
						while ($rows=mysqli_fetch_array($result))
						{
							//---------------------------------------------------------
							echo "<tr>\n";
							echo "<td></td>";
							echo "<td>". $rows["idcard"]."</td>";
							echo "<td>". $rows["student_name"]."</td>";
							echo "<td>". $rows["father_name"]."</td>";
							echo "<td>". $rows["address"]."</td>";
							echo "<td>". $rows["mobile"]."</td>";
							echo "</tr>\n";
							$itotal++;
							$gtotal++;
						}
						echo "<tr>\n";
						echo "<td></td>";
						echo "<td colspan=5><strong>Sub total = $itotal</strong></td>";
						echo "</tr>\n";								
					}
				}
				echo "<tr>\n";
				echo "<td colspan=6>&nbsp;</td>";
				echo "</tr>\n";	
				echo "<tr>\n";
				echo "<td colspan=6><strong><u>Grand total = $gtotal</u></strong></td>";
				echo "</tr>\n";						
			};			


?>
								</tbody>
							</table>
						</div> <!-- table responsive -->			
<script>
$(document).ready(function(){						
	$("#cmdPrint1").click(function() {
		var divhead= "<?php echo $school;?><hr>";
		var divsub= "<p id='cntr'><?php echo "Session: $session<br>Print Date: ". my_date_dot(date("Y-m-d"));?></p>";		
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
			printWindow.document.write("<h4 id='cntr'><u>Student Informations</u></h4>");		
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