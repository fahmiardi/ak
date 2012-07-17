<?php
	class AngkaKredit {	
		function getTotalKUM() {			
			global $user;
			global $DB;
			
			$sqlKUM="	SELECT P.totalKUM 
						FROM peg_pegawai P, peg_user U 
						WHERE U.token='".$user->getToken()."' 
						AND U.userName=P.nip";
			$DB->executeQuery($sqlKUM);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowKUM=$DB->getResult();
				}
			}
			return $rowKUM['totalKUM'];
		}

		function getKUMPangkat() {			
			global $user;
			global $DB;
			
			$sqlKUM="	SELECT K.perolehanKUM 
						FROM peg_pegawai P, peg_user U, peg_kepangkatan K 
						WHERE U.token='".$user->getToken()."' 
						AND U.userName=P.nip 
						AND P.nip=K.nip 
						AND active='1'";
			$DB->executeQuery($sqlKUM);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowKUM=$DB->getResult();
				}
			}
			return $rowKUM['perolehanKUM'];
		}
		
		function getPangkatSekarangString() {
			global $user;
			global $DB;
			
			$sqlPangkat="	SELECT P.namaPangkat, G.syaratKUM 
							FROM pang_pangkat P, pang_golongan G, peg_pegawai Pg, peg_user U, peg_kepangkatan K 
							WHERE P.idPangkat=G.idPangkat 
							AND G.idGolongan=K.idGolongan 
							AND K.nip=Pg.nip 
							AND U.token='".$user->getToken()."' 
							AND U.userName=Pg.nip 
							AND K.active='1'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return ucwords($rowPangkat['namaPangkat'])." ".$rowPangkat['syaratKUM'];
		}
		
		function getPangkatID() {
			global $user;
			global $DB;
			
			$sqlPangkat="	SELECT P.idPangkat  
							FROM peg_pegawai Pg, peg_user U, peg_kepangkatan K, pang_pangkat P, pang_golongan G 
							WHERE K.nip=Pg.nip 
							AND U.token='".$user->getToken()."' 
							AND U.userName=Pg.nip 
							AND K.active='1' 
							AND G.idGolongan=K.idGolongan 
							AND G.idPangkat=P.idPangkat";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return $rowPangkat['idPangkat'];
		}
		
		function getPangkatSekarangID() {
			global $user;
			global $DB;
			
			$sqlPangkat="	SELECT K.idGolongan 
							FROM peg_pegawai Pg, peg_user U, peg_kepangkatan K 
							WHERE K.nip=Pg.nip 
							AND U.token='".$user->getToken()."' 
							AND U.userName=Pg.nip 
							AND K.active='1'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return $rowPangkat['idGolongan'];
		}
		
		function getRankingGolongan() {
			global $user;
			global $DB;
			
			$sqlPangkat="	SELECT G.rankingGolongan 
							FROM pang_golongan G, peg_pegawai Pg, peg_user U, peg_kepangkatan K 
							WHERE G.idGolongan=K.idGolongan 
							AND K.nip=Pg.nip 
							AND K.active='1' 
							AND U.token='".$user->getToken()."' 
							AND U.userName=Pg.nip";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return $rowPangkat['rankingGolongan'];
		}
		
		function getRankingPangkatBatasNaikReguler() {
			global $DB;
			
			$naik=$this->getRankingPangkat()-1;
			if($naik!=0||$naik!=1) {
				$sqlBatas="	SELECT G.rankingGolongan 
							FROM pang_pangkat P, pang_golongan G 
							WHERE P.idPangkat=G.idPangkat 
							AND P.rankingPangkat ='".$naik."'";
				$DB->executeQuery($sqlBatas);
				if($DB->rs()) {
					while($rowBatas=$DB->getResult()) {
						$kantong[]=(int)$rowBatas['rankingGolongan'];
					}				
				}
				if(count($kantong)!=0) {
					$batas=MIN($kantong);
				}
			}
			else {
				$batas=$this->getRankingGolongan()-1;
			}
			return $batas;
		}
		
		function getRankingPangkat() {
			global $user;
			global $DB;
			
			$sqlPangkat="	SELECT P.rankingPangkat 
							FROM pang_golongan G, peg_pegawai Pg, peg_user U, pang_pangkat P, peg_kepangkatan K 
							WHERE P.idPangkat=G.idPangkat 
							AND G.idGolongan=K.idGolongan 
							AND K.nip=Pg.nip 
							AND U.token='".$user->getToken()."' 
							AND U.userName=Pg.nip 
							AND active='1'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return $rowPangkat['rankingPangkat'];
		}
		
		function getPangkatYangDipilihString($id) {
			global $DB;
			
			$sqlPangkat="	SELECT P.namaPangkat 
							FROM pang_pangkat P, pang_golongan G 
							WHERE P.idPangkat=G.idPangkat 
							AND G.idGolongan='".$id."'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return ucwords($rowPangkat['namaPangkat']);
		}
		
		function getPangkatYangDipilihID($id) {
			global $DB;
			
			$sqlPangkat="	SELECT idGolongan 
							FROM pang_golongan 
							AND G.idGolongan='".$id."'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return $rowPangkat['idGolongan'];
		}
		
		function getSyaratKUMyangDipilih($id) {
			global $DB;
			
			$sqlPangkat="	SELECT G.syaratKUM 
							FROM pang_pangkat P, pang_golongan G 
							WHERE P.idPangkat=G.idPangkat 
							AND G.idGolongan='".$id."'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return $rowPangkat['syaratKUM'];
		}
		
		function getKurangKUMyangDipilih($id) {
			return $this->getSyaratKUMyangDipilih($id)-$this->getTotalKUM();
		}
		
		function getSkenarioID($id) {
			global $DB;
			
			$sqlSken="	SELECT idSkenario 
						FROM ak_skenario 
						WHERE idKenaikan='".$id."' 
						AND active='1'";
			$DB->executeQuery($sqlSken);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowSken=$DB->getResult();
				}
			}
			return $rowSken['idSkenario'];
		}
		
		function getParentKategori($kd) {
			
		}
	}
?>