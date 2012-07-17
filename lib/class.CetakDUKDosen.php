<?php
	class CetakDUKDosen extends FPDF {		
		function cetakHead() {
			$wHead=280;
			$head[0]="DAFTAR URUT KEPANGKATAN";
			$head[1]="UNIVERSITAS ISLAM NEGERI SYARIF HIDAYATULLAH JAKARTA";
			$head[2]="TAHUN ".date('Y');
			for($i=0; $i<count($head); $i++) {
				$row[]=$this->Cell($wHead,6,$head[$i],0,0,'C',1);
				$this->Ln();
			}
			$this->Ln();
			
			return $row;
		}
		
		function cekList2() {
			global $DB;
			global $general;
			global $AK;
			global $unit;
			global $formatNIP;
			
			$this->SetX(4);
			$x = $this->GetX();
			$y = $this->GetY();	
			$this->SetFont('Arial','',7);
			
			$sqlGol="	SELECT idGolongan 
						FROM pang_golongan 
						ORDER BY rankingGolongan ASC";
			$queryGol=mysql_query($sqlGol,$DB->opendb());
			if(mysql_num_rows($queryGol)>0) {
				$no=1;
				$tabel.="
						<table>
							<tr>
								<td>No.</td>
								<td>Nama</td>
								<td>NIP</td>
								<td>Tempat Lahir</td>
								<td>Tanggal Lahir</td>
								<td>JK</td>
								<td>Pangkat</td>
								<td>Gol</td>
								<td>TMT</td>
								<td>Jabatan</td>
								<td>TMT</td>
								<td>Masa Kerja</td>
								<td>Diklat</td>
								<td>Thn</td>
								<td>Pdd</td>
								<td>Tempat</td>
								<td>Thn</td>
								<td>Usia</td>
								<td>Unit Kerja</td>
							</tr>";
				while($rowGol=mysql_fetch_array($queryGol)) {
					$sqlList="	SELECT Peg.nip, Peg.titleDepan, Peg.namaPeg, Peg.titleBelakang, Peg.tmptLahir, Peg.tglLahir, Peg.jkPeg, Peg.keahlian, 
									K.idGolongan, K.TMTKepangkatan, K.pangkat, K.TMTPangkat, K.golRuang, 
									B.thnIjazah, B.tempatStudi, 
									P.namaPendidikan, 
									U.namaUnitKerja 
								FROM peg_pegawai Peg, peg_kepangkatan K, peg_belajar B, peg_pendidikan P, peg_unitkerja U 
								WHERE Peg.nip=K.nip 
								AND Peg.nip=B.nip 
								AND B.idPendidikan=P.idPendidikan 
								AND K.active='1' 
								AND K.idGolongan='".$rowGol['idGolongan']."' 
								AND Peg.kdUnitKerja=K.kdUnitKerja 
								AND Peg.kdUnitKerja=U.kdUnitKerja 
								ORDER BY Peg.namaPeg ASC";
					$queryList=mysql_query($sqlList,$DB->opendb());
					if(mysql_num_rows($queryList)>0) {
												
						while($rowList=mysql_fetch_array($queryList)) {
							$tabel.=
							$isi.="
							<tr>
								<td>".$no."</td>
								<td>Nama</td>
								<td>NIP</td>
								<td>Tempat Lahir</td>
								<td>Tanggal Lahir</td>
								<td>JK</td>
								<td>Pangkat</td>
								<td>Gol</td>
								<td>TMT</td>
								<td>Jabatan</td>
								<td>TMT</td>
								<td>Masa Kerja</td>
								<td>Diklat</td>
								<td>Thn</td>
								<td>Pdd</td>
								<td>Tempat</td>
								<td>Thn</td>
								<td>Usia</td>
								<td>Unit Kerja</td>
							</tr>";
							$no++;
						}
						
					}
				}
				$tabel.="</table>";
			}
			return $tabel;
		}
		
		function cetakList() {
			global $DB;
			global $general;
			global $AK;
			global $unit;
			global $formatNIP;
			
			$this->SetX(4);
			$x = $this->GetX();
			$y = $this->GetY();	
			$this->SetFont('Arial','',7);
			
			$wList=array(5,40,30,15,15,5,27,7,13,23,13,13,5,25,7,5,42);
			$listHead=array('No.','Nama','NIP','Tempat Lahir',"Tanggal\nLahir",'JK','Pangkat','Gol','TMT',"Jabatan\nFungsional",'TMT','Masa Kerja','Pdd','Tempat','Thn','Usia','Unit Kerja');
			//for($i=0; $i<count($listHead); $i++) {
				
				
				$this->SetXY($x + $wList[0] + $wList[1] + $wList[2], $this->GetY());
				
				$y1 = $this->GetY();
				$row[] = $this->MultiCell($wList[3], 5, $listHead[3],1,1,'C',1);
				$y2 = $this->GetY();
				$yH = $y2 - $y1;
				
				$this->SetXY($x + $wList[0] + $wList[1] + $wList[2] + $wList[3], $this->GetY()-$yH);
				
				$y1 = $this->GetY();
				$row[] = $this->MultiCell($wList[4], 5, $listHead[4],1,1,'C',1);
				$y2 = $this->GetY();
				$yH = $y2 - $y1;
				
				$this->SetXY($x + $wList[0] + $wList[1] + $wList[2] + $wList[3] + $wList[4], $this->GetY()-$yH);
				
				//$row[]=$this->Cell($wList[4],$yH,$listHead[4],1,0,'C',1);
				$row[]=$this->Cell($wList[5],$yH,$listHead[5],1,0,'C',1);
				$row[]=$this->Cell($wList[6],$yH,$listHead[6],1,0,'C',1);
				$row[]=$this->Cell($wList[7],$yH,$listHead[7],1,0,'C',1);
				$row[]=$this->Cell($wList[8],$yH,$listHead[8],1,0,'C',1);
				
				$this->SetXY($x + $wList[0] + $wList[1] + $wList[2] + $wList[3] + $wList[4] + $wList[5] + $wList[6] + $wList[7] + $wList[8], $this->GetY());
				
				$y1 = $this->GetY();
				$row[] = $this->MultiCell($wList[9], 5, $listHead[9],1,1,'C',1);
				$y2 = $this->GetY();
				$yH = $y2 - $y1;
				
				$this->SetXY($x + $wList[0] + $wList[1] + $wList[2] + $wList[3] + $wList[4] + $wList[5] + $wList[6] + $wList[7] + $wList[8] + $wList[9], $this->GetY()-$yH);
				
				//$row[]=$this->Cell($wList[9],$yH,$listHead[9],1,0,'C',1);
				$row[]=$this->Cell($wList[10],$yH,$listHead[10],1,0,'C',1);
				$row[]=$this->Cell($wList[11],$yH,$listHead[11],1,0,'C',1);
				$row[]=$this->Cell($wList[12],$yH,$listHead[12],1,0,'C',1);
				$row[]=$this->Cell($wList[13],$yH,$listHead[13],1,0,'C',1);
				$row[]=$this->Cell($wList[14],$yH,$listHead[14],1,0,'C',1);
				$row[]=$this->Cell($wList[15],$yH,$listHead[15],1,0,'C',1);
				$row[]=$this->Cell($wList[16],$yH,$listHead[16],1,0,'C',1);
				
				$this->SetX(4);
				
				$row[]=$this->Cell($wList[0],$yH,$listHead[0],1,0,'C',1);
				$row[]=$this->Cell($wList[1],$yH,$listHead[1],1,0,'C',1);
				$row[]=$this->Cell($wList[2],$yH,$listHead[2],1,0,'C',1);
				
				
				
			//}
			$this->Ln();
			
			$this->SetX(4);
			$x = $this->GetX();
			$y = $this->GetY();	
			$this->SetFont('Arial','',7);
			
			$sqlGol="	SELECT idGolongan 
						FROM pang_golongan 
						ORDER BY rankingGolongan ASC";
			$queryGol=mysql_query($sqlGol,$DB->opendb());
			if(mysql_num_rows($queryGol)>0) {
				$no=1;
				while($rowGol=mysql_fetch_array($queryGol)) {
					$sqlList="	SELECT Peg.nip, Peg.titleDepan, Peg.namaPeg, Peg.titleBelakang, Peg.tmptLahir, Peg.tglLahir, Peg.jkPeg, Peg.keahlian, 
									K.idGolongan, K.TMTKepangkatan, K.pangkat, K.TMTPangkat, K.golRuang, 
									B.thnIjazah, B.tempatStudi, 
									P.namaPendidikan, 
									U.namaUnitKerja 
								FROM peg_pegawai Peg, peg_kepangkatan K, peg_belajar B, peg_pendidikan P, peg_unitkerja U 
								WHERE Peg.nip=K.nip 
								AND Peg.nip=B.nip 
								AND B.idPendidikan=P.idPendidikan 
								AND K.active='1' 
								AND K.idGolongan='".$rowGol['idGolongan']."' 
								AND Peg.kdUnitKerja=K.kdUnitKerja 
								AND Peg.kdUnitKerja=U.kdUnitKerja 
								ORDER BY Peg.namaPeg ASC";
					$queryList=mysql_query($sqlList,$DB->opendb());
					if(mysql_num_rows($queryList)>0) {						
						while($rowList=mysql_fetch_array($queryList)) {
							if($rowList['titleDepan']!="") {
								$depan=", ".$rowList['titleDepan'];
							}
							else {
								$depan="";
							}
							if($rowList['titleBelakang']!="") {
								$blkng=", ".$rowList['titleBelakang'];
							}
							else {
								$blkng="";
							}
							if($rowList['jkPeg']==0) {
								$jk="L";
							}
							else {
								$jk="P";
							}
							$this->SetX(4);
							$x = $this->GetX();
							$y = $this->GetY();	
							$row[]=$this->Cell($wList[0],5,$no,1,0,'C',1);
							$row[]=$this->Cell($wList[1],5,$rowList['namaPeg'].$blkng.$depan,1,0,'L',1);
							$row[]=$this->Cell($wList[2],5,$formatNIP->nipFormat($rowList['nip']),1,0,'L',1);
							
							
							$row[]=$this->Cell($wList[3],5,$rowList['tmptLahir'],1,0,'L',1);
							$row[]=$this->Cell($wList[4],5,$rowList['tglLahir'],1,0,'C',1);
							$row[]=$this->Cell($wList[5],5,$jk,1,0,'C',1);
							$row[]=$this->Cell($wList[6],5,$rowList['pangkat'],1,0,'L',1);
							$row[]=$this->Cell($wList[7],5,$rowList['golRuang'],1,0,'C',1);
							$row[]=$this->Cell($wList[8],5,$rowList['TMTPangkat'],1,0,'C',1);
							
							$row[]=$this->Cell($wList[9],5,$AK->getPangkatYangDipilihString($rowList['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($rowList['idGolongan']),1,0,'L',1);
							$row[]=$this->Cell($wList[10],5,$general->formatTanggal3($rowList['TMTKepangkatan']),1,0,'C',1);
							$row[]=$this->Cell($wList[11],5,'',1,0,'C',1);
							$row[]=$this->Cell($wList[12],5,$rowList['namaPendidikan'],1,0,'C',1);
							$row[]=$this->Cell($wList[13],5,$rowList['tempatStudi'],1,0,'L',1);
							$row[]=$this->Cell($wList[14],5,$rowList['thnIjazah'],1,0,'C',1);
							$row[]=$this->Cell($wList[15],5,'',1,0,'C',1);
							$row[]=$this->Cell($wList[16],5,$rowList['namaUnitKerja'],1,0,'L',1);
							
							//$this->SetX(6);
							
							
							
							$this->Ln();
							$no++;
						}
					}
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