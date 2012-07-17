<?php
	class CetakKepegawaian extends FPDF {		
		private $nip = 0;
		
		function setNIP($nip) {
			$this->nip=$nip;
		}
		
		function valid() {
			global $DB;
			
			$auth=false;
			
			$sqlCek="	SELECT nip 
						FROM peg_pegawai 
						WHERE nip='".$this->nip."'";
			$DB->executeQuery($sqlCek);
			if($DB->getRows()==1) {
				$auth=true;
			}
			return $auth;
		}
		
		function cetakPegawai() {
			global $DB;
			global $general;
			global $AK;
			//global $properti;
			global $unit;
			global $formatNIP;
			
			$sqlBljr="	SELECT P.rankingPendidikan 
						FROM peg_pendidikan P, peg_belajar B 
						WHERE B.nip='".$this->nip."' 
						AND P.idPendidikan=B.idPendidikan";
			$DB->executeQuery($sqlBljr);
			if($DB->getRows()>0) {
				while($rowBljr=$DB->getResult()) {
					$pend[]=$rowBljr['rankingPendidikan'];
				}
			}
			
			if(count($pend)!=0) {
				$ranking=MIN($pend);
			}
			
			$sqlDos="	SELECT Pd.namaPendidikan, K.pangkat, K.golRuang, K.TMTPangkat, Peg.titleDepan, Peg.titleBelakang, Peg.namaPeg, Peg.nip, Peg.noSeriKarpeg, Peg.tmptLahir, Peg.tglLahir, Peg.jkPeg, Peg.keahlian, K.kdUnitKerja, K.idGolongan, K.TMTKepangkatan 
						FROM peg_pegawai Peg, peg_kepangkatan K, peg_belajar B, peg_pendidikan Pd 
						WHERE Peg.nip='".$this->nip."' 
						AND K.nip=Peg.nip 
						AND K.active='1' 
						AND B.nip=Peg.nip 
						AND B.idPendidikan=Pd.idPendidikan 
						AND Pd.rankingPendidikan='".$ranking."'";
			$DB->executeQuery($sqlDos);
			if($DB->getRows()==1) {
				$rowDos=$DB->getResult();
				if($rowDos['titleDepan']!="") {
					$depan=$rowDos['titleDepan']." ";
				}
				else {
					$depan="";
				}
				if($rowDos['titleBelakang']!="") {
					$blkng=", ".$rowDos['titleBelakang'];
				}
				else {
					$blkng="";
				}
				if($rowDos['jkPeg']==0) {
					$jk="Laki-Laki";
				}
				else {
					$jk="Perempuan";
				}
				
				$wTop=array(5,60,5,120);
				$top[0]=array('','Nama',':',$depan.$rowDos['namaPeg'].$blkng);
				$top[1]=array('','NIP',':',$formatNIP->nipFormat($rowDos['nip']));
				$top[2]=array('','Nomor Seri KARPEG',':',$rowDos['noSeriKarpeg']);
				$top[3]=array('','Pangkat & Gol. Ruang/TMT',':',$rowDos['pangkat']." (".$rowDos['golRuang'].")"." / ".$general->formatTanggal3($rowDos['TMTPangkat']));
				$top[4]=array('','Tempat dan Tanggal Lahir',':',$rowDos['tmptLahir'].", ".$general->formatTanggal2($rowDos['tglLahir']));
				$top[5]=array('','Jenis Kelamin',':',$jk);
				$top[6]=array('','Pendidikan Tertinggi',':',$rowDos['namaPendidikan']);
				$top[7]=array('','Keahlian',':',$rowDos['keahlian']);
				$top[8]=array('','Jabatan Fungsional/TMT',':',$AK->getPangkatYangDipilihString($rowDos['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($rowDos['idGolongan'])." / ".$general->formatTanggal3($rowDos['TMTKepangkatan']));
				$top[9]=array('','Fakultas',':',$unit->getFakultas($rowDos['kdUnitKerja']));
				$top[10]=array('','Jurusan/Program Studi',':',$unit->getJurusan($rowDos['kdUnitKerja']));
				$top[11]=array('','Masa Kerja Lama',':','-');
				$top[12]=array('','Masa Kerja Baru',':','-');
				$top[13]=array('','Unit Kerja',':',$unit->getFakultas($rowDos['kdUnitKerja']));
				
				for($i=0; $i<count($top); $i++) {
					for($j=0; $j<count($top[$i]); $j++) {
						$row[]=$this->Cell($wTop[$j],5,$top[$i][$j],0,0,'L',1);
					}
					$this->Ln();
				}
				$this->Ln();
			}			
			
			return $row;
		}		
		
		function color() {
			//Colors, line width and bold font
		    $this->SetFillColor(255,255,255);
		    $this->SetTextColor(0,0,0);
		    $this->SetDrawColor(0,0,0);
		    $this->SetLineWidth(0.1);
		    $this->SetFont('','',9);
		}
		
		function renderCell($w) {
			$this->Cell(array_sum($w),0,'','');
		}
		
		function Footer() {
		    //Position at 1.5 cm from bottom
		    $this->SetY(-15);
		    //Arial italic 8
		    $this->SetFont('Arial','I',8);
		    //Page number
		    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
		}
	}
?>