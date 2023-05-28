<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");
require_once($_SERVER['DOCUMENT_ROOT']."/models/product_model.php");
class detail_model{
	public function layproduct(){
		$link = null;
		taoKetNoi($link);
		
        	$result = chayTruyVanTraVeDL($link, "SELECT * from tbl_product");
		$data = array();
		while($rows = mysqli_fetch_assoc($result)){
                $product = new product($rows["id_product"], 
									   $rows["id_category"],
									   $rows["name_product"],							
									   $rows["unit_price"], 
									   $rows["stock_quantity"],
									   $rows["description_product"],
									   $rows["img_main_product"],
									   $rows["img_detail_product"],
									   $rows["highlight_product"]);
                array_push($data, $product);
		}
        giaiPhongBoNho($link, $result);	
		return($data);
	}
	public function layproductbangid($id){
		$allproduct=$this->layproduct();
		foreach($allproduct as $product)
			if ($product->getid_product()===$id)
				return $product;
		return null;
	}
	public function layidcate($id){
		$product=$this->layproductbangid($id);
		$id_cate=$product->getid_category();
		return $id_cate;
	}
	public function layspkhacbangidcate($id_cate,$id){
		$link=null;
		taoKetNoi($link);
        	$result = chayTruyVanTraVeDL($link, "SELECT * from tbl_product where id_category='".$id_cate."' and id_product !='".$id."' LIMIT 8");
		$data = array();
		while($rows = mysqli_fetch_assoc($result)){
                $otherproduct = new product($rows["id_product"], 
									   $rows["id_category"],
									   $rows["name_product"],							
									   $rows["unit_price"], 
									   $rows["stock_quantity"],
									   $rows["description_product"],
									   $rows["img_main_product"],
									   $rows["img_detail_product"],
									   $rows["highlight_product"]);
                array_push($data, $otherproduct);
		}
        giaiPhongBoNho($link, $result);	
		return($data);
		
	}
}
?>