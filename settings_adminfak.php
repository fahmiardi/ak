<?php
	$u['u=settings']="settings";
	
	$nav=array(	"button2.png"=>array("?u=$_GET[u]"=>"List Account", "?u=$_GET[u]&opt=tambah"=>"Tambah Account")
			);
			
	switch($_GET['opt']) {
		case 'edit':
			switch($_GET['act']) {
				case 'update':
					$idUser=(int)$_POST['idUser'];
					$userName=trim($general->filter($_POST['userName'])," .,");
					$namaAdmin=trim($_POST['namaAdmin']," .,");
					$cek=(int)$_POST['cek'];
					if($cek==1) {
						$pwdLama=$general->Encrypt($_POST['pwdLama']);
						$sqlCek2="	SELECT pwdHash 
									FROM peg_user 
									WHERE idUser='".$idUser."'";
						$DB->executeQuery($sqlCek2);
						if($DB->getRows()==1) {
							$rowCek2=$DB->getResult();
							if($rowCek2['pwdHash']==$pwdLama) {
								$pwdBaru1=trim($general->filter($_POST['pwdBaru1'])," .,");
								$pwdBaru2=trim($general->filter($_POST['pwdBaru2'])," .,");
								if($pwdBaru1==$pwdBaru2) {
									$sqlUp="UPDATE peg_user 
											SET userName='".$userName."', 
												namaAdmin='".$namaAdmin."', 
												pwdHash='".$general->Encrypt($pwdBaru1)."' 
											WHERE idUser='".$idUser."'";
									$DB->executeQuery($sqlUp);
									if($DB->notNull()) {
										header("Location: ./page.php?u=settings&msg=update_sukses");
									}
								}
								else {
									header("Location: ./page.php?u=settings&msg=pwd_notmatch");
								}
							}
							else {
								header("Location: ./page.php?u=settings&msg=pwd_notfound");
							}
						}
					}
					else {
						$sqlUp="UPDATE peg_user 
								SET userName='".$userName."', 
									namaAdmin='".$namaAdmin."' 
								WHERE idUser='".$idUser."'";
						$DB->executeQuery($sqlUp);
						if($DB->notNull()) {
							header("Location: ./page.php?u=settings&msg=update_sukses");
						}
					}
					break;
				default:
					$idUser=(int)$_POST['idUser'];
					
					$sqlAdm="	SELECT idUser, userName, namaAdmin 
								FROM peg_user 
								WHERE idUser='".$idUser."'";
					$DB->executeQuery($sqlAdm);
					if($DB->getRows()==1) {
						$rowAdm=$DB->getResult();
						
						$isi="	
						<div class='kategori'><span class='f-verdana'>Settings</span></div>
						<div>Edit Account Admin Administrasi</div>
						
						<div class='list2' style='margin-top:20px;'>
							<form action='?u=settings&opt=edit&act=update' method='post'>
								<input type='hidden' name='idUser' value='".$rowAdm['idUser']."'>
								<div class='fl' style='width:80px;'>Username</div>
								<div class='fl' style='width:15px;'>:</div>
								<div class='fl'><input type='text' name='userName' class='input' style='width:200px;' value='".$rowAdm['userName']."'></div>
								<div class='fix' style='margin-bottom:5px;'></div>
								
								<div class='fl' style='width:80px;'>Nama Admin</div>
								<div class='fl' style='width:15px;'>:</div>
								<div class='fl'><input type='text' name='namaAdmin' class='input' style='width:200px;' value='".$rowAdm['namaAdmin']."'></div>
								<div class='fix' style='margin-bottom:5px;'></div>
								
								<div class='list2' style='width:;'>
									<div class='fl' style='width:10px;'><input type='checkbox' name='cek' value='1'></div>
									<div class='fl kecil' style='margin-left:5px;'>Ceklis jika anda ingin mengubah password.</div>
									<div class='fix' style='margin-bottom:5px;'></div>
									
									<div class='fl' style='width:100px;'>Password Lama</div>
									<div class='fl' style='width:15px;'>:</div>
									<div class='fl'><input type='password' name='pwdLama' class='input' style='width:200px;'></div>
									<div class='fix' style='margin-bottom:5px;'></div>
									
									<div class='fl' style='width:100px;'>Password Baru</div>
									<div class='fl' style='width:15px;'>:</div>
									<div class='fl'><input type='password' name='pwdBaru1' class='input' style='width:200px;'></div>
									<div class='fix' style='margin-bottom:5px;'></div>
									
									<div class='fl' style='width:100px;'>Ulangi Password</div>
									<div class='fl' style='width:15px;'>:</div>
									<div class='fl'><input type='password' name='pwdBaru2' class='input' style='width:200px;'></div>
									<div class='fix' style='margin-bottom:5px;'></div>
								</div>
								
								<div style='margin-top:5px;'><input type='submit' class='submit' style='width:100%;' value='Update'></div>
							
							</form>
						</div>";
					}
			}
			break;
		case 'tambah':
			switch($_GET['act']) {
				case 'save':
					$userName=trim($general->filter($_POST['user'])," .,");
					$namaAdmin=trim($general->filter($_POST['namaAdmin'])," .,");
					$passwd=$general->Encrypt('1234');
					$level=$_POST['idLevel'];
					
					$sqlCek="	SELECT idUser 
								FROM peg_user 
								WHERE userName='".$userName."'";
					$DB->executeQuery($sqlCek);
					if($DB->getRows()>0) {
						header("Location: ./page.php?u=settings&msg=tambah_duplicate");
					}
					else {
						$sqlIns="	INSERT INTO peg_user 
									VALUES(	'',
											'".$userName."',
											'".$namaAdmin."',
											'".$passwd."',
											'".$general->createRandomToken()."',
											'".$level."')";
						$DB->executeQuery($sqlIns);
						if($DB->notNull()) {
							$_SESSION['idLevel']=$level;
							header("Location: ./page.php?u=settings&msg=tambah_sukses");
						}
					}
					break;
				default:
					$isi="	
					<div class='kategori'><span class='f-verdana'>Settings</span></div>
					<div>Tambah Account Admin</div>
					
					<div class='list2' style='margin-top:20px;'>
						<form action='?u=settings&opt=tambah&act=save' method='post'>
							<div class='fl' style='width:80px;'>Level</div>
							<div class='fl' style='width:15px;'>:</div>
							<div class='fl'>
								<select name='idLevel' class='form-select' style='width:160px; height:30px;'>
									<option value=''>-- pilih level --</option>";
									$sqlLev="SELECT * FROM peg_level WHERE idLevel='2' OR idLevel='3'";
									$DB->executeQuery($sqlLev);
									if($DB->rs()) {
										while($rowLev=$DB->getResult()) {
											$isi.="
											<option value='".$rowLev['idLevel']."'>".strtoupper($rowLev['namaLevel'])."</option>";
										}
									}
								$isi.="
								</select>
							</div>
							<div class='fix' style='margin-bottom:5px;'></div>
							
							<div class='fl' style='width:80px;'>Username</div>
							<div class='fl' style='width:15px;'>:</div>
							<div class='fl'><input type='text' name='user' class='input' style='width:200px;'></div>
							<div class='fix' style='margin-bottom:5px;'></div>
							
							<div class='fl' style='width:80px;'>Nama Admin</div>
							<div class='fl' style='width:15px;'>:</div>
							<div class='fl'><input type='text' name='namaAdmin' class='input' style='width:200px;'></div>
							<div class='fix' style='margin-bottom:5px;'></div>
							
							<div><input type='submit' class='submit' style='width:308px;' value='Tambah'></div>
						
						</form>
					</div>";
			}
			break;
		case 'reset_dosen':
			$nip=str_replace(" ","",trim($_POST['nip']," .,"));
			$pass=$general->Encrypt($nip);
			
			$sqlUp="UPDATE peg_user 
					SET pwdHash='".$pass."' 
					WHERE userName='".$nip."'";
			$DB->executeQuery($sqlUp);
			if($DB->notNull()) {
				header("Location: ./page.php?u=settings&msg=reset_sukses");
			}
			else {
				header("Location: ./page.php?u=settings&msg=reset_gagal");
			}
			break;
		case 'reset_admin':
			$user=$_POST['userName'];
			$pass=$general->Encrypt('1234');
			
			$sqlUp="UPDATE peg_user 
					SET pwdHash='".$pass."' 
					WHERE userName='".$user."'";
			$DB->executeQuery($sqlUp);
			if($DB->notNull()) {
				header("Location: ./page.php?u=settings&msg=reset_sukses");
			}
			else {
				header("Location: ./page.php?u=settings&msg=reset_gagal");
			}
			break;
		default:
			$isi="	<div class='kategori'><span class='f-verdana'>Settings</span></div>
					<div style='color:red; width:100%; text-align:center'>";
						switch($_GET['msg']) {
							case 'reset_sukses':
								$isi.="Reset berhasil.";
								break;
							case 'reset_gagal':
								$isi.="Reset gagal.";
								break;
							case 'tambah_duplicate':
								$isi.="Username sudah ada.";
								break;
							case 'tambah_sukses':
								$isi.="Tambah Account berhasil.";
								break;
							case 'update_sukses':
								$isi.="Update Account berhasil.";
								break;
							case 'pwd_notfound':
								$isi.="Update gagal. Password lama salah.";
								break;
							case 'pwd_notmatch':
								$isi.="Update gagal. Password baru tidak cocok dengan Confirm password.";
								break;
						}
					$isi.="
					</div>
					<div class='fr'>
						<form action='?u=settings' method='post'>
							<select name='idLevel' class='form-select' style='width:260px; height:30px;' onchange='this.form.submit();'>
								<option value=''>-- pilih level --</option>";
								$sqlLevel="	SELECT namaLevel, idLevel 
											FROM peg_level 
											WHERE idLevel!='1'";
								$DB->executeQuery($sqlLevel);
								if($DB->rs()) {
									while($rowLevel=$DB->getResult()) {
										if(isset($_POST['idLevel'])||isset($_SESSION['idLevel'])) {
											if($_POST['idLevel']==$rowLevel['idLevel']||$_SESSION['idLevel']==$rowLevel['idLevel']) {
												$isi.="
												<option value='".$rowLevel['idLevel']."' SELECTED>".strtoupper($rowLevel['namaLevel'])."</option>";
												$_SESSION['idLevel']=$rowLevel['idLevel'];
											}
											else {
												$isi.="
												<option value='".$rowLevel['idLevel']."'>".strtoupper($rowLevel['namaLevel'])."</option>";
											}
										}
										else {
											$isi.="
											<option value='".$rowLevel['idLevel']."'>".strtoupper($rowLevel['namaLevel'])."</option>";
										}
									}
								}
								$isi.="
								</option>
							</select>
						</form>
					</div>
					<div class='fix' style='margin-bottom:10px;'></div>";
					if($_SESSION['idLevel']!=4) {
						if($_SESSION['idLevel']==3) { // admin kepeg
							$isi.="
							<form action='?u=settings&opt=reset_admin' method='post'>
								<div class='show-head'>
									<div class='show-name f-verdana' style='padding-left:0px;'>List Account Admin Kepegawaian</div>
								</div>
								<div class='list2'>
									<div style='padding-bottom:2px;'>
										<div class='fl bold' style='width:40px;'>No.</div>
										<div class='fl bold' style='width:135px;'>Username</div>
										<div class='fl bold' style='width:285px;'>Nama Admin</div>
										<div class='fl bold' style='width:110px; text-align:center;'>Actions</div>
										<div class='fix'></div>
									</div>										
									<div style='border:1px solid #ddd; border-bottom:0px;'></div>
									<div style='padding-bottom:2px;'></div>";
								
								$sqlAdm="	SELECT userName, namaAdmin 
											FROM peg_user 
											WHERE idLevel='".$_SESSION['idLevel']."'";
								$DB->executeQuery($sqlAdm);
								if($DB->rs()) {
									$no=1;
									while($rowAdm=$DB->getResult()) {
										$isi.="
										<div style='margin:2px 0;' class='hover'>
											<div class='fl kecil' style='width:40px;'>".$no."</div>
											<div class='fl kecil' style='width:135px;'>".$rowAdm['userName']."</div>
											<div class='fl kecil' style='width:285px;'>".$rowAdm['namaAdmin']."</div>
											<div class='fl kecil' style='width:110px;'>
												<input type='hidden' name='userName' value='".$rowAdm['userName']."'>
												<input type='submit' class='submit' value='Reset Password'>
											</div>
											<div class='fix'></div>
										</div>";
										$no++;
									}
								}
								$isi.="
								</div>
							</form>";
						}
						else { //admin fakultas
							$isi.="
							<form action='?u=settings&opt=edit' method='post'>
								<div class='show-head'>
									<div class='show-name f-verdana' style='padding-left:0px;'>List Account Admin Administrasi</div>
								</div>
								<div class='list2'>
									<div style='padding-bottom:2px;'>
										<div class='fl bold' style='width:40px;'>No.</div>
										<div class='fl bold' style='width:135px;'>Username</div>
										<div class='fl bold' style='width:285px;'>Nama Admin</div>
										<div class='fl bold' style='width:110px; text-align:;'>Actions</div>
										<div class='fix'></div>
									</div>										
									<div style='border:1px solid #ddd; border-bottom:0px;'></div>
									<div style='padding-bottom:2px;'></div>";
								
								$sqlAdm="	SELECT idUser, userName, namaAdmin 
											FROM peg_user 
											WHERE idLevel='".$_SESSION['idLevel']."'";
								$DB->executeQuery($sqlAdm);
								if($DB->rs()) {
									$no=1;
									while($rowAdm=$DB->getResult()) {
										$isi.="
										<div style='margin:2px 0;' class='hover'>
											<div class='fl kecil' style='width:40px;'>".$no."</div>
											<div class='fl kecil' style='width:135px;'>".$rowAdm['userName']."</div>
											<div class='fl kecil' style='width:285px;'>".$rowAdm['namaAdmin']."</div>
											<div class='fl kecil' style='width:110px;'>
												<input type='hidden' name='idUser' value='".$rowAdm['idUser']."'>
												<input type='submit' class='submit' value='Edit'>
											</div>
											<div class='fix'></div>
										</div>";
										$no++;
									}
								}
								$isi.="
								</div>
							</form>";
						}
					}
					else { //account dosen
						$isi.="
						<div class='search'>
							<form action='#' method='post'>";
								if(isset($_POST['usernameSearch']) && $_POST['usernameSearch']!="") {
									$isi.="
									<input name='usernameSearch' type='text' class='input cari' value='".$_POST['usernameSearch']."'>";
								}
								else {
									$isi.="
									<input name='usernameSearch' type='text' class='input cari'>";
								}
								$isi.="
								&nbsp;<input type='submit' value='Cari Dosen' class='submit f-verdana'>
							</form>
						</div>					
						<div class=''>
							<form action='?u=settings&opt=reset_dosen' method='post'>							
								<div class='show'>
									<div class='show-head'>
										<div class='show-name f-verdana' style='padding-left:0px;'>List Account</div>
									</div>";
										$isi.="
										<div class='list'>";									
											if(isset($_POST['usernameSearch']) && $_POST['usernameSearch']!="") {
												$usernameSearch=str_replace(" ","",trim($_POST['usernameSearch']," .,"));
												
												$paging->setOption("tabel", "peg_pegawai Pg, peg_user Us");
												$paging->setOption("where", "WHERE Pg.nip=Us.userName AND Us.userName='".$usernameSearch."'");
												$paging->setOption("limit", "10");
												$paging->setOption("order", "");
											}
											else {												
												$paging->setOption("tabel", "peg_pegawai Pg, peg_user Us");
												$paging->setOption("where", "WHERE Pg.nip=Us.userName");
												$paging->setOption("limit", "10");
												$paging->setOption("order", "ORDER BY Pg.namaPeg ASC");
											}
												
											$paging->setOption("page", $_REQUEST["page"]); // setup untuk ambil variable angka halaman (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
											$paging->setOption("web_url_page", "?u=settings&page="); // setup alamat url (berguna jika menggunakan SEO url, ubah sesuai dgn kebutuhan)
											
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
												<div class='fl bold' style='width:40px;'>No.</div>
												<div class='fl bold' style='width:135px;'>Username</div>
												<div class='fl bold' style='width:285px;'>Nama Dosen</div>
												<div class='fl bold' style='width:110px; text-align:center;'>Actions</div>
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
													<div class='fl kecil' style='width:40px;'>".$no."</div>
													<div class='fl kecil' style='width:135px;'>".$formatNIP->nipFormat($rowList['userName'])."</div>
													<div class='fl kecil' style='width:285px;'>".$rowList['namaPeg'].$separator2.$rowList['titleBelakang'].$separator1.$rowList['titleDepan']."</div>
													<div class='fl kecil' style='width:110px;'>
														<input type='hidden' name='nip' value='".$rowList['userName']."'>
														<input type='submit' class='submit' value='Reset Password'>
													</div>
													<div class='fix'></div>
												</div>";
												$no++;
											}
											
										$isi.="
										</div>
										<div class='paging list2' style='text-align:center;'>
											<div style='margin-bottom:5px;'>Total ".$hal_array["total"]."</div>
											<div>".$hal_array["pagination"]."</div>
										</div>";
								$isi.="	
								</div>
							</form>
						</div>";
					}
	}
	
	$layout->setContent($isi);
	$layout->setSitemaps($u);
	$layout->setNavigasi($nav);
	$layout->HTML_render();
?>