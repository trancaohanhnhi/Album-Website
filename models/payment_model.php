<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/modules/db_module.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/models/product_model.php");
	
	class cartmodel{
		public function getproduct($id){
			$link = null;
			taoKetNoi($link);
			$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE id_product LIKE N'%".$id."%'");
			$data = array();
			while($rows = mysqli_fetch_assoc($result)){
				$product = new product($rows["id_product"], $rows["id_category"], $rows["name_product"], $rows["unit_price"], $rows["stock_quantity"], $rows["description_product"],$rows["img_main_product"], $rows["img_detail_product"], $rows["highlight_product"]);
				array_push($data, $product);
			}
			giaiPhongBoNho($link, $result);
			return $data;
		}
		
		
		public function cartPayment(){
			require_once($_SERVER['DOCUMENT_ROOT']."/views/payment_view.php");
			
			$link = null;
			taoKetNoi($link);
			
			$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product");
			
			while ($rows = mysqli_fetch_assoc($result)){
				if(isset($_POST['btCartPayment'])){
					$id_product = array_column($_SESSION['cart'], "id_product");
					$quantity_order_array = array_column($_SESSION['cart'], "quantity");
					$price_detail_array = array_column($_SESSION['cart'], "price_detail");
					$shipping = $_POST['shipping'];
					$total_order = $_POST['total_order'];
					
					if($id_product != null){
						foreach ($id_product as $key => $id){
							if ($rows['id_product'] == $id){
								$quantity_order = $quantity_order_array[$key];
								$price_detail = $price_detail_array[$key];
								paymentCartItem($rows['img_main_product'], $rows['name_product'], $rows['unit_price'], $quantity_order, $price_detail);
							}
						}
					}
					else{
						echo "<script>alert('Không có sản phẩm nào trong giỏ hàng!')</script>";
						echo "<script>window.location = 'cart.php'</script>";
					}
				}
				else{
						echo "<script>alert('Đặt hàng thành công!')</script>";
						echo "<script>window.location = 'index.php'</script>";
				}
				
			}
			paymentCart($shipping, $total_order);
		}
		
		
		//-------Insert dữ liệu vào mySQL---------------//
		public function clickbtaddPaymentInfo(){
			$link = null;
        	taoKetNoi($link);
			
			if(isset($_POST['btaddPaymentInfo'])){
				$id_customer = $this->setCustomer();
				$id_order = $this->setOrder($id_customer);
        		$this->setOrderDetail($id_order);
			}
		}
		
		private function setCustomer(){
			$result = null;
			
			$name_customer = $_POST['name_customer'];
			$email_customer = $_POST['email_customer'];
			$address_customer = $_POST['address_customer'];
			$phone_customer = $_POST['phone_customer'];
			$note_customer = $_POST['note_customer'];
			
			$link = null;
        	taoKetNoi($link);
			
			$query = "INSERT INTO tbl_customer (name_customer, email_customer, address_customer, phone_customer, note_customer) VALUES ('$name_customer', '$email_customer', '$address_customer', '$phone_customer', '$note_customer')";
			$setCustomer = chayTruyVanKhongTraVeDL($link, $query);
			if ($setCustomer) {
				// Lấy id_customer vừa được tạo
				$id_customer = mysqli_insert_id($link);
				// Gọi hàm setOrder và truyền id_customer
				return $id_customer;
			} else {
				$result = false;
				//Báo lỗi
			}
    	}
		
		private function setOrder($id_customer){
			$result = null;
			
			$total_order = $_POST['total_order'];
			$date_order = date("Y/m/d H:i:s");
			
			$link = null;
        	taoKetNoi($link);
			
			$query = "INSERT INTO tbl_order (id_customer, date_order, total_order) VALUES ('$id_customer', CAST('$date_order' AS DATETIME), '$total_order')";
        	$setOrder = chayTruyVanKhongTraVeDL($link, $query);
        	if ($setOrder) {
            	$id_order = mysqli_insert_id($link);
				return $id_order;
        	} else {
            	$result = false;
        	}
    	}
		
		private function setOrderDetail($id_order){
			$link = null;
        	taoKetNoi($link);

			$id_product_array = array_column($_SESSION['cart'], "id_product");
			$quantity_order_array = array_column($_SESSION['cart'], "quantity");
			$price_detail_array = array_column($_SESSION['cart'], "price_detail");
			
			$result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product");
			
			while ($rows = mysqli_fetch_assoc($result)){
				foreach ($id_product_array as $key => $id_product) {
					if ($rows['id_product'] == $id_product){
						$quantity_order = $quantity_order_array[$key];
						$unit_price = $rows['unit_price'];
						$price_detail = $price_detail_array[$key];
			
						$query = "INSERT INTO tbl_order_detail (id_order, id_product, quantity_order, unit_price, price_detail) VALUES ('$id_order', '$id_product', '$quantity_order', '$unit_price', '$price_detail')";
						
						$setOrderDetail = chayTruyVanKhongTraVeDL($link, $query);
						
					if ($setOrderDetail) {
							$stock_quantity = $rows['stock_quantity'] - $quantity_order;
							$q = "UPDATE tbl_product SET stock_quantity = '$stock_quantity' WHERE id_product = '$id_product'";
							$setSTockProduct = chayTruyVanKhongTraVeDL($link, $q);
							if($setSTockProduct){
								echo "Thành công";
								unset($_SESSION['cart']);
							}
						} 
						else {
							echo "Thất bại!";
						}
					}
				}
    		}
		}
	}
?>