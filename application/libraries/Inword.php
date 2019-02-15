<?php
// inword.php
class Inword
{
	
	private function switc($num)
	{	
		$num = number_format($num,0,'.','');		
		$len = strlen($num);
		switch ($len )
		{
			case 1;
				return $this->one($num);				
				break;
				
			case 2;
				return $this->two($num);		
				break;	

			case 3;
				return $this->three($num);	
				break;	
				
			case 4;
				return $this->four($num);		
				break;
				
			case 5;
				return $this->five($num);		
				break;						
		
			case 6;
				return $this->six($num);		
				break;
		
			case 7;
				return $this->seven($num);		
				break;

			case 8;
				return $this->eight($num);		
				break;	
	

			case 9;
				return $this->nine($num);		
				break;

			case 10;
				return $this->ten($num);		
				break;					
		}
		

	}

	private function ten($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='hundred';
		
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 10)
			{
				$ret = $this->nine($num);
			}
			
			else
			{
				$x = substr($num,0,1);
				$y = substr($num,1,9);
			
				$m = $this->one($x). " ". $list. " ";
				$n = $this->nine($y);
				$ret = $m.$n;
				
			}
		}	
		return $ret;
	}	
	
	private function nine($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='bilion';
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 9)
			{
				$ret = $this->eight($num);
			}
			else
			{
				$x = substr($num,0,2);
				$y = substr($num,2,7);
			
				$m = $this->two($x). " ". $list. " ";
				$n = $this->seven($y);
				$ret = $m.$n;
			}
		}	
		return $ret;
	}	
	
	private function eight($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='bilion';
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 8)
			{
				$ret = $this->seven($num);
			}
			else
			{
				$x = substr($num,0,1);
				$y = substr($num,1,7);
			
				$m = $this->one($x). " ". $list. " ";
				$n = $this->seven($y);
				$ret = $m.$n;
			}
		}	
		return $ret;
	}	
	

	
	
	
	private function seven($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='lac';
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 7)
			{
				$ret = $this->six($num);
			}
			else
			{
				$x = substr($num,0,2);
				$y = substr($num,2,5);
			
				$m = $this->two($x). " ". $list. " ";
				$n = $this->five($y);
				$ret = $m.$n;
			}
		}	
		return $ret;
	}					
	
	
	
	
	
	private function six($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='lac';
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 6)
			{
				$ret = $this->five($num);
			}
			else
			{
				$x = substr($num,0,1);
				$y = substr($num,1,5);
				
				$m = $this->one($x). " ". $list. " ";
				$n = $this->five($y);
				$ret = $m.$n;
			}
		}	
		return $ret;
	}				
	
	
	
	
	private function five($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='thousand';
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 5)
			{
				$ret = $this->four($num);
			}
			else
			{
				$x = substr($num,0,2);
				$y = substr($num,2,3);
			
				$m = $this->two($x). " ". $list. " ";
				$n = $this->three($y);
				$ret = $m.$n;
			}
		}	
		return $ret;
	}			
	
	
	
	
	
	private function four($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='thousand';
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 4)
			{
				$ret = $this->three($num);
			}
			else
			{
				$x = substr($num,0,1);
				$y = substr($num,1,3);
			
				$m = $this->one($x). " ". $list. " ";
				$n = $this->three($y);
				$ret = $m.$n;
			}
		}	
		return $ret;
	}	
	
	
	
	
	
	
	private function three($num)
	{
		$num = number_format($num,0,'.','');		
		$list ='hundred';
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
			if($len < 3)
			{
				$ret = $this->two($num);
			}
			else
			{
				$x = substr($num,0,1);
				$y = substr($num,1,2);
			
				$m = $this->one($x). " ". $list. " ";
				$n = $this->two($y);
				$ret = $m.$n;
			}
		}	
		return $ret;
	}	
	
	
	
	

	
	private function two($num)
	{
		$num = number_format($num,0,'.','');		
		$list1 = array('ten', 'eleven','twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen');
		$list2 = array('twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety',);
		
		$ret = "";
		$len = strlen($num);
		if($num > 0)
		{		
				$x = substr($num,0,1);
				$y = substr($num,1,1);
				if($len == 1)
				{
					$ret = $this->one($x);
				}
				else
				{
					if($num < 20)
					{
						$ret = $list1[$num-10];
					}
					else
					{	
						$ret = $list2[$x-2]." ".$this->one($y);
					}
				}
		}
		
		return $ret;
	}	
	
	
	private function one($num)
	{
		$num = number_format($num,0,'.','');
		$list = array('one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine');
		$ret ="";
		if($num > 0)
		{
			$ret = $list[$num-1];
			
		}
		return $ret;
	}
/*  ================================ */	

	public function number($num)
	{
		
		$ret="";
		$new_num = 0;		
		if(is_numeric($num))
		{			
			$min = false;
			if($num < 0)
			{
				$new_num = ($num * -1);
				$min = "(-) ";
			}
			else
			{
				$new_num = $num;	
			}
			
			$format_num = number_format($new_num,0,'.','');
			$len = strlen($format_num);
			
			if($len > 10)
			{
				$ret="";
			
			}
			else
			{
				$str = $this->switc($format_num);
				$ret = $min. ucwords($str)." Only";
			}
		}
		else
		{
		$ret="";	
		}	
		
		return $ret;
	}	
	

}
//$inword = new Inword();
// $x = "1034568900";
// echo $inword->number($x);
?>