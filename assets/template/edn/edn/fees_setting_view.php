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
				<div class="panel-heading"><h2 class="text-center">Student Fees Settings</h2></div>	
				<div  class="panel-body">
					<ul class="pager">
						<li class="previous"><a href="home.php">Home</a></li>					
						<li class="next"><a href="fees_setting.php">Add New</a></li>
					</ul>		
					<div  class="table-responsive">	
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Class</th>
									<th>Session</th>									
									<th>Fees</th>
								</tr>
							</thead>
							<tbody>	
<?php
	$sql = "SELECT * FROM `db_fees_setting` WHERE `user_id` = $user_id ORDER BY `fees_id` DESC"; 
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{	

			$clsname= myfield("SELECT `class_name` FROM `list_class` WHERE `class_id`= " . $rows["fees_class"]);
			echo "<tr>\n";
			echo "<td style='width:100px;'><a href='fees_setting_one.php?id=". $rows["fees_id"]."' class='btn btn-default btn-xs btn-block'><span class='glyphicon glyphicon-triangle-right'></span>  $clsname</a></td>\n";			
			echo "<td>" . $rows["fees_session"]."</td>\n";			
			echo "<td>" . $rows["fees"]."</td>\n";			
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