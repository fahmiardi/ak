<?php
	class TMT {
		var $lebih=0;
		var $kurang=0;
		
		function setIdPerolehan($id) {
			$this->id=$id;
		}
		
		function getKelebihanHari() {
			return $this->lebih;
		}
		
		function getKekuranganHari() {
			return $this->kurang;
		}
		
		function getTMTCurrent() {
			global $DB;
			
			$sql="	SELECT K.TMTKepangkatan 
					FROM peg_kepangkatan K, ak_perolehan P 
					WHERE P.idPerolehan='".$this->id."' 
					AND P.nip=K.nip 
					AND K.active='1'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
				
				return $row['TMTKepangkatan'];
			}
		}
		
		function getTMTNext() {
			global $DB;
			
			$sql="	SELECT K.TMTBerikutnya 
					FROM peg_kepangkatan K, ak_perolehan P 
					WHERE P.idPerolehan='".$this->id."' 
					AND P.nip=K.nip 
					AND K.active='1'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
				
				return $row['TMTBerikutnya'];
			}
		}
		
		function getTanggalSekarang() {
			return date('Y-m-d');
		}
		
		function getTanggal($tgl) {
			$split=explode("-",$tgl);
			return (int)$split[2];
		}
		
		function getBulan($tgl) {
			$split=explode("-",$tgl);
			return (int)$split[1];
		}
		
		function getTahun($tgl) {
			$split=explode("-",$tgl);
			return (int)$split[0];
		}
		
		function getSelisihSekarang() {			
			$jdSkrg=GregorianToJD($this->getBulan($this->getTMTNext()),$this->getTanggal($this->getTMTNext()),$this->getTahun($this->getTMTNext()));
			$jdNext=GregorianToJD($this->getBulan($this->getTanggalSekarang()),$this->getTanggal($this->getTanggalSekarang()),$this->getTahun($this->getTanggalSekarang()));
			
			return ($jdNext-$jdSkrg);
		}
		
		function hitung() {
			//$tmtCurrent=GregorianToJD($this->getBulan($this->getTMTCurrent()),$this->getTanggal($this->getTMTCurrent()),$this->getTahun($this->getTMTCurrent()));
			$tglSkrg=GregorianToJD($this->getBulan($this->getTanggalSekarang()),$this->getTanggal($this->getTanggalSekarang()),$this->getTahun($this->getTanggalSekarang()));
			$tmtNext=GregorianToJD($this->getBulan($this->getTMTNext()),$this->getTanggal($this->getTMTNext()),$this->getTahun($this->getTMTNext()));
			$selisih=$tmtNext-$tglSkrg;
			
			if($selisih<=0) { //sudah memenuhi dan lebih
				$this->lebih=$tglSkrg-$tmtNext;
				$this->kurang=0;
			}
			else { //belum memenuhi masih ada sisa
				$this->kurang=$selisih;
				$this->lebih=0;
			}
		}
	}
?>