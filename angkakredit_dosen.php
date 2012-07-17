<?php
	$u['u=angkakredit']="angka kredit";
	
	switch($_GET['act']) {
		case 'ajukan':
			switch($_GET['do']) {
				case 'hapus':
					$kdKategori=$_GET['kdKategori'];
					$auth=false;
					
					$sqlFilter="SELECT Pd.idDetail, Pd.valueKd 
								FROM ak_relasi_kategori Rk, ak_perolehan_detail Pd 
								WHERE Rk.idRelasiKat=Pd.idRelasiKat 
								AND Rk.kdKategori='".$kdKategori."'";
					$queryFilter=mysql_query($sqlFilter,$DB->opendb());
					if(mysql_num_rows($queryFilter)>0) {
						while($rowFilter=mysql_fetch_array($queryFilter)) {
							if($rowFilter['valueKd']==5) {
								$idDet=$rowFilter['idDetail'];
							}
							$sqlHapus="	DELETE FROM ak_perolehan_detail 
										WHERE idDetail='".$rowFilter['idDetail']."'";
							$DB->executeQuery($sqlHapus);
							if($DB->notNull()) {
								$auth=true;
							}
						}						
					}
					if($auth) {
						if($kategori->kategoriMengajar($kdKategori)) {
							$sqlHapus="	DELETE FROM ak_ngajar_detail 
										WHERE idDetail='".$idDet."'";
							$DB->executeQuery($sqlHapus);
							if($DB->notNull()) {
								header("Location: ./page.php?u=angkakredit");
							}
						}
						else {
							header("Location: ./page.php?u=angkakredit");
						}
					}
					break;
				case 'save':
					if($_POST['ajukan']!="") {
						$idPerolehan=$pengajuan->getPerolehanID();
						$kdKategori=$_POST['kdKategori'];											
						$date=date("Y-m-d");
						
						if($kategori->kategoriMengajar($kdKategori)) {
							$sqlCek="	SELECT Pd.idDetail 
										FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk 
										WHERE Pd.idPerolehan='".$idPerolehan."' 
										AND Pd.idRelasiKat=Rk.idRelasiKat 
										AND Rk.kdKategori='".$kdKategori."' 
										AND Pd.valueKd='2'";
							$DB->executeQuery($sqlCek);
							if($DB->getRows()==1) {
								$rowCek=$DB->getResult();
								
								$sqlUpCek="	UPDATE ak_perolehan_detail 
											SET valueBukti='".$_POST['bukti']."', 
												infoLain='".$_POST['infoLain']."' 
											WHERE idDetail='".$rowCek['idDetail']."'";
								$DB->executeQuery($sqlUpCek);
								if($DB->notNull()) {
									header("Location: ./page.php?u=angkakredit");
								}
							}
						}
						else {
							$allow=array(2,5);
							foreach($allow as $kdRule) {
								$sqlAjukan="SELECT idRelasiKat, kdRule, valueAK, valueKd 
											FROM ak_relasi_kategori 
											WHERE kdKategori='".$kdKategori."' 
											AND kdRule='".$kdRule."'";
								$DB->executeQuery($sqlAjukan,$DB->opendb());
								if($DB->getRows()==1) {
									$rowAjukan=$DB->getResult();
									$kd=$rowAjukan['kdRule'];
									if($kd==2) {
										$valueKUM=0;
										$infoLain=$_POST['infoLain'];
										$bukti=$_POST['bukti'];	
									}
									else {
										$valueKUM=$rowAjukan['valueAK'];
										$infoLain="";
										$bukti="";	
									}
									$sqlSt="INSERT INTO ak_perolehan_detail 
											VALUES (null,
													'".$idPerolehan."',
													'".$rowAjukan['idRelasiKat']."',
													'".$rowAjukan['kdRule']."',
													'".$valueKUM."',
													'".$bukti."',
													'".$date."',
													'1',
													'0',
													'".$infoLain."')";									
									$DB->executeQuery($sqlSt);
									if($DB->notNull()) {
										$auth=true;
									}
									else {
										$auth=false;
									}							
								}
							}
							if($auth) {
								header("Location: ./page.php?u=angkakredit");
							}
						}
					}
					break;
				default:
					switch($_GET['opt']) {
						case 'mengajar':// Proses pengecualian mengajar
							$kdKategori=$_POST['kdKategori'];
							$idPerolehan=$pengajuan->getPerolehanID();
							$mataKuliah=$_POST['mataKuliah'];
							$sks=(int)$_POST['sks'];
							$jmlhKelas=(int)$_POST['jmlhKelas'];
							$semester=$_POST['semester'];
							$thnAkademikFrom=$_POST['thnAkademikFrom'];
							$thnAkademikTo=$_POST['thnAkademikTo'];
							$date=date("Y-m-d");
							
							$sqlCek="	SELECT Pd.idDetail 
										FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk 
										WHERE Pd.idPerolehan='".$idPerolehan."' 
										AND Pd.idRelasiKat=Rk.idRelasiKat 
										AND Rk.kdKategori='".$kdKategori."' 
										AND Pd.valueKd='5'";
							$queryCek=mysql_query($sqlCek,$DB->opendb());
							if(mysql_num_rows($queryCek)==0) {
								$allow=array(2,5);
								foreach($allow as $kdRule) {
									$sqlAjukan="SELECT idRelasiKat, kdRule, valueAK, valueKd 
												FROM ak_relasi_kategori 
												WHERE kdKategori='".$kdKategori."' 
												AND kdRule='".$kdRule."'";
									$DB->executeQuery($sqlAjukan,$DB->opendb());
									if($DB->getRows()==1) {
										$rowAjukan=$DB->getResult();
										$kd=$rowAjukan['kdRule'];
										
										$valueKUM=0;
										$infoLain="";
										$bukti="";	
										
										$sqlSt="INSERT INTO ak_perolehan_detail 
												VALUES (null,
														'".$idPerolehan."',
														'".$rowAjukan['idRelasiKat']."',
														'".$rowAjukan['kdRule']."',
														'".$valueKUM."',
														'".$bukti."',
														'".$date."',
														'1',
														'0',
														'".$infoLain."')";									
										$DB->executeQuery($sqlSt);
										if($DB->notNull()) {
											$sqlDetail="SELECT Pd.idDetail 
														FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk 
														WHERE Pd.idPerolehan='".$idPerolehan."' 
														AND Pd.idRelasiKat=Rk.idRelasiKat 
														AND Rk.kdKategori='".$kdKategori."' 
														AND Rk.kdRule='5'";
											$DB->executeQuery($sqlDetail);
											if($DB->getRows()==1) {
												$rowDetail=$DB->getResult();
												
												$sqlMengajar="	INSERT INTO ak_ngajar_detail 
																VALUES (null,
																		'".$rowDetail['idDetail']."',
																		'".$mataKuliah."',
																		'".$sks."',
																		'".$jmlhKelas."',
																		'".$semester."',
																		'".$thnAkademikFrom."',
																		'".$thnAkademikTo."',
																		'".$date."',
																		'1')";
												$DB->executeQuery($sqlMengajar);
												if($DB->notNull()) {
													header("Location: ./page.php?u=angkakredit&act=ajukan&kdKategori=".$kdKategori."");
												}
											}
										}																
									}
								}
							}
							else {								
								$rowCek=mysql_fetch_array($queryCek);
								$sqlMengajar="	INSERT INTO ak_ngajar_detail 
												VALUES (null,
														'".$rowCek['idDetail']."',
														'".$mataKuliah."',
														'".$sks."',
														'".$jmlhKelas."',
														'".$semester."',
														'".$thnAkademikFrom."',
														'".$thnAkademikTo."',
														'".$date."',
														'1')";
								$DB->executeQuery($sqlMengajar);
								if($DB->notNull()) {
									header("Location: ./page.php?u=angkakredit&act=ajukan&kdKategori=".$kdKategori."");
								}
							}
							break;
						case 'hapus':
							$id=(int)$_GET['id'];
							$kdKategori=$_GET['kdKategori'];
							
							$sqlHapus="	DELETE FROM ak_ngajar_detail 
										WHERE idNgajarDetail='".$id."'";
							$DB->executeQuery($sqlHapus);
							if($DB->notNull()) {
								header("Location: ./page.php?u=angkakredit&act=ajukan&kdKategori=".$kdKategori."");
							}
							break;
						default:
							$kdKategori=$_GET['kdKategori'];
							$idPerolehan=$pengajuan->getPerolehanID();
							
							if($kategori->kategoriMengajar($kdKategori)) {
								$sqlCekV="	SELECT Pd.valueBukti, Pd.infoLain  
											FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk 
											WHERE Pd.idPerolehan='".$idPerolehan."' 
											AND Pd.idRelasiKat=Rk.idRelasiKat 
											AND Rk.kdKategori='".$kdKategori."' 
											AND Pd.valueKd='2'";
								$DB->executeQuery($sqlCekV);
								if($DB->getRows()==1) {
									$rowCekV=$DB->getResult();
								}
							}
							
							$isi.="	
							
								<input type='hidden' name='kdKategori' value='".$kdKategori."'>
								<div class='fl left-content'>
									<form action='?u=angkakredit&act=ajukan&do=save' method='post'>
										<input type='hidden' name='kdKategori' value='".$kdKategori."'>
										<div class='cart' style='padding-bottom:10px;'>
											<div class='cart-isi'>
												<div class='review-isi'>
													<div class='review-isi-head fl' style='width:100px;'>Kode Kategori</div>
													<div class='review-isi-skat fl'>:</div>
													<div class='review-isi-value'>".$kdKategori."</div>
												</div>
												<div class='review-isi'>
													<div class='review-isi-head fl' style='width:100px;'>Nama Kategori</div>
													<div class='review-isi-skat fl'>:</div>
													<div class='review-isi-value' style='margin-left:115px'>".$kategori->getNamaKategori($kdKategori)."</div>
												</div>
												<div class='review-isi'>
													<div class='review-isi-head fl' style='width:100px;'>Bukti</div>
													<div class='review-isi-skat fl'>:</div>
													<div class='review-isi-value'>
														<textarea class='input' style='width:190px; height:50px;' name='bukti'>".$rowCekV['valueBukti']."</textarea><br />
														<span class='f-verdana bukti'>(required) Berisi Nomor Surat, Nomor SK, Judul Jurnal, dan lain-lain.</span>
													</div>
												</div>
												<div class='review-isi'>
													<div class='review-isi-head fl' style='width:100px;'>Info Lain</div>
													<div class='review-isi-skat fl'>:</div>
													<div class='review-isi-value'>
														<textarea class='input' style='width:190px; height:100px;' name='infoLain'>".$rowCekV['infoLain']."</textarea><br />
														<span class='f-verdana bukti'>(optional) Berisi informasi atau keterangan lain yang mendukung bukti.</span>
													</div>
												</div>
											</div
										</div>";
										if($kategori->kategoriMengajar($kdKategori)) {
											$sqlCekV="	SELECT Pd.idDetail  
														FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk 
														WHERE Pd.idPerolehan='".$idPerolehan."' 
														AND Pd.idRelasiKat=Rk.idRelasiKat 
														AND Rk.kdKategori='".$kdKategori."' 
														AND Pd.valueKd='2'";
											$DB->executeQuery($sqlCekV);
											if($DB->getRows()==1) {
												$isi.="
												<div style='margin-top:px;'>
													<div><input type='submit' value='AJUKAN' name='ajukan' class='submit' style='font-weight:bold; width:100%;'></div>
												</div>";
											}
										}
										else {
											$isi.="
											<div style='margin-top:px;'>
												<div><input type='submit' value='AJUKAN' name='ajukan' class='submit' style='font-weight:bold; width:100%;'></div>
											</div>";
										}
									$isi.="
									</form>
								</div>";
								$isi.="
								<div class='right-content'>
									<div class='show-head free2'>
										<div class='show-name f-verdana free2'>Rule Kategori Angka Kredit</div>
									</div>
									<div class='list'>";
										$sqlProperti="	SELECT R.count, R.kdRule, R.namaRule, Rk.valueAK, Rk.valueKd, Rk.valuePatut 
														FROM ak_rule R, ak_relasi_kategori Rk 
														WHERE parentId='0' 
														AND Rk.kdKategori='".$kdKategori."' 
														AND Rk.kdRule=R.kdRule";
										$DB->executeQuery($sqlProperti);
										if($DB->rs()) {
											while($rowProperti=$DB->getResult()) {
												$isi.="	<div class='review-isi'>
															<div class='review-isi-head fl'>".$rowProperti['namaRule']."</div>
															<div class='review-isi-skat fl'>:</div>
															<div class='review-isi-value' style='margin-left:165px;'>";
																if($rowProperti['count']==0) {
																	if($rowProperti['kdRule']=="3") {
																		$val=$rowProperti['valuePatut'];
																	}
																	else {
																		$val=$rowProperti['valueAK'];
																	}
																	$isi.=$val;																					
																}
																else {
																	$val=$rowProperti['valueKd'];
																	$sqlCont="	SELECT namaRule 
																				FROM ak_rule 
																				WHERE kdRule='".$val."'";
																	$queryCont=mysql_query($sqlCont,$DB->opendb());
																	if(mysql_num_rows($queryCont)>0) {																					
																		while($rowCont=mysql_fetch_array($queryCont)) {
																			$namaRule=$rowCont['namaRule'];
																			$isi.=$namaRule;																						
																		}
																	}
																}
															$isi.="	
															</div>
														</div>";
											}
										}
										$isi.="	
										<div class='review-isi'>
											<div class='review-isi-head fl'>Deskripsi Kategori</div>
											<div class='review-isi-skat fl'>:</div>
											<div class='review-isi-value' style='margin-left:165px;'>".$kategori->getDeskripsiKategori($kdKategori)."</div>
										</div>
									</div>";
									//ini pengecualian untuk kategori mengajar
									if($kategori->kategoriMengajar($kdKategori)) {
										$isi.="
										<div class='show-head free2' style='margin-top:10px;'>
											<div class='show-name f-verdana free2'>Rule Angka Kredit Mengajar</div>
										</div>
										<div class='list'>";
											$sqlAKM="	SELECT valueSKS, valueKUM 
														FROM ak_relasi_ngajar 
														WHERE kdKategori='".$kdKategori."'";
											$DB->executeQuery($sqlAKM);
											if($DB->getRows()>0) {
												$a=0;
												$isi.="<table cellpadding='1' cellspacing='1' width='100%' border='0'>";
												while($rowAKM=$DB->getResult()) {
													if($a==0) {
														$back="Pertama";
													}
													else {
														$back="Berikutnya";
													}
													$isi.="
													<tr>
														<td class='left' style='width:120px;'>".$rowAKM['valueSKS']." SKS ".$back."</td>
														<td class='left' style='width:7px;'>:</td>
														<td class='left'>".$rowAKM['valueKUM']."</td>
													</tr>";
													$a++;
												}
												$isi.="</table>";
											}
										$isi.="	
										</div>
										
										<div class='show-head free2' style='margin-top:10px;'>
											<div class='show-name f-verdana free2'>Masukkan Matakuliah</div>
										</div>
										<div class='list'>
											<form action='?u=angkakredit&act=ajukan&opt=mengajar' method='post'>
												<input type='hidden' name='kdKategori' value='".$kdKategori."'>
												<table cellpadding='1' cellspacing='1' width='100%'>
													<tr>
														<td style='width:110px; text-align:left; vertical-align:top;'>Nama Matakuliah</td>
														<td style='width:10px; text-align:left; vertical-align:top;'>:</td>
														<td style='text-align:left; vertical-align:top;'><textarea class='input' name='mataKuliah' style='width:250px; height:40px;'></textarea></td>
													</tr>
													<tr>
														<td style='width:110px; text-align:left; vertical-align:top;'>SKS Matkul</td>
														<td style='width:10px; text-align:left; vertical-align:top;'>:</td>
														<td style='text-align:left; vertical-align:top;'><input type='tex' class='input' name='sks' style='width:50px;'></td>
													</tr>
													<tr>
														<td style='width:110px; text-align:left; vertical-align:top;'>Jumlah Kelas</td>
														<td style='width:10px; text-align:left; vertical-align:top;'>:</td>
														<td style='text-align:left; vertical-align:top;'><input type='tex' class='input' name='jmlhKelas' style='width:50px;'></td>
													</tr>
													<tr>
														<td style='width:110px; text-align:left; vertical-align:top;'>Semester</td>
														<td style='width:10px; text-align:left; vertical-align:top;'>:</td>
														<td style='text-align:left; vertical-align:top;'>
															<input type='radio' value='0' name='semester'>&nbsp;Ganjil<br>
															<input type='radio' value='1' name='semester'>&nbsp;Genap
														</td>
													</tr>
													<tr>
														<td style='width:110px; text-align:left; vertical-align:top;'>Tahun Akademik</td>
														<td style='width:10px; text-align:left; vertical-align:top;'>:</td>
														<td style='text-align:left; vertical-align:top;'>
															<input type='tex' class='input' name='thnAkademikFrom' style='width:50px;'>&nbsp;/
															<input type='tex' class='input' name='thnAkademikTo' style='width:50px;'>&nbsp;<span class='f-verdana bukti'>ex. ".(date('Y')-1)."/".date('Y')."</span>
														</td>
													</tr>
													<tr>
														<td colspan='3'>
															<div style='margin-top:10px;'>
																<div><input type='submit' value='Tambah Matakuliah' name='ajukan' class='submit' style='font-weight:bold; width:100%;'></div>
															</div>
														</td>
													</tr>
												</table>
											</form>
										</div>";
										
										$sqlShow="	SELECT Nd.idDetail 
													FROM ak_relasi_kategori Rk, ak_perolehan_detail Pd, ak_ngajar_detail Nd 
													WHERE Rk.idRelasiKat=Pd.idRelasiKat 
													AND Pd.idDetail=Nd.idDetail 
													AND Pd.valueKd='5' 
													AND Pd.idPerolehan='".$idPerolehan."' 
													AND Rk.kdKategori='".$kdKategori."' 
													GROUP BY idDetail";
										$queryShow=mysql_query($sqlShow,$DB->opendb());
										if(mysql_num_rows($queryShow)==1) {
											$rowShow=mysql_fetch_array($queryShow);
											$isi.="
											<div class='show-head free2' style='margin-top:10px;'>
												<div class='show-name f-verdana free2'>Perolehan Mengajar</div>
											</div>
											<div class='list'>";
												$sqlTA="SELECT thnAkademikFrom, thnAkademikTo 
														FROM ak_ngajar_detail 
														GROUP BY thnAkademikFrom 
														ORDER BY thnAkademikFrom ASC";
												$DB->executeQuery($sqlTA);
												if($DB->getRows()>0) {												
													$totalKUMMengajar=0;
													while($rowTA=$DB->getResult()) {
														$sqlIsi="	SELECT * 
																	FROM ak_ngajar_detail 
																	WHERE idDetail='".$rowShow['idDetail']."' 
																	AND thnAkademikFrom='".$rowTA['thnAkademikFrom']."' 
																	ORDER BY semester ASC";
														$queryIsi=mysql_query($sqlIsi,$DB->opendb());
														if(mysql_num_rows($queryIsi)>0) {
															$isi.="
															<div class='list' style='background-color:#eee;'>
																<table cellpadding='1' cellspacing='2' width='100%' border='0' style='margin-bottom:10px;'>
																	<tr>
																		<td class='left' colspan='5'>
																			<div class='fl bold' style='padding-right:5px;'>Tahun Akademik</div>
																			<div class='fl bold' style='padding-right:5px;'>:</div>
																			<div class='fl bold'>".$rowTA['thnAkademikFrom']."/".$rowTA['thnAkademikTo']."</div>
																			<div class='fix'></div>
																		</td>													
																	</tr>
																	<tr>
																		<td class='underline left'>Tanggal</td>														
																		<td class='underline left'>Matakuliah</td>														
																		<td class='underline'>SKS</td>														
																		<td class='underline'>Jumlah Kelas</td>														
																		<td class='underline left'>Semester</td>													
																		<td class=''></td>													
																	</tr>";
																	$totalSKSGanjil=0;
																	$totalSKSGenap=0;																
																	while($rowIsi=mysql_fetch_array($queryIsi)) {
																		if($rowIsi['semester']==0) {
																			$smt="Ganjil";
																			$totalSKSGanjil+=$rowIsi['sksMatkul']*$rowIsi['jmlhKelas'];
																		}
																		else {
																			$smt="Genap";
																			$totalSKSGenap+=$rowIsi['sksMatkul']*$rowIsi['jmlhKelas'];
																		}
																		$isi.="
																		<tr>
																			<td class='left'>".$general->formatTanggal($rowIsi['tglNgajDet'])."</td>														
																			<td class='left'>".strtoupper($rowIsi['namaMatkul'])."</td>														
																			<td>".$rowIsi['sksMatkul']."</td>														
																			<td>".$rowIsi['jmlhKelas']."</td>														
																			<td class='left'>".$smt."</td>														
																			<td class=''><a href='?u=angkakredit&act=ajukan&opt=hapus&kdKategori=".$kdKategori."&id=".$rowIsi['idNgajarDetail']."' onclick=\"return confirm('Anda yakin?')\"><img src='./images/drop.png' width='16' height='16' border='0'></a></td>														
																		</tr>
																		";
																	}
																	$isi.="
																	<tr>
																		<td colspan='5'>";
																			$sqlTotal="	SELECT valueSKS, valueKUM 
																						FROM ak_relasi_ngajar 
																						WHERE kdKategori='".$kdKategori."'";
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
																			else {
																				$isi.="t";
																			}
																			$isi.="
																			<div style='padding-top:10px;' class='left underline'>Semester Ganjil</div>
																			<div class='fl left' style='width:70px;'>Total SKS</div>
																			<div class='fl' style='padding-right:5px;'>:</div>
																			<div class='fl'>".$totalSKSGanjil."</div>
																			<div class='fix'></div>
																			<div class='fl left' style='width:70px;'>Total KUM</div>
																			<div class='fl' style='padding-right:5px;'>:</div>
																			<div class='fl'>".$totalKUMGanjil."</div>
																			<div class='fix'></div>
																			<div style='padding-top:10px;' class='left underline'>Semester Genap</div>
																			<div class='fl left' style='width:70px;'>Total SKS</div>
																			<div class='fl' style='padding-right:5px;'>:</div>
																			<div class='fl'>".$totalSKSGenap."</div>
																			<div class='fix'></div>
																			<div class='fl left' style='width:70px;'>Total KUM</div>
																			<div class='fl' style='padding-right:5px;'>:</div>
																			<div class='fl'>".$totalKUMGenap."</div>
																		</td>
																	</tr>
																	";
																$isi.="
																</table>
															</div>
															<div style='padding-bottom:5px;'></div>";
														}
													}
													$isi.="<div class='bold' style='padding:5px 0px;'>Total KUM Mengajar : ".$totalKUMMengajar."</div>";
													$sqlUpdateKUM="	UPDATE ak_perolehan_detail 
																	SET valueKUM='".$totalKUMMengajar."' 
																	WHERE idDetail='".$rowShow['idDetail']."'";
													$DB->executeQuery($sqlUpdateKUM);
												}											
											$isi.="
											</div>";
										}
										else {
											$sqlShow2="	SELECT Pd.idDetail 
														FROM ak_relasi_kategori Rk, ak_perolehan_detail Pd 
														WHERE Rk.idRelasiKat=Pd.idRelasiKat 
														AND Pd.idPerolehan='".$idPerolehan."' 
														AND Rk.kdKategori='".$kdKategori."'";
											$queryShow2=mysql_query($sqlShow2,$DB->opendb());
											if(mysql_num_rows($queryShow2)>0) {
												while($rowShow2=mysql_fetch_array($queryShow2)) {
													$sqlEmpty="	DELETE FROM ak_perolehan_detail 
																WHERE idDetail='".$rowShow2['idDetail']."'";
													$DB->executeQuery($sqlEmpty);
												}
											}
										}
									}
								$isi.="	
								</div>";
					}
			}			
			break;
		case 'notausul':
			include_once "./nota_usul.php";
			break;
		case 'pengajuan':
			if($_POST['lanjut']!="") {
				$nip=$user->getNIP();
				$tipeKenaikan=$_SESSION['tipeKenaikan'];
				$currentGol=$AK->getPangkatSekarangID();
				$toGol=$_SESSION['naikKe'];
				$idSkenario=$AK->getSkenarioID($tipeKenaikan);
				$date=date('Y-m-d');
				
				$sqlPerolehan="	INSERT INTO ak_perolehan 
								VALUES(	null,
										'".$nip."',
										'".$currentGol."',
										'".$toGol."',
										'".$idSkenario."',
										'1',
										'0',
										'".$date."',
										'',
										'')";
				$DB->executeQuery($sqlPerolehan);
				if($DB->notNull()) {
					$idPerolehan=$pengajuan->getPerolehanID();
					$sqlPresent="	SELECT idPresentasi, nilaiType 
									FROM ak_presentasi_kategori 
									WHERE idSkenario='".$idSkenario."'";
					$queryPresent=mysql_query($sqlPresent,$DB->opendb());
					if(mysql_num_rows($queryPresent)>0) {
						while($rowPresent=mysql_fetch_array($queryPresent)) {
							$score=($rowPresent['nilaiType']*$pengajuan->getKurangKUMyangDipilih())/100;
							$sqlInput="	INSERT INTO ak_perolehan_generate 
										VALUES (null,
												'".$idPerolehan."',
												'".$rowPresent['idPresentasi']."',
												'".$score."',
												'',
												'',
												'')";
							$DB->executeQuery($sqlInput);
							if($DB->notNull()) {
								$auth=true;
							}
							else {
								$auth=false;
							}
						}
					}
					if($auth) {
						header("Location: ./page.php?u=angkakredit");
					}
				}				
			}
			break;
		case 'finish':
			$idPerolehan=$pengajuan->getPerolehanID();
			$sqlFinish="UPDATE ak_perolehan 
						SET statusPerolehan='2' 
						WHERE idPerolehan='".$idPerolehan."'";
			$DB->executeQuery($sqlFinish);
			if($DB->notNull()) {
				header("Location: ./page.php?u=angkakredit");
			}
			break;
		case 'cancel':
			$idPerolehan=$pengajuan->getPerolehanID();
			
			$sqlCekDel1="	SELECT Pd.idDetail 
							FROM ak_perolehan_detail Pd, ak_ngajar_detail Nd 
							WHERE Pd.idPerolehan='".$idPerolehan."' 
							AND Pd.idDetail=Nd.idDetail 
							GROUP BY Pd.idDetail";
			$DB->executeQuery($sqlCekDel1);
			if($DB->getRows()==1) {
				$rowCekDel1=$DB->getResult();
				$sqlCekDel2="	DELETE FROM ak_ngajar_detail 
								WHERE idDetail='".$rowCekDel1['idDetail']."'";
				$DB->executeQuery($sqlCekDel2);
				if($DB->notNull()) {
					$sqlCekDel3="	DELETE FROM ak_perolehan_detail 
									WHERE idPerolehan='".$idPerolehan."'";
					$DB->executeQuery($sqlCekDel3);
					if($DB->notNull()) {
						$sqlCekDel4="	DELETE FROM ak_perolehan 
										WHERE idPerolehan='".$idPerolehan."'";
						$DB->executeQuery($sqlCekDel4);
						if($DB->notNull()) {
							$sqlCekDel4="	DELETE FROM ak_perolehan_generate 
											WHERE idPerolehan='".$idPerolehan."'";
							$DB->executeQuery($sqlCekDel4);
							if($DB->notNull()) {
								header("Location: ./page.php?u=angkakredit");
							}
						}
					}
				}
			}
			else {
				$sqlCekDel3="	DELETE FROM ak_perolehan_detail 
								WHERE idPerolehan='".$idPerolehan."'";
				$DB->executeQuery($sqlCekDel3);
				if($DB->notNull()) {
					$sqlCekDel4="	DELETE FROM ak_perolehan 
									WHERE idPerolehan='".$idPerolehan."'";
					$DB->executeQuery($sqlCekDel4);
					if($DB->notNull()) {
						$sqlCekDel4="	DELETE FROM ak_perolehan_generate 
										WHERE idPerolehan='".$idPerolehan."'";
						$DB->executeQuery($sqlCekDel4);
						if($DB->notNull()) {
							header("Location: ./page.php?u=angkakredit");
						}
					}
				}
			}
			break;
		default:
			if($pengajuan->getValidPengajuan()) {
			$isi.="	<div class='cart'>
						<div class='cart-isi'>
							<div style='overflow:auto;'>
								<div class='fl left-content' style='width:430px;'>
									<div style='padding:4px; background-color:#ffffff; border:1px solid #bbb;'>
										<div class='ddd' style='text-align:center; padding:5px 0px;color:#005994;border-bottom:0px;'><div>PERSENTASI</div></div>
										<div style='overflow:auto;'>";
										$sqlHead="	SELECT G.idGroup, G.namaGroup, Pk.type, Pk.nilaiType, Pg.ketentuanAngka 
													FROM ak_group G, ak_presentasi_kategori Pk, ak_perolehan P, ak_perolehan_generate Pg 
													WHERE G.idGroup=Pk.idGroup 
													AND Pk.idPresentasi=Pg.idPresentasi 
													AND P.idPerolehan=Pg.idPerolehan 
													AND Pg.idPerolehan='".$pengajuan->getPerolehanID()."' 
													ORDER BY G.idGroup ASC";
										$queryHead=mysql_query($sqlHead,$DB->opendb());
										if(mysql_num_rows($queryHead)>0) {
											$jmlh=mysql_num_rows($queryHead);
											$i=1;
											while($rowHead=mysql_fetch_array($queryHead)) {
												$w="width:105px";
												$fl="fl";
												if($i==1) {
													$border="";												
												}
												else {
													if($i==4) {
														$fl="";
														$w="";
													}
													$border="border-left:0px;";
												}
												$persentasi->setPersentasi($rowHead['idGroup'],$rowHead['type'],$rowHead['nilaiType'],$rowHead['ketentuanAngka']);
												$isi.="	<div class='".$fl."' style='".$w."'>
															<div class='ddd' style='text-align:center;".$border."border-bottom:0px;padding:3px 0;color:#d54e21;'>".ucwords($rowHead['namaGroup'])."</div>
															<div style='text-align:center;".$border."border-bottom:0px;padding:3px 0;' class='ddd'>
																<span style='font-size:small;color:#bbb;'>".strtoupper($rowHead['type'])."</span>
																<span style='font-size:small;color:#bbb;'>".$rowHead['nilaiType']." %</span>
															</div>
															<div class='ddd' style='text-align:center;padding:3px 0;".$border."'><span>".$rowHead['ketentuanAngka']."</span></div>
														</div>";
												$i++;
											}											
										}
										
									$isi.="
										</div>
										<div class='ddd' style='text-align:center; padding:5px 0px;color:#005994;border-TOP:0px;border-bottom:0px;'><div>PEROLEHAN</div></div>
										<div style='overflow:auto;'>";
											$idPerolehan=$pengajuan->getPerolehanID();
											$sqlGroup="	SELECT idGroup 
														FROM ak_Group 
														WHERE idGroup!='1'";
											$queryGroup=mysql_query($sqlGroup,$DB->opendb());
											if(mysql_num_rows($queryGroup)>0) {
												$jmlh=mysql_num_rows($queryGroup);
												$i=1;												
												while($rowGroup=mysql_fetch_array($queryGroup)) {
													$w="width:105px";
													$fl="fl";
													if($i==1) {
														$border="";												
													}
													else {
														if($i==4) {
															$fl="";
															$w="";
														}
														$border="border-left:0px;";
													}													
													
													$sqlPeroleh="	SELECT Pd.valueKUM, K.idGroup 
																	FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk, ak_kategori K 
																	WHERE Pd.idPerolehan='".$idPerolehan."' 
																	AND Pd.idRelasiKat=Rk.idRelasiKat 
																	AND Pd.valueKd='5' 
																	AND Rk.kdKategori=K.kdKategori 
																	AND K.idGroup='".$rowGroup['idGroup']."'";
													$queryPeroleh=mysql_query($sqlPeroleh,$DB->opendb());
													if(mysql_num_rows($queryPeroleh)>0) {
														$totalPerolehan=0;
														while($rowPeroleh=mysql_fetch_array($queryPeroleh)) {
															$totalPerolehan+=$rowPeroleh['valueKUM'];
														}
													}
													else {
														$totalPerolehan=0;
													}
													$persentasi->setNilaiKelayakan($rowGroup['idGroup'],$totalPerolehan);
													$isi.="
													<div class='".$fl."' style='".$w."'>
														<div class='ddd' style='text-align:center;padding:3px 0;".$border."'><span style='color:red;'>".$totalPerolehan."</span></div>
													</div>";
													$i++;
												}
											}
											$isi.="											
										</div>";
										$array=array(2,3,4,5);
										$isi.="
										<div class='ddd' style='text-align:center; padding:5px 0px;color:#005994;border-TOP:0px;border-bottom:0px;'><div>KELAYAKAN</div></div>
										<div style='overflow:auto;'>";
											$idx=1;
											foreach($array as $idG) {
												$w="width:105px";
												$fl="fl";
												if($idx==1) {
													$border="";												
												}
												else {
													if($idx==4) {
														$fl="";
														$w="";
													}
													$border="border-left:0px;";
												}
												$isi.="
												<div class='".$fl."' style='".$w."'>
													<div class='ddd' style='text-align:center;padding:3px 0;".$border."'><span style='color:red;'>".$persentasi->getTotal($idG)."</span></div>
												</div>";
												$idx++;
											}
										$isi.="
										</div>
										<div class='ddd' style='text-align:center; padding:5px 0px;color:#005994;border-TOP:0px;border-bottom:0px;'><div>KELEBIHAN</div></div>
										<div style='overflow:auto;'>";
											$idx=1;
											foreach($array as $idG) {
												$w="width:105px";
												$fl="fl";
												if($idx==1) {
													$border="";												
												}
												else {
													if($idx==4) {
														$fl="";
														$w="";
													}
													$border="border-left:0px;";
												}
												$isi.="
												<div class='".$fl."' style='".$w."'>
													<div class='ddd' style='text-align:center;padding:3px 0;".$border."'><span style='color:red;'>".$persentasi->getKelebihan($idG)."</span></div>
												</div>";
												$idx++;
											}
										$isi.="
										</div>
										<div class='ddd' style='text-align:center; padding:5px 0px;color:#005994;border-TOP:0px;border-bottom:0px;'><div>SAVING</div></div>
										<div style='overflow:auto;'>";
											$idx=1;
											foreach($array as $idG) {
												$w="width:105px";
												$fl="fl";
												if($idx==1) {
													$border="";												
												}
												else {
													if($idx==4) {
														$fl="";
														$w="";
													}
													$border="border-left:0px;";
												}
												$isi.="
												<div class='".$fl."' style='".$w."'>
													<div class='ddd' style='text-align:center;padding:3px 0;".$border."'><span style='color:red;'>".$persentasi->getSaving($idG)."</span></div>
												</div>";
												$idx++;
											}
											$persentasi->updatePerolehan();
										$isi.="
										</div>										
									</div>
									<div class='list2' style='margin-top:10px;'>";
										$tmt->setIdPerolehan($pengajuan->getPerolehanID());
										$tmt->hitung();
										$lebih=$tmt->getKelebihanHari();
										$kurang=$tmt->getKekuranganHari();
										
										if($kurang>0 && $lebih==0) {
											$msg=array($kurang,'hari lagi',"Pengajuan akan jatuh pada tanggal ".$general->formatTanggal3($tmt->getTMTNext())."");
										}
										elseif($kurang==0 && $lebih==0) {
											$msg=array($kurang,'hari',"Pengajuan jatuh pada hari ini tanggal ".$general->formatTanggal3($tmt->getTMTNext())."");
										}
										elseif($kurang==0 && $lebih>0) {
											$msg=array($lebih,'hari lewat',"Pengajuan telah jatuh pada tanggal ".$general->formatTanggal3($tmt->getTMTNext())."");
										}
										
										for($i=0; $i<count($msg); $i++) {
											if($i==2) {
												$bold="";
												$paddingBottom="10";
												$size="14";
												$text=$msg[$i];
												$color="#054ab2";
											}
											else {
												$bold="bold";
												$paddingBottom="0";												
												if($i==0) {
													$color="#ffc088";
													$size="50";
													$text=$msg[$i];
												}
												else {
													$color="#054ab2";
													$size="20";
													$text=strtoupper($msg[$i]);
												}
											}
											$isi.="
											<div class='".$bold."' style='color:".$color."; font-size:".$size."px; text-align:center; padding-bottom:".$paddingBottom."px;'>".$text."</div>";
										}
										$isi.="
									</div>
								</div>
								<div class='right-content' style='margin-left:440px;'>
									<div class='blok' style='padding-bottom:0px;'>
										<div class='review'><div class='f-verdana'>Dalam Proses</div></div>
										<div class='list'>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Tanggal Pengajuan</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$pengajuan->getTanggalPengajuan()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Tipe Kenaikan</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$pengajuan->getTypeKenaikanString()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Naik Ke Pangkat</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$pengajuan->getPangkatYangDipilihString()." ".$pengajuan->getSyaratKUMyangDipilih()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Syarat KUM</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$pengajuan->getSyaratKUMyangDipilih()."</div>
											</div>										
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Kekurangan KUM</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$pengajuan->getKurangKUMyangDipilih()."</div>
											</div>
											
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Total Kelayakan KUM</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$persentasi->getTotalKelayakanKUM()."</div>
											</div>	
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana bold'>Sisa Kekurangan</div>
												<div class='review-isi-skat fl f-verdana bold'>:</div>
												<div class='review-isi-value fl f-verdana bold'>".$persentasi->getSisaKelayakanKUM()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Total Kelebihan KUM</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$persentasi->getTotalKelebihanKUM()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Total Saving</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$persentasi->getTotalSaving()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Total Saving Valid</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$persentasi->getTotalSavingValid()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Total Perolehan</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$pengajuan->getTotalPengajuanKUM()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Total Perolehan Valid</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>".$persentasi->getTotalValid()."</div>
											</div>
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana bold'>TOTAL DISETUJUI</div>
												<div class='review-isi-skat fl f-verdana bold'>:</div>
												<div class='review-isi-value fl f-verdana bold'>".$persentasi->getTotalPengajuan()."</div>
											</div>";
											$sqlTotalPerolehan="UPDATE ak_perolehan 
																SET totalDisetujui='".$persentasi->getTotalPengajuan()."', 
																	totalKekurangan='".$persentasi->getSisaKelayakanKUM()."' 
																WHERE idPerolehan='".$pengajuan->getPerolehanID()."'";
											$DB->executeQuery($sqlTotalPerolehan);
											if($persentasi->getSisaKelayakanKUM()==0) {
												if($pengajuan->approved()) {
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
													if($valid) {
														$isi.="
														<div class='review-isi' style='margin-top:10px;'>
															<form action='?u=angkakredit&act=finish' method='post'>
																<input type='submit' value='Finish' class='submit' style='width:100%; height:30px;'>
															</form>
														</div>";
													}
													else {
														$isi.="
														<div class='review-isi' style='margin-top:10px; width:100%;'>
															<div class='kecil' style='color:red; text-align:center;'>TMT belum memenuhi.</div>
														</div>";
													}
												}
												else {
													$isi.="
													<div class='review-isi' style='margin-top:10px; width:100%;'>
														<div class='kecil' style='color:red; text-align:center;'>Menunggu approval dari Admin Kepegawaian.</div>
													</div>";
												}
											}
											else {
												$isi.="
												<div class='review-isi' style='margin-top:10px;'>
													<form action='?u=angkakredit&act=cancel' method='post'>
														<input type='submit' value='Cancel' class='submit' style='width:100%; height:30px;' onclick=\"return confirm('Anda Yakin?');\">
													</form>
												</div>";
											}
											$isi.="
										</div>
									</div>
									<!-- dihilangin dulu bentar
									<div class='blok' style='padding-top:10px;padding-bottom:0px;'>
										<div class='review'><div class='f-verdana'>Persyaratan Khusus</div></div>
										<div class='list'>
										</div>
									</div> !-->
								</div>
							</div>
							<div style='padding-top:10px; padding-bottom:0px;'>
								<div class='blok' style='padding-bottom:20px;'>
									<div class='review'><div class='f-verdana'>Pengajuan Angka Kredit</div></div>
									<div class='list'>";
										function fetch($parent, $level, $group) {
											global $DB;
											global $kategori;
											
											$sqlShow="	SELECT count, kdKategori, namaKategori 
														FROM ak_kategori 
														WHERE parentId='".$parent."' 
														AND idGroup='".$group."'";
											$queryShow=mysql_query($sqlShow,$DB->opendb());
											if($queryShow!=null) {
												if(mysql_num_rows($queryShow)>0) {
													while($rowShow=mysql_fetch_array($queryShow)) {							
														$kd=$rowShow['kdKategori'];
														$name=$rowShow['namaKategori'];
														if($rowShow['count']==0) {
															$sqlCek="	SELECT Rk.valueAK 
																		FROM ak_relasi_kategori Rk, ak_kategori K 
																		WHERE K.kdKategori='".$kd."' 
																		AND K.kdKategori=Rk.kdKategori 
																		AND Rk.kdRule='5'";
															$DB->executeQuery($sqlCek);
															if($DB->getRows()==1) {
																$rowCek=$DB->getResult();
																$kum=$rowCek['valueAK'];
																if($kategori->kategoriMengajar($kd)) {
																	if($kategori->validMengajar($kd)) {
																		$ajukan="<div><a class='submit' href='?u=angkakredit&act=ajukan&kdKategori=".$rowShow['kdKategori']."' alt='item' title='item'>Ajukan</a></div>";
																	}
																	else {
																		$ajukan="";
																	}
																}
																else {
																	$ajukan="<div><a class='submit' href='?u=angkakredit&act=ajukan&kdKategori=".$rowShow['kdKategori']."' alt='item' title='item'>Ajukan</a></div>";
																}
															}
														}
														else {
															$kum="";
															$ajukan="";
														}
														switch($level) {
															case 0:
																$data=array($kd,$name,$kum,$ajukan);
																$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
																$i=0;
																foreach($data as $rows) {
																	if($i==0) {
																		$row.="<td style='width:30px;'><div class='bold'>".$rows."</div></td>";
																	}
																	elseif($i==2) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==3) {
																		$row.="<td style='width:70px;'>".$ajukan."</td>";
																	}
																	else {
																		$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;' class='bold'>".strtoupper($rows)."</div></td>";
																	}
																	$i++;
																}
																$row.="</tr></table>";
																break;
															case 1:
																$data=array('',$kd,$name,$kum,$ajukan);
																$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
																$i=0;
																foreach($data as $rows) {
																	if($i==0) {
																		$row.="<td style='width:30px;'>".$rows."</td>";
																	}
																	elseif($i==1) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==3) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==4) {
																		$row.="<td style='width:70px;'>".$ajukan."</td>";
																	}
																	else {
																		$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
																	}
																	$i++;
																}
																$row.="</tr></table>";
																break;
															case 2:
																$data=array('','',$kd,$name,$kum,$ajukan);
																$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
																$i=0;
																foreach($data as $rows) {
																	if($i==0) {
																		$row.="<td style='width:30px;'>".$rows."</td>";
																	}
																	elseif($i==1) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==2) {
																		$row.="<td style='width:60px;'>".$rows."</td>";
																	}
																	elseif($i==4) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==5) {
																		$row.="<td style='width:70px;'>".$ajukan."</td>";
																	}
																	else {
																		$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
																	}
																	$i++;
																}
																$row.="</tr></table>";
																break;
															case 3:
																$data=array('','','',$kd,$name,$kum,$ajukan);
																$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
																$i=0;
																foreach($data as $rows) {
																	if($i==0) {
																		$row.="<td style='width:30px;'>".$rows."</td>";
																	}
																	elseif($i==1) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==2) {
																		$row.="<td style='width:60px;'>".$rows."</td>";
																	}
																	elseif($i==3) {
																		$row.="<td style='width:70px;'>".$rows."</td>";
																	}
																	elseif($i==5) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==6) {
																		$row.="<td style='width:70px;'>".$ajukan."</td>";
																	}
																	else {
																		$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
																	}
																	$i++;
																}
																$row.="</tr></table>";
																break;
															case 4:
																$data=array('','','','',$kd,$name,$kum,$ajukan);
																$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
																$i=0;
																foreach($data as $rows) {
																	if($i==0) {
																		$row.="<td style='width:30px;'>".$rows."</td>";
																	}
																	elseif($i==1) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==2) {
																		$row.="<td style='width:60px;'>".$rows."</td>";
																	}
																	elseif($i==3) {
																		$row.="<td style='width:70px;'>".$rows."</td>";
																	}
																	elseif($i==4) {
																		$row.="<td style='width:80px;'><div style='padding:5px 0;'>".$rows."</div></td>";
																	}
																	elseif($i==6) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==7) {
																		$row.="<td style='width:70px;'>".$ajukan."</td>";
																	}
																	else {
																		$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
																	}
																	$i++;
																}
																$row.="</tr></table>";
																break;
															case 5:
																$data=array('','','','','',$kd,$name,$kum,$ajukan);
																$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
																$i=0;
																foreach($data as $rows) {
																	if($i==0) {
																		$row.="<td style='width:30px;'>".$rows."</td>";
																	}
																	elseif($i==1) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==2) {
																		$row.="<td style='width:60px;'>".$rows."</td>";
																	}
																	elseif($i==3) {
																		$row.="<td style='width:70px;'>".$rows."</td>";
																	}
																	elseif($i==4) {
																		$row.="<td style='width:80px;'>".$rows."</td>";
																	}
																	elseif($i==5) {
																		$row.="<td style='width:90px;'><div style='padding:5px 0;'>".$rows."</div></td>";
																	}
																	elseif($i==7) {
																		$row.="<td style='width:50px;'>".$rows."</td>";
																	}
																	elseif($i==8) {
																		$row.="<td style='width:70px;'>".$ajukan."</td>";
																	}
																	else {
																		$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
																	}
																	$i++;
																}
																$row.="</tr></table>";
																break;
														}					
														
														$row.=fetch($rowShow['kdKategori'],$level+1,$group);
													}
												}
											}
											return $row;				
										}
										$isi.="
										<div id='tabs3'>
											<ul>";
												$sqlTabs="	SELECT namaGroup  
															FROM ak_group 
															WHERE idGroup!='1'";
												$DB->executeQuery($sqlTabs);
												if($DB->rs()) {
													if($DB->getRows()>0) {
														while($rowTabs=$DB->getResult()) {
															$isi.="<li><a href='#".md5($rowTabs['namaGroup'])."'>".ucwords($rowTabs['namaGroup'])."</a></li>";
														}
													}
												}
											$isi.="
											</ul>";
											
											$sqlGroupDet="	SELECT idGroup, namaGroup  
															FROM ak_group 
															WHERE idGroup!='1'";
											$queryGroupDet=mysql_query($sqlGroupDet,$DB->opendb());
											if(mysql_num_rows($queryGroupDet)>0) {
												$i=1;
												while($rowGroupDet=mysql_fetch_array($queryGroupDet)) {
													$isi.="	
													<div id='".md5($rowGroupDet['namaGroup'])."'>";
														if($rowGroupDet['idGroup']==3 || $rowGroupDet['idGroup']==4) {
															$isi.=fetch(2,1,$rowGroupDet['idGroup']);
														}
														else {
															$isi.=fetch(0,0,$rowGroupDet['idGroup']);
														}
													$isi.="
													</div>";
													$i++;
												}
											}
										$isi.="
										</div>";
									$isi.="
									</div>
								</div>
								<div class='blok' style='padding-bottom:0px;'>
									<div class='review'><div class='f-verdana'>Detail Perolehan</div></div>
									<div class='list'>
										<div id='tabs'>
											<ul>";
												$sqlTabs="	SELECT namaGroup  
															FROM ak_group 
															WHERE idGroup!='1' 
															ORDER BY idGroup ASC";
												$DB->executeQuery($sqlTabs);
												if($DB->rs()) {
													if($DB->getRows()>0) {
														while($rowTabs=$DB->getResult()) {
															$isi.="<li><a href='#".md5(md5($rowTabs['namaGroup']))."'>".ucwords($rowTabs['namaGroup'])."</a></li>";
														}
													}
												}
											$isi.="
											</ul>";
											$sqlGroupDet="	SELECT idGroup, namaGroup  
															FROM ak_group 
															WHERE idGroup!='1' 
															ORDER BY idGroup ASC";
											$queryGroupDet=mysql_query($sqlGroupDet,$DB->opendb());
											if(mysql_num_rows($queryGroupDet)>0) {
												while($rowGroupDet=mysql_fetch_array($queryGroupDet)) {
													$isi.="	<div id='".md5(md5($rowGroupDet['namaGroup']))."'>";
													$idPerolehan=$pengajuan->getPerolehanID();
													$sqlDet="	SELECT K.kdKategori, K.namaKategori, Pd.valueKUM, Pd.approval 
																FROM ak_kategori K, ak_perolehan_detail Pd, ak_relasi_kategori Rk 
																WHERE Pd.idPerolehan='".$idPerolehan."' 
																AND Pd.idRelasiKat=Rk.idRelasiKat 
																AND Rk.kdRule='5' 
																AND Rk.kdKategori=K.kdKategori 
																AND K.idGroup='".$rowGroupDet['idGroup']."'";
													$queryDet=mysql_query($sqlDet,$DB->opendb());
													if($queryDet != null) {
														if(mysql_num_rows($queryDet)>0) {
															$totalGroup=0;
															while($rowDet=mysql_fetch_array($queryDet)) {
																if($rowDet['approval']==0) {
																	$col="#fde7d4";
																}
																elseif($rowDet['approval']==1) {
																	$col="#ffc088";
																}
																else {
																	$col="";
																}
																$totalGroup+=$rowDet['valueKUM'];
																$isi.="
																<div class='fl' style='width:585px;'>
																	<div class='cart' style='padding-bottom:0px;'>
																		<div class='cart-isi' style='background-color:".$col.";'>
																			<div>".$rowDet['namaKategori']."</div>
																		</div>
																	</div>
																</div>
																<div class='fl' style='width:100px;'>
																	<div class='cart' style='padding-bottom:0px;'>
																		<div class='cart-isi' style='background-color:".$col.";'>
																			<div>".$rowDet['valueKUM']."</div>
																		</div>
																	</div>
																</div>
																<div class='fl' style=''>
																	<div class='cart' style='padding-bottom:0px;'>
																		<div class='cart-isi' style='background-color:".$col.";'>
																			<div><a href='?u=".$_GET['u']."&act=ajukan&do=hapus&kdKategori=".$rowDet['kdKategori']."' onclick=\"return confirm('Anda Yakin?');\"><img border='0' src='./images/drop.png' width='16' height='16' alt='hapus' title='".$rowDet['idDetail']."|hapus'></a></div>
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
													$isi.="		<div style='padding-top:10px;'>
																	<div class='fl left-content' style='width:650px;'>
																		<div class='cart' style='padding-bottom:0px;'>
																			<div class='cart-isi'>
																				<div style='font-weight:bold; color:#005994;'>TOTAL ".ucwords($rowGroupDet['namaGroup'])."</div>
																			</div>
																		</div>
																	</div>
																	<div class='right-content' style='margin-left:660px;'>
																		<div class='cart' style='padding-bottom:0px;'>
																			<div class='cart-isi'>
																				<div style='font-weight:bold; color:#005994;'>".$totalGroup."</div>
																			</div>
																		</div>
																	</div>																	
																	<div style='margin-top:20px;'>
																		<div class='cart' style='width:100px;'>
																			<div class='cart-isi kecil' style='background-color:#ffc088;'>Ditolak</div>
																			<div class='cart-isi kecil' style='background-color:#fde7d4;'>Belum direspon</div>
																			<div class='cart-isi kecil'>Diterima</div>
																		</div>
																	</div>
																</div>
															</div>";
												}
											}
											$isi.="
										</div>
									</div>
								</div>
							</div>
						</div>							
					</div>					
					";
			}
					$isi.="
					<div class='fl left-content'>";
						if(!$pengajuan->getValidPengajuan()) {
							if($pengajuan->onProgress()) {
								$sqlProgress="	SELECT idPerolehan, nip, currentGol, toGol, statusPerolehan, tglPerolehan, totalDisetujui 
												FROM ak_perolehan 
												WHERE nip='".$user->getNIP()."' 
												AND statusPerolehan!='1'";
								$DB->executeQuery($sqlProgress);
								if($DB->rs()) {
									if($DB->getRows()==1) {
										$rowProgress=$DB->getResult();
										$isi.="
										<div class='blok'>
											<div class='review' style='width:805px;'><div class='f-verdana'>Kenaikan Jabatan Dalam Proses</div></div>
											<div class='list' style='width:793px;'>
												<div class='review-isi'>
													<div style='border:1px solid #ccc; padding:5px; background-color:#ddd;'>
														<div class='fl bold' style='width:13%;'>Tanggal</div>
														<div class='fl bold' style='width:20%;'>Dari</div>
														<div class='fl bold' style='width:20%;'>Naik Ke</div>
														<div class='fl bold' style='width:13%; text-align:center;'>KUM Diajukan</div>
														<div class='fl bold' style='padding-left:20px;width:13%;'>Status</div>";
														if($rowProgress['statusPerolehan']==3) {
															$isi.="<div class='fl bold' style='padding-left:20px;text-align:center;'>Cetak Perolehan</div>";
														}
														$isi.="
														<div class='fix' style=''></div>
													</div>
													<div class='list'>
														<div class='fl' style='width:13%;'>".$general->formatTanggal($rowProgress['tglPerolehan'])."</div>
														<div class='fl' style='width:20%;'>".$AK->getPangkatYangDipilihString($rowProgress['currentGol'])." ".$AK->getSyaratKUMyangDipilih($rowProgress['currentGol'])."</div>
														<div class='fl' style='width:20%;'>".$AK->getPangkatYangDipilihString($rowProgress['toGol'])." ".$AK->getSyaratKUMyangDipilih($rowProgress['toGol'])."</div>
														<div class='fl' style='width:13%; text-align:center;'>".$rowProgress['totalDisetujui']."</div>
														<div class='fl' style='padding-left:20px; width:13%;'>";
															if($rowProgress['statusPerolehan']==2) {
																$isi.="Sedang Divalidasi";
															}
															elseif($rowProgress['statusPerolehan']==3) {
																$isi.="Akan Dinilai Tim TPAKU";
															}														
														$isi.="
														</div>";
														if($rowProgress['statusPerolehan']==3) {
															$isi.="
															<div class='fl' style='padding-left:20px; text-align:center;'>
																<a href='?u=angkakredit&act=notausul' target='_blank'><img src='./images/pdf.png' width='16' height='16' border='0'></a>
															</div>";
														}	
														$isi.="
														<div class='fix' style=''></div>
													</div>
													<div style='padding-top:10px;'></div>
													<div style='border:1px solid #ccc; padding:5px; background-color:#ddd;' class='bold'>Item yang Diajukan</div>
													<div class='list' style=''>
														<table cellpadding='1' border='0' cellspacing='1' width='100%'>";															
															$isi.="
															<tr>
																<th align='left' style='width:40px;'>No</th>
																<th align='left'>Item</th>
																<th align='left'>Bukti</th>
																<th>Validasi</th>
															</tr>";
															$sqlDet="	SELECT Pd.idDetail, K.namaKategori, Pd.statusDetail 
																		FROM ak_perolehan_detail Pd, ak_relasi_kategori Rk, ak_kategori K 
																		WHERE Pd.idPerolehan='".$rowProgress['idPerolehan']."' 
																		AND Pd.idRelasiKat=Rk.idRelasiKat 
																		AND Rk.kdKategori=K.kdKategori 
																		AND Pd.valueKUM!='0'";
															$queryDet=mysql_query($sqlDet,$DB->opendb());
															if(mysql_num_rows($queryDet)>0) {
																$no=1;
																while($rowDet=mysql_fetch_array($queryDet)) {
																	$isi.="
																	<tr>
																		<td align='left'>".$no."</td>
																		<td align='left'>".$rowDet['namaKategori']."</td>
																		<td align='left'>Bukti</td>
																		<td>";
																			if($rowDet['statusDetail']=="1") {
																				$isi.="<img src='./images/warning.png' width='16' height='16'>";
																			}
																			else {
																				$isi.="<img src='./images/ceklis.png' width='16' height='16'>";
																			}
																		$isi.="
																		</td>
																	</tr>
																	";
																	$no++;
																}
															}
															$isi.="
															<tr>
																<td colspan='4' align='left'>
																	<div style='padding-top:20px;'></div>
																	<div class='bold' style='padding-bottom:5px;'>Keterangan :</div>
																	<div class='fl' style='padding-right:5px;'><img src='./images/ceklis.png' width='16' height='16'></div>
																	<div class='fl' style='font-style:italic;'>Sudah divalidasi</div>
																	<div class='fix' style='padding-bottom:5px;'></div>
																	<div class='fl'style='padding-right:5px;'><img src='./images/warning.png' width='16' height='16'></div>
																	<div class='fl' style='font-style:italic;'>Belum divalidasi</div>
																	<div class='fix'></div>
																</td>
															</tr>
														</table>
													</div>
												</div>
											</div>
										</div>";
									}
								}
							}
							else {
								if($AK->getRankingGolongan()!=1) {
								$isi.="
								<div class='blok'>
									<div class='review'><div class='f-verdana'>Pengajuan Kenaikan Jabatan</div></div>
									<div class='list'>
										<div class='review-isi'>									
											<div class='review-isi-head fl f-verdana'>Tipe Kenaikan</div>
											<div class='review-isi-skat fl f-verdana'>:</div>
											<div class='review-isi-value fl f-verdana'>
												<form action='#' method='post'>
													<select name='tipeKenaikan' class='form-select' style='width:150px; height:30px;' onchange='this.form.submit()'>
														<option value='0'>Pilih</option>";
														if($AK->getRankingPangkat()==5) {
															$_SESSION['tipeKenaikan']=1;
															$sqlTipe="	SELECT idKenaikan, namaKenaikan 
																		FROM ak_tipe_kenaikan 
																		WHERE idKenaikan='1'";
														}
														else {
															if($AK->getRankingPangkat()==4||$AK->getRankingPangkat()==3) {
																$sqlTipe="	SELECT idKenaikan, namaKenaikan 
																			FROM ak_tipe_kenaikan 
																			WHERE idKenaikan!='1'";
															}
															else {
																$_SESSION['tipeKenaikan']=2;
																$sqlTipe="	SELECT idKenaikan, namaKenaikan 
																			FROM ak_tipe_kenaikan 
																			WHERE idKenaikan='".$_SESSION['tipeKenaikan']."'";
															}
														}												
														$DB->executeQuery($sqlTipe);
														if($DB->rs()) {
															while($rowTipe=$DB->getResult()) {
																$idKenaikan=$rowTipe['idKenaikan'];
																$namaKenaikan=$rowTipe['namaKenaikan'];
																if(isset($_POST['tipeKenaikan'])||isset($_SESSION['tipeKenaikan'])) {
																	if($_POST['tipeKenaikan']==$idKenaikan||$_SESSION['tipeKenaikan']==$idKenaikan) {
																		$isi.="
																		<option value='".$idKenaikan."' SELECTED='SELECTED'>".$namaKenaikan."</option>";
																		$_SESSION['tipeKenaikan']=$idKenaikan;
																		if(isset($_POST['tipeKenaikan'])) {
																			unset($_SESSION['naikKe']);
																		}
																	}
																	else {
																		$isi.="
																		<option value='".$idKenaikan."'>".$namaKenaikan."</option>";
																	}
																}
																else {
																	$isi.="
																	<option value='".$idKenaikan."'>".$namaKenaikan."</option>";
																}
															}
														}
														$isi.="
													</select>
												</form>
											</div>
										</div>";
										if($_SESSION['tipeKenaikan']!="") {
											$isi.="									
											<div class='review-isi'>
												<div class='review-isi-head fl f-verdana'>Naik ke Jabatan</div>
												<div class='review-isi-skat fl f-verdana'>:</div>
												<div class='review-isi-value fl f-verdana'>
													<form action='#' method='post'>
														<select name='naikKe' class='form-select' style='width:150px; height:30px;' onchange='this.form.submit()'>";
														$isi.="<option value='0'>Pilih</option>";
														if($_SESSION['tipeKenaikan']==3) {
															if($AK->getRankingPangkat()<=4&&$AK->getRankingPangkat()>=4) {
																$sqlPilih="	SELECT G.idGolongan, G.syaratKUM, P.namaPangkat 
																			FROM pang_pangkat P, pang_golongan G 
																			WHERE P.idPangkat=G.idPangkat 
																			AND G.rankingGolongan='5'";
															}
															elseif($AK->getRankingPangkat()<=3&&$AK->getRankingPangkat()>=3) {
																$sqlPilih="	SELECT G.idGolongan, G.syaratKUM, P.namaPangkat 
																			FROM pang_pangkat P, pang_golongan G 
																			WHERE P.idPangkat=G.idPangkat 
																			AND G.rankingGolongan='2'";
															}
															else {
																$sqlPilih="	SELECT G.idGolongan, G.syaratKUM, P.namaPangkat 
																			FROM pang_pangkat P, pang_golongan G 
																			WHERE G.idPangkat=G.idPangkat 
																			AND G.rankingGolongan < '".$AK->getRankingGolongan()."'";
															}
														}
														else {
															$pangGol=$AK->getRankingGolongan();
															$batas=$AK->getRankingPangkatBatasNaikReguler();
															$sqlPilih="	SELECT G.idGolongan, G.syaratKUM, P.namaPangkat 
																		FROM pang_pangkat P, pang_golongan G 
																		WHERE P.idPangkat=G.idPangkat 
																		AND G.rankingGolongan < '".$pangGol."' 
																		AND G.rankingGolongan >= '".$batas."'";
														}												
														$DB->executeQuery($sqlPilih);
														if($DB->rs()) {													
															while($rowPilih=$DB->getResult()) {
																$idGolongan=$rowPilih['idGolongan'];
																$namaGol=$rowPilih['namaPangkat']." ".$rowPilih['syaratKUM'];
																if(isset($_POST['naikKe'])||isset($_SESSION['naikKe'])) {
																	if($_POST['naikKe']==$idGolongan||$_SESSION['naikKe']==$idGolongan) {
																		$isi.="
																		<option value='".$idGolongan."' SELECTED='SELECTED'>".strtoupper($namaGol)."</option>";
																		$_SESSION['naikKe']=$idGolongan;
																	}
																	else {
																		$isi.="
																		<option value='".$idGolongan."'>".strtoupper($namaGol)."</option>";
																	}
																}
																else {
																	$isi.="
																	<option value='".$idGolongan."'>".strtoupper($namaGol)."</option>";
																}
															}
														}	
														$isi.="	
														</select>
													</form>
												</div>
											</div>";
											if($_SESSION['naikKe']!="") {
												$isi.="											
												<div class='review-isi'>
													<div class='review-isi-head fl f-verdana'>Jabatan yang Dipilih</div>
													<div class='review-isi-skat fl f-verdana'>:</div>
													<div class='review-isi-value fl f-verdana'>".$AK->getPangkatYangDipilihString($_SESSION['naikKe'])." ".$AK->getSyaratKUMyangDipilih($_SESSION['naikKe'])."</div>
												</div>
												<div class='review-isi'>
													<div class='review-isi-head fl f-verdana'>Syarat KUM</div>
													<div class='review-isi-skat fl f-verdana'>:</div>
													<div class='review-isi-value fl f-verdana'>".$AK->getSyaratKUMyangDipilih($_SESSION['naikKe'])."</div>
												</div>
												<div class='review-isi'>
													<div class='review-isi-head fl f-verdana'>Kekurangan KUM</div>
													<div class='review-isi-skat fl f-verdana'>:</div>
													<div class='review-isi-value fl f-verdana'>".$AK->getKurangKUMyangDipilih($_SESSION['naikKe'])."</div>
												</div>
												<form action='?u=angkakredit&act=pengajuan' method='post'>
													<div style='text-align:right;'><input type='submit' name='lanjut' value='Selanjutnya' class='submit'></div>
												</form>";
											}
										}
									$isi.="
									</div>
								</div>";
								}
							}
						}
						$isi.="
						<div class='blok'>
							<div class='review'><div class='f-verdana'>Review Angka Kredit</div></div>
							<div class='list'>							
								<div class='review-isi'>
									<div class='review-isi-head fl f-verdana'>Jabatan Sekarang</div>
									<div class='review-isi-skat fl f-verdana'>:</div>
									<div class='review-isi-value fl f-verdana'>".$AK->getPangkatSekarangString()."</div>
								</div>
								<div class='review-isi'>
									<div class='review-isi-head fl'>Jumlah KUM Jabatan</div>
									<div class='review-isi-skat fl'>:</div>
									<div class='review-isi-value fl'>".$AK->getKUMPangkat()."</div>
								</div>
								<div class='review-isi'>
									<div class='review-isi-head fl'>Total KUM yang Dimiliki</div>
									<div class='review-isi-skat fl'>:</div>
									<div class='review-isi-value fl'>".$AK->getTotalKUM()."</div>
								</div>
							</div>
						</div>
					</div>";
					
					/* hidden dikit..
					if($pengajuan->getValidPengajuan()) {
						$isi.="
						<div class='right-content'>
							<div class='pengajuan-head'><div class='f-verdana'>Pengajuan Angka Kredit</div></div>
							<div class='list'>";
								function display_kategori($parent, $level) {
									global $DB;
									
									$sqlShow="	SELECT kdKategori, namaKategori, count 
												FROM ak_kategori 
												WHERE parentId='".$parent."' 
												AND idGroup!='1'";
									$queryShow=mysql_query($sqlShow,$DB->opendb());
									if($queryShow!=null) {
										if(mysql_num_rows($queryShow)>0) {
											while($rowShow=mysql_fetch_array($queryShow)) {									
												if($level==0) {
													$j.="<h3><a href='?u=angkakredit&act=ajukan&kdKategori=".$rowShow['kdKategori']."' class='pengajuan f-verdana'>".$rowShow['namaKategori']."</a></h3>";
													$name=$rowShow['namaKategori'];
												}
												else {
													$name=$rowShow['namaKategori'];
												}
												if($rowShow['count']==0) {
													if($level!=0) {
														$sqlAK="SELECT valueAK 
																FROM ak_relasi_kategori 
																WHERE kdKategori='".$rowShow['kdKategori']."' 
																AND kdRule='5'";
														$DB->executeQuery($sqlAK);
														if($DB->getRows()==1) {
															$rowAK=$DB->getResult();
															$aKredit=$rowAK['valueAK'];
														}
														else {
															$aKredit='0';
														}
														$a="<a href='?u=angkakredit&act=ajukan&kdKategori=".$rowShow['kdKategori']."' class='addtocart' title='#KODE\t: ".$rowShow['kdKategori']."\n#AK\t: ".$aKredit."' alt='".$name."'>";
														$b="</a>";
													}
													else {
														$a="<span class='addtocart3'>";
														$b="</span>";
													}
												}
												else {
													$a="<span class='addtocart3'>";
													$b="</span>";
												}
												$margin=10*$level."px";
												$j.="<div class='f-verdana' style='overflow:auto;'>".str_repeat("<div style='float:left;'>-</div>",$level)."<div style='margin-left:".$margin.";'>".$a.$name.$b."</div>".display_kategori($rowShow['kdKategori'],$level+1)."</div>";								
												
											}
										}
									}
									return $j;
								}
								$isi.="
								<div id='accordion'>".display_kategori(0,0)."</div>	
							</div>
						</div>";
					}
					*/
			
	}	
	$layout->setSitemaps($u);
	$layout->setContent($isi);
	$layout->HTML_render();
?>