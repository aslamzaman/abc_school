 
<div class="container">    
  <div class="row">
    <div class="col-sm-12">
	<!--   ------------***-------------  -->
	

 <h1>School Information</h1>
<hr>
<p class="text-danger"><i>
	<?php
	if(isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	}
	else
	{
		echo "School List";		
	}	
	?>
</i></p>    
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Address</th>
				<th class='text-right'>Actions</th>
			</tr>
		</thead>                
		<tbody>
			<?php 
			
			// SELECT `id`, `name`, `address`, `mobile`, `mail`, `web`, `start_dt`, `reg_no`, `pic`, `entry_dt` FROM `school` WHERE 1			
			
			if($schools)
			{ 
				foreach ($schools as $school)
				{
					$id = $school['id'];
					$t 		= strtotime(date("Y-m-d")) - strtotime($school['entry_dt']);
					$d 		= 86400*6;
					$link_update 	= "";
					$link_delete 	= "";

					if($t > $d)
					{
						$link_update 	= "#";
						$link_delete 	= "#";
					}
					else
					{
						$link_update 	= base_url('school/edit/'.$id);
						$link_delete 	= base_url('school/remove/'.$id);
					}					
					?>
					<tr>
						<td><?php echo $school['name'];?></td>
						<td>
							<?php
								echo $school['address'];
								echo '<br>';
								echo 'Mobile: '.$school['mobile'];
								echo '<br>';
								echo 'Email: '.$school['mail'].'; Web:'.$school['web'];
								echo '<br>';
								echo 'Start: '.$school['start_dt'].'; Reg. No.'.$school['reg_no'];
							?>
						</td>
						<td class='text-right' style='width:70px;'>
						  <a href="<?php echo $link_update;?>" class="btn btn-success btn-sm">Update</a>
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
