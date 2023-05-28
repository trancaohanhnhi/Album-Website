<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/models/product_model.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

	class searchmodel{
		public static function getproduct($tim_kiem){
			$link = null;
			taoKetNoi($link);
			$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE name_product LIKE N'%".$tim_kiem."%'");
			$data = array();
			while($rows = mysqli_fetch_assoc($result)){
				$product = new product($rows["id_product"], $rows["id_category"], $rows["name_product"], $rows["unit_price"], $rows["stock_quantity"], $rows["description_product"],$rows["img_main_product"], $rows["img_detail_product"], $rows["highlight_product"]);
				array_push($data, $product);
			}
			giaiPhongBoNho($link, $result);
			return $data;
		}		
	}
?>