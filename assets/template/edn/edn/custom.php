<script>
function checkdate(dt)
{
	var df = dt.split("-");
	var df1 = df[2];
	
	var d = new Date(dt);
	var d1 = d.getDate();
	if (df1 == d1)
	{
		return 1;
	}
	else
	{
		return 0;
	};
};

function datebetween(date1,date2,date3)
{
	var d1 = new Date(date1); // Date variable by user 
	var d2 = new Date(date2); // Date fixed starting, between two date
	var d3 = new Date(date3); // Date fixed ending, between two date

	var ms1 = d1.getTime();
	var ms2 = d2.getTime();
	var ms3 = d3.getTime();

	if (ms1 < ms2)
	{
		return 0;
	}
	else if (ms1  > ms3)
	{
		return 0;
	}
	else
	{
		return 1;
	}

};
function checkdategreater(dt1,dt2)
{
	var d1 = new Date(dt1);  // First Date variable 
	var d2 = new Date(dt2); // Second Date variable 
	
	var ms1 = d1.getTime();
	var ms2 = d2.getTime();
	
	if (ms1 > ms2)
	{
		return 0;
	}
	else
	{
		return 1;
	};
};
</script>
<?php
function i_day($date)
{
	$test = strtotime($date);
	$d= date("d",$test);
	$a=1;
	while ($a < 32)
	{
		if ($d==$a)
		{
			echo "<option value=" . substr(("00".$a),-2)  ." selected>" . substr(("00".$a),-2)."</option>"."\n";
		}
		else
		{
			echo "<option value=" . substr(("00".$a),-2)  .">" .  substr(("00".$a),-2)."</option>"."\n";		
		};
		$a++;
	};
};


function i_month($date)
{
	$test = strtotime($date);
	$m= date("n",$test);
	$a=1;
	while ($a < 13)
	{
		if ($m==$a)
		{
			echo "<option value=" . substr(("00".$a),-2)  ." selected>" . substr(("00".$a),-2)."</option>"."\n";
		}
		else
		{
			echo "<option value=" . substr(("00".$a),-2)  .">" .  substr(("00".$a),-2)."</option>"."\n";		
		};
		$a++;
	};
};

function i_year($date)
{
	$test = strtotime($date);
	$y= date("Y",$test);

 	$c=1960;
	while ($c < 2036)
	{
		if ($y==$c)
		{
			echo "<option value=" . $c  ." selected>" . $c."</option>"."\n";
		}
		else
		{
			echo "<option value=" . $c  .">" . $c."</option>"."\n";		
		};
		$c++;
	};

};
//===============date_A===============================================
function datepickerA($dt1){
?>
<table width="100%">
	<tr>
		<td>
		<select class="form-control" id="d1" name="d1" >
			<?php echo i_day($dt1); ?>						
		</select>
		</td>
		<td>
		<select class="form-control" id="m1" name="m1" >
			<?php echo i_month($dt1); ?>						
		</select>	
		</td>
		<td>
		<select class="form-control" id="y1" name="y1" >
			<?php echo i_year($dt1); ?>						
		</select>		
		</td>
	</tr>
</table>
<?php
};
//===============date_B===============================================
function datepickerB($dt2){
?>
<table width="100%">
	<tr>
		<td>
		<select class="form-control" id="d2" name="d2" >
			<?php echo i_day($dt2); ?>						
		</select>
		</td>
		<td>
		<select class="form-control" id="m2" name="m2" >
			<?php echo i_month($dt2); ?>						
		</select>	
		</td>
		<td>
		<select class="form-control" id="y2" name="y2" >
			<?php echo i_year($dt2); ?>						
		</select>		
		</td>
	</tr>
</table>
<?php
};
//===============date_B===============================================
function datepickerC($dt3){
?>
<table width="100%">
	<tr>
		<td>
		<select class="form-control" id="d3" name="d3" >
			<?php echo i_day($dt3); ?>						
		</select>
		</td>
		<td>
		<select class="form-control" id="m3" name="m3" >
			<?php echo i_month($dt3); ?>						
		</select>	
		</td>
		<td>
		<select class="form-control" id="y3" name="y3" >
			<?php echo i_year($dt3); ?>						
		</select>		
		</td>
	</tr>
</table>
<?php
};
//===============date_B===============================================
function datepickerD($dt4){
?>
<table width="100%">
	<tr>
		<td>
		<select class="form-control" id="d4" name="d4" >
			<?php echo i_day($dt4); ?>						
		</select>
		</td>
		<td>
		<select class="form-control" id="m4" name="m4" >
			<?php echo i_month($dt4); ?>						
		</select>	
		</td>
		<td>
		<select class="form-control" id="y4" name="y4" >
			<?php echo i_year($dt4); ?>						
		</select>		
		</td>
	</tr>
</table>
<?php
};
//===============date_to===============================================
function datepickerTo($sd1,$sd2){
?>
<table width="100%">
	<tr>
		<td class="text-center"><?php echo datepickerA($sd1);?></td>
		<td class="text-center">&nbsp; To &nbsp;</td>
		<td class="text-center"><?php echo datepickerB($sd2);?></td>
	</tr>
</table>		
<?php
};
//===============Service Age===============================================
function days_to_month_year($az_days)
{
	$az_years_dot=$az_days/365;
	$az_years_f=explode(".",$az_years_dot); 

	$az_months_dot=(($az_years_dot-$az_years_f[0])*365)/30;
	$az_months_f=explode(".",$az_months_dot);
	$az_days_dot=($az_months_dot-$az_months_f[0])*30;
return array($az_years_f[0],$az_months_f[0],$az_days_dot);	
};
//---------------------------------------------------------------------------
function my_age($i_dF1,$i_dF2,$addDays)
{
	$d1=strtotime($i_dF1);
	$d2=strtotime($i_dF2);	
	$d3=($d2-$d1);
	$days_include=($d3/86400)+$addDays;
	$az_full_MonthYear=days_to_month_year($days_include);
$full_string="$az_full_MonthYear[0]y $az_full_MonthYear[1]m ". round($az_full_MonthYear[2])."d";
return $full_string;
}
//===============date_dot===============================================
function my_date_dot($i_dF1)
{
	$d1=strtotime($i_dF1);
	$dt2=date("d.m.Y",$d1);
	return $dt2;
}
//===============Edit Restrictions===============================================
function edit_restricted($entry_dt)
{
	$d1=strtotime($entry_dt);
	$dt2=strtotime(date("Y-m-d"));
	$diff=round(($dt2-$d1)/86400)+1;	
	return $diff;
}
function datediff($dtx,$dty,$day)
{
	$d1=strtotime($dtx);
	$dt2=strtotime($dty);
	$diff=round(($dt2-$d1)/86400)+$day;	
	return $diff;
}

