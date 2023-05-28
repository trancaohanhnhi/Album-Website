<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/models/product_model.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/models/category_model.php");

	class categorymodel{
		public function getproductpga($page, $ctg){
			$link = null;
			taoKetNoi($link);
			$results_per_page = 8;
	  		$page_first_result = ($page- 1) * $results_per_page;	
			$idctg = $this->idctgr($ctg)->getid_category();	
					
			$result = chayTruyVanTraVeDL($link,"SELECT * FROM tbl_product WHERE id_category='$idctg' LIMIT $page_first_result, $results_per_page");
			$data = array();
			while($rows = mysqli_fetch_assoc($result)){
				$product = new product($rows["id_product"], $rows["id_category"], $rows["name_product"], $rows["unit_price"], $rows["stock_quantity"], $rows["description_product"],$rows["img_main_product"], $rows["img_detail_product"], $rows["highlight_product"]);
				array_push($data, $product);
			}
			giaiPhongBoNho($link, $result);
			return $data;
		}
		
		public function getpages($ctg){
			$link = null;
			taoKetNoi($link);
			$idctg = $this->idctgr($ctg)->getid_category();	
			
			$result = chayTruyVanTraVeDL( $link, "SELECT COUNT(*) FROM tbl_product WHERE id_category='$idctg'" );
			$row = mysqli_fetch_row($result);
			giaiPhongBoNho($link, $result);
			return $row;
		}
		
		public function getproductsp($page, $ctg, $sotientua, $sotiendenb){
			$link = null;
			taoKetNoi($link);
			$results_per_page = 8;
	  		$page_first_result = ($page- 1) * $results_per_page;
			$idctg = $this->idctgr($ctg)->getid_category();	
			
			$result = chayTruyVanTraVeDL($link,"SELECT * FROM tbl_product WHERE id_category='$idctg' and unit_price between $sotientua and $sotiendenb LIMIT $page_first_result, $results_per_page");
			$data = array();
			while($rows = mysqli_fetch_assoc($result)){
				$product = new product($rows["id_product"], $rows["id_category"], $rows["name_product"], $rows["unit_price"], $rows["stock_quantity"], $rows["description_product"],$rows["img_main_product"], $rows["img_detail_product"], $rows["highlight_product"]);
				array_push($data, $product);
			}
			giaiPhongBoNho($link, $result);
			return $data;
		}
		
		public function getpagessp($ctg, $sotientua, $sotiendenb){
			$link = null;
			taoKetNoi($link);
			$idctg = $this->idctgr($ctg)->getid_category();	
			
			$result = chayTruyVanTraVeDL( $link, "SELECT COUNT(*) FROM tbl_product WHERE id_category='$idctg' and unit_price between $sotientua and $sotiendenb");
			$row = mysqli_fetch_row($result);
			giaiPhongBoNho($link, $result);
			return $row;
		}
		
		public function categorylist(){
			$link = null;
			taoKetNoi($link);
			$result = chayTruyVanTraVeDL($link,"SELECT * FROM tbl_category");
			$data = array();
			while($rows = mysqli_fetch_assoc($result)){
				$category = new category($rows["id_category"], $rows["name_category"]);
				array_push($data, $category);
			}
			giaiPhongBoNho($link, $result);
			return $data;
			
		}
		
		public function idctgr($ctg){
			$allctg = $this->categorylist();
			foreach($allctg as $category)
				if ($category -> getname_category()===$ctg)
					return $category;
			return null;
		}
	}
?>