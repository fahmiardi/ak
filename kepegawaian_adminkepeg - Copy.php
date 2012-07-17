<?php
	$u['u=kepegawaian']="kepegawaian";
	//Halaman Untuk Admin Kepegawaian
	if($user->getLevel()==2) {
		$mContent=array("tambah"=>array("?u=kepegawaian&act=tambah"=>array("add.png"=>"")));		
		switch($_GET['act']) {
			case 'tambah':
				switch($_GET['do']) {
					case 'save':
						if(isset($_POST['save'])) {
							$noSeriKarpeg=$_POST['noSeriKarpeg'];
							$nip=$_POST['nip'];
							$namaPeg=$_POST['namaPeg'];
							$alamatPeg=$_POST['alamatPeg'];
							$jkPeg=$_POST['jkPeg'];
							$tmptLahir=$_POST['tmptLahir'];
							$tglLahir=$_POST['thnLahir']."-".$_POST['blnLahir']."-".$_POST['tglLahir'];
							$keahlian=$_POST['keahlian'];
							$idGolongan=$_POST['idGolongan'];
							$tmtPangkat=$_POST['thnTmtPangkat']."-".$_POST['blnTmtPangkat']."-".$_POST['tglTmtPangkat'];
							$kum=$_POST['kum'];
							$idJabatan=$_POST['idJabatan'];
							$tmtJabatan=$_POST['thnTmtJabatan']."-".$_POST['blnTmtJabatan']."-".$_POST['tglTmtJabatan'];
							$idPendidikan=$_POST['idPendidikan'];
							
							$sqlSave="	INSERT INTO tbl_pegawai 
										VALUES(	'$noSeriKarpeg','$nip','$namaPeg','$alamatPeg','$jkPeg',
												'$tmptLahir','$tglLahir','$keahlian','$tmtPangkat','$tmtJabatan',
												'$kum','','$idGolongan','$idJabatan','1','$idPendidikan')";
							$DB->executeQuery($sqlSave);
							if($DB->notNull()) {
								$pw=$general->Encrypt($nip);
								$sqlUpdate="INSERT INTO tbl_user VALUES ('','$nip','$pw','zzz','3')";
								$DB->executeQuery($sqlUpdate);
								if($DB->notNull()) {
									header("Location: ./page.php?u=kepegawaian&save=sukses");
								}
							}
							else {
								header("Location: ./page.php?u=kepegawaian&save=gagal");
							}
						}
						break;
					case 'cancel':
						header("Location: ./page.php?u=$_GET[u]");
						break;
					default:	
						$mContent=array("cancel"=>array("?u=kepegawaian&act=tambah&do=cancel"=>array("cancel.png"=>"")),
										"save"=>array("?u=kepegawaian&act=tambah&do=save"=>array("save.png"=>""))
										);
						$u['&act=tambah']="form input";
						$isi.="
						<form action='?u=kepegawaian&act=tambah&do=save' method='post'>
							<table cellpadding='2' cellspacing='0' style='text-align:left;margin-top:20px;'>
								<tr>
									<td id='input-header'>Nomor Seri Karpeg</td>
									<td><input type='text' id='noSeriKarpeg' name='noSeriKarpeg'></td>
								</tr>
								<tr>
									<td id='input-header'>Nomor Induk Pegawai</td>
									<td><input type='text' id='nip' name='nip'></td>
								</tr>
								<tr>
									<td id='input-header'>Nama Pegawai</td>
									<td><input type='text' id='namaPeg' name='namaPeg'></td>
								</tr>
								<tr>
									<td id='input-header' style='vertical-align:top;'>Alamat Pegawai</td>
									<td><textarea id='alamatPeg' name='alamatPeg'></textarea></td>
								</tr>
								<tr>
									<td id='input-header'>Jenis Kelamin</td>
									<td><input type='radio' name='jkPeg' id='jkPeg' value='0'>Laki-laki&nbsp;<input type='radio' name='jkPeg' value='1'>Perempuan</td>
								</tr>
								<tr>
									<td id='input-header'>Tempat, Tanggal Lahir</td>
									<td>
										<input type='text' id='tmptLahir' name='tmptLahir'>,&nbsp;
										<select name='tglLahir'>
											<option value=''>--tgl--</option>";
											for($i=1; $i<=31; $i++) {
												$isi.="<option value='$i'>$i</option>";
											}
										$isi.="
										</select>
										<select name='blnLahir'>
											<option value=''>--bln--</option>";
											$arrayBln=array("01"=>"Januari","02"=>"Pebruari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni",
															"07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember",);
											foreach($arrayBln as $bln=>$blnTxt) {
												$isi.="<option value='$bln'>$blnTxt</option>";
											}
										$isi.="
										</select>
										<select name='thnLahir'>
											<option value=''>--thn--</option>";
											$now=date('Y');
											for($th=1950; $th<=$now-20; $th++) {
												$isi.="<option value='$th'>$th</option>";
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Keahlian</td>
									<td><input type='text' id='keahlian' name='keahlian'></td>
								</tr>
								<tr>
									<td id='input-header'>Pangkat</td>
									<td>									
										<select name='idGolongan' id='idGolongan'>
											<option value=''></option>";
											$sqlPangkat="	SELECT G.idGolongan, G.syaratKUM, P.namaPangkat 
															FROM tbl_pangkat P, tbl_golongan G 
															WHERE P.idPangkat=G.idPangkat";
											$DB->executeQuery($sqlPangkat);
											if($DB->rs()) {
												while($rowPangkat=$DB->getResult()) {
													$isi.="<option value='$rowPangkat[idGolongan]'>".strtoupper($rowPangkat[namaPangkat]." ".$rowPangkat[syaratKUM])."</option>";
												}
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>TMT Pangkat</td>
									<td>
										<select name='tglTmtPangkat'>
											<option value=''>--tgl--</option>";
											for($i=1; $i<=31; $i++) {
												$isi.="<option value='$i'>$i</option>";
											}
										$isi.="
										</select>
										<select name='blnTmtPangkat'>
											<option value=''>--bln--</option>";
											$arrayBln=array("01"=>"Januari","02"=>"Pebruari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni",
															"07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember",);
											foreach($arrayBln as $bln=>$blnTxt) {
												$isi.="<option value='$bln'>$blnTxt</option>";
											}
										$isi.="
										</select>
										<select name='thnTmtPangkat'>
											<option value=''>--thn--</option>";
											$now=date('Y');
											for($th=$now-10; $th<=$now; $th++) {
												$isi.="<option value='$th'>$th</option>";
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Total KUM</td>
									<td><input type='text' id='kum' name='kum' value='$rowEdit[oldKUM]'></td>
								</tr>
								<tr>
									<td id='input-header'>Jabatan</td>
									<td>
										<select name='idJabatan'>
											<option value=''></option>";
											$sqlJab="	SELECT * 
														FROM tbl_jabatan";
											$DB->executeQuery($sqlJab);
											if($DB->rs()) {
												while($rowJab=$DB->getResult()) {
													$isi.="<option value='$rowJab[idJabatan]'>".strtoupper($rowJab[namaJabatan])."</option>";
												}
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>TMT Jabatan</td>
									<td>
										<select name='tglTmtJabatan'>
											<option value=''>--tgl--</option>";
											for($i=1; $i<=31; $i++) {
												$isi.="<option value='$i'>$i</option>";
											}
										$isi.="
										</select>
										<select name='blnTmtJabatan'>
											<option value=''>--bln--</option>";
											$arrayBln=array("01"=>"Januari","02"=>"Pebruari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni",
															"07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember",);
											foreach($arrayBln as $bln=>$blnTxt) {
												$isi.="<option value='$bln'>$blnTxt</option>";
											}
										$isi.="
										</select>
										<select name='thnTmtJabatan'>
											<option value=''>--thn--</option>";
											$now=date('Y');
											for($th=$now-10; $th<=$now; $th++) {
												$isi.="<option value='$th'>$th</option>";
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Pendidikan</td>
									<td>
										<select name='idPendidikan'>
											<option value=''></option>";
											$arrPend=array("1"=>"S1", "2"=>"S2", "3"=>"S3");
											foreach($arrPend as $kod=>$jenjang) {
												$isi.="<option value='$kod'>$jenjang</option>";
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Unit Kerja</td>
									<td>";
										$sqlUnit="	SELECT namaFakultas 
													FROM tbl_fakultas 
													WHERE active='1'";
										$DB->executeQuery($sqlUnit);
										if($DB->rs()) {
											if($DB->getRows()==1) {
												$rowUnit=$DB->getResult();
												$isi.=$rowUnit['namaFakultas'];
											}
										}
									$isi.="
									</td>
								</tr>
								<tr>
									<td colspan='2' style='text-align:right;'><input type='submit' name='save' value='Save'></td>
								</tr>
							</table>
						</form>
						";
				}			
				break;
			case 'edit':
				switch($_GET['do']) {
					case 'update':
						if(isset($_POST['update'])) {
							$nip=$_POST['nip'];
							$namaPeg=$_POST['namaPeg'];
							$alamatPeg=$_POST['alamatPeg'];
							$jkPeg=$_POST['jkPeg'];
							$tmptLahir=$_POST['tmptLahir'];
							$tglLahir=$_POST['thnLahir']."-".$_POST['blnLahir']."-".$_POST['tglLahir'];
							$keahlian=$_POST['keahlian'];
							$idGolongan=$_POST['idGolongan'];
							$tmtPangkat=$_POST['thnTmtPangkat']."-".$_POST['blnTmtPangkat']."-".$_POST['tglTmtPangkat'];
							$idJabatan=$_POST['idJabatan'];
							$tmtJabatan=$_POST['thnTmtJabatan']."-".$_POST['blnTmtJabatan']."-".$_POST['tglTmtJabatan'];
							$idPendidikan=$_POST['idPendidikan'];
							
							$sqlUpdate="UPDATE tbl_pegawai 
										SET namaPeg='$namaPeg', 
											alamatPeg='$alamatPeg', 
											jkPeg='$jkPeg', 
											tmptLahir='$tmptLahir', 
											tglLahir='$tglLahir', 
											keahlian='$keahlian', 
											idGolongan='$idGolongan', 
											TMTPangkat='$tmtPangkat', 
											idJabatan='$idJabatan', 
											tmtJabatan='$tmtJabatan', 
											idPendidikan='$idPendidikan' 
										WHERE nip='$nip'";
							$DB->executeQuery($sqlUpdate);
							if($DB->notNull()) {
								header("Location: ./page.php?u=kepegawaian&update=sukses");
							}
							else {
								header("Location: ./page.php?u=kepegawaian&update=gagal");
							}
						}
						break;
					case 'cancel':
						header("Location: ./page.php?u=$_GET[u]");
						break;
					default:
						$mContent=array("cancel"=>array("?u=kepegawaian&act=edit&do=cancel"=>array("cancel.png"=>"")),
										"update"=>array("?u=kepegawaian&act=edit&do=update"=>array("update.png"=>""))
										);
						$nip=$_GET['nip'];
						$sqlEdit="SELECT * FROM tbl_pegawai WHERE nip='$nip'";
						$DB->executeQuery($sqlEdit);
						if($DB->rs()) {
							if($DB->getRows()==1) {
								$rowEdit=$DB->getResult();
							}
						}
						
						$u["&act=edit&nip=$nip"]="form edit";
						$isi.="
						<form action='?u=kepegawaian&act=edit&do=update' method='post'>
							<table cellpadding='2' cellspacing='0' style='text-align:left;margin-top:20px;'>
								<tr>
									<td id='input-header'>Nomor Seri Karpeg</td>
									<td>$rowEdit[noSeriKarpeg]</td>
								</tr>
								<tr>
									<td id='input-header'>Nomor Induk Pegawai</td>
									<td>$rowEdit[nip]<input type='hidden' name='nip' value='$rowEdit[nip]'></td>
								</tr>
								<tr>
									<td id='input-header'>Nama Pegawai</td>
									<td><input type='text' id='namaPeg' name='namaPeg' value='$rowEdit[namaPeg]'></td>
								</tr>
								<tr>
									<td id='input-header' style='vertical-align:top;'>Alamat Pegawai</td>
									<td><textarea id='alamatPeg' name='alamatPeg'>$rowEdit[alamatPeg]</textarea></td>
								</tr>
								<tr>
									<td id='input-header'>Jenis Kelamin</td>
									<td>";
										if($rowEdit['jkPeg']==0) {
											$isi.="
											<input type='radio' name='jkPeg' id='jkPeg' value='0' checked='checked'>Laki-laki&nbsp;
											<input type='radio' name='jkPeg' value='1'>Perempuan";
										}
										else {
											$isi.="
											<input type='radio' name='jkPeg' id='jkPeg' value='0'>Laki-laki&nbsp;
											<input type='radio' name='jkPeg' value='1'  checked='checked'>Perempuan";
										}
									$isi.="	
									</td>
								</tr>
								<tr>
									<td id='input-header'>Tempat, Tanggal Lahir</td>
									<td>
										<input type='text' id='tmptLahir' name='tmptLahir' value='$rowEdit[tmptLahir]'>,&nbsp;
										<select name='tglLahir'>
											<option value=''>--tgl--</option>";										
											$tgl=explode("-",$rowEdit['tglLahir']);
											for($i=1; $i<=31; $i++) {
												if($i==$tgl[2]) {
													$isi.="<option value='$i' selected='selected'>$i</option>";
												}
												else {
													$isi.="<option value='$i'>$i</option>";
												}											
											}
										$isi.="
										</select>
										<select name='blnLahir'>
											<option value=''>--bln--</option>";
											$arrayBln=array("01"=>"Januari","02"=>"Pebruari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni",
															"07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember",);
											foreach($arrayBln as $bln=>$blnTxt) {
												if($tgl[1]==$bln) {
													$isi.="<option value='$bln' selected='selected'>$blnTxt</option>";
												}
												else {
													$isi.="<option value='$bln'>$blnTxt</option>";
												}											
											}
										$isi.="
										</select>
										<select name='thnLahir'>
											<option value=''>--thn--</option>";
											$now=date('Y');
											for($th=1950; $th<=$now-20; $th++) {
												if($tgl[0]==$th) {
													$isi.="<option value='$th' selected='selected'>$th</option>";
												}											
												else {
													$isi.="<option value='$th'>$th</option>";
												}											
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Keahlian</td>
									<td><input type='text' id='keahlian' name='keahlian' value='$rowEdit[keahlian]'></td>
								</tr>
								<tr>
									<td id='input-header'>Pangkat</td>
									<td>									
										<select name='idGolongan' id='idGolongan'>
											<option value=''></option>";
											$sqlPangkat="	SELECT G.idGolongan, G.syaratKUM, P.namaPangkat 
															FROM tbl_pangkat P, tbl_golongan G 
															WHERE P.idPangkat=G.idPangkat 
															ORDER BY ranking ASC";
											$DB->executeQuery($sqlPangkat);
											if($DB->rs()) {
												while($rowPangkat=$DB->getResult()) {
													if($rowEdit['idGolongan']==$rowPangkat['idGolongan']) {
														$isi.="<option value='$rowPangkat[idGolongan]' selected='selected'>".strtoupper($rowPangkat[namaPangkat]." ".$rowPangkat[syaratKUM])."</option>";
													}
													else {
														$isi.="<option value='$rowPangkat[idGolongan]'>".strtoupper($rowPangkat[namaPangkat]." ".$rowPangkat[syaratKUM])."</option>";
													}													
												}
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>TMT Pangkat</td>
									<td>
										<select name='tglTmtPangkat'>
											<option value=''>--tgl--</option>";
											$tglTmtPangkat=explode("-",$rowEdit['TMTPangkat']);
											for($i=1; $i<=31; $i++) {
												if($i==$tglTmtPangkat[2]) {
													$isi.="<option value='$i' selected='selected'>$i</option>";
												}
												else {
													$isi.="<option value='$i'>$i</option>";
												}											
											}
										$isi.="
										</select>
										<select name='blnTmtPangkat'>
											<option value=''>--bln--</option>";
											$arrayBln=array("01"=>"Januari","02"=>"Pebruari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni",
															"07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember",);
											foreach($arrayBln as $bln=>$blnTxt) {
												if($bln==$tglTmtPangkat[1]) {
													$isi.="<option value='$bln' selected='selected'>$blnTxt</option>";
												}
												else {
													$isi.="<option value='$bln'>$blnTxt</option>";
												}											
											}
										$isi.="
										</select>
										<select name='thnTmtPangkat'>
											<option value=''>--thn--</option>";
											$now=date('Y');
											for($th=$now-10; $th<=$now; $th++) {
												if($th==$tglTmtPangkat[0]) {
													$isi.="<option value='$th' selected='selected'>$th</option>";
												}
												else {
													$isi.="<option value='$th'>$th</option>";
												}											
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Total KUM</td>
									<td>$rowEdit[oldKUM]</td>
								</tr>
								<tr>
									<td id='input-header'>Jabatan</td>
									<td>
										<select name='idJabatan'>
											<option value=''></option>";
											$sqlJab="	SELECT * 
														FROM tbl_jabatan";
											$DB->executeQuery($sqlJab);
											if($DB->rs()) {											
												while($rowJab=$DB->getResult()) {
													if($rowEdit['idJabatan']==$rowJab['idJabatan']) {
														$isi.="<option value='$rowJab[idJabatan]' selected='selected'>".strtoupper($rowJab[namaJabatan])."</option>";
													}
													else {
														$isi.="<option value='$rowJab[idJabatan]'>".strtoupper($rowJab[namaJabatan])."</option>";
													}													
												}											
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>TMT Jabatan</td>
									<td>
										<select name='tglTmtJabatan'>
											<option value=''>--tgl--</option>";
											$tglTmtJabatan=explode("-",$rowEdit['TMTJabatan']);
											for($i=1; $i<=31; $i++) {
												if($i==$tglTmtJabatan[2]) {
													$isi.="<option value='$i' selected='selected'>$i</option>";
												}
												else {
													$isi.="<option value='$i'>$i</option>";
												}											
											}
										$isi.="
										</select>
										<select name='blnTmtJabatan'>
											<option value=''>--bln--</option>";
											$arrayBln=array("01"=>"Januari","02"=>"Pebruari","03"=>"Maret","04"=>"April","05"=>"Mei","06"=>"Juni",
															"07"=>"Juli","08"=>"Agustus","09"=>"September","10"=>"Oktober","11"=>"Nopember","12"=>"Desember",);
											foreach($arrayBln as $bln=>$blnTxt) {
												if($bln==$tglTmtJabatan[1]) {
													$isi.="<option value='$bln' selected='selected'>$blnTxt</option>";
												}
												else {
													$isi.="<option value='$bln'>$blnTxt</option>";
												}											
											}
										$isi.="
										</select>
										<select name='thnTmtJabatan'>
											<option value=''>--thn--</option>";
											$now=date('Y');
											for($th=$now-10; $th<=$now; $th++) {
												if($th==$tglTmtJabatan[0]) {
													$isi.="<option value='$th' selected='selected'>$th</option>";
												}
												else {
													$isi.="<option value='$th'>$th</option>";
												}											
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Pendidikan</td>
									<td>
										<select name='idPendidikan'>
											<option value=''></option>";
											$arrPend=array("1"=>"S1", "2"=>"S2", "3"=>"S3");
											foreach($arrPend as $kod=>$jenjang) {
												if($kod==$rowEdit['idPendidikan']) {
													$isi.="<option value='$kod' selected='selected'>$jenjang</option>";
												}
												else {
													$isi.="<option value='$kod'>$jenjang</option>";
												}											
											}
										$isi.="
										</select>
									</td>
								</tr>
								<tr>
									<td id='input-header'>Unit Kerja</td>
									<td>";
										$sqlUnit="	SELECT namaFakultas 
													FROM tbl_fakultas 
													WHERE active='1'";
										$DB->executeQuery($sqlUnit);
										if($DB->rs()) {
											if($DB->getRows()==1) {
												$rowUnit=$DB->getResult();
												$isi.=$rowUnit['namaFakultas'];
											}
										}
									$isi.="
									</td>
								</tr>
								<tr>
									<td colspan='2' style='text-align:right;'><input type='submit' name='update' value='Update'></td>
								</tr>
							</table>
						</form>
						";
				}
				break;
			case 'hapus':
				if(isset($_GET['act'])&&$_GET['nip']) {
					$nip=$_GET['nip'];
					$sqlHapus="DELETE FROM tbl_pegawai WHERE nip='$nip'";
					$DB->executeQuery($sqlHapus);
					if($DB->notNull()) {
						header("Location: ./page.php?u=kepegawaian");
					}
				}
				break;
			case 'detail':
				$mContent=array("cancel"=>array("?u=kepegawaian"=>array("cancel.png"=>"")),
								"cetak"=>array("#?u=kepegawaian&act=cetak&do=pdf"=>array("pdf.png"=>"")),
								);			
				$nip=$_GET['nip'];
				$u["&act=detail&nip=$nip"]="detail";
				$sqlDet="SELECT * FROM tbl_pegawai WHERE nip='$nip'";
				$DB->executeQuery($sqlDet);
				if($DB->rs()) {
					if($DB->getRows()==1) {
						$rowDet=$DB->getResult();
					}
				}
				$isi="
				<table cellpadding='4' cellspacing='1' border='1'>
					<tr>
						<td>
							<table cellpadding='0' cellspacing='0' style='text-align:center;'>
								<tr>
									<td>
										<div><u><b>$rowDet[namaPeg]</b></u></div>
										<div>NIP. $rowDet[nip]</div>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<table cellpadding='2' cellspacing='0' style='text-align:left;'>
								<tr>
									<td width='220'>Nomor Seri Karpeg</td>
									<td width='7'>:</td>
									<td>$rowDet[noSeriKarpeg]</td>
								</tr>
								<tr>
									<td style='vertical-align:top;'>Alamat</td>
									<td>:</td>
									<td>$rowDet[alamatPeg]</td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>";
									if($rowDet['jkPeg']==0) {
										$jk="Laki-laki";
									}
									else {
										$jk="Perempuan";
									}
									$isi.="
									<td>$jk</td>
								</tr>
								<tr>
									<td>Tempat, Tanggal Lahir</td>
									<td>:</td>
									<td>$rowDet[tmptLahir], ".$general->formatTanggal2($rowDet['tglLahir'])."</td>
								</tr>
								<tr>
									<td style='vertical-align:top;'>Keahlian</td>
									<td>:</td>
									<td>$rowDet[keahlian]</td>
								</tr>
								<tr>
									<td>Pangkat</td>
									<td>:</td>
									<td>";
										$sqlPang="	SELECT G.syaratKUM, H.namaGolHuruf, A.namaGolAngka, P.namaPangkat 
													FROM tbl_golongan G, tbl_pangkat P, tbl_golhuruf H, tbl_golangka A, tbl_pegawai C 
													WHERE C.nip='$rowDet[nip]' 
													AND C.idGolongan=G.idGolongan 
													AND G.idPangkat=P.idPangkat 
													AND G.idGolHuruf=H.idGolHuruf 
													AND G.idGolAngka=A.idGolAngka";
										$DB->executeQuery($sqlPang);
										if($DB->rs()) {
											if($DB->getRows()==1) {
												$rowPang=$DB->getResult();
												$isi.=strtoupper($rowPang['namaPangkat'])." ".$rowPang['syaratKUM']." / ".$rowPang['namaGolAngka']."".$rowPang['namaGolHuruf'];
											}
										}
									$isi.="
									</td>
								</tr>
								<tr>
									<td>TMT Pangkat</td>
									<td>:</td>
									<td>".$general->formatTanggal2($rowDet['TMTPangkat'])."</td>
								</tr>
								<tr>
									<td>Total KUM</td>
									<td>:</td>
									<td>$rowDet[oldKUM]</td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>:</td>
									<td>";
										$sqlJab="SELECT namaJabatan FROM tbl_jabatan WHERE idJabatan='$rowDet[idJabatan]'";
										$DB->executeQuery($sqlJab);
										if($DB->rs()) {
											if($DB->getRows()==1) {
												$rowJab=$DB->getResult();
												$isi.=strtoupper($rowJab['namaJabatan']);
											}
										}
									$isi.="
									</td>
								</tr>
								<tr>
									<td>TMT Jabatan</td>
									<td>:</td>
									<td>".$general->formatTanggal2($rowDet['TMTJabatan'])."</td>
								</tr>
								<tr>
									<td>Pendidikan</td>
									<td>:</td>
									<td>";
									$sqlPend="SELECT namaPendidikan FROM tbl_pendidikan WHERE idPendidikan='$rowDet[idPendidikan]'";
									$DB->executeQuery($sqlPend);
									if($DB->rs()) {
										if($DB->getRows()==1) {
											$rowPend=$DB->getResult();
											$isi.=$rowPend['namaPendidikan'];
										}
									}
									$isi.="
									</td>
								</tr>
								<tr>
									<td>Unit Kerja</td>
									<td>:</td>
									<td>";
									$sqlUnit="	SELECT namaFakultas 
												FROM tbl_fakultas 
												WHERE active='1'";
									$DB->executeQuery($sqlUnit);
									if($DB->rs()) {
										if($DB->getRows()==1) {
											$rowUnit=$DB->getResult();
											$isi.=$rowUnit['namaFakultas'];
										}
									}
									$isi.="
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				";
				break;
			default:
				$isi="
				<form action='?u=kepegawaian' method='post'>
				<table cellpadding='1' cellspacing='2' style='text-align:left;' bgcolor='#f5f0f0'>
					<tr bgcolor='#f5f0f0'>
						<td colspan='6' style='padding-bottom:10px;' style='padding-bottom:10px;'>
							<input type='text' value='NIP' onblur=\"if(this.value=='') this.value='NIP';\" onfocus=\"if(this.value=='NIP') this.value='';\"><input type='submit' value='Cari'>";
							$save=$_GET['save'];
							$update=$_GET['update'];
							if($save!="") {
								if($save=="sukses") {
									$isi.="&nbsp;&nbsp;<span>Proses simpan berhasil.</span>";
								}
								else {
									$isi.="&nbsp;&nbsp;<span>Proses simpan gagal.</span>";
								}
							}	
							if($update!="") {
								if($update=="sukses") {
									$isi.="&nbsp;&nbsp;<span>Proses update berhasil.</span>";
								}
								else {
									$isi.="&nbsp;&nbsp;<span>Proses update gagal.</span>";
								}
							}
						$isi.="
						</td>
					</tr>
					<tr bgcolor='#9ace9d' height='25'>
						<th width='21'></th>
						<th width='35'>No.</th>
						<th width='180'>Nomor Induk Pegawai</th>
						<th width='230'>Nama Pegawai</th>
						<th width='100'>Jenis Kelamin</th>
						<th>Action</th>
					</tr>";
					$sqlShow="	SELECT nip, namaPeg, jkPeg 
								FROM tbl_pegawai";
					$DB->executeQuery($sqlShow);
					if($DB->rs()) {
						$no=1;
						while($rowShow=$DB->getResult()) {
							$isi.="
							<tr bgcolor='#d2f7ce'>
								<td><input type='checkbox' id='mark[]' name='mark[]'></td>
								<td>$no</td>
								<td>$rowShow[nip]</td>
								<td>$rowShow[namaPeg]</td>";							
								if($rowShow['jkPeg']==0) {
									$jk="L";
								}
								else {
									$jk="P";
								}
								$isi.="
								<td style='text-align:center;'>$jk</td>
								<td>
									<a href='?u=kepegawaian&act=detail&nip=$rowShow[nip]' title='Detail'>
										<img src='./images/view.png' width='16' height='16' border='0'>
									</a>&nbsp;
									<a href='?u=kepegawaian&act=edit&nip=$rowShow[nip]' title='Edit'>
										<img src='./images/edit.png' width='16' height='16' border='0'>
									</a>&nbsp;
									<a href='?u=kepegawaian&act=hapus&nip=$rowShow[nip]' title='Hapus' onclick='return confirm(\"Anda Yakin?\");'>
										<img src='./images/drop.png' width='16' height='16' border='0'>
									</a>
								</td>
							</tr>";
							$no++;
						}
					}
					$isi.="
					<tr bgcolor='' height='25'>
						<td colspan='6'>
							<div>
								<div style='float:left;'><img src='./images/arrow.png' width='38' height='22'></div>
								<div style='float:left;font-size:small;padding:2px 10px 0 0;'><a href='#checkall' alt='Check All' title='Check All'>Check All</a> / <a href='#uncheckall' alt='Uncheck All' title='Uncheck All'>Uncheck All</a></div>
								<div style='float:left;font-size:small;font-style:italic;padding:2px 10px 0 0;'>With Selected:</div>
								<div style='float:left;padding-top:2px;'>
									<img src='./images/drop.png' width='16' height='16'>&nbsp;&nbsp;								
									<input type='submit' name='paging' value='Show'> <input type='text' name='page' id='page' value='30' size='5'>								
									</div>
							</div>
						</td>
					</tr>
				</table>
				</form>
				";
		}
	}
	//Halaman Untuk Dosen
	elseif($user->getLevel()==3) {
		$nip=$user->getNip();
		$mContent=array(
						"cetak"=>array("#?u=kepegawaian&act=cetak&do=pdf"=>array("pdf.png"=>"")),
						);	
		$u["&act=detail&nip=$nip"]="detail";
		$sqlDet="SELECT * FROM peg_pegawai WHERE nip='$nip'";
		$DB->executeQuery($sqlDet);
		if($DB->rs()) {
			if($DB->getRows()==1) {
				$rowDet=$DB->getResult();
			}
		}
		$isi="
		<table cellpadding='4' cellspacing='1' bgcolor='#f5f0f0'>
			<tr bgcolor='#9ace9d'>
				<td>
					<table cellpadding='0' cellspacing='0' style='text-align:center;' bgcolor='#f5f0f0'>
						<tr  bgcolor='#d2f7ce'>
							<td>
								<div><u><b>$rowDet[namaPeg]</b></u></div>
								<div>NIP. $rowDet[nip]</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr  bgcolor='#9ace9d'>
				<td>
					<table cellpadding='1' cellspacing='1' style='text-align:left;' bgcolor='#f5f0f0'>
						<tr  bgcolor='#d2f7ce'>
							<td width='220'>Nomor Seri Karpeg</td>
							<td width='7'>:</td>
							<td>$rowDet[noSeriKarpeg]</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td style='vertical-align:top;'>Alamat</td>
							<td>:</td>
							<td>$rowDet[alamatPeg]</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>Jenis Kelamin</td>
							<td>:</td>";
							if($rowDet['jkPeg']==0) {
								$jk="Laki-laki";
							}
							else {
								$jk="Perempuan";
							}
							$isi.="
							<td>$jk</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>Tempat, Tanggal Lahir</td>
							<td>:</td>
							<td>$rowDet[tmptLahir], ".$general->formatTanggal2($rowDet['tglLahir'])."</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td style='vertical-align:top;'>Keahlian</td>
							<td>:</td>
							<td>$rowDet[keahlian]</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>Pangkat</td>
							<td>:</td>
							<td>";
								$sqlPang="	SELECT G.syaratKUM, H.namaGolHuruf, A.namaGolAngka, P.namaPangkat 
											FROM tbl_golongan G, tbl_pangkat P, tbl_golhuruf H, tbl_golangka A, tbl_pegawai C 
											WHERE C.nip='$rowDet[nip]' 
											AND C.idGolongan=G.idGolongan 
											AND G.idPangkat=P.idPangkat 
											AND G.idGolHuruf=H.idGolHuruf 
											AND G.idGolAngka=A.idGolAngka";
								$DB->executeQuery($sqlPang);
								if($DB->rs()) {
									if($DB->getRows()==1) {
										$rowPang=$DB->getResult();
										$isi.=strtoupper($rowPang['namaPangkat'])." ".$rowPang['syaratKUM']." / ".$rowPang['namaGolAngka']."".$rowPang['namaGolHuruf'];
									}
								}
							$isi.="
							</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>TMT Pangkat</td>
							<td>:</td>
							<td>".$general->formatTanggal2($rowDet['TMTPangkat'])."</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>Total KUM</td>
							<td>:</td>
							<td>$rowDet[oldKUM]</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>Jabatan</td>
							<td>:</td>
							<td>";
								$sqlJab="SELECT namaJabatan FROM tbl_jabatan WHERE idJabatan='$rowDet[idJabatan]'";
								$DB->executeQuery($sqlJab);
								if($DB->rs()) {
									if($DB->getRows()==1) {
										$rowJab=$DB->getResult();
										$isi.=strtoupper($rowJab['namaJabatan']);
									}
								}
							$isi.="
							</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>TMT Jabatan</td>
							<td>:</td>
							<td>".$general->formatTanggal2($rowDet['TMTJabatan'])."</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>Pendidikan</td>
							<td>:</td>
							<td>";
							$sqlPend="SELECT namaPendidikan FROM tbl_pendidikan WHERE idPendidikan='$rowDet[idPendidikan]'";
							$DB->executeQuery($sqlPend);
							if($DB->rs()) {
								if($DB->getRows()==1) {
									$rowPend=$DB->getResult();
									$isi.=$rowPend['namaPendidikan'];
								}
							}
							$isi.="
							</td>
						</tr>
						<tr  bgcolor='#d2f7ce'>
							<td>Unit Kerja</td>
							<td>:</td>
							<td>";
							$sqlUnit="	SELECT namaFakultas 
										FROM tbl_fakultas 
										WHERE active='1'";
							$DB->executeQuery($sqlUnit);
							if($DB->rs()) {
								if($DB->getRows()==1) {
									$rowUnit=$DB->getResult();
									$isi.=$rowUnit['namaFakultas'];
								}
							}
							$isi.="
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		";
	}
	else {
		$isi.="";
	}
	
	$layout->setSitemaps($u);
	$layout->setMenuContent($mContent);
	$layout->setContent($isi);
	$layout->HTML_render();
?>