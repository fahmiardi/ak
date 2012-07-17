<?php
	$u['u=home']="home";
	$nav=array(	"button2.png"=>array("?u=$_GET[u]"=>"Profil", "?u=$_GET[u]&opt=sop"=>"SOP Angka Kredit"),
			);
	
	switch($_GET['opt']) {
		case 'sop':
			function fetch($parent, $level, $group) {
				global $DB;
				
				$sqlShow="	SELECT count, kdKategori, namaKategori 
							FROM ak_kategori 
							WHERE parentId='".$parent."' 
							AND idGroup='".$group."'";
				$queryShow=mysql_query($sqlShow,$DB->opendb());
				if($queryShow!=null) {
					if(mysql_num_rows($queryShow)>0) {
						while($rowShow=mysql_fetch_array($queryShow)) {							
							$kd=$rowShow['kdKategori'];
							$name=$rowShow['namaKategori'];
							if($rowShow['count']==0) {
								$sqlCek="	SELECT Rk.valueAK 
											FROM ak_relasi_kategori Rk, ak_kategori K 
											WHERE K.kdKategori='".$kd."' 
											AND K.kdKategori=Rk.kdKategori 
											AND Rk.kdRule='5'";
								$DB->executeQuery($sqlCek);
								if($DB->getRows()==1) {
									$rowCek=$DB->getResult();
									$kum=$rowCek['valueAK'];
								}
							}
							else {
								$kum="";
							}
							switch($level) {
								case 0:
									$data=array($kd,$name,$kum);
									$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
									$i=0;
									foreach($data as $rows) {
										if($i==0) {
											$row.="<td style='width:30px;'><div class='bold'>".$rows."</div></td>";
										}
										elseif($i==2) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										else {
											$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;' class='bold'>".strtoupper($rows)."</div></td>";
										}
										$i++;
									}
									$row.="</tr></table>";
									break;
								case 1:
									$data=array('',$kd,$name,$kum);
									$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
									$i=0;
									foreach($data as $rows) {
										if($i==0) {
											$row.="<td style='width:30px;'>".$rows."</td>";
										}
										elseif($i==1) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										elseif($i==3) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										else {
											$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
										}
										$i++;
									}
									$row.="</tr></table>";
									break;
								case 2:
									$data=array('','',$kd,$name,$kum);
									$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
									$i=0;
									foreach($data as $rows) {
										if($i==0) {
											$row.="<td style='width:30px;'>".$rows."</td>";
										}
										elseif($i==1) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										elseif($i==2) {
											$row.="<td style='width:60px;'>".$rows."</td>";
										}
										elseif($i==4) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										else {
											$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
										}
										$i++;
									}
									$row.="</tr></table>";
									break;
								case 3:
									$data=array('','','',$kd,$name,$kum);
									$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
									$i=0;
									foreach($data as $rows) {
										if($i==0) {
											$row.="<td style='width:30px;'>".$rows."</td>";
										}
										elseif($i==1) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										elseif($i==2) {
											$row.="<td style='width:60px;'>".$rows."</td>";
										}
										elseif($i==3) {
											$row.="<td style='width:70px;'>".$rows."</td>";
										}
										elseif($i==5) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										else {
											$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
										}
										$i++;
									}
									$row.="</tr></table>";
									break;
								case 4:
									$data=array('','','','',$kd,$name,$kum);
									$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
									$i=0;
									foreach($data as $rows) {
										if($i==0) {
											$row.="<td style='width:30px;'>".$rows."</td>";
										}
										elseif($i==1) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										elseif($i==2) {
											$row.="<td style='width:60px;'>".$rows."</td>";
										}
										elseif($i==3) {
											$row.="<td style='width:70px;'>".$rows."</td>";
										}
										elseif($i==4) {
											$row.="<td style='width:80px;'><div style='padding:5px 0;'>".$rows."</div></td>";
										}
										elseif($i==6) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										else {
											$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
										}
										$i++;
									}
									$row.="</tr></table>";
									break;
								case 5:
									$data=array('','','','','',$kd,$name,$kum);
									$row.="<table border='0' cellpadding='1' cellspacing='1' style='background-color:#ddd;'><tr style='background-color:#eee;'>";
									$i=0;
									foreach($data as $rows) {
										if($i==0) {
											$row.="<td style='width:30px;'>".$rows."</td>";
										}
										elseif($i==1) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										elseif($i==2) {
											$row.="<td style='width:60px;'>".$rows."</td>";
										}
										elseif($i==3) {
											$row.="<td style='width:70px;'>".$rows."</td>";
										}
										elseif($i==4) {
											$row.="<td style='width:80px;'>".$rows."</td>";
										}
										elseif($i==5) {
											$row.="<td style='width:90px;'><div style='padding:5px 0;'>".$rows."</div></td>";
										}
										elseif($i==7) {
											$row.="<td style='width:50px;'>".$rows."</td>";
										}
										else {
											$row.="<td style='text-align:left;'><div style='padding:5px 0; padding-left:10px;'>".$rows."</div></td>";
										}
										$i++;
									}
									$row.="</tr></table>";
									break;
							}					
							
							$row.=fetch($rowShow['kdKategori'],$level+1,$group);
						}
					}
				}
				return $row;				
			}
			
			$isi.="
			<div id='tabs'>
				<ul>";
					$sqlTabs="	SELECT namaGroup  
								FROM ak_group";
					$DB->executeQuery($sqlTabs);
					if($DB->rs()) {
						if($DB->getRows()>0) {
							while($rowTabs=$DB->getResult()) {
								$isi.="<li><a href='#".$rowTabs['namaGroup']."'>".ucwords($rowTabs['namaGroup'])."</a></li>";
							}
						}
					}
				$isi.="
				</ul>";
				
				$sqlGroupDet="	SELECT idGroup, namaGroup  
								FROM ak_group";
				$queryGroupDet=mysql_query($sqlGroupDet,$DB->opendb());
				if(mysql_num_rows($queryGroupDet)>0) {
					$i=3;
					while($rowGroupDet=mysql_fetch_array($queryGroupDet)) {
						$isi.="	
						<div id='".$rowGroupDet['namaGroup']."'>";
							if($rowGroupDet['idGroup']==3 || $rowGroupDet['idGroup']==4) {
								$isi.=fetch(2,1,$rowGroupDet['idGroup']);
							}
							else {
								$isi.=fetch(0,0,$rowGroupDet['idGroup']);
							}
						$isi.="
						</div>";
						$i++;
					}
				}
			$isi.="
			</div>";
			break;
		default:
			$isi.="
			<div style='padding:20px;'>
				<div class='bold' style='width:100%; margin-bottom:30px;'><div style='text-align:center;'>PROFIL FAKULTAS SYARIAH DAN HUKUM UIN JAKARTA</div></div>
				<div class='bold'>VISI MISI</div>
				<div style='margin-top:5px;'>1. VISI</div>
				<div>
					<ul><li style='text-align:justify;'>Unggul, handal, dan terdepan (excellence, expertise, advance) dalam bidang ilmu syariah, ilmu hukum dan ilmu ekonomi Islam</li></ul>
				</div>
				<div>2. MISI</div>
				<div>
					<ul>
						<li style='text-align:justify;'>Melaksanakan pengajaran dan pendidikan yang integrative dalam ilmu syari’ah, ilmu hokum dan ilmu ekonomi Islam baik yang bersifat teroritis maupun praktis.</li>
						<li style='text-align:justify;'>Mengembangkan dan menerapkan ilmu syari'ah, ilmu hokum dan ilmu ekonomi Islam yang berbasis penelitian (research based university).</li>
						<li style='text-align:justify;'>Memberikan landasan ahklak dan moral terhadap pengembangan dan praktek ilmu syari?ah, ilmu hukum dan ilmu ekonomi Islam di masyarakat.</li>
						<li style='text-align:justify;'>Mengembangkan dan membina kehidupan civitas akademika yang menjunjung tinggi kebenaran, keterbukaan, kritis, kreatif, dan inovatif serta tanggap terhadap perubahan-perubahan social, baik dalam skala nasional maupun global.</li>
						<li style='text-align:justify;'>Menyelenggarakan manajemen modern perguruan tinggi yang berorientasi pada mutu, profesionalismi, dan keterbukaan serta memiliki daya saing yang tinggi dan kuat.</li>
						<li style='text-align:justify;'>Memupuk dan menjalin kerjasama yang saling menguntungkan dengan lembaga-lembaga pemerintah maupun non-pemerintah, perguruan tinggi, industri dan lain-l;ain, baik dalam maupun luar negeri.</li>
						<li style='text-align:justify;'>Memberikan perhatian yang sungguh-sungguh terhadap upaya implementasi syari’ah Islam dalam konteks keindonesiaan sekaligus kemodernan.</li>
					</ul>
				</div>
				
				<div class='bold'>TUJUAN FAKULTAS</div>
				<div style='margin-top:10px; text-align:justify;'>Tujuan pendidikan program sarjana bidang ilmu Syari?ah dan Hukum adalah menyiapkan peserta didik atau mahasiswa menjadi Sarjana Hukum Islam dan atau Sarjana Hukum yang memiliki kompetensi sebagai berikut:</div>
				<div>
					<ul>
						<li style='text-align:justify;'>Menyiapkan pesrta didik menjadi anggota masyarakat yang memiliki kemampuan akademik dan/atau profesional dibidang ilmu syari?ah, ilmu hokum dan ilmu ekonomi Islam.<li>
						<li style='text-align:justify;'>Mengembangkan dan menyebarluaskan ilmu pengetahuan dalam bidang ilmu syari?ah, ilmu hokum dan ekonomi Islam, serta mampu mengupayakannya untuk meningkatkan taraf kehidupan masyarakat dan memperkaya kebudayaan nasional.</li>
					</ul>
				</div>
			</div>";
	}
	
	$layout->setContent($isi);
	$layout->setNavigasi($nav);
	$layout->HTML_render();
?>