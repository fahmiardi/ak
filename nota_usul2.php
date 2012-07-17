<?php
	if($user->getLevel()==3) { 
		$id=(int)$_GET['id'];
	}
	elseif($user->getLevel()==4) {
		$id=(int)$pengajuan->getPerolehanIDCetak();
	}
	else {
		session_destroy();
		header("location: ./page.php?u=login&act=form&alert=error_session");
	}
	
	$oleh->setId($id);	
	if($oleh->valid()) {		
		//Instantiance	
		//$nota->SetFont('Arial','',14);
		//$nota->AddPage();
		//$nota->AliasNbPages();			
		
		$oleh->renderCell($oleh->fetch(0,0));
		
		$sqlDiambil="	SELECT Pd.valueKUM 
						FROM ak_perolehan_detail Pd 
						WHERE Pd.idPerolehan='".$id."' 
						AND Pd.valueKd='5'";
		$DB->executeQuery($sqlDiambil);
		if($DB->getRows()>0) {
			$kum=0;
			while($rowDiambil=$DB->getResult()) {
				$kum+=$rowDiambil['valueKUM'];
			}
		}
		
		//$is=array('Total Perolehan',$kum);
		//$r=$nota->cetakTotalKUM($is);
		//$nota->renderCell($r);
		
		$oleh->Output();
	}
	else {
		session_destroy();
		header("location: ./page.php?u=login&act=form&alert=error_session");
	}
?>