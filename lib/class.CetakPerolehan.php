<?php
	class CetakPerolehan extends FPDF {
		private $id = 0;		
		
		function setId($id) {
			$this->id=$id;
		}
		
		function valid() {
			global $DB;
			
			$auth=false;
			
			$sqlCek="	SELECT idPerolehan 
						FROM ak_perolehan 
						WHERE idPerolehan='".$this->id."'";
			$DB->executeQuery($sqlCek);
			if($DB->getRows()==1) {
				$auth=true;
			}
			return $auth;
		}
		
		function headPerolehan() {
			global $DB;
			global $general;
			global $AK;
			global $properti;
			global $unit;
			global $formatNIP;
			
			$head[0]="DAFTAR USUL PENETAPAN ANGKA KREDIT";
			$head[1]="JABATAN FUNGSIONAL";
			$head[2]="TANGGAL PENILIAN :";
			
			for($i=0; $i<count($head); $i++) {
				if($i==2) {
					$this->Ln();
					$l='L';
				}
				else {
					$l='C';
				}
				$row[]=$this->Cell(190,5,$head[$i],0,0,$l,1);
				$this->Ln();
			}
			$this->Ln();
			
			$wH=array(5,185);
			$datH=array('I.','KETERANGAN PERORANGAN');
			
			for($i=0; $i<count($datH); $i++) {
				$row[]=$this->Cell($wH[$i],5,$datH[$i],0,0,$l,1);
			}
			$this->Ln();
			
			$sqlRank="	SELECT Pd.rankingPendidikan 
						FROM peg_kepangkatan K, ak_perolehan P, peg_pegawai Peg, peg_pendidikan Pd, peg_belajar B 
						WHERE P.idPerolehan='".$this->id."' 
						AND P.nip=K.nip 
						AND K.active='1' 
						AND K.nip=B.nip 
						AND B.idPendidikan=Pd.idPendidikan";
			$DB->executeQuery($sqlRank);
			if($DB->rs()) {
				while($rowRank=$DB->getResult()) {
					$rank[]=$rowRank['rankingPendidikan'];
				}
			}
			
			if(count($rank)!=0) {
				$ranking=MIN($rank);
			}
			
			$sqlDos="	SELECT Pd.namaPendidikan, Peg.titleDepan, Peg.titleBelakang, K.pangkat, K.golRuang, K.TMTPangkat, Peg.namaPeg, Peg.nip, Peg.noSeriKarpeg, Peg.tmptLahir, Peg.tglLahir, Peg.jkPeg, Peg.keahlian, K.kdUnitKerja, K.idGolongan, K.TMTKepangkatan 
						FROM peg_pegawai Peg, ak_perolehan P, peg_kepangkatan K, peg_pendidikan Pd, peg_belajar B 
						WHERE P.idPerolehan='".$this->id."' 
						AND P.nip=Peg.nip 
						AND K.nip=Peg.nip 
						AND K.active='1' 
						AND B.nip=Peg.nip 
						AND B.idPendidikan=Pd.idPendidikan 
						AND Pd.rankingPendidikan='".$ranking."'";
			$DB->executeQuery($sqlDos);
			if($DB->getRows()==1) {
				$rowDos=$DB->getResult();
				if($rowDos['jkPeg']==0) {
					$jk="Laki-Laki";
				}
				else {
					$jk="Perempuan";
				}
			}
			
			$wTop=array(5,60,5,120);
			$top[0]=array('','Nama',':',$rowDos['namaPeg']);
			$top[1]=array('','NIP',':',$formatNIP->nipFormat($rowDos['nip']));
			$top[2]=array('','Nomor Seri KARPEG',':',$rowDos['noSeriKarpeg']);
			$top[3]=array('','Pangkat & Gol. Ruang/TMT',':',$rowDos['pangkat']." (".$rowDos['golRuang'].") / ".$general->formatTanggal3($rowDos['TMTPangkat']));
			$top[4]=array('','Tempat dan Tanggal Lahir',':',$rowDos['tmptLahir'].", ".$general->formatTanggal2($rowDos['tglLahir']));
			$top[5]=array('','Jenis Kelamin',':',$jk);
			$top[6]=array('','Pendidikan Tertinggi',':',$rowDos['namaPendidikan']);
			$top[7]=array('','Keahlian',':',$rowDos['keahlian']);
			$top[8]=array('','Jabatan Fungsional/TMT',':',$AK->getPangkatYangDipilihString($rowDos['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($rowDos['idGolongan'])." / ".$general->formatTanggal3($rowDos['TMTKepangkatan']));
			$top[9]=array('','Fakultas',':',$unit->getFakultas($rowDos['kdUnitKerja']));
			$top[10]=array('','Jurusan/Program Studi',':',$unit->getJurusan($rowDos['kdUnitKerja']));
			$top[11]=array('','Masa Kerja Lama',':','');
			$top[12]=array('','Masa Kerja Baru',':','');
			$top[13]=array('','Unit Kerja',':',$unit->getFakultas($rowDos['kdUnitKerja']));
			
			for($i=0; $i<count($top); $i++) {
				for($j=0; $j<count($top[$i]); $j++) {
					$row[]=$this->Cell($wTop[$j],5,$top[$i][$j],0,0,'L',1);
				}
				$this->Ln();
			}
			$this->Ln();
			
			$wUnsur=array(5,185);
			$unsur=array('II.','UNSUR YANG DINILAI');
			
			for($i=0; $i<count($unsur); $i++) {
				$row[]=$this->Cell($wUnsur[$i],5,$unsur[$i],0,0,'L',1);
			}			
			$this->Ln();
			
			return $row;
		}
		
		function listPerolehan($data, $w, $level) {
			$this->SetX(10);
			$x = $this->GetX();
			$y = $this->GetY();	
			
			switch($level) {
				case 0:
					//$this->SetXY($x + $w[0], $y);
					
					$this->Cell($w[0],6,$data[0],1,0,'L',1);
					
					$y1 = $this->GetY();
					$this->MultiCell($w[1], 6, $data[1],1,1,'R',1);	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $w[0] + $w[1], $this->GetY()-$yH);
					
					$this->Cell($w[2],6,$data[2],1,0,'C',1);
					break;
				case 1:					
					//$this->SetXY($x + $w[0] + $w[1], $y);
					$this->Cell($w[0],5,$data[0],1,0,'L',1);
					$this->Cell($w[1],5,$data[1],1,0,'L',1);
					
					$y1 = $this->GetY();
					$this->MultiCell($w[2], 5, $data[2],1,1,'R',1);	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $w[0] + $w[1] + $w[2], $this->GetY()-$yH);
					
					$this->Cell($w[3],$yH,$data[3],1,0,'C',1);
					
					
					break;
				case 2:
					//$this->SetXY($x + $w[0] + $w[1] + $w[2], $y);
					
					$this->Cell($w[0],5,$data[0],1,0,'L',1);
					$this->Cell($w[1],5,$data[1],1,0,'L',1);
					$this->Cell($w[2],5,$data[2],1,0,'L',1);
					
					$y1 = $this->GetY();
					$this->MultiCell($w[3], 5, $data[3],1,1,'R',1);	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $w[0] + $w[1] + $w[2] + $w[3], $this->GetY() - $yH);
					
					$this->Cell($w[4],$yH,$data[4],1,0,'C',1);
					break;
				case 3:
					$this->Cell($w[0],5,$data[0],1,0,'L',1);
					$this->Cell($w[1],5,$data[1],1,0,'L',1);
					$this->Cell($w[2],5,$data[2],1,0,'L',1);
					$this->Cell($w[3],5,$data[3],1,0,'L',1);	
					
					//$this->SetXY($x + $w[0] + $w[1] + $w[2] + $w[3], $this->GetY());
					
					$y1 = $this->GetY();
					$this->MultiCell($w[4], 5, $data[4],1,1,'R',1);	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $w[0] + $w[1] + $w[2] + $w[3] + $w[4], $this->GetY() - $yH);
					
					$this->Cell($w[5],$yH,$data[5],1,0,'C',1);
					break;
				case 4:
					$this->Cell($w[0],5,$data[0],1,0,'L',1);
					$this->Cell($w[1],5,$data[1],1,0,'L',1);
					$this->Cell($w[2],5,$data[2],1,0,'L',1);
					$this->Cell($w[3],5,$data[3],1,0,'L',1);
					$this->Cell($w[4],5,$data[4],1,0,'L',1);
					
					//$this->SetXY($x + $w[0] + $w[1] + $w[2] + $w[3] + $w[4], $this->GetY());
					
					$y1 = $this->GetY();
					$this->MultiCell($w[5], 5, $data[5],1,1,'R',1);	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $w[0] + $w[1] + $w[2] + $w[3] + $w[4] + $w[5], $this->GetY() - $yH);
					
					$this->Cell($w[6],$yH,$data[6],1,0,'C',1);
					break;
				case 5:
					$this->Cell($w[0],5,$data[0],1,0,'L',1);
					$this->Cell($w[1],5,$data[1],1,0,'L',1);
					$this->Cell($w[2],5,$data[2],1,0,'L',1);
					$this->Cell($w[3],5,$data[3],1,0,'L',1);
					$this->Cell($w[4],5,$data[4],1,0,'L',1);
					$this->Cell($w[5],5,$data[5],1,0,'L',1);
					
					//$this->SetXY($x + $w[0] + $w[1] + $w[2] + $w[3] + $w[4] + $w[5], $this->GetY());
					
					$y1 = $this->GetY();
					$this->MultiCell($w[6], 5, $data[6],1,1,'R',1);	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $w[0] + $w[1] + $w[2] + $w[3] + $w[4] + $w[5] + $w[6], $this->GetY() - $yH);
					
					$this->Cell($w[7],$yH,$data[7],1,0,'C',1);
					break;
			}
		    $this->Ln();
			return $w;
		}
		
		function fetch($parent, $level) {
			global $DB;
			
			$sqlShow="	SELECT kdKategori, namaKategori 
						FROM ak_kategori 
						WHERE parentId='".$parent."'";
			$queryShow=mysql_query($sqlShow,$DB->opendb());
			if($queryShow!=null) {
				if(mysql_num_rows($queryShow)>0) {
					while($rowShow=mysql_fetch_array($queryShow)) {
						$sqlDiambil="	SELECT Rk.kdKategori, Pd.valueKUM 
										FROM ak_perolehan P, ak_perolehan_detail Pd, ak_relasi_kategori Rk 
										WHERE P.idPerolehan='".$this->id."' 
										AND P.idPerolehan=Pd.idPerolehan 
										AND Pd.valueKd='5' 
										AND Pd.idRelasiKat=Rk.idRelasiKat 
										AND Rk.kdKategori='".$rowShow['kdKategori']."'";
						$DB->executeQuery($sqlDiambil);
						if($DB->getRows()>0) {
							$kum=0;
							while($rowDiambil=$DB->getResult()) {
								$kum+=$rowDiambil['valueKUM'];
							}
						}
						else {
							$kum="";
						}
						$name=$rowShow['namaKategori'];
						$kd=$rowShow['kdKategori'].".";					
						$this->color();
						switch($level) {
							case 0:
								$data=array($kd,$name,$kum);
								$this->SetFont('','B',10);
								$width=array(7,163,20);
								break;
							case 1:
								$data=array('',$kd,$name,$kum);
								$width=array(7,10,153,20);
								break;
							case 2:
								$data=array('','',$kd,$name,$kum);
								$width=array(7,10,12,141,20);
								break;
							case 3:
								$data=array('','','',$kd,$name,$kum);
								$width=array(7,10,12,14,127,20);
								break;
							case 4:
								$data=array('','','','',$kd,$name,$kum);
								$width=array(7,10,12,14,17,110,20);
								break;
							case 5:
								$data=array('','','','','',$kd,$name,$kum);
								$width=array(7,10,12,14,17,20,90,20);
								break;
						}
						
						$w=$this->listPerolehan($data,$width,$level);
						$this->fetch($rowShow['kdKategori'],$level+1);
					}
				}
			}
			return $w;		
		}	
		
		function cetakTotalKUM() {
			global $DB;
			
			$sqlDiambil="	SELECT Pd.valueKUM 
							FROM ak_perolehan_detail Pd 
							WHERE Pd.idPerolehan='".$this->id."' 
							AND Pd.valueKd='5'";
			$DB->executeQuery($sqlDiambil);
			if($DB->getRows()>0) {
				$kum=0;
				while($rowDiambil=$DB->getResult()) {
					$kum+=$rowDiambil['valueKUM'];
				}
			}
			
			$totalKUM=array('Total Perolehan',$kum);
			
			$this->Ln();
			$w=array(170,20);
		    for($i=0;$i<count($totalKUM);$i++){
				if($i==0) {
					$letak="R";
				}
				else {
					$letak="C";
				}
		        $this->Cell($w[$i],6,$totalKUM[$i],1,0,$letak,1);
			}
		    $this->Ln();
			return $w;
		}
		
		
		function listPersentasi() {
			global $DB;
			global $AK;
			global $properti;
			global $formatNIP;
			
			$sqlGenerate="	SELECT Peg.keahlian, P.currentGol, P.toGol, Tk.namaKenaikan, Pk.nilaiType, Pk.type, Pk.nilaiType, Pg.ketentuanAngka, Pg.kelayakan, Pg.kelebihan, Pg.saving, G.namaGroup 
							FROM ak_presentasi_kategori Pk, ak_perolehan_generate Pg, ak_group G, ak_skenario S, ak_tipe_kenaikan Tk, ak_perolehan P, peg_pegawai Peg 
							WHERE Pg.idPerolehan='".$this->id."' 
							AND Pg.idPresentasi=Pk.idPresentasi 
							AND Pk.idGroup=G.idGroup 
							AND P.idSkenario=S.idSkenario 
							AND S.idKenaikan=Tk.idKenaikan 
							AND Pg.idPerolehan=P.idPerolehan 
							AND P.nip=Peg.nip 
							ORDER BY G.idGroup ASC";
			$queryGenerate=mysql_query($sqlGenerate,$DB->opendb());
			if(mysql_num_rows($queryGenerate)>0) {
				$n=0;
				while($rowGenerate=mysql_fetch_array($queryGenerate)) {
					$group[$n]=strtoupper($rowGenerate['namaGroup']);
					$nilaiType[$n]=$rowGenerate['nilaiType']."%";
					$type[$n]=strtoupper($rowGenerate['type']);
					$ketentuan[$n]=$rowGenerate['ketentuanAngka'];
					$kelebihan[$n]=$rowGenerate['kelebihan'];
					$saving[$n]=$rowGenerate['saving'];
					$tipeKenaikan=$rowGenerate['namaKenaikan'];
					$currentGol=$AK->getPangkatYangDipilihString($rowGenerate['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowGenerate['currentGol']);
					$toGol=$AK->getPangkatYangDipilihString($rowGenerate['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowGenerate['toGol']);
					$keahlian=$rowGenerate['keahlian'];
					$n++;
				}
			}
			
			$sqlGroup="	SELECT idGroup 
						FROM ak_group 
						WHERE idGroup!='1' 
						ORDER BY idGroup ASC";
			$queryGroup=mysql_query($sqlGroup,$DB->opendb());
			if(mysql_num_rows($queryGroup)>0) {				
				while($rowGroup=mysql_fetch_array($queryGroup)) {
					$sqlPerolehan="	SELECT Pd.valueKUM 
									FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk, ak_kategori K 
									WHERE Pd.idPerolehan='".$this->id."' 
									AND Pd.valueKd='5' 
									AND Pd.idRelasiKat=Rk.idRelasiKat 
									AND Rk.kdKategori=K.kdKategori 
									AND K.idGroup='".$rowGroup['idGroup']."'";
					$queryPerolehan=mysql_query($sqlPerolehan,$DB->opendb());
					if(mysql_num_rows($queryPerolehan)>0) {
						$totalGroup=0;
						while($rowPerolehan=mysql_fetch_array($queryPerolehan)) {
							$totalGroup+=$rowPerolehan['valueKUM'];
						}
					}
					$perolehan[]=$totalGroup;
				}
			}
			
			$wHead=array(5,40);
			$head=array("II.","REKAPITULASI BAHAN YANG DINILAI");
			
			for($i=0; $i<count($head); $i++) {
				$row=$this->Cell($wHead[$i],5,$head[$i],0,0,'L',1);
			}
			$this->Ln(10);
			
			$wData=array(5,20,30,30,30,30);
			$data[0]=array('','',$group[0],$group[1],$group[2],$group[3]);
			$data[1]=array('','',$type[0],$type[1],$type[2],$type[3]);
			$data[2]=array('','',$nilaiType[0],$nilaiType[1],$nilaiType[2],$nilaiType[3]);			
			$data[3]=array('','Ketentuan',$ketentuan[0],$ketentuan[1],$ketentuan[2],$ketentuan[3]);
			$data[4]=array('','Pengajuan',$perolehan[0],$perolehan[1],$perolehan[2],$perolehan[3]);
			$data[5]=array('','Kelebihan',$kelebihan[0],$kelebihan[1],$kelebihan[2],$kelebihan[3]);
			$data[6]=array('','Saving',$saving[0],$saving[1],$saving[2],$saving[3]);
			
			for($i=0; $i<count($data); $i++) {
				if($i==0) {
					$h=6;
				}				
				else {
					$h=5;
				}
				for($j=0; $j<count($data[$i]); $j++) {
					if($j==0) {
						$letak='L';
						$m=0;
					}
					elseif($j==1) {
						$letak='L';
						$m=0;
					}
					else {
						$letak='C';
						$m=1;
					}
					$row[]=$this->Cell($wData[$j],$h,$data[$i][$j],$m,0,$letak,1);
					
				}
				$this->Ln();
			}
			
			
			$this->Ln();
			
			$sqlTotal="	SELECT totalDisetujui 
						FROM ak_perolehan 
						WHERE idPerolehan='".$this->id."'";
			$DB->executeQuery($sqlTotal);
			if($DB->getRows()==1) {
				$rowTotal=$DB->getResult();
				$totalDis=$rowTotal['totalDisetujui'];
			}
			
			$wFoot=array(5,40,3,50);
			$foot[0]=array('','Jumlah Total Diajukan',':',$totalDis." angka kredit");
			$foot[1]=array('','Diusulkan :','','');
			$foot[2]=array('','Tipe Kenaikan',':',$tipeKenaikan);
			$foot[3]=array('','Dari Jabatan',':',$currentGol);
			$foot[4]=array('','Naik Ke Jabatan',':',$toGol);
			$foot[5]=array('','Keahlian',':',$keahlian);
			
			for($i=0; $i<count($foot); $i++) {
				for($j=0; $j<count($foot[$i]); $j++) {
					$row[]=$this->Cell($wFoot[$j],5,$foot[$i][$j],0,0,'L',1);
				}
				if($i==0) {
					$this->Ln(10);
				}
				else {
					$this->Ln();
				}
			}
			
			$this->Ln();
			
			$wSign=array(90,90);
			$date=date('Y-m');
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
			$split=explode("-",$date);
			$thn=$split[0];
			$bln=(int)$split[1]-1;
			$sign[0]=array('','Jakarta,         '.$bulan[$bln]." ".$thn);
			$sign[1]=array('','Dekan,');
			$sign[2]=array('',$properti->getDekan());
			$sign[3]=array('',"NIP. ".$formatNIP->nipFormat($properti->getNipDekan()));
			
			for($i=0; $i<count($sign); $i++) {
				for($j=0; $j<count($sign[$i]); $j++) {
					$row[]=$this->Cell($wSign[$j],5,$sign[$i][$j],0,0,'L',1);
				}
				if($i==1) {
					$this->Ln(25);
				}
				else {
					$this->Ln();
				}
			}
			
			$this->Ln();
			$row[]=$this->Cell(190,5,'','B',0,'C',1);
			$this->Ln(10);
			
			$wPusat=array(5,100);
			$pusat=array('III.','PENDAPAT TIM PENILAI PUSAT/PERGURUAN TINGGI NEGERI');
			
			for($j=0; $j<count($pusat); $j++) {
				$row[]=$this->Cell($wPusat[$j],5,$pusat[$j],0,0,'L',1);
			}
			$this->Ln();
			$this->Ln();
			
			
			$wJak=array(90,40,30);
			$jak=array('','Jakarta,',$thn);
			
			for($i=0; $i<count($jak); $i++) {
				$row[]=$this->Cell($wJak[$i],5,$jak[$i],0,0,'L',1);
			}
			
			$this->Ln(10);
			
			$wTtd=array(90,90);
			$ttd=array('Ketua,','Sekretaris,');
			for($i=0; $i<count($ttd); $i++) {
				$row[]=$this->Cell($wTtd[$i],5,$ttd[$i],0,0,'C',1);
			}
			
			$this->Ln(30);
			$row[]=$this->Cell(190,5,'','B',0,'C',1);
			
			return $row;
		}
		
				
		function cetakBidangA() {
			global $DB;
			global $general;
			global $properti;
			global $formatNIP;
			
			$wHead=190;
			$head[0]='I. BIDANG A';
			$head[1]='SURAT PERNYATAAN';
			$head[2]='MELAKUKAN KEGIATAN PENDIDIKAN DAN PENGAJARAN';
			$head[3]='Yang bertanda tangan di bawah ini :';
			
			for($i=0; $i<count($head); $i++) {
				if($i==3) {
					$l='L';
					$this->Ln();
				}
				else {
					if($i==0) {
						$l='L';
					}
					else {
						$l='C';
					}
				}
				$row[]=$this->Cell($wHead,5,$head[$i],0,0,$l,1);			
				$this->Ln();
			}
			
			$wJur=array(10,40,3,135);
			$jur[0]=array('','Nama',':',$properti->getKajur($this->id));
			$jur[1]=array('','NIP',':',$formatNIP->nipFormat($properti->getNipKajur($this->id)));
			$jur[2]=array('','Pangkat/Gol. Ruang',':',$properti->getPangkatKajur($this->id));
			$jur[3]=array('','Jabatan',':',$properti->getJabatanKajur($this->id));
			$jur[4]=array('','Unit Kerja',':',$properti->getUnitKerja($this->id));
			
			for($i=0; $i<count($jur); $i++) {
				for($j=0; $j<count($jur[$i]); $j++) {
					$row[]=$this->Cell($wJur[$j],5,$jur[$i][$j],0,0,'L',1);
				}
				$this->Ln();
			}
			
			$this->Ln();
			
			$wBody=190;
			$body='Menyatakan bahwa :';
			
			$row[]=$this->Cell($wBody,5,$body,0,0,'L',1);			
			
			$this->Ln();
			
			$wDos=array(10,40,3,135);
			$dos[0]=array('','Nama',':',$properti->getDosen($this->id));
			$dos[1]=array('','NIP',':',$properti->getNipDosen($this->id));
			$dos[2]=array('','Pangkat/Gol. Ruang',':',$properti->getPangkatDosen($this->id));
			$dos[3]=array('','Jabatan',':',$properti->getJabatanDosen($this->id));
			$dos[4]=array('','Unit Kerja',':',$properti->getUnitKerja($this->id));
			
			for($i=0; $i<count($dos); $i++) {
				for($j=0; $j<count($dos[$i]); $j++) {
					$row[]=$this->Cell($wDos[$j],5,$dos[$i][$j],0,0,'L',1);
				}
				$this->Ln();
			}
			
			$this->Ln();
			
			$wBody=190;
			$body='Telah melakukan kegiatan pendidikan dan pengajaran sebagai berikut :';
			
			$row[]=$this->Cell($wBody,5,$body,0,0,'L',1);			
			
			$this->Ln(10);
			
			//pendidikan
			$row[]=$this->Cell(190,5,'1. UNSUR UTAMA PENDIDIKAN',0,0,'L',1);
			$this->Ln();
			
			$wListM1=array(5,7,98,20,40,20);
			$listM1[]=array('','No.','Kegiatan Pendidikan dan Pengajaran (Unsur)','Sub Unsur','Angka Kredit Menurut','Keterangan');
			$wListM2=array(5,7,98,20,20,20,20);
			$listM2[]=array('','','','Nilai AK','Rektor','Tim Penilai','Bukti Fisik');
			
			for($i=0; $i<count($listM1); $i++) {
				for($j=0; $j<count($listM1[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wListM1[$j],6,$listM1[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			for($i=0; $i<count($listM2); $i++) {
				for($j=0; $j<count($listM2[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wListM2[$j],5,$listM2[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			
			$sqlList="	SELECT K.namaKategori, Pd.valueKd, Pd.infoLain, Pd.valueKUM 
						FROM ak_perolehan_detail Pd, ak_kategori K, ak_relasi_kategori Rk 
						WHERE Pd.idPerolehan='".$this->id."' 
						AND Pd.idRelasiKat=Rk.idRelasiKat 
						AND Rk.kdKategori=K.kdKategori 
						AND K.idGroup='1'";
			$queryList=mysql_query($sqlList,$DB->opendb());
			if(mysql_num_rows($queryList)>0) {
				while($rowList=mysql_fetch_array($queryList)) {
					if($rowList['valueKd']==2) {
						$info[]=$rowList['infoLain'];
					}					
					else {
						$kat[]=$rowList['namaKategori'];
						$kum[]=$rowList['valueKUM'];
					}
				}
				for($i=0; $i<count($info); $i++) {
					$totalKUM+=$kum[$i];
					$is=$info[$i]."--(".$kat[$i].")--";
					$dat=array('',$i+1,$is,$kum[$i],'-','-','Ada');
					
					$x = $this->GetX();
					$y = $this->GetY();
					
					$row[]=$this->Cell($wList2[0],5,$dat[0],0,0,'L',1);//space
					$row[]=$this->Cell($wList2[1],5,$dat[1],1,0,'C',1);//nomor
					
					//$this->SetXY($x + $wList2[0] + $wList2[1], $this->GetY());
					
					$y1 = $this->GetY();
					$row[]=$this->MultiCell($wList2[2],5,$dat[2],1,1,'L',1);//kategori	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $wList2[0] + $wList2[1] + $wList2[2], $this->GetY() - $yH);
					
					$row[]=$this->Cell($wList2[3],$yH,$dat[3],1,0,'C',1);//AK
					$row[]=$this->Cell($wList2[4],$yH,$dat[4],1,0,'C',1);//rektor
					$row[]=$this->Cell($wList2[5],$yH,$dat[5],1,0,'C',1);//tim penilai
					$row[]=$this->Cell($wList2[6],$yH,$dat[6],1,0,'C',1);//bukti fisik
					
					$this->Ln();
				}				
				unset($info);
				unset($kat);
				unset($kum);
				
				$wJum=array(5,7,98,20,20,20,20);
				$jum=array('','','Jumlah',$totalKUM,'','','');
				for($i=0; $i<count($jum); $i++) {
					if($i==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wJum[$i],6,$jum[$i],$line,0,'C',1);//Total KUM
				}
				$this->Ln(20);
			}
			else {
				$dat=array('','','','','','','');
				
				for($i=0; $i<count($dat); $i++) {
					if($i==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wListM2[$i],6,$dat[$i],$line,0,'C',1);//list kosong
				}
				$this->Ln(10);
			}
			
			//tridharma perguruan tinggi
			$row[]=$this->Cell(190,5,'2. UNSUR UTAMA TRIDHARMA PERGURUAN TINGGI',0,0,'L',1);
			$this->Ln();
			
			$wList1=array(5,7,98,20,40,20);
			$list1[]=array('','No.','Kegiatan Tridharma Perguruan Tinggi (Unsur)','Sub Unsur','Angka Kredit Menurut','Keterangan');
			$wList2=array(5,7,98,20,20,20,20);
			$list2[]=array('','','','Nilai AK','Rektor','Tim Penilai','Bukti Fisik');
			
			for($i=0; $i<count($list1); $i++) {
				for($j=0; $j<count($list1[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList1[$j],6,$list1[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			for($i=0; $i<count($list2); $i++) {
				for($j=0; $j<count($list2[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList2[$j],5,$list2[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			
			$sqlList="	SELECT K.namaKategori, Pd.valueKd, Pd.infoLain, Pd.valueKUM 
						FROM ak_perolehan_detail Pd, ak_kategori K, ak_relasi_kategori Rk 
						WHERE Pd.idPerolehan='".$this->id."' 
						AND Pd.idRelasiKat=Rk.idRelasiKat 
						AND Rk.kdKategori=K.kdKategori 
						AND K.idGroup='2'";
			$queryList=mysql_query($sqlList,$DB->opendb());
			if(mysql_num_rows($queryList)>0) {
				while($rowList=mysql_fetch_array($queryList)) {
					if($rowList['valueKd']==2) {
						$info[]=$rowList['infoLain'];
					}					
					else {
						$kat[]=$rowList['namaKategori'];
						$kum[]=$rowList['valueKUM'];
					}
				}
				for($i=0; $i<count($info); $i++) {
					$totalKUM+=$kum[$i];
					$is=$info[$i]."--(".$kat[$i].")--";
					$dat=array('',$i+1,$is,$kum[$i],'-','-','Ada');
					
					$x = $this->GetX();
					$y = $this->GetY();
					
					$row[]=$this->Cell($wList2[0],5,$dat[0],0,0,'L',1);//space
					$row[]=$this->Cell($wList2[1],5,$dat[1],1,0,'C',1);//nomor
					
					//$this->SetXY($x + $wList2[0] + $wList2[1], $this->GetY());
					
					$y1 = $this->GetY();
					$row[]=$this->MultiCell($wList2[2],5,$dat[2],1,1,'L',1);//kategori	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $wList2[0] + $wList2[1] + $wList2[2], $this->GetY() - $yH);
					
					$row[]=$this->Cell($wList2[3],$yH,$dat[3],1,0,'C',1);//AK
					$row[]=$this->Cell($wList2[4],$yH,$dat[4],1,0,'C',1);//rektor
					$row[]=$this->Cell($wList2[5],$yH,$dat[5],1,0,'C',1);//tim penilai
					$row[]=$this->Cell($wList2[6],$yH,$dat[6],1,0,'C',1);//bukti fisik
					
					$this->Ln();
				}
				
				unset($info);
				unset($kat);
				unset($kum);
				
				$wJum=array(5,7,98,20,20,20,20);
				$jum=array('','','Jumlah',$totalKUM,'','','');
				for($i=0; $i<count($jum); $i++) {
					if($i==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wJum[$i],6,$jum[$i],$line,0,'C',1);//Total KUM
				}
				$this->Ln(20);
			}
			
			//perolehan mengajar
			$row[]=$this->Cell(190,5,'PEROLEHAN MENGAJAR',0,0,'L',1);
			$this->Ln();
			
			$wList=array(10,80,25,25,25,25);
			
			$sqlList="	SELECT Nd.idDetail 
						FROM ak_ngajar_detail Nd, ak_perolehan_detail Pd 
						WHERE Pd.idPerolehan='".$this->id."' 
						AND Pd.idDetail=Nd.idDetail 
						AND Pd.valueKd='5' 
						GROUP BY idDetail";
			$queryList=mysql_query($sqlList,$DB->opendb());
			if(mysql_num_rows($queryList)==1) {
				$rowList=mysql_fetch_array($queryList);
				
				$sqlTA="SELECT thnAkademikFrom, thnAkademikTo 
						FROM ak_ngajar_detail 
						GROUP BY thnAkademikFrom 
						ORDER BY thnAkademikFrom ASC";
				$queryTA=mysql_query($sqlTA,$DB->opendb());
				if(mysql_num_rows($queryTA)>0) {
					$totalKUMMengajar=0;
					while($rowTA=mysql_fetch_array($queryTA)) {
						$sqlIsi="	SELECT * 
									FROM ak_ngajar_detail 
									WHERE idDetail='".$rowList['idDetail']."' 
									AND thnAkademikFrom='".$rowTA['thnAkademikFrom']."' 
									ORDER BY semester ASC";
						$queryIsi=mysql_query($sqlIsi,$DB->opendb());
						if(mysql_num_rows($queryIsi)>0) {
							$wTA=array(27,5,50);
							$ta=array('Tahun Akademik',':',$rowTA['thnAkademikFrom']."/".$rowTA['thnAkademikTo']);
							
							for($i=0; $i<count($ta); $i++) {
								$row[]=$this->Cell($wTA[$i],5,$ta[$i],0,0,'L',1);
							}
							
							$this->Ln();
							
							$totalSKSGanjil=0;
							$totalSKSGenap=0;
							
							$wIsi=array(10,20,70,18,10,20);
							$headData=array('No.','Tanggal','Matakuliah','Semester','SKS','Keterangan');
							
							for($i=0; $i<count($headData); $i++) {
								$row[]=$this->Cell($wIsi[$i],6,$headData[$i],1,0,'L',1);
							}
							
							$this->Ln();
							
							$ix=0;
							while($rowIsi=mysql_fetch_array($queryIsi)) {
								if($rowIsi['semester']==0) {
									$smt="Ganjil";
									$totalSKSGanjil+=$rowIsi['sksMatkul']*$rowIsi['jmlhKelas'];
								}
								else {
									$smt="Genap";
									$totalSKSGenap+=$rowIsi['sksMatkul']*$rowIsi['jmlhKelas'];
								}
								
								$headData=array($ix+1,$general->formatTanggal($rowIsi['tglNgajDet']),strtoupper($rowIsi['namaMatkul']),$smt,$rowIsi['sksMatkul'],$rowIsi['jmlhKelas']." Kelas");
								
								for($i=0; $i<count($headData); $i++) {
									$row[]=$this->Cell($wIsi[$i],5,$headData[$i],1,0,'L',1);
								}
								$this->Ln();
								$ix++;
							}
							
							$sqlTotal="	SELECT Rn.valueSKS, Rn.valueKUM 
										FROM ak_relasi_ngajar Rn, ak_perolehan_detail Pd, ak_relasi_kategori Rk 
										WHERE Pd.idPerolehan='".$this->id."' 
										AND Pd.idRelasiKat=Rk.idRelasiKat 
										AND Rk.kdKategori=Rn.kdKategori 
										GROUP BY valueSKS 
										ORDER BY valueSKS DESC";
							$queryTotal=mysql_query($sqlTotal,$DB->opendb());
							if(mysql_num_rows($queryTotal)>0) {
								$sksMAX=0;
								$kumMAX=0;																			
								$i=0;
								while($rowTotal=mysql_fetch_array($queryTotal)) {
									$sks[$i]=$rowTotal['valueSKS'];
									$KUM[$i]=$rowTotal['valueKUM'];
									$sksMAX+=$rowTotal['valueSKS'];
									$kumMAX+=($sks[$i]*$KUM[$i]);
									$i++;
								}									
								if($totalSKSGanjil<=$sksMAX) {
									$j=0;
									$k=1;
									if($totalSKSGanjil<=$sks[$j]) {
										$totalKUMGanjil=$totalSKSGanjil*$KUM[$j];
										$totalKUMMengajar+=$totalKUMGanjil;
									}
									else {
										$total2=$totalSKSGanjil-$sks[$j];
										$total1=$totalSKSGanjil-$total2;
										$totalKUMGanjil=($total1*$KUM[$j])+($total2*$KUM[$k]);
										$totalKUMMengajar+=$totalKUMGanjil;
									}																				
								}
								else {
									$totalKUMGanjil=$kumMAX;
									$totalKUMMengajar+=$totalKUMGanjil;
								}
								
								if($totalSKSGenap<=$sksMAX) {
									$j=0;
									$k=1;
									if($totalSKSGenap<=$sks[$j]) {
										$totalKUMGenap=$totalSKSGenap*$KUM[$j];
										$totalKUMMengajar+=$totalKUMGenap;
									}
									else {
										$total2=$totalSKSGenap-$sks[$j];
										$total1=$totalSKSGenap-$total2;
										$totalKUMGenap=($total1*$KUM[$j])+($total2*$KUM[$k]);
										$totalKUMMengajar+=$totalKUMGenap;
									}																				
								}
								else {
									$totalKUMGenap=$kumMAX;
									$totalKUMMengajar+=$totalKUMGenap;
								}
							}
							
							$this->Ln(2);
							
							$wAll=array(95,95);
							$all=array('Semester Ganjil :','Semester Genap :');
							
							for($i=0; $i<count($all); $i++) {
								$row[]=$this->Cell($wAll[$i],5,$all[$i],0,0,'L',1);
							}
							
							$this->Ln();
							
							$wTot=array(20,3,72,20,3,72);
							$tot[0]=array('Total SKS',':',$totalSKSGanjil." sks",'Total SKS',':',$totalSKSGenap." sks");
							$tot[1]=array('Total KUM',':',$totalKUMGanjil." angka kredit",'Total KUM',':',$totalKUMGenap." angka kredit");
							
							for($i=0; $i<count($tot); $i++) {
								for($j=0; $j<count($tot[$i]); $j++) {
									$row[]=$this->Cell($wTot[$j],5,$tot[$i][$j],0,0,'L',1);
								}
								$this->Ln();
							}
							$this->Ln();							
							
						}
					}
					
					$this->Ln();
					$row[]=$this->Cell(190,5,"Total KUM Mengajar : ".$totalKUMMengajar." angka kredit",0,0,'L',1);
					$this->Ln(10);
					
					$wSign=array(110,80);
					$date=date('Y-m');
					$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
					$split=explode("-",$date);
					$thn=$split[0];
					$bln=(int)$split[1]-1;
					$sign[0]=array('','Jakarta,         '.$bulan[$bln]." ".$thn);
					$sign[1]=array('',$properti->getJabatanKajur($this->id).",");
					$sign[2]=array('',$properti->getKajur($this->id));
					$sign[3]=array('',"NIP. ".$formatNIP->nipFormat($properti->getNipKajur($this->id)));
					
					for($i=0; $i<count($sign); $i++) {
						for($j=0; $j<count($sign[$i]); $j++) {
							$row[]=$this->Cell($wSign[$j],5,$sign[$i][$j],0,0,'L',1);
						}
						if($i==1) {
							$this->Ln(25);
						}
						else {
							$this->Ln();
						}
					}
				}
			}
			
			return $row;
		}
		
		function cetakBidangB() {
			global $DB;
			global $general;
			global $properti;
			global $AK;
			global $unit;
			global $formatNIP;
			
			$wHead=190;
			$head[0]='I. BIDANG B';
			$head[1]='DAFTAR KARYA ILMIAH BAGI JABATAN FUNGSIONAL';
			$head[2]='PEGAWAI NEGERI SIPIL YANG DINILAI';
			
			for($i=0; $i<count($head); $i++) {
				if($i==1) {
					$l='C';
					$this->Ln();
				}
				else {
					if($i==2) {
						$this->Ln();
					}
					$l='L';
				}
				$row[]=$this->Cell($wHead,5,$head[$i],0,0,$l,1);			
				$this->Ln();
			}
						
			$sqlRank="	SELECT Pd.rankingPendidikan 
						FROM peg_kepangkatan K, ak_perolehan P, peg_pegawai Peg, peg_pendidikan Pd, peg_belajar B 
						WHERE P.idPerolehan='".$this->id."' 
						AND P.nip=K.nip 
						AND K.active='1' 
						AND K.nip=B.nip 
						AND B.idPendidikan=Pd.idPendidikan";
			$DB->executeQuery($sqlRank);
			if($DB->rs()) {
				while($rowRank=$DB->getResult()) {
					$rank[]=$rowRank['rankingPendidikan'];
				}
			}
			
			if(count($rank)!=0) {
				$ranking=MIN($rank);
			}
			
			$sqlDos="	SELECT Pd.namaPendidikan, Peg.titleDepan, Peg.titleBelakang, K.pangkat, K.golRuang, K.TMTPangkat, Peg.namaPeg, Peg.nip, Peg.noSeriKarpeg, Peg.tmptLahir, Peg.tglLahir, Peg.jkPeg, Peg.keahlian, K.kdUnitKerja, K.idGolongan, K.TMTKepangkatan 
						FROM peg_pegawai Peg, ak_perolehan P, peg_kepangkatan K, peg_pendidikan Pd, peg_belajar B 
						WHERE P.idPerolehan='".$this->id."' 
						AND P.nip=Peg.nip 
						AND K.nip=Peg.nip 
						AND K.active='1' 
						AND B.nip=Peg.nip 
						AND B.idPendidikan=Pd.idPendidikan 
						AND Pd.rankingPendidikan='".$ranking."'";
			$DB->executeQuery($sqlDos);
			if($DB->getRows()==1) {
				$rowDos=$DB->getResult();
				if($rowDos['jkPeg']==0) {
					$jk="Laki-Laki";
				}
				else {
					$jk="Perempuan";
				}
			}
			
			$wTop=array(5,50,3,132);
			$top[0]=array('I.','KETERANGAN PERORANGAN :','','');
			$top[1]=array('','Nama',':',$properti->getDosen($this->id));
			$top[2]=array('','NIP',':',$formatNIP->nipFormat($rowDos['nip']));
			$top[3]=array('','Nomor Seri KARPEG',':',$rowDos['noSeriKarpeg']);
			$top[4]=array('','Pangkat & Gol. Ruang/TMT',':',$rowDos['pangkat']." (".$rowDos['golRuang'].") / ".$general->formatTanggal3($rowDos['TMTPangkat']));
			$top[5]=array('','Tempat dan Tanggal Lahir',':',$rowDos['tmptLahir'].", ".$general->formatTanggal2($rowDos['tglLahir']));
			$top[6]=array('','Jenis Kelamin',':',$jk);
			$top[7]=array('','Pendidikan Tertinggi',':',$rowDos['namaPendidikan']);
			$top[8]=array('','Keahlian',':',$rowDos['keahlian']);
			$top[9]=array('','Jabatan Fungsional/TMT',':',$AK->getPangkatYangDipilihString($rowDos['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($rowDos['idGolongan'])." / ".$general->formatTanggal3($rowDos['TMTKepangkatan']));
			$top[10]=array('','Fakultas',':',$unit->getFakultas($rowDos['kdUnitKerja']));
			$top[11]=array('','Jurusan/Program Studi',':',$unit->getJurusan($rowDos['kdUnitKerja']));
			
			for($i=0; $i<count($top); $i++) {
				for($j=0; $j<count($top[$i]); $j++) {
					$row[]=$this->Cell($wTop[$j],5,$top[$i][$j],0,0,'L',1);
				}
				$this->Ln();
			}
			$this->Ln();
			
			$body=array('II.','JENIS KEGIATAN','','');
			for($j=0; $j<count($body); $j++) {
				$row[]=$this->Cell($wTop[$j],5,$body[$j],0,0,'L',1);
			}
			$this->Ln();
			
			$wList1=array(5,7,98,20,40,20);
			$list1[]=array('','No.','Nama Judul Karya Ilmiah (Unsur)','Sub Unsur','Angka Kredit Menurut','Keterangan');
			$wList2=array(5,7,98,20,20,20,20);
			$list2[]=array('','','','Nilai AK','Rektor','Tim Penilai','Bukti Fisik');
			
			for($i=0; $i<count($list1); $i++) {
				for($j=0; $j<count($list1[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList1[$j],6,$list1[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			for($i=0; $i<count($list2); $i++) {
				for($j=0; $j<count($list2[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList2[$j],5,$list2[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			
			$sqlList="	SELECT K.namaKategori, Pd.valueKd, Pd.infoLain, Pd.valueKUM 
						FROM ak_perolehan_detail Pd, ak_kategori K, ak_relasi_kategori Rk 
						WHERE Pd.idPerolehan='".$this->id."' 
						AND Pd.idRelasiKat=Rk.idRelasiKat 
						AND Rk.kdKategori=K.kdKategori 
						AND K.idGroup='3'";
			$queryList=mysql_query($sqlList,$DB->opendb());
			if(mysql_num_rows($queryList)>0) {
				while($rowList=mysql_fetch_array($queryList)) {
					if($rowList['valueKd']==2) {
						$info[]=$rowList['infoLain'];
					}					
					else {
						$kat[]=$rowList['namaKategori'];
						$kum[]=$rowList['valueKUM'];
					}
				}
				for($i=0; $i<count($info); $i++) {
					$totalKUM+=$kum[$i];
					$is=$info[$i]."--(".$kat[$i].")--";
					$dat=array('',$i+1,$is,$kum[$i],'-','-','Ada');
					
					$x = $this->GetX();
					$y = $this->GetY();
					
					$row[]=$this->Cell($wList2[0],5,$dat[0],0,0,'L',1);//space
					$row[]=$this->Cell($wList2[1],5,$dat[1],1,0,'C',1);//nomor
					
					//$this->SetXY($x + $wList2[0] + $wList2[1], $this->GetY());
					
					$y1 = $this->GetY();
					$row[]=$this->MultiCell($wList2[2],5,$dat[2],1,1,'L',1);//kategori	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $wList2[0] + $wList2[1] + $wList2[2], $this->GetY() - $yH);
					
					$row[]=$this->Cell($wList2[3],$yH,$dat[3],1,0,'C',1);//AK
					$row[]=$this->Cell($wList2[4],$yH,$dat[4],1,0,'C',1);//rektor
					$row[]=$this->Cell($wList2[5],$yH,$dat[5],1,0,'C',1);//tim penilai
					$row[]=$this->Cell($wList2[6],$yH,$dat[6],1,0,'C',1);//bukti fisik
					
					$this->Ln();
				}
				
				unset($info);
				unset($kat);
				unset($kum);
				
				$wJum=array(5,7,98,20,20,20,20);
				$jum=array('','','Jumlah',$totalKUM,'','','');
				for($i=0; $i<count($jum); $i++) {
					if($i==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wJum[$i],6,$jum[$i],$line,0,'C',1);//Total KUM
				}
				$this->Ln(20);
			}
			
			$wSign=array(110,80);
			$date=date('Y-m');
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
			$split=explode("-",$date);
			$thn=$split[0];
			$bln=(int)$split[1]-1;
			$sign[0]=array('','Jakarta,         '.$bulan[$bln]." ".$thn);
			$sign[1]=array('',$properti->getJabatanKajur($this->id).",");
			$sign[2]=array('',$properti->getKajur($this->id));
			$sign[3]=array('',"NIP. ".$formatNIP->nipFormat($properti->getNipKajur($this->id)));
			
			for($i=0; $i<count($sign); $i++) {
				for($j=0; $j<count($sign[$i]); $j++) {
					$row[]=$this->Cell($wSign[$j],5,$sign[$i][$j],0,0,'L',1);
				}
				if($i==1) {
					$this->Ln(25);
				}
				else {
					$this->Ln();
				}
			}
			
			return $row;
		}
		
		function cetakBidangC() {
			global $DB;
			global $general;
			global $properti;
			global $formatNIP;
			
			$wHead=190;
			$head[0]='III. BIDANG C';
			$head[1]='SURAT PERNYATAAN';
			$head[2]='MELAKUKAN KEGIATAN PENGABDIAN PADA MASYARAKAT';
			$head[3]='Yang bertanda tangan di bawah ini :';
			
			for($i=0; $i<count($head); $i++) {
				if($i==3) {
					$l='L';
					$this->Ln();
				}
				else {
					if($i==0) {
						$l='L';
					}
					else {
						$l='C';
					}
				}
				$row[]=$this->Cell($wHead,5,$head[$i],0,0,$l,1);			
				$this->Ln();
			}
			
			$wJur=array(10,40,3,135);
			$jur[0]=array('','Nama',':',$properti->getKajur($this->id));
			$jur[1]=array('','NIP',':',$formatNIP->nipFormat($properti->getNipKajur($this->id)));
			$jur[2]=array('','Pangkat/Gol. Ruang',':',$properti->getPangkatKajur($this->id));
			$jur[3]=array('','Jabatan',':',$properti->getJabatanKajur($this->id));
			$jur[4]=array('','Unit Kerja',':',$properti->getUnitKerja($this->id));
			
			for($i=0; $i<count($jur); $i++) {
				for($j=0; $j<count($jur[$i]); $j++) {
					$row[]=$this->Cell($wJur[$j],5,$jur[$i][$j],0,0,'L',1);
				}
				$this->Ln();
			}
			
			$this->Ln();
			
			$wBody=190;
			$body='Menyatakan bahwa :';
			
			$row[]=$this->Cell($wBody,5,$body,0,0,'L',1);			
			
			$this->Ln();
			
			$wDos=array(10,40,3,135);
			$dos[0]=array('','Nama',':',$properti->getDosen($this->id));
			$dos[1]=array('','NIP',':',$formatNIP->nipFormat($properti->getNipDosen($this->id)));
			$dos[2]=array('','Pangkat/Gol. Ruang',':',$properti->getPangkatDosen($this->id));
			$dos[3]=array('','Jabatan',':',$properti->getJabatanDosen($this->id));
			$dos[4]=array('','Unit Kerja',':',$properti->getUnitKerja($this->id));
			
			for($i=0; $i<count($dos); $i++) {
				for($j=0; $j<count($dos[$i]); $j++) {
					$row[]=$this->Cell($wDos[$j],5,$dos[$i][$j],0,0,'L',1);
				}
				$this->Ln();
			}
			
			$this->Ln();
			
			$wBody=190;
			$body='Telah melakukan kegiatan pengabdian masyarakat sebagai berikut :';
			
			$row[]=$this->Cell($wBody,5,$body,0,0,'L',1);			
			
			$this->Ln();			
			
			$wList1=array(5,7,98,20,40,20);
			$list1[]=array('','No.','Kegiatan Pengabdian pada Masyarakat (Unsur)','Sub Unsur','Angka Kredit Menurut','Keterangan');
			$wList2=array(5,7,98,20,20,20,20);
			$list2[]=array('','','','Nilai AK','Rektor','Tim Penilai','Bukti Fisik');
			
			for($i=0; $i<count($list1); $i++) {
				for($j=0; $j<count($list1[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList1[$j],6,$list1[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			for($i=0; $i<count($list2); $i++) {
				for($j=0; $j<count($list2[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList2[$j],5,$list2[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			
			$sqlList="	SELECT K.namaKategori, Pd.valueKd, Pd.infoLain, Pd.valueKUM 
						FROM ak_perolehan_detail Pd, ak_kategori K, ak_relasi_kategori Rk 
						WHERE Pd.idPerolehan='".$this->id."' 
						AND Pd.idRelasiKat=Rk.idRelasiKat 
						AND Rk.kdKategori=K.kdKategori 
						AND K.idGroup='4'";
			$queryList=mysql_query($sqlList,$DB->opendb());
			if(mysql_num_rows($queryList)>0) {
				while($rowList=mysql_fetch_array($queryList)) {
					if($rowList['valueKd']==2) {
						$info[]=$rowList['infoLain'];
					}					
					else {
						$kat[]=$rowList['namaKategori'];
						$kum[]=$rowList['valueKUM'];
					}
				}
				for($i=0; $i<count($info); $i++) {
					$totalKUM+=$kum[$i];
					$is=$info[$i]."--(".$kat[$i].")--";
					$dat=array('',$i+1,$is,$kum[$i],'-','-','Ada');
					
					$x = $this->GetX();
					$y = $this->GetY();
					
					$row[]=$this->Cell($wList2[0],5,$dat[0],0,0,'L',1);//space
					$row[]=$this->Cell($wList2[1],5,$dat[1],1,0,'C',1);//nomor
					
					//$this->SetXY($x + $wList2[0] + $wList2[1], $this->GetY());
					
					$y1 = $this->GetY();
					$row[]=$this->MultiCell($wList2[2],5,$dat[2],1,1,'L',1);//kategori	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $wList2[0] + $wList2[1] + $wList2[2], $this->GetY() - $yH);
					
					$row[]=$this->Cell($wList2[3],$yH,$dat[3],1,0,'C',1);//AK
					$row[]=$this->Cell($wList2[4],$yH,$dat[4],1,0,'C',1);//rektor
					$row[]=$this->Cell($wList2[5],$yH,$dat[5],1,0,'C',1);//tim penilai
					$row[]=$this->Cell($wList2[6],$yH,$dat[6],1,0,'C',1);//bukti fisik
					
					$this->Ln();
				}
				
				unset($info);
				unset($kat);
				unset($kum);
				
				$wJum=array(5,7,98,20,20,20,20);
				$jum=array('','','Jumlah',$totalKUM,'','','');
				for($i=0; $i<count($jum); $i++) {
					if($i==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wJum[$i],6,$jum[$i],$line,0,'C',1);//Total KUM
				}
				$this->Ln(20);
			}
			
			$wSign=array(110,80);
			$date=date('Y-m');
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
			$split=explode("-",$date);
			$thn=$split[0];
			$bln=(int)$split[1]-1;
			$sign[0]=array('','Jakarta,         '.$bulan[$bln]." ".$thn);
			$sign[1]=array('',$properti->getJabatanKajur($this->id).",");
			$sign[2]=array('',$properti->getKajur($this->id));
			$sign[3]=array('',"NIP. ".$formatNIP->nipFormat($properti->getNipKajur($this->id)));
			
			for($i=0; $i<count($sign); $i++) {
				for($j=0; $j<count($sign[$i]); $j++) {
					$row[]=$this->Cell($wSign[$j],5,$sign[$i][$j],0,0,'L',1);
				}
				if($i==1) {
					$this->Ln(25);
				}
				else {
					$this->Ln();
				}
			}
			
			return $row;
		}
		
		function cetakBidangD() {
			global $DB;
			global $general;
			global $properti;
			global $formatNIP;
			
			$wHead=190;
			$head[0]='IV. BIDANG D';
			$head[1]='SURAT PERNYATAAN';
			$head[2]='MELAKUKAN KEGIATAN PENUNJANG TRIDHARMA PERGURUAN TINGGI';
			$head[3]='Yang bertanda tangan di bawah ini :';
			
			for($i=0; $i<count($head); $i++) {
				if($i==3) {
					$l='L';
					$this->Ln();
				}
				else {
					if($i==0) {
						$l='L';
					}
					else {
						$l='C';
					}
				}
				$row[]=$this->Cell($wHead,5,$head[$i],0,0,$l,1);			
				$this->Ln();
			}
			
			$wJur=array(10,40,3,135);
			$jur[0]=array('','Nama',':',$properti->getKajur($this->id));
			$jur[1]=array('','NIP',':',$formatNIP->nipFormat($properti->getNipKajur($this->id)));
			$jur[2]=array('','Pangkat/Gol. Ruang',':',$properti->getPangkatKajur($this->id));
			$jur[3]=array('','Jabatan',':',$properti->getJabatanKajur($this->id));
			$jur[4]=array('','Unit Kerja',':',$properti->getUnitKerja($this->id));
			
			for($i=0; $i<count($jur); $i++) {
				for($j=0; $j<count($jur[$i]); $j++) {
					$row[]=$this->Cell($wJur[$j],5,$jur[$i][$j],0,0,'L',1);
				}
				$this->Ln();
			}
			
			$this->Ln();
			
			$wBody=190;
			$body='Menyatakan bahwa :';
			
			$row[]=$this->Cell($wBody,5,$body,0,0,'L',1);			
			
			$this->Ln();
			
			$wList1=array(5,7,98,20,40,20);
			$list1[]=array('','No.','Kegiatan Penunjang Tridharma Perguruan Tinggi (Unsur)','Sub Unsur','Angka Kredit Menurut','Keterangan');
			$wList2=array(5,7,98,20,20,20,20);
			$list2[]=array('','','','Nilai AK','Rektor','Tim Penilai','Bukti Fisik');
			
			for($i=0; $i<count($list1); $i++) {
				for($j=0; $j<count($list1[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList1[$j],6,$list1[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			for($i=0; $i<count($list2); $i++) {
				for($j=0; $j<count($list2[$i]); $j++) {
					if($j==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wList2[$j],5,$list2[$i][$j],$line,0,'C',1);
				}
				$this->Ln();
			}
			
			$sqlList="	SELECT K.namaKategori, Pd.valueKd, Pd.infoLain, Pd.valueKUM 
						FROM ak_perolehan_detail Pd, ak_kategori K, ak_relasi_kategori Rk 
						WHERE Pd.idPerolehan='".$this->id."' 
						AND Pd.idRelasiKat=Rk.idRelasiKat 
						AND Rk.kdKategori=K.kdKategori 
						AND K.idGroup='5'";
			$queryList=mysql_query($sqlList,$DB->opendb());
			if(mysql_num_rows($queryList)>0) {
				while($rowList=mysql_fetch_array($queryList)) {
					if($rowList['valueKd']==2) {
						$info[]=$rowList['infoLain'];
					}					
					else {
						$kat[]=$rowList['namaKategori'];
						$kum[]=$rowList['valueKUM'];
					}
				}
				for($i=0; $i<count($info); $i++) {
					$totalKUM+=$kum[$i];
					$is=$info[$i]."--(".$kat[$i].")--";
					$dat=array('',$i+1,$is,$kum[$i],'-','-','Ada');
					
					$x = $this->GetX();
					$y = $this->GetY();
					
					$row[]=$this->Cell($wList2[0],5,$dat[0],0,0,'L',1);//space
					$row[]=$this->Cell($wList2[1],5,$dat[1],1,0,'C',1);//nomor
					
					//$this->SetXY($x + $wList2[0] + $wList2[1], $this->GetY());
					
					$y1 = $this->GetY();
					$row[]=$this->MultiCell($wList2[2],5,$dat[2],1,1,'L',1);//kategori	
					$y2 = $this->GetY();
					$yH = $y2 - $y1;
					
					$this->SetXY($x + $wList2[0] + $wList2[1] + $wList2[2], $this->GetY() - $yH);
					
					$row[]=$this->Cell($wList2[3],$yH,$dat[3],1,0,'C',1);//AK
					$row[]=$this->Cell($wList2[4],$yH,$dat[4],1,0,'C',1);//rektor
					$row[]=$this->Cell($wList2[5],$yH,$dat[5],1,0,'C',1);//tim penilai
					$row[]=$this->Cell($wList2[6],$yH,$dat[6],1,0,'C',1);//bukti fisik
					
					$this->Ln();
				}
				
				unset($info);
				unset($kat);
				unset($kum);
				
				$wJum=array(5,7,98,20,20,20,20);
				$jum=array('','','Jumlah',$totalKUM,'','','');
				for($i=0; $i<count($jum); $i++) {
					if($i==0) {
						$line=0;
					}
					else {
						$line=1;
					}
					$row[]=$this->Cell($wJum[$i],6,$jum[$i],$line,0,'C',1);//Total KUM
				}
				$this->Ln(20);
			}
			
			$wSign=array(110,80);
			$date=date('Y-m');
			$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
			$split=explode("-",$date);
			$thn=$split[0];
			$bln=(int)$split[1]-1;
			$sign[0]=array('','Jakarta,         '.$bulan[$bln]." ".$thn);
			$sign[1]=array('',$properti->getJabatanKajur($this->id).",");
			$sign[2]=array('',$properti->getKajur($this->id));
			$sign[3]=array('',"NIP. ".$formatNIP->nipFormat($properti->getNipKajur($this->id)));
			
			for($i=0; $i<count($sign); $i++) {
				for($j=0; $j<count($sign[$i]); $j++) {
					$row[]=$this->Cell($wSign[$j],5,$sign[$i][$j],0,0,'L',1);
				}
				if($i==1) {
					$this->Ln(25);
				}
				else {
					$this->Ln();
				}
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