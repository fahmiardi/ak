<?php
	switch($_GET['act']) {
		case 'terima': // approval dari 0 atau 1 ke 2 [statusDetail masih tetap 1]
			$id=(int)$_GET['id'];//idDetail
			$sqlValid="	UPDATE ak_perolehan_detail 
						SET approval='2' 
						WHERE idDetail='".$id."'";
			$DB->executeQuery($sqlValid);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit#terbaru");
			}
			break;
		case 'tolak': // approval dari 0 ke 1 [statusDetail masih tetap 1]
			$id=(int)$_GET['id'];//idDetail
			$sqlValid="	UPDATE ak_perolehan_detail 
						SET approval='1' 
						WHERE idDetail='".$id."'";
			$DB->executeQuery($sqlValid);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit#terbaru");
			}
			break;
		case 'approve': // approve dari 0 ke 1, [statusDetail masih tetap 1]
			$id=(int)$_GET['id'];//idPerolehan
			$sqlValid="	UPDATE ak_perolehan 
						SET approve='1' 
						WHERE idPerolehan='".$id."'";
			$DB->executeQuery($sqlValid);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit#diajukan");
			}
			break;
		case 'validasi': // statusDetail 1 ke 2
			$id=(int)$_GET['id'];//idDetail
			$sqlValid="	UPDATE ak_perolehan_detail 
						SET statusDetail='2' 
						WHERE idDetail='".$id."'";
			$DB->executeQuery($sqlValid);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit#diajukan");
			}
			break;
		case 'semuavalid': //statusPerolehan 2 ke 3
			$id=(int)$_GET['id'];//idPerolehan
			$sqlValid="	UPDATE ak_perolehan 
						SET statusPerolehan='3' 
						WHERE idPerolehan='".$id."'";
			$DB->executeQuery($sqlValid);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit#tervalidasi");
			}
			break;
		case 'setujui': // 
			$id=(int)$_POST['id'];//idPerolehan
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
												$sqlPengajuan="	SELECT P.approve, P.idPerolehan, P.nip, P.currentGol, P.toGol, P.tglPerolehan, Pg.namaPeg, Pg.titleDepan, Pg.titleBelakang 
																FROM ak_perolehan P, peg_pegawai Pg, peg_kepangkatan K 
																WHERE P.statusPerolehan='".$rowHead['idStatusPengajuan']."' 
																AND P.nip=Pg.nip 
																AND P.currentGol=K.idGolongan 
																AND Pg.nip=K.nip 
																AND K.active='1' 
																ORDER BY P.tglPerolehan DESC";
												$queryPengajuan=mysql_query($sqlPengajuan,$DB->opendb());
												if($DB->rs()) {
													if(mysql_num_rows($queryPengajuan)>0) {
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
														$no=1;
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
																					$tmt->setIdPerolehan($rowPengajuan['idPerolehan']);
																					$tmt->hitung();
																					$lebih=$tmt->getKelebihanHari();
																					$kurang=$tmt->getKekuranganHari();
																					
																					if($kurang>0 && $lebih==0) {
																						$valid=false;
																						$msg="Pengajuan akan jatuh pada tanggal <b>".$general->formatTanggal3($tmt->getTMTNext())."</b> dan tinggal <b>".$kurang."</b> hari lagi.";
																					}
																					elseif($kurang==0 && $lebih==0) {
																						$valid=true;
																						$msg="Pengajuan jatuh pada hari ini tanggal <b>".$general->formatTanggal3($tmt->getTMTNext())."</b>";
																					}
																					elseif($kurang==0 && $lebih>0) {
																						$valid=true;
																						$msg="Pengajuan telah jatuh pada tanggal <b>".$general->formatTanggal3($tmt->getTMTNext())."</b> dan sudah lebih <b>".$lebih."</b> hari.";
																					}
																					else {
																						$valid=false;
																						$msg="";
																					}
																					
																					//notif waktu kenaikan
																					$isi.="
																					<div class='list2' style='text-align:right; background-color:#eee;margin-bottom:px;'>".$msg."</div>";
																					
																					//query respon
																					$sqlCek2="	SELECT Pd.approval, P.approve 
																								FROM ak_perolehan_detail Pd, ak_perolehan P 
																								WHERE Pd.idPerolehan='".$rowPengajuan['idPerolehan']."' 
																								AND Pd.valueKd='5' 
																								AND Pd.idPerolehan=P.idPerolehan";
																					$queryCek2=mysql_query($sqlCek2,$DB->opendb());
																					if(mysql_num_rows($queryCek2)>0) {
																						while($rowCek2=mysql_fetch_array($queryCek2)) {
																							if($rowCek2['approval']==0) {
																								$auth=false;
																								break;
																							}
																							else {
																								if($rowCek2['approval']==1) {
																									$auth=false;
																									break;
																								}
																								else {
																									$auth=true;
																								}
																							}
																							if($rowCek2['approve']==1) {
																								$auth2=true;
																							}
																							else {
																								$auth2=false;
																								break;
																							}
																						}
																					}
																					
																					//notif respon
																					if($auth) { //sudah diterima semua
																						if($pengajuan->getSisa($rowPengajuan['idPerolehan'])==0) {
																							if($valid) {
																								if($auth2) {
																									$isi.="
																									<div style='width:100%; text-align:center; color:red; margin:5px; 0;'>Menunggu finishing dari dosen.</div>";
																								}
																								else {
																									$isi.="
																									<div style='width:100%; text-align:center;'><a href='?u=angkakredit&act=approve&id=".$rowPengajuan['idPerolehan']."'>Approve</a></div>";
																								}
																							}
																							else {
																								$isi.="
																								<div style='width:100%; text-align:center; color:red; margin-bottom:10px;'>TMT belum terpenuhi.</div>";
																							}
																						}
																						else {
																							$isi.="
																							<div style='width:100%; text-align:center; color:red; margin-bottom:10px;'>Sisa kekurangan belum terpenuhi.</div>";
																						}
																					}
																					
																					$isi.="
																					<div class='list2'>";
																					
																					$sqlGroup="	SELECT idGroup, namaGroup 
																								FROM ak_group 
																								WHERE idGroup!='1'";
																					$queryGroup=mysql_query($sqlGroup,$DB->opendb());
																					if(mysql_num_rows($queryGroup)>0) {
																						$nop=1;
																						while($rowGroup=mysql_fetch_array($queryGroup)) {
																							$isi.="
																							<div class='list2 bold' style='width:200px; background-color:#eee;'>".strtoupper($rowGroup['namaGroup'])."</div>
																							<div class='list2' style='margin-bottom:10px;'>";
																								$sqlCek="	SELECT idDetail 
																											FROM ak_perolehan_detail 
																											WHERE idPerolehan='".$rowPengajuan['idPerolehan']."'";
																								$queryCek=mysql_query($sqlCek,$DB->opendb());
																								if(mysql_num_rows($queryCek)>0) {
																									$sqlDet="	SELECT Pd.valueKd, Pd.valueBukti, Pd.infoLain, Pd.approval, Pd.idDetail, K.kdKategori, K.namaKategori 
																												FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk, ak_kategori K 
																												WHERE Pd.idPerolehan='".$rowPengajuan['idPerolehan']."' 
																												AND Pd.idRelasiKat=Rk.idRelasiKat 
																												AND Rk.kdKategori=K.kdKategori 
																												AND K.idGroup='".$rowGroup['idGroup']."' 
																												AND Pd.statusDetail='1' 
																												ORDER BY tglDetail DESC";
																									$queryDet=mysql_query($sqlDet,$DB->opendb());
																									if(mysql_num_rows($queryDet)>0) {
																										$isi.="
																										<div class='fl bold' style='width:50px;'>No.</div>
																										<div class='fl bold' style='width:110px;'>Kd Kategori</div>
																										<div class='fl bold' style='width:200px;'>Nama Kategori</div>
																										<div class='fl bold' style='width:100px;'>Bukti</div>
																										<div class='fl bold' style='width:100px;'>Info</div>
																										<div class='fl bold' style='width:50px; text-align:center;'>Status</div>
																										<div class='fl bold' style='margin-left:15px;'>Respon</div>
																										<div class='fix'></div>
																										
																										<div style='border:1px solid #ccc; border-bottom:0px;'></div>
																										<div style='padding-bottom:5px;'></div>";
																										
																										while($rowDet=mysql_fetch_array($queryDet)) {
																											if($rowDet['valueKd']==5) {
																												$number[]=$nop;
																												$idDet[]=$rowDet['idDetail'];
																												$kdKat[]=$rowDet['kdKategori'];
																												$namaKat[]=$rowDet['namaKategori'];
																												$app[]=$rowDet['approval'];
																												$nop++;
																											}
																											else {
																												$bukti[]=$rowDet['valueBukti'];
																												$info[]=$rowDet['infoLain'];
																											}
																										}
																										
																										
																										if(count($number)!=0) {
																											for($i=0; $i<count($number); $i++) {
																												if($bukti[$i]=="") {
																													$buktis="-";
																												}
																												else {
																													$buktis=$bukti[$i];
																												}
																												if($info[$i]=="") {
																													$infos="-";
																												}
																												else {
																													$infos=$info[$i];
																												}
																												$isi.="
																												<div class='fl' style='width:50px;'>".$number[$i]."</div>
																												<div class='fl' style='width:110px;'>".$kdKat[$i]."</div>
																												<div class='fl' style='width:200px;'>".$namaKat[$i]."</div>
																												<div class='fl' style='width:100px;'>".$buktis."</div>
																												<div class='fl' style='width:100px;'>".$infos."</div>
																												<div class='fl' style='width:50px; text-align:center;'>";
																													if($app[$i]==0) {
																														$isi.="<img src='./images/warning.png' width='16' height='16'>";
																													}
																													elseif($app[$i]==1) {
																														$isi.="<img src='./images/drop1.png' width='16' height='16'>";
																													}
																													else {
																														$isi.="<img src='./images/ceklis.png' width='16' height='16'>";
																													}
																												$isi.="
																												</div>
																												<div class='fl' style='margin-left:15px;'>";
																													if($app[$i]!=2) {
																														$isi.="
																														<a href='?u=angkakredit&act=terima&id=".$idDet[$i]."'>Terima</a>
																														<a href='?u=angkakredit&act=tolak&id=".$idDet[$i]."'>Tolak</a>";
																													}
																												$isi.="
																												</div>
																												<div class='fix' style='padding-bottom:5px;'></div>";
																											}
																											//reset
																										}
																									}
																									else {
																										$isi.="<div style='color:red;'>Perolehan unsur ini masih kosong.</div>";
																									}
																								}
																								else {
																									$isi.="<div>Perolehan masih kosong.</div>";
																								}
																							$isi.="
																							</div>";
																							
																							//reset all array
																							unset($number);
																							unset($idDet);
																							unset($kdKat);
																							unset($namaKat);
																							unset($app);
																							unset($bukti);
																							unset($info);
																						}
																					}
																				$isi.="	
																					</div>
																					<div class='lis2' style='margin-top:20px;'>
																						<div style='margin-bottom:5px;'><i><b>*Status Approval:</b></i></div>
																						
																						<div class='fl' style='width:20px;'><img src='./images/warning.png' width='16' height='16'></div>
																						<div class='fl'>Belum direspon</div>
																						<div class='fix'></div>
																						
																						<div class='fl' style='width:20px;'><img src='./images/drop1.png' width='16' height='16'></div>
																						<div class='fl'>Ditolak</div>
																						<div class='fix'></div>
																						
																						<div class='fl' style='width:20px;'><img src='./images/ceklis.png' width='16' height='16'></div>
																						<div class='fl'>Diterima</div>
																						<div class='fix'></div>
																					</div>
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
												$sqlPengajuan="	SELECT P.idPerolehan, P.nip, P.currentGol, P.toGol, P.tglPerolehan, Pg.namaPeg, Pg.titleDepan, Pg.titleBelakang 
																FROM ak_perolehan P, peg_pegawai Pg, peg_kepangkatan K 
																WHERE P.statusPerolehan='".$rowHead['idStatusPengajuan']."' 
																AND P.nip=Pg.nip 
																AND P.currentGol=K.idGolongan 
																AND Pg.nip=K.nip 
																AND K.active='1' 
																AND P.approve='1' 
																ORDER BY P.tglPerolehan DESC";
												$queryPengajuan=mysql_query($sqlPengajuan,$DB->opendb());
												if($DB->rs()) {
													if(mysql_num_rows($queryPengajuan)>0) {
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
														$no=1;
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
																					//query fisik
																					$sqlCek2="	SELECT Pd.statusDetail 
																								FROM ak_perolehan_detail Pd, ak_perolehan P 
																								WHERE Pd.idPerolehan='".$rowPengajuan['idPerolehan']."' 
																								AND Pd.valueKd='5' 
																								AND Pd.idPerolehan=P.idPerolehan 
																								AND P.approve='1'";
																					$queryCek2=mysql_query($sqlCek2,$DB->opendb());
																					if(mysql_num_rows($queryCek2)>0) {
																						while($rowCek2=mysql_fetch_array($queryCek2)) {
																							if($rowCek2['statusDetail']==2) {
																								$auth=true;
																							}
																							else {
																								$auth=false;
																								break;
																							}
																						}
																					}
																					
																					//notif fisik
																					if($auth) { //sudah diterima semua
																						$isi.="
																						<div style='width:100%; text-align:center; margin-bottom:10px;'><a href='?u=angkakredit&act=semuavalid&id=".$rowPengajuan['idPerolehan']."'>Validasi</a></div>";
																					}
																					
																					$isi.="
																					<div class='list2'>";
																					
																					$sqlGroup="	SELECT idGroup, namaGroup 
																								FROM ak_group 
																								WHERE idGroup!='1'";
																					$queryGroup=mysql_query($sqlGroup,$DB->opendb());
																					if(mysql_num_rows($queryGroup)>0) {
																						$nop=1;
																						while($rowGroup=mysql_fetch_array($queryGroup)) {
																							$isi.="
																							<div class='list2 bold' style='width:200px; background-color:#eee;'>".strtoupper($rowGroup['namaGroup'])."</div>
																							<div class='list2' style='margin-bottom:10px;'>";
																								$sqlCek="	SELECT idDetail 
																											FROM ak_perolehan_detail 
																											WHERE idPerolehan='".$rowPengajuan['idPerolehan']."'";
																								$queryCek=mysql_query($sqlCek,$DB->opendb());
																								if(mysql_num_rows($queryCek)>0) {
																									$sqlDet="	SELECT Pd.valueKd, Pd.valueBukti, Pd.infoLain, Pd.statusDetail, Pd.idDetail, K.kdKategori, K.namaKategori 
																												FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk, ak_kategori K 
																												WHERE Pd.idPerolehan='".$rowPengajuan['idPerolehan']."' 
																												AND Pd.idRelasiKat=Rk.idRelasiKat 
																												AND Rk.kdKategori=K.kdKategori 
																												AND K.idGroup='".$rowGroup['idGroup']."' 
																												ORDER BY tglDetail DESC";
																									$queryDet=mysql_query($sqlDet,$DB->opendb());
																									if(mysql_num_rows($queryDet)>0) {
																										$isi.="
																										<div class='fl bold' style='width:50px;'>No.</div>
																										<div class='fl bold' style='width:110px;'>Kd Kategori</div>
																										<div class='fl bold' style='width:200px;'>Nama Kategori</div>
																										<div class='fl bold' style='width:130px;'>Bukti</div>
																										<div class='fl bold' style='width:130px;'>Info</div>
																										<div class='fl bold' style=''>Bukti Fisik</div>
																										<div class='fix'></div>
																										
																										<div style='border:1px solid #ccc; border-bottom:0px;'></div>
																										<div style='padding-bottom:5px;'></div>";																										
																										
																										while($rowDet=mysql_fetch_array($queryDet)) {
																											if($rowDet['valueKd']==5) {
																												$number[]=$nop;
																												$idDet[]=$rowDet['idDetail'];
																												$kdKat[]=$rowDet['kdKategori'];
																												$namaKat[]=$rowDet['namaKategori'];
																												$status[]=$rowDet['statusDetail'];
																												$nop++;
																											}
																											else {
																												$bukti[]=$rowDet['valueBukti'];
																												$info[]=$rowDet['infoLain'];
																											}
																										}
																										
																										
																										if(count($number)!=0) {
																											for($i=0; $i<count($number); $i++) {
																												if($bukti[$i]=="") {
																													$buktis="-";
																												}
																												else {
																													$buktis=$bukti[$i];
																												}
																												if($info[$i]=="") {
																													$infos="-";
																												}
																												else {
																													$infos=$info[$i];
																												}
																												$isi.="
																												<div class='fl' style='width:50px;'>".$number[$i]."</div>
																												<div class='fl' style='width:110px;'>".$kdKat[$i]."</div>
																												<div class='fl' style='width:200px;'>".$namaKat[$i]."</div>
																												<div class='fl' style='width:130px;'>".$buktis."</div>
																												<div class='fl' style='width:130px;'>".$infos."</div>
																												<div class='fl' style=''>";
																													if($status[$i]!=2) {
																														$isi.="
																														<a href='?u=angkakredit&act=validasi&id=".$idDet[$i]."'>Ada</a>";
																													}
																													else {
																														$isi.="
																														<img src='./images/ceklis.png' width='16' height='16'>";
																													}
																												$isi.="
																												</div>
																												<div class='fix' style='padding-bottom:5px;'></div>";
																											}
																											//reset
																										}
																									}
																									else {
																										$isi.="<div style='color:red;'>Perolehan unsur ini masih kosong.</div>";
																									}
																								}
																								else {
																									$isi.="<div>Perolehan masih kosong.</div>";
																								}
																							$isi.="
																							</div>";
																							//reset all array
																							unset($number);
																							unset($idDet);
																							unset($kdKat);
																							unset($namaKat);
																							unset($status);
																							unset($bukti);
																							unset($info);
																						}
																					}
																				$isi.="
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
												$sqlPengajuan="	SELECT P.idPerolehan, P.nip, P.currentGol, P.toGol, P.tglPerolehan, Pg.namaPeg, Pg.titleDepan, Pg.titleBelakang 
																FROM ak_perolehan P, peg_pegawai Pg, peg_kepangkatan K 
																WHERE P.statusPerolehan='".$rowHead['idStatusPengajuan']."' 
																AND P.nip=Pg.nip 
																AND P.currentGol=K.idGolongan 
																AND Pg.nip=K.nip 
																AND K.active='1' 
																AND P.approve='1' 
																ORDER BY P.tglPerolehan DESC";
												$queryPengajuan=mysql_query($sqlPengajuan,$DB->opendb());
												if($DB->rs()) {
													if(mysql_num_rows($queryPengajuan)>0) {
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
														$no=1;
														while($rowPengajuan=mysql_fetch_array($queryPengajuan)) {													
															$isi.="
																<ul id='menu3' class='menu noaccordion'>
																	<li>
																		<a href='#'>
																			<div class='ddd isi-pengajuan' style=''>
																				<div class='fl' style='width:30px;'>".$no."</div>
																				<div class='fl' style='width:80px;'>".$general->formatTanggal3($rowPengajuan['tglPerolehan'])."</div>
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
																						<div class='list2' style='background-color: #ddd; border-color:#ccc;'>
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
																							<div class='fl'><input type='text' name='pangkat' class='input' style='width:170px;'> / <input type='text' name='golRuang' class='input' style='width:80px;'></div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																							
																							<div class='fl' style='width:150px; text-align:left;'>TMT Pangkat</div>
																							<div class='fl' style='width:10px;'>:</div>
																							<div class='fl'><input type='text' class='input' style='width:110px;' name='TMTPangkat' id='datepicker'></div>
																							<div class='fix' style='padding-bottom:5px;'></div>
																							
																							<div class='list2'>
																								<div style='text-align:left; width:144px;' class='fl'>Perolehan</div>
																								<div style='text-align:left; width:10px;' class='fl'>:</div>
																								<div style='text-align:left;' class='fl'><a href='?u=angkakredit&act=notausul&id=".$rowPengajuan['idPerolehan']."' target='_blank'><img src='./images/pdf.png' width='16' height='16' border='0'></a></div>
																								<div class='fix' style='padding-bottom:5px;'></div>
																								
																								<div class='fl' style='width:144px; text-align:left;'>TMT Jabatan</div>
																								<div class='fl' style='width:10px;'>:</div>
																								<div class='fl'><input type='text' class='input' style='width:110px;' name='TMTKepangkatan' id='datepicker2'></div>
																								<div class='fix' style='padding-bottom:5px;'></div>
																								
																								<div class='fl' style='width:144px; text-align:left;'>Nomor SK</div>
																								<div class='fl' style='width:10px;'>:</div>
																								<div class='fl'><input type='text' name='noSK' class='input' style='width:300px;'></div>
																								<div class='fix'></div>
																							</div>
																						</div>
																						<div style=''><input type='submit' value='Setujui' class='submit' style='width:100%;'></div>
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
												$isi.="
												<form action='#disetujui' method='post'>
													<div class='fr' style='margin-bottom:5px;'>
														<div class='fl' style='margin-right:5px;'><input value='".$_POST['nipSort']."' type='text' name='nipSort' class='input' style='width:250px;'></div>
														<div class='fl'><input type='submit' value='Cari Dosen' class='submit' style='width:100px;'></div>
														<div class='fix'></div>
													</div>
													<div class='fix'></div>
												</form>";
												if(isset($_POST['nipSort']) && $_POST['nipSort']!="") {
													$nipSort=str_replace(" ","",trim($_POST['nipSort']," .,"));
													
													$paging->setOption("tabel", "ak_perolehan P, peg_pegawai Pg, peg_kepangkatan K");
													$paging->setOption("where", "WHERE P.statusPerolehan='4' AND P.nip=Pg.nip AND P.toGol=K.idGolongan AND Pg.nip=K.nip AND Pg.nip='".$nipSort."' AND K.active='1'");
													$paging->setOption("limit", "10");
													$paging->setOption("order", "ORDER BY P.tglPerolehan DESC");
												}
												else {
													$paging->setOption("tabel", "ak_perolehan P, peg_pegawai Pg, peg_kepangkatan K");
													$paging->setOption("where", "WHERE P.statusPerolehan='4' AND P.nip=Pg.nip AND P.toGol=K.idGolongan AND Pg.nip=K.nip AND K.active='1'");
													$paging->setOption("limit", "10");
													$paging->setOption("order", "ORDER BY P.tglPerolehan DESC");
												}
												
												$paging->setOption("page", $_REQUEST["page"]); // setup untuk ambil variable angka halaman (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
												$paging->setOption("web_url_page", "?u=angkakredit&page="); // setup alamat url (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
												$paging->setOption("extra_href", "#disetujui"); // setup alamat url (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
												
												// optional setup
												$paging->setOption("adjacents", "5"); // tampil berapa angka ke kanan dan ke kiri nya, jika kita diposisi tengah halaman
												$paging->setOption("txt_prev", "&laquo; sebelumnya"); // mengubah text "prev" menjadi "sebelumnya"
												$paging->setOption("txt_next", "berikutnya &raquo;"); // mengubah text "next" menjadi "berikutnya"
												
												// generate hasil pagination
												$hal_array = $paging->build();
												
												// setup penomoran
												$no = $hal_array["start"] + 1;
												
												$isi.="
												<div class='ddd head-pengajuan'>
													<div class='fl bold' style='width:30px;'>No.</div>
													<div class='fl bold' style='width:80px;'>Tanggal</div>
													<div class='fl bold' style='width:120px;'>NIP</div>
													<div class='fl bold' style='width:160px;'>Nama Dosen</div>
													<div class='fl bold' style='width:80px; padding-right:20px;'>Dari</div>
													<div class='fl bold' style='width:80px;'>Naik Ke</div>
													<div class='fl bold' style='width:40px;'>KUM</div>
													<div class='fl bold' style='width:40px;'>Total</div>
													<div class='fl bold' style='text-align:center; width:70px;'>TMT</div>
													<div class='fix'></div>
												</div>
												<div class='list2'>";
												while($rowPengajuan=mysql_fetch_array($hal_array["hasil"])) {
													if($rowPengajuan['titleDepan']=="") {
														$depan="";
													}
													else {
														$depan=$rowPengajuan['titleDepan'].", ";
													}
													if($rowPengajuan['titleBelakang']=="") {
														$blkng="";
													}
													else {
														$blkng=$rowPengajuan['titleBelakang'].", ";
													}
													$isi.="
													<div style='margin:2px 0;' class='hover'>
														<div class='fl' style='width:30px; margin-left:5px;'>".$no."</div>
														<div class='fl' style='width:80px;'>".$general->formatTanggal3($rowPengajuan['tglPerolehan'])."</div>
														<div class='fl' style='width:120px;'>".$rowPengajuan['nip']."</div>
														<div class='fl' style='width:160px;'>".$depan.$rowPengajuan['namaPeg'].$blkng."</div>
														<div class='fl' style='width:80px; padding-right:20px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['currentGol'])."</div>
														<div class='fl' style='width:80px;'>".$AK->getPangkatYangDipilihString($rowPengajuan['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowPengajuan['toGol'])."</div>
														<div class='fl' style='width:40px;'>".$rowPengajuan['perolehanKUM']."</div>
														<div class='fl' style='width:40px;'>".$rowPengajuan['totalKUM']."</div>
														<div class='fl' style=''>".$general->formatTanggal3($rowPengajuan['TMTKepangkatan'])."</div>
														<div class='fix'></div>
													</div>";
													$no++;
												}
												$isi.="
												</div>
												<div class='list2'>
													<div style='text-align:center; width:100%;'>
														<div style='margin-bottom:5px;'>Total ".$hal_array["total"]."</div>
														<div>".$hal_array["pagination"]."</div>
													</div>
												</div>";
													
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