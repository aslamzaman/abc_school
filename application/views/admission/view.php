
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	

<h1>Admission Information</h1>
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
		if($admission)
		{
		?>
			<tr>
				<td>Id</td>
				<td><?php echo $admission['id'];?></td>
			</tr>
			<tr>
				<td>Student_id</td>
				<td><?php echo $admission['student_id'];?></td>
			</tr>
			<tr>
				<td>Class_name_id</td>
				<td><?php echo $admission['class_name_id'];?></td>
			</tr>
			<tr>
				<td>Section_id</td>
				<td><?php echo $admission['section_id'];?></td>
			</tr>
			<tr>
				<td>Class_roll</td>
				<td><?php echo $admission['class_roll'];?></td>
			</tr>
			<tr>
				<td>Entry_dt</td>
				<td><?php echo $admission['entry_dt'];?></td>
			</tr>
		<?php
		}
		?>			
		</tbody>
	</table>
	<a href="<?php echo base_url('admission');?>" class="btn btn-danger">Close</a>
</div>
<!-- /.table-responsive -->
		
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div>  