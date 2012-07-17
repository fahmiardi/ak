<?php	
	switch($_GET['act']) {
		case 'tambah':
			switch($_GET['do']) {
				case 'save':
					$noSeriKarpeg=$_POST['noSeriKarpeg'];
					$nip=$_POST['nip'];
					$namaPeg=$_POST['namaPeg'];
					$alamatPeg=$_POST['alamatPeg'];
					$jkPeg=$_POST['jkPeg'];
					$tmptLahir=$_POST['tmptLahir'];
					$tglLahir=$_POST['tglLahir'];
					$keahlian=$_POST['keahlian'];
					$TMTMasuk=$_POST['TMTMasuk'];
					$prodi=$_POST['prodi'];					
					$idGolongan=$_POST['idGolongan'];
					$TMTKepangkatan=$_POST['TMTKepangkatan'];
					$totalKUM=$_POST['totalKUM'];
					$pwd=$general->Encrypt($nip);
					$token=$general->createRandomToken();
					
					$sqlSave="	INSERT INTO peg_pegawai 
								VALUES (null,
										'".$noSeriKarpeg."',
										'".$nip."',
										'".$namaPeg."',
										'".$alamatPeg."',
										'".$jkPeg."',
										'".$tmptLahir."',
										'".$tglLahir."',
										'".$keahlian."',
										'".$TMTMasuk."',
										'".$totalKUM."',
										'".$prodi."')";
					$DB->executeQuery($sqlSave);
					if($DB->notNull()) {
						$sqlSave2="	INSERT INTO peg_kepangkatan 
									VALUES (null,
											'".$idGolongan."',
											'".$nip."',
											'".$prodi."',
											'".$TMTKepangkatan."',
											'".$totalKUM."',
											'1')";
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
								header("Location: ./page.php?u=kepegawaian");
							}
						}
					}
					break;
			}
			break;
		case 'edit':
			//
			break;
		case 'hapus':
			//
			break;
		case 'detail':	
			$nip=$_GET['nip'];
			
			$sqlDos="	SELECT Pg.noSeriKarpeg, Pg.nip, Pg.namaPeg, Pg.alamatPeg, Pg.jkPeg, Pg.tmptLahir, Pg.tglLahir, Pg.keahlian, Pg.TMTMasuk, 
							Uk.namaUnitKerja, K.idGolongan, Pg.totalKUM, K.TMTKepangkatan 
						FROM peg_pegawai Pg, peg_unitkerja Uk, peg_kepangkatan K 
						WHERE Pg.nip=K.nip 
						AND Pg.kdUnitKerja=Uk.kdUnitKerja 
						AND Pg.nip='".$nip."' 
						AND K.active='1'";
			$DB->executeQuery($sqlDos);
			if($DB->getRows()==1) {
				$rowDos=$DB->getResult();
				$isi.="
				<div class='cart' style='padding-bottom:0px;'>
					<div class='cart-isi'>
						<div style='text-align:center;font-weight:bold;'><u>".strtoupper($rowDos['namaPeg'])."</u></div>
						<div style='text-align:center;font-size:small;'>".$rowDos['nip']."</div>
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
							<div class='review-isi-value fl f-verdana'>".$general->formatTanggal2($rowDos['TMTMasuk'])."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Prodi</div>
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
							<div class='review-isi-head fl f-verdana'>Pangkat</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$AK->getPangkatYangDipilihString($rowDos['idGolongan'])." ".$AK->getSyaratKUMyangDipilih($rowDos['idGolongan'])."</div>
						</div>
						<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Golongan</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$kepegawaian->getGolonganString($rowDos['idGolongan'])."</div>
						</div>
						<div>
							<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>TMT Kepangkatan</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$general->formatTanggal2($rowDos['TMTKepangkatan'])."</div>						
						</div>
						<div>
							<div class='review-isi'>
							<div class='review-isi-head fl f-verdana'>Total KUM</div>
							<div class='review-isi-skat fl f-verdana'>:</div>
							<div class='review-isi-value fl f-verdana'>".$rowDos['totalKUM']."</div>						
						</div>
					</div>
				</div>
				";
			}
			break;
		default:
			$isi="	<div class='kategori'><span class='f-verdana'>Data Dosen</span></div>
					
					<div class='search'>
						<form action='#' method='post'>
							<input type='text' class='input cari'>&nbsp;<input type='submit' value='Cari Dosen' class='submit f-verdana'>
						</form>
					</div>
					
					<div class='fl left-content'>
						<form action='?u=kepegawaian&act=tambah&do=save' method='post'>
							<div class='tambah'><span>Tambah Baru</span></div>
							<div class='form-tambah'>
								<div class='f-verdana'>No. Seri Karpeg</div>
								<input type='text' name='noSeriKarpeg' class='input' style='width:300px;'><br />
								<span class='f-verdana'>(optional)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Nomor Induk Pegawai</div>
								<input type='text' name='nip' class='input' style='width:300px;'><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Nama Pegawai</div>
								<input type='text' name='namaPeg' class='input' style='width:300px;'><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Jenis Kelamin</div>
								<input type='radio' name='jkPeg' value='0'><span class='f-verdana'>Laki-Laki</span>&nbsp;&nbsp;<input type='radio' name='jkPeg' value='1'><span class='f-verdana'>Perempuan</span><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Tempat/Tanggal Lahir</div>
								<input type='text' name='tmptLahir' class='input' style='width:110px;'> / <input type='text' name='tglLahir' class='input' style='width:150px;'><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Keahlian</div>
								<input type='text' name='keahlian' class='input' style='width:300px;'><br />
								<span class='f-verdana'>(optional)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Prodi</div>";
								function display_prodi($parent, $level) {
									global $DB;
									$sqlShow="	SELECT kdUnitKerja, namaUnitKerja 
												FROM peg_unitkerja 
												WHERE parentId='".$parent."' 
												AND active='1'";
									$queryShow=mysql_query($sqlShow,$DB->opendb());
									if($queryShow!=null) {
										if(mysql_num_rows($queryShow)>0) {
											while($rowShow=mysql_fetch_array($queryShow)) {
												$j.="<option value='".$rowShow['kdUnitKerja']."'>".str_repeat("- ",$level).$rowShow['namaUnitKerja']."</option>";
												$j.=display_prodi($rowShow['kdUnitKerja'],$level+1);
											}
										}
									}
									return $j;
								}
								$isi.="
								<select class='form-select' style='height:30px; width:150px;' name='prodi'>
									<option value='0'>Pilih</option>".display_prodi(0,0)."
								</select><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>TMT Masuk</div>
								<input type='text' name='TMTMasuk' class='input' style='width:150px;'><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Alamat Pegawai</div>
								<textarea class='input' style='width:300px; height:100px;' name='alamatPeg'></textarea><br />
								<span class='f-verdana'>(optional)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Pangkat</div>
								<select class='form-select' style='height:30px; width:150px;' name='idGolongan'>
									<option value='0'>Pilih</option>";
									$sqlPangkat="	SELECT G.idGolongan, G.syaratKUM, P.namaPangkat 
													FROM pang_pangkat P, pang_golongan G 
													WHERE P.idPangkat=G.idPangkat";
									$DB->executeQuery($sqlPangkat);
									if($DB->rs()) {
										while($rowPangkat=$DB->getResult()) {
											$isi.="<option value='".$rowPangkat[idGolongan]."'>".strtoupper($rowPangkat['namaPangkat']." ".$rowPangkat['syaratKUM'])."</option>";
										}
									}
								$isi.="
								</select><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>TMT Kepangkatan</div>
								<input type='text' name='TMTKepangkatan' class='input' style='width:150px;'><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>KUM yang Dimiliki</div>
								<input type='text' name='totalKUM' class='input' style='width:100px;'><br />
								<span class='f-verdana'>(required)</span>
							</div>
							<div style='text-align:right;'><input type='submit' class='submit' value='Tambahkan'></div>
						</form>
					</div>
					
					<div class='right-content'>
						<form action='#' method='post'>
							<div class='actions'>
								<select class='form-select' style='height:30px; width:150px;'>
									<option value='0'>Actions</option>
									<option value='1'>Hapus</option>
								</select>&nbsp;
								<input type='submit' class='submit' value='Apply'>
							</div>
							<div class='show'>
								<div class='show-head'>
									<div class='show-name f-verdana'>List Dosen</div>
								</div>									
								<div class='list'>";				
									$sqlList="	SELECT Pg.namaPeg, Pg.nip, Pg.totalKUM, P.namaPangkat, G.syaratKUM 									
												FROM peg_pegawai Pg, pang_pangkat P, peg_kepangkatan K, pang_golongan G 
												WHERE Pg.nip=K.nip 
												AND K.idGolongan=G.idGolongan 
												AND G.idPangkat=P.idPangkat 
												AND K.active='1' 
												ORDER BY G.rankingGolongan ASC";
									$DB->executeQuery($sqlList);
									if($DB->rs()) {
										$isi.="
										<div style='overflow:auto;padding-bottom:2px;'>
											<div class='fl kecil' style='width:25px;'>&nbsp;</div>
											<div class='fl kecil bold' style='width:110px;'>NIP</div>
											<div class='fl kecil bold' style='width:195px;'>Nama Dosen</div>
											<div class='kecil bold' style='margin-left:330px;'>Jabatan</div>
										</div>
										<div style='border:1px solid #ddd; border-bottom:0px;'></div>
										<div style='padding-bottom:2px;'></div>
										";
										while($rowList=$DB->getResult()) {
											$isi.="
											<div style='overflow:auto; padding-bottom:2px;'>
												<div class='fl kecil' style='width:25px;'><input type='checkbox'></div>
												<div class='fl kecil' style='width:110px;'>".$rowList['nip']."</div>
												<div class='fl kecil' style='width:195px;'>".$rowList['namaPeg']."</div>
												<div class='kecil' style='margin-left:330px;'>".ucwords($rowList['namaPangkat'])." ".$rowList['syaratKUM']."</div>
											</div>";	
										}
									}
								$isi.="
								</div>									
							</div>
							<div class='actions'>
								<select class='form-select' style='height:30px; width:150px;'>
									<option value='0'>Actions</option>
									<option value='1'>Hapus</option>
								</select>&nbsp;
								<input type='submit' class='submit' value='Apply'>
							</div>
						</form>
					</div>";
	}
	$layout->setContent($isi);
	$layout->HTML_render();
?>