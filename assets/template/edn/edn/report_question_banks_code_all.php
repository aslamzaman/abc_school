<?php
session_start();
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$clss = $_POST["clss1"];
$subj = $_POST["subj1"];

$sclass = myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = $clss");	
$ssubject = myfield("SELECT `subject_name` FROM `list_subject` WHERE `subject_id` = $subj");	

$sql = "SELECT * FROM `question_bank` WHERE `question_class` = $clss AND `question_subject`= $subj ORDER BY `question_id`";
$result=mysqli_query($conn,$sql);
$Numrows=mysqli_num_rows($result);
if ($Numrows > 0)
{
	echo "<ul class='pager'>\n";
	echo "<li class='next'><a href='#' id='cmdPrint1'>Print</a></li>\n";
	echo "</ul>\n";
	echo "<div  class='table-responsive' id='tbl'>\n";	
	echo "<table class='table table-bordered'>\n";
	echo "<thead>\n";
	echo "<tr>\n";
	echo "<th></th>\n";
	echo "<th id='lft'>Questions</th>\n";
	echo "</tr>\n";
	echo "</thead>\n";
	echo "<tbody>\n";	

	while ($rows=mysqli_fetch_array($result))
	{
		//---------------------------------------------------------
		echo "<tr>\n";
		echo "<td><span class='glyphicon glyphicon-triangle-right'></span></td>";
		echo "<td>". $rows["question"]."</td>";
		echo "</tr>\n";
		$itotal++;
		$gtotal++;
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
		var divsub= "<p id='cntr'><?php echo "Class: $sclass; Subject: $ssubject<br>Print Date: ". my_date_dot(date("Y-m-d"));?></p>";		
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
			printWindow.document.write("<h4 id='cntr'><u>Questions Bank - All</u></h4>");				
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