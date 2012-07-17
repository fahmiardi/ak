<?php
	$u['u=angkakredit']="angka kredit";
	
	switch($_GET['act']) {
		case 'finish':
			$nip=$user->getNip();
			$gol=1;
			$kdUnsur=1;
			$kdLevel1=1;
			break;
		case 'lanjut1':
			$items=$_POST['items'];
			$jumlah=count($items);
			if($jumlah!=0) {
				$isi.="<form action='?u=$_GET[u]&act=lanjut1&unsur=$_GET[unsur]' method='post'>	
							<table cellpadding='1' cellspacing='1' style='text-align: left;' bgcolor='#f5f0f0'>";
				foreach($items as $item) {
					$explode=explode("-",$item);
					$jmlExplode=count($explode);						
					$kdUnsur=$explode[0];
					$kdLevel1=$explode[1];
					if($jmlExplode>=3) {
						$kdLevel2=$explode[2];
						$kdLevel3=$explode[3];
						$kdLevel4=$explode[4];
					}
					//$isi.="$kdUnsur - $kdLevel1 - $kdLevel2 - $kdLevel3 - $kdLevel4<br>";
					
					$sqlUnsur="	SELECT kdUnsur, namaUnsur 
								FROM tbl_paramunsur 
								WHERE kdUnsur='$kdUnsur' 
								ORDER BY kdUnsur ASC";
					$queryUnsur=mysql_query($sqlUnsur,$DB->opendb());
					if($queryUnsur!=null) {
						if(mysql_num_rows($queryUnsur)>0) {								
							while($rowUnsur=mysql_fetch_array($queryUnsur)) {						
										$isi.="
										<tr bgcolor='#9ace9d'>
											<td width='30' style='text-align: center; font-weight: bold;' height='30'>".strtoupper($rowUnsur['kdUnsur']).". </td>
											<td style='font-weight: bold;'>".strtoupper($rowUnsur['namaUnsur'])."</td>
											<td style='text-align:center;width:59px;'><b>AK</b></td>
										</tr>
										<tr  bgcolor='#d2f7ce'>
											<td colspan='3'>";
												$sqlLevel1="SELECT kdLevel1, namaLevel1 
															FROM tbl_paramlevel1 
															WHERE kdLevel1='$kdLevel1' 
															ORDER BY kdLevel1 ASC";
												$queryLevel1=mysql_query($sqlLevel1,$DB->opendb())or die(mysql_error());
												if($queryLevel1!=null) {
													if(mysql_num_rows($queryLevel1)>0) {
														$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' border='0' bgcolor='#f5f0f0'>";
														//$no=1;
														while($rowLevel1=mysql_fetch_array($queryLevel1)) {
															$isi.="	<tr  bgcolor='#d2f7ce'>
																		<td width='28' style='text-align:center;'>";
																				$input1="";
																				$dok1="";
																		$isi.="$input1
																		</td>
																		<td width='30' style='vertical-align:top;'>$rowLevel1[kdLevel1]. </td>
																		<td>$rowLevel1[namaLevel1]<br>$dok1</td>
																		<td style='text-align:right;width:57px;'></td>
																	</tr>
																	<tr  bgcolor='#d2f7ce'>
																		<td colspan='4'>";
																			$sqlLevel2="SELECT kdLevel2, namaLevel2, nilaiKUM 
																						FROM tbl_paramlevel2 
																						WHERE kdLevel2='$kdLevel2' 
																						ORDER BY kdLevel2 ASC";
																			$queryLevel2=mysql_query($sqlLevel2,$DB->opendb())or die(mysql_error());
																			if(mysql_num_rows($queryLevel2)>0) {
																				$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' border='0' bgcolor='#f5f0f0'>";
																				//$i=1;
																				while($rowLevel2=mysql_fetch_array($queryLevel2)) {
																					if($rowLevel2['nilaiKUM']!=0) {
																						$ak2=$rowLevel2['nilaiKUM'];
																						$input2="";																								
																						$dok2="
																							<table style='text-align:left;' cellpadding='1' cellspacing='1' bgcolor='#f5f0f0'>
																								<tr  bgcolor='#d2f7ce'>
																									<td style='vertical-align:top; width:40px;'><b>Note</b></td>
																									<td width='400'>
																										<textarea name='notes[]' style='width:400px; height:150px;'></textarea><br>
																										<span style='font-size:small;font-style:italic;color:red;width:400px;'>*Note ini harap diisi untuk keperluan verifikasi. Bisa berisi informasi tentang bukti-bukti fisik yang mendukung.</span>
																									</td>
																									<td style='font-size:small;vertical-align:top;font-style:italic;'>Untuk ganti baris, gunakan tanda #</td>
																								</tr>
																							</table>
																							";
																					}
																					else {
																						$ak2="";
																						$input2="";
																						$dok2="";
																					}
																					$isi.="	<tr  bgcolor='#d2f7ce'>
																								<td width='26' style='text-align:center;'></td>
																								<td width='30' style='text-align:center;'>$input2</td>
																								<td width='30' style='vertical-align:top;'>$rowLevel2[kdLevel2]. </td>
																								<td>$rowLevel2[namaLevel2]<br>$dok2</td>
																								<td style='text-align:right;padding-right:10px;width:46px;'>$ak2</td>
																							</tr>
																							<tr  bgcolor='#d2f7ce'>
																								<td colspan='5'>";
																									$sqlLevel3="SELECT kdLevel3, namaLevel3, nilaiKUM 
																												FROM tbl_paramlevel3 
																												WHERE kdLevel3='$kdLevel3' 
																												ORDER BY kdLevel3 ASC";
																									$queryLevel3=mysql_query($sqlLevel3,$DB->opendb())or die(mysql_error());
																									if(mysql_num_rows($queryLevel3)>0) {
																										$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' bgcolor='#f5f0f0'>";
																										//$j=1;
																										while($rowLevel3=mysql_fetch_array($queryLevel3)) {
																											if($rowLevel3['nilaiKUM']!=0) {
																												$ak3=$rowLevel3['nilaiKUM'];
																												$input3="";
																												$dok3="
																													<table style='text-align:left;' cellpadding='1' cellspacing='1' bgcolor='#f5f0f0'>
																														<tr  bgcolor='#d2f7ce'>
																															<td style='vertical-align:top; width:40px;'><b>Note</b></td>
																															<td width='400'>
																																<textarea name='notes[]' style='width:400px; height:150px;'></textarea><br>
																																<span style='font-size:small;width:400px;font-style:italic;color:red;'>*Note ini harap diisi untuk keperluan verifikasi. Bisa berisi informasi tentang bukti-bukti fisik yang mendukung.</span>
																															</td>
																															<td style='font-size:small;vertical-align:top;font-style:italic;'>Untuk ganti baris, gunakan tanda #</td>
																														</tr>
																													</table>
																													";
																											}
																											else {
																												$ak3="";
																												$input3="";
																												$dok3="";
																											}
																											$isi.="	<tr  bgcolor='#d2f7ce'>
																														<td width='24' style='text-align:center;'></td>
																														<td width='30' style='text-align:center;'></td>
																														<td width='30' style='text-align:center;'>$input3</td>
																														<td width='30' style='vertical-align:top;'>$rowLevel3[kdLevel3]. </td>
																														<td>$rowLevel3[namaLevel3]<br>$dok3</td>
																														<td style='text-align:right;padding-right:10px;width:44px;'>$ak3</td>
																													</tr>
																													<tr  bgcolor='#d2f7ce'>
																														<td colspan='6'>";
																															$sqlLevel4="SELECT kdLevel4, namaLevel4, nilaiKUM 
																																		FROM tbl_paramlevel4 
																																		WHERE kdLevel4='$kdLevel4' 
																																		ORDER BY kdLevel4 ASC";
																															$queryLevel4=mysql_query($sqlLevel4,$DB->opendb())or die(mysql_error());
																															if(mysql_num_rows($queryLevel4)>0) {
																																$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' bgcolor='#f5f0f0'>";
																																//$k=1;
																																while($rowLevel4=mysql_fetch_array($queryLevel4)) {
																																	$dok4="
																																		<table style='text-align:left;' cellpadding='1' cellspacing='1' bgcolor='#f5f0f0'>
																																			<tr  bgcolor='#d2f7ce'>
																																				<td style='vertical-align:top; width:40px;'><b>Note</b></td>
																																				<td width='400'>
																																					<textarea name='notes[]' style='width:400px; height:150px;'></textarea><br>
																																					<span style='font-size:small;width:400px;font-style:italic;color:red;'>*Note ini harap diisi untuk keperluan verifikasi. Bisa berisi informasi tentang bukti-bukti fisik yang mendukung.</span>
																																				</td>
																																				<td style='font-size:small;vertical-align:top;font-style:italic;'>Untuk ganti baris, gunakan tanda #</td>
																																			</tr>
																																		</table>
																																		";
																																	$input4="";
																																	$isi.="	<tr  bgcolor='#d2f7ce'>
																																				<td width='22' style='text-align:center;'></td>
																																				<td width='30' style='text-align:center;'></td>
																																				<td width='30' style='text-align:center;'></td>
																																				<td width='30' style='text-align:center;'>$input4</td>
																																				<td width='30' style='vertical-align:top;'>$rowLevel4[kdLevel4]. </td>
																																				<td>$rowLevel4[namaLevel4]<br>$dok4</td>
																																				<td style='text-align:right;padding-right:10px;width:42px;'>$rowLevel4[nilaiKUM]</td>
																																			</tr>";
																																	$k++;
																																}
																																$isi.="</table>";
																															}
																														$isi.="																													
																														</td>
																													</tr>";
																											$j++;
																										}
																										$isi.="</table>";
																									}
																								$isi.="
																								</td>
																							</tr>";
																					$i++;
																				}
																				$isi.="</table>";
																			}
																		$isi.="
																		</td>
																	</tr>";
																$no++;
														}
														$isi.="</table>";
													}
												}
											$isi.="	
											</td>
										</tr>";																		
							}								
						}
					}
					
				}
					$isi.="
					<tr>
							<td colspan='3' style='text-align:right; padding-right:10px;'><input type='submit' value='Finish' name='lanjut2'></td>
						<tr>
					</table>
					</form>";					
			}
			else {
				$isi.="Kosong";
			}
			break;				
		default:
			$arrUnsur=array('1'=>array('pendidikan'=>'Unsur Utama Pendidikan'),'2'=>array('tridharma'=>'Unsur Utama Tridharma Perguruan Tinggi'),'3'=>array('penunjang'=>'Unsur Penunjang'));
			foreach($arrUnsur as $kode=>$texts) {
				foreach($texts as $url=>$tab) {				
					if($url==$_GET['unsur']) {
						$u['&unsur='.$url]="Unsur $url";
						$isi.="<a href='?u=$_GET[u]&act=$_GET[act]&unsur=$url' style='display:block; float:left;padding-left:10px;text-decoration:underline;'>$tab</a>&nbsp;&nbsp;";
						$sqlUnsur="	SELECT kdUnsur, namaUnsur 
									FROM tbl_paramunsur 
									WHERE kdUnsur='$kode' 
									ORDER BY kdUnsur ASC";
					}
					else {
						$isi.="<a href='?u=$_GET[u]&act=$_GET[act]&unsur=$url' style='display:block; float:left;padding-left:10px;text-decoration:none;'>$tab</a>&nbsp;&nbsp;";
						
					}
				}
			}
			
			$queryUnsur=mysql_query($sqlUnsur,$DB->opendb());
			if($queryUnsur!=null) {
				if(mysql_num_rows($queryUnsur)>0) {
					$isi.="<form action='?u=$_GET[u]&act=lanjut1&unsur=$_GET[unsur]' method='post'>	
							<table cellpadding='1' cellspacing='1' style='text-align: left;' bgcolor='#f5f0f0'>";
					while($rowUnsur=mysql_fetch_array($queryUnsur)) {						
								$isi.="
								<tr bgcolor='#9ace9d'>
									<td width='30' style='text-align: center; font-weight: bold;' height='30'>".strtoupper($rowUnsur['kdUnsur']).". </td>
									<td style='font-weight: bold;'>".strtoupper($rowUnsur['namaUnsur'])."</td>
									<td style='text-align:center;width:59px;'><b>AK</b></td>
								</tr>
								<tr  bgcolor='#d2f7ce'>
									<td colspan='3'>";
										$sqlLevel1="SELECT kdLevel1, namaLevel1 
													FROM tbl_paramlevel1 
													WHERE kdUnsur='$rowUnsur[kdUnsur]' 
													ORDER BY kdLevel1 ASC";
										$queryLevel1=mysql_query($sqlLevel1,$DB->opendb())or die(mysql_error());
										if($queryLevel1!=null) {
											if(mysql_num_rows($queryLevel1)>0) {
												$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' border='0' bgcolor='#f5f0f0'>";
												//$no=1;
												while($rowLevel1=mysql_fetch_array($queryLevel1)) {
													$isi.="	<tr  bgcolor='#d2f7ce'>
																<td width='28' style='text-align:center;'>";
																	
																$isi.="$input1
																</td>
																<td width='30' style='vertical-align:top;'>$rowLevel1[kdLevel1]. </td>
																<td>$rowLevel1[namaLevel1]</td>
																<td style='text-align:right;width:57px;'></td>
															</tr>
															<tr  bgcolor='#d2f7ce'>
																<td colspan='4'>";
																	$sqlLevel2="SELECT kdLevel2, namaLevel2, nilaiKUM 
																				FROM tbl_paramlevel2 
																				WHERE kdLevel1='$rowLevel1[kdLevel1]' 
																				ORDER BY kdLevel2 ASC";
																	$queryLevel2=mysql_query($sqlLevel2,$DB->opendb())or die(mysql_error());
																	if(mysql_num_rows($queryLevel2)>0) {
																		$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' border='0' bgcolor='#f5f0f0'>";
																		//$i=1;
																		while($rowLevel2=mysql_fetch_array($queryLevel2)) {																				
																			if($rowLevel2['nilaiKUM']!=0) {
																				$ak2=$rowLevel2['nilaiKUM'];
																				$input2="<input type='checkbox' name='items[]' value='$rowUnsur[kdUnsur]-$rowLevel1[kdLevel1]-$rowLevel2[kdLevel2]'>";
																			}
																			else {
																				$ak2="";
																				$input2="";
																			}
																			$isi.="	<tr  bgcolor='#d2f7ce'>
																						<td width='26' style='text-align:center;'></td>
																						<td width='30' style='text-align:center;'>$input2</td>
																						<td width='30' style='vertical-align:top;'>$rowLevel2[kdLevel2]. </td>
																						<td>$rowLevel2[namaLevel2]</td>
																						<td style='text-align:right;padding-right:10px;width:46px;'>$ak2</td>
																					</tr>
																					<tr  bgcolor='#d2f7ce'>
																						<td colspan='5'>";
																							$sqlLevel3="SELECT kdLevel3, namaLevel3, nilaiKUM 
																										FROM tbl_paramlevel3 
																										WHERE kdLevel2='$rowLevel2[kdLevel2]' 
																										ORDER BY kdLevel3 ASC";
																							$queryLevel3=mysql_query($sqlLevel3,$DB->opendb())or die(mysql_error());
																							if(mysql_num_rows($queryLevel3)>0) {
																								$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' bgcolor='#f5f0f0'>";
																								//$j=1;
																								while($rowLevel3=mysql_fetch_array($queryLevel3)) {
																									if($rowLevel3['nilaiKUM']!=0) {
																										$ak3=$rowLevel3['nilaiKUM'];
																										$input3="<input type='checkbox' name=items[] value='$rowUnsur[kdUnsur]-$rowLevel1[kdLevel1]-$rowLevel2[kdLevel2]-$rowLevel3[kdLevel3]'>";
																									}
																									else {
																										$ak3="";
																										$input3="";
																									}
																									$isi.="	<tr  bgcolor='#d2f7ce'>
																												<td width='24' style='text-align:center;'></td>
																												<td width='30' style='text-align:center;'></td>
																												<td width='30' style='text-align:center;'>$input3</td>
																												<td width='30' style='vertical-align:top;'>$rowLevel3[kdLevel3]. </td>
																												<td>$rowLevel3[namaLevel3]</td>
																												<td style='text-align:right;padding-right:10px;width:44px;'>$ak3</td>
																											</tr>
																											<tr  bgcolor='#d2f7ce'>
																												<td colspan='6'>";
																													$sqlLevel4="SELECT kdLevel4, namaLevel4, nilaiKUM 
																																FROM tbl_paramlevel4 
																																WHERE kdLevel3='$rowLevel3[kdLevel3]' 
																																ORDER BY kdLevel4 ASC";
																													$queryLevel4=mysql_query($sqlLevel4,$DB->opendb())or die(mysql_error());
																													if(mysql_num_rows($queryLevel4)>0) {
																														$isi.="<table cellpadding='1' cellspacing='1' style='text-align: left;' bgcolor='#f5f0f0'>";
																														//$k=1;
																														while($rowLevel4=mysql_fetch_array($queryLevel4)) {
																															$isi.="	<tr  bgcolor='#d2f7ce'>
																																		<td width='22' style='text-align:center;'></td>
																																		<td width='30' style='text-align:center;'></td>
																																		<td width='30' style='text-align:center;'></td>
																																		<td width='30' style='text-align:center;'>
																																			<input type='checkbox' name=items[] value='$rowUnsur[kdUnsur]-$rowLevel1[kdLevel1]-$rowLevel2[kdLevel2]-$rowLevel3[kdLevel3]-$rowLevel4[kdLevel4]'>
																																		</td>
																																		<td width='30' style='vertical-align:top;'>$rowLevel4[kdLevel4]. </td>
																																		<td>$rowLevel4[namaLevel4]</td>
																																		<td style='text-align:right;padding-right:10px;width:42px;'>$rowLevel4[nilaiKUM]</td>
																																	</tr>";
																															$k++;
																														}
																														$isi.="</table>";
																													}
																												$isi.="																													
																												</td>
																											</tr>";
																									$j++;
																								}
																								$isi.="</table>";
																							}
																						$isi.="
																						</td>
																					</tr>";
																			//$i++;
																		}
																		$isi.="</table>";
																	}
																$isi.="
																</td>
															</tr>";
														//$no++;
												}
												$isi.="</table>";
											}
										}
									$isi.="	
									</td>
								</tr>
								<tr>
									<td colspan='3' style='text-align:right; padding-right:10px;'><input type='submit' value='Lanjut' name='lanjut1'></td>
								<tr>";								
					}
					$isi.="</table>
						</form>";
				}
			}
			else {
				header("Location: ./page.php?u=$_GET[u]&act=unsur&unsur=pendidikan");
			}
	}		
	$layout->setSitemaps($u);
	$layout->setContent($isi);
	$layout->HTML_render();
?>