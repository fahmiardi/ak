<?php
	session_start();
	include_once "./config/config.php";
	include_once "./lib/class.DB.php";
	include_once "./lib/class.FormatNIP.php";
	include_once "./lib/class.GeneralFunction.php";
	include_once "./lib/class.User.php";
	include_once "./lib/class.AngkaKredit.php";
	include_once "./lib/class.Pengajuan.php";
	include_once "./lib/class.Kategori.php";
	include_once "./lib/class.Persentasi.php";
	include_once "./lib/class.Kepegawaian.php";
	include_once "./lib/class.Paging.php";
	include_once "./lib/fpdf/fpdf.php";
	include_once "./lib/class.CetakPerolehan.php";
	include_once "./lib/class.PropertiCetakPerolehan.php";
	include_once "./lib/class.UnitKerja.php";
	include_once "./lib/class.CetakKepegawaian.php";
	include_once "./lib/class.CetakDUKDosen.php";
	include_once "./lib/class.TMT.php";
	include_once "./lib/class.Layout.php";	
	
	//instance Kelas
	$layout=new Layout();
	$DB=new DB();
	$general=new GeneralFunction();
	$user=new User();
	$AK=new AngkaKredit();
	$pengajuan=new Pengajuan();
	$kategori=new Kategori();
	$persentasi=new Persentasi();
	$kepegawaian=new Kepegawaian();
	$cetakPerolehan = new CetakPerolehan();
	$cetakPegawai = new CetakKepegawaian();
	$cetakDUK = new CetakDUKDosen("L","mm","A4");
	$properti = new PropertiCetakPerolehan();
	$unit = new UnitKerja();
	$formatNIP = new FormatNIP();
	$paging = new JinPagination();
	$tmt = new TMT();
	
	//Ambil Token
	$user->setToken($_SESSION['bana_token']);
	
	switch($_GET['u']) {
		case 'login':
			if($user->otentikasi()) {
				header("location: ./page.php?u=home");
			}
			else {
				switch($_GET['act']) {
					case 'form':
						include_once "./login.php";
						break;
					case 'auth_login':
						include_once "./otentikasi.php";
						break;
					default:
						session_destroy();
						header("location: ./page.php?u=login&act=form&alert=error_session");
				}
			}
			break;
		case 'home':
			if($user->otentikasi()) {
				if($user->getLevel()==1) {
					include_once "./home_superadmin.php";
				}
				elseif($user->getLevel()==2) {
					include_once "./home_adminfak.php";
				}
				elseif($user->getLevel()==3) {
					include_once "./home_adminkepeg.php";
				}
				elseif($user->getLevel()==4) {
					include_once "./home_dosen.php";
				}
				else {
					session_destroy();
					header("location: ./page.php?u=login&act=form&alert=error_session");
				}
			}
			else {				
				session_destroy();
				header("location: ./page.php?u=login&act=form&alert=error_session");
			}
			break;
		case 'kepegawaian':
			if($user->otentikasi()) {
				if($user->getLevel()==1) {
					include_once "./kepegawaian_superadmin.php";
				}
				elseif($user->getLevel()==2) {
					include_once "./kepegawaian_adminfak.php";
				}
				elseif($user->getLevel()==3) {
					include_once "./kepegawaian_adminkepeg.php";
				}
				elseif($user->getLevel()==4) {
					include_once "./kepegawaian_dosen.php";
				}
				else {
					session_destroy();
					header("location: ./page.php?u=login&act=form&alert=error_session");
				}
			}
			else {				
				session_destroy();
				header("location: ./page.php?u=login&act=form&alert=error_session");
			}
			break;
		case 'angkakredit':
			if($user->otentikasi()) {
				if($user->getLevel()==1) {
					include_once "./angkakredit_superadmin.php";
				}
				elseif($user->getLevel()==2) {
					include_once "./angkakredit_adminfak.php";
				}
				elseif($user->getLevel()==3) {
					include_once "./angkakredit_adminkepeg.php";
				}
				elseif($user->getLevel()==4) {
					include_once "./angkakredit_dosen.php";
				}
				else {
					session_destroy();
					header("location: ./page.php?u=login&act=form&alert=error_session");
				}
			}
			else {				
				session_destroy();
				header("location: ./page.php?u=login&act=form&alert=error_session");
			}
			break;
		case 'settings':
			if($user->otentikasi()) {
				if($user->getLevel()==1) {
					include_once "./settings_superadmin.php";
				}
				elseif($user->getLevel()==2) {
					include_once "./settings_adminfak.php";
				}
				elseif($user->getLevel()==3) {
					include_once "./settings_adminkepeg.php";
				}
				elseif($user->getLevel()==4) {
					include_once "./settings_dosen.php";
				}
				else {
					session_destroy();
					header("location: ./page.php?u=login&act=form&alert=error_session");
				}
			}
			else {				
				session_destroy();
				header("location: ./page.php?u=login&act=form&alert=error_session");
			}
			break;
		case 'logout':
			session_destroy();
			header("location: ./page.php?u=login&act=form&alert=logout");
			break;
		default:
			session_destroy();
			header("location: ./page.php?u=login&act=form&alert=error_session");
	}
?>