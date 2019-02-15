 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	
 

<h1>Edit Attendance</h1>
<hr>
<form action="<?php echo base_url('attendance/update');?>" method="post">
	<input type="hidden" class="form-control" name="id" value="<?php echo $attendance['id'];?>">
	<div class="form-group">
		<label for="student_id">Student_id</label><?php echo form_error('student_id'); ?>
		<input type="text" class="form-control" name="student_id" value="<?php if(set_value('student_id') != NULL){echo set_value('student_id');}else{echo $attendance['student_id'];}?>">
	</div>
	<div class="form-group">
		<label for="class_name_id">Class_name_id</label><?php echo form_error('class_name_id'); ?>
		<input type="text" class="form-control" name="class_name_id" value="<?php if(set_value('class_name_id') != NULL){echo set_value('class_name_id');}else{echo $attendance['class_name_id'];}?>">
	</div>
	<div class="form-group">
		<label for="session_name_id">Session_name_id</label><?php echo form_error('session_name_id'); ?>
		<input type="text" class="form-control" name="session_name_id" value="<?php if(set_value('session_name_id') != NULL){echo set_value('session_name_id');}else{echo $attendance['session_name_id'];}?>">
	</div>
	<div class="form-group">
		<label for="attendance">Attendance</label><?php echo form_error('attendance'); ?>
		<input type="text" class="form-control" name="attendance" value="<?php if(set_value('attendance') != NULL){echo set_value('attendance');}else{echo $attendance['attendance'];}?>">
	</div>
	<div class="form-group">
		<label for="entry_dt">Entry_dt</label><?php echo form_error('entry_dt'); ?>
		<input type="text" class="form-control" name="entry_dt" value="<?php if(set_value('entry_dt') != NULL){echo set_value('entry_dt');}else{echo $attendance['entry_dt'];}?>">
	</div>
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="<?php echo base_url('attendance');?>" class="btn btn-danger">Close</a>
</form>
<!-- /.form -->
  
	
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div> 