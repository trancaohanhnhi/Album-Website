<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/models/category_page_model.php");

	class categorycontroller{
		public $model;
		
		public function __construct(){
			$this->model = new categorymodel();
		}
		
		public function getpagepr($page, $ctg){			
			$products =$this->model->getproductpga($page, $ctg);
			include($_SERVER['DOCUMENT_ROOT']."/views/category_view.php");
		}
		
		public function getpage($ctg){
			$row = $this->model->getpages($ctg);
			include($_SERVER['DOCUMENT_ROOT']."/views/paging_view.php");
		}
		
		public function getpagespr($page, $ctg, $sotientua, $sotiendenb){
			$products = $this->model->getproductsp($page, $ctg, $sotientua, $sotiendenb);
			include($_SERVER['DOCUMENT_ROOT']."/views/category_view.php");
		}
		
		public function getpagesp($ctg, $sotientua, $sotiendenb){
			$row = $this->model->getpagessp($ctg, $sotientua, $sotiendenb);
			include($_SERVER['DOCUMENT_ROOT']."/views/paging_view.php");
		}
	}
?>