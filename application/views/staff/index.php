 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	
<h1>Teacher Information</h1>
<hr>
<a href="<?php echo base_url('teacher/add');?>" class="btn btn-primary">Add New</a>
<p class="text-danger"><i>
	<?php
	if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	else
	{
		echo "Teacher List";		
	}	
	?>
</i></p>    
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Name</th>
				<th class='text-center'>Post</th>
				<th class='text-center'>Mobile</th>
				<th class='text-right'>Actions</th>
			</tr>
		</thead>                
		<tbody>
			<?php 
			if($teachers)
			{ 
				foreach ($teachers as $teacher)
				{
					$id = $teacher['id'];
					$t 		= strtotime(date("Y-m-d")) - strtotime($teacher['entry_dt']);
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
						$link_update 	= base_url('teacher/edit/'.$id);
						$link_delete 	= base_url('teacher/remove/'.$id);
					}
					?>
					<tr>
						<td>
							<a href="<?php echo base_url('teacher/img_edit/'.$id);?>">
								<img src="<?php echo base_url('assets/pic/teacher/').$teacher['pic'];?>" class="img-responsive" width="70" style="display:block;margin:auto;">
							</a>
						</td>					
				
						<td><?php echo $teacher['id'].'. '.$teacher['name'];?></td>
						<td class='text-center'><?php echo $teacher['designation'];?></td>
						<td class='text-center'><?php echo $teacher['mobile'];?></td>
						<td class='text-right' style='width:210px;'>
						  <a href="<?php echo base_url('teacher/view/'.$id);?>" class="btn btn-primary btn-sm">View</a>
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
