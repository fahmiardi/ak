<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<title>Halaman Login</title>
		<link rel="stylesheet" href="./css/style.css" type="text/css" />
		<link rel="icon" href="./images/icons/favicon.ico" type="image/x-icon"> 
		<link rel="shortcut icon" href="./images/icons/favicon.ico" type="image/x-icon">
		<script language="javascript">
			window.onload = function() {
			  applyDefaultValue(document.getElementById('txtUser'), 'Username');
			  applyPasswordType(document.getElementById('txtPass'), 'Password', 'text');
			}

			function applyDefaultValue(elem, val) {
			  elem.style.color = '#777';
			  elem.value = val;
			  elem.onfocus = function() {
				if(this.value == val) {
				  this.style.color = '';
				  this.value = ''; //On focus, make blank
				}
			  }
			  elem.onblur = function() {
				if(this.value == '') {
				  this.value = val; //If it's not in focus, use declared value
				}
			  }
			}

			function applyPasswordType(elem, val, typ) {
			  elem.style.color = '#777';
			  elem.value = val;
			  elem.type = typ;
			  elem.onfocus = function() {
				if(this.value == val) {
				  this.style.color = '';
				  this.type = 'password'; //If in focus, input type will be 'password'
				  this.value = '';
				}
			  }
			  elem.onblur = function() {
				if(this.value == '') {
				  this.value = val;
				  this.type = 'text'; //On blur, input type will be 'text' in order to show value
				}
			  }
			}

		</script>
	</head>
	<body>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td background="./images/ak_01.png" height="67"><span class='null'>.</span></td>
				<td width="999" height="67">
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td background="./images/ak_03.png" width="92" height="67"></td>
							<td background="./images/ak_04.png" width="890" height="67">
								<div id="head">
									<div id="head-title">Sistem Administrasi Angka Kredit Pegawai Fungsional</div>
									<div id="head-fak">Fakultas Syari'ah dan Hukum UIN Jakarta</div>
								</div>
							</td>
							<td background="./images/ak_06.png" width="17" height="67"></td>
						</tr>
					</table>
				</td>
				<td background="./images/ak_07.png" height="67"><span class='null'>.</span></td>
			</tr>
		</table>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td bgcolor="#f5f0f0" height="59"><span class='null'>.</span></td>
				<td width="999" height="59">
					<form action="?u=login&act=auth_login" method="post" id="form-login">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td background="./images/ak_10.png" width="11" height="460"></td>
								<td background="./images/log_11.png" width="977" height="460" colspan="3" align="center">
									<div id="login">
										<div id="warning">
											<?php
											//ini adalah pesan error di halaman login dengan bantuan variabel 'alert'
											if(isset($_GET['alert']) && $_GET['alert']!="") {
												switch($_GET['alert']) {
													case 'wrong':
														echo "Maaf, Username atau Password salah.";
														break;
													case 'naughty':
														echo "Naughty. Silahkan Login terlebih dahulu.";
														break;
													case 'error_session':
														echo "Session Error. Silahkan Login kembali.";
														break;
													case 'empty':
														echo "Maaf, Username atau Password tidak boleh kosong.";
														break;
													case 'logout':
														echo "Terima Kasih.";
														break;
													default:
														echo "<font color='#f5f0f0'>.</font>";
												}
											}
											else {
												echo "<font color='#f5f0f0'>.</font>";
											}
											?>
										</div>
										<div id="uname"><input id="username" name="user" type="text" size="28" value='Username' onblur="if(this.value=='') this.value='Username';" onfocus="if(this.value=='Username') this.value='';"></div>
										<div id="pass"><input id="password" name="pass" size="19" value='Password' onblur="if(this.value=='') this.value='Password'; this.type='password';" onfocus="if(this.value=='Password') { this.value=''; this.type='password';}">&nbsp;<input id="submit" name="submit" type="submit" value="Login"></div>
									</div>
								</td>
								<td background="./images/ak_13.png" width="11" height="460"></td>
							</tr>
							<tr>
								<td background="./images/ak_17.png" width="11" height="16"></td>
								<td background="./images/ak_18.png" width="6" height="16"></td>
								<td background="./images/ak_19.png" width="965" height="16"></td>
								<td background="./images/ak_21.png" width="6" height="16"></td>
								<td background="./images/ak_22.png" width="11" height="16"></td>
							</tr>
						</table>
					</form>
				</td>
				<td bgcolor="#f5f0f0" height="59"><span class='null'>.</span></td>
			</tr>
		</table>		
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td background="./images/ak_46.png" height="45"></td>
				<td background="./images/ak_46.png" width="981" height="45">
					<div id="footer">
						<div id="footer-copy">&copy;2010 Maintened by. FSH-UINJakarta and Developed by. <b>Atiyah Tahta Nisyatina [106091003526]</b></div>
					</div>
				</td>
				<td background="./images/ak_46.png" height="45"></td>
			</tr>
		</table>
	</body>
</html>