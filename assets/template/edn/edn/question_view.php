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
				<div class="panel-heading"><h2 class="text-center">Question Bank</h2></div>	
				<div  class="panel-body">
					<ul class="pager">
						<li class="previous"><a href="home.php">Home</a></li>
						<li class="next"><a href="question_add.php">Add New</a></li>
					</ul>					
					<div  class="table-responsive">	
						<table class="table table-bordered">
							<thead>
								<tr>
									<th></th>	
									<th>Class</th>	
									<th>Subject</th>
									<th>Question</th>
								</tr>
							</thead>
							<tbody>	
<?php
	$sql = "SELECT * FROM `question_bank` WHERE `question_user`= $user_id ORDER BY `question_id` DESC LIMIT 50"; 
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{						
			echo "<tr>\n";
			echo "<td style='width:100px;'><a href='question_listone.php?id=". $rows["question_id"]."' class='btn btn-default btn-xs btn-block'><span class='glyphicon glyphicon-triangle-right'></span>  </a></td>\n";			
			$sclass = myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = ".$rows["question_class"]);	
			echo "<td>$sclass</td>\n";	
			$ssubject = myfield("SELECT `subject_name` FROM `list_subject` WHERE `subject_id` = ".$rows["question_subject"]);	
			echo "<td>$ssubject</td>\n";	
			echo "<td>" . $rows["question"]."</td>\n";				
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