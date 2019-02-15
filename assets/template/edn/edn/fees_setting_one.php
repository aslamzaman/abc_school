<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$id = $_GET["id"];

$sql = "SELECT * FROM `db_fees_setting` WHERE `fees_id`= $id LIMIT 1"; 
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);

$clsname= myfield("SELECT `class_name` FROM `list_class` WHERE `class_id`= " . $rows["fees_class"]);

$str="Class: $clsname, Session: ". $rows["fees_session"].", Fees ".$rows["fees"];
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
										<th>Class</th>
										<th>Session</th>									
										<th>Fees</th>
									</tr>
								</thead>
								<tbody>
								<?php
									echo "<tr>";							
									echo "<td>$clsname</td>";
									echo "<td>".$rows["fees_session"]."</td>";	
									echo "<td>".$rows["fees"]."</td>";
									echo "</tr>";										
								?>

								</tbody>
							</table>
						</div> <!-- table responsive -->								
								
					</div>
					<div  class="panel-footer">
						<div class="btn-group btn-group-justified">
							<a class="btn btn-default" href="fees_setting_edit.php?id=<?php echo $_GET["id"]; ?>">Edit</a>
							<a class="btn btn-default" href="#" id="delete">Delete</a>	
							<a class="btn btn-default" href="fees_setting_view.php">Cancel</a>							
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
			window.location.href ='fees_setting_delete_code.php?id=' + ids;
		};
		//-----------------------------------	
	});	
	
});
</script>	
<?php include "footer.php"; ?>