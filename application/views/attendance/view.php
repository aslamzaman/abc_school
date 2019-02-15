 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	
 


<h1>Attendance Information</h1>
<hr>
<div class="table-responsive">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Description</th>
				<th>Data</th>
			</tr>
		</thead>
		<tbody>
		<?php
		if($attendance)
		{
		?>
			<tr>
				<td>Id</td>
				<td><?php echo $attendance['id'];?></td>
			</tr>
			<tr>
				<td>Student_id</td>
				<td><?php echo $attendance['student_id'];?></td>
			</tr>
			<tr>
				<td>Dt</td>
				<td><?php echo $attendance['dt'];?></td>
			</tr>
			<tr>
				<td>Class_name_id</td>
				<td><?php echo $attendance['class_name_id'];?></td>
			</tr>
			<tr>
				<td>Session_name_id</td>
				<td><?php echo $attendance['session_name_id'];?></td>
			</tr>
			<tr>
				<td>Attendance</td>
				<td><?php echo $attendance['attendance'];?></td>
			</tr>
			<tr>
				<td>Entry_dt</td>
				<td><?php echo $attendance['entry_dt'];?></td>
			</tr>
		<?php
		}
		?>			
		</tbody>
	</table>
	<a href="<?php echo base_url('attendance');?>" class="btn btn-danger">Close</a>
</div>
<!-- /.table-responsive -->
		
 
	
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div>  