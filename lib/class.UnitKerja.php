<?php
	class UnitKerja {
		function getFakultas($kd) {
			global $DB;
			
			$sql="	SELECT parentId, namaUnitKerja 
					FROM peg_unitkerja 
					WHERE kdUnitKerja='".$kd."'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
				if($row['parentId']!=0) {
					return $this->getFakultas($row['parentId']);
				}
				else {
					return $row['namaUnitKerja'];
				}
			}
		}
		
		function getJurusan($kd) {
			global $DB;
			
			$sql="	SELECT parentId, namaUnitKerja, count 
					FROM peg_unitkerja 
					WHERE kdUnitKerja='".$kd."'";
			$DB->executeQuery($sql);
			if($DB->getRows()==1) {
				$row=$DB->getResult();
				if($row['count']!=0) {
					$r=$this->getJurusan($row['parentId']);
				}
				else {
					$r=$row['namaUnitKerja'];
				}
			}
			return $r;
		}
		
		
	}
?>