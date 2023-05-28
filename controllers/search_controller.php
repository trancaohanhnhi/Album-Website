<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/models/search_model.php");

	class searchcontroller{
		public $model;
		
		public function __construct(){
			$this->model = new searchmodel();
		}
		
		public function search_invoke($tim_kiem){
			if(isset($_GET['tim_kiem'])){
				$products = $this->model->getproduct($tim_kiem);
				include($_SERVER['DOCUMENT_ROOT']."/views/search_view.php");
			}				
			
		}
	}

?>