
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	

<h1>Edit School</h1>
<hr>

<form action="<?php echo base_url('school/update');?>" method="post">
	<input type="hidden" class="form-control" name="id" value="<?php echo $school['id'];?>">
	<div class="form-group">
		<label for="name">Name</label><?php echo form_error('name'); ?>
		<input type="text" class="form-control" name="name" value="<?php if(set_value('name') != NULL){echo set_value('name');}else{echo $school['name'];}?>">
	</div>
	
	<div class="form-group">
		<label for="address">Address</label><?php echo form_error('address'); ?>
		<input type="text" class="form-control" name="address" value="<?php if(set_value('address') != NULL){echo set_value('address');}else{echo $school['address'];}?>">
	</div>
	<div class="form-group">
		<label for="mobile">Mobile</label><?php echo form_error('mobile'); ?>
		<input type="text" class="form-control" name="mobile" value="<?php if(set_value('mobile') != NULL){echo set_value('mobile');}else{echo $school['mobile'];}?>">
	</div>
	
	<div class="form-group">
		<label for="mail">Email</label><?php echo form_error('mail'); ?>
		<input type="text" class="form-control" name="mail" value="<?php if(set_value('mail') != NULL){echo set_value('mail');}else{echo $school['mail'];}?>">
	</div>
	<div class="form-group">
		<label for="web">Web</label><?php echo form_error('web'); ?>
		<input type="text" class="form-control" name="web" value="<?php if(set_value('web') != NULL){echo set_value('web');}else{echo $school['web'];}?>">
	</div>
	
	<div class="form-group">
		<label for="start_dt">Start date</label><?php echo form_error('start_dt'); ?>
		<input type="date" class="form-control" name="start_dt" value="<?php if(set_value('start_dt') != NULL){echo set_value('start_dt');}else{echo $school['start_dt'];}?>">
	</div>	
	
	<div class="form-group">
		<label for="reg_no">Reg No</label><?php echo form_error('reg_no'); ?>
		<input type="text" class="form-control" name="reg_no" value="<?php if(set_value('reg_no') != NULL){echo set_value('reg_no');}else{echo $school['reg_no'];}?>">
	</div>

	<button type="submit" class="btn btn-primary">Save</button>
	<a href="<?php echo base_url('school');?>" class="btn btn-danger">Close</a>
</form>
<!-- /.form -->
 
 
 		
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div> 