 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	
 

<h1>Attendance Information</h1>
<hr>
<p class="text-danger"><i>
	<?php
	if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	else
	{
		echo "Attendance List";		
	}	
	?>
</i></p>    
<div class="table-responsive">
	<p class="lead text-info">Class: <?php echo $class_name['name'].'; Section: '.$section['name'] ;?></p>
<form action="<?php echo base_url('attendance/update');?>" method="post">
	<input type="hidden" class="form-control" name="class_name" value="<?php echo $class_name['id'];?>">
	<input type="hidden" class="form-control" name="section" value="<?php echo $section['id'];?>">
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Student</th>
				<th class='text-right'>Attendance</th>
			</tr>
		</thead>                
		<tbody>
			<?php 
			$submit_btn = FALSE;
			if($attendances)
			{ 
				$submit_btn = TRUE;
				foreach ($attendances as $attendance)
				{
					$id = $attendance['id'];
					?>
					
					<tr>
						<td><?php echo   $attendance['student_id'].'. '.  $attendance['student'];?></td>
						<td class='text-right'><?php 
						if($attendance['attend'] == 1)
						{
						?>
						
							<input type="checkbox" name="checkbox1[]" checked value="<?php echo $attendance['id'];?>">
						<?php	
						}
						else
						{
						?>
						
							<input type="checkbox" name="checkbox1[]" value="<?php echo $attendance['id'];?>">
						<?php								
						}
						?>
						
						</td>
					</tr>					
					<?php 
				}
			}
			?>
			
		</tbody>
	</table>
	<?php 
		if($submit_btn)
		{
	?>
	<button type="submit" class="btn btn-primary">Save</button>
	<?php 
		}
	?>
	
	<a href="<?php echo base_url('attendance');?>" class="btn btn-success">Another Class</a>
</form>	
<!-- /.form -->	
	
</div>
<!-- /.table-responsive -->
 
	
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div>  