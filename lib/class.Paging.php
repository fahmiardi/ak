<?php
	class JinPagination {		
		// fungsi pengaturan/option $this->blabla = "value nya blabla"
		function setOption($field, $value) {
			$this->$field = $value;
		}
		// fungsi paginasi generate array berupa total jumlah halaman, pagination, data dan posisi start 
		// berguna untuk diatur secara fleksible terutama untuk berbasis menggunakan template
		function build() {
			global $DB;
			
			// SETUP
			$tabel = $this->tabel;
			$where = $this->where;
			$limit = $this->limit;
			$order = $this->order;
			$page = $this->page;
			$extra_href = $this->extra_href;
			
			// SETUP OPTIONAL
			if(!isset($this->web_url_page)) { $web_url_page = "?page="; } else { $web_url_page = $this->web_url_page; }
			if(!isset($this->adjacents)) { $adjacents = "3"; } else { $adjacents = $this->adjacents; }
			if(!isset($this->txt_prev)) { $txt_prev = "&laquo; prev"; } else { $txt_prev = $this->txt_prev; }
			if(!isset($this->txt_next)) { $txt_next = "next &raquo;"; } else { $txt_next = $this->txt_next; }
			if(!isset($this->txt_titik)) { $txt_titik = "..."; } else { $txt_titik = $this->txt_titik; }

			$query = mysql_query("SELECT * FROM ".$tabel." ".$where."",$DB->opendb());
			//$total_pages = mysql_fetch_array(mysql_query($query));
			//$total_pages = $total_pages['num'];
			$total_pages = mysql_num_rows($query);

			if($page) {
				$start = ($page - 1) * $limit; 			//first item to display on this page
			} else {
				$start = 0;								//if no page var is given, set start to 0
			}
			// Get data.
			$query = "SELECT * FROM ".$tabel." ".$where." ".$order." LIMIT ".$start.", ".$limit."";
			$hasil = mysql_query($query,$DB->opendb());
			
			/* Setup page vars for display. */
			if ($page == 0) $page = 1;					//if no page var is given, default to 1.
			$prev = $page - 1;							//previous page is page - 1
			$next = $page + 1;							//next page is page + 1
			$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
			$lpm1 = $lastpage - 1;						//last page minus 1
			
			/* 
				Now we apply our rules and draw the pagination object. 
				We're actually saving the code to a variable in case we want to draw it more than once.
			*/
			$pagination = "";
			if($lastpage > 1) {
				$pagination .= "<div class=\"pagination\">";
				//previous button
				if ($page > 1) {
					$pagination .= "<a href=\"".$web_url_page.$prev."".$extra_href."\">" . $txt_prev . "</a>";
				} else {
					$pagination .= "<span class=\"disabled\">" . $txt_prev . "</span>";	
				}
				//pages
				if ($lastpage < 7 + ($adjacents * 2)) {
					//not enough pages to bother breaking it up
					for ($counter = 1; $counter <= $lastpage; $counter++) {
						if ($counter == $page) {
							$pagination .= "<span class=\"current\">".$counter."</span>";
						} else {
							$pagination .= "<a href=\"".$web_url_page.$counter."".$extra_href."\">".$counter."</a>";
						}
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2)) {
					//enough pages to hide some
					if($page < 1 + ($adjacents * 2)) {
						//close to beginning; only hide later pages
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
							if ($counter == $page) {
								$pagination .= "<span class=\"current\">".$counter."</span>";
							} else {
								$pagination .= "<a href=\"".$web_url_page.$counter."".$extra_href."\">$counter</a>";
							}
						}
						$pagination .= $txt_titik;
						$pagination .= "<a href=\"".$web_url_page.$lpm1."".$extra_href."\">".$lpm1."</a>";
						$pagination .= "<a href=\"".$web_url_page.$lastpage."".$extra_href."\">".$lastpage."</a>";		
					}
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
						//in middle; hide some front and some back
						$pagination .= "<a href=\"".$web_url_page."1".$extra_href."\">1</a>";
						$pagination .= "<a href=\"".$web_url_page."2".$extra_href."\">2</a>";
						$pagination .= $txt_titik;
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
							if ($counter == $page) {
								$pagination .= "<span class=\"current\">".$counter."</span>";
							} else {
								$pagination .= "<a href=\"".$web_url_page.$counter."".$extra_href."\">".$counter."</a>";
							}
						}
						$pagination .= $txt_titik;
						$pagination .= "<a href=\"".$web_url_page.$lpm1."".$extra_href."\">".$lpm1."</a>";
						$pagination .= "<a href=\"".$web_url_page.$lastpage."".$extra_href."\">".$lastpage."</a>";
					} else {
						//close to end; only hide early pages
						$pagination .= "<a href=\"".$web_url_page."1".$extra_href."\">1</a>";
						$pagination .= "<a href=\"".$web_url_page."2".$extra_href."\">2</a>";
						$pagination .= $txt_titik;
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
							if ($counter == $page) {
								$pagination .= "<span class=\"current\">".$counter."</span>";
							} else {
								$pagination .= "<a href=\"".$web_url_page.$counter."".$extra_href."\">".$counter."</a>";
							}
						}
					}
				}
				
				//next button
				if ($page < $counter - 1) {
					$pagination .= "<a href=\"".$web_url_page.$next."".$extra_href."\">" . $txt_next . "</a>";
				} 
				else {
					if($page<$counter) {
						$pagination .= "<span class=\"disabled\">" . $txt_next . "</span>";
						$pagination .= "</div>\n";
					}
					else {
						$p=1;
						header("location: ./page.php".$web_url_page.$p."");
					}
					
				}
			}
			// hasil dari fungsi build()
			return array(	"pagination" 	=> $pagination, 
							"total" 		=> number_format($total_pages),
							"hasil"			=> $hasil,
							"start"			=> $start
						);
		}
	}
?>