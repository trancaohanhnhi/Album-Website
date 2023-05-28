ồ<?php
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
		
		
		public function addCartItem(){
			$link = null;
			taoKetNoi($link);
			
			if (isset($_POST['btaddItemCart'])){
				if(isset($_SESSION['cart'])){ //Kiểm tra giỏ hàng đã được khởi tạo chưa
					$item_array_id = array_column($_SESSION['cart'], "id_product");
						//Trường hợp đã có sản phẩm đó trong giỏ hàng => Tăng số lượng sản phẩm lên
						if(in_array($_POST['id_product'], $item_array_id)){
							foreach ($_SESSION['cart'] as &$item) {
								if ($item['id_product'] == $_POST['id_product']) {
									$item['quantity'] += $_POST['quantity'];
									break;
								}
							}
						}
						//Không thì thêm sản phẩm và tăng số lượng sản phẩm tại icon giỏ hàng
						else{
							$count = count($_SESSION['cart']);
							$item_array = array(
								'id_product' => $_POST['id_product'],
								'quantity' => $_POST['quantity']
							);

							$_SESSION['cart'][$count] = $item_array;
							$count++;
							}
				}

					else{
							$item_array = array(
								'id_product' => $_POST['id_product'],
								'quantity' => $_POST['quantity']
							);
							// Khởi tạo giỏ hàng mới
							$_SESSION['cart'][0] = $item_array;
					}
				}
				
			}
		
		
		public function showCart(){
			require_once($_SERVER['DOCUMENT_ROOT']."/views/cart_view.php");
			require_once($_SERVER['DOCUMENT_ROOT']."/views/cartpayment_view.php");
			$link = null;
			taoKetNoi($link);
			
			$price_detail = 0;
			$sum = 0;
			$shipping = 50000;
			$total_order = 0;
			
			if (isset($_SESSION['cart'])){
				$id_product = array_column($_SESSION['cart'], "id_product");

				$result=chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product");

				while ($rows = mysqli_fetch_assoc($result)){
					foreach ($id_product as $id){
						if ($rows['id_product'] == $id){
							foreach ($_SESSION['cart'] as $key => $item) {
								if ($item['id_product'] == $id) {
									// Lấy số lượng từ trang chi tiết sản phẩm
									$quantity_order = $item['quantity']; 

									// Xử lý tăng/giảm số lượng và cập nhật giá trị mới
									if (isset($_POST['increase_quantity']) && $item['id_product'] == $_POST['id_product'] && $quantity_order < $rows['stock_quantity']) {
										$quantity_order += 1;
									} 
									elseif (isset($_POST['decrease_quantity']) && $item['id_product'] == $_POST['id_product'] && $quantity_order > 1) {
										$quantity_order -= 1;
									}

									// Cập nhật giá trị mới vào mảng $_SESSION['cart']
									$_SESSION['cart'][$key]['quantity'] = $quantity_order;

									//Tính tổng giá
									$price_detail = (int)$quantity_order * (int)$rows['unit_price'];
									$sum = $sum + $price_detail; 
									$total_order = $sum + $shipping;
									
									$_SESSION['cart'][$key]['price_detail'] = $price_detail;
									break;
								}
							}
							cartElement($rows['img_main_product'], $rows['name_product'],$rows['unit_price'], $rows['id_product'], $quantity_order, $price_detail);
						}
					}
				}	
				cartTotal($sum, $shipping, $total_order, $price_detail);
			}
			else{
				echo "<h5 class='text-dark'>Giỏ hàng trống!</h5>";
				cartTotal($sum, $shipping, $total_order, $price_detail);
			}
		}	
		
		public function deleteItemCart(){
			require_once($_SERVER['DOCUMENT_ROOT']."/views/cart_view.php");
			
			if (isset($_POST['btdeleteItem'])){
				if ($_GET['action'] == 'btdeleteItem'){
					foreach ($_SESSION['cart'] as $key => $value){
						if($value["id_product"] == $_GET['id']){
							unset($_SESSION['cart'][$key]);
							$_SESSION['cart'] = array_values($_SESSION['cart']); // Định lại chỉ số của mảng
							echo "<script>alert('Sản phẩm đã được xóa khỏi giỏ hàng!')</script>";
							echo "<script>window.location = 'cart.php'</script>";
							
						}
					}
				}
				exit();
			}
		}
		
	}
?>