function dateadd($dtx,$day)
{
	$d1=strtotime($dtx) + ($day*86400);
	$mydate=date("Y-m-d",$d1);	
	return $mydate;
}

//=====================================================================================
//=====================================================================================
function myfield($sql)
{
	global $conn;
	$rtrn="";	
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		$rows=mysqli_fetch_array($result);
		$rtrn=$rows[0];
	}
	else
	{
		$rtrn="";
	}
	return $rtrn;
};
function combox($sql,$selected)
{
	global $conn;
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{
			if ($selected == $rows[0])
			{
				echo "<option value='". $rows[0] . "' selected>". $rows[0]."</option>\n";
			}
			else
			{
				echo "<option value='". $rows[0] . "'>". $rows[0]."</option>"."\n";
			};
		};
	}
};
function combox1($sql,$selected)
{
	global $conn;
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{
			if ($selected == $rows[0])
			{
				echo "<option value='". $rows[0] . "' selected>". $rows[1]."</option>\n";
			}
			else
			{
				echo "<option value='". $rows[0] . "'>". $rows[1]."</option>"."\n";
			};
		};
	}
};

function combox2($sql,$selected)
{
	global $conn;
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{
			if ($selected == $rows[0])
			{
				echo "<option value='". $rows[0] . "' selected>". $rows[1].". ". $rows[2]."</option>\n";
			}
			else
			{
				echo "<option value='". $rows[0] . "'>". $rows[1].". ". $rows[2]."</option>"."\n";
			};
		};
	}
};

function combox3($sql,$selected)
{
	global $conn;
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{
			if ($selected == $rows[0])
			{
				echo "<option value='". $rows[0] . "' selected>". $rows[1].". ". $rows[2]." (".$rows[3].")</option>\n";
			}
			else
			{
				echo "<option value='". $rows[0] . "'>". $rows[1].". ". $rows[2]." (".$rows[3].")</option>"."\n";
			};
		};
	}
};
function fieldcount($sql)
{
	global $conn;
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	return $Numrows;
};
function fieldsumavg($sql)
{
	global $conn;
	$s_sum=0;
	$s_sl=0;
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{	
		$s_sum=$s_sum + $rows[0];
		$s_sl++;
		}
	}
	else
	{
	$s_sum=0;
	}
	$st_sum= round(intval($s_sum)/intval($s_sl));
	return $st_sum;
};
function browsers($sql)
{
	global $conn;
	$result=mysqli_query($conn, $sql);
	$Numrows=mysqli_num_rows($result);
	if ($Numrows > 0)
	{
		while ($rows=mysqli_fetch_array($result))
		{
			echo "<option value='". $rows[0] . "'>\n";
		};
	}
};
?>