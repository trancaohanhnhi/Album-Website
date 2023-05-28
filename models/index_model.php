<?php
    require_once("product_model.php");
    require_once("category_model.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");

    class IndexModel{
        public function getcategory_modelId()
        {
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "SELECT * FROM tbl_category");
                while($rows = mysqli_fetch_assoc($result)){
                  $category = new category ($rows["id_category"],$rows["name_category"]);
                  array_push($data, $category);
                }
            giaiPhongBonho($link, $result); 
            return $data;             
        }
		
		public function getproductlist(){
            $link=null;
            taoKetNoi($link);
            $data = array();
            $result = chayTruyVanTraveDL($link, "SELECT *  FROM tbl_product");
            while($rows = mysqli_fetch_assoc($result)){
                  $product = new Product($rows["id_product"], $rows["id_category"], $rows["name_product"], $rows["unit_price"], $rows["stock_quantity"], $rows["description_product"],$rows["img_main_product"], $rows["img_detail_product"], $rows["highlight_product"] );
                array_push($data, $product);
            }
            giaiPhongBonho($link, $result); 
            return $data;

        }
	}
?>