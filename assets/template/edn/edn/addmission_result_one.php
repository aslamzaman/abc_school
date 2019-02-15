<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$id = $_GET["id"];
$sql = "SELECT * FROM `admission_result` WHERE `admission_result_id` =  $id LIMIT 1"; 
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);

$str=$rows["admission_result_std_name"].". ". $rows["admission_result_std_fname"];
?>
			<div class="col-sm-12">
				<?php echo $school;?>					
				<div class="panel panel-default" id="prnt">
					<div class="panel-heading"><h3 class="text-center">Admission Test Result Sheet Views</h3></div>	
					<div  class="panel-body">
						<div  class="table-responsive" id="tbl">	
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
									echo "<tr>\n";
									echo "<td>" . $rows["admission_result_std_name"]."</td>\n";			
									echo "<td>" . $rows["admission_result_std_fname"]."</td>\n";			
									echo "<td>" . $rows["admission_result_session"]."</td>\n";	
									$stclass=myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = ".$rows["admission_result_class"]);
									echo "<td>$stclass</td>\n";
									echo "<td>".$rows["admission_result_written"]. "</td>\n";
									echo "<td>" . $rows["admission_result_practical"]."</td>\n";			
									echo "<td>" . $rows["admission_result_oral"]."</td>\n";			
									echo "<td>".$rows["admission_result_other"]. "</td>\n";
									echo "</tr>\n";
								?>

								</tbody>
							</table>
						</div> <!-- table responsive -->								
								
					</div>
					<div  class="panel-footer">
						<div class="btn-group btn-group-justified">
							<a class="btn btn-default" href="addmission_result_edit.php?id=<?php echo $_GET["id"]; ?>">Edit</a>
							<a class="btn btn-default" href="#" id="delete">Delete</a>	
							<a class="btn btn-default" href="addmission_result_views.php">Cancel</a>							
						</div>
					</div>				
				</div>
				
			</div><!-- col-1 -->	
		
<script>
$(document).ready(function(){	
	$("#delete" ).click(function(){
		//----------------------------------------
		var rest = "<?php echo $_SESSION["user_id"] ?>";
		//if(rest == 1){alert("Demo page; delete protected !"); return false;};	
		
		var Mstr= "Do you really want to  :\nDelete from admission result where '<?php echo $str; ?>'";
		var ids=<?php echo $id;?>;
		if (confirm(Mstr)==true){
			window.location.href ='addmission_result_delete_code.php?id=' + ids;
		};
		//-----------------------------------	
	});	
	
});
</script>	
<?php include "footer.php"; ?>