<?php
session_start();
include "header.php";
include "conn.php";
include "custom.php";
$user_id=$_SESSION["user_id"];
$school=$_SESSION["school_name"];
//================================================================
$id = $_GET["id"];
$sql = "SELECT * FROM `question_bank` WHERE `question_id` = $id LIMIT 1"; 
$result=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($result);

$sclass = myfield("SELECT `class_name` FROM `list_class` WHERE `class_id` = ".$rows["question_class"]);	
$ssubject = myfield("SELECT `subject_name` FROM `list_subject` WHERE `subject_id` = ".$rows["question_subject"]);	


$str="$sclass. $ssubject. ". $rows["question"];
?>
			<div class="col-sm-12">
				<?php echo $school;?>					
				<div class="panel panel-default" id="prnt">
					<div class="panel-heading"><h3 class="text-center">Question View</h3></div>	
					<div  class="panel-body">
						<div  class="table-responsive" id="tbl">	
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
									echo "<tr>";							
									echo "<td><span class='glyphicon glyphicon-triangle-right'></span></td>";
									echo "<td>$sclass</td>";	
									echo "<td>$ssubject</td>";
									echo "<td>".$rows["question"]."</td>";	
									echo "</tr>";										
								?>

								</tbody>
							</table>
						</div> <!-- table responsive -->								
								
					</div>
					<div  class="panel-footer">
						<div class="btn-group btn-group-justified">
							<a class="btn btn-default" href="question_edit.php?id=<?php echo $_GET["id"]; ?>">Edit</a>
							<a class="btn btn-default" href="#" id="delete">Delete</a>	
							<a class="btn btn-default" href="question_view.php">Cancel</a>							
						</div>
					</div>				
				</div>
				
			</div><!-- col-1 -->	
		
<script>
$(document).ready(function(){	
	$("#delete" ).click(function(){
		//----------------------------------------
		
		var Mstr= "Do you really want to  :\nDelete from enrollment where '<?php echo $str; ?>'";
		var ids=<?php echo $id;?>;
		if (confirm(Mstr)==true){
			window.location.href ='question_deletecode.php?id=' + ids;
		};
		//-----------------------------------	
	});	
	
});
</script>	
<?php include "footer.php"; ?>