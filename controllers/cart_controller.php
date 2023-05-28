<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/models/cart_model.php");

	class cartcontroller{
		public $model;
		public function __construct()
		{
			$this->model=new cartmodel();
		}
		
		public function addProductToCart()
		{
			$this->model->addCartItem();
		}
		
		public function showCart()
		{
			
			$this->model->showCart();
		}
		
		public function deleteItemCart()
		{
			
			$this->model->deleteItemCart();
		}
		
	}
?>