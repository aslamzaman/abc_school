<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$id = $_GET["id"];

$sql = "SELECT * FROM `db_fees` WHERE `fees_id`= $id LIMIT 1"; 
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);

$sql_std = "SELECT *FROM `db_student` WHERE `student_id` = ".$rows["student_id"]." LIMIT 1"; 
$result_std = mysqli_query($conn, $sql_std);
$rows_std=mysqli_fetch_array($result_std);
$clid=$rows_std["class_id_pres"];
$cls_name=myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = $clid LIMIT 1");


$str="ID: ".$rows_std["idcard"].", Session: ". $rows_std["session"].", Class: $cls_name, Fees: ".$rows["fees"].", Date: ". my_date_dot($rows["fees_dt"]);
?>
			<div class="col-sm-12">
				<?php echo $school;?>					
				<div class="panel panel-default" id="prnt">
					<div class="panel-heading"><h3 class="text-center">Student Fees</h3></div>	
					<div  class="panel-body">
						<div  class="table-responsive" id="tbl">	
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
									echo "<tr>";
									echo "<td>".$rows_std["idcard"]."</td>";
									echo "<td>".$rows_std["student_name"]."</td>";									
									echo "<td>".$rows_std["session"]."</td>";									
									echo "<td>$cls_name</td>";									
									echo "<td>".$rows["fees"]."</td>";
									echo "<td>".my_date_dot($rows["fees_dt"])."</td>";									
									echo "</tr>";										
								?>

								</tbody>
							</table>
						</div> <!-- table responsive -->								
								
					</div>
					<div  class="panel-footer">
						<div class="btn-group btn-group-justified">
							<a class="btn btn-default" href="fees_edit.php?id=<?php echo $_GET["id"]; ?>">Edit</a>						
							<a class="btn btn-default" href="#" id="delete">Delete</a>
							<a class="btn btn-default" href="fees_cash_memo.php?id=<?php echo $_GET["id"]; ?>">Cash Memo</a>								
							<a class="btn btn-default" href="fees_views.php">Cancel</a>							
						</div>
					</div>				
				</div>
				
			</div><!-- col-1 -->	
		
<script>
$(document).ready(function(){	
	$("#delete" ).click(function(){
		//----------------------------------------
		var rest = "<?php echo $_SESSION["user_id"] ?>";
		if(rest == 1){alert("Demo page; delete protected !"); return false;};	
		
		var Mstr= "Do you really want to  :\nDelete from database where '<?php echo $str; ?>'";
		var ids=<?php echo $id;?>;
		if (confirm(Mstr)==true){
			window.location.href ='fees_delete_code.php?id=' + ids;
		};
		//-----------------------------------	
	});	
	
});
</script>	
<?php include "footer.php"; ?>