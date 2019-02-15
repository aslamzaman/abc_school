<?php
session_start();
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
//================================================
$dt=$_POST["dt"];
$session1 = $_POST["session1"];
$clas = $_POST["clas"];
?> 
<form class="form-horizontal" role="form" action="attendance_code.php" method="post" id="addform">
						<div  class="table-responsive" id="tbl">	
							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center">ID</th>
										<th>Student Name</th>
										<th class="text-center">Attendance</th>
									</tr>
								</thead>
								<tbody>
<?php
			$sql = "SELECT * FROM `db_student` WHERE `session` = $session1 AND `class_id_pres` = $clas AND `user_id` = $user_id";
			$result=mysqli_query($conn,$sql);
			$Numrows=mysqli_num_rows($result);
			if ($Numrows > 0)
			{
				while ($rows=mysqli_fetch_array($result))
				{
					//---------------------------------------------------------
					echo "<tr>\n";
					echo "<td class='text-center'>". $rows["idcard"]."</td>";
					echo "<td>". $rows["student_name"]."</td>";
					$chgkd = fieldcount("SELECT *FROM `db_student_attendance` WHERE `user_id` = $user_id AND `session`= $session1 AND `class_id_pres` = $clas AND `atd_date`= '$dt' AND student_id=" . $rows["student_id"]);
					if($chgkd > 0)
					{
						echo "<td class='text-center'><input name='k[]' type='checkbox' value='". $rows["student_id"]."' checked></td>";
					}
					else
					{
						echo "<td class='text-center'><input name='k[]' type='checkbox' value='". $rows["student_id"]."'></td>";
					}
					echo "</tr>\n";
				}
					echo "<tr>\n";
					echo "<td colspan=2></td>";	
					echo "<td><a class='btn btn-default btn-block' href='#' id='cmdsave'>Save</a></td>";			
					echo "</tr>\n";
			}				

?>
								</tbody>
							</table>
						</div> <!-- table responsive -->
<input type="hidden" id="dt" name="dt" value="<?php echo $dt; ?>">
<input type="hidden" id="sess" name="sess" value="<?php echo $session1; ?>">
<input type="hidden" id="clas1" name="clas1" value="<?php echo $clas; ?>">
</form>
<script>
$(document).ready(function(){
	$("#cmdsave").click(function(){
	//----------------------------------------
		if (confirm("Are u sure?")==true){
			$("#addform").submit();
		};
	//-----------------------------------	
	});
}); 
</script>




