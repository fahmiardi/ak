<?php
	class Kepegawaian {
		function getUnitKerja() {
			global $DB;
			
			$sqlUnit="SELECT namaUnitKerja FROM peg_unitkerja WHERE parentId='0' AND active='1'";
			$DB->executeQuery($sqlUnit);
			if($DB->getRows()==1) {
				$rowUnit=$DB->getResult();
			}
			return $rowUnit['namaUnitKerja'];
		}
		
		function getGolonganString($id) {
			global $DB;
			
			$sqlPangkat="	SELECT Gh.namaGolHuruf, Ga.namaGolAngka 
							FROM pang_golongan G, pang_golhuruf Gh, pang_golangka Ga 
							WHERE G.idGolAngka=Ga.idGolAngka 
							AND G.idGolHuruf=Gh.idGolHuruf 
							AND G.idGolongan='".$id."'";
			$DB->executeQuery($sqlPangkat);
			if($DB->rs()) {
				if($DB->getRows()==1) {
					$rowPangkat=$DB->getResult();
				}
			}
			return $rowPangkat['namaGolAngka']."/".ucwords($rowPangkat['namaGolHuruf']);
		}
	}
?>