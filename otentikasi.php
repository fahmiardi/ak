<?php
	$us=str_replace(" ","",trim($_POST['user']," .,"));
	$pa=str_replace(" ","",trim($_POST['pass']," .,"));
	$uname=$general->filter($us);
	$pwd=$general->Encrypt($general->filter($pa));
	if($uname==""||$pwd=="") {
		header("location: ./page.php?u=login&act=form&alert=empty");
	}
	else {
		$token=$general->createRandomToken();
		$sqlOten="	SELECT idUser 
					FROM peg_user 
					WHERE userName='$uname' 
					AND pwdHash='$pwd'";
		$DB->executeQuery($sqlOten);
		if($DB->rs()) {
			if($DB->getRows()==1) {
				$rowOten=$DB->getResult();
				$sqlToken="	UPDATE peg_user 
							SET token='".$token."' 
							WHERE idUser='".$rowOten['idUser']."'";
				$DB->executeQuery($sqlToken);
				if($DB->notNull()) {
					$_SESSION['bana_token']=$token;
					header("location: ./page.php?u=home");
				}
			}
		}
		else {
			header("location: ./page.php?u=login&act=form&alert=wrong");
		}
	}
?>