<?php
	class order
	{
		private $id_order;
		private $id_customer;
		private $date_order;
		private $total_order;
		
		public function __construct($id_order, $id_customer, $date_order, $total_order)
		{
			$this -> id_order=$id_order;
			$this -> id_customer=$id_product;
			$this -> date_order=$date_order;
			$this -> total_order=$total_order;
		}
		
		public function setid_order($id_order){$this -> id_order = $id_order;}
		public function setid_customer($id_customer){$this -> $this -> id_customer=$id_product;}
		public function setdate_order($date_order){$this -> $this -> date_order=$date_order;}
		public function settotal_order($total_order){$this -> $this -> total_order=$total_order;}	
	}

?>