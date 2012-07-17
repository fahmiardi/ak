<?php
	class Kategori {
		function getNamaKategori($id) {
			global $DB;
			
			$sqlKat="	SELECT namaKategori 
						FROM ak_kategori 
						WHERE kdKategori='".$id."'";
			$DB->executeQuery($sqlKat);
			if($DB->getRows()==1) {
				$rowKat=$DB->getResult();
			}
			return $rowKat['namaKategori'];
		}
		
		function getDeskripsiKategori($id) {
			global $DB;
			
			$sqlKat="	SELECT deskripsi 
						FROM ak_kategori 
						WHERE kdKategori='".$id."'";
			$DB->executeQuery($sqlKat);
			if($DB->getRows()==1) {
				$rowKat=$DB->getResult();
			}
			return $rowKat['deskripsi'];
		}
		
		function getParentKategori($id) {
			global $DB;
			
			$sqlKat="	SELECT parentId 
						FROM ak_kategori 
						WHERE kdKategori='".$id."'";
			$DB->executeQuery($sqlKat);
			if($DB->getRows()==1) {
				$rowKat=$DB->getResult();
			}
			return $rowKat['parentId'];
		}
		
		function getCountKategori($id) {
			global $DB;
			
			$sqlKat="	SELECT count 
						FROM ak_kategori 
						WHERE kdKategori='".$id."'";
			$DB->executeQuery($sqlKat);
			if($DB->getRows()==1) {
				$rowKat=$DB->getResult();
			}
			return $rowKat['count'];
		}
		
		function kategoriMengajar($kd) {
			global $DB;
			$auth=false;
			
			$sqlKat="	SELECT kdKategori 
						FROM ak_relasi_ngajar 
						WHERE kdKategori='".$kd."' 
						GROUP BY kdKategori";
			$DB->executeQuery($sqlKat);
			if($DB->getRows()==1) {
				$auth=true;
			}
			
			return $auth;
		}
		
		function validMengajar($kd) {
			global $DB;
			global $user;
			
			$auth=false;
			
			$sqlKat="	SELECT Rn.idPangkat 
						FROM ak_relasi_ngajar Rn, pang_pangkat P, pang_golongan G, peg_kepangkatan K 
						WHERE Rn.kdKategori='".$kd."' 
						AND Rn.idPangkat=P.idPangkat 
						AND P.idPangkat=G.idPangkat 
						AND G.idGolongan=K.idGolongan 
						AND K.active='1' 
						AND K.nip='".$user->getNIP()."' 
						GROUP BY Rn.kdKategori";
			$DB->executeQuery($sqlKat);
			if($DB->getRows()==1) {
				$auth=true;
			}
			
			return $auth;
		}
	}
?>