<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$unit_id = $_SESSION["unit_id"];
$project_id = $_SESSION["project_id"];
$prjname=myfield("SELECT project_name FROM list_project WHERE project_id = $project_id");
$untname=myfield("SELECT unit_name FROM list_unit WHERE unit_id = $unit_id");
//================================================================
?>
<div class="col-sm-12">
				<h2 class="text-center">Project:<?php echo $prjname;?>; Unit:<?php echo $untname;?></h2>	
					<ul class="pager">
						<li class="next"><a href="#" id="cmdPrint">Print</a></li>
					</ul>
			<div class="panel panel-default" id="prnt">
				<div class="panel-heading"></div>	
				<div  class="panel-body">


						<div  class="table-responsive" id="tbl">	
							<table class="table table-bordered">
								<thead>
									<tr>
										<th></th>
										<th></th>
										<th>ID</th>
										<th>Student Name</th>
										<th>Fathers Name</th>											
										<th>Address</th>
										<th>Mobile</th>
									</tr>
								</thead>
								<tbody>	
<?php

$gptotal="";
$unitsl=0;
$sqlunit="SELECT DISTINCT list_unit.unit_id, list_unit.unit_name FROM db_student LEFT JOIN list_unit ON db_student.unit_id = list_unit.unit_id WHERE db_student.project_id = $project_id AND db_student.unit_id = $unit_id ORDER BY list_unit.unit_name";
$resultunit=mysqli_query($conn,$sqlunit);
$Numrowsunit=mysqli_num_rows($resultunit);
if ($Numrowsunit > 0)
{
	
	while ($rowsunit=mysqli_fetch_array($resultunit))
	{
			$unitsl++;
			$unitid =  $rowsunit[0];
			echo "<tr>\n";
			echo "<td colspan=8><strong>$unitsl. ". $rowsunit[1]."</strong></td>";
			echo "</tr>\n";		
			//---------------------------------------------------------		
	
			$gtotal="";
			$sqltrade="SELECT DISTINCT db_student.sex_id, list_sex.sex_name FROM db_student LEFT JOIN list_sex ON db_student.sex_id = list_sex.sex_id WHERE db_student.project_id = $project_id AND db_student.unit_id = $unitid  ORDER BY list_sex.sex_name";
				
			$resulttrade=mysqli_query($conn,$sqltrade);
			$Numrowstrade=mysqli_num_rows($resulttrade);
			if ($Numrowstrade > 0)
			{
				
				while ($rowstrade=mysqli_fetch_array($resulttrade))
				{
					$itotal="";
					$tradeid =  $rowstrade[0];
					echo "<tr>\n";
					echo "<td></td>";
					echo "<td colspan=7><strong>". $rowstrade[1]."</strong></td>";
					echo "</tr>\n";		
					//---------------------------------------------------------
					$sql = "SELECT * FROM `db_student` WHERE `unit_id` = $unitid AND `project_id` = $project_id  AND `sex_id` = $tradeid";
					$result=mysqli_query($conn,$sql);
					$Numrows=mysqli_num_rows($result);
					if ($Numrows > 0)
					{
						$msctotal="";
						while ($rows=mysqli_fetch_array($result))
						{
							//---------------------------------------------------------
							echo "<tr>\n";
							echo "<td></td>";
							echo "<td></td>";
							echo "<td>". $rows["idcard"]."</td>";
							echo "<td>". $rows["student_name"]."</td>";
							echo "<td>". $rows["father_name"]."</td>";
							echo "<td>". $rows["address"]."</td>";
							echo "<td>". $rows["mobile"]."</td>";
							echo "</tr>\n";
							$itotal++;
							$gtotal++;
							$gptotal++;
						}
					}
					echo "<tr>\n";
					echo "<td></td>";
					echo "<td></td>";
					echo "<td colspan=6><strong>Sub total = $itotal</strong></td>";
					echo "</tr>\n";		

				}
			};			
			echo "<tr>\n";
			echo "<td></td>";
			echo "<td colspan=7><strong>Unit total = $gtotal</strong></td>";
			echo "</tr>\n";	
	}
	echo "<tr>\n";
	echo "<td colspan=8><strong>Grand total = $gptotal</strong></td>";
	echo "</tr>\n";		
}	
?>
								</tbody>
							</table>
						</div> <!-- table responsive -->			
				
				
				</div>
				<div  class="panel-footer"></div>				
			</div>		

			
</div>

<script>
$(document).ready(function(){

	$("#total").html("<strong><?php echo "Total Graduate: ". fieldcount("SELECT * FROM db_graduatefollwoup LEFT JOIN list_graduate ON db_graduatefollwoup.graduate_id = list_graduate.graduate_id WHERE db_graduatefollwoup.project_id = $project_id AND db_graduatefollwoup.unit_id= $unit_id");?></strong>");	

	$("#cmdPrint").click(function() {	
	
		var divtop = $("#prnt").html();		
	
			var printWindow = window.open('', '', 'height=400,width=800');		
            printWindow.document.write("<!DOCTYPE html><html><head><title>Student Enrollment</title>");
            printWindow.document.write("<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>");
			
			printWindow.document.write('<style>');			
			printWindow.document.write('table{width:100%;}');			
			printWindow.document.write('#x{margin-top:50px;margin-left:50px;margin-right:30px;}');
			
			printWindow.document.write('</style>');
            printWindow.document.write('</head><body>');
			printWindow.document.write('<div id=x>');
			
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