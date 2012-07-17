<?php
	$nip=$user->getNIP();
	
	switch($_GET['opt']) {
		case 'cetak':
			$cetakPegawai->setNIP($nip);
			if($cetakPegawai->valid()) {
				//Instantiance	
				$cetakPegawai->FPDF('landscape','mm','A4');
				$cetakPegawai->SetFont('Arial','',14);
				$cetakPegawai->color();
				$cetakPegawai->AddPage();
				$cetakPegawai->AliasNbPages();
				
				$cetakPegawai->renderCell($cetakPegawai->cetakPegawai());//cetak head perolehan
				
				$cetakPegawai->Output();
			}
			break;
		case 'edit':
			switch($_GET['act']) {
				case 'update':
					$nipA=$_POST['nip'];//fix	
							
					//$noSeriKarpeg=$_POST['noSeriKarpeg'];							
					$titleDepan=trim($_POST['titleDepan']," ,");
					$namaPeg=trim($_POST['namaPeg']," .,");
					$titleBelakang=trim($_POST['titleBelakang']," ,");
					$alamatPeg=$_POST['alamatPeg'];
					$jkPeg=$_POST['jkPeg'];
					$tmptLahir=$_POST['tmptLahir'];
					$tglLahir=$general->formatTanggalDB($_POST['tglLahir']);
					$keahlian=$_POST['keahlian'];
					$jurusan=$_POST['kdUnitKerja'];
					
					//$idPendidikan=$_POST['idPendidikan'];
					$thnIjazah=$_POST['thnIjazah'];
					$tempatStudi=$_POST['tempatStudi'];
					
					//$pangkat=$_POST['pangkat'];
					//$golRuang=$_POST['golRuang'];
					//$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
					//$idGolongan=$_POST['idGolongan'];
					//$tmtKepangkatan=$_POST['TMTKepangkatan'];
					//$totalKUM=$_POST['totalKUM'];
					//$noSk=$_POST['noSk'];
					
					$sqlUpCek1="UPDATE peg_pegawai 
								SET titleDepan='".$titleDepan."', 
									namaPeg='".$namaPeg."', 
									titleBelakang='".$titleBelakang."', 
									alamatPeg='".$alamatPeg."', 
									jkPeg='".$jkPeg."', 
									tmptLahir='".$tmptLahir."', 
									tglLahir='".$tglLahir."', 
									keahlian='".$keahlian."', 
									kdUnitKerja='".$jurusan."' 
								WHERE nip='".$nipA."'";
					$DB->executeQuery($sqlUpCek1);
					if($DB->notNull()) {
						$sqlUpCek2="UPDATE peg_kepangkatan 
									SET kdUnitKerja='".$jurusan."' 
									WHERE nip='".$nipA."' 
									AND active='1'";
						$DB->executeQuery($sqlUpCek2);
						if($DB->notNull()) {
							$sqlUpCek3="UPDATE peg_belajar 
										SET thnIjazah='".$thnIjazah."', 
											tempatStudi='".$tempatStudi."' 
										WHERE nip='".$nipA."'";
							$DB->executeQuery($sqlUpCek3);
							if($DB->notNull()) {
								header("Location: ./page.php?u=kepegawaian");
							}
						}
					}
					break;
				default:
					$sqlPeg="	SELECT P.noSeriKarpeg, P.TMTMasuk, P.nip, P.titleDepan, P.namaPeg, P.titleBelakang, P.alamatPeg, P.jkPeg, P.tmptLahir, P.tglLahir, P.keahlian, P.totalKUM, 
									K.kdUnitKerja, K.pangkat, K.TMTPangkat, K.golRuang, K.noSk, K.TMTKepangkatan, 
									B.thnIjazah, B.tempatStudi, 
									Pd.namaPendidikan, 
									G.syaratKUM, 
									Pk.namaPangkat 
								FROM peg_pegawai P, peg_kepangkatan K, peg_belajar B, peg_pendidikan Pd, pang_golongan G, pang_pangkat Pk 
								WHERE P.nip=K.nip 
								AND P.nip=B.nip 
								AND B.idPendidikan=Pd.idPendidikan 
								AND K.idGolongan=G.idGolongan 
								AND G.idPangkat=Pk.idPangkat 
								AND P.nip='".$nip."' 
								AND K.active='1'";
					$DB->executeQuery($sqlPeg);
					if($DB->getRows()==1) {
						$rowPeg=$DB->getResult();
						
						$isi.="
						<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
						<div>Edit Dosen</div>						
						
						<div style='text-align:right;'>
							<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian' class='submit2'>Cancel</a></div>
							<div class='fix'></div>
						</div>
						
						<div>
							<form action='?u=kepegawaian&opt=edit&act=update' method='post'>
								<input type='hidden' name='nip' value='".$rowPeg['nip']."'>
								<div class='list2' style='margin-top:20px;padding-left:10px;'>
									<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepegawaian</div>
									
									<div class='fl' style='width:150px;'>NIP</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>".$formatNIP->nipFormat($rowPeg['nip'])."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>No. Seri Karpeg</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>".$rowPeg['noSeriKarpeg']."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Nama Dosen</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>
										<input type='text' name='titleDepan' value='".$rowPeg['titleDepan']."' class='input' style='width:80px;'>
										<input type='text' name='namaPeg' value='".$rowPeg['namaPeg']."' class='input' style='width:200px;'>
										<input type='text' name='titleBelakang' value='".$rowPeg['titleBelakang']."' class='input' style='width:90px;'></div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;' >Alamat</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'><textarea name='alamatPeg' class='input' style='width:250px; height:100px;'>".$rowPeg['alamatPeg']."</textarea></div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Jenis Kelamin</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>";
										if($rowPeg['jkPeg']==0) {
											$isi.="
											<div><input type='radio' name='jkPeg' value='0' checked>&nbsp;Laki-Laki</div>
											<div><input type='radio' name='jkPeg' value='1'>&nbsp;Perempuan</div>";
										}
										else {
											$isi.="
											<div><input type='radio' name='jkPeg' value='0'>&nbsp;Laki-Laki</div>
											<div><input type='radio' name='jkPeg' value='1' checked>&nbsp;Perempuan</div>";
										}
									$isi.="
									</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Tempat, Tanggal Lahir</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'><input class='input' style='width:150px;' type='text' name='tmptLahir' value='".$rowPeg['tmptLahir']."'>,&nbsp;<input class='input' style='width:100px;' type='text' name='tglLahir' id='datepicker' value='".$general->formatTanggal3($rowPeg['tglLahir'])."'></div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Keahlian</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'><input type='text' name='keahlian' value='".$rowPeg['keahlian']."' class='input' style='width:200px;'></div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>TMT Masuk</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>".$general->formatTanggal3($rowPeg['TMTMasuk'])."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Jurusan</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>
										<select name='kdUnitKerja' class='form-select' style='width:250px; height:30px;'>
											<option value=''>-unit-</option>";
										$sqlJur="	SELECT kdUnitKerja, namaUnitKerja, parentId, count 
													FROM peg_unitkerja 
													WHERE active='1' 
													AND parentId!='0'";
										$DB->executeQuery($sqlJur);
										if($DB->getRows()>0) {
											while($rowJur=$DB->getResult()) {
												if($rowPeg['kdUnitKerja']==$rowJur['kdUnitKerja']) {
													$isi.="<option value='".$rowJur['kdUnitKerja']."' SELECTED='SELECTED'>".$rowJur['namaUnitKerja']."</option>";
												}
												else {
													$isi.="<option value='".$rowJur['kdUnitKerja']."'>".$rowJur['namaUnitKerja']."</option>";
												}
											}
										}
										$isi.="
										</select>	
									</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Pendidikan Terakhir</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>".$rowPeg['namaPendidikan']."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Tahun Ijazah</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'><input type='text' name='thnIjazah' value='".$rowPeg['thnIjazah']."' class='input' style='width:50px;'></div>
									<div class='fix'></div>
									
									<div class='fl' style='width:150px;'>Tempat Studi</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'><textarea name='tempatStudi' class='input' style='height:50px; width:250px;'>".$rowPeg['tempatStudi']."</textarea></div>
									<div class='fix'></div>
								</div>
								
								<div class='list2' style='margin:10px 0px; padding-left:10px;'>
									<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepangkatan</div>
									
									<div class='fl' style='width:180px;'>Pangkat / Gol. Ruang</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>".$rowPeg['pangkat']." / ".$rowPeg['golRuang']."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:180px;'>TMT Pangkat</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>".$general->formatTanggal3($rowPeg['TMTPangkat'])."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width:180px;'>Jabatan Fungsional</div>
									<div class='fl' style='width:10px;'>:</div>
									<div class='fl'>".strtoupper($rowPeg['namaPangkat'])." ".$rowPeg['syaratKUM']."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width: 180px;'>TMT Jabatan Fungsional</div>
									<div class='fl' style='width: 10px;'>:</div>
									<div class='fl'>".$general->formatTanggal3($rowPeg['TMTKepangkatan'])."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width: 180px;'>Total KUM</div>
									<div class='fl' style='width: 10px;'>:</div>
									<div class='fl'>".$rowPeg['totalKUM']."</div>
									<div class='fix'></div>
									
									<div class='fl' style='width: 180px;'>No. SK Jabatan Fungsional</div>
									<div class='fl' style='width: 10px;'>:</div>
									<div class='fl'>".$rowPeg['noSk']."</div>
									<div class='fix'></div>
								</div>
								
								<div style='width:100%;'><input type='submit' value='Update' class='submit' style='width:100%; font-weight:bold;'></div>
							</form>
						</div>";
					}
			}
			break;
		default:
			$sqlDos="	SELECT K.pangkat, K.golRuang, K.TMTPangkat, Pg.noSeriKarpeg, Pg.nip, Pg.titleDepan, Pg.titleBelakang, Pg.namaPeg, Pg.alamatPeg, Pg.jkPeg, Pg.tmptLahir, Pg.tglLahir, Pg.keahlian, Pg.TMTMasuk, 
							Uk.namaUnitKerja, K.idGolongan, Pg.totalKUM, K.TMTKepangkatan 
						FROM peg_pegawai Pg, peg_unitkerja Uk, peg_kepangkatan K 
						WHERE Pg.nip=K.nip 
						AND Pg.kdUnitKerja=Uk.kdUnitKerja 
						AND Pg.nip='".$nip."' 
						AND K.active='1'";
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
				
				$isi.="
				<div class='cart' style='padding-bottom:0px;'>
					<div class='cart-isi'>
						<div style='text-align:center;font-weight:bold;'><u>".$depan.strtoupper($rowDos['namaPeg']).$blkng."</u></div>
						<div style='text-align:center;font-size:small;'>NIP. ".$formatNIP->nipFormat($rowDos['nip'])."</div>
						<div style='text-align:right;'>
							<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian&opt=cetak' target='_blank' class='submit2'>Cetak</a></div>
							<div class='fr' style='text-align:center;'><a href='?u=kepegawaian&opt=edit' class='submit2'>Edit</a></div>
							<div class='fix'></div>
						</div>
					</div>
				</div>
				<div class='cart' style='padding-bottom:0px;'>
					<div class='cart-isi'>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>No. Seri Karpeg</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['noSeriKarpeg']."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Alamat</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['alamatPeg']."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Jenis Kelamin</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>";
								if($rowDos['jkPeg']==0) {
									$isi.="Laki-Laki";
								}
								else {
									$isi.="Perempuan";
								}
							$isi.="
							</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Tempat, Tgl Lahir</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['tmptLahir'].", ".$general->formatTanggal2($rowDos['tglLahir'])."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Keahlian</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['keahlian']."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>TMT Masuk</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$general->formatTanggal3($rowDos['TMTMasuk'])."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Jurusan</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['namaUnitKerja']."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Unit Kerja</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$kepegawaian->getUnitKerja()."</div>
						</div>
					</div>
				</div>
				<div class='cart' style='padding-bottom:0px;'>
					<div class='cart-isi'>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Pangkat / Gol. Ruang</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['pangkat']." / ".$rowDos['golRuang']."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>TMT Pangkat</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$general->formatTanggal3($rowDos['TMTPangkat'])."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Jabatan Fungsional</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$AK->getPangkatYangDipilihString($rowDos['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($rowDos['idGolongan'])."</div>
						</div>
						<div>
							<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>TMT Jabatan</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$general->formatTanggal3($rowDos['TMTKepangkatan'])."</div>						
						</div>
						<div>
							<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Total KUM</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['totalKUM']."</div>						
						</div>
					</div>
				</div>
				
				<div class='list2' style='background-color:#eee; margin-top:10px;'>
					<div style='font-weight:bold; margin:px; font-size:15px;'>History Jabatan Fungsional</div>
				</div>
				<div class='list2'>";
					$sqlHisto="	SELECT K.nip, P.currentGol, P.toGol, P.idPerolehan 
								FROM peg_kepangkatan K, ak_perolehan P 
								WHERE K.nip='".$nip."' 
								AND K.idGolongan=P.currentGol 
								AND K.active!='1' 
								AND P.statusPerolehan='4'";
					$DB->executeQuery($sqlHisto);
					if($DB->rs()) {
						$no=1;
						$isi.="	
						<div class='ddd head-pengajuan'>
							<div class='fl bold' style='width:40px;'>No.</div>
							<div class='fl bold' style='width:200px;'>Dari Jabatan</div>
							<div class='fl bold' style='width:;'>Naik Ke Jabatan</div>
							<div class='fix'></div>
						</div>";	
						while($rowHisto=$DB->getResult()) {
							$isi.="
							<ul id='menu3' class='menu noaccordion'>
								<li>
									<a href='#'>
										<div class='ddd isi-pengajuan' style=''>
											<div class='fl' style='width:40px;'>".$no."</div>
											<div class='fl' style='width:200px; '>".$AK->getPangkatYangDipilihString($rowHisto['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowHisto['currentGol'])."</div>																	
											<div class='fl' style='width:;'>".$AK->getPangkatYangDipilihString($rowHisto['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowHisto['toGol'])."</div>																	
											<div class='fix'></div>
										</div>
									</a>
									<ul>
										<li>";
											$isi.="
											<div class='ddd show-pengajuan' style=''>";
												
												$sqlPerolehan="	SELECT valueKUM 
																FROM ak_perolehan_detail 
																WHERE idPerolehan='".$rowHisto['idPerolehan']."' 
																AND valueKd='5'";
												$queryPerolehan=mysql_query($sqlPerolehan,$DB->opendb());
												if(mysql_num_rows($queryPerolehan)>0) {
													$totalPerolehan=0;
													while($rowPerolehan=mysql_fetch_array($queryPerolehan)) {
														$totalPerolehan+=$rowPerolehan['valueKUM'];
													}
												}
												else {
													$totalPerolehan=0;
												}
												
												$sqlAdd="	SELECT kelebihan, saving, kelayakan 
															FROM ak_perolehan_generate 
															WHERE idPerolehan='".$rowHisto['idPerolehan']."'";
												$queryAdd=mysql_query($sqlAdd,$DB->opendb());
												if(mysql_num_rows($queryAdd)>0) {
													$totalKelebihan=0;
													$totalSaving=0;
													$totalKelayakan=0;
													while($rowAdd=mysql_fetch_array($queryAdd)) {
														$totalKelebihan+=$rowAdd['kelebihan'];
														$totalSaving+=$rowAdd['saving'];
														$totalKelayakan+=$rowAdd['kelayakan'];
													}
												}
												
												$sqlInfo="	SELECT totalDisetujui 
															FROM ak_perolehan 
															WHERE idPerolehan='".$rowHisto['idPerolehan']."'";
												$queryInfo=mysql_query($sqlInfo,$DB->opendb());
												if(mysql_num_rows($queryInfo)==1) {
													$rowInfo=mysql_fetch_array($queryInfo);
													$totalDisetujui=$rowInfo['totalDisetujui'];
													$totalKekurangan=$rowInfo['totalKekurangan'];
												}																				
											
											$isi.="
												<div class='list2 fl' style='width:17%; background-color:#ddd; border-color:#ccc; margin-right:5px; margin-left:15px;'>
													<div style='text-align:center;'>Total Kelayakan</div>
													<div style='text-align:center;' class='bold'>".$totalKelayakan."</div>
												</div>
												<div class='list2 fl' style='width:17%; background-color:#ddd; border-color:#ccc; margin-right:5px;'>
													<div style='text-align:center;'>Total Kelebihan</div>
													<div style='text-align:center;' class='bold'>".$totalKelebihan."</div>
												</div>
												<div class='list2 fl' style='width:17%; background-color:#ddd; border-color:#ccc; margin-right:5px;'>
													<div style='text-align:center;'>Total Saving</div>
													<div style='text-align:center;' class='bold'>".$totalSaving."</div>
												</div>
												<div class='list2 fl' style='width:17%; background-color:#ddd; border-color:#ccc; margin-right:5px;'>
													<div style='text-align:center;'>Total Perolehan</div>
													<div style='text-align:center;' class='bold'>".$totalPerolehan."</div>
												</div>
												<div class='list2 fl' style='width:17%; background-color:#ddd; border-color:#ccc; margin-right:5px;'>
													<div style='text-align:center;'>Total Disetujui</div>
													<div style='text-align:center;' class='bold'>".$totalDisetujui."</div>
												</div>
												
												<div class='fix'></div>
												
											</div>";
													
											$sqlGroupDet="	SELECT idGroup, namaGroup  
															FROM ak_group 
															WHERE idGroup!='1'";
											$queryGroupDet=mysql_query($sqlGroupDet,$DB->opendb());
											if(mysql_num_rows($queryGroupDet)>0) {
												while($rowGroupDet=mysql_fetch_array($queryGroupDet)) {
													$isi.="	
													<div class='list2' style='margin-bottom:10px; background-color:#ddd;'>";
														$idPerolehan=$rowHisto['idPerolehan'];
														
														$sqlDet="	SELECT K.kdKategori, K.namaKategori, Pd.valueKUM 
																	FROM ak_kategori K, ak_perolehan_detail Pd, ak_relasi_kategori Rk 
																	WHERE Pd.idPerolehan='".$idPerolehan."' 
																	AND Pd.idRelasiKat=Rk.idRelasiKat 
																	AND Rk.kdRule='5' 
																	AND Rk.kdKategori=K.kdKategori 
																	AND K.idGroup='".$rowGroupDet['idGroup']."'";
														$DB->executeQuery($sqlDet);
														if($DB->rs()) {
															if($DB->getRows()>0) {
																$totalGroup=0;
																while($rowDet=$DB->getResult()) {
																	$totalGroup+=$rowDet['valueKUM'];
																	$isi.="
																	<div class='fl' style='width:500px;'>
																		<div class='cart' style='padding-bottom:0px;'>
																			<div class='cart-isi' style='border-color:#ccc;'>
																				<div>".$rowDet['namaKategori']."</div>
																			</div>
																		</div>
																	</div>
																	<div class='fl' style='width:100px;'>
																		<div class='cart' style='padding-bottom:0px;'>
																			<div class='cart-isi' style='border-color:#ccc;'>
																				<div>".$rowDet['valueKUM']."</div>
																			</div>
																		</div>
																	</div>
																	<div class='fix'></div>";
																}
															}
														}
														else {
															$totalGroup=0;
														}													
														$isi.="		
																	<div class='fl ' style='width:510px;'>
																		<div style='font-weight:bold; color:#005994;'>TOTAL ".ucwords($rowGroupDet['namaGroup'])."</div>
																	</div>
																	<div class='fl' style=''>
																		<div style='font-weight:bold; color:#005994;'>".$totalGroup."</div>
																	</div>
																	<div class='fix'></div>
																	
													</div>";
												}
											}
										$isi.="
										</li>
									</ul>
								</li>
							</ul>";
							$no++;
						}
					}
					else {
						$isi.="
						<div class='kecil' style='color:red; text-align:center;'>Maaf, Anda belum mempunyai history kepangkatan.</div>";
					}
				$isi.="
				</div>";
			}
	}
	
	$layout->setContent($isi);
	$layout->HTML_render();
?>