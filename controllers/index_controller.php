<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/models/index_model.php");

    class IndexController{
        public $model;
        public function __construct()
        {
            $this->model = new IndexModel();
        }
		
		public function product_invoke($name_category){
            $id_category = $this->model->getcategory_modelId();
            $productlist = $this->model->getproductlist();
            include($_SERVER['DOCUMENT_ROOT']."/views/highlight_view.php");   
        }
		
		public function product_album($name_category){
            $id_category = $this->model->getcategory_modelId();
            $productlist = $this->model->getproductlist();
            include($_SERVER['DOCUMENT_ROOT']."/views/albumhighlight_view.php");   
        }
	}
?>
		