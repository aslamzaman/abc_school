
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	

<h1>Edit Teacher</h1>
<hr>
<form action="<?php echo base_url('teacher/update');?>" method="post">
	<input type="hidden" class="form-control" name="id" value="<?php echo $teacher['id'];?>">
	<div class="form-group">
		<label for="name">Name</label><?php echo form_error('name'); ?>
		<input type="text" class="form-control" name="name" value="<?php if(set_value('name') != NULL){echo set_value('name');}else{echo $teacher['name'];}?>">
	</div>
	<div class="form-group">
		<label for="fname">Fname</label><?php echo form_error('fname'); ?>
		<input type="text" class="form-control" name="fname" value="<?php if(set_value('fname') != NULL){echo set_value('fname');}else{echo $teacher['fname'];}?>">
	</div>
	<div class="form-group">
		<label for="mname">Mname</label><?php echo form_error('mname'); ?>
		<input type="text" class="form-control" name="mname" value="<?php if(set_value('mname') != NULL){echo set_value('mname');}else{echo $teacher['mname'];}?>">
	</div>
	<div class="form-group">
		<label for="address">Address</label><?php echo form_error('address'); ?>
		<input type="text" class="form-control" name="address" value="<?php if(set_value('address') != NULL){echo set_value('address');}else{echo $teacher['address'];}?>">
	</div>
	<div class="form-group">
		<label for="mobile">Mobile</label><?php echo form_error('mobile'); ?>
		<input type="text" class="form-control" name="mobile" value="<?php if(set_value('mobile') != NULL){echo set_value('mobile');}else{echo $teacher['mobile'];}?>">
	</div>
	<div class="form-group">
		<label for="bdate">Bdate</label><?php echo form_error('bdate'); ?>
		<input type="text" class="form-control" name="bdate" value="<?php if(set_value('bdate') != NULL){echo set_value('bdate');}else{echo $teacher['bdate'];}?>">
	</div>
	<div class="form-group">
		<label for="sex_id">Sex_id</label><?php echo form_error('sex_id'); ?>
		<input type="text" class="form-control" name="sex_id" value="<?php if(set_value('sex_id') != NULL){echo set_value('sex_id');}else{echo $teacher['sex_id'];}?>">
	</div>
	<div class="form-group">
		<label for="max_qualification">Max_qualification</label><?php echo form_error('max_qualification'); ?>
		<input type="text" class="form-control" name="max_qualification" value="<?php if(set_value('max_qualification') != NULL){echo set_value('max_qualification');}else{echo $teacher['max_qualification'];}?>">
	</div>
	<div class="form-group">
		<label for="designation">Designation</label><?php echo form_error('designation'); ?>
		<input type="text" class="form-control" name="designation" value="<?php if(set_value('designation') != NULL){echo set_value('designation');}else{echo $teacher['designation'];}?>">
	</div>
	<div class="form-group">
		<label for="remarks">Remarks</label><?php echo form_error('remarks'); ?>
		<input type="text" class="form-control" name="remarks" value="<?php if(set_value('remarks') != NULL){echo set_value('remarks');}else{echo $teacher['remarks'];}?>">
	</div>
	<div class="form-group">
		<label for="pic">Pic</label><?php echo form_error('pic'); ?>
		<input type="text" class="form-control" name="pic" value="<?php if(set_value('pic') != NULL){echo set_value('pic');}else{echo $teacher['pic'];}?>">
	</div>
	<div class="form-group">
		<label for="entry_dt">Entry_dt</label><?php echo form_error('entry_dt'); ?>
		<input type="text" class="form-control" name="entry_dt" value="<?php if(set_value('entry_dt') != NULL){echo set_value('entry_dt');}else{echo $teacher['entry_dt'];}?>">
	</div>
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="<?php echo base_url('teacher');?>" class="btn btn-danger">Close</a>
</form>
<!-- /.form -->
 
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div> 