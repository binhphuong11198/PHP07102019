<?php 
	class book{
		var $id;
		var $sprice;
		var $title;
		var $author;
		var $year;
		function __construct ($id,$sprice, $title, $author, $year){
			
			$this->id = $id;
			$this->sprice = $sprice;
			$this->title = $title;
			$this->author = $author;
			$this->year = $year;

		}
		function display(){
			echo 'Price:'. $this->sprice . "<br>";
			echo 'title:'. $this->title . "<br>";
			echo 'author:'. $this->author . "<br>";
			echo 'year:'. $this->year . "<br>";
		}
		
	    static function getListFromFile(){
	    	$arrData = file("data/book.txt");
	    	$lsbook = array();
	    	foreach ($arrData as $getData) {
	    		$arrItem = explode("#", $getData);
	    		$book =new book($arrItem[0],$arrItem[2],$arrItem[1],$arrItem[3], $arrItem[4]);
	    		array_push($lsbook,$book);	    	
	    	};
	    	return $lsbook;
	    }
	    static function search($search){
	    	$file = book::getListFromFile();
			if (empty($search)) {
				foreach ($file as $lsa) { ?>
					<?php echo  '<tr class="content" >
						<td>'. $lsa->id .'</td>
						<td>'. $lsa->sprice .'</td>
						<td>'. $lsa->title . '</td>
						<td>'. $lsa->author .'</td>
						<td>'. $lsa->year . '</td>
						<td><button name="sua">sua</button><button name="xoa">xoa</button></td>
					</tr>';
					?>
				<?php  }
			}
			else{
				foreach ($file as $lsa){
					if (strlen(strstr(strtolower($search) , strtolower($lsa->id))) !=0 || strlen(strstr(strtolower($search) , strtolower($lsa->sprice)))!=0  || strlen(strstr(strtolower($lsa->title) , strtolower($search)))!=0 ||  strlen(strstr(strtolower($search) ,strtolower($lsa->author)))!=0||  strlen(strstr(strtolower($search) ,strtolower($lsa->year)))!=0) { ?>
						<?php echo  '<tr class="content" >
							<td>'. $lsa->id .'</td>
							<td>'. $lsa->sprice .'</td>
							<td>'. $lsa->title . '</td>
							<td>'. $lsa->author .'</td>
							<td>'. $lsa->year . '</td>
							<td><button name="sua">sua</button><button name="xoa">xoa</button></td>
						</tr>';
						?>
					<?php $eva=1; }
					
				}	
				if ($eva!=1) {
					echo '<td colspan="6" align="center">  Khong tìm thấy</td>';
				}
			}
		}
		static function add($idadd,$giaadd,$titleadd,$tacgiaadd,$yearadd){
			$file= fopen("data/book.txt", "a");
			$arrd = book::getListFromFile();
			foreach ($arrd as $value) {
				if ($idadd == $value->id) {
					$trung=1;
				}
			}
			if (!empty($idadd)&&!empty($giaadd)&&!empty($titleadd)&&!empty($tacgiaadd)&&!empty($yearadd)&&$trung!=1) {
				$dat= "\n" . $idadd.'#'.$giaadd.'#'.$titleadd.'#'.$tacgiaadd.'#'.$yearadd;
				fwrite($file,$dat);

			}
			else{
				echo 'loi roi';
			}
			fclose($file);
		}
		static function delete($id){
			
			$arrd = book::getListFromFile();
			$dataNew=[];
			foreach ($arrd as $value) {
				if ( $value->id !=$id) {
					$dataNew[]= $value;
				}
			}
			$myWrite="";
			$file= fopen("data/book.txt", "w");
			foreach ($dataNew as $value) {
				$myWrite.= $value->id. "#" . $value->title . "#" .  $value->sprice . "#" .   $value->author . "#" . $value->year ;
			}
			fwrite($file, $myWrite);
			fclose($file);

			
		}
		static function edit($idedit,$editid,$giaedit,$titledit,$tacgiaedit,$yearedit){
			$arrds = book::getListFromFile();
			$dataNews=[];
			foreach ($arrds as $value) {
				if ( $value->id != $idedit) {
					$dataNews[]= $value;
				}
				else {
					$dataNews[] = new book(  $editid , $giaedit , $titledit , $tacgiaedit , $yearedit);
				}
			}
			$my_write="";
			$myFile= fopen("data/book.txt", "w");
			foreach ($dataNews as $value) {
				$my_write.= $value->id . "#" .$value->title . "#" . $value->sprice . "#" . $value->author . "#" . $value->year ;
			}
			fwrite($myFile, $my_write);
			fclose($myFile);

		} 
	}

 ?>