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
				<div class="panel-heading"><h2 class="text-center">Student Enrollment</h2></div>	
				<div  class="panel-body">
					<ul class="pager">
						<li class="previous"><a href="home.php">Home</a></li>
						<li class="next"><a href="enroll.php">Add New</a></li>
					</ul>					
					<div  class="table-responsive">	
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Student Id</th>
									<th>Student Name</th>									
									<th>Fathers Name</th>
									<th>Address</th>
									<th>Mobile</th>	
								</tr>
							</thead>
							<tbody>	
<?php
	$sql = "SELECT * FROM `db_student` WHERE `user_id` = $user_id ORDER BY `idcard` DESC LIMIT 150"; 
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{						
			echo "<tr>\n";
			echo "<td style='width:100px;'><a href='enrolllistone.php?id=". $rows["student_id"]."' class='btn btn-default btn-xs btn-block'><span class='glyphicon glyphicon-triangle-right'></span>  " . $rows["idcard"]."</a></td>\n";			
			echo "<td>" . $rows["student_name"]."</td>\n";			
			echo "<td>" . $rows["father_name"]."</td>\n";			
			echo "<td>".$rows["address"]. "</td>\n";
			echo "<td>".$rows["mobile"]. "</td>\n";
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