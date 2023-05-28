<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/models/payment_model.php");

	class cartcontroller{
		public $model;
		public function __construct()
		{
			$this->model=new cartmodel();
		}
		
		public function cartPayment()
		{
			$this->model->cartPayment();
		}
		
		public function clickbtaddPaymentInfo()
		{
			require_once($_SERVER['DOCUMENT_ROOT']."/views/payment.php");
			$this->model->clickbtaddPaymentInfo();
		}
		
	}
?>