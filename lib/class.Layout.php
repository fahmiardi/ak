<?php
	class Layout {	
		var $headTitle="Sistem Administrasi Angka Kredit Pegawai Fungsional";
		var $headFak="Fakultas Syari'ah dan Hukum UIN Jakarta";
		var $footer="&copy;2010 Maintened by. FSH-UINJakarta and Developed by. <b>Atiyah Tahta Nisyatina [106091003526]</b>";
		var $content="";
		var $menuContent=array();
		var $navigasi=array();
		var $related=array();
		var $sitemaps=array();
		var $menu=array("?u=home"=>array("menu-home"=>array("-img"=>"home.png","-txt"=>"Home")),
						"?u=kepegawaian"=>array("menu-peg"=>array("-img"=>"peg.png","-txt"=>"Kepegawaian")),
						"?u=angkakredit"=>array("menu-ak"=>array("-img"=>"ak.png","-txt"=>"Angka Kredit")),
						"?u=settings"=>array("menu-set"=>array("-img"=>"set.png","-txt"=>"Settings")),
						"?u=logout"=>array("menu-logout"=>array("-img"=>"log.png","-txt"=>"Logout")),
						);
		
		function setMenu($menu) {
			$this->menu=$menu;
		}
		
		function setContent($content) {
			$this->content=$content;
		}
		
		function setMenuContent($menuContent) {
			$this->menuContent=$menuContent;
		}
		
		function setNavigasi($navigasi) {
			$this->navigasi=$navigasi;
		}
		
		function setRelated($related) {
			$this->related=$related;
		}
		
		function setSitemaps($sitemaps) {
			$this->sitemaps=$sitemaps;
		}
		
		function getSitemaps() {
			return $this->sitemaps;
		}
		
		function HTML_render() {
			?>
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
			<html>
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
					<title>
						<?php
						$id=0;
						$jml=count($this->sitemaps);
						foreach($this->sitemaps as $uri=>$map) {
							$last=$uri[$jml-1];
							if($last) {											
								echo strtoupper($map)."&nbsp;>&nbsp;";
							}
							$id++;
						}	
						?>
					</title>
					<link rel="stylesheet" href="./css/style.css" type="text/css" />
					<link rel="icon" href="./images/icons/favicon.ico" type="image/x-icon"> 
					<link rel="shortcut icon" href="./images/icons/favicon.ico" type="image/x-icon">
					
					<link type="text/css" href="./css/ui.all.css" rel="stylesheet" />
					<script type="text/javascript" src="./js/jquery-1.3.2.js"></script>
					<script type="text/javascript" src="./js/ui.core.js"></script>
					<script type="text/javascript" src="./js/ui.accordion.js"></script>
					<script type="text/javascript" src="./js/ui.datepicker.js"></script>
					<script type="text/javascript" src="./js/ui.sortable.js"></script>
					<script type="text/javascript" src="./js/ui.tabs.js"></script>
					
					
					<link rel="stylesheet" type="text/css" href="./css/style_acc.css" />
					<link rel="stylesheet" type="text/css" href="./css/style_paging.css" />
					<!--[if lt IE 8]>
					<style type="text/css">
						li a {display:inline-block;}
						li a {display:block;}
					</style>
					<![endif]-->
					
					<script type="text/javascript">
						$(function() {
							$("#accordion").accordion({
								autoHeight: false
							});
						});
						$(function() {
							$("#tabs").tabs({
								collapsible: true
							});
						});
						$(function() {
							$("#accordion2").accordion({
								autoHeight: false
							});
						});
						$(function() {
							$("#tabs2").tabs().find(".ui-tabs2-nav").sortable({axis:'x'});
						});
						$(function() {
							$("#tabs3").tabs({
								collapsible: true
							});
						});

						$(function() {
							$("#datepicker").datepicker({showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true, changeMonth: true, changeYear: true});
						});
						$(function() {
							$("#datepicker2").datepicker({showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true, changeMonth: true, changeYear: true});
						});
						$(function() {
							$("#datepicker3").datepicker({showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true, changeMonth: true, changeYear: true});
						});
						$(function() {
							$("#datepicker4").datepicker({showOn: 'button', buttonImage: 'images/calendar.gif', buttonImageOnly: true, changeMonth: true, changeYear: true});
						});
						
						function initMenus() {
							$('ul.menu ul').hide();
							$.each($('ul.menu'), function(){
								$('#' + this.id + '.expandfirst ul:first').show();
							});
							$('ul.menu li a').click(
								function() {
									var checkElement = $(this).next();
									var parent = this.parentNode.parentNode.id;

									if($('#' + parent).hasClass('noaccordion')) {
										$(this).next().slideToggle('normal');
										return false;
									}
									if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
										if($('#' + parent).hasClass('collapsible')) {
											$('#' + parent + ' ul:visible').slideUp('normal');
										}
										return false;
									}
									if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
										$('#' + parent + ' ul:visible').slideUp('normal');
										checkElement.slideDown('normal');
										return false;
									}
								}
							);
						}
						$(document).ready(function() {initMenus();});
						function initMenus2() {
							$('ul.menu2 ul').hide();
							$.each($('ul.menu2'), function(){
								$('#' + this.id + '.expandfirst ul:first').show();
							});
							$('ul.menu2 li a').click(
								function() {
									var checkElement = $(this).next();
									var parent = this.parentNode.parentNode.id;

									if($('#' + parent).hasClass('noaccordion')) {
										$(this).next().slideToggle('normal');
										return false;
									}
									if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
										if($('#' + parent).hasClass('collapsible')) {
											$('#' + parent + ' ul:visible').slideUp('normal');
										}
										return false;
									}
									if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
										$('#' + parent + ' ul:visible').slideUp('normal');
										checkElement.slideDown('normal');
										return false;
									}
								}
							);
						}
						$(document).ready(function() {initMenus2();});
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
												<div id="head-title"><?php echo $this->headTitle; ?></div>
												<div id="head-fak"><?php echo $this->headFak; ?></div>
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
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td background="./images/ak_10.png" width="11" height="59"></td>
										<td background="./images/ak_11.png" width="977" height="59" colspan="3">
											<div id="menu">
												<?php
												foreach($this->menu as $ref=>$urls) {
													foreach($urls as $url=>$infos) {
														$alt=explode("=",$ref);
														?>
														<div id="<?php echo $url; ?>">
															<a href="<?php echo $ref; ?>" id="menu-link" alt="<?php echo $alt[1]; ?>" title="<?php echo $alt[1]; ?>">
																<?php
																$idx=0;
																foreach($infos as $img=>$txt) {
																	?>
																	<div id="<?php echo $url."".$img; ?>">
																	<?php
																	if($idx==0){
																		?>																	
																		<img src="./images/<?php echo $txt; ?>" width="32" height="32" border="0">
																		<?php
																	}
																	else {
																		if($_GET['u']==$alt[1]) {
																			echo "<font style='text-decoration:underline;'>".$txt."</font>";
																		}
																		else {
																			echo $txt;
																		}
																	}
																	?>
																	</div>
																	<?php
																	$idx++;
																}
																?>																
															</a>
														</div>
														<?php
													}
												}
												?>
											</div>
										</td>
										<td background="./images/ak_13.png" width="11" height="59"></td>
									</tr>
									<tr>
										<td background="./images/ak_17.png" width="11" height="16"></td>
										<td background="./images/ak_18.png" width="6" height="16"></td>
										<td background="./images/ak_19.png" width="965" height="16"></td>
										<td background="./images/ak_21.png" width="6" height="16"></td>
										<td background="./images/ak_22.png" width="11" height="16"></td>
									</tr>
								</table>
							</td>
							<td bgcolor="#f5f0f0" height="59"><span class='null'>.</span></td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td bgcolor="#f5f0f0" height="8"><span class='null'>.</span></td>
							<td background="./images/ak_26.png" width="2" height="8"></td>
							<td background="./images/ak_27.png" width="6" height="8"></td>
							<td background="./images/ak_28.png" width="965" height="8"></td>
							<td background="./images/ak_30.png" width="6" height="8"></td>
							<td background="./images/ak_31.png" width="2" height="8"></td>
							<td bgcolor="#f5f0f0" height="8"><span class='null'>.</span></td>
						</tr>
						<tr>
							<td bgcolor="#f5f0f0" height="24"><span class='null'>.</span></td>
							<td background="./images/ak_33.png" width="2" height="24"></td>				
							<td background="./images/ak_34.png" width="977" height="24" colspan="3" style="vertical-align:center;">
								<div id="sitemap">
									<div style="float:left;">
									<font color="#FFF">Sitemaps: </font>
									<?php
									$id=0;
									foreach($this->sitemaps as $uri=>$map) {
										$u.=$uri;
										$last=$uri[$jml-1];
										if($last) {											
											?>
											<a href="?<?php echo $u; ?>" id="site" title="<?php echo strtoupper($map); ?>"><?php echo strtoupper($map); ?></a>&nbsp;>&nbsp;
											<?php
										}
										$id++;
									}									
									?>
									</div>
									<div style="float:right;padding-right:10px;color:#fff;">
										<span style="font-weight:normal;">Selamat Datang </span>
										<?php 
										$user=new User();
										$user->setToken($_SESSION['bana_token']);
										if($user->getLevel()!=4) {
											echo ucwords($user->getNamaAdmin())." <i>(".$user->getNamaLevel().")";
										}
										else {
											echo strtoupper($user->getDosen())." <i>(".$user->getNamaLevel().")</i>";
										}
										?>
									</div>
								</div>
							</td>
							<td background="./images/ak_36.png" width="2" height="24"></td>
							<td bgcolor="#f5f0f0" height="24"><span class='null'>.</span></td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td bgcolor="#f5f0f0"><span class='null'>.</span></td>
							<td background="./images/ak_33.png" width="2"></td>
							<td bgcolor="#7f8081" width="1"></td>
							<td bgcolor="#f5f0f0" width="825" valign="top">
								<div id="menu-content">
									<?php
									if(count($this->menuContent)!=0) {
										foreach($this->menuContent as $mTitle=>$mLinks) {
											foreach($mLinks as $mLink=>$mImgs) {
												foreach($mImgs as $mImg=>$onclick) {
													?>										
													<div style="float:right; padding-left:5px;">
														<a href="<?php echo $mLink; ?>" title="<?php echo $mTitle; ?>" onclick="<?php echo $onclick; ?>">
															<div style="float:left;"><img src="./images/<?php echo $mImg; ?>" width="32" height="32" border="0"></div>
														</a>
													</div>
													<?php
												}
											}
										}
									}
									?>
								</div>
								<div id="content"><?php echo $this->content; ?></div>
							</td>
							<td bgcolor="#CCCCCC" width="1"></td>
							<td bgcolor="#f5f0f0" width="149" valign="top">
								<div id="navigasi">
									<div id="navigasi-nav" style='margin:5px;'>
										<?php 
										if(count($this->navigasi)!=0) {
											foreach($this->navigasi as $nav=>$rMen) {												
												foreach($rMen as $kRight=>$vRight) {
													$split=explode("@",$kRight);
													$ref=$split[0];
													$target=$split[1];
													echo "
													<div class='fl' style='padding-top:5px;'><img src='./images/".$nav."' border='0' width='8' height='8'></div>
													<div class='fl' style='padding-left:10px;'><a href='".$ref."' ".$target." alt='".$vRight."' title='".$vRight."' class='menu5'>".$vRight."</a></div>
													<div class='fix'></div>";
												}
											}
										}
										?>
									</div>
									<div id="navigasi-border"></div>
									<div id="navigasi-related">
										<?php 
										//echo $this->related; 
										?>
									</div>
								</div>
							</td>
							<td bgcolor="#7f8081" width="1"></td>
							<td background="./images/ak_36.png" width="2"></td>
							<td bgcolor="#f5f0f0"><span class='null'>.</span></td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0">
						<tr>
							<td bgcolor="#f5f0f0" height="5"><span class='null'>.</span></td>
							<td background="./images/ak_40.png" width="2" height="5"></td>
							<td background="./images/ak_41.png" width="6" height="5"></td>
							<td background="./images/ak_42.png" width="965" height="5"></td>
							<td background="./images/ak_44.png" width="6" height="5"></td>
							<td background="./images/ak_45.png" width="2" height="5"></td>
							<td bgcolor="#f5f0f0" height="5"><span class='null'>.</span></td>
						</tr>
					</table>
					<table cellpadding="0" cellspacing="0" style="padding-top:5px;">
						<tr>
							<td background="./images/ak_46.png" height="45"><span class='null'>.</span></td>
							<td background="./images/ak_46.png" width="981" height="45">
								<div id="footer">
									<div id="footer-copy"><?php echo $this->footer; ?></div>
								</div>
							</td>
							<td background="./images/ak_46.png" height="45"><span class='null'>.</span></td>
						</tr>
					</table>
				</body>
			</html>
			<?php
		}
	}
?>