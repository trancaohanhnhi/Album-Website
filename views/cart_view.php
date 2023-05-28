<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/controllers/cart_controller.php");
	$controller = new cartcontroller();
	$controller -> deleteItemCart();
	
	function cartElement($img_main_product, $name_product, $unit_price, $id_product, $quantity_order, $price_detail){
    	$element = " 
		
			<div class=\"card-body\">
				<div class=\"row\">
					<div class=\"cartItemLeft col-lg-2 col-4 rounded\" >
						<img src=\"$img_main_product\" class='img-fluid'>
					</div>
					<div class=\"cartItemRight col-lg-10 col-8\">
						<div class=\"row\">
							<div class=\"cartItemInformation col-10 text-left\" name=\"nameproduct\"><h5>$name_product</h5></div>
							<div class= 'col-2'>
								<form action=\"cart.php?action=btdeleteItem&id=$id_product\" method=\"post\">
									<button type=\"submit\" class=\"btn-delete font-weight-bold border-0 bg-transparent\" name=\"btdeleteItem\" aria-label=\"delete\">X</button>
								</form>
								</div>
							</div>
							
							<form action =\"cart.php\" method=\"post\">
								<div class=\"row\">
									<div class=\"cartItemQuantity col-lg-6 col-12\">
										<label class=\"cartItemQuantityLabel\"><br>Số lượng: </label>
										<button type=\"submit\" class=\"quantity-left-minus btn btn-number col-2 \" data-type=\"minus\" name=\"decrease_quantity\"><h5>-</h5></button>	
										<input type=\"text\" id=\"quantity\" name=\"quantity\" class=\"cartItemQuantityInput text-center col-3 \" min=\"1\" max=\"100\" value=\"$quantity_order\" readonly>
										<input type=\"hidden\" name=\"id_product\" value=\"$id_product\">
										<button type=\"submit\" class=\"quantity-right-plus btn btn-number col-2\" data-type=\"plus\" name=\"increase_quantity\"><h5>+</h5></button>
									</div>
									<div class=\"cartItemPrice col-lg-3 col-6\"><br>x $unit_price</div>
									<div class=\"cartItemTotalValue col-lg-3 col-6\" style='color:coral;'><br><b>$price_detail</b></div>
								</div>
							</form>
						</div>
					</div>
				</div>
		";
    	echo  $element;
	}
?>

