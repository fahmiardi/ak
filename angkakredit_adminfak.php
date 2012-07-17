<?php
	$nav=array(	"button2.png"=>array("?u=$_GET[u]"=>"List Kategori", "?u=$_GET[u]&opt=rule"=>"Rule Kategori"),
			);
			
	switch($_GET['opt']) {
		//BLOK ADMINISTRASI DATA RULE
		case 'rule':
			switch($_GET['act']) {
				case 'tambah':
					switch($_GET['do']) {
						case 'save':
							$kdRule=$_POST['kdRule'];
							$namaRule=$_POST['namaRule'];
							$parentId=$_POST['parentId'];
							
							$sqlSave="	INSERT INTO ak_rule 
										VALUES (null,
												'".$kdRule."',
												'".$namaRule."',
												'".$parentId."',
												'')";
							$DB->executeQuery($sqlSave);
							if($DB->notNull()) {						
								if($parentId!=0) {
									$sqlSelect="SELECT count FROM ak_rule WHERE kdRule='".$parentId."'";
									$DB->executeQuery($sqlSelect);
									if($DB->getRows()==1) {
										$rowSelect=$DB->getResult();
										$count=$rowSelect['count']+1;
										$sqlUpdate="UPDATE ak_rule SET count='".$count."' WHERE kdRule='".$parentId."'";
										$DB->executeQuery($sqlUpdate);
										if($DB->notNull()) {
											header("Location: ./page.php?u=angkakredit&opt=rule");
										}
									}
								}
								else {
									header("Location: ./page.php?u=angkakredit&opt=rule");
								}
							}
							break;
							break;
					}
					break;
				default:
					$isi="	<div class='kategori'><span class='f-verdana'>Rule Kategori Angka Kredit</span></div>
							<div class='fl left-content'>
								<form action='?u=angkakredit&opt=rule&act=tambah&do=save' method='post'>
									<div class='tambah'><span>Tambah Baru</span></div>
									<div class='form-tambah'>
										<div class='f-verdana'>Kode Rule Kategori</div>
										<input type='text' name='kdRule' class='input' style='width:150px;'><br />
										<span class='f-verdana'>(required) Kode Rule Kategori ini UNIQUE</span>
									</div>
									<div class='form-tambah'>
										<div class='f-verdana'>Nama Rule Kategori</div>
										<textarea class='input' style='width:300px; height:100px;' name='namaRule'></textarea><br />
										<span class='f-verdana'>(required) Nama ini akan muncul pada rule kategori angka kredit. Perhatikan kapitalisasi huruf.</span>
									</div>
									<div class='form-tambah'>
										<div class='f-verdana'>Parent</div>";
										function display_combobox($parent, $level) {
											global $DB;
											$sqlShow="	SELECT kdRule, namaRule 
														FROM ak_rule 
														WHERE parentId='".$parent."'";
											$queryShow=mysql_query($sqlShow,$DB->opendb());
											if($queryShow!=null) {
												if(mysql_num_rows($queryShow)>0) {
													while($rowShow=mysql_fetch_array($queryShow)) {
														$j.="<option value='".$rowShow['kdRule']."'>".str_repeat("- ",$level).$rowShow['namaRule']."</option>";
														$j.=display_combobox($rowShow['kdRule'],$level+1);
													}
												}
											}
											return $j;
										}
										$isi.="
										<select class='form-select' style='height:30px; width:150px;' name='parentId'>
											<option value='0'>None</option>".display_combobox(0,0)."
										</select><br />
										<span class='f-verdana'>Klasifikasi rule kategori yang disusun secara Hierarki berdasarkan kelompoknya.</span>
									</div>
									<div style='text-align:right;'><input type='submit' class='submit' value='Tambahkan'></div>
								</form>
							</div>
							
							<div class='right-content'>
								<div class='show'>
									<div class='show-head'>
										<div class='show-name f-verdana free2'>Nama Rule Kategori Angka Kredit</div>
									</div>									
									<div class='list' style='background-color:#f7f5f5;'>";					
										function display_rule($parent, $level) {
											global $DB;
											$sqlShow="	SELECT kdRule, namaRule, count 
														FROM ak_rule 
														WHERE parentId='".$parent."'";
											$queryShow=mysql_query($sqlShow,$DB->opendb());
											if($queryShow!=null) {
												if(mysql_num_rows($queryShow)>0) {
													while($rowShow=mysql_fetch_array($queryShow)) {		
														$name=$rowShow['namaRule'];
														if($rowShow['count']==0) {
															if($level!=0) {
																$a="<a href='#' class='addtocart' title='#KODE:".$rowShow['kdRule']." | Edit' alt='".$name."'>";
																$b="</a>";
															}
															else {
																$a="<a href='#' class='addtocart2' title='#KODE:".$rowShow['kdRule']." | Edit' alt='".$name."'>";
																$b="</a>";
															}
														}
														else {
															$a="<a href='#' class='addtocart2' title='#KODE:".$rowShow['kdRule']." | Edit' alt='".$name."'>";
															$b="</a>";
														}
														$margin=10*$level."px";
														$j.="<div class='f-verdana' style='overflow:auto;'>".str_repeat("<div style='float:left;'>-</div>",$level)."<div style='margin-left:".$margin.";'>".$a.$name.$b."</div>".display_rule($rowShow['kdRule'],$level+1)."</div>";								
														
													}
												}
											}
											return $j;
										}
										$isi.="
										<div style='padding:5px 10px; background-color:#f7f5f5;'>".display_rule(0,0)."</div>	
									</div>									
								</div>
							</div>";
			}
			break;
		//BLOK ADMINISTRASI DATA KATEGORI
		default://opt=kategori			
			switch($_GET['act']) {
				case 'tambah':
					switch($_GET['do']) {
						case 'save':				
							$kdKategori=$_POST['kdKategori'];
							$namaKategori=$_POST['namaKategori'];
							$deskripsi=$_POST['deskripsi'];
							$parentId=$_POST['parentId'];
							$idGroup=$_POST['idGroup'];
							
							$sqlSave="	INSERT INTO ak_kategori 
										VALUES (null,
												'".$kdKategori."',
												'".$namaKategori."',
												'".$deskripsi."',
												'".$parentId."',
												'',
												'".$idGroup."')";
							$DB->executeQuery($sqlSave);
							if($DB->notNull()) {						
								if($parentId!=0) {
									$sqlSelect="SELECT count FROM ak_kategori WHERE kdKategori='".$parentId."'";
									$DB->executeQuery($sqlSelect);
									if($DB->getRows()==1) {
										$rowSelect=$DB->getResult();
										$count=$rowSelect['count']+1;
										$sqlUpdate="UPDATE ak_kategori SET count='".$count."' WHERE kdKategori='".$parentId."'";
										$DB->executeQuery($sqlUpdate);
										if($DB->notNull()) {
											header("Location: ./page.php?u=angkakredit");
										}
									}
								}
								else {
									header("Location: ./page.php?u=angkakredit");
								}
							}
							break;
					}
					break;
				case 'edit':
					switch($_GET['do']) {
						case 'update':
							if(isset($_POST['update'])) {
								$idKategori=$_POST['idKategori'];
								$kdKategori=$_POST['kdKategori'];
								$namaKategori=$_POST['namaKategori'];
								$deskripsi=$_POST['deskripsi'];
								$count=$_POST['count'];
								$tipeAK=$_POST['tipeAK'];
								$kdRules=$_POST['kdRule'];
								$value=$_POST['value'];
								
								$sqlUp="UPDATE ak_kategori 
										SET kdKategori='".$kdKategori."', 
											namaKategori='".$namaKategori."', 
											deskripsi='".$deskripsi."' 
										WHERE idKategori='".$idKategori."'";
								$DB->executeQuery($sqlUp);
								if($DB->notNull()) {	
									if($count==0) {
										$sqlCek="	SELECT kdKategori 
													FROM ak_relasi_kategori 
													WHERE kdKategori='".$kdKategori."'";
										$DB->executeQuery($sqlCek);
										if($DB->getRows()>0) {
											$jmlh=count($kdRules);
											if($jmlh>0) {
												foreach($kdRules as $kdRule) {
													if($kdRule==5) {
														$sqlUp="UPDATE ak_relasi_kategori 
																SET valueAK='".$value[$kdRule]."', tipeAK='".$tipeAK."' 
																WHERE kdKategori='".$kdKategori."' 
																AND kdRule='".$kdRule."'";
													}
													elseif($kdRule==3) {
														$sqlUp="UPDATE ak_relasi_kategori 
																SET valuePatut='".$value[$kdRule]."' 
																WHERE kdKategori='".$kdKategori."' 
																AND kdRule='".$kdRule."'";
													}
													else {
														$sqlUp="UPDATE ak_relasi_kategori 
																SET valueKd='".$value[$kdRule]."' 
																WHERE kdKategori='".$kdKategori."' 
																AND kdRule='".$kdRule."'";
													}
													$DB->executeQuery($sqlUp);
													if($DB->notNull()) {
														$auth=true;
													}
													else {
														$auth=false;
													}
												}
												if($auth) {
													header("Location: ./page.php?u=angkakredit");
												}
											}
										}
										else {
											$jmlh=count($kdRules);
											if($jmlh>0) {
												foreach($kdRules as $kdRule) {
													if($kdRule==5) {
														$sqlIns="INSERT INTO ak_relasi_kategori VALUES(null,'".$kdKategori."','".$kdRule."','".$value[$kdRule]."','','','".$tipeAK."')";
													}
													elseif($kdRule==3) {
														$sqlIns="INSERT INTO ak_relasi_kategori VALUES(null,'".$kdKategori."','".$kdRule."','','','".$value[$kdRule]."','')";
													}
													else {
														$sqlIns="INSERT INTO ak_relasi_kategori VALUES(null,'".$kdKategori."','".$kdRule."','','".$value[$kdRule]."','','')";
													}
													$DB->executeQuery($sqlIns);
													if($DB->notNull()) {
														$auth=true;
													}
													else {
														$auth=false;
													}
												}
												if($auth) {
													header("Location: ./page.php?u=angkakredit");
												}
											}
										}	
									}
									else {
										header("Location: ./page.php?u=angkakredit");
									}
								}
							}
							break;
						default:
							$idKategori=$_GET['idKategori'];
							
							$sqlKat="	SELECT idKategori, count, kdKategori, namaKategori, deskripsi, idGroup 
										FROM ak_kategori 
										WHERE kdKategori='".$idKategori."'";
							$DB->executeQuery($sqlKat);
							if($DB->getRows()==1) {
								$rowKat=$DB->getResult();								
								if($rowKat['idGroup']=="1"||$rowKat['idGroup']=="2") {
									$ak=1;
								}
								else {
									$ak=0;
								}
								
								$isi="	<form action='?u=angkakredit&opt=kategori&act=edit&do=update' method='post'>
											<input type='hidden' name='tipeAK' value='".$ak."'>
											<input type='hidden' name='idKategori' value='".$rowKat['idKategori']."'>
											<input type='hidden' name='count' value='".$rowKat['count']."'>
											<div class='kategori' style='padding-bottom:15px;'><span class='f-verdana'>Edit Angka Kredit</span></div>
											<div class='master-edit'>
												<div class='fl left-content'>
													<div class='show-head free2'>
														<div class='show-name f-verdana free'>Kategori Angka Kredit</div>
													</div>
													<div class='list'>
														<div class='form-tambah free'>
															<div class='f-verdana'>Kode Kategori</div>
															<input type='text' name='kdKategori' class='input' style='width:150px;' value='".$rowKat['kdKategori']."'><br />
															<span class='f-verdana'>(required) Kode Kategori ini UNIQUE</span>
														</div>
														<div class='form-tambah free'>
															<div class='f-verdana'>Nama Kategori</div>
															<textarea class='input' style='width:300px; height:100px;' name='namaKategori'>".$rowKat['namaKategori']."</textarea><br />
															<span class='f-verdana'>(required) Nama ini akan muncul pada kategori angka kredit. Perhatikan kapitalisasi huruf.</span>
														</div>
														<div class='form-tambah free'>
															<div class='f-verdana'>Deskripsi</div>
															<textarea class='input' style='width:300px; height:100px;' name='deskripsi'>".$rowKat['deskripsi']."</textarea><br />
															<span class='f-verdana'>(optional) Deskripsi tentang Kategori. Perhatikan kapitalisasi huruf.</span>
														</div>
													</div>
												</div>";	
								
								if($rowKat['count']==0) {
										$isi.="	<div class='right-content'>
													<div class='show-head free2'>
														<div class='show-name f-verdana free2'>Rule Kategori Angka Kredit</div>
													</div>
													<div class='list'>";
														$sqlProperti="	SELECT R.count, R.kdRule, R.namaRule, R.parentId, Rk.valueAK, Rk.valueKd, Rk.valuePatut 
																		FROM ak_rule R, ak_relasi_kategori Rk 
																		WHERE parentId='0' 
																		AND Rk.kdKategori='".$rowKat['kdKategori']."' 
																		AND Rk.kdRule=R.kdRule";
														$DB->executeQuery($sqlProperti);
														if($DB->rs()) {
															while($rowProperti=$DB->getResult()) {
																$isi.="	<input type='hidden' name='kdRule[]' value='".$rowProperti['kdRule']."'>
																		<div class='review-isi'>
																			<div class='review-isi-head fl'>".$rowProperti['namaRule']."</div>
																			<div class='review-isi-skat fl'>:</div>
																			<div class='review-isi-value fl'>";
																				if($rowProperti['count']==0) {
																					if($rowProperti['kdRule']=="3") {
																						$val=$rowProperti['valuePatut'];
																					}
																					else {
																						$val=$rowProperti['valueAK'];
																					}
																					$isi.="<input type='text' value='".$val."' name='value[".$rowProperti['kdRule']."]' class='input' style='width:100px;'>";																					
																				}
																				else {
																					$val=$rowProperti['valueKd'];
																					$isi.="
																						<select class='form-select' style='height:30px; width:150px;' name='value[".$rowProperti['kdRule']."]'>
																							<option value='0'>Pilih</option>";
																						$sqlCont="	SELECT kdRule, namaRule, count  
																									FROM ak_rule 
																									WHERE parentId='".$rowProperti['kdRule']."'";
																						$queryCont=mysql_query($sqlCont,$DB->opendb());
																						if(mysql_num_rows($queryCont)>0) {																					
																							while($rowCont=mysql_fetch_array($queryCont)) {
																								$kdRule=$rowCont['kdRule'];
																								$namaRule=$rowCont['namaRule'];
																								if($kdRule==$val) {
																									$isi.="<option value=\"$kdRule\" SELECTED='SELECTED'>$namaRule</option>";
																								}
																								else {
																									$isi.="<option value=\"$kdRule\">$namaRule</option>";
																								}																								
																							}
																						}
																						$isi.="	
																						</select>";
																				}
																			$isi.="	
																			</div>
																		</div>";
															}
														}
													$isi.="													
													</div>
												</div>
											</div>";
								}
								else {
									$isi.="	</div>";
								}
								$isi.="		<div style='padding-top:10px;'><input type='submit' value='Update' name='update' class='submit' style='width:100%;'></div>
										</form>";	
							}
					}
					break;
				case 'hapus':
					//
					break;
				default:
					$isi="	<div class='kategori'><span class='f-verdana'>Kategori Angka Kredit</span></div>
							
							<div class='fl left-content'>
								<form action='?u=angkakredit&opt=kategori&act=tambah&do=save' method='post'>
									<div class='tambah'><span>Tambah Baru</span></div>
									<div class='form-tambah'>
										<div class='f-verdana'>Kode Kategori</div>
										<input type='text' name='kdKategori' class='input' style='width:150px;'><br />
										<span class='f-verdana'>(required) Kode Kategori ini UNIQUE</span>
									</div>
									<div class='form-tambah'>
										<div class='f-verdana'>Nama Kategori</div>
										<textarea class='input' style='width:300px; height:100px;' name='namaKategori'></textarea><br />
										<span class='f-verdana'>(required) Nama ini akan muncul pada kategori angka kredit. Perhatikan kapitalisasi huruf.</span>
									</div>
									<div class='form-tambah'>
										<div class='f-verdana'>Deskripsi</div>
										<textarea class='input' style='width:300px; height:100px;' name='deskripsi'></textarea><br />
										<span class='f-verdana'>(optional) Deskripsi tentang Kategori. Perhatikan kapitalisasi huruf.</span>
									</div>
									<div class='form-tambah'>
										<div class='f-verdana'>Group Kategori</div>
										<select class='form-select' style='height:30px; width:150px;' name='idGroup'>
											<option value='0'>Pilih</option>";
											$sqlGroup="	SELECT idGroup, namaGroup 
														FROM ak_group";
											$DB->executeQuery($sqlGroup);
											if($DB->rs()) {
												while($rowGroup=$DB->getResult()) {
													$isi.="<option value='".$rowGroup['idGroup']."'>".strtoupper($rowGroup['namaGroup'])."</option>";
												}
											}
										$isi.="
										</select><br />
										<span class='f-verdana'>(required)</span>
									</div>
									<div class='form-tambah'>
										<div class='f-verdana'>Parent</div>";
										function display_combobox($parent, $level) {
											global $DB;
											$sqlShow="	SELECT kdKategori, namaKategori 
														FROM ak_kategori 
														WHERE parentId='".$parent."'";
											$queryShow=mysql_query($sqlShow,$DB->opendb());
											if($queryShow!=null) {
												if(mysql_num_rows($queryShow)>0) {
													while($rowShow=mysql_fetch_array($queryShow)) {
														$j.="<option value='".$rowShow['kdKategori']."'>".str_repeat("- ",$level).$rowShow['namaKategori']."</option>";
														$j.=display_combobox($rowShow['kdKategori'],$level+1);
													}
												}
											}
											return $j;
										}
										$isi.="
										<select class='form-select' style='height:30px; width:150px;' name='parentId'>
											<option value='0'>None</option>".display_combobox(0,0)."
										</select><br />
										<span class='f-verdana'>Klasifikasi kategori yang disusun secara Hierarki berdasarkan kelompoknya.</span>
									</div>
									<div style='text-align:right;'><input type='submit' class='submit' value='Tambahkan'></div>
								</form>
							</div>
							
							<div class='right-content'>
								<div class='show'>
									<div class='show-head'>
										<div class='show-name f-verdana'>Nama Kategori Angka Kredit</div>
									</div>									
									<div class='list'>";					
										function display_kategori($parent, $level) {
											global $DB;
											$sqlShow="	SELECT kdKategori, namaKategori, count 
														FROM ak_kategori 
														WHERE parentId='".$parent."'";
											$queryShow=mysql_query($sqlShow,$DB->opendb());
											if($queryShow!=null) {
												if(mysql_num_rows($queryShow)>0) {
													while($rowShow=mysql_fetch_array($queryShow)) {									
														if($level==0) {
															$j.="<h3><a href='#' class='pengajuan f-verdana'>".$rowShow['namaKategori']."</a></h3>";
															$name=$rowShow['namaKategori'];
														}
														else {
															$name=$rowShow['namaKategori'];
														}
														if($rowShow['count']==0) {
															if($level!=0) {
																$a="<a href='?u=angkakredit&opt=kategori&act=edit&idKategori=".$rowShow['kdKategori']."' class='addtocart' title='#KODE:".$rowShow['kdKategori']." | Edit' alt='".$name."'>";
																$b="</a>";
															}
															else {
																$a="<a href='?u=angkakredit&opt=kategori&act=edit&idKategori=".$rowShow['kdKategori']."' class='addtocart2' title='#KODE:".$rowShow['kdKategori']." | Edit' alt='".$name."'>";
																$b="</a>";
															}
														}
														else {
															$a="<a href='?u=angkakredit&opt=kategori&act=edit&idKategori=".$rowShow['kdKategori']."' class='addtocart2' title='#KODE:".$rowShow['kdKategori']." | Edit' alt='".$name."'>";
															$b="</a>";
														}
														$margin=10*$level."px";
														$j.="<div class='f-verdana' style='overflow:auto;'>".str_repeat("<div style='float:left;'>-</div>",$level)."<div style='margin-left:".$margin.";'>".$a.$name.$b."</div>".display_kategori($rowShow['kdKategori'],$level+1)."</div>";								
														
													}
												}
											}
											return $j;
										}
										$isi.="
										<div id='accordion'>".display_kategori(0,0)."</div>	
									</div>									
								</div>
							</div>";
			}
	}
	
	$layout->setContent($isi);
	$layout->setNavigasi($nav);
	$layout->HTML_render();
?>