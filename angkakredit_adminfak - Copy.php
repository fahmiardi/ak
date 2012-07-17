<?php
	$mContent=array("tambah"=>array("?u=angkakredit&act=tambah"=>array("add.png"=>"")));
	
	switch($_GET['act']) {
		case 'tambah':
			switch($_GET['do']) {
				case 'save':
					$nama=$_POST['nama'];
					$parent=$_POST['parent'];
					$sqlSave="	INSERT INTO ak_terms 
								VALUES ('','$nama','kategori')";
					$DB->executeQuery($sqlSave);
					if($DB->notNull()) {
						$latestID=mysql_insert_id($DB->opendb());
						$sqlSave2="	INSERT INTO ak_term_taxonomy (term_taxonomy_id,taxonomy,parent_id,term_id) 
									VALUE ('','angkakredit','$parent','$latestID')";
						$DB->executeQuery($sqlSave2);
						if($DB->notNull()) {
							if($parent!=0) {
								$sqlSelect="SELECT count FROM ak_term_taxonomy WHERE term_taxonomy_id='$parent'";
								$DB->executeQuery($sqlSelect);
								if($DB->getRows()==1) {
									$rowSelect=$DB->getResult();
									$count=$rowSelect['count']+1;
									$sqlUpdate="UPDATE ak_term_taxonomy SET count='$count' WHERE term_taxonomy_id='$parent'";
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
					}
					break;
			}
			break;
		case 'edit':
			//
			break;
		case 'hapus':
			//
			break;
		default:
			$isi="	<div class='kategori'><span class='f-verdana'>Kategori Angka Kredit</span></div>
					<div class='search'>
						<form action='#' method='post'>
							<input type='text' class='input cari'>&nbsp;<input type='submit' value='Cari Kategori' class='submit f-verdana'>
						</form>
					</div>
					<div class='fl left-content'>
						<form action='?u=angkakredit&act=tambah&do=save' method='post'>
							<div class='tambah'><span>Tambah Baru</span></div>
							<div class='form-tambah'>
								<div class='f-verdana'>Nama</div>
								<textarea class='input' style='width:300px; height:100px;' name='nama'></textarea><br />
								<span class='f-verdana'>Nama ini akan muncul pada kategori angka kredit.</span>
							</div>
							<div class='form-tambah'>
								<div class='f-verdana'>Parent</div>";
								function display_combobox($parent, $level) {
									global $DB;
									$sqlShow="	SELECT TT.term_taxonomy_id, T.term_name 
												FROM ak_term_taxonomy TT, ak_terms T 
												WHERE TT.parent_id='$parent' 
												AND TT.term_id=T.term_id";
									$queryShow=mysql_query($sqlShow,$DB->opendb());
									if($queryShow!=null) {
										if(mysql_num_rows($queryShow)>0) {
											while($rowShow=mysql_fetch_array($queryShow)) {
												$j.="<option value='".$rowShow['term_taxonomy_id']."'>".str_repeat("- ",$level).$rowShow['term_name']."</option>";
												$j.=display_combobox($rowShow['term_taxonomy_id'],$level+1);
											}
										}
									}
									return $j;
								}
								$isi.="
								<select class='form-select' style='height:30px; width:150px;' name='parent'>
									<option value='0'>None</option>".display_combobox(0,0)."
								</select><br />
								<span class='f-verdana'>Klasifikasi kategori yang disusun secara Hierarki berdasarkan kelompoknya.</span>
							</div>
							<div><input type='submit' class='submit' value='Tambahkan'></div>
						</form>
					</div>
					<div class='right-content'>
						<form action='#' method='post'>
							<div class='actions'>
								<select class='form-select' style='height:30px; width:150px;'>
									<option value='0'>Actions</option>
									<option value='1'>Hapus</option>
								</select>&nbsp;
								<input type='submit' class='submit' value='Apply'>
							</div>
							<div class='show'>
								<div class='show-head'>
									<div class='show-name f-verdana'>Nama Kategori Angka Kredit</div>
								</div>									
								<div class='list'>";					
									function display_kategori($parent, $level) {
										global $DB;
										$sqlShow="	SELECT TT.term_taxonomy_id, T.term_name, TT.count 
													FROM ak_term_taxonomy TT, ak_terms T 
													WHERE TT.parent_id='$parent' 
													AND TT.term_id=T.term_id";
										$queryShow=mysql_query($sqlShow,$DB->opendb());
										if($queryShow!=null) {
											if(mysql_num_rows($queryShow)>0) {
												while($rowShow=mysql_fetch_array($queryShow)) {									
													if($level==0) {
														$j.="<h3><a href='#' class='pengajuan f-verdana'>".$rowShow['term_name']."</a></h3>";
														$name=$rowShow['term_name'];
													}
													else {
														$name=$rowShow['term_name'];
													}
													if($rowShow['count']==0) {
														if($level!=0) {
															$a="<a href='#' class='addtocart' title='#ID:$rowShow[term_taxonomy_id] | Edit' alt='$name'>";
															$b="</a>";
														}
														else {
															$a="<a href='#' class='addtocart2' title='#ID:$rowShow[term_taxonomy_id] | Edit' alt='$name'>";
															$b="</a>";
														}
													}
													else {
														$a="<a href='#' class='addtocart2' title='#ID:$rowShow[term_taxonomy_id] | Edit' alt='$name'>";
														$b="</a>";
													}
													$margin=10*$level."px";
													$j.="<div class='f-verdana' style='overflow:auto;'>".str_repeat("<div style='float:left;'>-</div>",$level)."<div style='margin-left:$margin;'>".$a.$name.$b."</div>".display_kategori($rowShow['term_taxonomy_id'],$level+1)."</div>";								
													
												}
											}
										}
										return $j;
									}
									$isi.="
									<div id='accordion'>".display_kategori(0,0)."</div>	
								</div>									
							</div>
							<div class='actions'>
								<select class='form-select' style='height:30px; width:150px;'>
									<option value='0'>Actions</option>
									<option value='1'>Hapus</option>
								</select>&nbsp;
								<input type='submit' class='submit' value='Apply'>
							</div>
						</form>
					</div>";
	}
	//$layout->setSitemaps($u);
	//$layout->setMenuContent($mContent);
	$layout->setContent($isi);
	$layout->HTML_render();
?>