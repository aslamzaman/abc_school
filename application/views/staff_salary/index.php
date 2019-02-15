 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	

 <h1>Student Information</h1>
<hr>
<a href="<?php echo base_url('staff_salary/add');?>" class="btn btn-primary">Add New</a>
<p class="text-danger"><i>
	<?php
	if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	else
	{
		echo "Student List";		
	}	
	?>
</i></p>    
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>ID</th>
				<th>Name</th>
				<th>Fname</th>
				<th>Mobile</th>
				<th class='text-right'>Actions</th>
			</tr>
		</thead>                
		<tbody>
			<?php 
			if($students)
			{ 
				foreach ($students as $student)
				{
					$id = $student['id'];
					$t 		= strtotime(date("Y-m-d")) - strtotime($student['entry_dt']);
					$d 		= 86400*30;
					$link_update 	= "";
					$link_delete 	= "";
					if($t > $d)
					{
						$link_update 	= "#";
						$link_delete 	= "#";
					}
					else
					{
						$link_update 	= base_url('student/edit/'.$id.'/'.$student['sex_id'].'/'.$student['class_name_id']);
						$link_delete 	= base_url('student/remove/'.$id);
					}
					?>
					<tr>
						
						<td>
							<a href="<?php echo base_url('student/img_edit/'.$id);?>">
								<img src="<?php echo base_url('assets/pic/student/').$student['pic'];?>" class="img-responsive" width="70" style="display:block;margin:auto;">
							</a>
						</td>
						<td><?php echo $student['id'];?></td>
						<td><?php echo $student['name'];?></td>
						<td><?php echo $student['fname'];?></td>
						<td><?php echo $student['mobile'];?></td>						
						<td class='text-right' style='width:210px;'>
						  <a href="<?php echo base_url('student/view/'.$id);?>" class="btn btn-primary btn-sm">View</a>
						  <a href="<?php echo $link_update;?>" class="btn btn-success btn-sm">Update</a>
						  <a href="<?php echo $link_delete;?>" class="btn btn-warning btn-sm">Delete</a>
						</td>
					</tr>
					<?php 
				}
			}
			?>
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->
 
 

 
 
	
	<!--   ------------***-------------  -->
    </div>
  </div>
</div>
