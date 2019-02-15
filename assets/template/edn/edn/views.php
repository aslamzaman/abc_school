<?php
ini_set('max_execution_time', 300);
date_default_timezone_set("Asia/Dhaka");
include "header.php";
include "conn.php";
include "custom.php";


$dt2=date("Y-m-d H:i:s");
$dts1=strtotime($dt2);
$dts2=$dts1-(86400*1);
$dt1=date("Y-m-d H:i:s",$dts2);
//echo my_date_dot($dt1)."/".my_date_dot($dt2);

$dist_gt= fieldcount("SELECT DISTINCT views_address FROM `views`");

$dist24=fieldcount("SELECT DISTINCT views_address FROM `views` WHERE views_dt_time BETWEEN '$dt1' AND '$dt2'");
$dist_all=fieldcount("SELECT * FROM `views`");

?>
			<div class="col-sm-4">		
				<div  class="well">	
					<div  class="table-responsive">	
						<h3 class="text-center">24 Hours Reports</h3>
						<p class="text-center"><kbd id="total"><?php echo "$dist_all/$dist24/$dist_gt"?></kbd></p>
						<p class="text-center"><?php $tdt1=strtotime(date("Y-m-d"));$tdt2=strtotime("2016-02-24"); echo "Age: 24.02.2016 to ". my_date_dot($dt2). " = ".round((($tdt1-$tdt2)/86400)+1);?></p>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>SL</th>
									<th>IP Address</th>
									<th>Date Time</th>
								</tr>
							</thead>						
							<tbody>
<?php
$sql="SELECT *FROM `views` ORDER BY `views_id` DESC LIMIT 20";
$result=mysqli_query($conn, $sql);
$Numrows=mysqli_num_rows($result);	
if ($Numrows > 0)
{
	while ($rows=mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$rows["views_id"]."</td>";
		echo "<td>".$rows["views_address"]."</td>";																
		echo "<td>".$rows["views_dt_time"]."</td>";
		echo "</tr>";
	}
}
?>
							</tbody>
						</table>
					</div> <!-- table responsive -->
				</div><!-- well -->
			</div> <!-- row end -->	


			
			<div class="col-sm-8">
				<div  class="well">	
					<p class="text-center"><kbd><?php $totlreg=fieldcount("SELECT * FROM `pw_user`"); echo "Total Registrations: $totlreg";?></kbd></p>				
					<div  class="table-responsive">
					<p class="bg-primary lead">Comments</p>				
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Date Time</th>									
									<th>IP</th>
									<th>Comments</th>
								</tr>
							</thead>						
							<tbody>	
<?php
$sql2="SELECT * FROM `comments` ORDER BY `comments_id` DESC LIMIT 20";
$result2=mysqli_query($conn, $sql2);
$Numrows2=mysqli_num_rows($result2);	
if ($Numrows2 > 0)
{
	while ($rows2=mysqli_fetch_array($result2))
	{
		echo "<tr>";
		echo "<td>".$rows2["comments_dt_time"]."</td>";	
		echo "<td>".$rows2["comments_ip"]."</td>";		
		echo "<td>".$rows2["comments"]."</td>";
		echo "</tr>";
	}
}
mysqli_close($conn);
?>
							</tbody>
						</table>
					</div> <!-- table responsive -->
				</div><!-- well -->
			</div> <!-- row end -->					

				<div class="col-sm-12">
					<div id="footer">Copyright © www.mydatait.com</div>
				</div>
			</div>	
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>
</body>
</html>