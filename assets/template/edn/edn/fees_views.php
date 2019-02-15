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
				<div class="panel-heading"><h2 class="text-center">Student Fees</h2></div>	
				<div  class="panel-body">
					<ul class="pager">
						<li class="previous"><a href="home.php">Home</a></li>					
						<li class="next"><a href="fees.php">Add New</a></li>
					</ul>		
					<div  class="table-responsive">	
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>ID</th>								
									<th>Name</th>
									<th>Session</th>	
									<th>Class</th>										
									<th>Fees</th>
									<th>Date</th>									
								</tr>
							</thead>
							<tbody>	
<?php
	$sql = "SELECT * FROM `db_fees` WHERE `user_id`= $user_id ORDER BY `fees_id` DESC LIMIT 150"; 
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{	
			$sql_std = "SELECT *FROM `db_student` WHERE `student_id` = ".$rows["student_id"]." LIMIT 1"; 
			$result_std = mysqli_query($conn, $sql_std);
			$rows_std=mysqli_fetch_array($result_std);
			$cls_id=$rows_std["class_id_pres"];
			$cls_name=myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = $cls_id LIMIT 1");
			
			echo "<tr>\n";
			echo "<td style='width:100px;'><a href='fees_one.php?id=". $rows["fees_id"]."' class='btn btn-default btn-xs btn-block'><span class='glyphicon glyphicon-triangle-right'></span>  ".$rows_std["idcard"]."</a></td>\n";			
			echo "<td>" . $rows_std["student_name"]."</td>\n";			
			echo "<td>" . $rows_std["session"]."</td>\n";
			echo "<td>$cls_name</td>\n";	
			echo "<td>" . $rows["fees"]."</td>\n";	
			echo "<td>" . my_date_dot($rows["fees_dt"])."</td>\n";				
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
<?php include "footer.php"; ?>