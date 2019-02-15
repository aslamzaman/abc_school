<?php
session_start();
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$stdid = $_POST["stdid"];

$result_std=mysqli_query($conn, "SELECT * FROM `db_student` WHERE `student_id` = $stdid LIMIT 1");
$rows_std=mysqli_fetch_array($result_std);

$sidcard= $rows_std["idcard"];
$sname= $rows_std["student_name"];
$sfathername= $rows_std["father_name"];
$std_session= $rows_std["session"];

$sclass= $rows_std["class_id_pres"];
$std_class = myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = $sclass LIMIT 1");


			$sqlfees="SELECT * FROM `db_fees` WHERE `student_id` = $stdid AND `user_id` = $user_id";
			$resultfees=mysqli_query($conn,$sqlfees);
			$Numrowsfess=mysqli_num_rows($resultfees);
			if ($Numrowsfess > 0)
			{
					echo "<ul class='pager'>\n";
					echo "<li class='next'><a href='#' id='cmdPrint1'>Print</a></li>\n";
					echo "</ul>\n";
					echo "<div  class='table-responsive' id='tbl'>\n";	
					echo "<table class='table table-bordered'>\n";
					echo "<thead>\n";
					echo "<tr>\n";
					echo "<th id='lft'>Date</th>\n";
					echo "<th id='cntr'>Cash</th>\n";
					echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";

				$itotal=0;					
				while ($rowsfess=mysqli_fetch_array($resultfees))
				{
					//---------------------------------------------------------
					echo "<tr>\n";
					echo "<td>". my_date_dot($rowsfess["fees_dt"])."</td>";
					echo "<td id='cntr'>". $rowsfess["fees"]."</td>";
					echo "</tr>\n";
					$itotal= $itotal + intval($rowsfess["fees"]);
				}
				echo "<td><strong><i>Total</i></strong></td>";
				echo "<td id='cntr'><strong><i><u>$itotal</u></i></strong></td>";
				echo "</tr>\n";	
				
				echo "<tr>\n";
				echo "<td colspan=2>&nbsp;</td>";
				echo "</tr>\n";
				echo "<tr>\n";
				echo "<td colspan=2>&nbsp;</td>";
				echo "</tr>\n";	

				$session_fee = myfield("SELECT `fees` FROM `db_fees_setting` WHERE `user_id` = $user_id AND `fees_session`= $std_session AND `fees_class`= $sclass");
				
				echo "<td>Session Fees</td>";
				echo "<td id='cntr'>$session_fee</td>";
				echo "</tr>\n";
				
				echo "<tr>\n";				
				echo "<td>Paid</td>";
				echo "<td id='cntr'>$itotal</td>";
				echo "</tr>\n";
				
				echo "<tr>\n";				
				echo "<td><strong><u>Balance</u></strong></td>";
				$balance = intval($session_fee) - intval($itotal);
				echo "<td id='cntr'><strong><u>$balance</u></strong></td>";
				echo "</tr>\n";				
				
				
			}

		
		


?>
								</tbody>
							</table>
						</div> <!-- table responsive -->
<script>
$(document).ready(function(){						
	$("#cmdPrint1").click(function() {
		var divhead= "<?php echo $school;?><hr>";
		var divtop = $("#tbl").html();	
	
			var printWindow = window.open('', '', 'height=400,width=800');		
            printWindow.document.write("<!DOCTYPE html><html><head><title>Student Enrollment</title>");
			
			printWindow.document.write('<style>');			
			printWindow.document.write('table{width:100%;}table, th,td{border: 1px solid #cccccc;border-collapse: collapse;}');			
			printWindow.document.write('#x{margin-top:50px;margin-left:50px;margin-right:15px;}#cntr{text-align:center;}#lft{text-align:left;}');
			
			printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
			printWindow.document.write('<div id=x>');
			printWindow.document.write(divhead);
			printWindow.document.write("<h4 id='cntr'><u>Student Fees</u></h4>");
			printWindow.document.write("<p id='cntr'><?php echo "Session: $std_session, Class: $std_class<br>". my_date_dot(date("Y-m-d"));?></p>");				
			printWindow.document.write("<p><?php echo "<strong>$sidcard. $sname</strong><br>Father Name: $sfathername";?></p>");				
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