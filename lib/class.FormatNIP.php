<?php
	class FormatNIP {
		function nipLama($nip) {
			$strArray=str_split($nip);
			
			$str1=substr($nip,0,3);
			$str2=substr($nip,3,3);
			$str3=substr($nip,6,3);
			
			return $str1." ".$str2." ".$str3;
		}
		
		function nipBaru($nip) {
			$strArray=str_split($nip);
			
			$str1=substr($nip,0,8);
			$str2=substr($nip,8,6);
			$str3=substr($nip,14,1);
			$str4=substr($nip,15,3);
			
			return $str1." ".$str2." ".$str3." ".$str4;
		}
		
		function nipFormat($nip) {
			$panjang=strlen($nip);
			if($panjang==9) {
				return $this->nipLama($nip);
			}
			elseif($panjang==18) {
				return $this->nipBaru($nip);
			}
			else {
				return $nip;
			}
		}
	}
	
	/*	
	20100101 200809 1 001
	0 1 2 3 4 5 6 7      8 9 10 11 12 13      14      15 16 17
	
	150 077 526
	0 1 2     3 4 5     6 7 8
	*/
?>