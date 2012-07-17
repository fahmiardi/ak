<?php
	$u['u=settings']="settings";
	
	switch($_GET['act']) {
		case 'ubah':
			$pwdLama=$general->Encrypt($_POST['pwdLama']);
			if($pwdLama==$user->getPWD()) {
				$pwdBaru=$general->Encrypt($_POST['pwdBaru']);
				$sqlUbah="	UPDATE peg_user 
							SET pwdHash='".$pwdBaru."' 
							WHERE userName='".$user->getUsernameAdmin()."'";
				$DB->executeQuery($sqlUbah);
				if($DB->notNull()) {
					header("Location: ?u=$_GET[u]&act=sukses");
				}
			}
			else {
				header("Location: ?u=$_GET[u]&act=gagal");
			}
			break;
		default:
			if($_GET['act']!="") {
				switch($_GET['act']) {
					case 'sukses':
						$isi.="<div style='color:red; text-align:center; padding-bottom:10px;'>Password berhasil diubah</div>";
						break;
					case 'gagal':
						$isi.="<div style='color:red; text-align:center; padding-bottom:10px;'>Password gagal diubah</div>";
						break;
				}
			}
			$isi.="
				<form action='?u=$_GET[u]&act=ubah' method='post'>	
					<table width='100%' border='0' cellpadding='1' cellspacing='1'>
						<tr>
							<td align='left'>Username</td>
							<td align='left'>:</td>
							<td align='left'>".$user->getUsername()."</td>
						</tr>
						<tr>
							<td align='left'>Password Lama</td>
							<td align='left'>:</td>
							<td align='left'><input type='password' name='pwdLama'></td>
						</tr>
						<tr>
							<td align='left'>Password Baru</td>
							<td align='left'>:</td>
							<td align='left'><input type='password' name='pwdBaru'></td>
						</tr>
						<tr>
							<td colspan='3'><input type='submit' value='Rubah'></td>
						</tr>
					</table>
				</form>";
	}
	
	
	$layout->setContent($isi);
	$layout->setSitemaps($u);
	$layout->HTML_render();
?>