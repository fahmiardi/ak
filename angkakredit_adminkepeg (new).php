<?php
	switch($_GET['act']) {
		case 'validasi':
			$id=(int)$_GET['id'];
			$sqlValid="	UPDATE ak_perolehan_detail 
						SET statusDetail='2' 
						WHERE idDetail='".$id."'";
			$DB->executeQuery($sqlValid);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit#diajukan");
			}
			break;
		case 'divalidasi':
			$id=(int)$_GET['id'];
			$sqlTervalidasi="	UPDATE ak_perolehan 
								SET statusPerolehan='3' 
								WHERE idPerolehan='".$id."'";
			$DB->executeQuery($sqlTervalidasi);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit#tervalidasi");
			}
			break;
		case 'setujui':
			$id=(int)$_POST['id'];
			$sqlTervalidasi="	UPDATE ak_perolehan 
								SET statusPerolehan='4' 
								WHERE idPerolehan='".$id."'";
			$DB->executeQuery($sqlTervalidasi);
			if($DB->notNull()) {
				$noSK=$_POST['noSK'];
				$TMTKepangkatan=$general->formatTanggalDB($_POST['TMTKepangkatan']);
				$split=explode("-",$TMTKepangkatan);
				$tmtBerikutnya=($split[0]+1)."-".$split[1]."-".$split[2];
				
				if($_POST['cek']==1) {
					$pangkat=$_POST['pangkatDB'];
					$golRuang=$_POST['golRuangDB'];
					$tmtPangkat=$_POST['TMTPangkatDB'];
				}
				else {
					$pangkat=$_POST['pangkat'];
					$golRuang=$_POST['golRuang'];
					$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
				}
				
				$sqlFinal="	SELECT currentGol, toGol, nip, totalDisetujui 
							FROM ak_perolehan 
							WHERE idPerolehan='".$id."'";
				$queryFinal=mysql_query($sqlFinal,$DB->opendb());
				if(mysql_num_rows($queryFinal)==1) {
					$rowFinal=mysql_fetch_array($queryFinal);
					$sqlNaik="	SELECT * FROM peg_kepangkatan 
								WHERE idGolongan='".$rowFinal['currentGol']."' 
								AND nip='".$rowFinal['nip']."' 
								AND active='1'";
					$queryNaik=mysql_query($sqlNaik,$DB->opendb());
					if(mysql_num_rows($queryNaik)==1) {
						$rowNaik=mysql_fetch_array($queryNaik);
						$sqlUp="UPDATE peg_kepangkatan 
								SET active='0' 
								WHERE idKepangkatan='".$rowNaik['idKepangkatan']."'";
						$queryUp=mysql_query($sqlUp,$DB->opendb());
						if($queryUp) {
							$sqlInsert="INSERT INTO peg_kepangkatan 
										VALUES(	'', 
												'".$rowFinal['toGol']."',
												'".$rowFinal['nip']."',
												'".$rowNaik['kdUnitKerja']."',
												'".$TMTKepangkatan."',
												'".$tmtBerikutnya."',
												'".$pangkat."',
												'".$tmtPangkat."',
												'".$golRuang."',
												'".$rowFinal['totalDisetujui']."',
												'1',
												'".$noSK."')";
							$queryInsert=mysql_query($sqlInsert,$DB->opendb());
							if($queryInsert) {
								$sqlTotalKUM="	SELECT totalKUM 
												FROM peg_pegawai 
												WHERE nip='".$rowFinal['nip']."'";
								$queryTotalKUM=mysql_query($sqlTotalKUM,$DB->opendb());
								if(mysql_num_rows($queryTotalKUM)==1) {
									$rowTotalKUM=mysql_fetch_array($queryTotalKUM);
									$newTotal=$rowTotalKUM['totalKUM']+$rowFinal['totalDisetujui'];
									
									$sqlUpTotal="	UPDATE peg_pegawai 
													SET totalKUM='".$newTotal."' 
													WHERE nip='".$rowFinal['nip']."'";
									$queryUpTotal=mysql_query($sqlUpTotal,$DB->opendb());
									if($queryUpTotal) {
										header("Location: ./page.php?u=angkakredit#disetujui");
									}
									else {
										$isi.="error7";
									}
								}
								else {
									$isi.="error6";
								}
							}
							else {
								$isi.="error5";
							}
						}
						else {
							$isi.="error4";
						}
					}
					else {
						$isi.="error3";
					}
				}
				else {
					$isi.="error1";
				}
			}
			else {
				$isi.="error2";
			}
			break;
		case 'notausul':
			include_once "./nota_usul.php";
			break;
		default:
			$isi.="	
			<div class=''>
				<div class='show-head free2'>
					<div class='show-name f-verdana free2'>List Pengajuan</div>
				</div>
				<div class='list'>
					<div id='tabs'>
						<ul>";
							$sqlHead="	SELECT tabs, namaStatusPengajuan 
										FROM ak_status_pengajuan";
							$DB->executeQuery($sqlHead);
							if($DB->rs()) {
								if($DB->getRows()>0) {
									while($rowHead=$DB->getresult()) {
										$isi.="<li><a href='#".$rowHead['tabs']."'><b>".$rowHead['namaStatusPengajuan']."</b></a></li>";
									}
								}
							}
						$isi.="
						</ul>";
						$sqlHead="	SELECT idStatusPengajuan, tabs 
									FROM ak_status_pengajuan";
						$queryHead=mysql_query($sqlHead,$DB->opendb()) or die(mysql_error());
						if($queryHead!=null) {
							if(mysql_num_rows($queryHead)>0) {
								while($rowHead=mysql_fetch_array($queryHead)) {
									$isi.="	
									<div id='".$rowHead['tabs']."'>";
										switch($rowHead['idStatusPengajuan']) {
											case '1': //Pengajuan TERBARU
												$sqlPengajuan="	SELECT P.idPerolehan, P.nip, P.currentGol, P.toGol, P.tglPerolehan, S.idKenaikan, Pg.namaPeg 
																FROM ak_perolehan P, ak_skenario S, peg_pegawai Pg 
																WHERE P.idSkenario=S.idSkenario 
																AND P.statusPerolehan='".$rowHead['idStatusPengajuan']."' 
																AND P.nip=Pg.nip 
																ORDER BY P.tglPerolehan DESC";
												$queryPengajuan=mysql_query($sqlPengajuan,$DB->opendb());
												if($DB->rs()) {
													if(mysql_num_rows($queryPengajuan)>0) {
														$no=1;
														$isi.="	
															<div class='ddd head-pengajuan'>
																<div class='fl bold' style='width:30px;'>No.</div>
																<div class='fl bold' style='width:80px;'>Tanggal</div>
																<div class='fl bold' style='width:160px;'>NIP</div>
																<div class='fl bold' style='width:250px;'>Nama Dosen</div>
																<div class='fl bold' style='width:90px; padding-right:20px;'>Dari</div>
																<div class='fl bold' style='width:90px;'>Naik Ke</div>
																<div class='fix'></div>
															</div>";												
														while($rowPengajuan=mysql_fetch_array($queryPengajuan)) {													
															$isi.="
																<ul id='menu3' class='menu noaccordion'>
																	<li>
																		<a href='#'>
																			<div class='ddd isi-pengajuan' style=''>
																				<div class='fl' style='width:30px;'>".$no."</div>
																				<div class='fl' style='width:80px;'>".$general->formatTanggal($rowPengajuan['tglPerolehan'])."</div>
																				<div class='fl' style='width:160px;'>".$rowPengajuan['nip']."</div>
																				<div class='fl' style='width:250px;'>".$rowPengajuan['namaPeg']."</div>
																				<div class='fl' style='width:90px; padding-right:20px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['currentGol'])."</div>																	
																				<div class='fl' style='width:90px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['toGol'])."</div>																	
																				<div class='fix'></div>
																			</div>
																		</a>
																		<ul>
																			<li>
																				<div class='ddd show-pengajuan' style=''>";
																					
																					$sqlKUM="	SELECT totalKUM 
																								FROM peg_pegawai 
																								WHERE nip='".$rowPengajuan['nip']."'";
																					$DB->executeQuery($sqlKUM);
																					if($DB->rs()) {
																						if($DB->getRows()==1) {
																							$rowKUM=$DB->getResult();
																						}
																					}
																					
																					$sqlPerolehan="	SELECT valueKUM 
																									FROM ak_perolehan_detail 
																									WHERE idPerolehan='".$rowPengajuan['idPerolehan']."' 
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
																								WHERE idPerolehan='".$rowPengajuan['idPerolehan']."'";
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
																					
																					$sqlInfo="	SELECT totalDisetujui, totalKekurangan 
																								FROM ak_perolehan 
																								WHERE idPerolehan='".$rowPengajuan['idPerolehan']."'";
																					$queryInfo=mysql_query($sqlInfo,$DB->opendb());
																					if(mysql_num_rows($queryInfo)==1) {
																						$rowInfo=mysql_fetch_array($queryInfo);
																						$totalDisetujui=$rowInfo['totalDisetujui'];
																						$totalKekurangan=$rowInfo['totalKekurangan'];
																					}																				
																				
																				$isi.="
																					<div class='fl' style='width:150px;'>Total KUM</div>
																					<div class='fl' style='width:10px;'>:</div>
																					<div class='fl'>".$rowKUM['totalKUM']."</div>
																					<div class='fix'></div>
																					<div class='fl' style='width:150px;'>Total Perolehan</div>
																					<div class='fl' style='width:10px;'>:</div>
																					<div class='fl'>".$totalPerolehan."</div>
																					<div class='fix'></div>
																					<div class='fl bold' style='width:150px;'>Sisa Kekurangan</div>
																					<div class='fl bold' style='width:10px;'>:</div>
																					<div class='fl bold'>".$totalKekurangan."</div>
																					<div class='fix'></div>
																					<div class='fl' style='width:150px;'>Total Kelayakan</div>
																					<div class='fl' style='width:10px;'>:</div>
																					<div class='fl'>".$totalKelayakan."</div>
																					<div class='fix'></div>
																					<div class='fl' style='width:150px;'>Total Kelebihan</div>
																					<div class='fl' style='width:10px;'>:</div>
																					<div class='fl'>".$totalKelebihan."</div>
																					<div class='fix'></div>
																					<div class='fl' style='width:150px;'>Total Saving</div>
																					<div class='fl' style='width:10px;'>:</div>
																					<div class='fl'>".$totalSaving."</div>
																					<div class='fix'></div>
																					<div class='fl bold' style='width:150px;'>Total Disetujui</div>
																					<div class='fl bold' style='width:10px;'>:</div>
																					<div class='fl bold'>".$totalDisetujui."</div>
																					<div class='fix'></div>
																				</div>
																			</li>
																		</ul>
																	</li>													
																</ul>";
															$no++;
														}												
													}
													else {
														$isi.="<div>Masih Kosong</div>";
													}
												}
												break;
											case '2': //Pengajuan DIAJUKAN
												$sqlPengajuan="	SELECT P.idPerolehan, P.nip, P.currentGol, P.toGol, P.tglPerolehan, S.idKenaikan, Pg.namaPeg 
																FROM ak_perolehan P, ak_skenario S, peg_pegawai Pg 
																WHERE P.idSkenario=S.idSkenario 
																AND P.statusPerolehan='".$rowHead['idStatusPengajuan']."' 
																AND P.nip=Pg.nip 
																ORDER BY P.tglPerolehan DESC";
												$queryPengajuan=mysql_query($sqlPengajuan,$DB->opendb());
												if($DB->rs()) {
													if(mysql_num_rows($queryPengajuan)>0) {
														$no=1;
														$isi.="	
															<div class='ddd head-pengajuan'>
																<div class='fl bold' style='width:30px;'>No.</div>
																<div class='fl bold' style='width:80px;'>Tanggal</div>
																<div class='fl bold' style='width:160px;'>NIP</div>
																<div class='fl bold' style='width:250px;'>Nama Dosen</div>
																<div class='fl bold' style='width:90px; padding-right:20px;'>Dari</div>
																<div class='fl bold' style='width:90px;'>Naik Ke</div>
																<div class='fix'></div>
															</div>";												
														while($rowPengajuan=mysql_fetch_array($queryPengajuan)) {													
															$isi.="
																<ul id='menu3' class='menu noaccordion'>
																	<li>
																		<a href='#$no'>
																			<div class='ddd isi-pengajuan' style=''>
																				<div class='fl' style='width:30px;'>".$no."</div>
																				<div class='fl' style='width:80px;'>".$general->formatTanggal($rowPengajuan['tglPerolehan'])."</div>
																				<div class='fl' style='width:160px;'>".$rowPengajuan['nip']."</div>
																				<div class='fl' style='width:250px;'>".$rowPengajuan['namaPeg']."</div>
																				<div class='fl' style='width:90px; padding-right:20px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['currentGol'])."</div>																	
																				<div class='fl' style='width:90px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['toGol'])."</div>																	
																				<div class='fix'></div>
																			</div>
																		</a>
																		<ul>
																			<li>
																				<div class='ddd show-pengajuan' style=''>
																					<table cellpadding='1' border='0' cellspacing='1' width='100%'>";
																						$sqlAll="	SELECT idDetail 
																									FROM ak_perolehan_detail 
																									WHERE idPerolehan='".$rowPengajuan['idPerolehan']."' 
																									AND statusDetail='1' 
																									AND valueKd='5'";
																						$queryAll=mysql_query($sqlAll,$DB->opendb());
																						if(mysql_num_rows($queryAll)==0) {
																							$isi.="
																							<tr>
																								<td colspan='3' align='center'><a href='?u=angkakredit&act=divalidasi&id=".$rowPengajuan['idPerolehan']."'>VALIDASI PENGAJUAN</a></td>
																							</tr>";
																						}
																						$isi.="
																						<tr>
																							<th>No</th>
																							<th align='left'>Item</th>
																							<th align='left'>Bukti</th>
																							<th align='left'>Info Lain</th>
																							<th>Validasi</th>
																						</tr>";
																						$sqlDet="	SELECT Pd.idDetail, Pd.valueBukti, Pd.infoLain, Pd.valueKd, K.namaKategori, Pd.statusDetail 
																									FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk, ak_kategori K 
																									WHERE Pd.idPerolehan='".$rowPengajuan['idPerolehan']."' 
																									AND Pd.idRelasiKat=Rk.idRelasiKat 
																									AND Rk.kdKategori=K.kdKategori";
																						$queryDet=mysql_query($sqlDet,$DB->opendb());
																						if(mysql_num_rows($queryDet)>0) {
																							$no=1;
																							while($rowDet=mysql_fetch_array($queryDet)) {
																								if($rowDet['valueKd']==5) {
																									$idDet[]=$rowDet['idDetail'];
																									$number[]=$no;
																									$namaKategori[]=$rowDet['namaKategori'];
																									$statusDetail[]=$rowDet['statusDetail'];
																								}
																								else {
																									$bukti[]=$rowDet['valueBukti'];
																									$infoLain[]=$rowDet['infoLain'];
																								}																								
																								$no++;
																							}
																							for($i=0; $i<count($idDet); $i++) {
																								$isi.="
																								<tr>
																									<td>".$number[$i]."</td>
																									<td align='left'>".$namaKategori[$i]."</td>
																									<td align='left'>".$bukti[$i]."</td>
																									<td align='left'>".$infoLain[$i]."</td>
																									<td>";
																										if($statusDetail[$i]=="1") {
																											$isi.="<a href='?u=angkakredit&act=validasi&id=".$idDet[$i]."'>Validasi</a>";
																										}
																										else {
																											$isi.="<img src='./images/ceklis.png' width='16' height='16'>";
																										}
																									$isi.="
																									</td>
																								</tr>";
																							}
																						}
																						$isi.="
																					</table>
																				</div>
																			</li>
																		</ul>
																	</li>													
																</ul>";
															$no++;
														}												
													}
													else {
														$isi.="<div>Masih Kosong</div>";
													}
												}
												break;
											case '3': //Pengajuan TERVALIDASI
												$sqlPengajuan="	SELECT P.idPerolehan, P.nip, P.currentGol, P.toGol, P.tglPerolehan, S.idKenaikan, Pg.namaPeg 
																FROM ak_perolehan P, ak_skenario S, peg_pegawai Pg 
																WHERE P.idSkenario=S.idSkenario 
																AND P.statusPerolehan='".$rowHead['idStatusPengajuan']."' 
																AND P.nip=Pg.nip 
																ORDER BY P.tglPerolehan DESC";
												$queryPengajuan=mysql_query($sqlPengajuan,$DB->opendb());
												if($DB->rs()) {
													if(mysql_num_rows($queryPengajuan)>0) {
														$no=1;
														$isi.="	
															<div class='ddd head-pengajuan'>
																<div class='fl bold' style='width:30px;'>No.</div>
																<div class='fl bold' style='width:80px;'>Tanggal</div>
																<div class='fl bold' style='width:160px;'>NIP</div>
																<div class='fl bold' style='width:250px;'>Nama Dosen</div>
																<div class='fl bold' style='width:90px; padding-right:20px;'>Dari</div>
																<div class='fl bold' style='width:90px;'>Naik Ke</div>
																<div class='fix'></div>
															</div>";													
														while($rowPengajuan=mysql_fetch_array($queryPengajuan)) {													
															$isi.="
																<ul id='menu3' class='menu noaccordion'>
																	<li>
																		<a href='#'>
																			<div class='ddd isi-pengajuan' style=''>
																				<div class='fl' style='width:30px;'>".$no."</div>
																				<div class='fl' style='width:80px;'>".$general->formatTanggal($rowPengajuan['tglPerolehan'])."</div>
																				<div class='fl' style='width:160px;'>".$rowPengajuan['nip']."</div>
																				<div class='fl' style='width:250px;'>".$rowPengajuan['namaPeg']."</div>
																				<div class='fl' style='width:90px; padding-right:20px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['currentGol'])."</div>																	
																				<div class='fl' style='width:90px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['toGol'])."</div>																	
																				<div class='fix'></div>
																			</div>
																		</a>
																		<ul>
																			<li>																				
																				<div class='ddd show-pengajuan' style='text-align:center;'>																					
																					<form action='?u=angkakredit&act=setujui' method='post'>
																						<input type='hidden' name='id' value='".$rowPengajuan['idPerolehan']."'>";
																						
																						$sqlCek="	SELECT pangkat, TMTPangkat, golRuang 
																									FROM peg_kepangkatan 
																									WHERE nip='".$rowPengajuan['nip']."'";
																						$DB->executeQuery($sqlCek);
																						if($DB->getRows()==1) {
																							$rowCek=$DB->getResult();
																						}
																						
																						$isi.="
																						<div class='list2' style='background-color: #dedede;'>
																							<div class='fl' style='width:150px; text-align:left;'>Pangkat / Gol. Ruang</div>
																							<div class='fl' style='width:10px;'>:</div>
																							<div class='fl'>
																								<input type='hidden' name='pangkatDB' value='".$rowCek['pangkat']."'>
																								<input type='hidden' name='golRuangDB' value='".$rowCek['golRuang']."'>
																								".$rowCek['pangkat']." / ".$rowCek['golRuang']."
																							</div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																							<div class='fl' style='width:150px; text-align:left;'>TMT Pangkat</div>
																							<div class='fl' style='width:10px;'>:</div>
																							<div class='fl'>
																								<input type='hidden' name='TMTPangkatDB' value='".$rowCek['TMTPangkat']."'>
																								".$general->formatTanggal3($rowCek['TMTPangkat'])."
																							</div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																						</div>
																						<div class='list2' style='margin-bottom:10px;'>
																							<div class='fl'><input type='checkbox' name='cek' value='1'></div>
																							<div class='fl kecil'>&nbsp;Ceklis jika data kepangkatan sama dengan di atas, tetapi jika tidak sama anda harus mengisi form di bawah ini :</div>
																							<div class='fix' style='margin-bottom:10px;'></div>
																							
																							<div class='fl' style='width:150px; text-align:left;'>Pangkat / Gol. Ruang</div>
																							<div class='fl' style='width:10px;'>:</div>
																							<div class='fl'><input type='text' name='pangkat'>&nbsp;<input type='text' name='golRuang'></div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																							
																							<div class='fl' style='width:150px; text-align:left;'>TMT Pangkat</div>
																							<div class='fl' style='width:10px;'>:</div>
																							<div class='fl'><input type='text' name='TMTPangkat' id='datepicker'></div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																						</div>
																						
																						<div class='list2'>
																							<div style='text-align:left; width:122px;' class='fl'>Perolehan</div>
																							<div style='text-align:left; width:10px;' class='fl'>:</div>
																							<div style='text-align:left;' class='fl'><a href='?u=angkakredit&act=notausul&id=".$rowPengajuan['idPerolehan']."' target='_blank'><img src='./images/pdf.png' width='16' height='16' border='0'></a></div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																							
																							<div class='fl' style='width:120px; text-align:left;'>Nomor SK</div>
																							<div class='fl' style='width:10px;'>:</div>
																							<div class='fl'><input type='text' name='noSK'></div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																							
																							<div class='fl' style='width:120px; text-align:left;'>TMT Jabatan</div>
																							<div class='fl' style='width:10px;'>:</div>
																							<div class='fl'><input type='text' name='TMTKepangkatan' id='datepicker2'></div>
																							<div class='fix'></div>
																						</div>
																						
																						<div style=''><input type='submit' value='Setujui' class='input' style='height:30px; width:100%;'></div>
																					</form>
																				</div>
																			</li>
																		</ul>
																	</li>													
																</ul>";
															$no++;
														}												
													}
													else {
														$isi.="<div>Masih Kosong</div>";
													}
												}
												break;
											case '4': //Pengajuan DISETUJUI
												$sqlPengajuan="	SELECT P.idPerolehan, P.nip, P.currentGol, P.toGol, P.tglPerolehan, S.idKenaikan, Pg.namaPeg 
																FROM ak_perolehan P, ak_skenario S, peg_pegawai Pg 
																WHERE P.idSkenario=S.idSkenario 
																AND P.statusPerolehan='".$rowHead['idStatusPengajuan']."' 
																AND P.nip=Pg.nip 
																ORDER BY P.tglPerolehan DESC";
												$queryPengajuan=mysql_query($sqlPengajuan,$DB->opendb());
												if($DB->rs()) {
													if(mysql_num_rows($queryPengajuan)>0) {
														$no=1;
														$isi.="	
														<table width='100%' cellpadding='1' cellspacing='1' border='0'>
															<tr>
																<th style='text-align:left;'>No</th>
																<th style='text-align:left;'>NIP</th>
																<th style='text-align:left;'>Nama Dosen</th>
																<th style='text-align:left;'>Dari</th>
																<th style='text-align:left;'>Naik Ke</th>
																<th>Komplit</th>
															</tr>";																										
														while($rowPengajuan=mysql_fetch_array($queryPengajuan)) {													
															$isi.="
															<tr>
																<td style='text-align:left;'>".$no."</td>
																<td style='text-align:left;'>".$rowPengajuan['nip']."</td>
																<td style='text-align:left;'>".$rowPengajuan['namaPeg']."</td>
																<td style='text-align:left;'>".$AK->getPangkatYangDipilihString($rowPengajuan['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['currentGol'])."</td>
																<td style='text-align:left;'>".$AK->getPangkatYangDipilihString($rowPengajuan['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['toGol'])."</td>
																<td><img src='./images/ceklis.png' width='16' height='16'></td>
															</tr>
															";
															$no++;
														}
														$isi.="</table>";
													}
													else {
														$isi.="<div>Masih Kosong</div>";
													}
												}
												break;
										}										
									$isi.="
									</div>";
								}
							}
						}
					$isi.="
					</div>
				</div>
			</div>";
	}
	$layout->setContent($isi);
	$layout->HTML_render();
?>