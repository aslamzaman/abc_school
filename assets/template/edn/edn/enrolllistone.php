<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$id = $_GET["id"];
$sql = "SELECT * FROM `db_student` WHERE `student_id` = $id LIMIT 1"; 
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);

$str=$rows["idcard"].". ". $rows["student_name"]." (".$rows["father_name"].")";
?>
			<div class="col-sm-12">
				<?php echo $school;?>					
				<div class="panel panel-default" id="prnt">
					<div class="panel-heading"><h3 class="text-center">Data Views</h3></div>	
					<div  class="panel-body">
						<div  class="table-responsive" id="tbl">	
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
									echo "<tr>";							
									echo "<td>".$rows["idcard"]."</td>";
									echo "<td>".$rows["student_name"]."</td>";	
									echo "<td>".$rows["father_name"]."</td>";
									echo "<td>".$rows["address"]."</td>";	
									echo "<td>".$rows["mobile"]."</td>";
									echo "</tr>";										
								?>

								</tbody>
							</table>
						</div> <!-- table responsive -->								
								
					</div>
					<div  class="panel-footer">
						<div class="btn-group btn-group-justified">
							<a class="btn btn-default" href="enrolledit.php?id=<?php echo $_GET["id"]; ?>">Edit</a>
							<a class="btn btn-default" href="enrolldetails.php?id=<?php echo $_GET["id"]; ?>">Details Views</a>
							<a class="btn btn-default" href="#" id="delete">Delete</a>	
							<a class="btn btn-default" href="enrollview.php">Cancel</a>							
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

		var Mstr= "Do you really want to  :\nDelete from enrollment where '<?php echo $str; ?>'";
		var ids=<?php echo $id;?>;
		if (confirm(Mstr)==true){
			window.location.href ='enrolldeletecode.php?id=' + ids;
		};
		//-----------------------------------	
	});	
	
});
</script>	
<?php include "footer.php"; ?>