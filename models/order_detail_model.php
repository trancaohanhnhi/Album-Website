<?php
	class orderdetail
	{
		private $id_order;
		private $id_product;
		private $quantity_order;
		private $unit_price;
		private $price_detail;
		
		public function __construct($id_order, $id_product, $quantity_order, $unit_price, $price_detail)
		{
			$this -> id_order=$id_order;
			$this -> id_product=$id_product;
			$this -> quantity_order=$quantity_order;
			$this -> unit_price=$unit_price;
			$this -> price_detail=$price_detail;
		}
		
		public function setid_order($id_order){$this -> id_order = $id_order;}
		public function setid_product($id_product){$this -> id_product = $id_product;}
		public function setquantity_order($quantity_order){$this -> quantity_order = $quantity_order;}
		public function setunit_price($unit_price){$this -> unit_price = $unit_price;}
		public function setprice_detail($price_detail){$this -> price_detail = $price_detail;}
		
		
		
	}

?>