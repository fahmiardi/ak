<?php	
	$nav=array(	"button2.png"=>array("?u=$_GET[u]@"=>"List Dosen", "?u=$_GET[u]&act=tambah@"=>"Tambah Dosen", "?u=$_GET[u]&act=cetakDUK@target=__blank"=>"Cetak DUK Dosen"),
			);
	switch($_GET['act']) {
		case 'cetakDUK':
			//Instantiance
			$cetakDUK->color();
			$cetakDUK->SetFont('Arial','',10);
			$cetakDUK->AddPage();
			$cetakDUK->AliasNbPages();
			
			$cetakDUK->renderCell($cetakDUK->cetakHead());//cetak head perolehan			
			$cetakDUK->renderCell($cetakDUK->cetakList());//cetak head perolehan
			
			$cetakDUK->Output();
			break;
		case 'cetak':
			$cetakPegawai->setNIP($_GET['nip']);
			if($cetakPegawai->valid()) {
				//Instantiance	
				$cetakPegawai->SetFont('Arial','',14);
				$cetakPegawai->color();
				$cetakPegawai->AddPage();
				$cetakPegawai->AliasNbPages();
				
				$cetakPegawai->renderCell($cetakPegawai->cetakPegawai());//cetak head perolehan
				
				$cetakPegawai->Output();
			}
			break;
		case 'tambah':
			switch($_GET['do']) {
				case 'save':
					$noSeriKarpeg=$_POST['noSeriKarpeg'];
					$nip=$_POST['nip'];
					$titleDepan=trim($_POST['titleDepan']," ,");
					$namaPeg=trim($_POST['namaPeg']," .,");
					$titleBelakang=trim($_POST['titleBelakang']," ,");
					$alamatPeg=$_POST['alamatPeg'];
					$jkPeg=$_POST['jkPeg'];
					$tmptLahir=$_POST['tmptLahir'];
					$tglLahir=$general->formatTanggalDB($_POST['tglLahir']);
					$keahlian=$_POST['keahlian'];
					$tmtMasuk=$general->formatTanggalDB($_POST['TMTMasuk']);
					$jurusan=$_POST['kdUnitKerja'];
					$pendidikan=$_POST['idPendidikan'];
					$thnIjazah=$_POST['thnIjazah'];
					$tempatStudi=$_POST['tempatStudi'];
					
					$pangkat=$_POST['pangkat'];
					$golRuang=$_POST['golRuang'];
					$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
					$idGolongan=$_POST['idGolongan'];
					$tmtJabatan=$general->formatTanggalDB($_POST['TMTJabatan']);
					$split=explode("-",$tmtJabatan);
					$tmtBerikutnya=($split[0]+1)."-".$split[1]."-".$split[2];
					$totalKUM=$_POST['totalKUM'];
					$noSk=$_POST['noSk'];
					
					$pwd=$general->Encrypt($nip);
					$token=$general->createRandomToken();
					
					$sqlSave="	INSERT INTO peg_pegawai 
								VALUES (null,
										'".$noSeriKarpeg."',
										'".$nip."',
										'".$titleDepan."',
										'".$namaPeg."',
										'".$titleBelakang."',
										'".$alamatPeg."',
										'".$jkPeg."',
										'".$tmptLahir."',
										'".$tglLahir."',
										'".$keahlian."',
										'".$tmtMasuk."',
										'".$totalKUM."',
										'".$jurusan."')";
					$DB->executeQuery($sqlSave);
					if($DB->notNull()) {
						$sqlSave2="	INSERT INTO peg_kepangkatan 
									VALUES (null,
											'".$idGolongan."',
											'".$nip."',
											'".$jurusan."',
											'".$tmtJabatan."',
											'".$tmtBerikutnya."',
											'".$pangkat."',
											'".$tmtPangkat."',
											'".$golRuang."',
											'".$totalKUM."',
											'1',
											'".$noSK."')";
						$DB->executeQuery($sqlSave2);
						if($DB->notNull()) {							
							$sqlSave3="	INSERT INTO peg_user 
										VALUES (null,
												'".$nip."',
												'',
												'".$pwd."',
												'".$token."',
												'4')";
							$DB->executeQuery($sqlSave3);
							if($DB->notNull()) {
								$sqlSave4="	INSERT INTO peg_belajar 
											VALUES (null,
													'".$nip."',
													'".$pendidikan."',
													'".$thnIjazah."',
													'".$tempatStudi."')";
								$DB->executeQuery($sqlSave4);
								if($DB->notNull()) {
									header("Location: ./page.php?u=kepegawaian");
								}
							}
						}
					}
					break;
				default:
					$isi.="
					<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
					<div>Tambah Dosen</div>
					
					<div>
						<form action='?u=kepegawaian&act=tambah&do=save' method='post'>
							<div class='list2' style='margin-top:20px;padding-left:10px;'>
								<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepegawaian</div>
								
								<div class='fl' style='width:150px;'>NIP</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input type='text' name='nip' class='input' style='width:200px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>No. Seri Karpeg</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input type='text' name='noSeriKarpeg' class='input' style='width:120px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>Nama Dosen</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'>
									<input type='text' name='titleDepan' class='input' style='width:80px;'>
									<input type='text' name='namaPeg' class='input' style='width:200px;'>
									<input type='text' name='titleBelakang' class='input' style='width:90px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;' >Alamat</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><textarea name='alamatPeg' class='input' style='width:250px; height:100px;'></textarea></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>Jenis Kelamin</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'>
									<div><input type='radio' name='jkPeg' value='0'>&nbsp;Laki-Laki</div>
									<div><input type='radio' name='jkPeg' value='1'>&nbsp;Perempuan</div>
								</div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>Tempat, Tanggal Lahir</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input class='input' style='width:150px;' type='text' name='tmptLahir'>,&nbsp;<input class='input' style='width:100px;' id='datepicker' type='text' name='tglLahir'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>Keahlian</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input type='text' name='keahlian' class='input' style='width:200px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>TMT Masuk</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input type='text' name='TMTMasuk' class='input' style='width:100px;' id='datepicker4'></div>
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
											$isi.="<option value='".$rowJur['kdUnitKerja']."'>".$rowJur['namaUnitKerja']."</option>";
										}
									}
									$isi.="
									</select>	
								</div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>Pendidikan Terakhir</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'>
									<select name='idPendidikan' class='form-select' style='width:110px; height:30px;'>
										<option value=''>-pendidikan-</option>";
										$sqlPend="	SELECT idPendidikan, namaPendidikan 
													FROM peg_pendidikan 
													ORDER BY rankingPendidikan ASC";
										$DB->executeQuery($sqlPend);
										if($DB->getRows()>0) {
											while($rowPend=$DB->getResult()) {
												$isi.="<option value='".$rowPend['idPendidikan']."'>".strtoupper($rowPend['namaPendidikan'])."</option>";
											}
										}
									$isi.="
									</select>
								</div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>Tahun Ijazah</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input type='text' name='thnIjazah' class='input' style='width:50px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:150px;'>Tempat Studi</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><textarea name='tempatStudi' class='input' style='height:50px; width:250px;'>".$rowPeg2['tempatStudi']."</textarea></div>
								<div class='fix'></div>
							</div>
							
							<div class='list2' style='margin:10px 0px; padding-left:10px;'>
								<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepangkatan</div>
								
								<div class='fl' style='width:180px;'>Pangkat / Gol. Ruang</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input type='text' name='pangkat' class='input' style='width:150px;'> / <input type='text' name='golRuang' class='input' style='width:50px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:180px;'>TMT Pangkat</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'><input type='text' name='TMTPangkat' id='datepicker2' class='input' style='width:100px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width:180px;'>Jabatan Fungsional</div>
								<div class='fl' style='width:10px;'>:</div>
								<div class='fl'>
									<select name='idGolongan' class='form-select' style='width:180px; height:30px;'>
										<option value=''>-fungsional-</option>";
									$sqlJab="	SELECT G.idGolongan, P.namaPangkat, G.syaratKUM 
												FROM pang_golongan G, pang_pangkat P 
												WHERE G.idPangkat=P.idPangkat 
												ORDER BY G.rankingGolongan ASC";
									$DB->executeQuery($sqlJab);
									if($DB->getRows()>0) {
										while($rowJab=$DB->getResult()) {
											$isi.="<option value='".$rowJab['idGolongan']."'>".strtoupper($rowJab['namaPangkat'])." ".$rowJab['syaratKUM']."</option>";
										}
									}
									$isi.="
									</select>
								</div>
								<div class='fix'></div>
								
								<div class='fl' style='width: 180px;'>TMT Jabatan Fungsional</div>
								<div class='fl' style='width: 10px;'>:</div>
								<div class='fl'><input type='text' name='TMTJabatan' id='datepicker3' class='input' style='width:100px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width: 180px;'>Total KUM</div>
								<div class='fl' style='width: 10px;'>:</div>
								<div class='fl'><input type='text' name='totalKUM' class='input' style='width:50px;'></div>
								<div class='fix'></div>
								
								<div class='fl' style='width: 180px;'>No. SK Jabatan Fungsional</div>
								<div class='fl' style='width: 10px;'>:</div>
								<div class='fl'><input type='text' name='noSK' class='input' style='width:250px;'></div>
								<div class='fix'></div>
							</div>
							
							<div style='width:100%;'><input type='submit' value='Tambah' class='submit' style='width:100%; font-weight:bold;'></div>
						</form>
					</div>";					
			}
			break;
		case 'edit':
			switch($_GET['do']) {
				case 'update':
					$kondisi=(int)$_POST['kondisi'];
					
					switch($kondisi) {
						case 1:					
							$nip=$_POST['nip'];//fix	
							
							$noSeriKarpeg=$_POST['noSeriKarpeg'];							
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
							
							$pangkat=$_POST['pangkat'];
							$golRuang=$_POST['golRuang'];
							$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
							//$idGolongan=$_POST['idGolongan'];
							//$tmtKepangkatan=$_POST['TMTKepangkatan'];
							//$totalKUM=$_POST['totalKUM'];
							$noSk=$_POST['noSk'];
							
							$sqlUpCek1="UPDATE peg_pegawai 
										SET noSeriKarpeg='".$noSeriKarpeg."', 
											titleDepan='".$titleDepan."', 
											namaPeg='".$namaPeg."', 
											titleBelakang='".$titleBelakang."', 
											alamatPeg='".$alamatPeg."', 
											jkPeg='".$jkPeg."', 
											tmptLahir='".$tmptLahir."', 
											tglLahir='".$tglLahir."', 
											keahlian='".$keahlian."', 
											totalKUM='".$totalKUM."', 
											kdUnitKerja='".$jurusan."' 
										WHERE nip='".$nip."'";
							$DB->executeQuery($sqlUpCek1);
							if($DB->notNull()) {
								$sqlUpCek2="UPDATE peg_kepangkatan 
											SET pangkat='".$pangkat."', 
												golRuang='".$golRuang."', 
												TMTPangkat='".$tmtPangkat."', 
												kdUnitKerja='".$jurusan."', 
												noSk='".$noSk."' 
											WHERE nip='".$nip."'";
								$DB->executeQuery($sqlUpCek2);
								if($DB->notNull()) {
									$sqlUpCek3="UPDATE peg_belajar 
												SET thnIjazah='".$thnIjazah."', 
													tempatStudi='".$tempatStudi."' 
												WHERE nip='".$nip."'";
									$DB->executeQuery($sqlUpCek3);
									if($DB->notNull()) {
										header("Location: ./page.php?u=kepegawaian");
									}
								}
							}
							break;
						case 2://pending dolo...
							$nip=$_POST['nip'];//fix
							
							$noSeriKarpeg=$_POST['noSeriKarpeg'];							
							$titleDepan=trim($_POST['titleDepan']," ,");
							$namaPeg=trim($_POST['namaPeg']," .,");
							$titleBelakang=trim($_POST['titleBelakang']," ,");
							$alamatPeg=$_POST['alamatPeg'];
							$jkPeg=$_POST['jkPeg'];
							$tmptLahir=$_POST['tmptLahir'];
							$tglLahir=$general->formatTanggalDB($_POST['tglLahir']);
							$keahlian=$_POST['keahlian'];
							$jurusan=$_POST['kdUnitKerja'];
							
							$idPendidikan=$_POST['idPendidikan'];
							$thnIjazah=$_POST['thnIjazah'];
							$tempatStudi=$_POST['tempatStudi'];
							
							$pangkat=$_POST['pangkat'];
							$golRuang=$_POST['golRuang'];
							$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
							//$idGolongan=$_POST['idGolongan'];
							//$tmtKepangkatan=$_POST['TMTKepangkatan'];
							//$totalKUM=$_POST['totalKUM'];
							$noSk=$_POST['noSk'];
							
							$sqlUpCek1="UPDATE peg_pegawai 
										SET noSeriKarpeg='".$noSeriKarpeg."', 
											titleDepan='".$titleDepan."', 
											namaPeg='".$namaPeg."', 
											titleBelakang='".$titleBelakang."', 
											alamatPeg='".$alamatPeg."', 
											jkPeg='".$jkPeg."', 
											tmptLahir='".$tmptLahir."', 
											tglLahir='".$tglLahir."', 
											keahlian='".$keahlian."', 
											kdUnitKerja='".$jurusan."' 
										WHERE nip='".$nip."'";
							$DB->executeQuery($sqlUpCek1);
							if($DB->notNull()) {
								$sqlUpCek2="UPDATE peg_kepangkatan 
											SET pangkat='".$pangkat."', 
												golRuang='".$golRuang."', 
												TMTPangkat='".$tmtPangkat."', 
												kdUnitKerja='".$jurusan."', 
												noSk='".$noSk."' 
											WHERE nip='".$nip."'";
								$DB->executeQuery($sqlUpCek2);
								if($DB->notNull()) {
									$sqlInsCek3="	INSERT INTO peg_belajar 
													VALUES (null,
															'".$nip."',
															'".$idPendidikan."',
															'".$thnIjazah."', 
															'".$tempatStudi."')";
									$DB->executeQuery($sqlInsCek3);
									if($DB->notNull()) {
										header("Location: ./page.php?u=kepegawaian");
									}
								}
							}
							break;
						case 3:
							$nipLama=$_POST['nipLama'];//fix
							
							$nipBaru=$_POST['nipBaru'];							
							$noSeriKarpeg=$_POST['noSeriKarpeg'];							
							$titleDepan=trim($_POST['titleDepan']," ,");
							$namaPeg=trim($_POST['namaPeg']," .,");
							$titleBelakang=trim($_POST['titleBelakang']," ,");
							$alamatPeg=$_POST['alamatPeg'];
							$jkPeg=$_POST['jkPeg'];
							$tmptLahir=$_POST['tmptLahir'];
							$tglLahir=$general->formatTanggalDB($_POST['tglLahir']);
							$keahlian=$_POST['keahlian'];
							$tmtMasuk=$general->formatTanggalDB($_POST['TMTMasuk']);
							$jurusan=$_POST['kdUnitKerja'];
							
							$idPendidikan=$_POST['idPendidikan'];
							$thnIjazah=$_POST['thnIjazah'];
							$tempatStudi=$_POST['tempatStudi'];
							
							$pangkat=$_POST['pangkat'];
							$golRuang=$_POST['golRuang'];
							$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
							$idGolongan=$_POST['idGolongan'];
							$tmtKepangkatan=$general->formatTanggalDB($_POST['TMTKepangkatan']);
							$split=explode("-",$tmtKepangkatan);
							$tmtBerikutnya=($split[0]+1)."-".$split[1]."-".$split[2];
							$totalKUM=$_POST['totalKUM'];
							$noSk=$_POST['noSk'];
							
							$pwd=$general->Encrypt($nipBaru);
							$token=$general->createRandomToken();
							
							$sqlCek1="	SELECT idPegawai 
										FROM peg_pegawai 
										WHERE nip='".$nipLama."'";
							$DB->executeQuery($sqlCek1);
							if($DB->getRows()==1) {
								$rowCek1=$DB->getResult();
								
								$sqlUpCek1="UPDATE peg_pegawai 
											SET nip='".$nipBaru."', 
												noSeriKarpeg='".$noSeriKarpeg."', 
												titleDepan='".$titleDepan."', 
												namaPeg='".$namaPeg."', 
												titleBelakang='".$titleBelakang."', 
												alamatPeg='".$alamatPeg."', 
												jkPeg='".$jkPeg."', 
												tmptLahir='".$tmptLahir."', 
												tglLahir='".$tglLahir."', 
												keahlian='".$keahlian."', 
												TMTMasuk='".$tmtMasuk."', 
												totalKUM='".$totalKUM."', 
												kdUnitKerja='".$jurusan."' 
											WHERE idPegawai='".$rowCek1['idPegawai']."'";
								$DB->executeQuery($sqlUpCek1);
								if($DB->notNull()) {
									$sqlCekUser="	SELECT idUser 
													FROM peg_user 
													WHERE userName='".$nipLama."'";
									$DB->executeQuery($sqlCekUser);
									if($DB->getRows()==1) {
										$rowCekUser=$DB->getResult();
										
										$sqlUpUser="UPDATE peg_user 
													SET userName='".$nipBaru."', 
														pwdHash='".$pwd."', 
														token='".$token."' 
													WHERE idUser='".$rowCekUser['idUser']."'";
										$DB->executeQuery($sqlUpUser);
										if($DB->notNull()) {
											
											$sqlCek2="	SELECT idKepangkatan 
														FROM peg_kepangkatan 
														WHERE nip='".$nipLama."'";
											$DB->executeQuery($sqlCek2);
											if($DB->getRows()==1) {
												$rowCek2=$DB->getResult();
												
												$sqlUpCek2="UPDATE peg_kepangkatan 
															SET nip='".$nipBaru."', 
																pangkat='".$pangkat."', 
																golRuang='".$golRuang."', 
																TMTPangkat='".$tmtPangkat."', 
																idGolongan='".$idGolongan."', 
																TMTKepangkatan='".$tmtKepangkatan."', 
																TMTBerikutnya='".$tmtBerikutnya."', 
																perolehanKUM='".$totalKUM."', 
																kdUnitKerja='".$jurusan."', 
																noSk='".$noSk."' 
															WHERE idKepangkatan='".$rowCek2['idKepangkatan']."'";
												$DB->executeQuery($sqlUpCek2);
												if($DB->notNull()) {
													$sqlCek3="	SELECT idBelajar 
																FROM peg_belajar 
																WHERE nip='".$nipLama."'";
													$DB->executeQuery($sqlCek3);
													if($DB->getRows()==1) {
														$rowCek3=$DB->getResult();
														
														$sqlUpCek3="UPDATE peg_belajar 
																	SET idPendidikan='".$idPendidikan."', 
																		nip='".$nipBaru."', 
																		thnIjazah='".$thnIjazah."', 
																		tempatStudi='".$tempatStudi."' 
																	WHERE idBelajar='".$rowCek3['idBelajar']."'";
														$DB->executeQuery($sqlUpCek3);
														if($DB->notNull()) {
															header("Location: ./page.php?u=kepegawaian");
														}
													}
												}
											}
										}
									}									
								}
							}
							break;
						case 4:							
							$nipLama=$_POST['nipLama'];//fix
							
							$nipBaru=$_POST['nipBaru'];							
							$noSeriKarpeg=$_POST['noSeriKarpeg'];							
							$titleDepan=trim($_POST['titleDepan']," ,");
							$namaPeg=trim($_POST['namaPeg']," .,");
							$titleBelakang=trim($_POST['titleBelakang']," ,");
							$alamatPeg=$_POST['alamatPeg'];
							$jkPeg=$_POST['jkPeg'];
							$tmptLahir=$_POST['tmptLahir'];
							$tglLahir=$general->formatTanggalDB($_POST['tglLahir']);
							$keahlian=$_POST['keahlian'];
							$tmtMasuk=$general->formatTanggalDB($_POST['TMTMasuk']);
							$jurusan=$_POST['kdUnitKerja'];
							
							$idPendidikan=$_POST['idPendidikan'];
							$thnIjazah=$_POST['thnIjazah'];
							$tempatStudi=$_POST['tempatStudi'];
							
							$pangkat=$_POST['pangkat'];
							$golRuang=$_POST['golRuang'];
							$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
							$idGolongan=$_POST['idGolongan'];
							$tmtKepangkatan=$general->formatTanggalDB($_POST['TMTKepangkatan']);
							$split=explode("-",$tmtKepangkatan);
							$tmtBerikutnya=($split[0]+1)."-".$split[1]."-".$split[2];
							$totalKUM=$_POST['totalKUM'];
							$noSk=$_POST['noSk'];
							
							$pwd=$general->Encrypt($nipBaru);
							$token=$general->createRandomToken();
							
							$sqlCek1="	SELECT idPegawai 
										FROM peg_pegawai 
										WHERE nip='".$nipLama."'";
							$DB->executeQuery($sqlCek1);
							if($DB->getRows()==1) {
								$rowCek1=$DB->getResult();
								
								$sqlUpCek1="UPDATE peg_pegawai 
											SET nip='".$nipBaru."', 
												noSeriKarpeg='".$noSeriKarpeg."', 
												titleDepan='".$titleDepan."', 
												namaPeg='".$namaPeg."', 
												titleBelakang='".$titleBelakang."', 
												alamatPeg='".$alamatPeg."', 
												jkPeg='".$jkPeg."', 
												tmptLahir='".$tmptLahir."', 
												tglLahir='".$tglLahir."', 
												keahlian='".$keahlian."', 
												TMTMasuk='".$tmtMasuk."', 
												totalKUM='".$totalKUM."', 
												kdUnitKerja='".$jurusan."' 
											WHERE idPegawai='".$rowCek1['idPegawai']."'";
								$DB->executeQuery($sqlUpCek1);
								if($DB->notNull()) {
									$sqlCekUser="	SELECT idUser 
													FROM peg_user 
													WHERE userName='".$nipLama."'";
									$DB->executeQuery($sqlCekUser);
									if($DB->getRows()==1) {
										$rowCekUser=$DB->getResult();
										
										$sqlUpUser="UPDATE peg_user 
													SET userName='".$nipBaru."', 
														pwdHash='".$pwd."', 
														token='".$token."' 
													WHERE idUser='".$rowCekUser['idUser']."'";
										$DB->executeQuery($sqlUpUser);
										if($DB->notNull()) {
											
											$sqlCek2="	SELECT idKepangkatan 
														FROM peg_kepangkatan 
														WHERE nip='".$nipLama."'";
											$DB->executeQuery($sqlCek2);
											if($DB->getRows()==1) {
												$rowCek2=$DB->getResult();
												
												$sqlUpCek2="UPDATE peg_kepangkatan 
															SET nip='".$nipBaru."', 
																pangkat='".$pangkat."', 
																golRuang='".$golRuang."', 
																TMTPangkat='".$tmtPangkat."', 
																idGolongan='".$idGolongan."', 
																TMTKepangkatan='".$tmtKepangkatan."', 
																TMTBerikutnya='".$tmtBerikutnya."', 
																perolehanKUM='".$totalKUM."', 
																kdUnitKerja='".$jurusan."', 
																noSk='".$noSk."' 
															WHERE idKepangkatan='".$rowCek2['idKepangkatan']."'";
												$DB->executeQuery($sqlUpCek2);
												if($DB->notNull()) {
													$sqlInsCek3="	INSERT INTO peg_belajar 
																	VALUES (null,
																			'".$nipBaru."',
																			'".$idPendidikan."',
																			'".$thnIjazah."', 
																			'".$tempatStudi."')";
													$DB->executeQuery($sqlInsCek3);
													if($DB->notNull()) {
														header("Location: ./page.php?u=kepegawaian");
													}
												}
											}
										}
									}									
								}
							}
							break;
						case 5:
							$nip=$_POST['nip'];//fix
							$idKepangkatan=$_POST['idKepangkatan'];//fix
							
							$noSeriKarpeg=$_POST['noSeriKarpeg'];							
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
							//$thnIjazah=$_POST['thnIjazah'];
							//$tempatStudi=$_POST['tempatStudi'];
							
							$pangkat=$_POST['pangkat'];
							$golRuang=$_POST['golRuang'];
							$tmtPangkat=$general->formatTanggalDB($_POST['TMTPangkat']);
							//$idGolongan=$_POST['idGolongan'];
							//$tmtKepangkatan=$_POST['TMTKepangkatan'];
							//$totalKUM=$_POST['totalKUM'];
							$noSk=$_POST['noSk'];
							
							$sqlUpCek1="UPDATE peg_pegawai 
										SET noSeriKarpeg='".$noSeriKarpeg."', 
											titleDepan='".$titleDepan."', 
											namaPeg='".$namaPeg."', 
											titleBelakang='".$titleBelakang."', 
											alamatPeg='".$alamatPeg."', 
											jkPeg='".$jkPeg."', 
											tmptLahir='".$tmptLahir."', 
											tglLahir='".$tglLahir."', 
											keahlian='".$keahlian."', 
											kdUnitKerja='".$jurusan."' 
										WHERE nip='".$nip."'";
							$DB->executeQuery($sqlUpCek1);
							if($DB->notNull()) {
								$sqlUpCek2="UPDATE peg_kepangkatan 
											SET pangkat='".$pangkat."', 
												golRuang='".$golRuang."', 
												TMTPangkat='".$tmtPangkat."', 
												kdUnitKerja='".$jurusan."', 
												noSk='".$noSk."' 
											WHERE idKepangkatan='".$idKepangkatan."'";
								$DB->executeQuery($sqlUpCek2);
								if($DB->notNull()) {
									header("Location: ./page.php?u=kepegawaian");
								}
							}
							break;
					}
					break;
				default:
					$nip=$_GET['nip'];
			
					$sqlCek1="	SELECT P.nip 
								FROM peg_pegawai P, peg_kepangkatan K 
								WHERE P.nip=K.nip 
								AND P.nip='".$nip."'";
					$DB->executeQuery($sqlCek1);
					if($DB->getRows()==1) {
						$rowCek1=$DB->getResult();
						
						$sqlCek2="	SELECT P.nip 
									FROM peg_pegawai P, ak_perolehan Pr 
									WHERE P.nip=Pr.nip 
									AND P.nip='".$rowCek1['nip']."' 
									AND Pr.statusPerolehan!='4'";
						$DB->executeQuery($sqlCek2);
						if($DB->getRows()==1) {// not edit all
							$rowCek2=$DB->getResult();
							
							$sqlPeg="	SELECT P.noSeriKarpeg, P.TMTMasuk, P.nip, P.titleDepan, P.namaPeg, P.titleBelakang, P.alamatPeg, P.jkPeg, P.tmptLahir, P.tglLahir, P.keahlian, P.totalKUM, 
											K.kdUnitKerja, K.pangkat, K.TMTPangkat, K.golRuang, K.noSk, K.TMTKepangkatan, K.TMTBerikutnya, 
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
										AND P.nip='".$rowCek2['nip']."'";
							$DB->executeQuery($sqlPeg);
							if($DB->getRows()==1) {//Jika status perolehan !=4 ada = 1 dan sudah mengisi pendidikan [kondisi 1]
								$rowPeg=$DB->getResult();
								
								$isi.="
								<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
								<div>Edit Dosen</div>
								
								<div style='text-align:right;'>
									<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian' class='submit2'>Cancel</a></div>
									<div class='fix'></div>
								</div>
								
								<div>
									<form action='?u=kepegawaian&act=edit&do=update' method='post'>
										<input type='hidden' name='kondisi' value='1'>
										<input type='hidden' name='nip' value='".$rowPeg['nip']."'>
										<div class='list2' style='margin-top:20px;padding-left:10px;'>
											<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepegawaian</div>
											
											<div class='fl' style='width:150px;'>NIP</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>".$rowPeg['nip']."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>No. Seri Karpeg</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' name='noSeriKarpeg' value='".$rowPeg['noSeriKarpeg']."' class='input' style='width:120px;'></div>
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
											<div class='fl'><input class='input' style='width:150px;' type='text' name='pangkat' value='".$rowPeg['pangkat']."'> / <input class='input' style='width:50px;' type='text' name='golRuang' value='".$rowPeg['golRuang']."'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:180px;'>TMT Pangkat</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input class='input' style='width:100px;' type='text' name='TMTPangkat' id='datepicker2' value='".$general->formatTanggal3($rowPeg['TMTPangkat'])."'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:180px;'>Jabatan Fungsional</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>".strtoupper($rowPeg['namaPangkat'])." ".$rowPeg['syaratKUM']."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>TMT Jabatan Fungsional</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'>".$general->formatTanggal3($rowPeg['TMTKepangkatan'])."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>TMT Jabatan Berikutnya</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'>".$general->formatTanggal3($rowPeg['TMTBerikutnya'])."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>Total KUM</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'>".$rowPeg['totalKUM']."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>No. SK Jabatan Fungsional</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'><input type='text' name='noSk' value='".$rowPeg['noSk']."' class='input' style='width:250px;'></div>
											<div class='fix'></div>
										</div>
										
										<div style='width:100%;'><input type='submit' value='Update' class='submit' style='width:100%; font-weight:bold;'></div>
									</form>
								</div>";
							}
							else { //Jika status perolehan !=4 ada = 1 tetapi belum memasukkan pendidikan [kondisi 2]
								$sqlPeg2="	SELECT P.noSeriKarpeg, P.TMTMasuk, P.nip, P.titleDepan, P.namaPeg, P.titleBelakang, P.alamatPeg, P.jkPeg, P.tmptLahir, P.tglLahir, P.keahlian, P.totalKUM, 
												K.kdUnitKerja, K.pangkat, K.TMTPangkat, K.golRuang, K.noSk, K.TMTKepangkatan, K.TMTBerikutnya, 
												G.syaratKUM, 
												Pk.namaPangkat 
											FROM peg_pegawai P, peg_kepangkatan K, pang_golongan G, pang_pangkat Pk 
											WHERE P.nip=K.nip 
											AND K.idGolongan=G.idGolongan 
											AND G.idPangkat=Pk.idPangkat 
											AND P.nip='".$rowCek2['nip']."'";
								$DB->executeQuery($sqlPeg2);
								if($DB->getRows()==1) {
									$rowPeg2=$DB->getResult();
									
									$isi.="
									<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
									<div>Edit Dosen</div>
									
									<div style='text-align:right;'>
										<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian' class='submit2'>Cancel</a></div>
										<div class='fix'></div>
									</div>
									
									<div>
										<form action='?u=kepegawaian&act=edit&do=update' method='post'>
											<input type='hidden' name='kondisi' value='2'>
											<input type='hidden' name='nip' value='".$rowPeg2['nip']."'>
											<div class='list2' style='margin-top:20px;padding-left:10px;'>
												<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepegawaian</div>
												
												<div class='fl' style='width:150px;'>NIP</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>".$rowPeg2['nip']."</div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>No. Seri Karpeg</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='noSeriKarpeg' value='".$rowPeg2['noSeriKarpeg']."' class='input' style='width:120px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Nama Dosen</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>
													<input type='text' name='titleDepan' value='".$rowPeg2['titleDepan']."' class='input' style='width:80px;'>
													<input type='text' name='namaPeg' value='".$rowPeg2['namaPeg']."' class='input' style='width:200px;'>
													<input type='text' name='titleBelakang' value='".$rowPeg2['titleBelakang']."' class='input' style='width:90px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;' >Alamat</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><textarea name='alamatPeg' class='input' style='width:250px; height:100px;'>".$rowPeg2['alamatPeg']."</textarea></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Jenis Kelamin</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>";
													if($rowPeg2['jkPeg']==0) {
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
												<div class='fl'><input class='input' style='width:150px;' type='text' name='tmptLahir' value='".$rowPeg2['tmptLahir']."'>,&nbsp;<input class='input' style='width:100px;' type='text' name='tglLahir' id='datepicker' value='".$general->formatTanggal3($rowPeg2['tglLahir'])."'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Keahlian</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='keahlian' value='".$rowPeg2['keahlian']."' class='input' style='width:200px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>TMT Masuk</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>".$general->formatTanggal3($rowPeg2['TMTMasuk'])."</div>
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
															if($rowPeg2['kdUnitKerja']==$rowJur['kdUnitKerja']) {
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
												<div class='fl'>
													<select name='idPendidikan' class='form-select' style='width:110px; height:30px;'>
														<option value=''>-pendidikan-</option>";
														$sqlPend="	SELECT idPendidikan, namaPendidikan 
																	FROM peg_pendidikan 
																	ORDER BY rankingPendidikan ASC";
														$DB->executeQuery($sqlPend);
														if($DB->getRows()>0) {
															while($rowPend=$DB->getResult()) {
																$isi.="<option value='".$rowPend['idPendidikan']."'>".strtoupper($rowPend['namaPendidikan'])."</option>";
															}
														}
													$isi.="
													</select>
												</div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Tahun Ijazah</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='thnIjazah' value='".$rowPeg2['thnIjazah']."' class='input' style='width:50px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Tempat Studi</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><textarea name='tempatStudi' class='input' style='height:50px; width:250px;'>".$rowPeg2['tempatStudi']."</textarea></div>
												<div class='fix'></div>
											</div>
											
											<div class='list2' style='margin:10px 0px; padding-left:10px;'>
												<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepangkatan</div>
												
												<div class='fl' style='width:180px;'>Pangkat / Gol. Ruang</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input class='input' style='width:150px;' type='text' name='pangkat' value='".$rowPeg2['pangkat']."'> / <input class='input' style='width:50px;' type='text' name='golRuang' value='".$rowPeg2['golRuang']."'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:180px;'>TMT Pangkat</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input class='input' style='width:100px;' type='text' name='TMTPangkat' value='".$general->formatTanggal3($rowPeg2['TMTPangkat'])."' id='datepicker2'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:180px;'>Jabatan Fungsional</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>".strtoupper($rowPeg2['namaPangkat'])." ".$rowPeg2['syaratKUM']."</div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>TMT Jabatan Fungsional</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'>".$general->formatTanggal3($rowPeg2['TMTKepangkatan'])."</div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>TMT Jabatan Berikutnya</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'>".$general->formatTanggal3($rowPeg2['TMTBerikutnya'])."</div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>Total KUM</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'>".$rowPeg2['totalKUM']."</div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>No. SK Jabatan Fungsional</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'><input type='text' name='noSk' value='".$rowPeg2['noSk']."' class='input' style='width:250px;'></div>
												<div class='fix'></div>
											</div>
											
											<div style='width:100%;'><input type='submit' value='Update' class='submit' style='width:100%; font-weight:bold;'></div>
										</form>
									</div>";
								}
							}
						}
						else { //edit all
							$sqlPeg2="	SELECT P.noSeriKarpeg, P.TMTMasuk, P.nip, P.titleDepan, P.namaPeg, P.titleBelakang, P.alamatPeg, P.jkPeg, P.tmptLahir, P.tglLahir, P.keahlian, P.totalKUM, 
											K.kdUnitKerja, K.pangkat, K.TMTPangkat, K.golRuang, K.noSk, K.TMTKepangkatan, K.TMTBerikutnya, 
											B.thnIjazah, B.idPendidikan, B.tempatStudi, 
											G.syaratKUM, G.idGolongan, 
											Pk.namaPangkat 
										FROM peg_pegawai P, peg_kepangkatan K, peg_belajar B, pang_golongan G, pang_pangkat Pk 
										WHERE P.nip=K.nip 
										AND P.nip=B.nip 
										AND K.idGolongan=G.idGolongan 
										AND G.idPangkat=Pk.idPangkat 
										AND K.active='1' 
										AND P.nip='".$rowCek1['nip']."'";
							$DB->executeQuery($sqlPeg2);
							if($DB->getRows()==1) {// jika sudah pernah input belajar [kondisi 3]
								$rowPeg2=$DB->getResult();
								
								$isi.="
								<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
								<div>Edit Dosen</div>
								
								<div style='text-align:right;'>
									<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian' class='submit2'>Cancel</a></div>
									<div class='fix'></div>
								</div>
								
								<div>
									<form action='?u=kepegawaian&act=edit&do=update' method='post'>
										<input type='hidden' name='kondisi' value='3'>
										<input type='hidden' name='nipLama' value='".$rowPeg2['nip']."'>
										<div class='list2' style='margin-top:20px;padding-left:10px;'>
											<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepegawaian</div>
											
											<div class='fl' style='width:150px;'>NIP</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' name='nipBaru' value='".$rowPeg2['nip']."' class='input' style='width:200px;'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>No. Seri Karpeg</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' name='noSeriKarpeg' value='".$rowPeg2['noSeriKarpeg']."' class='input' style='width:120px;'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>Nama Dosen</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>
												<input type='text' name='titleDepan' value='".$rowPeg2['titleDepan']."' class='input' style='width:80px;'>
												<input type='text' name='namaPeg' value='".$rowPeg2['namaPeg']."' class='input' style='width:200px;'>
												<input type='text' name='titleBelakang' value='".$rowPeg2['titleBelakang']."' class='input' style='width:90px;'>
											</div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>Alamat</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><textarea name='alamatPeg' class='input' style='width:250px; height:100px;'>".$rowPeg2['alamatPeg']."</textarea></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>Jenis Kelamin</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>";
												if($rowPeg2['jkPeg']==0) {
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
											<div class='fl'><input type='text' class='input' style='width:150px;' name='tmptLahir' value='".$rowPeg2['tmptLahir']."'>,&nbsp;<input class='input' style='width:100px;' id='datepicker' type='text' name='tglLahir' value='".$general->formatTanggal3($rowPeg2['tglLahir'])."'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>Keahlian</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' name='keahlian' value='".$rowPeg2['keahlian']."' class='input' style='width:200px;'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>TMT Masuk</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input class='input' style='width:100px;' id='datepicker4' type='text' name='TMTMasuk' value='".$general->formatTanggal3($rowPeg2['TMTMasuk'])."'></div>
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
														if($rowPeg2['kdUnitKerja']==$rowJur['kdUnitKerja']) {
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
											<div class='fl'>
												<select name='idPendidikan' class='form-select' style='width:110px; height:30px;'>
													<option value=''>-pendidikan-</option>";
													$sqlPend="	SELECT idPendidikan, namaPendidikan 
																FROM peg_pendidikan 
																ORDER BY rankingPendidikan ASC";
													$DB->executeQuery($sqlPend);
													if($DB->getRows()>0) {
														while($rowPend=$DB->getResult()) {
															if($rowPeg2['idPendidikan']==$rowPend['idPendidikan']) {
																$isi.="<option value='".$rowPend['idPendidikan']."' SELECTED='SELECTED'>".strtoupper($rowPend['namaPendidikan'])."</option>";
															}
															else {
																$isi.="<option value='".$rowPend['idPendidikan']."'>".strtoupper($rowPend['namaPendidikan'])."</option>";
															}
														}
													}
												$isi.="
												</select>
											</div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>Tahun Ijazah</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' name='thnIjazah' value='".$rowPeg2['thnIjazah']."' class='input' style='width:50px;'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>Tempat Studi</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><textarea name='tempatStudi' class='input' style='height:50px; width:250px;'>".$rowPeg2['tempatStudi']."</textarea></div>
											<div class='fix'></div>
										</div>
										
										<div class='list2' style='margin:10px 0px; padding-left:10px;'>
											<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepangkatan</div>
											
											<div class='fl' style='width:180px;'>Pangkat / Gol. Ruang</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' name='pangkat' value='".$rowPeg2['pangkat']."' class='input' style='width:150px;'> / <input type='text' class='input' style='width:50px;' name='golRuang' value='".$rowPeg2['golRuang']."'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:180px;'>TMT Pangkat</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' id='datepicker2' name='TMTPangkat' value='".$general->formatTanggal3($rowPeg2['TMTPangkat'])."' class='input' style='width:100px;'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:180px;'>Jabatan Fungsional</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>
												<select name='idGolongan' class='form-select' style='width:180px; height:30px;'>
													<option value=''>-fungsional-</option>";
												$sqlJab="	SELECT G.idGolongan, P.namaPangkat, G.syaratKUM 
															FROM pang_golongan G, pang_pangkat P 
															WHERE G.idPangkat=P.idPangkat 
															ORDER BY G.rankingGolongan ASC";
												$DB->executeQuery($sqlJab);
												if($DB->getRows()>0) {
													while($rowJab=$DB->getResult()) {
														if($rowPeg2['idGolongan']==$rowJab['idGolongan']) {
															$isi.="<option value='".$rowJab['idGolongan']."' SELECTED='SELECTED'>".strtoupper($rowJab['namaPangkat'])." ".$rowJab['syaratKUM']."</option>";
														}
														else {
															$isi.="<option value='".$rowJab['idGolongan']."'>".strtoupper($rowJab['namaPangkat'])." ".$rowJab['syaratKUM']."</option>";
														}
													}
												}
												$isi.="
											</select>
											</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>TMT Jabatan Fungsional</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'><input type='text' id='datepicker3' name='TMTKepangkatan' value='".$general->formatTanggal3($rowPeg2['TMTKepangkatan'])."' class='input' style='width:100px;'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>TMT Jabatan Berikutnya</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'>".$general->formatTanggal3($rowPeg2['TMTBerikutnya'])."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>Total KUM</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'><input type='text' name='totalKUM' value='".$rowPeg2['totalKUM']."' class='input' style='width:50px;'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>No. SK Jabatan Fungsional</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'><input type='text' name='noSk' value='".$rowPeg2['noSk']."' class='input' style='width:250px;'></div>
											<div class='fix'></div>
										</div>
										
										<div style='width:100%;'><input type='submit' value='Update' class='submit' style='width:100%; font-weight:bold;'></div>
									</form>
								</div>";
							}
							else {//edit all dan belum ada pendidikan [kondisi 4]
								$sqlPeg2="	SELECT P.noSeriKarpeg, P.TMTMasuk, P.nip, P.titleDepan, P.namaPeg, P.titleBelakang, P.alamatPeg, P.jkPeg, P.tmptLahir, P.tglLahir, P.keahlian, P.totalKUM, 
												K.kdUnitKerja, K.pangkat, K.TMTPangkat, K.golRuang, K.noSk, K.TMTKepangkatan, K.TMTBerikutnya, 
												G.syaratKUM, G.idGolongan, 
												Pk.namaPangkat 
											FROM peg_pegawai P, peg_kepangkatan K, pang_golongan G, pang_pangkat Pk 
											WHERE P.nip=K.nip 
											AND K.idGolongan=G.idGolongan 
											AND G.idPangkat=Pk.idPangkat 
											AND K.active='1' 
											AND P.nip='".$rowCek1['nip']."'";
								$DB->executeQuery($sqlPeg2);
								if($DB->getRows()==1) {
									$rowPeg2=$DB->getResult();
									
									$isi.="
									<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
									<div>Edit Dosen</div>
									
									<div style='text-align:right;'>
										<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian' class='submit2'>Cancel</a></div>
										<div class='fix'></div>
									</div>
									
									<div>
										<form action='?u=kepegawaian&act=edit&do=update' method='post'>
											<input type='hidden' name='kondisi' value='4'>
											<input type='hidden' name='nipLama' value='".$rowPeg2['nip']."'>
											<div class='list2' style='margin-top:20px;padding-left:10px;'>
												<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepegawaian</div>
												
												<div class='fl' style='width:150px;'>NIP</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='nipBaru' value='".$rowPeg2['nip']."' class='input' style='width:200px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>No. Seri Karpeg</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='noSeriKarpeg' value='".$rowPeg2['noSeriKarpeg']."' class='input' style='width:120px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Nama Dosen</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>
													<input type='text' name='titleDepan' value='".$rowPeg2['titleDepan']."' class='input' style='width:80px;'>
													<input type='text' name='namaPeg' value='".$rowPeg2['namaPeg']."' class='input' style='width:200px;'>
													<input type='text' name='titleBelakang' value='".$rowPeg2['titleBelakang']."' class='input' style='width:90px;'>
												</div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;' >Alamat</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><textarea name='alamatPeg' class='input' style='width:250px; height:100px;'>".$rowPeg2['alamatPeg']."</textarea></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Jenis Kelamin</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>";
													if($rowPeg2['jkPeg']==0) {
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
												<div class='fl'><input type='text' name='tmptLahir' value='".$rowPeg2['tmptLahir']."' class='input' style='width:150px;'>,&nbsp;<input type='text' name='tglLahir' id='datepicker' value='".$general->formatTanggal3($rowPeg2['tglLahir'])."' class='input' style='width:100px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Keahlian</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='keahlian' value='".$rowPeg2['keahlian']."' class='input' style='width:200px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>TMT Masuk</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input class='input' style='width:100px;' id='datepicker4' type='text' name='TMTMasuk' value='".$general->formatTanggal3($rowPeg2['TMTMasuk'])."'></div>
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
															if($rowPeg2['kdUnitKerja']==$rowJur['kdUnitKerja']) {
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
												<div class='fl'>
													<select name='idPendidikan' class='form-select' style='width:110px; height:30px;'>
														<option value=''>-pendidikan-</option>";
														$sqlPend="	SELECT idPendidikan, namaPendidikan 
																	FROM peg_pendidikan 
																	ORDER BY rankingPendidikan ASC";
														$DB->executeQuery($sqlPend);
														if($DB->getRows()>0) {
															while($rowPend=$DB->getResult()) {
																$isi.="<option value='".$rowPend['idPendidikan']."'>".strtoupper($rowPend['namaPendidikan'])."</option>";
															}
														}
													$isi.="
													</select>
												</div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Tahun Ijazah</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='thnIjazah' value='".$rowPeg2['thnIjazah']."' class='input' style='width:50px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:150px;'>Tempat Studi</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><textarea name='tempatStudi' class='input' style='height:50px; width:250px;'>".$rowPeg2['tempatStudi']."</textarea></div>
												<div class='fix'></div>
											</div>
											
											<div class='list2' style='margin:10px 0px; padding-left:10px;'>
												<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepangkatan</div>
												
												<div class='fl' style='width:180px;'>Pangkat / Gol. Ruang</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='pangkat' value='".$rowPeg2['pangkat']."' class='input' style='width:150px;'> / <input type='text' name='golRuang' value='".$rowPeg2['golRuang']."' class='input' style='width:50px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:180px;'>TMT Pangkat</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'><input type='text' name='TMTPangkat' value='".$general->formatTanggal3($rowPeg2['TMTPangkat'])."' id='datepicker2' class='input' style='width:100px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width:180px;'>Jabatan Fungsional</div>
												<div class='fl' style='width:10px;'>:</div>
												<div class='fl'>
													<select name='idGolongan' class='form-select' style='width:180px; height:30px;'>
														<option value=''>-fungsional-</option>";
													$sqlJab="	SELECT G.idGolongan, P.namaPangkat, G.syaratKUM 
																FROM pang_golongan G, pang_pangkat P 
																WHERE G.idPangkat=P.idPangkat 
																ORDER BY G.rankingGolongan ASC";
													$DB->executeQuery($sqlJab);
													if($DB->getRows()>0) {
														while($rowJab=$DB->getResult()) {
															if($rowPeg2['idGolongan']==$rowJab['idGolongan']) {
																$isi.="<option value='".$rowJab['idGolongan']."' SELECTED='SELECTED'>".strtoupper($rowJab['namaPangkat'])." ".$rowJab['syaratKUM']."</option>";
															}
															else {
																$isi.="<option value='".$rowJab['idGolongan']."'>".strtoupper($rowJab['namaPangkat'])." ".$rowJab['syaratKUM']."</option>";
															}
														}
													}
													$isi.="
												</select>
												</div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>TMT Jabatan Fungsional</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'><input type='text' name='TMTKepangkatan' value='".$general->formatTanggal3($rowPeg2['TMTKepangkatan'])."' id='datepicker3' class='input' style='width:100px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>TMT Jabatan Berikutnya</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'>".$general->formatTanggal3($rowPeg2['TMTBerikutnya'])."</div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>Total KUM</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'><input type='text' name='totalKUM' value='".$rowPeg2['totalKUM']."' class='input' style='width:50px;'></div>
												<div class='fix'></div>
												
												<div class='fl' style='width: 180px;'>No. SK Jabatan Fungsional</div>
												<div class='fl' style='width: 10px;'>:</div>
												<div class='fl'><input type='text' name='noSk' value='".$rowPeg2['noSk']."' class='input' style='width:250px;'></div>
												<div class='fix'></div>
											</div>
											
											<div style='width:100%;'><input type='submit' value='Update' class='submit' style='width:100%; font-weight:bold;'></div>
										</form>
									</div>";
								}
							}
						}
					}
					elseif($DB->getRows()>1) { //sudah pernah ngajuin kenaikan jabatan
						//$x=0;
						while($rowCek1=$DB->getResult()) {
							$nipA[]=$rowCek1['nip'];
							//$x++;
						}
						
						$sqlCek2="	SELECT P.nip 
									FROM peg_pegawai P, peg_kepangkatan K 
									WHERE P.nip=K.nip 
									AND P.nip='".$nipA[0]."' 
									AND K.active='1'";
						$DB->executeQuery($sqlCek2);
						if($DB->getRows()==1) {
							$rowCek2=$DB->getResult();
							
							$sqlPeg="	SELECT P.noSeriKarpeg, P.TMTMasuk, P.nip, P.titleDepan, P.namaPeg, P.titleBelakang, P.alamatPeg, P.jkPeg, P.tmptLahir, P.tglLahir, P.keahlian, P.totalKUM, 
											K.kdUnitKerja, K.pangkat, K.TMTPangkat, K.golRuang, K.noSk, K.TMTKepangkatan, K.idKepangkatan, K.TMTBerikutnya, 
											B.thnIjazah, 
											Pd.namaPendidikan, 
											G.syaratKUM, 
											Pk.namaPangkat 
										FROM peg_pegawai P, peg_kepangkatan K, peg_belajar B, peg_pendidikan Pd, pang_golongan G, pang_pangkat Pk 
										WHERE P.nip=K.nip 
										AND P.nip=B.nip 
										AND B.idPendidikan=Pd.idPendidikan 
										AND K.idGolongan=G.idGolongan 
										AND G.idPangkat=Pk.idPangkat 
										AND P.nip='".$rowCek2['nip']."' 
										AND K.active='1'";
							$DB->executeQuery($sqlPeg);
							if($DB->getRows()==1) {//Jika status perolehan=4 ada = 1 dan sudah pengajuan dan pasti sudah lengkap datanya [kondisi 5]
								$rowPeg=$DB->getResult();
								
								$isi.="
								<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
								<div>Edit Dosen</div>
								
								<div style='text-align:right;'>
									<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian' class='submit2'>Cancel</a></div>
									<div class='fix'></div>
								</div>
								
								<div>
									<form action='?u=kepegawaian&act=edit&do=update' method='post'>
										<input type='hidden' name='kondisi' value='5'>
										<input type='hidden' name='nip' value='".$rowPeg['nip']."'>
										<input type='hidden' name='idKepangkatan' value='".$rowPeg['idKepangkatan']."'>
										<div class='list2' style='margin-top:20px;padding-left:10px;'>
											<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepegawaian</div>
											
											<div class='fl' style='width:150px;'>NIP</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>".$rowPeg['nip']."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>No. Seri Karpeg</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input type='text' name='noSeriKarpeg' value='".$rowPeg['noSeriKarpeg']."' class='input' style='width:120px;'></div>
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
											<div class='fl'><input class='input' style='width:150px;' type='text' name='tmptLahir' value='".$rowPeg['tmptLahir']."'>,&nbsp;<input class='input' style='width:100px;' type='text' name='tglLahir' value='".$general->formatTanggal3($rowPeg['tglLahir'])."' id='datepicker'></div>
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
											<div class='fl'>".$rowPeg['thnIjazah']."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width:150px;'>Tempat Studi</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>".$rowPeg2['tempatStudi']."</div>
											<div class='fix'></div>
										</div>
										
										<div class='list2' style='margin:10px 0px; padding-left:10px;'>
											<div style='padding-bottom:15px; font-weight:bold; font-size:15px;'>Data Kepangkatan</div>
											
											<div class='fl' style='width:180px;'>Pangkat / Gol. Ruang</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input class='input' style='width:150px;' type='text' name='pangkat' value='".$rowPeg['pangkat']."'> / <input class='input' style='width:100px;' type='text' name='golRuang' value='".$rowPeg['golRuang']."'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:180px;'>TMT Pangkat</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'><input class='input' style='width:100px;' type='text' name='TMTPangkat' value='".$general->formatTanggal3($rowPeg['TMTPangkat'])."' id='datepicker2'></div>
											<div class='fix'></div>
											
											<div class='fl' style='width:180px;'>Jabatan Fungsional</div>
											<div class='fl' style='width:10px;'>:</div>
											<div class='fl'>".strtoupper($rowPeg['namaPangkat'])." ".$rowPeg['syaratKUM']."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>TMT Jabatan Fungsional</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'>".$general->formatTanggal3($rowPeg['TMTKepangkatan'])."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>TMT Jabatan Berikutnya</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'>".$general->formatTanggal3($rowPeg['TMTBerikutnya'])."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>Total KUM</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'>".$rowPeg['totalKUM']."</div>
											<div class='fix'></div>
											
											<div class='fl' style='width: 180px;'>No. SK Jabatan Fungsional</div>
											<div class='fl' style='width: 10px;'>:</div>
											<div class='fl'><input type='text' name='noSK' value='".$rowPeg['noSk']."' class='input' style='width:250px;'></div>
											<div class='fix'></div>
										</div>
										
										<div style='width:100%;'><input type='submit' value='Update' class='submit' style='width:100%; font-weight:bold;'></div>
									</form>
								</div>";
							}
						}
					}
					else {
						$isi.="null";
					}
			}			
			break;
		case 'hapus':
			$nip=$_GET['nip'];//fix
			
			$sqlCekDel1="	SELECT idPerolehan 
							FROM ak_perolehan 
							WHERE nip='".$nip."'";
			$DB->executeQuery($sqlCekDel1);
			if($DB->getRows()==0) {
				$sqlCekDel2="	DELETE FROM peg_pegawai 
								WHERE nip='".$nip."'";
				$DB->executeQuery($sqlCekDel2);
				if($DB->notNull()) {
					$sqlCekDel3="	DELETE FROM peg_user 
									WHERE userName='".$nip."'";
					$DB->executeQuery($sqlCekDel3);
					if($DB->notNull()) {
						$sqlCekDel3="	DELETE FROM peg_kepangkatan 
										WHERE nip='".$nip."'";
						$DB->executeQuery($sqlCekDel3);
						if($DB->notNull()) {
							$sqlCekDel4="	DELETE FROM peg_belajar 
											WHERE nip='".$nip."'";
							$DB->executeQuery($sqlCekDel4);
							if($DB->notNull()) {
								header("Location: ./page.php?u=kepegawaian");
							}
						}
						else {
							header("Location: ./page.php?u=kepegawaian");
						}
					}
				}
			}
			elseif($DB->getRows()>0) {
				$isi.="
				<div class='kecil' style='text-align:center; color:red;'>Maaf, data ini tidak bisa dihapus, karena sudah pernah mengajukan kenaikan jabatan fungsional.</div>";
			}
			else {
				$isi.="
				<div class='kecil' style='text-align:center; color:red;'>Maaf, data ini tidak ditemukan dalam database kami.</div>";
			}
			break;
		case 'detail':	
			$nip=$_GET['nip'];
			
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
							<div class='fr' style='margin-left:10px;text-align:center;'><a href='?u=kepegawaian&act=cetak&nip=".$rowDos['nip']."' target='_blank' class='submit2'>Cetak</a></div>
							<div class='fr' style='text-align:center;'><a href='?u=kepegawaian&act=edit&nip=".$rowDos['nip']."' class='submit2'>Edit</a></div>
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
			break;
		default:
			$isi="	<div class='kategori'><span class='f-verdana'>Kepegawaian</span></div>
					
					<div class='search'>
						<form action='#' method='post'>";
							if(isset($_POST['nipSearch']) && $_POST['nipSearch']!="") {
								$isi.="
								<input name='nipSearch' type='text' class='input cari' value='".$_POST['nipSearch']."'>";
							}
							else {
								$isi.="
								<input name='nipSearch' type='text' class='input cari'>";
							}
							$isi.="
							&nbsp;<input type='submit' value='Cari Dosen' class='submit f-verdana'>
						</form>
					</div>
					
					<div class=''>
						<form action='#' method='post'>
							<div class='actions'>";
								//$_SESSION['urutkan']=0;
								$isi.="
								<select name='urutkan' class='form-select' style='height:30px; width:150px;' onchange='this.form.submit();'>
									<option value='0'>- Urutkan -</option>";
									$urutkan=array('1'=>'Tampil Semua','2'=>'Alfabet','3'=>'Jabatan','4'=>'Prodi',);
									foreach($urutkan as $sort=>$sortValue) {
										if(isset($_POST['urutkan'])||isset($_SESSION['urutkan'])) {
											if($_POST['urutkan']==$sort||$_SESSION['urutkan']==$sort) {
												$isi.="
												<option value='".$sort."' SELECTED>".$sortValue."</option>";
												$_SESSION['urutkan']=$sort;
											}
											else {
												$isi.="
												<option value='".$sort."'>".$sortValue."</option>";
											}
										}
										else {
											$isi.="
											<option value='".$sort."'>".$sortValue."</option>";
										}
									}
								$isi.="
								</select>";
								if(isset($_SESSION['urutkan'])) {
									if($_SESSION['urutkan']==2 || $_SESSION['urutkan']==3 || $_SESSION['urutkan']==4) {
										if($_SESSION['urutkan']==2) {//alfabet
											//$_SESSION['by']=0;
											$isi.="
											<select name='by' class='form-select' style='height:30px; width:150px;' onchange='this.form.submit();'>
												<option value='0'>- Pilih -</option>";
												$alfabet=str_split(strtoupper("abcdefghijklmnopqrstuvwxyz"));
												for($i=0; $i<count($alfabet); $i++) {
													if(isset($_POST['by'])||isset($_SESSION['by'])) {
														if($_POST['by']==($i+1)||$_SESSION['by']==($i+1)) {
															$isi.="
															<option value='".($i+1)."' SELECTED>".$alfabet[$i]."</option>";
															$_SESSION['by']=$i+1;
														}
														else {
															$isi.="
															<option value='".($i+1)."'>".$alfabet[$i]."</option>";
														}
													}
													else {
														$isi.="
														<option value='".($i+1)."'>".$alfabet[$i]."</option>";
													}
												}
											$isi.="
											</select>";
										}
										elseif($_SESSION['urutkan']==3) {//jabatan
											$sqlJab="	SELECT idPangkat, namaPangkat 
														FROM pang_pangkat 
														ORDER BY rankingPangkat ASC";
											$DB->executeQuery($sqlJab);
											if($DB->rs()) {
												//$_SESSION['by']=0;
												$isi.="
												<select name='by' class='form-select' style='height:30px; width:150px;' onchange='this.form.submit();'>
													<option value='0'>- berdasarkan -</option>";
												while($rowJab=$DB->getResult()) {
													if(isset($_POST['by'])||isset($_SESSION['by'])) {
														if($_POST['by']==$rowJab['idPangkat']||$_SESSION['by']==$rowJab['idPangkat']) {
															$isi.="
															<option value='".$rowJab['idPangkat']."' SELECTED>".strtoupper($rowJab['namaPangkat'])."</option>";
															$_SESSION['by']=$rowJab['idPangkat'];
														}
														else {
															$isi.="
															<option value='".$rowJab['idPangkat']."'>".strtoupper($rowJab['namaPangkat'])."</option>";
														}
													}
													else {
														$isi.="
														<option value='".$rowJab['idPangkat']."'>".strtoupper($rowJab['namaPangkat'])."</option>";
													}
												}
												$isi.="
												</select>";
											}
										}
										else {//prodi
											$sqlProdi="	SELECT kdUnitKerja, namaUnitKerja 
														FROM peg_unitkerja 
														WHERE parentId!='0' 
														AND active='1' 
														ORDER BY namaUnitKerja ASC";
											$DB->executeQuery($sqlProdi);
											if($DB->rs()) {
												//$_SESSION['by']=0;
												$isi.="
												<select name='by' class='form-select' style='height:30px; width:150px;' onchange='this.form.submit();'>
													<option value='0'>- berdasarkan -</option>";
												while($rowProdi=$DB->getResult()) {
													if(isset($_POST['by'])||isset($_SESSION['by'])) {
														if($_POST['by']==$rowProdi['kdUnitKerja']||$_SESSION['by']==$rowProdi['kdUnitKerja']) {
															$isi.="
															<option value='".$rowProdi['kdUnitKerja']."' SELECTED>".strtoupper($rowProdi['namaUnitKerja'])."</option>";
															$_SESSION['by']=$rowProdi['kdUnitKerja'];
														}
														else {
															$isi.="
															<option value='".$rowProdi['kdUnitKerja']."'>".strtoupper($rowProdi['namaUnitKerja'])."</option>";
														}
													}
													else {
														$isi.="
														<option value='".$rowProdi['kdUnitKerja']."'>".strtoupper($rowProdi['namaUnitKerja'])."</option>";
													}
												}
												$isi.="
												</select>";
											}
										}
									}
								}
							$isi.="	
							</div>
							<div class='show'>
								<div class='show-head'>
									<div class='show-name f-verdana' style='padding-left:0px;'>List Dosen</div>
								</div>									
								<div class='list'>";
									if(isset($_POST['nipSearch']) && $_POST['nipSearch']!="") {
										$nipSearch=str_replace(" ","",trim($_POST['nipSearch']," .,"));
										
										$sqlList="	SELECT Pg.titleDepan, Pg.namaPeg, Pg.titleBelakang, Pg.nip, Pg.totalKUM, P.namaPangkat, G.syaratKUM, U.namaUnitKerja 
													FROM peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U 
													WHERE Pg.nip=K.nip 
													AND K.idGolongan=G.idGolongan 
													AND K.kdUnitKerja=U.kdUnitKerja 
													AND G.idPangkat=P.idPangkat 
													AND K.active='1' 
													AND Pg.nip='".$nipSearch."'";
										
										$paging->setOption("tabel", "peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U");
										$paging->setOption("where", "WHERE Pg.nip=K.nip AND K.idGolongan=G.idGolongan AND K.kdUnitKerja=U.kdUnitKerja AND G.idPangkat=P.idPangkat AND K.active='1' AND Pg.nip='".$nipSearch."'");
										$paging->setOption("limit", "10");
										$paging->setOption("order", "");
										
										$paging->setOption("page", $_REQUEST["page"]); // setup untuk ambil variable angka halaman (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
										$paging->setOption("web_url_page", "?u=kepegawaian&page="); // setup alamat url (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
										
										// optional setup
										$paging->setOption("adjacents", "5"); // tampil berapa angka ke kanan dan ke kiri nya, jika kita diposisi tengah halaman
										$paging->setOption("txt_prev", "&laquo; sebelumnya"); // mengubah text "prev" menjadi "sebelumnya"
										$paging->setOption("txt_next", "berikutnya &raquo;"); // mengubah text "next" menjadi "berikutnya"
										
										// generate hasil pagination
										$hal_array = $paging->build();
										
										// setup penomoran
										$no = $hal_array["start"] + 1;
										
										$isi.="
										<div style='padding-bottom:2px;'>
											<div class='fl bold' style='width:30px;'>No.</div>
											<div class='fl bold' style='width:135px;'>NIP</div>
											<div class='fl bold' style='width:285px;'>Nama Dosen</div>
											<div class='fl bold' style='width:100px;'>Jabatan</div>
											<div class='fl bold' style='width:180px;'>Prodi</div>
											<div class='fl bold' style='width:;'>Actions</div>
											<div class='fix'></div>
										</div>										
										<div style='border:1px solid #ddd; border-bottom:0px;'></div>
										<div style='padding-bottom:2px;'></div>";
										
										// data
										while($rowList = mysql_fetch_array($hal_array["hasil"])){
											$depan=$rowList['titleDepan'];
											$blkng=$rowList['titleBelakang'];
											if($depan!="" && $blkng!="") {
												$separator1=", ";
												$separator2=", ";
											}
											elseif($depan!="" && $blkng=="") {
												$separator1=", ";
												$separator2=" ";
											}
											elseif($depan=="" && $blkng!="") {
												$separator1=" ";
												$separator2=", ";
											}
											else {
												$separator1=" ";
												$separator2=" ";
											}
											$isi.="
											<div style='margin:2px 0;' class='hover'>
												<div class='fl kecil' style='width:30px;'>".$no."</div>
												<div class='fl kecil' style='width:135px;'>".$formatNIP->nipFormat($rowList['nip'])."</div>
												<div class='fl kecil' style='width:285px;'>".$rowList['namaPeg'].$separator2.$rowList['titleBelakang'].$separator1.$rowList['titleDepan']."</div>
												<div class='fl kecil' style='width:100px;'>".ucwords($rowList['namaPangkat'])." ".$rowList['syaratKUM']."</div>
												<div class='fl kecil' style='width:180px;'>".$rowList['namaUnitKerja']."</div>
												<div class='fl kecil' style='width:;'>
													<a href='?u=kepegawaian&act=edit&nip=".$rowList['nip']."' title='edit' alt='edit'><img src='./images/edit.png' width='16' height='16' border='0'></a>&nbsp;
													<a href='?u=kepegawaian&act=hapus&nip=".$rowList['nip']."' title='hapus' alt='hapus' onclick=\"return confirm('Anda Yakin?');\"><img src='./images/drop1.png' width='16' height='16' border='0'></a>&nbsp;
													<a href='?u=kepegawaian&act=detail&nip=".$rowList['nip']."' title='detail' alt='detail'><img src='./images/view.png' width='16' height='16' border='0'></a>
												</div>
												<div class='fix'></div>
											</div>";
											$no++;
										}
										/*
										$DB->executeQuery($sqlList);
										if($DB->rs()) {
											$isi.="
											<div style='padding-bottom:2px;'>
												<div class='fl bold' style='width:30px;'>No.</div>
												<div class='fl bold' style='width:135px;'>NIP</div>
												<div class='fl bold' style='width:285px;'>Nama Dosen</div>
												<div class='fl bold' style='width:100px;'>Jabatan</div>
												<div class='fl bold' style='width:180px;'>Prodi</div>
												<div class='fl bold' style='width:;'>Actions</div>
												<div class='fix'></div>
											</div>										
											<div style='border:1px solid #ddd; border-bottom:0px;'></div>
											<div style='padding-bottom:2px;'></div>";
											$no=1;
											while($rowList=$DB->getResult()) {
												$depan=$rowList['titleDepan'];
												$blkng=$rowList['titleBelakang'];
												if($depan!="" && $blkng!="") {
													$separator1=", ";
													$separator2=", ";
												}
												elseif($depan!="" && $blkng=="") {
													$separator1=", ";
													$separator2=" ";
												}
												elseif($depan=="" && $blkng!="") {
													$separator1=" ";
													$separator2=", ";
												}
												else {
													$separator1=" ";
													$separator2=" ";
												}
												$isi.="
												<div style='margin:2px 0;' class='hover'>
													<div class='fl kecil' style='width:30px;'>".$no."</div>
													<div class='fl kecil' style='width:135px;'>".$formatNIP->nipFormat($rowList['nip'])."</div>
													<div class='fl kecil' style='width:285px;'>".$rowList['namaPeg'].$separator2.$rowList['titleBelakang'].$separator1.$rowList['titleDepan']."</div>
													<div class='fl kecil' style='width:100px;'>".ucwords($rowList['namaPangkat'])." ".$rowList['syaratKUM']."</div>
													<div class='fl kecil' style='width:180px;'>".$rowList['namaUnitKerja']."</div>
													<div class='fl kecil' style='width:;'>
														<a href='?u=kepegawaian&act=edit&nip=".$rowList['nip']."' title='edit' alt='edit'><img src='./images/edit.png' width='16' height='16' border='0'></a>&nbsp;
														<a href='?u=kepegawaian&act=hapus&nip=".$rowList['nip']."' title='hapus' alt='hapus' onclick=\"return confirm('Anda Yakin?');\"><img src='./images/drop1.png' width='16' height='16' border='0'></a>&nbsp;
														<a href='?u=kepegawaian&act=detail&nip=".$rowList['nip']."' title='detail' alt='detail'><img src='./images/view.png' width='16' height='16' border='0'></a>
													</div>
													<div class='fix'></div>
												</div>";
												$no++;
											}
										}
										else {
											$isi.="
											<div style='text-align:center; margin:10px 0; color:red;'>Maaf, data yang anda cari tidak ditemukan dalam database kami.</div>";
										}
										*/
									}
									else {
										if(isset($_SESSION['urutkan'])) {
											if($_SESSION['urutkan']==1 || $_SESSION['urutkan']==0) {//not set and All	
												$sqlList="	SELECT Pg.titleDepan, Pg.namaPeg, Pg.titleBelakang, Pg.nip, Pg.totalKUM, P.namaPangkat, G.syaratKUM, U.namaUnitKerja 
															FROM peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U 
															WHERE Pg.nip=K.nip 
															AND K.idGolongan=G.idGolongan 
															AND K.kdUnitKerja=U.kdUnitKerja 
															AND G.idPangkat=P.idPangkat 
															AND K.active='1' 
															ORDER BY Pg.namaPeg ASC";
												
												$paging->setOption("tabel", "peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U");
												$paging->setOption("where", "WHERE Pg.nip=K.nip AND K.idGolongan=G.idGolongan AND K.kdUnitKerja=U.kdUnitKerja AND G.idPangkat=P.idPangkat AND K.active='1'");
												$paging->setOption("limit", "10");
												$paging->setOption("order", "ORDER BY Pg.namaPeg ASC");
											}
											elseif($_SESSION['urutkan']==2) {//alfabet
												$alfabet=str_split(strtoupper("abcdefghijklmnopqrstuvwxyz"));
												$idx=$_SESSION['by']-1;
												$huruf=$alfabet[$idx];
												if($huruf!="") {
													$sqlList="	SELECT Pg.titleDepan, Pg.namaPeg, Pg.titleBelakang, Pg.nip, Pg.totalKUM, P.namaPangkat, G.syaratKUM, U.namaUnitKerja 															
																FROM peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U 
																WHERE Pg.namaPeg LIKE '".$huruf."%' 
																AND Pg.nip=K.nip 
																AND K.idGolongan=G.idGolongan 
																AND K.kdUnitKerja=U.kdUnitKerja 
																AND G.idPangkat=P.idPangkat 
																AND K.active='1' 
																ORDER BY Pg.namaPeg ASC";
													
													$paging->setOption("tabel", "peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U");
													$paging->setOption("where", "WHERE Pg.namaPeg LIKE '".$huruf."%' AND Pg.nip=K.nip AND K.idGolongan=G.idGolongan AND K.kdUnitKerja=U.kdUnitKerja AND G.idPangkat=P.idPangkat AND K.active='1'");
													$paging->setOption("limit", "10");
													$paging->setOption("order", "ORDER BY Pg.namaPeg ASC");
												}
												else {
													$sqlList="SELECT nip FROM peg_pegawai WHERE nip='0'";
													
													$paging->setOption("tabel", "peg_pegawai");
													$paging->setOption("where", "WHERE nip='0'");
													$paging->setOption("limit", "10");
													$paging->setOption("order", "");
												}
											}
											elseif($_SESSION['urutkan']==3) {//Jabatan
												$sqlList="	SELECT Pg.titleDepan, Pg.namaPeg, Pg.titleBelakang, Pg.nip, Pg.totalKUM, P.namaPangkat, G.syaratKUM, U.namaUnitKerja 
															FROM peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U 
															WHERE Pg.nip=K.nip 
															AND K.idGolongan=G.idGolongan 
															AND K.kdUnitKerja=U.kdUnitKerja 
															AND G.idPangkat=P.idPangkat 
															AND K.active='1' 
															AND G.idPangkat='".$_SESSION['by']."' 
															ORDER BY Pg.namaPeg ASC";
												
												$paging->setOption("tabel", "peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U");
												$paging->setOption("where", "WHERE Pg.nip=K.nip AND K.idGolongan=G.idGolongan AND K.kdUnitKerja=U.kdUnitKerja AND G.idPangkat=P.idPangkat AND K.active='1' AND G.idPangkat='".$_SESSION['by']."'");
												$paging->setOption("limit", "10");
												$paging->setOption("order", "ORDER BY Pg.namaPeg ASC");
											}
											else {//Prodi
												$sqlList="	SELECT Pg.titleDepan, Pg.namaPeg, Pg.titleBelakang, Pg.nip, Pg.totalKUM, P.namaPangkat, G.syaratKUM, U.namaUnitKerja 
															FROM peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U 
															WHERE Pg.nip=K.nip 
															AND K.idGolongan=G.idGolongan 
															AND K.kdUnitKerja=U.kdUnitKerja 
															AND G.idPangkat=P.idPangkat 
															AND K.active='1' 
															AND K.kdUnitKerja='".$_SESSION['by']."' 
															ORDER BY Pg.namaPeg ASC";
												
												$paging->setOption("tabel", "peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U");
												$paging->setOption("where", "WHERE Pg.nip=K.nip AND K.idGolongan=G.idGolongan AND K.kdUnitKerja=U.kdUnitKerja AND G.idPangkat=P.idPangkat AND K.active='1' AND K.kdUnitKerja='".$_SESSION['by']."'");
												$paging->setOption("limit", "10");
												$paging->setOption("order", "ORDER BY Pg.namaPeg ASC");
											}
										}
										else {
											$sqlList="	SELECT Pg.titleDepan, Pg.namaPeg, Pg.titleBelakang, Pg.nip, Pg.totalKUM, P.namaPangkat, G.syaratKUM, U.namaUnitKerja 
														FROM peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U 
														WHERE Pg.nip=K.nip 
														AND K.idGolongan=G.idGolongan 
														AND K.kdUnitKerja=U.kdUnitKerja 
														AND G.idPangkat=P.idPangkat 
														AND K.active='1' 
														ORDER BY Pg.namaPeg ASC";
											
											$paging->setOption("tabel", "peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G, peg_unitkerja U");
											$paging->setOption("where", "WHERE Pg.nip=K.nip AND K.idGolongan=G.idGolongan AND K.kdUnitKerja=U.kdUnitKerja AND G.idPangkat=P.idPangkat AND K.active='1'");
											$paging->setOption("limit", "10");
											$paging->setOption("order", "ORDER BY Pg.namaPeg ASC");
										}
										/*
										//execute All Queries
										$DB->executeQuery($sqlList);
										if($DB->rs()) {
											$isi.="
											<div style='padding-bottom:2px;'>
												<div class='fl bold' style='width:30px;'>No.</div>
												<div class='fl bold' style='width:135px;'>NIP</div>
												<div class='fl bold' style='width:285px;'>Nama Dosen</div>
												<div class='fl bold' style='width:100px;'>Jabatan</div>
												<div class='fl bold' style='width:180px;'>Prodi</div>
												<div class='fl bold' style='width:;'>Actions</div>
												<div class='fix'></div>
											</div>										
											<div style='border:1px solid #ddd; border-bottom:0px;'></div>
											<div style='padding-bottom:2px;'></div>";
											$no=1;
											while($rowList=$DB->getResult()) {
												$depan=$rowList['titleDepan'];
												$blkng=$rowList['titleBelakang'];
												if($depan!="" && $blkng!="") {
													$separator1=", ";
													$separator2=", ";
												}
												elseif($depan!="" && $blkng=="") {
													$separator1=", ";
													$separator2=" ";
												}
												elseif($depan=="" && $blkng!="") {
													$separator1=" ";
													$separator2=", ";
												}
												else {
													$separator1=" ";
													$separator2=" ";
												}
												$isi.="
												<div style='margin:2px 0;' class='hover'>
													<div class='fl kecil' style='width:30px;'>".$no."</div>
													<div class='fl kecil' style='width:135px;'>".$formatNIP->nipFormat($rowList['nip'])."</div>
													<div class='fl kecil' style='width:285px;'>".$rowList['namaPeg'].$separator2.$rowList['titleBelakang'].$separator1.$rowList['titleDepan']."</div>
													<div class='fl kecil' style='width:100px;'>".ucwords($rowList['namaPangkat'])." ".$rowList['syaratKUM']."</div>
													<div class='fl kecil' style='width:180px;'>".$rowList['namaUnitKerja']."</div>
													<div class='fl kecil' style='width:;'>
														<a href='?u=kepegawaian&act=edit&nip=".$rowList['nip']."' title='edit' alt='edit'><img src='./images/edit.png' width='16' height='16' border='0'></a>&nbsp;
														<a href='?u=kepegawaian&act=hapus&nip=".$rowList['nip']."' title='hapus' alt='hapus' onclick=\"return confirm('Anda Yakin?');\"><img src='./images/drop1.png' width='16' height='16' border='0'></a>&nbsp;
														<a href='?u=kepegawaian&act=detail&nip=".$rowList['nip']."' title='detail' alt='detail'><img src='./images/view.png' width='16' height='16' border='0'></a>
													</div>
													<div class='fix'></div>
												</div>";
												$no++;
											}												
										}
										else {
											$isi.="
											<div style='text-align:center; margin:10px 0; color:red;'>Maaf, data yang anda cari tidak ditemukan dalam database kami.</div>";
										}*/
										
										$paging->setOption("page", $_REQUEST["page"]); // setup untuk ambil variable angka halaman (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
										$paging->setOption("web_url_page", "?u=kepegawaian&page="); // setup alamat url (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
										
										// optional setup
										$paging->setOption("adjacents", "5"); // tampil berapa angka ke kanan dan ke kiri nya, jika kita diposisi tengah halaman
										$paging->setOption("txt_prev", "&laquo; sebelumnya"); // mengubah text "prev" menjadi "sebelumnya"
										$paging->setOption("txt_next", "berikutnya &raquo;"); // mengubah text "next" menjadi "berikutnya"
										
										// generate hasil pagination
										$hal_array = $paging->build();
										
										// setup penomoran
										$no = $hal_array["start"] + 1;
										
										$isi.="
										<div style='padding-bottom:2px;'>
											<div class='fl bold' style='width:30px;'>No.</div>
											<div class='fl bold' style='width:135px;'>NIP</div>
											<div class='fl bold' style='width:285px;'>Nama Dosen</div>
											<div class='fl bold' style='width:100px;'>Jabatan</div>
											<div class='fl bold' style='width:180px;'>Prodi</div>
											<div class='fl bold' style='width:;'>Actions</div>
											<div class='fix'></div>
										</div>										
										<div style='border:1px solid #ddd; border-bottom:0px;'></div>
										<div style='padding-bottom:2px;'></div>";
										
										// data
										while($rowList = mysql_fetch_array($hal_array["hasil"])){
											$depan=$rowList['titleDepan'];
											$blkng=$rowList['titleBelakang'];
											if($depan!="" && $blkng!="") {
												$separator1=", ";
												$separator2=", ";
											}
											elseif($depan!="" && $blkng=="") {
												$separator1=", ";
												$separator2=" ";
											}
											elseif($depan=="" && $blkng!="") {
												$separator1=" ";
												$separator2=", ";
											}
											else {
												$separator1=" ";
												$separator2=" ";
											}
											$isi.="
											<div style='margin:2px 0;' class='hover'>
												<div class='fl kecil' style='width:30px;'>".$no."</div>
												<div class='fl kecil' style='width:135px;'>".$formatNIP->nipFormat($rowList['nip'])."</div>
												<div class='fl kecil' style='width:285px;'>".$rowList['namaPeg'].$separator2.$rowList['titleBelakang'].$separator1.$rowList['titleDepan']."</div>
												<div class='fl kecil' style='width:100px;'>".ucwords($rowList['namaPangkat'])." ".$rowList['syaratKUM']."</div>
												<div class='fl kecil' style='width:180px;'>".$rowList['namaUnitKerja']."</div>
												<div class='fl kecil' style='width:;'>
													<a href='?u=kepegawaian&act=edit&nip=".$rowList['nip']."' title='edit' alt='edit'><img src='./images/edit.png' width='16' height='16' border='0'></a>&nbsp;
													<a href='?u=kepegawaian&act=hapus&nip=".$rowList['nip']."' title='hapus' alt='hapus' onclick=\"return confirm('Anda Yakin?');\"><img src='./images/drop1.png' width='16' height='16' border='0'></a>&nbsp;
													<a href='?u=kepegawaian&act=detail&nip=".$rowList['nip']."' title='detail' alt='detail'><img src='./images/view.png' width='16' height='16' border='0'></a>
												</div>
												<div class='fix'></div>
											</div>";
											$no++;
										}
									}
									
								$isi.="
								</div>
								<div class='paging list2' style='text-align:center;'>
									<div style='margin-bottom:5px;'>Total ".$hal_array["total"]."</div>
									<div>".$hal_array["pagination"]."</div>
								</div>
							</div>
						</form>
					</div>";
	}
	$layout->setContent($isi);
	$layout->setNavigasi($nav);
	$layout->HTML_render();
?>