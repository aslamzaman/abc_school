 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	
 
 
<h1>Add New Student</h1>
<hr>
<form action="<?php echo base_url('student/save');?>" method="post">
	<div class="form-group">
		<label for="name">Name</label><?php echo form_error('name'); ?>
		<input type="text" class="form-control" name="name" value="<?php echo set_value('name');?>">
	</div>
	<div class="form-group">
		<label for="fname">Father's Name</label><?php echo form_error('fname'); ?>
		<input type="text" class="form-control" name="fname" value="<?php echo set_value('fname');?>">
	</div>
	<div class="form-group">
		<label for="mname">Mother's Name</label><?php echo form_error('mname'); ?>
		<input type="text" class="form-control" name="mname" value="<?php echo set_value('mname');?>">
	</div>
	<div class="form-group">
		<label for="address">Address</label><?php echo form_error('address'); ?>
		<input type="text" class="form-control" name="address" value="<?php echo set_value('address');?>">
	</div>
	<div class="form-group">
		<label for="mobile">Mobile</label><?php echo form_error('mobile'); ?>
		<input type="text" class="form-control" name="mobile" value="<?php echo set_value('mobile');?>">
	</div>
	<div class="form-group">
		<label for="bdate">Birth Date</label><?php echo form_error('bdate'); ?>
		<input type="date" class="form-control" name="bdate" value="<?php echo set_value('bdate');?>">
	</div>
	<div class="form-group">
		<label for="sex_id">Sex</label>
		<select class="form-control" name="sex_id">
			<?php echo $sex;?>
		</select>
	</div>
	<div class="form-group">
		<label for="school_name">School Name</label><?php echo form_error('school_name'); ?>
		<input type="text" class="form-control" name="school_name" value="<?php echo set_value('school_name');?>">
	</div>
	<div class="form-group">
		<label for="class_name_id">Class</label>
		<select class="form-control" name="class_name_id">
			<?php echo $class_name;?>
		</select>
	</div>
	<div class="form-group">
		<label for="marks">Marks</label><?php echo form_error('marks'); ?>
		<input type="number" class="form-control" name="marks" value="<?php echo set_value('marks');?>">
	</div>
	<div class="form-group">
		<label for="position">Position</label><?php echo form_error('position'); ?>
		<input type="text" class="form-control" name="position" value="<?php echo set_value('position');?>">
	</div>
	<div class="form-group">
		<label for="remarks">Remarks</label><?php echo form_error('remarks'); ?>
		<input type="text" class="form-control" name="remarks" value="<?php echo set_value('remarks');?>">
	</div>
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="<?php echo base_url('student');?>" class="btn btn-danger">Close</a>
</form>
<!-- /.form -->


 

 
	
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div> 