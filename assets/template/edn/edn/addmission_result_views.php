<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
?>
<div class="col-sm-12">
<?php echo $school;?>
			<div class="panel panel-default">
				<div class="panel-heading"><h2 class="text-center">Admission Test Result Sheet</h2></div>	
				<div  class="panel-body">
					<div class="text-right" id="total"></div>
					<ul class="pager">
						<li class="previous"><a href="home.php">Home</a></li>
						<li class="next"><a href="addmission_result_add.php">Add New</a></li>
					</ul>					
					<div  class="table-responsive">	
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Student Name</th>									
									<th>Fathers Name</th>
									<th>Session</th>									
									<th>Class</th>									
									<th>Written</th>
									<th>Practical</th>
									<th>Oral</th>
									<th>Others</th>										
								</tr>
							</thead>
							<tbody>	
<?php
	$sql = "SELECT * FROM `admission_result` WHERE `admission_result_user`= $user_id ORDER BY `admission_result_id` DESC LIMIT 50"; 
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{						
			echo "<tr>\n";
			echo "<td style='width:100px;'><a href='addmission_result_one.php?id=". $rows["admission_result_id"]."' class='btn btn-default btn-xs btn-block'><span class='glyphicon glyphicon-triangle-right'></span>  " . $rows["admission_result_std_name"]."</a></td>\n";			
			echo "<td>" . $rows["admission_result_std_fname"]."</td>\n";			
			echo "<td>" . $rows["admission_result_session"]."</td>\n";	
			$stclass=myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = ".$rows["admission_result_class"]);
			
			echo "<td>$stclass</td>\n";

			echo "<td>".$rows["admission_result_written"]. "</td>\n";
			echo "<td>" . $rows["admission_result_practical"]."</td>\n";			
			echo "<td>" . $rows["admission_result_oral"]."</td>\n";			
			echo "<td>".$rows["admission_result_other"]. "</td>\n";
			echo "</tr>\n";
		};
	};
	mysqli_close($conn);	
?>				
							</tbody>
						</table>								
					</div>
				</div>
				<div  class="panel-footer"></div>
			</div>		
</div>
<script>
$(document).ready(function(){

	$("#total").html("<strong><?php echo "Total Entry: $Numrows";?></strong>");	

}); 
</script>
<?php include "footer.php"; ?>