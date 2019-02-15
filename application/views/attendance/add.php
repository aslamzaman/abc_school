 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	
 
 
<h1>Add New Attendance</h1>
<hr>
<form action="<?php echo base_url('attendance/save');?>" method="post">
	<div class="form-group">
		<label for="student_id">Student_id</label><?php echo form_error('student_id'); ?>
		<input type="text" class="form-control" name="student_id" value="<?php echo set_value('student_id');?>">
	</div>
	<div class="form-group">
		<label for="dt">Dt</label><?php echo form_error('dt'); ?>
		<input type="text" class="form-control" name="dt" value="<?php echo set_value('dt');?>">
	</div>
	<div class="form-group">
		<label for="class_name_id">Class_name_id</label><?php echo form_error('class_name_id'); ?>
		<input type="text" class="form-control" name="class_name_id" value="<?php echo set_value('class_name_id');?>">
	</div>
	<div class="form-group">
		<label for="session_name_id">Session_name_id</label><?php echo form_error('session_name_id'); ?>
		<input type="text" class="form-control" name="session_name_id" value="<?php echo set_value('session_name_id');?>">
	</div>
	<div class="form-group">
		<label for="attendance">Attendance</label><?php echo form_error('attendance'); ?>
		<input type="text" class="form-control" name="attendance" value="<?php echo set_value('attendance');?>">
	</div>
	<div class="form-group">
		<label for="entry_dt">Entry_dt</label><?php echo form_error('entry_dt'); ?>
		<input type="text" class="form-control" name="entry_dt" value="<?php echo set_value('entry_dt');?>">
	</div>
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="<?php echo base_url('attendance');?>" class="btn btn-danger">Close</a>
</form>
<!-- /.form -->

 
	
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div> 
 