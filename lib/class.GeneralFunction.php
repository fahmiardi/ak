<?php
	class GeneralFunction {		
		//funsi tanggal ex: minggu, 13 juni 2009
		function tanggal() {
			$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
			$now_hari=date('w');
			$now_tgl=date('d');
			$now_bln=(int)date('m');
			$now_thn=date('Y');
			$hasil=$hari[$now_hari].", ".$now_tgl." ".$bulan[$now_bln]." ".$now_thn;
			return $hasil;
		}
		
		function formatTanggal($tgl) {//ex. 1/1/2009
			$split=explode("-",$tgl);
			$hasil=$split[2]."/".$split[1]."/".$split[0];
			return $hasil;
		}
		
		function formatTanggal3($tgl) {//ex. 2009-01-01 to 30/12/2009
			$split=explode("-",$tgl);
			$hasil=$split[2]."/".$split[1]."/".$split[0];
			return $hasil;
		}
		
		function formatTanggalDB($tgl) {//from 30/12/2009 to 2009-01-01
			$split=explode("/",$tgl);
			$hasil=$split[2]."-".$split[1]."-".$split[0];
			return $hasil;
		}
		
		function formatTanggal2($tgl) { //ex. 01 Desember 1986
			$bulan = array("Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
			$split=explode("-",$tgl);
			$hasil=$split[2]." ".$bulan[((int)$split[1])-1]." ".$split[0];
			return $hasil;
		}
		
		/*
		//ngebuat token
		function createRandomToken() { 
			$sumber = "abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
			srand((double)microtime()*1000000);
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}*/
		
		function createRandomToken() { 
			$token=$this->Encrypt(date('Y-m-d-H-i-s'));
			return $token;
		}
		
		function createRandomUname() { 
			$sumber = "abcdefghijkmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
			srand((double)microtime()*date("mdYHis"));
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}
		
		function createRandomPwd() { 
			$sumber = "0123456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
			srand((double)microtime()*date("mdYHis"));
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}
		
		function createRandomUser() { 
			$sumber = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz"; 
			srand((double)microtime()*date("mdYHis"));
			$i = 0; 
			while ($i <= 5)  { 
				$num = rand() % 33; 
				$char = substr($sumber, $num, 1); 
				if (!strstr($token, $char)) { 
					$token .= $char; 
					$i++; 
				} 
			} 
			return $token; 
		}
		
		//fungsi untuk menangani karakter khusus
		//@return string yang sudah di-escape
		function myMagic($str){
			if(get_magic_quotes_gpc()){
				$str = stripslashes($str);
			}
			$str = strip_tags(trim($str));
			//koneksi harus terbuka
			DB::opendb();
			return mysql_real_escape_string($str);
		}
		
		//filterisasi string dari inputan
		function filter($word) { 
			$word = (string)$this->myMagic(stripslashes(trim($word))); 
			$word = (string)nl2br($word); 
			$word = (string)htmlentities($word); 
			return $word ; 
		}
		
		//encrypt  string
		function Encrypt($str) {
			$cipher = crypt(md5($str),md5($str)) ;
			return $cipher; 
		} 
	}
?>