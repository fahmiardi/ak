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
	
	$cetakPerolehan->setId($id);	
	if($cetakPerolehan->valid()) {		
		//Instantiance	
		$cetakPerolehan->SetFont('Arial','',14);
		$cetakPerolehan->color();
		$cetakPerolehan->AddPage();
		$cetakPerolehan->AliasNbPages();			
		
		$cetakPerolehan->renderCell($cetakPerolehan->headPerolehan());//cetak head perolehan		
		$cetakPerolehan->renderCell($cetakPerolehan->fetch(0,0));//cetak isi kategori
		$cetakPerolehan->renderCell($cetakPerolehan->cetakTotalKUM());//cetak total KUM
		
		$cetakPerolehan->AddPage();//enter to next page
		$cetakPerolehan->renderCell($cetakPerolehan->listPersentasi());//cetak list persentasi
		
		$cetakPerolehan->AddPage();//enter to next page
		$cetakPerolehan->renderCell($cetakPerolehan->cetakBidangA());//cetak bidang A
		
		$cetakPerolehan->AddPage();//enter to next page
		$cetakPerolehan->renderCell($cetakPerolehan->cetakBidangB());//cetak bidang B
		
		$cetakPerolehan->AddPage();//enter to next page
		$cetakPerolehan->renderCell($cetakPerolehan->cetakBidangC());//cetak bidang C
		
		$cetakPerolehan->AddPage();//enter to next page
		$cetakPerolehan->renderCell($cetakPerolehan->cetakBidangD());//cetak bidang D
		
		$cetakPerolehan->Output();
	}
	else {
		session_destroy();
		header("location: ./page.php?u=login&act=form&alert=error_session");
	}
?>