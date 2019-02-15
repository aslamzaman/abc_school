<?php
session_start();
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$session = $_POST["session"];

			$sqlfees="SELECT db_fees.fees FROM db_fees LEFT JOIN db_student ON db_fees.student_id = db_student.student_id WHERE db_student.session = $session AND db_student.user_id= $user_id";
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
					echo "<th id='lft'>Descriptions</th>\n";					
					echo "<th id='cntr'>Cash</th>\n";
					echo "</tr>\n";
					echo "</thead>\n";
					echo "<tbody>\n";
				
				$itotal=0;				
				while ($rowsfess=mysqli_fetch_array($resultfees))
				{
					$itotal= $itotal + intval($rowsfess["0"]);
				}
				$sesstotal="";
				$sqlfees_set="SELECT `fees` FROM `db_fees_setting` WHERE `user_id` = $user_id AND `fees_session`= $session";
				$resultfees_set=mysqli_query($conn,$sqlfees_set);
				$Numrowsfess_set=mysqli_num_rows($resultfees_set);
				if ($Numrowsfess_set > 0)
				{
					while ($rowsfess_set=mysqli_fetch_array($resultfees_set))
					{
						$sesstotal= $sesstotal + intval($rowsfess_set["fees"]);
					}
				}
				else
				{
				$sesstotal="0";
				}
				
				echo "<td>Session Fees</td>";
				echo "<td id='cntr'>$sesstotal</td>";
				echo "</tr>\n";	
				
				echo "<td>Total Collections</td>";
				echo "<td id='cntr'>$itotal</td>";
				echo "</tr>\n";	
				
				echo "<tr>\n";
				echo "<td colspan=2>&nbsp;</td>";
				echo "</tr>\n";
				echo "<tr>\n";
				echo "<td colspan=2>&nbsp;</td>";
				echo "</tr>\n";	

				echo "<tr>\n";				
				echo "<td><strong><u>Balance</u></strong></td>";
				$balance = intval($sesstotal) - intval($itotal);
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
			printWindow.document.write("<h4 id='cntr'><u>Student Fees Summary</u></h4>");
			printWindow.document.write("<p id='cntr'><?php echo "Session: $session<br>". my_date_dot(date("Y-m-d"));?></p>");				
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