<?php	
	class User {
		var $token="";
		
		function setToken($token) {
			$this->token=$token;
		}
		
		function getToken() {
			return $this->token;
		}
		
		function otentikasi() {
			$DB=new DB();
			$auth=false;
			if(strpos($token, ';')) {
				die('Naughty...');
			}	
			$sqlAuth="	SELECT token 
						FROM peg_user 
						WHERE token='".$this->token."'";
			$DB->executeQuery($sqlAuth);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$auth=true;
				}
			}
			return $auth;
		}
		
		function getLevel() {
			$DB=new DB();
			$sqlLevel="	SELECT idLevel 
						FROM peg_user 
						WHERE token='".$this->token."'";
			$DB->executeQuery($sqlLevel);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowLevel=$DB->getResult();	
				}
			}
			return $rowLevel['idLevel'];
		}
		
		function getNamaLevel() {
			$DB=new DB();
			$sqlUname="	SELECT L.namaLevel  
						FROM peg_user U, peg_level L 
						WHERE U.token='".$this->token."' 
						AND U.idLevel=L.idLevel";
			$DB->executeQuery($sqlUname);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowUname=$DB->getResult();	
				}
			}
			return $rowUname['namaLevel'];
		}
		
		function getNamaAdmin() {
			$DB=new DB();
			$sqlUname="	SELECT namaAdmin 
						FROM peg_user 
						WHERE token='".$this->token."'";
			$DB->executeQuery($sqlUname);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowUname=$DB->getResult();	
				}
			}
			return $rowUname['namaAdmin'];
		}
		
		function getUsername() {
			$DB=new DB();
			$sqlUname="	SELECT userName  
						FROM peg_user 
						WHERE token='".$this->token."'";
			$DB->executeQuery($sqlUname);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowUname=$DB->getResult();	
				}
			}
			return $rowUname['userName'];
		}
		
		function getDosen() {
			$DB=new DB();			
			$sqlDos="	SELECT P.namaPeg 
						FROM peg_pegawai P, peg_user U 
						WHERE U.token='".$this->token."' 
						AND U.userName=P.nip";
			$DB->executeQuery($sqlDos);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowDos=$DB->getResult();
				}
			}
			return $rowDos['namaPeg'];
		}
		
		function getNIP() {
			$DB=new DB();
			$sqlNip="	SELECT P.nip 
						FROM peg_pegawai P, peg_user U 
						WHERE U.token='".$this->token."' 
						AND U.userName=P.nip";
			$DB->executeQuery($sqlNip);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowNip=$DB->getResult();
				}
			}
			return $rowNip['nip'];
		}
		
		function getPWD() {
			$DB=new DB();
			$sqlNip="	SELECT pwdHash 
						FROM peg_user 
						WHERE token='".$this->token."'";
			$DB->executeQuery($sqlNip);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowNip=$DB->getResult();
				}
			}
			return $rowNip['pwdHash'];
		}
	}
?>