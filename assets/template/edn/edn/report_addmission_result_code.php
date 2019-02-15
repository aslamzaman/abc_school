<?php
session_start();
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$session = $_POST["session1"];
$clss = $_POST["clss1"];
$clss1 = myfield("SELECT `class_name` FROM `list_class` WHERE `class_id`= $clss");
$asct = $_POST["asct1"];
$topt = $_POST["topt1"];

					
			
					$sql = "SELECT * FROM `admission_result` WHERE `admission_result_user` = $user_id AND `admission_result_session` = $session AND `admission_result_class` = $clss ORDER BY `admission_result_total` $asct LIMIT $topt";
					
					$result=mysqli_query($conn,$sql);
					$Numrows=mysqli_num_rows($result);
					if ($Numrows > 0)
					{
						$itotal="";
						echo "<ul class='pager'>\n";
						echo "<li class='next'><a href='#' id='cmdPrint1'>Print</a></li>\n";
						echo "</ul>\n";
						echo "<div  class='table-responsive' id='tbl'>\n";	
						echo "<table class='table table-bordered'>\n";
						echo "<thead>\n";
						echo "<tr>\n";
						echo "<th id='lft'>Student Name</th>\n";
						echo "<th id='lft'>Fathers Name</th>\n";
						echo "<th class='text-center' id='cntr'>Written</th>\n";
						echo "<th class='text-center' id='cntr'>Practical</th>\n";
						echo "<th class='text-center' id='cntr'>Oral</th>\n";	
						echo "<th class='text-center' id='cntr'>Others</th>\n";
						echo "<th class='text-center' id='cntr'>Total</th>\n";							
						echo "</tr>\n";
						echo "</thead>\n";
						echo "<tbody>\n";
						while ($rows=mysqli_fetch_array($result))
						{
							//---------------------------------------------------------
							echo "<tr>\n";
							echo "<td>". $rows["admission_result_std_name"]."</td>";
							echo "<td>". $rows["admission_result_std_fname"]."</td>";
							echo "<td class='text-center' id='cntr'>". $rows["admission_result_written"]."</td>";
							echo "<td class='text-center' id='cntr'>". $rows["admission_result_practical"]."</td>";
							echo "<td class='text-center' id='cntr'>". $rows["admission_result_oral"]."</td>";
							echo "<td class='text-center' id='cntr'>". $rows["admission_result_other"]."</td>";
							echo "<td class='text-center' id='cntr'>". $rows["admission_result_total"]."</td>";
							echo "</tr>\n";
						}
					}

?>
								</tbody>
							</table>
						</div> <!-- table responsive -->
<script>
$(document).ready(function(){						
	$("#cmdPrint1").click(function() {
		var divhead= "<?php echo $school;?><hr>";
		var divsub= "<p id='cntr'><?php echo "Session: $session; Class: $clss1<br>Print Date: ". my_date_dot(date("Y-m-d"));?></p>";		
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
			printWindow.document.write("<h4 id='cntr'><u>Admission Test Result Sheet</u></h4>");				
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