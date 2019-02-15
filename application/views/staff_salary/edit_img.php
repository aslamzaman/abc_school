
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	

		<div class="row">
			<div class="col-sm-3"></div>
			
			<div class="col-sm-6">

				<h1 class="text-center">Student Information</h1>
				<hr>
				<h4 class="text-center"><?php echo $student['name'];?></h4>
				
				<form action="<?php echo base_url('student/img_save/'.$student['id']);?>" method="post" enctype="multipart/form-data">
					<label for="student_img">Select jpg or gif file maximum size 252px &times 336px (70kb):</label>
					<input type="file" name="student_img">
					<br>
					<input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
					<a href="<?php echo base_url('student');?>" class="btn btn-danger">Close</a>
				
				</form>
			</div>
			
			<div class="col-sm-3"></div>
		</div>	
	
 
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div> 