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
		<form class="form-horizontal" role="form" action="comments_code.php" method="post">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Comments</h2>
				</div>	
				<div  class="panel-body">
					<div class="col-sm-12">
							<div class="form-group">
								<label for="comment">Comments:</label>
								<textarea class="form-control" rows="5" id="comment" name="comment"  maxlength="150"></textarea>
							</div>
					</div>	
				</div>
				<div  class="panel-footer">
					<input type="submit" class="btn btn-default" value="Submit">
					<a class="btn btn-default" href="home.php">Cancel</a>					
				</div>				
			</div>	
		</form>
			
</div>
<?php include "footer.php"; ?>