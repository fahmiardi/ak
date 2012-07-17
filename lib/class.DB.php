<?php
	class DB {
		//instantiasi
		var $query="";
		
		//fungsi membuka koneksi ke server
		function opendb() {
			//ambil variabel dari file config.php
			global $server_host;
			global $server_username;
			global $server_password;
			global $server_db;
			
			//memulai koneksi ke server
			$connect=mysql_connect($server_host, $server_username, $server_password)or die($this->error());
			if($connect) {
				//menentukan database yang digunakan
				mysql_select_db($server_db);
				//mengembalikan string connect
				return $connect;
			}
		}
		
		//fungsi menutup koneksi
		function closedb() {
			//mengembalikan string menutup koneksi
			return mysql_close($this->opendb());
		}
		
		//fungsi error
		function error() {
			//mengembalikan fungsi error
			return mysql_error();
		}
		
		//fungsi eksekusi query
		function executeQuery($query) {
			//mengisi query
			$this->query=mysql_query($query,$this->opendb())or die($this->error());
		}		
		
		//fungsi cek null; digunakan untuk query tipe INPUT, UPDATE, dan DELETE
		function notNull() {
			//memastikan bahwa query benar
			if($this->query!=null) {
				//instantiasi TRUE jika query tidak NULL
				$null=true;
			}
			else {
				//instantiasi FALSE jika query NULL
				$null=false;
			}
			//mengembalikan nilai bolean
			return $null;
		}
		
		//fungsi mengembalikan jumlah
		function getRows() {
			//memastikan bahwa query benar
			if($this->notNull()) {
				//mengembalikan jumlah
				return mysql_num_rows($this->query);
			}
		}
		
		//fungsi mengecek jumlah != 0
		function rs() {
			//instantiasi jumlah
			$rs=$this->getRows();
			//memastikan jumlah tidak 0
			if($rs>0) {
				//instantiasi TRUE jika jumlah > 0
				$auth=true;	
			}
			else {
				//instantiasi FALSE jika jumlah < 0
				$auth=false;	
			}
			//mengembalikan nilai boolean
			return $auth;
		}		
		
		//fungsi mengembalikan hasil
		function getResult() {
			//memecah record menjadi array
			return mysql_fetch_array($this->query);
		}
		
		function getQuery() {
			return $this->query;
		}
	}
?>