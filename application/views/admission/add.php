 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	
 
<h1>Add New</h1>
<hr>
<form action="<?php echo base_url('admission/save');?>" method="post">
	<div class="form-group">
		<label for="student_id">Student</label>
		<select class="form-control" name="student_id" >
			<?php echo $student;?>
		</select>
	</div>
	<div class="form-group">
		<label for="class_name_id">Class</label>
		<select class="form-control" name="class_name_id" >
			<?php echo $class_name;?>
		</select>	
	</div>
	<div class="form-group">
		<label for="section_id">Section</label>
		<select class="form-control" name="section_id" >
			<?php echo $section;?>
		</select>	
	</div>
	<div class="form-group">
		<label for="class_roll">Class Roll</label><?php echo form_error('class_roll'); ?>
		<input type="text" class="form-control" name="class_roll" value="<?php echo set_value('class_roll');?>">
	</div>
	<button type="submit" class="btn btn-primary">Save</button>
	<a href="<?php echo base_url('admission');?>" class="btn btn-danger">Close</a>
</form>
<!-- /.form -->


 

 
	
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div> 