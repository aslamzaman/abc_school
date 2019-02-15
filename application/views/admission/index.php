 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	

<h1>Admission Information</h1>
<hr>
<a href="<?php echo base_url('admission/add');?>" class="btn btn-primary">Add New</a>
<p class="text-danger"><i>
	<?php
	if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	else
	{
		echo "Admission List";		
	}	
	?>
</i></p>    
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr class='bg-info'>
				<th class='text-center'>Roll</th>
				<th class='text-center'>Student</th>
				<th class='text-center'>Class</th>
				<th class='text-center'>Section</th>
				<th class='text-right'>Actions</th>
			</tr>
		</thead>                
		<tbody>
			<?php 
			if($admissions)
			{ 
				foreach ($admissions as $admission)
				{
					$id = $admission['id'];
					$id1 = $admission['student_id'];
					$id2 = $admission['class_name_id'];
					$id3 = $admission['section_id'];

					
					$t 		= strtotime(date("Y-m-d")) - strtotime($admission['entry_dt']);
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
						$link_update 	= base_url('admission/edit/'.$id.'/'.$id1.'/'.$id2.'/'.$id3);
						$link_delete 	= base_url('admission/remove/'.$id);
					}					
					?>
					<tr>
						<td class='text-center'><?php echo $admission['class_roll'];?></td>						
						<td class='text-center'><?php echo $admission['student'];?></td>
						<td class='text-center'><?php echo $admission['class_name'];?></td>
						<td class='text-center'><?php echo $admission['section'];?></td>
						<td class='text-right' style='width:150px;'>
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
