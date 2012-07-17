<?php
	class PropertiCetakPerolehan {		
		function getDekan() {
			global $DB;
			
			$sql="	SELECT Peg.titleDepan, Peg.namaPeg, Peg.titleBelakang 
					FROM peg_pegawai Peg, peg_menjabat M 
					WHERE Peg.nip=M.nip 
					AND M.kdJabatan='1' 
					AND M.active='1'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
				if($row['titleDepan']=="") {
					$depan="";
				}
				else {
					$depan=$row['titleDepan']." ";
				}
				if($row['titleBelakang']=="") {
					$blkng="";
				}
				else {
					$blkng=", ".$row['titleBelakang'];
				}
			}
			return $depan.$row['namaPeg'].$blkng;
		}
		
		function getNipDekan() {
			global $DB;
			
			$sql="	SELECT Peg.nip 
					FROM peg_pegawai Peg, peg_menjabat M 
					WHERE Peg.nip=M.nip 
					AND M.kdJabatan='1' 
					AND M.active='1'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
			}
			return $row['nip'];
		}
		
		function getKajur($id) {
			global $DB;
			
			$sqlCek="	SELECT Peg.kdUnitKerja 
						FROM ak_perolehan P, peg_pegawai Peg 
						WHERE P.idPerolehan='".$id."' 
						AND P.nip=Peg.nip";
			$DB->executeQuery($sqlCek);
			if($DB->getRows()==1) {
				$rowCek=$DB->getResult();
				
				$sql="	SELECT Peg.namaPeg, Peg.titleDepan, Peg.titleBelakang 
						FROM peg_pegawai Peg, peg_menjabat M 
						WHERE Peg.nip=M.nip 
						AND Peg.kdUnitKerja='".$rowCek['kdUnitKerja']."' 
						AND M.kdJabatan='2' 
						AND M.active='1'";
				$DB->executeQuery($sql);
				if($DB->getRows()==1) {
					$row=$DB->getResult();
					if($row['titleDepan']=="") {
						$depan="";
					}
					else {
						$depan=$row['titleDepan']." ";
					}
					if($row['titleBelakang']=="") {
						$blkng="";
					}
					else {
						$blkng=", ".$row['titleBelakang'];
					}
				}				
			}
			return $depan.$row['namaPeg'].$blkng;
		}
		
		function getNipKajur($id) {
			global $DB;
			
			$sqlCek="	SELECT Peg.kdUnitKerja 
						FROM ak_perolehan P, peg_pegawai Peg 
						WHERE P.idPerolehan='".$id."' 
						AND P.nip=Peg.nip";
			$DB->executeQuery($sqlCek);
			if($DB->getRows()==1) {
				$rowCek=$DB->getResult();
				
				$sql="	SELECT Peg.nip 
						FROM peg_pegawai Peg, peg_menjabat M 
						WHERE Peg.nip=M.nip 
						AND Peg.kdUnitKerja='".$rowCek['kdUnitKerja']."' 
						AND M.kdJabatan='2' 
						AND M.active='1'";
				$DB->executeQuery($sql);
				if($DB->getRows()==1) {
					$row=$DB->getResult();
					
					return $row['nip'];
				}
				
			}
		}
		
		function getPangkatKajur($id) {
			global $DB;
			global $AK;
			
			$sqlCek="	SELECT Peg.kdUnitKerja 
						FROM ak_perolehan P, peg_pegawai Peg 
						WHERE P.idPerolehan='".$id."' 
						AND P.nip=Peg.nip";
			$DB->executeQuery($sqlCek);
			if($DB->getRows()==1) {
				$rowCek=$DB->getResult();
				
				$sql="	SELECT K.idGolongan, K.pangkat, K.golRuang 
						FROM peg_pegawai Peg, peg_menjabat M, peg_kepangkatan K 
						WHERE Peg.nip=M.nip 
						AND K.nip=Peg.nip 
						AND K.active='1' 
						AND Peg.kdUnitKerja='".$rowCek['kdUnitKerja']."' 
						AND M.kdJabatan='2' 
						AND M.active='1'";
				$DB->executeQuery($sql);
				if($DB->getRows()==1) {
					$row=$DB->getResult();
					
					return $row['pangkat']." (".$row['golRuang'].") / ".$AK->getPangkatYangDipilihString($row['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($row['idGolongan']);
				}				
			}
		}
		
		function getJabatanKajur($id) {
			global $DB;
			global $unit;
			
			$sqlCek="	SELECT Peg.kdUnitKerja 
						FROM ak_perolehan P, peg_pegawai Peg 
						WHERE P.idPerolehan='".$id."' 
						AND P.nip=Peg.nip";
			$DB->executeQuery($sqlCek);
			if($DB->getRows()==1) {
				$rowCek=$DB->getResult();
				
				$sql="	SELECT J.namaJabatan 
						FROM peg_pegawai Peg, peg_menjabat M, peg_jabatan J 
						WHERE Peg.nip=M.nip 
						AND J.kdJabatan=M.kdJabatan 
						AND Peg.kdUnitKerja='".$rowCek['kdUnitKerja']."' 
						AND M.kdJabatan='2' 
						AND M.active='1'";
				$DB->executeQuery($sql);
				if($DB->getRows()==1) {
					$row=$DB->getResult();
					
					return $row['namaJabatan']." ".$unit->getJurusan($rowCek['kdUnitKerja']);
				}
				
			}
		}
		
		function getDosen($id) {
			global $DB;
			
			$sqlDos="	SELECT Peg.namaPeg, Peg.titleDepan, Peg.titleBelakang 
						FROM peg_pegawai Peg, ak_perolehan P 
						WHERE P.idPerolehan='".$id."' 
						AND P.nip=Peg.nip";
			$DB->executeQuery($sqlDos);
			if($DB->getRows()==1) {
				$rowDos=$DB->getResult();
				if($rowDos['titleDepan']=="") {
					$depan="";
				}
				else {
					$depan=$rowDos['titleDepan']." ";
				}
				if($rowDos['titleBelakang']=="") {
					$blkng="";
				}
				else {
					$blkng=", ".$rowDos['titleBelakang'];
				}
			}
			
			return $depan.$rowDos['namaPeg'].$blkng;
		}
		
		function getNipDosen($id) {
			global $DB;
			
			$sqlDos="	SELECT Peg.nip 
						FROM peg_pegawai Peg, ak_perolehan P 
						WHERE P.idPerolehan='".$id."' 
						AND P.nip=Peg.nip";
			$DB->executeQuery($sqlDos);
			if($DB->getRows()==1) {
				$rowDos=$DB->getResult();
			}
			
			return $rowDos['nip'];
		}
		
		function getPangkatDosen($id) {
			global $DB;
			global $AK;
			
			$sql="	SELECT K.idGolongan, K.pangkat, K.golRuang 
					FROM ak_perolehan P, peg_pegawai Peg, peg_kepangkatan K 
					WHERE P.nip=Peg.nip 
					AND K.nip=Peg.nip 
					AND K.active='1' 
					AND P.idPerolehan='".$id."'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
				return $row['pangkat']." (".$row['golRuang'].") / ".$AK->getPangkatYangDipilihString($row['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($row['idGolongan']);
			}
		}
		
		function getJabatanDosen() {
			return "Dosen";
		}
		
		function getUnitKerja($id) {
			global $DB;
			global $unit;
			
			$sql="	SELECT Peg.kdUnitKerja 
					FROM peg_pegawai Peg, ak_perolehan P 
					WHERE Peg.nip=P.nip 
					AND P.idPerolehan='".$id."'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
				return $unit->getFakultas($row['kdUnitKerja']);
			}
		}
	}
?>